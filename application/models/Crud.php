<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {

	public function tampil($tabel)
	{
		return $this->db->get($tabel)->result_array();
	}
	public function tambah($tabel,$data)
	{
		$this->db->insert($tabel,$data);
		return $this->db->affected_rows();
	}
	public function hapus($tabel,$id)
	{
		$this->db->delete($tabel,$id);
		return $this->db->affected_rows();
	}
	public function tampil_id($tabel,$pk,$id)
	{
		$this->db->where($pk,$id);
		return $this->db->get($tabel)->row_array();
	}

	public function tampil_tamu($tabel,$tamu,$id)
	{
		$this->db->where($tamu,$id);
		return $this->db->get($tabel)->result_array();
	}

	public function edit($tabel,$pk,$id,$data)
	{
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
		return $this->db->affected_rows();
	}
	public function cek_dua($tabel,$kolom1,$kolom2,$isi1,$isi2){
		$this->db->where($kolom1,$isi1);
		$this->db->where($kolom2,$isi2);
		return $this->db->get($tabel)->num_rows();
	}

	public function cek_dua_tampil($tabel,$kolom1,$kolom2,$isi1,$isi2){
		$this->db->where($kolom1,$isi1);
		$this->db->where($kolom2,$isi2);
		return $this->db->get($tabel)->row_array();
	}
}
