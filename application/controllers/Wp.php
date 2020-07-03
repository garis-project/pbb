<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp extends CI_Controller 
{
     function __construct(){
        parent::__construct();
        login_admin();
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
        $this->data['title']='Wajib Pajak';
        $this->data['wp'] = $this->wp->showData('wajib_pajak');
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('wp/index');
        $this->load->view('templates/kdesa_footer');
    }
       
    public function tambah(){
        $this->form_validation-> set_rules('nama_wp','Nama Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('kontak_wp','Kontak Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('rt_wp','RT Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('rw_wp','RW Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('dusun_wp','Dusun Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('desa_wp','Desa Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('kec_wp','Kecamatan Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('kab_wp','Kabupaten Wajib Pajak','required|trim');
        if($this->form_validation->run()==false){
            $this->data['title']='Tambah WP';
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/kdesa_topbar');
            $this->load->view('templates/kdesa_sidebar');
            $this->load->view('wp/tambah');
            $this->load->view('templates/kdesa_footer');
        }else{
            $data_wp[0]=$this->input->post('rt_wp');
            $data_wp[1]=$this->input->post('rw_wp');
            $data_wp[2]=$this->input->post('dusun_wp');
            $data_wp[3]=$this->input->post('desa_wp');
            $data_wp[4]=$this->input->post('kec_wp');
            $data_wp[5]=$this->input->post('kab_wp');
            
            $join_data=implode("|",$data_wp);
            $xdata=[
                'nama_wp'=> $this->kriptografi->enkripsi(htmlspecialchars($this->input->post('nama_wp',true)),$this->kunci),
                'login_wp'=> $this->kriptografi->enkripsi($this->input->post('kontak_wp')."|".$this->input->post('kontak_wp'),$this->kunci),
                'data_wp'=> $this->kriptografi->enkripsi($join_data,$this->kunci)
            ];
            // var_dump($join_data);
            $this->db->insert('wajib_pajak',$xdata);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Berhasil Simpan.Please Login</div>');
            redirect('wp');
        }   
    }
     public function update(){
        $this->form_validation-> set_rules('nama_wp','Nama Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('kontak_wp','Kontak Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('rt_wp','RT Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('rw_wp','RW Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('dusun_wp','Dusun Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('desa_wp','Desa Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('kec_wp','Kecamatan Wajib Pajak','required|trim');
        $this->form_validation-> set_rules('kab_wp','Kabupaten Wajib Pajak','required|trim');
        $id=$this->input->post('id');
        $this->data['wp'] = $this->wp->getWp($id);
        if($this->form_validation->run()==false){
            $this->data['title']='Update WP';
            $this->load->view('templates/kdesa_header',$this->data);
            $this->load->view('templates/kdesa_topbar');
            $this->load->view('templates/kdesa_sidebar');
            $this->load->view('wp/update');
            $this->load->view('templates/kdesa_footer');
        }else{
            $data_wp[0]=$this->input->post('rt_wp');
            $data_wp[1]=$this->input->post('rw_wp');
            $data_wp[2]=$this->input->post('dusun_wp');
            $data_wp[3]=$this->input->post('desa_wp');
            $data_wp[4]=$this->input->post('kec_wp');
            $data_wp[5]=$this->input->post('kab_wp');
            
            $join_data=implode("|",$data_wp);
            $xdata=[
                'nama_wp'=> $this->kriptografi->enkripsi(htmlspecialchars($this->input->post('nama_wp',true)),$this->kunci),
                'login_wp'=> $this->kriptografi->enkripsi($this->input->post('kontak_wp')."|".$this->input->post('kontak_wp'),$this->kunci),
                'data_wp'=> $this->kriptografi->enkripsi($join_data,$this->kunci)
            ];
            $this->wp->updateWp($id,$xdata);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Berhasil Simpan.Please Login</div>');
            redirect('wp');
        }   
    }    
    public function hapus(){
        $id_wp=$this->input->post('id');
        $this->wp->hapus($id_wp);
        redirect('wp');
    }  

    public function cek_wp(){
        $nama_wp=$this->input->post('nama_wp');
        $wp=$this->kriptografi->enkripsi($nama_wp,$this->kunci);
        $valid=$this->wp->cariUser($wp);
        if($valid){
            $hasil="Wajib Pajak Sudah Terdaftar";
        }else{
            $hasil=null;
        }
        echo json_encode($hasil);
        
    }  
}