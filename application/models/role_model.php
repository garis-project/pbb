<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role_model extends CI_Model 
{
    public function getRole($id_role)
    {
        $query="SELECT data_role FROM admin LEFT JOIN role ON role.id_role=admin.id_role WHERE role.id_role =".$id_role;;
        return $this->db->query($query)->row_array();
    }
    public function getAdmin($user)
    {
        $query="SELECT login_admin FROM admin WHERE data_admin='".$user."'";
        return $this->db->query($query)->row_array();
    }
}

  