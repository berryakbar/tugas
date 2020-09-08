     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body">
            <div class="row">
            	<div class="col-md-12">
      <h4>DAFTAR KELAS<a href="<?= base_url('C_kelas/form_tambah') ?>" class="btn btn-primary float-right">Tambah</a></h4><br>
            		<?= $this->session->flashdata('message') ?>
            	<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center" width="60%">Kelas</th>
                      <th class="text-center" width="30%">Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center" width="60%">Kelas</th>
                      <th class="text-center" width="30%">Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                                $no = 1;
                                foreach ($data_kelas as $dat) {
                            ?>
                            <tr>
                              <td class="text-center"><?php echo $no++;?></td>
                              <td class="text-center"><?php echo $dat['nama_kelas'];?></td>
                                
                              </td>
                              <td class="text-center">
                                <a class="badge badge-info" href="<?php echo base_url().'C_kelas/form_tambah/'?>"> Tambah</a>
                                <a class="badge badge-warning" href="<?php echo base_url().'C_kelas/form_edit/'.$dat['id_kelas']?>"> Edit</a>
                                <a class="badge badge-danger" href="<?php echo base_url().'C_kelas/hapus_kelas/'.$dat['id_kelas']?>"> delete</a>
                              </td>
                            </tr>
                            <?php } ?>
                  </tbody>
                </table>
              </div>
            	</div>
            </div>
    </div>
</div>