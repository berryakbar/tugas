     <div class="card border-primary mt-3 animated--grow-in">
       <div class="card-header bg-primary text-white">
       </div>
       <div class="card-body">
         <div class="row">
           <div class="col-md-12">
             <h4>DAFTAR TUGAS<a href="<?= base_url('C_Tugas/form_tambah') ?>" class="btn btn-primary float-right">Tambah</a></h4><br>
             <?= $this->session->flashdata('message') ?>
             <div class="row">
               <?php foreach ($kelas as $k) : ?>
                 <div class="col-md-4">
                   <div class="card border-primary">
                     <div class="card-header text-center bg-warning"><strong><?= $k['nama_kelas'] ?></strong></div>
                     <?php foreach ($data_siswa as $dat) : ?>
                       <?php if ($dat->id_kelas === $k['id_kelas']) : ?>
                         <div class="card-body">
                           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities<?= $dat->id_tugas ?>" aria-expanded="true" aria-controls="collapseUtilities">
                             <?= $dat->nama_pelajaran ?> (<span><?= $dat->batas_tugas ?></span>)
                           </a>
                           <div id="collapseUtilities<?= $dat->id_tugas ?>" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                             <div class="bg-white py-2 collapse-inner rounded text-center">
                               <a class="badge badge-info" href="<?php echo base_url() . 'C_tugas/info/' . $dat->id_tugas . '/' . $dat->id_kelas ?>"> Info</a>
                               <a class="badge badge-warning" href="<?php echo base_url() . 'C_tugas/form_edit/' . $dat->id_tugas ?>"> Edit</a>
                               <a class="badge badge-danger" href="<?php echo base_url() . 'C_tugas/hapus_tugas/' . $dat->id_tugas ?>"> Delete</a>
                             </div>
                           </div>
                         </div>
                       <?php endif ?>
                     <?php endforeach ?>
                   </div>
                 </div>
               <?php endforeach ?>
             </div>
             <?= $this->session->flashdata('message') ?>
           </div>
         </div>
       </div>
     </div>