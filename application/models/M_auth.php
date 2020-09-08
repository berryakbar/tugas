<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function cek_login($tabel,$username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password',$password);
		return $this->db->get($tabel)->row_array();
	}

	public function cek_login_siswa($tabel,$nis,$password)
	{
		$this->db->where('nis', $nis);
		$this->db->where('password',$password);
		$this->db->where('status','AKTIF');
		return $this->db->get($tabel)->row_array();
	}
}
