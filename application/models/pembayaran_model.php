<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model 
{
  function showData($id){
      $sql=" SELECT data_admin,p.id_pembayaran, nama_wp ,data_pembayaran, status_pembayaran FROM pembayaran p  LEFT JOIN wajib_pajak w ON w.id_wp=p.id_wp LEFT JOIN admin a ON a.id=p.id WHERE p.id_wp='".$id."'";
     return $query = $this->db->query($sql)->result_array();  
  } 
  function showDetail($id){
    $sql=" SELECT id_pembayaran,d.kode,data_tagihan FROM detail_pembayaran d LEFT JOIN tagihan t ON d.kode=t.kode WHERE id_pembayaran='".$id."'";
   return $query = $this->db->query($sql)->result_array();  
  } 
  function showAllData($status){
    $sql=" SELECT p.id_pembayaran, nama_wp ,data_pembayaran, status_pembayaran FROM pembayaran p  LEFT JOIN wajib_pajak w ON w.id_wp=p.id_wp WHERE status_pembayaran='".$status."'";
   return $query = $this->db->query($sql)->result_array();  
} 

function getPembayaran($id){
  $sql=" SELECT id_pembayaran, data_pembayaran, status_pembayaran FROM pembayaran WHERE id_pembayaran='".$id."'";
 return $query = $this->db->query($sql)->row_array();  
} 
function updatePembayaran($id,$data){
  $this->db->where('id_pembayaran',$id); 
  $this->db->update('pembayaran', $data);
}
function getDetail($id){
  $this->db->select('kode');
  $this->db->where('id_pembayaran',$id);
  return $this->db->get('detail_pembayaran')->result_array();  
}
function getRow($id){
  $this->db->select('kode');
  $this->db->where('id_pembayaran',$id);
  return $this->db->get('detail_pembayaran')->num_rows();  
}
function getTotal($id){
  $sql=" SELECT data_pembayaran FROM pembayaran WHERE id_pembayaran='".$id."'";
 return $query = $this->db->query($sql)->row_array();  
} 
  function verifData($status){
    $sql=" SELECT p.id_pembayaran, nama_wp ,sum(harga) as total, status_pembayaran, id, tanggal_pembayaran, tanggal_validasi FROM pembayaran p LEFT JOIN detail_pembayaran d ON d.id_pembayaran=p.id_pembayaran LEFT JOIN wajib_pajak w ON w.id_wp=p.id_wp WHERE status_pembayaran='".$status."' GROUP BY p.id_pembayaran";
   return $query = $this->db->query($sql)->result_array();  
} 

function getData($id){
  $sql=" SELECT p.id_pembayaran, nama_wp ,sum(harga) as total, status_pembayaran, id, tanggal_pembayaran, tanggal_validasi FROM pembayaran p LEFT JOIN detail_pembayaran d ON d.id_pembayaran=p.id_pembayaran LEFT JOIN wajib_pajak w ON w.id_wp=p.id_wp WHERE id_pembayaran='".$id."' GROUP BY p.id_pembayaran";
 return $query = $this->db->query($sql)->result_array();  
} 
function listData($id_pembayaran){
  $sql=" SELECT * FROM detail_pembayaran WHERE id_pembayaran='".$id_pembayaran."'";
 return $query = $this->db->query($sql)->result_array();  
} 

  function showAll($table){
  	$this->db->select('harga');
    return $this->db->get($table)->result_array();  
  }

   function hitung(){
     $sql="SELECT harga FROM tmp_detail_pembayaran";
    return $this->db->query($sql)->result_array();
  }
  function jumlahData(){
    $sql="SELECT data_tagihan FROM tmp_detail_pembayaran d LEFT JOIN tagihan t ON d.kode=t.kode";
   return $this->db->query($sql)->num_rows();
 }

  function hapus($kode){
    $this->db->where('kode',$kode);// Untuk menambahkan query where LIKE
    $this->db->delete('tmp_detail_pembayaran');// Eksekusi query sql sesuai kondisi diatas
  }

    function list_tagihan($status){
    $sql="SELECT t.id_wp,nama_wp,kontak_wp, sum(harga) as nominal FROM tagihan t LEFT JOIN wajib_pajak w ON w.id_wp=t.id_wp WHERE status_nop='".$status."' GROUP BY t.id_wp";
     return $query = $this->db->query($sql)->result_array();  
  } 

  function simpan_detail_pembayaran(){
    $sql="INSERT INTO detail_pembayaran (id_pembayaran,kode,harga ) SELECT * FROM tmp_detail_pembayaran";
    $this->db->query($sql);
  } 

  function maxId(){
    $sql="SELECT MAX(id_pembayaran) AS id FROM pembayaran";
     return $query = $this->db->query($sql)->row_array();  
  } 

  function clearData(){
    $sql="TRUNCATE tmp_detail_pembayaran";
    $this->db->query($sql);
  } 

   function jumlahTransaksi(){
    $sql="SELECT count(id_pembayaran) AS jumlah_transaksi FROM pembayaran";
    return $query = $this->db->query($sql)->row_array(); 
  }

  function updateData($data,$id){
      $this->db->where('id_pembayaran',$id); 
      $this->db->update('pembayaran', $data);
   } 

   function jumlahTunggu($status){
    $sql="SELECT count(id_pembayaran) AS jml FROM pembayaran WHERE status_pembayaran='".$status."'";
    return $query = $this->db->query($sql)->row_array(); 
   }

   function jumlahProses($status){
    $sql="SELECT count(id_pembayaran) AS jml FROM pembayaran WHERE status_pembayaran='".$status."'";
    return $query = $this->db->query($sql)->row_array(); 
   }

   function max(){
    $sql="SELECT MAX(id_pembayaran) as id FROM pembayaran";
    return $query = $this->db->query($sql)->row_array(); 
   }

   function getNumber($id){
    $sql="SELECT login_wp FROM pembayaran p LEFT JOIN wajib_pajak w ON p.id_wp=w.id_wp WHERE id_pembayaran='".$id."'";
    return $query = $this->db->query($sql)->row_array(); 
   }
}

  