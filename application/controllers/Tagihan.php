<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller 
{
	 function __construct(){
        parent::__construct();
        login_admin();
        $this->load->library('ImportExcel'); //load librari excel
        $this->load->library('kriptografi');
        $this->load->model('Role_model','role');
        $this->load->model('Tagihan_model','tagihan');
        $this->load->model('Pembayaran_model','pembayaran');
        $this->load->model('Wp_model','wp');
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
        $this->data['title']='Tagihan';
        $this->data['tagihan'] = $this->tagihan->showData('tagihan');
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('tagihan/index');
        $this->load->view('templates/kdesa_footer');
    }
 
    public function importExcel(){
    	ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
        $fileName = time().$_FILES['file']['name'];
        $config['upload_path'] = './assets/data/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
 
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);    
        if(! $this->upload->do_upload('file') ){
            echo $this->upload->display_errors();exit();
        }
              
        $inputFileName = './assets/data/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                 // Sesuaikan key array dengan nama kolom di database  
                 $kode=$rowData[0][0].$rowData[0][5];
                 $data_tagihan[0]= $rowData[0][3]; //nama_nop
                 $data_tagihan[1]=$rowData[0][4];//alamat_nop
                 $data_tagihan[2]=$rowData[0][6]; //luas_bumi
                 $data_tagihan[3]=$rowData[0][7]; //luas_bangunan
                 $data_tagihan[4]=$rowData[0][8]; //rt_nop
                 $data_tagihan[5]=$rowData[0][9];  //rw_nop
                 $data_tagihan[6]=substr($rowData[0][0],10,3); //blok=
                 $data_tagihan[7]=$rowData[0][11]; //harga=
                 $join_tagihan=implode("|",$data_tagihan);                                                    
                 $xdata = array(
                    'kode'=> $this->kriptografi->enkripsi($kode,$this->kunci),
                    "data_tagihan"=> $this->kriptografi->enkripsi($join_tagihan,$this->kunci),
                    "id_wp"=>null,
                    "status_nop"=> $this->kriptografi->enkripsi("BELUM DIBAYAR",$this->kunci),
                );
                $insert = $this->db->insert("tagihan",$xdata);       
            }
            redirect(base_url('tagihan'));
    }

    public function tambah(){    
        $this->form_validation-> set_rules('nop','NOP','required|trim');
        if($this->form_validation->run()==false){
            $this->data['title']='Tambah Tagihan';
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/kdesa_topbar');
            $this->load->view('templates/kdesa_sidebar');
            $this->load->view('tagihan/tambah');
            $this->load->view('templates/kdesa_footer');
        }else{
            $kode=$this->input->post('nop').$this->input->post('tahun');
            $data_tagihan[0]=$this->input->post('nama_nop');; //nama_nop
            $data_tagihan[1]=$this->input->post('alamat_nop');;//alamat_nop
            $data_tagihan[2]=$this->input->post('luas_bumi');; //luas_bumi
            $data_tagihan[3]=$this->input->post('luas_bangunan');; //luas_bangunan
            $data_tagihan[4]=$this->input->post('rt_nop');; //rt_nop
            $data_tagihan[5]=$this->input->post('rw_nop');  //rw_nop
            $data_tagihan[6]=$this->input->post('blok'); //blok
            $data_tagihan[7]=$this->input->post('harga');//harga
            $join_tagihan=implode("|",$data_tagihan);                                                    
            $xdata = array(
               'kode'=> $this->kriptografi->enkripsi($kode,$this->kunci),
               "data_tagihan"=> $this->kriptografi->enkripsi($join_tagihan,$this->kunci),
               "id_wp"=>$this->input->post('id_wp'),
               "status_nop"=> $this->kriptografi->enkripsi($this->input->post('status_nop'),$this->kunci),
           );
            $this->db->insert('tagihan',$xdata);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Berhasil Simpan.Please Login</div>');
            redirect('tagihan');
        }     
    }

    public function update(){    
        $this->form_validation-> set_rules('nop','NOP','required|trim');
        $kode=$this->input->post('kode');
        $this->data['tagihan'] = $this->tagihan->getTagihan($kode);
        if($this->form_validation->run()==false){
            $this->data['title']='Update Tagihan';
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/kdesa_topbar');
            $this->load->view('templates/kdesa_sidebar');
            $this->load->view('tagihan/update');
            $this->load->view('templates/kdesa_footer');
        }else{
            $kode=$this->input->post('nop').$this->input->post('tahun');
            $data_tagihan[0]=$this->input->post('nama_nop');; //nama_nop
            $data_tagihan[1]=$this->input->post('alamat_nop');;//alamat_nop
            $data_tagihan[2]=$this->input->post('luas_bumi');; //luas_bumi
            $data_tagihan[3]=$this->input->post('luas_bangunan');; //luas_bangunan
            $data_tagihan[4]=$this->input->post('rt_nop');; //rt_nop
            $data_tagihan[5]=$this->input->post('rw_nop');  //rw_nop
            $data_tagihan[6]=$this->input->post('blok'); //blok
            $data_tagihan[7]=$this->input->post('harga');//harga
            $join_tagihan=implode("|",$data_tagihan);                                                    
            $xdata = array(
               'kode'=> $this->kriptografi->enkripsi($kode,$this->kunci),
               "data_tagihan"=> $this->kriptografi->enkripsi($join_tagihan,$this->kunci),
               "id_wp"=>$this->input->post('id_wp'),
               "status_nop"=> $this->kriptografi->enkripsi($this->input->post('status_nop'),$this->kunci),
           );
            $kode=$this->input->post('nop').$this->input->post('tahun');
            $kode=$this->kriptografi->enkripsi($kode,$this->kunci);
            $this->tagihan->updateTagihan($kode,$xdata);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Berhasil Simpan.Please Login</div>');
            redirect('tagihan');
       
        }     
    }
    public function search(){
        $nama_wp=$this->input->post('nama_wp');
        $wp=$this->kriptografi->enkripsi($nama_wp,$this->kunci);
        $hasil=$this->wp->fromName($wp);
        echo json_encode($hasil);
    }

    public function hapus(){
       $kode=$this->input->post('kode');
        $this->tagihan->hapus($kode);
        redirect('tagihan');
    }

    public function cek_nop(){
        $kode=$this->input->post('kode');
        $kode=$this->kriptografi->enkripsi($kode,$this->kunci);
         $valid=$this->tagihan->getTagihan($kode);
        if($valid){
            $hasil="NOP Sudah Terdaftar";
        }else{
            $hasil=null;
        }
        echo json_encode($hasil);
     }
    public function cari(){
        $this->data['title']='Pencarian Tagihan';
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('tagihan/cari');
        $this->load->view('templates/kdesa_footer');
    }    
    public function hasil_cari(){
        $konteks=$this->input->post('konteks');
        $kata_kunci=$this->input->post('kata_kunci');
        $kata_enc=$this->kriptografi->enkripsi($kata_kunci,$this->kunci);
        if ($konteks=="kode"){
            $this->data['tagihan']= $this->tagihan->byCode($kata_enc);
        }else{
            $wp= $this->wp->getId($kata_enc);
            $this->data['tagihan']= $this->tagihan->byWp($wp['id_wp']);
        }
        // var_dump($konteks);
        $this->data['title']='Hasil Pencarian Tagihan';
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('tagihan/hasil_pencarian');
        $this->load->view('templates/kdesa_footer');
    }
}
  
    