     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body">
            <div class="row">
            	<div class="col-md-12">
      <h4>DAFTAR PELAJARAN<a href="<?= base_url('C_pelajaran/form_tambah') ?>" class="btn btn-primary float-right">Tambah</a></h4><br>
            		<?= $this->session->flashdata('message') ?>
            	<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center" width="60%">Mata Pelajaran</th>
                      <th class="text-center" width="30%">Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center" width="60%">Mata Pelajaran</th>
                      <th class="text-center" width="30%">Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                                $no = 1;
                                foreach ($data_pelajaran as $dat) {
                            ?>
                            <tr>
                              <td class="text-center"><?php echo $no++;?></td>
                              <td class="text-center"><?php echo $dat['nama_pelajaran'];?></td>
                                
                              </td>
                              <td class="text-center">
                                <a class="badge badge-info" href="<?php echo base_url().'C_pelajaran/form_tambah/'?>"> Tambah</a>
                                <a class="badge badge-warning" href="<?php echo base_url().'C_pelajaran/form_edit/'.$dat['id_pelajaran']?>"> Edit</a>
                                <a class="badge badge-danger" href="<?php echo base_url().'C_pelajaran/hapus_pelajaran/'.$dat['id_pelajaran']?>"> delete</a>
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