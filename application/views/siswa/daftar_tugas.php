<div class="card border-primary mt-3 animated--grow-in">
  <div class="card-header bg-primary text-white">
  </div>
    <div class="card-body">
            <div class="row">
              <div class="col-md-12">
      <h4>DAFTAR TUGAS</h4><br>
                <?= $this->session->flashdata('message') ?>
<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center">Pelajaran</th>
                      <th class="text-center" width="15%">Upload</th>
                      <th class="text-center" width="15%">Batas Tugas</th>
                      <!-- <th class="text-center" width="10%">Nilai</th> -->
                      <th class="text-center" width="15%">Status</th>
                      <th class="text-center" width="15%">nilai</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th class="text-center" width="10%">No</th>
                      <th class="text-center">Pelajaran</th>
                      <th class="text-center" width="15%">Upload</th>
                      <th class="text-center" width="15%">Batas Tugas</th>
                      <!-- <th class="text-center" width="10%">Nilai</th> -->
                      <th class="text-center" width="15%">Status</th>
                      <th class="text-center" width="15%">nilai</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                                $no = 1;
                                foreach ($data_siswa as $dat) {
                            ?>
                            <tr>
                              <td class="text-center"><?php echo $no++;?></td>
                              <td class="text-center">
                                <a href="<?= base_url('C_siswa_tugas/upload_tugas/').$dat->id_tugas ?>">
                                  <?php echo $dat->nama_pelajaran;?>     
                                </a>
                              </td>
                              <td class="text-center"><?php echo $dat->uploading;?>
                              </td>
                              <td class="text-center"><?php echo $dat->batas_tugas;?>
                              <!-- <td class="text-center"><?php echo $tampil_tugas_terkumpul->nilai;?> -->
                              <td class="text-center" width="15%">
                                <?php $s=cek($dat->id_tugas,$this->session->userdata('nis')) ?>
                                <?php if ($s == 0): ?>
                                  <button class="btn btn-warning"> belum</button>
                                <?php else: ?>
                                  <button class="btn btn-success"> Sudah</button>
                                <?php endif ?>
                              </td>
                              <td>
                                <?php $n=nilai($dat->id_tugas,$this->session->userdata('nis')); 
                                 echo $n['nilai'];
                                ?>
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