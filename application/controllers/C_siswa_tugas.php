<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_siswa_tugas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nis')) {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Silahkan login dahulu
                </div>');
            redirect('auth/login_siswa');
        } elseif (!$this->session->userdata('nama')) {
            # code...
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Sillahkan login sebagai siswa
                </div>');
            redirect('auth/login_siswa');
        }
        $this->load->model("M_Tugas");
        $this->load->model("M_kelas");
        $this->load->model("M_siswa");
        $this->load->library('form_validation');
    }

	public function index()
	{
        $id_kelas=$this->session->userdata('id_kelas');
        // $data['data_tugas_terkumpul'] = $this->M_Tugas->tampil_tugas_terkumpul($id_tugas);
		$data['data_siswa'] = $this->M_Tugas->tampil_tugas_siswa($id_kelas);
        $this->load->view('admin/header_siswa');
        $this->load->view('siswa/daftar_tugas',$data);
        $this->load->view('admin/footer');
	}

    public function info($id)
    {
        $data['data_tugas_terkumpul'] = $this->M_Tugas->tampil_tugas_terkumpul($id);
        $this->load->view('admin/header');
        $this->load->view('admin/tugas/terkumpul',$data);
        $this->load->view('admin/footer');
    }

	public function hapus_tugas($id_tugas){
        $where = array('id_tugas' => $id_tugas);
        $this->M_Tugas->hapus($where,'tugas');
        return redirect('C_Tugas/index'); 
    }

	public function form_tambah(){
        $data['kelas'] = $this->M_Tugas->tampil('kelas');
        $data['pelajaran'] = $this->M_Tugas->tampil('pelajaran');
        $this->load->view('admin/header');
        $this->load->view('admin/tugas/tambah',$data);
        $this->load->view('admin/footer');
    }

    public function upload_tugas($id){
        $data['awal'] = $this->M_Tugas->tampil_tugas_satu($id);
        $this->load->view('admin/header_siswa');
        $this->load->view('siswa/upload_tugas',$data);
        $this->load->view('admin/footer');
    }

    public function upload_tugas_proses()
    {
        $nis=$this->session->userdata('nis');
        $id_tugas=$this->input->post('id_tugas');
        $tanggal=date('Y-m-d');
        $file=$_FILES['file']['name'];
        if ($file) {
                 $config['upload_path']          = './assets/img/';
                 $config['allowed_types']        = 'doc|docx|pdf|jpeg|jpg|png';
                 $config['max_size']             = '5000';

                 $this->load->library('upload', $config);

                 if ($this->upload->do_upload('file')) {

                    $new_file=$this->upload->data('file_name');

                 }else{
                    $new_file= "kosong2.png";
                 }
            }else{
                $new_file= "kosong3.png";
            }
        $data = array(
            'id_tugas' => $id_tugas,
            'nis' => $nis,
            'file_jawaban'=> $new_file,
            'tanggal'=>$tanggal, 
            'nilai'=>'-');
        $this->db->insert('tugas_terkumpul',$data);
        return redirect('C_siswa_tugas');
    }

    public function tambah(){
        $id_pelajaran=$this->input->post('id_pelajaran');
        $id_kelas=$this->input->post('id_kelas');
        $soal=$this->input->post('soal');
        $uploading=date('Y-m-d');
        $batas_kumpul=$this->input->post('batas_kumpul');

        $data = array(
            'id_tugas' => '',
            'uploading' => $uploading,
            'soal' => $soal,
            'batas_tugas' => $batas_kumpul,
            'id_pelajaran' => $id_pelajaran,
            'id_kelas' => $id_kelas
                     );

        $this->db->insert('tugas',$data);
        return redirect('C_Tugas');
    }

    public function edit($id){
        $id_pelajaran=$this->input->post('id_pelajaran');
        $id_kelas=$this->input->post('id_kelas');
        $soal=$this->input->post('soal');
        $uploading=date('Y-m-d');
        $batas_kumpul=$this->input->post('batas_kumpul');

        $data = array(
            'uploading' => $uploading,
            'soal' => $soal,
            'batas_tugas' => $batas_kumpul,
            'id_pelajaran' => $id_pelajaran,
            'id_kelas' => $id_kelas
                     );

        $this->db->where('id_tugas',$id);
        $this->db->update('tugas',$data);
        return redirect('C_Tugas');
    }

    public function reset(){
        $this->M_Tugas->reset_2();
        $this->M_Tugas->reset_1();
        return redirect('C_Tugas'); 
    }

    public function form_edit_data_diri(){
        $nis=$this->session->userdata('nis');
        $data['data_diri_siswa'] = $this->M_siswa->tampil_data_diri_siswa($nis);
        $data['kelas'] = $this->M_kelas->tampil('kelas');
        $this->load->view('admin/header_siswa');
        $this->load->view('siswa/data_diri/edit_data_diri',$data);
        $this->load->view('admin/footer');
    }

    public function edit_data_diri($id){
        $nis=$this->input->post('nis');
        $nama=$this->input->post('nama');
        // $id_kelas=$this->input->post('id_kelas');

        $data = array(
            'nis' => $nis,
            'nama' => $nama
            // 'id_kelas' => $id_kelas
                     );

        $this->db->where('nis',$id);
        $this->db->update('siswa',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Edit Data Diri Sukses
            </div>');
        return redirect('C_siswa/form_edit_data_diri');
    }

    public function form_edit_password(){
        $nis=$this->session->userdata('nis');
        $data['data_diri_siswa'] = $this->M_siswa->tampil_data_diri_siswa($nis);
        $data['kelas'] = $this->M_kelas->tampil('kelas');
        $this->load->view('admin/header_siswa');
        $this->load->view('siswa/data_diri/edit_password',$data);
        $this->load->view('admin/footer');
    }

    public function edit_password($id){
        $nama=$this->input->post('nama');
        $password=md5($this->input->post('password'));

        $data = array(
            'nama' => $nama,
            'password' => $password
                     );

        $this->db->where('nis',$id);
        $this->db->update('siswa',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Edit Password Sukses
            </div>');
        // redirect('auth/login_siswa');
        return redirect('C_siswa/form_edit_password');
    }
}
