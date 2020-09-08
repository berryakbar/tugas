<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Crud');
		$this->load->model('M_auth');
	}
	public function login_admin()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');

		if ($this->form_validation->run()==false) {
			$this->load->view('auth/login_admin');
		}else{
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));

			$hasil=$this->M_auth->cek_login('admin',$username,$password);
			if ($hasil>0) {
				$data=[
					'username'=> $hasil['username'],
					'admin'=> 1,
				];
				$this->session->set_userdata($data);
				redirect('C_tugas');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				 	username atau password salah
				</div>');
				redirect('auth/login_admin');
			}
		}
	}


	public function login_siswa()
	{
		$this->form_validation->set_rules('nis','nis','required');
		$this->form_validation->set_rules('password','password','required');

		if ($this->form_validation->run()==false) {
			
			$data['info']=$this->Crud->tampil('info');
			$this->load->view('auth/login_s',$data);

		}else{
			$nis=$this->input->post('nis');
			$password=md5($this->input->post('password'));

			$hasil=$this->M_auth->cek_login_siswa('siswa',$nis,$password);
			if ($hasil>0) {
				$data=[
					'nis'=> $hasil['nis'],
					'nama'=> $hasil['nama'],
					'id_kelas'=> $hasil['id_kelas'],
				];
				$this->session->set_userdata($data);
				redirect('C_siswa_tugas');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				 	username atau password salah
				</div>');
				redirect('auth/login_siswa');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('admin');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			 	logout success
			</div>');
		redirect('auth/login_admin');

	}

	public function logout_siswa()
	{
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id_kelas');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			 	logout success
			</div>');
		redirect('auth/login_siswa');

	}
}
