<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wp_model extends CI_Model 
{
  function showData($table){
    return $query = $this->db->get($table)->result_array();    
  }

  function getWp($id){
    return $query = $this->db->get_where('wajib_pajak',['id_wp'=>$id])->row_array();    
  }

  public function getNumber($id){
    $this->db->select('login_wp');
    $this->db->where('id_wp', $id); 
    // Untuk menambahkan query where LIKE
    return $this->db->get('wajib_pajak')->row_array(); // Eksekusi query sql sesuai kondisi diatas
  }
  

  function cariUser($user){
    $this->db->like('nama_wp', $user);
    return $query  = $this->db->get('wajib_pajak')->row_array();
  }
     
  function updateWp($id,$data){
    $this->db->where('id_wp', $id);
    $this->db->update('wajib_pajak', $data);
  } 
  public function getId($search){
    $this->db->where('nama_wp', $search); // Untuk menambahkan query where LIKE
    return $this->db->get('wajib_pajak')->row_array(); // Eksekusi query sql sesuai kondisi diatas
  }

  public function fromName($search){
    $this->db->where('nama_wp', $search); // Untuk menambahkan query where LIKE
    return $this->db->get('wajib_pajak')->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }

  public function hapus($id){
    $this->db->where('id_wp', $id); // Untuk menambahkan query where LIKE
    $this->db->delete('wajib_pajak');// Eksekusi query sql sesuai kondisi diatas
  }

   function jumlahWp(){
    $sql="SELECT count(id_wp) AS jumlah_wp FROM wajib_pajak";
    return $query = $this->db->query($sql)->row_array(); 
  }



}

  