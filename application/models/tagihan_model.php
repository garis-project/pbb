<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model 
{
  function showData(){
    $this->db->select("kode,data_tagihan,status_nop,t.id_wp,nama_wp");
    $this->db->from('tagihan t');
    $this->db->join('wajib_pajak w', 'w.id_wp=t.id_wp','left'); 
    $this->db->order_by('status_nop', 'DESC');
    return $this->db->get()->result_array();  
  }
  function tagihanWp($id){
  $this->db->select("kode,data_tagihan,status_nop,t.id_wp,nama_wp");
   $this->db->from('tagihan t');
   $this->db->join('wajib_pajak w', 'w.id_wp=t.id_wp','left'); 
   $this->db->where('t.id_wp',$id);
   return $this->db->get()->result_array();  
 }
  
  // public function fromNop($nop,$tahun){
  //   $this->db->where([ 'nop'=> $nop, 'tahun'=> $tahun]); // Untuk menambahkan query where LIKE
  //   return $this->db->get('tagihan')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  // }

  function getTagihan($kode){
    $this->db->select("kode,data_tagihan,status_nop,t.id_wp,nama_wp");
    $this->db->from('tagihan t');
    $this->db->join('wajib_pajak w', 'w.id_wp=t.id_wp','left');
    $this->db->where('kode',$kode);
    return $this->db->get()->row_array();
  }
  function byCode($code){
    $this->db->select("kode,data_tagihan,status_nop,t.id_wp,nama_wp");
    $this->db->from('tagihan t');
    $this->db->join('wajib_pajak w', 'w.id_wp=t.id_wp','left');
    $this->db->where('kode',$code);
    return $this->db->get()->result_array();
  }
  function byWp($id_wp){
    $this->db->select("kode,data_tagihan,status_nop,t.id_wp,nama_wp");
    $this->db->from('tagihan t');
    $this->db->join('wajib_pajak w', 'w.id_wp=t.id_wp','left');
    $this->db->where('t.id_wp',$id_wp);
    return $this->db->get()->result_array();
  }
  
  function updateTagihan($kode,$data){
     $this->db->where('kode',$kode); 
     $this->db->update('tagihan', $data);
  } 


   public function hapus($kode){
    $this->db->where('kode',$kode);// Untuk menambahkan query where LIKE
    $this->db->delete('tagihan');// Eksekusi query sql sesuai kondisi diatas
  }

  function showByStatus($status,$id){
    $this->db->select("kode,data_tagihan,status_nop,t.id_wp,nama_wp");
    $this->db->from('tagihan t');
    $this->db->join('wajib_pajak w', 'w.id_wp=t.id_wp','left');
    $this->db->where(["status_nop"=>$status,"t.id_wp"=>$id]);
    return $this->db->get()->result_array();  
  }

  function jumlahNop(){
    $sql="SELECT count(kode) AS jumlah_nop FROM tagihan";
    return $query = $this->db->query($sql)->row_array(); 
  }

  function jumlahLunas($status){
    $sql="SELECT count(kode) AS jml FROM tagihan WHERE status_nop='".$status."'";
    return $query = $this->db->query($sql)->row_array(); 
  }
}

  