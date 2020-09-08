<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Silahkan login dahulu
                </div>');
            redirect('auth/login_admin');
        } elseif (!$this->session->userdata('admin')) {
            # code...
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Sillahkan login sebagai Admin
                </div>');
            redirect('auth/login_admin');
        }
        $this->load->model("M_siswa");
        $this->load->model("M_kelas");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['data_siswa'] = $this->M_siswa->tampil();
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('admin/footer');
    }

    public function hapus_siswa($id)
    {
        $where = array('nis' => $id);

        $cek = $this->M_siswa->cek_forgen('siswa', 'nis', $id);

        if ($cek == 0) {
            $hasil = $this->M_siswa->hapus($where, 'siswa');
            if ($hasil) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Data berhasil dihapus
                    </div>');
                redirect('C_siswa/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Data gagal dihapus
                    </div>');
                redirect('C_siswa/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Gagal dihapus karena siswa yang bersangkutan sudah terdaftar pada kelas.
                        <br> Jika ingin menghapus, terlebih dahulu silahkan hapus kelas yang terdaftar oleh siswa ini.
                    </div>');
            redirect('C_siswa/index');
        }

        // $this->M_siswa->hapus($where,'siswa');
        // return redirect('C_siswa/index'); 
    }

    public function form_tambah()
    {
        $data['data_siswa'] = $this->M_siswa->tampil();
        $data['kelas'] = $this->M_siswa->tampil_siswa('kelas');
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/tambah', $data);
        $this->load->view('admin/footer');
    }

    public function form_edit($id)
    {
        $data['kelas'] = $this->M_kelas->tampil('kelas');
        $data['awal'] = $this->M_siswa->tampil_siswa_satu($id);
        $this->load->view('admin/header');
        $this->load->view('admin/siswa/edit', $data);
        $this->load->view('admin/footer');
    }

    public function tambah()
    {
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $password = md5($this->input->post('password'));
        $status = $this->input->post('status');
        $id_kelas = $this->input->post('id_kelas');

        $data = array(
            'nis' => $nis,
            'nama' => $nama,
            'password' => $password,
            'status' => $status,
            'id_kelas' => $id_kelas
        );

        $this->db->insert('siswa', $data);
        return redirect('C_siswa');
    }

    public function edit($id)
    {
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $password = md5($this->input->post('password'));
        $id_kelas = $this->input->post('id_kelas');

        $data = array(
            'nis' => $nis,
            'nama' => $nama,
            'password' => $password,
            'status' => $status,
            'id_kelas' => $id_kelas
        );

        $this->db->where('nis', $id);
        $this->db->update('siswa', $data);
        return redirect('C_siswa');
    }

    public function form_edit_data_diri()
    {
        $nis = $this->session->userdata('nis');
        $data['data_diri_siswa'] = $this->M_siswa->tampil_data_diri_siswa($nis);
        $data['kelas'] = $this->M_kelas->tampil('kelas');
        $this->load->view('admin/header_siswa');
        $this->load->view('siswa/data_diri/edit_data_diri', $data);
        $this->load->view('admin/footer');
    }

    public function edit_data_diri($id)
    {
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        // $id_kelas=$this->input->post('id_kelas');

        $data = array(
            'nis' => $nis,
            'nama' => $nama
            // 'id_kelas' => $id_kelas
        );

        $this->db->where('nis', $id);
        $this->db->update('siswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Edit Data Diri Sukses
            </div>');
        return redirect('C_siswa/form_edit_data_diri');
    }

    public function form_edit_password()
    {
        $nis = $this->session->userdata('nis');
        $data['data_diri_siswa'] = $this->M_siswa->tampil_data_diri_siswa($nis);
        $data['kelas'] = $this->M_kelas->tampil('kelas');
        $this->load->view('admin/header_siswa');
        $this->load->view('siswa/data_diri/edit_password', $data);
        $this->load->view('admin/footer');
    }

    public function edit_password($id)
    {
        $nama = $this->input->post('nama');
        $password = md5($this->input->post('password'));

        $data = array(
            'nama' => $nama,
            'password' => $password
        );

        $this->db->where('nis', $id);
        $this->db->update('siswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Edit Password Sukses
            </div>');
        // redirect('auth/login_siswa');
        return redirect('C_siswa/form_edit_password');
    }
}
