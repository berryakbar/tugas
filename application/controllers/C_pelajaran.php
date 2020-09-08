<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelajaran extends CI_Controller {

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
        $this->load->model("M_pelajaran");
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['data_pelajaran'] = $this->M_pelajaran->tampil();
        $this->load->view('admin/header');
        $this->load->view('admin/pelajaran/index',$data);
        $this->load->view('admin/footer');
	}

	public function hapus_pelajaran($id){
        $where = array('id_pelajaran' => $id);
        $cek = $this->M_pelajaran->cek_forgen('pelajaran','id_pelajaran',$id);

        if ($cek==0) {
            $hasil = $this->M_pelajaran->hapus($where,'pelajaran');
            if ($hasil) {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                        Data berhasil dihapus
                    </div>');
                redirect('C_pelajaran/index'); 
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Data gagal dihapus
                    </div>');
                redirect('C_pelajaran/index'); 
            } 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Gagal dihapus karena tedapat tugas pada pelajaran ini.
                        <br> Jika ingin menghapus, terlebih dahulu silahkan hapus tugas yang ada pada pelajaran ini.
                    </div>');
            redirect('C_pelajaran/index'); 
        }

        // $this->M_pelajaran->hapus($where,'pelajaran');
        // return redirect('C_pelajaran/index'); 
    }

	public function form_tambah(){
        $data['data_pelajaran'] = $this->M_pelajaran->tampil();
        $this->load->view('admin/header');
        $this->load->view('admin/pelajaran/tambah',$data);
        $this->load->view('admin/footer');
    }

    public function form_edit($id){
        $data['awal'] = $this->M_pelajaran->tampil_pelajaran_satu($id);
        $this->load->view('admin/header');
        $this->load->view('admin/pelajaran/edit',$data);
        $this->load->view('admin/footer');
    }

    public function tambah(){
        $id_pelajaran=$this->input->post('id_pelajaran');
        $nama_pelajaran=$this->input->post('nama_pelajaran');
        
        $data = array(
            'id_pelajaran' => '',
            'nama_pelajaran' => $nama_pelajaran
                     );

        $this->db->insert('pelajaran',$data);
        return redirect('C_pelajaran');
    }

    public function edit($id){
        $id_pelajaran=$this->input->post('id_pelajaran');
        $nama_pelajaran=$this->input->post('nama_pelajaran');

        $data = array(
            'id_pelajaran' => $id_pelajaran,
            'nama_pelajaran' => $nama_pelajaran
                     );

        $this->db->where('id_pelajaran',$id);
        $this->db->update('pelajaran',$data);
        return redirect('C_pelajaran');
    }
}
