<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        login_admin();
    
        $this->load->library('kriptografi');
        $this->load->model('Role_model','role');
        $this->load->model('Tagihan_model','tagihan');
        $this->load->model('Wp_model','wp');
        $this->load->model('Pembayaran_model','pembayaran');
        $this->data = [];
        $this->kunci = "";
        $this->id_opt =$this->session->userdata('id_opt');
        $this->data['kunci']=$this->session->userdata('key');
        $this->kunci= $this->data['kunci'];
        $this->data['role']=$this->role->getRole($this->session->userdata('id_role'));
        $this->data['user']= $this->db->get_where('login',['login'=> $this->session->userdata('loged')])->row_array();
        // $this->data['tmp'] = $this->pembayaran->showAll('tmp_detail_pembayaran');
    }
    public function index(){
    	ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M');
        // $this->pembayaran->clearData();
        $status=$this->kriptografi->enkripsi("MENUNGGU VALIDASI",$this->kunci);
        $this->data['title']='Pembayaran';
        $this->data['pembayaran'] = $this->pembayaran->verifData('pembayaran',$status);
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('manage/index');
        $this->load->view('templates/kdesa_footer');
    }   

     public function validasi(){    
        $status=$this->kriptografi->enkripsi("BELUM DIBAYAR",$this->kunci);
        $id_pembayaran=$this->input->post('id_pembayaran');
        $this->data['pembayaran'] = $this->pembayaran->getData($id_pembayaran);
        $this->data['list'] = $this->pembayaran->listData($id_pembayaran);
        $this->form_validation-> set_rules('nama_wp','Nama Wajib Pajak','required|trim');
        if($this->form_validation->run()==false){
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/kdesa_topbar');
            $this->load->view('templates/kdesa_sidebar');
            $this->load->view('manage/validasi');
            $this->load->view('templates/kdesa_footer');
        }else{
            $xdata=[
                'id_wp'=> $this->input->post('id_wp'),
                'id'=> $this->id_opt,
                'tanggal_pembayaran'=> Date('Y-m-d'),
                'status_pembayaran'=>$this->kriptografi->enkripsi("MENUNGGU VALIDASI", $this->kunci)
            ];
            $this->db->insert('pembayaran',$xdata);
            $this->pembayaran->simpan_detail_pembayaran();
            $this->pembayaran->clearData();
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Berhasil Simpan.Please Login</div>');
            redirect('pembayaran');
        }     
    } 

     
}