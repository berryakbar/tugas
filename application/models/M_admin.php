<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model
{

	public function tampil(){
        $this->db->from('admin');
		$query=$this->db->get();
        return $query->result_array();
    }
    
    public function tampil_admin_satu($id){
        $this->db->from('admin');
        $this->db->where('username',$id);
        $query=$this->db->get();
        return $query->row_array();
    }

}