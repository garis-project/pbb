<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model 
{
  function data($table,$number,$offset){
    return $query = $this->db->get($table,$number,$offset)->result_array();    
  }

  function showData($table){
    return $query = $this->db->get($table)->result_array();    
  }
  function getWp($id){
    return $query = $this->db->get_where('wajib_pajak',['id_wp'=>$id])->row_array();    
  }
     
  function updateWp($id,$data){
    $this->db->where('id_wp', $id);
    $this->db->update('wajib_pajak', $data);
  } 
  
  public function cariWp($search){
    $this->db->like('nama_wp', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('id_wp', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get('wajib_pajak')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }

   public function cariNop($search,$normal){
      $this->db->like('nop', $search); // Untuk menambahkan query where LIKE
      $this->db->or_like('nama_nop', $search); // Untuk menambahkan query where OR LIKE
      $this->db->or_like('id_wp', $normal);
    return $this->db->get('tagihan')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  public function fromName($search){
    $this->db->where('nama_wp', $search); // Untuk menambahkan query where LIKE
    return $this->db->get('wajib_pajak')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }

   public function fromNop($nop,$tahun){
    $this->db->where([ 'nop'=> $nop, 'tahun'=> $tahun]); // Untuk menambahkan query where LIKE
    return $this->db->get('tagihan')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }

}

  