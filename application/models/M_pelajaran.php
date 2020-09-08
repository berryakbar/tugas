<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelajaran extends CI_Model
{

	public function tampil(){
        $this->db->from('pelajaran');
		$query=$this->db->get();
        return $query->result_array();
    }
    
    public function tampil_pelajaran_satu($id){
        $this->db->from('pelajaran');
        $this->db->where('id_pelajaran',$id);
        $query=$this->db->get();
        return $query->row_array();
    }

    public function hapus($where,$tabel){
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function cek_forgen($tabel,$kolom,$isi){
        $this->db->where($kolom,$isi);
        return $this->db->get($tabel)->num_rows();
    }
}