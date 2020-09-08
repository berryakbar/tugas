<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model
{

	public function tampil(){
        $this->db->from('siswa');
        $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas');
		$query=$this->db->get();
        return $query->result_array();
    }

    public function tampil_siswa($tabel){
        $this->db->from($tabel);
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function tampil_siswa_satu($id){
        $this->db->from('siswa');
        $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas');
        $this->db->where('nis',$id);
        $query=$this->db->get();
        return $query->row_array();
    }

    public function tampil_data_diri_siswa($id){
        $this->db->from('siswa');
        $this->db->join('kelas','kelas.id_kelas = siswa.id_kelas');
        $this->db->where('nis',$id);
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