<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Info extends CI_Controller {

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
        $this->load->model("M_Tugas");
        $this->load->model("Crud");
        $this->load->library('form_validation');
    }

    public function form_edit($id){
        $data['info'] = $this->Crud->tampil_id('info','id',$id);
        $this->load->view('admin/header');
        $this->load->view('admin/info',$data);
        $this->load->view('admin/footer');
    }

    public function edit($id){
       $alert=$this->input->post('alert');
       $profil_lama=$this->input->post('profil_lama');
        $file=$_FILES['profil']['name'];
        if ($file) {
                 $config['upload_path']          = './assets/img/';
                 $config['allowed_types']        = 'doc|docx|pdf|jpeg|jpg|png';
                 $config['max_size']             = '5000';

                 $this->load->library('upload', $config);

                 if ($this->upload->do_upload('profil')) {

                    $new_file=$this->upload->data('file_name');

                 }else{
                    $new_file= $profil_lama;
                 }
            }else{
                $new_file= $profil_lama;
            }
        $data = array(
            'alert' => $alert,
            'profil' => $new_file 
        );
        $this->db->where('id','1');
        $this->db->update('info',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                   berhasil diperbarui
                </div>');
        return redirect('C_Info/form_edit/1');
    }
}
