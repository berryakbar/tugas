<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_tampilan_login_user extends CI_Model
{

	public function tampil(){
        $this->db->from('fitur_login');
		$query=$this->db->get();
        return $query->result_array();
    }
    
    public function tampil_login_satu($id){
        $this->db->from('fitur_login');
        $this->db->where('id',$id);
        $query=$this->db->get();
        return $query->row_array();
    }

    public function hapus($where,$tabel){
        $this->db->where($where);
        $this->db->delete($tabel);

        return $this->db->affected_rows();
    }

    public function cek_forgen($tabel,$kolom,$isi){
        $this->db->where($kolom,$isi);
        return $this->db->get($tabel)->num_rows();
    }


}