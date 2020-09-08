     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body">
            <div class="row">
            	<div class="col-md-12">
      <h4>TUGAS TERKUMPUL<a href="<?= base_url('C_Tugas/') ?>" class="btn btn-primary float-right">Daftar Tugas</a></h4><br>
            		<?= $this->session->flashdata('message') ?>
            	<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Tanggal Upload</th>
                      <th class="text-center" width="20%">File</th>
                      <th class="text-center" width="20%">Nilai</th>
                      <th class="text-center" width="20%">Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Tanggal Upload</th>
                      <th class="text-center" width="20%">File</th>
                      <th class="text-center" width="20%">Nilai</th>
                      <th class="text-center" width="20%">Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                                $no = 1;
                                foreach ($data_tugas_terkumpul as $dat) {
                            ?>
                            <tr>
                              <td class="text-center"><?php echo $no++;?></td>
                              <td class="text-center"><?php echo $dat->nama;?></td>
                              <td class="text-center"><?php echo $dat->tanggal;?></td>
                              <td class="text-center">
                                <a href="<?php echo base_url('assets/img/').$dat->file_jawaban; ?>"><?php echo $dat->file_jawaban; ?></a>
                              </td>
                              <td class="text-center"><?php echo $dat->nilai;?>
                                <a class="badge badge-warning" href="<?php echo base_url().'C_tugas/form_edit_nilai/'.$dat->id_tugas_terkumpul;?>"> Edit</a>
                              </td>
                              <td class="text-center">
                                <a class="badge badge-danger" href="<?php echo base_url().'C_tugas/hapus_tugas_terkumpul/'.$dat->id_tugas_terkumpul?>"> Delete</a>
                              </td>
                            </tr>
                            <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="table-responsive">
                <hr>
                <h3 align="center">Belum Kumpul Tugas</h3>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center">NIS</th>
                      <th class="text-center">Nama</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                                $no2 = 1;
                                foreach ($nopoka as $nop) {
                            ?>
                            <tr>
                              <td class="text-center"><?php echo $no2++;?></td>
                              <td class="text-center"><?php echo $nop->nis;?></td>
                              <td class="text-center"><?php echo $nop->nama;?></td>
                            </tr>
                            <?php } ?>
                  </tbody>
                </table>
              
            	</div>
            </div>
    </div>
</div>