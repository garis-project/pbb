<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_model extends CI_Model 
{
  function showData(){
   $sql="SELECT data_mutasi,w.nama_wp as nama_wp_lama, w2.nama_wp as nama_wp_baru FROM mutasi m LEFT JOIN wajib_pajak w ON m.id_wp_lama=w.id_wp LEFT JOIN wajib_pajak w2 ON m.id_wp_baru=w2.id_wp";
    return $this->db->query($sql)->result_array();
  }

  function getData($id){
    $sql="SELECT data_mutasi,w.nama_wp as nama_wp_lama, w2.nama_wp as nama_wp_baru FROM mutasi m LEFT JOIN wajib_pajak w ON m.id_wp_lama=w.id_wp LEFT JOIN wajib_pajak w2 ON m.id_wp_baru=w2.id_wp WHERE id_wp_lama='".$id."' OR id_wp_baru='".$id."'";
     return $this->db->query($sql)->result_array();
   }

  function getWp($id){
    return $query = $this->db->get_where('wajib_pajak',['id_wp'=>$id])->row_array();    
  }
     
  function updateWp($id,$data){
    $this->db->where('id_wp', $id);
    $this->db->update('wajib_pajak', $data);
  } 
  
  public function fromName($search){
    $this->db->where('nama_wp', $search); // Untuk menambahkan query where LIKE
    return $this->db->get('wajib_pajak')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }

}

  