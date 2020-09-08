<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_tugas extends CI_Model
{

	public function tampil($tabel){
        $this->db->from($tabel);
		$query=$this->db->get();
        return $query->result_array();
    }

    public function tampil_tugas(){
        $this->db->from('tugas');
		$this->db->join('pelajaran','pelajaran.id_pelajaran = tugas.id_pelajaran');
		$this->db->join('kelas','kelas.id_kelas = tugas.id_kelas');
		$query=$this->db->get();
        return $query->result();
    }
    
    public function tampil_tugas_satu($id){
        $this->db->from('tugas');
        $this->db->join('pelajaran','pelajaran.id_pelajaran = tugas.id_pelajaran');
        $this->db->join('kelas','kelas.id_kelas = tugas.id_kelas');
        $this->db->where('id_tugas',$id);
        $query=$this->db->get();
        return $query->row_array();
    }

    public function tampil_tugas_terkumpul($id){
        $this->db->from('tugas_terkumpul');
        $this->db->join('tugas','tugas.id_tugas = tugas_terkumpul.id_tugas');
        $this->db->join('siswa','siswa.nis = tugas_terkumpul.nis');
        $this->db->where('tugas_terkumpul.id_tugas',$id);
        $query=$this->db->get();
        return $query->result();
    }

    public function tampil_tugas_terkumpul1($id){
        $this->db->from('tugas_terkumpul');
        $this->db->where('id_tugas_terkumpul',$id);
        $query=$this->db->get();
        return $query->row_array();
    }

    public function tampil_tugas_siswa($id){
        $this->db->from('tugas');
        $this->db->join('pelajaran','pelajaran.id_pelajaran = tugas.id_pelajaran');
        $this->db->join('kelas','kelas.id_kelas = tugas.id_kelas');
        $this->db->where('tugas.id_kelas',$id);
        $query=$this->db->get();
        return $query->result();
    }

    public function siswa_tidak_kumpul($id_tugas,$sudah,$id_kelas){
        $this->db->from('siswa');
        $this->db->where_not_in('nis',$sudah);
        $this->db->where('id_kelas',$id_kelas);
        $query=$this->db->get();
        return $query->result();
    }

    public function siswa_tidak_kumpul_semua($id_tugas,$id_kelas){
        $this->db->from('siswa');
        $this->db->where('id_kelas',$id_kelas);
        $query=$this->db->get();
        return $query->result();
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

    public function reset_1(){
        $this->db->empty_table('tugas');
    }

    public function reset_2(){
        $this->db->empty_table('tugas_terkumpul');
    }
}