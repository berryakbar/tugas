<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Tugas extends CI_Controller {

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

	public function index()
	{
		$data['data_siswa'] = $this->M_Tugas->tampil_tugas();
        $this->load->view('admin/header');
        $this->load->view('admin/tugas/index',$data);
        $this->load->view('admin/footer');
	}

    // public function info($id)
    // {
    //     $data['data_tugas_terkumpul'] = $this->M_Tugas->tampil_tugas_terkumpul($id);
    //     $this->load->view('admin/header');
    //     $this->load->view('admin/tugas/terkumpul',$data);
    //     $this->load->view('admin/footer');
    // }

    public function info($id_tugas,$id_kelas)
    {
        $data['data_tugas_terkumpul'] = $this->M_Tugas->tampil_tugas_terkumpul($id_tugas);
        $data['siswa'] = $this->Crud->tampil_tamu('siswa','id_kelas',$id_kelas);
        $kamo=[];
        foreach ($data['data_tugas_terkumpul'] as $kam) {
            $kamo[]=$kam->nis;
        }
        if ($kamo==null) {
           $data['nopoka'] = $this->M_Tugas->siswa_tidak_kumpul_semua($id_tugas,$id_kelas);
            $this->load->view('admin/header');
            $this->load->view('admin/tugas/terkumpul',$data);
            $this->load->view('admin/footer');
        }else{

            $data['nopoka'] = $this->M_Tugas->siswa_tidak_kumpul($id_tugas,$kamo,$id_kelas);
            $this->load->view('admin/header');
            $this->load->view('admin/tugas/terkumpul',$data);
            $this->load->view('admin/footer');
        }
    }

    public function hapus_tugas_terkumpul($id){
        $where = array('id_tugas_terkumpul' => $id);
        $this->M_Tugas->hapus($where,'tugas_terkumpul');
        return redirect('C_Tugas/index'); 
    }

	public function hapus_tugas($id_tugas){
        $where = array('id_tugas' => $id_tugas);
        // $this->M_Tugas->hapus($where,'tugas');
        $cek = $this->M_Tugas->cek_forgen('tugas_terkumpul','id_tugas',$id_tugas);

        if ($cek==0) { 
            $hasil = $this->M_tugas->hapus($where,'tugas');
            if ($hasil) {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                        Data berhasil dihapus
                    </div>');
                redirect('C_Tugas/index'); 
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Data gagal dihapus
                    </div>');
                redirect('C_Tugas/index'); 
            } 
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Data tugas dapat dihapus jika info tugas yang terkumpul kosong.
                        <br> Silahkan hapus tugas siswa yang terkumpulkan pada tugas ini.
                    </div>');
            redirect('C_Tugas/index'); 
        }
    }

	public function form_tambah(){
        $data['kelas'] = $this->M_Tugas->tampil('kelas');
        $data['pelajaran'] = $this->M_Tugas->tampil('pelajaran');
        $this->load->view('admin/header');
        $this->load->view('admin/tugas/tambah',$data);
        $this->load->view('admin/footer');
    }

    public function form_edit($id){
        $data['kelas'] = $this->M_Tugas->tampil('kelas');
        $data['pelajaran'] = $this->M_Tugas->tampil('pelajaran');
        $data['awal'] = $this->M_Tugas->tampil_tugas_satu($id);
        $this->load->view('admin/header');
        $this->load->view('admin/tugas/edit',$data);
        $this->load->view('admin/footer');
    }

    public function form_edit_nilai($id){
        $data['awal'] = $this->M_Tugas->tampil_tugas_terkumpul1($id);
        $this->load->view('admin/header');
        $this->load->view('admin/tugas/edit_nilai',$data);
        $this->load->view('admin/footer');
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

    public function hapus_tugas_relasi($id_tugas){
        $where = array(
            'id_tugas' => $id_tugas
        );
        $hasil = $this->M_tugas->hapus_relasi('tugas',$where);

        if ($hasil) {
           $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Data tugas dapat dihapus jika info tugas yang terkumpul kosong.
                    <br> Silahkan hapus tugas yang terkumpulkan pada tugas ini.
                </div>');
            redirect('C_Tugas/index'); 
        }else{
            return redirect('C_Tugas/index');     
        }        
    }

     public function edit_nilai($id){
        $nilai=$this->input->post('nilai');
        $cek['tugas_ter'] = $this->Crud->tampil_id('tugas_terkumpul','id_tugas_terkumpul',$id);
        $cek['tugas'] = $this->Crud->tampil_id('tugas','id_tugas',$cek['tugas_ter']['id_tugas']);

        $data = array(
            'nilai' => $nilai
                     );

        $this->db->where('id_tugas_terkumpul',$id);
        $this->db->update('tugas_terkumpul',$data);
        return redirect('C_Tugas/info/'.$cek["tugas"]["id_tugas"].'/'.$cek["tugas"]["id_kelas"].'');
    }
}
