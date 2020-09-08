     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body">
            <div class="row">
            	<div class="col-md-12">
      <h4>TAMPILAN LOGIN USER</h4><br>
            		<?= $this->session->flashdata('message') ?>
            	<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center" width="20%">Info</th>
                      <th class="text-center" width="50%">Gambar</th>
                      <th class="text-center" width="30%">Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" width="20%">Info</th>
                      <th class="text-center" width="50%">Gambar</th>
                      <th class="text-center" width="30%">Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                                $no = 1;
                                foreach ($data_login as $dat) {
                            ?>
                            <tr>
                              <!-- <td class="text-center"><?php echo $no++;?></td> -->
                              <td class="text-center"><?php echo $dat['info'];?></td>
                              <td class="text-center"><?php echo $dat['gambar'];?></td>
                              </td>
                              <td class="text-center">
                                <a class="badge badge-warning" href="<?php echo base_url().'C_tampilan_login_user/form_edit/'.$dat['id']?>"> Edit</a>
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