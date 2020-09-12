<?php 
	function cek($id_tugas,$nis)
	{
		$ci=get_instance();
		$ci->load->model('Crud');
		$ada=$ci->Crud->cek_dua('tugas_terkumpul','id_tugas','nis',$id_tugas,$nis);
		return $ada;
	}

	function cek_kelas($id_kelas)
	{
		$ci=get_instance();
		$ci->load->model('Crud');
		$ada=$ci->Crud->tampil_id('kelas','id_kelas',$id_kelas);
		return $ada['nama_kelas'];
	}

	function cek_pelajaran($id_pelajaran)
	{
		$ci=get_instance();
		$ci->load->model('Crud');
		$ada=$ci->Crud->tampil_id('pelajaran','id_pelajaran',$id_pelajaran);
		return $ada['nama_pelajaran'];
	}

	function nilai($id_tugas,$nis)
	{
		$ci=get_instance();
		$ci->load->model('Crud');
		$ada=$ci->Crud->cek_dua_tampil('tugas_terkumpul','id_tugas','nis',$id_tugas,$nis);
		return $ada;
	}

