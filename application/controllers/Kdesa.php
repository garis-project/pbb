<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kdesa extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        login_admin();
        $this->load->library('kriptografi');
        $this->load->model('Tagihan_model','tagihan');
        $this->load->model('Wp_model','wp');
        $this->load->model('Pembayaran_model','pembayaran');
        $this->load->model('Mutasi_model','mutasi');
        $this->load->model('Role_model','role');
        $this->data = [];
        $this->kunci = "";
        $this->data['kunci']=$this->session->userdata('key');
        $this->kunci= $this->data['kunci'];
        $this->data['user']= $this->db->get_where('admin',['id'=> $this->session->userdata('id_login')])->row_array();
        

        $s_nop=$this->kriptografi->enkripsi("BELUM DIBAYAR",$this->kunci);
        $this->data['lunas']= $this->tagihan->jumlahLunas($s_nop);
        $s_val=$this->kriptografi->enkripsi("MENUNGGU VALIDASI",$this->kunci);
        $this->data['validasi']=$this->pembayaran->jumlahTunggu($s_val);
        $s_p=$this->kriptografi->enkripsi("MENUNGGU PEMBAYARAN",$this->kunci);
        $this->data['proses']=$this->pembayaran->jumlahProses($s_p);
    }
    public function index()
    {
    	$this->load->library('kriptografi');
        $this->data['title']='Dashboard Kolektor Desa';
        $this->data['role']=$this->role->getRole($this->session->userdata('id_role'));
        $this->data['wp']= $this->wp->jumlahWp();
        $this->data['tagihan']= $this->tagihan->jumlahNop();
        $this->data['pembayaran']= $this->pembayaran->jumlahTransaksi();
        
        $this->load->view('templates/kdesa_header', $this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('kdesa/index');
        $this->load->view('templates/kdesa_footer');
    }    

    public function matching_current()
    {
        $current_password=$this->input->post('current_password');
        $old_data=explode("|",$this->kriptografi->deskripsi($this->data['user']['login_admin'],$this->kunci));
        if($current_password!=$old_data[1]){
            $hasil="Password Tidak Cocok";
        }else{
            $hasil="Password Cocok";
        }
        echo json_encode($hasil);
    }
    public function changePassword()
    {
        $old_data=explode("|",$this->kriptografi->deskripsi($this->data['user']['login_admin'],$this->kunci));
        $new_password=$this->input->post('new_password1');
        $join_data=$this->kriptografi->enkripsi($old_data[0]."|".$new_password,$this->kunci);
        $new_data=[
            'login_admin'=>$join_data
        ];
        $this->db->where('id',$this->session->userdata('id_login'));
        $this->db->update('admin',$new_data);
   
        redirect('auth/logout');
    }  
}