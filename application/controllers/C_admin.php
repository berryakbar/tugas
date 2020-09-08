<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
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
        $this->load->model("M_admin");
        $this->load->library('form_validation');
    }

    public function form_edit_password()
    {
        $username = $this->session->userdata('username');
        $data['data_admin'] = $this->M_admin->tampil_admin_satu($username);
        // $data['kelas'] = $this->M_kelas->tampil('kelas');
        $this->load->view('admin/header');
        $this->load->view('admin/edit_password', $data);
        $this->load->view('admin/footer');
    }

    public function edit_password($id)
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $data = array(
            'username' => $username,
            'password' => $password
        );

        $this->db->where('username', $id);
        $this->db->update('admin', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Edit Password Sukses
            </div>');
        // redirect('auth/login_siswa');
        return redirect('C_admin/form_edit_password');
    }
}
