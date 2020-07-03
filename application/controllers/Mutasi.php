<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller 
{
     function __construct(){
        parent::__construct();
        login_admin();
        $this->load->library('kriptografi');
        $this->load->library('notification');
        $this->load->model('Role_model','role');
        $this->load->model('Tagihan_model','tagihan');
        $this->load->model('Wp_model','wp');
        $this->load->model('Mutasi_model','mutasi');
        $this->load->model('Pembayaran_model','pembayaran');
        $this->data = [];
        $this->kunci = "";
        $this->data['kunci']=$this->session->userdata('key');
        $this->kunci= $this->data['kunci'];
        $this->data['role']=$this->role->getRole($this->session->userdata('id_role'));
        $this->data['user']= $this->db->get_where('admin',['login_admin'=> $this->session->userdata('loged')])->row_array();
   
        $s_nop=$this->kriptografi->enkripsi("BELUM DIBAYAR",$this->kunci);
        $this->data['lunas']= $this->tagihan->jumlahLunas($s_nop);
        $s_val=$this->kriptografi->enkripsi("MENUNGGU VALIDASI",$this->kunci);
        $this->data['validasi']=$this->pembayaran->jumlahTunggu($s_val);
        $s_p=$this->kriptografi->enkripsi("MENUNGGU PEMBAYARAN",$this->kunci);
        $this->data['proses']=$this->pembayaran->jumlahProses($s_p);
    }

    public function index(){
        ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M');
        $this->data['title']='Mutasi';
        $this->data['mutasi'] = $this->mutasi->showData('mutasi');
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('mutasi/index');
        $this->load->view('templates/kdesa_footer');
    }
       
    public function tambah(){
        $this->form_validation-> set_rules('nop','NOP','required|trim');
        $this->form_validation-> set_rules('id_wp_baru','ID WP Baru','required|trim');
        if($this->form_validation->run()==false){
            $this->data['title']='Tambah Mutasi';
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/kdesa_topbar');
            $this->load->view('templates/kdesa_sidebar');
            $this->load->view('mutasi/tambah');
            $this->load->view('templates/kdesa_footer');
        }else{
            $kode=$this->input->post('nop').$this->input->post('tahun');
            $kode=$this->kriptografi->enkripsi($kode,$this->kunci);
            $tagihan=$this->tagihan->getTagihan($kode);
            if($this->input->post('jenis_mutasi')=="PENUH"){
                $data_baru=[
                    'data_tagihan'=>$tagihan['data_tagihan'],
                    'id_wp'=>$this->input->post('id_wp_baru'),
                    'status_nop'=>$tagihan['status_nop']
                ];
                $this->tagihan->updateTagihan($kode,$data_baru);
            }else{
                $data_tagihan=explode("|",$this->kriptografi->deskripsi($tagihan['data_tagihan'],$this->kunci));
                $update_data[0]=$data_tagihan[0];
                $update_data[1]=$data_tagihan[1];
                $update_data[2]=$data_tagihan[2]-$this->input->post('luas_bumi_mutasi');
                $update_data[3]=$data_tagihan[3]-$this->input->post('luas_bangunan_mutasi');
                $update_data[4]=$data_tagihan[4];
                $update_data[5]=$data_tagihan[5];
                $update_data[6]=$data_tagihan[6];
                $update_data[7]=$data_tagihan[7];
                $join_data=implode("|",$update_data); 
                $data_lama=[
                    'data_tagihan'=>$this->kriptografi->enkripsi($join_data,$this->kunci),
                    'id_wp'=>$tagihan['id_wp'],
                    'status_nop'=>$tagihan['status_nop']
                ];
                $new_data[0]=$data_tagihan[0];
                $new_data[1]=$data_tagihan[1];
                $new_data[2]=$this->input->post('luas_bumi_mutasi');
                $new_data[3]=$this->input->post('luas_bangunan_mutasi');
                $new_data[4]=$data_tagihan[4];
                $new_data[5]=$data_tagihan[5];
                $new_data[6]=$data_tagihan[6];
                $new_data[7]=$data_tagihan[7];
                $join_new=implode("|",$new_data); 
                $kode_baru=$this->input->post('nop_mutasi').$this->input->post('tahun');
                $data_baru=[
                    'kode'=>$this->kriptografi->enkripsi($kode_baru,$this->kunci),
                    'data_tagihan'=>$this->kriptografi->enkripsi($join_new,$this->kunci),
                    'id_wp'=>$this->input->post('id_wp_baru'),
                    'status_nop'=>$tagihan['status_nop']
                ];
                $this->db->insert('tagihan',$data_baru);
                $this->tagihan->updateTagihan($kode,$data_lama);
            }
            
            $mutasi[0]=$this->input->post('nop').$this->input->post('tahun');
            $mutasi[1]=Date('Y-m-d');
            $mutasi[2]=$this->input->post('jenis_mutasi');
            $mutasi[3]=$this->input->post('luas_bumi_mutasi');
            $mutasi[4]=$this->input->post('luas_bangunan_mutasi');
            if($this->input->post('jenis_mutasi')=="PENUH"){
                $mutasi[5]="-";
            }else{
                $mutasi[5]=$this->input->post('nop_mutasi').$this->input->post('tahun');
            }
            
            $join_mutasi=implode("|",$mutasi); 
            $data_mutasi=[
                'id_wp_lama'=>$this->input->post('id_wp'),
                'data_mutasi'=>$this->kriptografi->enkripsi($join_mutasi,$this->kunci),
                'id_wp_baru' => $this->input->post('id_wp_baru'),
                'id'=>$this->data['user']['id']
            ];
            $this->db->insert('mutasi',$data_mutasi);
            $identity_old=$this->wp->getWp($this->input->post('id_wp'));
            $identity_new=$this->wp->getWp($this->input->post('id_wp_baru'));
            $contact1=explode("|",$this->kriptografi->deskripsi($identity_old['login_wp'],$this->kunci));
            $contact2=explode("|",$this->kriptografi->deskripsi($identity_new['login_wp'],$this->kunci));
            $person1=$this->kriptografi->deskripsi($identity_old['nama_wp'],$this->kunci);
            $person2=$this->kriptografi->deskripsi($identity_new['nama_wp'],$this->kunci);
            $nop_id=$this->input->post('nop');

    $msg ='NOP : '.$nop_id.' Telah Berhasil Dimutasi Ke '.$person2.'. Untuk Informasi Lebih Lengkap Kunjungi Dashboard Anda';
    $msg2 ='NOP : '.$nop_id.' Dari '.$person1.' Telah Berhasil Dimutasi Kepada Anda.  Untuk Informasi Lebih Lengkap Kunjungi Dashboard Anda';   
    $this->notification->send_message($contact1[0],$msg);
    $this->notification->send_message($contact2[0],$msg2);
        redirect('mutasi');
        }       
    }

    public function search(){
        // $kode="3209200016001000102020";
       $kode=$this->input->post('kode');
        $kode=$this->kriptografi->enkripsi($kode,$this->kunci);
        $hasil=$this->tagihan->getTagihan($kode);
        // $hasil['kode']=$this->kriptografi->deskripsi($hasil['kode'],$this->kunci);
        $hasil['data_tagihan']=$this->kriptografi->deskripsi($hasil['data_tagihan'],$this->kunci);
        $data_tagihan=explode("|",$hasil['data_tagihan']);

        $out['luas_bumi']=$data_tagihan[2];
        $out['luas_bangunan']=$data_tagihan[3];
        $out['nama_wp']=$this->kriptografi->deskripsi($hasil['nama_wp'],$this->kunci);
        $out['blok']=$data_tagihan[6];
        $out['id_wp']=$hasil['id_wp'];
        echo json_encode($out);
    }  
}