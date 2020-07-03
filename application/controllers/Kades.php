<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kades extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        login_kades();
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
        
    }
    public function index()
    {
    	$this->load->library('kriptografi');
        $this->data['title']='Dashboard Kepala Desa';
        $this->data['role']=$this->role->getRole($this->session->userdata('id_role'));
        $this->data['wp']= $this->wp->jumlahWp();
        $this->data['tagihan']= $this->tagihan->jumlahNop();
        $this->data['pembayaran']= $this->pembayaran->jumlahTransaksi();
        $s_nop=$this->kriptografi->enkripsi("BELUM DIBAYAR",$this->kunci);
        $this->data['lunas']= $this->tagihan->jumlahLunas($s_nop);
        $s_val=$this->kriptografi->enkripsi("MENUNGGU VALIDASI",$this->kunci);
        $this->data['validasi']=$this->pembayaran->jumlahTunggu($s_val);
        $s_p=$this->kriptografi->enkripsi("MENUNGGU PEMBAYARAN",$this->kunci);
        $this->data['proses']=$this->pembayaran->jumlahProses($s_p);
        $this->load->view('templates/kdesa_header', $this->data);
        $this->load->view('templates/kades_topbar');
        $this->load->view('templates/kades_sidebar');
        $this->load->view('kades/index');
        $this->load->view('templates/kades_footer');
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

    function laporan_wp()
    {
        ob_start();
        $pdf = new FPDF('L','mm','A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->Image(base_url('assets/dist/img/')."header.jpg",10,10,32,28,'PNG');
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(280,7,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(280,7,'KECAMATAN CIKONENG',0,1,'C');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(280,7,'DESA SINDANGSARI',0,1,'C');
        $pdf->SetFont('Arial','I',9);
        $pdf->Cell(280,7,'Alamat : Jln.Sindangsari Raya No.275 Telp (0265) 33751',0,1,'C');
        
        $pdf->SetLineWidth(1);
        $pdf->Line(10,40,280,40);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,41,280,41);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(270,7,"Tanggal : ".date('d M Y m:i:s',time()),0,1,'R');
        $pdf->SetFont('Arial','BU',12);
        $pdf->Cell(280,7,'LAPORAN WAJIB PAJAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0,'C');
        $pdf->Cell(95,6,'NAMA',1,0,'C');
        $pdf->Cell(40,6,'KONTAK',1,0,'C');
        $pdf->Cell(120,6,'ALAMAT',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $data = $this->wp->showData('wajib_pajak');
        $no=1;
        foreach ($data as $value){
            $pdf->Cell(15,6,$no,1,0,'C');
            $pdf->Cell(95,6,$this->kriptografi->deskripsi($value['nama_wp'],$this->kunci),1,0);
            $kontak=explode("|",$this->kriptografi->deskripsi($value['login_wp'],$this->kunci));
            $pdf->Cell(40,6,$kontak[0],1,0,'C');
           $data_wp=explode("|",$this->kriptografi->deskripsi($value['data_wp'],$this->kunci));
           $pdf->Cell(120,6,$data_wp[0]."/".$data_wp[1]." ".$data_wp[2].",".$data_wp[3].",".$data_wp[4].",".$data_wp[5],1,1);
        $no++;
        }
        $file_name="Laporan Wajib_Pajak-".date('dMY_m:i:s',time()).".pdf";
        $pdf->Output($file_name,"D");
    }

    function laporan_tagihan()
    {
        ob_start();
        $pdf = new FPDF('L','mm','A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image(base_url('assets/dist/img/')."header.jpg",10,10,32,28,'PNG');
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(280,7,'PEMERINTAH KABUPATEN CIAMIS',0,1,'C');
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(280,7,'KECAMATAN CIKONENG',0,1,'C');
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(280,7,'DESA SINDANGSARI',0,1,'C');
        $pdf->SetFont('Arial','I',9);
        $pdf->Cell(280,7,'Alamat : Jln.Sindangsari Raya No.275 Telp (0265) 33751',0,1,'C');
        
        $pdf->SetLineWidth(1);
        $pdf->Line(10,40,280,40);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,41,280,41);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(270,7,"Tanggal : ".date('d M Y m:i:s',time()),0,1,'R');
        $pdf->SetFont('Arial','BU',12);
        $pdf->Cell(280,7,'LAPORAN TAGIHAN PAJAK BUMI DAN BANGUNAN',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15,6,'NO',1,0,'C');
        $pdf->Cell(50,6,'NOP',1,0,'C');
        $pdf->Cell(20,6,'TAHUN',1,0,'C');
        $pdf->Cell(30,6,'BESAR PAJAK',1,0,'C');
        $pdf->Cell(70,6,'NAMA WAJIB PAJAK',1,0,'C');
        $pdf->Cell(80,6,'STATUS',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $data = $this->tagihan->showData();
        $no=1;
        $total_lunas=0;
        $total_belum_lunas=0;
        $total_media_lain=0;
        $output="";
        foreach ($data as $value){
            $pdf->Cell(15,6,$no,1,0,'C');
            $kode=$this->kriptografi->deskripsi($value['kode'],$this->kunci);
            $pdf->Cell(50,6,substr($kode,0,18),1,0,'C');
            $pdf->Cell(20,6,substr($kode,18,4),1,0,'C');
            $data_tagihan=explode("|",$this->kriptografi->deskripsi($value['data_tagihan'],$this->kunci));
            $pdf->Cell(30,6,"Rp.".number_format($data_tagihan[7]),1,0,'C');
            if($value['id_wp']){$output=$this->kriptografi->deskripsi($value['nama_wp'],$this->kunci);}else{$output="";}
            $pdf->Cell(70,6,$output,1,0,'C');
            $status=$this->kriptografi->deskripsi($value['status_nop'],$this->kunci);
            $pdf->Cell(80,6,$status,1,1,"C");
            if($status=="LUNAS"){
                $total_lunas+=$data_tagihan[7];
            }elseif($status=="BELUM DIBAYAR"){
                $total_belum_lunas+=$data_tagihan[7];
            }elseif($status=="MEDIA LAIN"){
                $total_media_lain+=$data_tagihan[7];
            }
            
           $no++;
        }
        $pdf->Cell(80,7,'Total Lunas',0,0,);
        $pdf->Cell(10,7,"Rp.",0,0);
        $pdf->Cell(30,7,number_format($total_lunas),0,1,'R');
        $pdf->Cell(80,7,'Total Belum Lunas',0,0,);
        $pdf->Cell(10,7,"Rp.",0,0);
        $pdf->Cell(30,7,number_format($total_belum_lunas),0,1,'R');
        $pdf->Cell(80,7,'Total Pembayaran Media Lain',0,0);
        $pdf->Cell(10,7,"Rp.",0,0);
        $pdf->Cell(30,7,number_format($total_media_lain),0,1,'R');
        $file_name="Laporan Tagihan-".date('dMY_m:i:s',time()).".pdf";
        $pdf->Output($file_name,"D");
    }
}