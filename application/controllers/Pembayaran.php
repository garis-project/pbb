<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        login_admin();
    
        $this->load->library('kriptografi');
        $this->load->library('notification');
        $this->load->model('Role_model','role');
        $this->load->model('Tagihan_model','tagihan');
        $this->load->model('Wp_model','wp');
        $this->load->model('Pembayaran_model','pembayaran');
        $this->data = [];
        $this->kunci = "";
        $this->data['kunci']=$this->session->userdata('key');
        $this->kunci= $this->data['kunci'];
        $this->data['role']=$this->role->getRole($this->session->userdata('id_role'));
        $this->data['user']= $this->db->get_where('admin',['login_admin'=> $this->session->userdata('loged')])->row_array();
        $this->data['tmp'] = $this->pembayaran->showAll('tmp_detail_pembayaran');
        
        $s_nop=$this->kriptografi->enkripsi("BELUM DIBAYAR",$this->kunci);
        $this->data['lunas']= $this->tagihan->jumlahLunas($s_nop);
        $s_val=$this->kriptografi->enkripsi("MENUNGGU VALIDASI",$this->kunci);
        $this->data['validasi']=$this->pembayaran->jumlahTunggu($s_val);
        $s_p=$this->kriptografi->enkripsi("MENUNGGU PEMBAYARAN",$this->kunci);
        $this->data['proses']=$this->pembayaran->jumlahProses($s_p);
    }
    public function index(){
        $this->pembayaran->clearData();
        $this->data['title']="Daftar Verifikasi Pembayaran";
        $status=$this->kriptografi->enkripsi("MENUNGGU VALIDASI",$this->kunci);
        $this->data['pembayaran'] = $this->pembayaran->showAllData($status);
        $this->load->view('templates/kdesa_header',$this->data);
        $this->load->view('templates/kdesa_topbar');
        $this->load->view('templates/kdesa_sidebar');
        $this->load->view('pembayaran/index');
        $this->load->view('templates/kdesa_footer');  
    }   
    public function validasi_internal(){
        $id_pembayaran=$this->input->post('id_pembayaran');
        $status=$this->kriptografi->enkripsi("TERVALIDASI",$this->kunci);
        $status_nop=$this->kriptografi->enkripsi("LUNAS",$this->kunci);
        $history=$this->pembayaran->getPembayaran($id_pembayaran);
        $tmp_data=explode("|",$this->kriptografi->deskripsi($history['data_pembayaran'],$this->kunci));
        $update_data[0]=$tmp_data[0];//tanggal_pembayaran
        $update_data[1]=Date('Y-m-d');//tanggal_validasi
        $update_data[2]=$tmp_data[2];//total_pembayaran
        $update_data[3]=$tmp_data[3];
        $join_pembayaran=implode("|",$update_data); 
        $pembayaran_data = array(
            "data_pembayaran"=>$this->kriptografi->enkripsi($join_pembayaran,$this->kunci),
            "status_pembayaran"=>$status,
            "id"=>$this->data['user']['id']
        );
        $this->pembayaran->updatePembayaran($id_pembayaran,$pembayaran_data);
        $detail=$this->pembayaran->getDetail($id_pembayaran);
        $n=$this->pembayaran->getRow($id_pembayaran);
        for($i=0;$i<$n;$i++){
            $tagihan_data = array(
                "status_nop"=> $status_nop,
            );
            $this->db->where('kode', $detail[$i]['kode']);
            $this->db->update('tagihan', $tagihan_data); 
        }
        $val=$this->pembayaran->getNumber($id_pembayaran);
        $contact=explode("|",$this->kriptografi->deskripsi($val['login_wp'],$this->kunci));
        $message="Tagihan Anda Telah Berhasil Kami Validasi. Untuk Informasi Lebih Lengkap Silahkan Login Ke Dashboard Anda";
        $this->notification->send_message($contact[0],$message);
        redirect('pembayaran');
    }
    public function validasi_eksternal(){
        $id_pembayaran=$this->input->post('id_pembayaran');
        $status=$this->kriptografi->enkripsi("TERVALIDASI",$this->kunci);
        $status_nop=$this->kriptografi->enkripsi("MEDIA LAIN",$this->kunci);
        $history=$this->pembayaran->getPembayaran($id_pembayaran);
        $tmp_data=explode("|",$this->kriptografi->deskripsi($history['data_pembayaran'],$this->kunci));
        $update_data[0]=$tmp_data[0];//tanggal_pembayaran
        $update_data[1]=Date('Y-m-d');//tanggal_validasi
        $update_data[2]=$tmp_data[2];//total_pembayaran
        $update_data[3]=$tmp_data[3];
        $join_pembayaran=implode("|",$update_data); 
        $pembayaran_data = array(
            "data_pembayaran"=>$this->kriptografi->enkripsi($join_pembayaran,$this->kunci),
            "status_pembayaran"=>$status,
            "id"=>$this->data['user']['id']
        );
        $this->pembayaran->updatePembayaran($id_pembayaran,$pembayaran_data);
        $detail=$this->pembayaran->getDetail($id_pembayaran);
        $n=$this->pembayaran->getRow($id_pembayaran);
        for($i=0;$i<$n;$i++){
            $tagihan_data = array(
                "status_nop"=> $status_nop
            );
            $this->db->where('kode', $detail[$i]['kode']);
            $this->db->update('tagihan', $tagihan_data); 
       }
        $val=$this->pembayaran->getNumber($id_pembayaran);
        $contact=explode("|",$this->kriptografi->deskripsi($val['login_wp'],$this->kunci));
        $message="Tagihan Anda Telah Berhasil Kami Validasi. Untuk Informasi Lebih Lengkap Silahkan Login Ke Dashboard Anda";
        $this->notification->send_message($contact[0],$message);
       redirect('pembayaran');
    }
}