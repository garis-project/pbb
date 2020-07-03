<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        login_wp();
        $this->load->library('kriptografi');
        $this->load->library('notification');
        $this->load->model('Tagihan_model','tagihan');
        $this->load->model('Wp_model','wp');
        $this->load->model('Pembayaran_model','pembayaran');
        $this->load->model('Mutasi_model','mutasi');
        $this->data = [];
        $this->kunci = "";
        $this->data['kunci']=$this->session->userdata('key');
        $this->kunci= $this->data['kunci'];
        $this->data['user']= $this->db->get_where('wajib_pajak',['id_wp'=> $this->session->userdata('id_login')])->row_array();
        // $this->data['tmp'] = $this->pembayaran->showAll('tmp_detail_pembayaran');
        
    }
    public function index()
    {
        $this->data['tagihan'] = $this->tagihan->tagihanWp($this->session->userdata('id_login'));
        $this->data['title']="Daftar Tagihan";
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/user_topbar');
        $this->load->view('templates/user_sidebar');
        $this->load->view('user/index');
        $this->load->view('templates/user_footer');
    }    
    public function tagihan(){
        $this->form_validation-> set_rules('nop','NOP','required|trim');
        $kode=$this->input->post('kode');
        $this->data['title']="Detail Tagihan";
        $this->data['tagihan'] = $this->tagihan->getTagihan($kode);
        if($this->form_validation->run()==false){
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/user_topbar');
            $this->load->view('templates/user_sidebar');
            $this->load->view('user/tagihan');
            $this->load->view('templates/user_footer');
        }
    }

    public function mutasi(){
        $this->data['title']="Daftar Mutasi";
        $this->data['mutasi'] = $this->mutasi->getData($this->data['user']['id_wp']);
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/user_topbar');
        $this->load->view('templates/user_sidebar');
        $this->load->view('user/mutasi');
        $this->load->view('templates/user_footer'); 
    }

    public function pembayaran(){
        $this->pembayaran->clearData();
        $this->data['title']="Daftar Pembayaran";
        $this->data['pembayaran'] = $this->pembayaran->showData($this->data['user']['id_wp']);
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/user_topbar');
        $this->load->view('templates/user_sidebar');
        $this->load->view('user/pembayaran');
        $this->load->view('templates/user_footer');  
    }

    public function pembayaran_input(){ 
        $idp=$this->pembayaran->max();   
        $status=$this->kriptografi->enkripsi("BELUM DIBAYAR",$this->kunci);
        $this->data['tagihan'] = $this->tagihan->showByStatus($status,$this->session->userdata('id_login'));
        $this->form_validation-> set_rules('total','Total Bayar','required|trim');
        if($this->form_validation->run()==false){
            $this->data['title']='Input Pembayaran';
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/user_topbar');
            $this->load->view('templates/user_sidebar');
            $this->load->view('user/pembayaran_input');
            $this->load->view('templates/user_footer');  
        }else{
            $data_pembayaran[0]=Date('Y-m-d');//tanggal_pembayaran
            $data_pembayaran[1]="-";//tanggal_validasi
            $data_pembayaran[2]=$this->input->post('total');//total_pembayaran
            $data_pembayaran[3]=$this->input->post('bukti');//bukti_pembayaran
            if(!empty($data_pembayaran[3])){
                $status_pembayaran="MENUNGGU VALIDASI";
            }else{
                $status_pembayaran="MENUNGGU PEMBAYARAN";
            }
            $join_pembayaran=implode("|",$data_pembayaran); 
            $xdata=[
                'id_pembayaran'=>$idp['id']+1,
                'id_wp'=> $this->session->userdata('id_login'),
                'data_pembayaran'=> $this->kriptografi->enkripsi($join_pembayaran,$this->kunci),
                'status_pembayaran'=> $this->kriptografi->enkripsi($status_pembayaran, $this->kunci)
            ];
            $this->db->insert('pembayaran',$xdata);
            $this->pembayaran->simpan_detail_pembayaran();
            $this->pembayaran->clearData();
            $number=explode("|",$this->kriptografi->deskripsi($this->data['user']['login_wp'],$this->kunci));
            $msg="Silahkan Transfer Ke Rekening BRI a/n Dedi Supriadi 001288847733226 Sebesar Rp.".number_format($this->input->post('total')).". Jika Sudah Melakukan Pembayaran Silahkan Upload Bukti Pembayaran Pada Sistem";
            $this->notification->send_message($number[0],$msg);
            redirect('user/pembayaran');
        }     
    } 

    public function pembayaran_update(){    
        $id_pembayaran=$this->input->post('id_pembayaran');
        $this->data['identity']= $id_pembayaran;
        $this->data['detail'] = $this->pembayaran->showDetail( $id_pembayaran);
        $this->data['total'] = $this->pembayaran->getTotal( $id_pembayaran);
        $this->form_validation-> set_rules('image-name','Bukti Pembayaran','required|trim');
        
        $this->data['title']='Upload Bukti Pembayaran';
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/user_topbar');
        $this->load->view('templates/user_sidebar');
        $this->load->view('user/pembayaran_update');
        $this->load->view('templates/user_footer');     
    } 
    public function update(){
        $id_pembayaran=$this->input->post('id_pembayaran');
        $image_name=$this->input->post('image-name');
        $pembayaran= $this->pembayaran->getPembayaran( $id_pembayaran);
        $fileName = time().$_FILES['file']['name'];
        $config['upload_path'] = './assets/data/image/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'jpg|png|jpeg'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);    
        if(! $this->upload->do_upload('file') ){
            echo $this->upload->display_errors();exit();
        }
        $data_pembayaran=explode("|",$this->kriptografi->deskripsi($pembayaran['data_pembayaran'],$this->kunci));
        $update_data[0]=$data_pembayaran[0];//tanggal_pembayaran
        $update_data[1]=$data_pembayaran[1];//tanggal_validasi
        $update_data[2]=$data_pembayaran[2];;//total_pembayaran
        $update_data[3]=$this->input->post('image-name');//bukti_pembayaran
        $status_pembayaran="MENUNGGU VALIDASI";
        $join_pembayaran=implode("|",$update_data); 
        $xdata=[
            'id_wp'=> $this->session->userdata('id_login'),
            'data_pembayaran'=> $this->kriptografi->enkripsi($join_pembayaran,$this->kunci),
            'status_pembayaran'=> $this->kriptografi->enkripsi($status_pembayaran, $this->kunci)
        ];
        $this->pembayaran->updateData($xdata,$id_pembayaran);
        $s_p=$this->kriptografi->enkripsi("MENUNGGU VALIDASI",$this->kunci);
        $bayar['proses']=$this->pembayaran->jumlahProses($s_p);  
        $message = 'Terdapat '.$bayar['proses']['jml'].' Pembayaran Menunggu Validasi';
        $this->notification->send_message('085321317658',$message);
        redirect('user/pembayaran');
    } 

    public function hitung(){
        $kode=$this->input->post('kode');
        $list=$this->db->get_where('tmp_detail_pembayaran',['kode'=>$kode])->row_array();
        $max=$this->pembayaran->maxId();
        $max['id']= $max['id']+1;
        $tdata=[
                'id_pembayaran'=> $max['id'],
                'kode'=> $this->input->post('kode'),
                'harga'=> $this->kriptografi->enkripsi($this->input->post('harga'),$this->kunci)
        ];
        if($list){
            $this->pembayaran->hapus($kode);
        }else{
            $this->db->insert('tmp_detail_pembayaran',$tdata);       
        }
        $hasil=$this->pembayaran->hitung();
        $n=$this->pembayaran->jumlahData();
        $total=0;
        for($i=0;$i<$n;$i++){
            $total+=$this->kriptografi->deskripsi($hasil[$i]['harga'],$this->kunci);
        }
        echo json_encode($total);
    }  
    
    public function matching_current()
    {
        $current_password=$this->input->post('current_password');
        $old_data=explode("|",$this->kriptografi->deskripsi($this->data['user']['login_wp'],$this->kunci));
        if($current_password!=$old_data[1]){
            $hasil="Password Tidak Cocok";
        }else{
            $hasil="Password Cocok";
        }
        echo json_encode($hasil);
    }
    public function changePassword()
    {
        $old_data=explode("|",$this->kriptografi->deskripsi($this->data['user']['login_wp'],$this->kunci));
        $new_password=$this->input->post('new_password1');
        $join_data=$this->kriptografi->enkripsi($old_data[0]."|".$new_password,$this->kunci);
        $new_data=[
            'login_wp'=>$join_data
        ];
        $this->db->where('id_wp',$this->session->userdata('id_login'));
        $this->db->update('wajib_pajak',$new_data);
   
        redirect('auth/logout_wp');
    }     
}