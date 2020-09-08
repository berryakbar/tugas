<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kelas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Silahkan login dahulu
                </div>');
            redirect('auth/login_admin');
        } elseif (!$this->session->userdata('admin')) {
            # code...
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Sillahkan login sebagai Admin
                </div>');
            redirect('auth/login_admin');
        }
        $this->load->model("M_kelas");
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['data_kelas'] = $this->M_kelas->tampil();
        $this->load->view('admin/header');
        $this->load->view('admin/kelas/index',$data);
        $this->load->view('admin/footer');
	}

	// public function hapus_kelas($id_kelas){
 //        $where = array('id_kelas' => $id_kelas);
 //        $this->M_kelas->hapus($where,'kelas');
 //        return redirect('C_kelas/index'); 
 //    }

    public function hapus_kelas($id_kelas){
        $where = array('id_kelas' => $id_kelas);
        $cek = $this->M_kelas->cek_forgen('siswa','id_kelas',$id_kelas);

        if ($cek==0) {
            $hasil = $this->M_kelas->hapus($where,'kelas');
            if ($hasil) { 
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                        Data berhasil dihapus
                    </div>');
                redirect('C_kelas/index'); 
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Data gagal dihapus
                    </div>');
                redirect('C_kelas/index'); 
            } 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Gagal dihapus karena ada siswa yang terdaftar di kelas ini.
                        <br> Jika ingin menghapus, terlebih dahulu silahkan hapus siswa yang terdaftar.
                    </div>');
            redirect('C_kelas/index'); 
        }
    }

	public function form_tambah(){
        $data['data_kelas'] = $this->M_kelas->tampil();
        $this->load->view('admin/header');
        $this->load->view('admin/kelas/tambah',$data);
        $this->load->view('admin/footer');
    }

    public function form_edit($id){
        $data['kelas'] = $this->M_kelas->tampil('kelas');
        $data['awal'] = $this->M_kelas->tampil_kelas_satu($id);
        $this->load->view('admin/header');
        $this->load->view('admin/kelas/edit',$data);
        $this->load->view('admin/footer');
    }

    public function tambah(){
        $id_kelas=$this->input->post('id_kelas');
        $nama_kelas=$this->input->post('nama_kelas');

        $data = array(
            'id_kelas' => '',
            'nama_kelas' => $nama_kelas
                     );

        $this->db->insert('kelas',$data);
        return redirect('C_kelas');
    }

    public function edit($id){
        $id_kelas=$this->input->post('id_kelas');
        $nama_kelas=$this->input->post('nama_kelas');

        $data = array(
            'id_kelas' => $id,
            'nama_kelas' => $nama_kelas
                     );

        $this->db->where('id_kelas',$id);
        $this->db->update('kelas',$data);
        return redirect('C_kelas');
    }
}
