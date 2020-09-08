     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>EDIT PASSWORD ADMIN</h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('C_admin/edit_password/').$data_admin['username'] ?>" method="post">
                <div class="form-group row">
                  <!-- <div class="col-md-6">
                    <label>Nomor Induk Siswa</label>
                    <input class="form-control" value="<?= $data_diri_siswa['nis'] ?>" type="text" name="nis" readonly>
                  </div> -->
                  <div class="col-md-6">
                    <label>Username</label>
                    <input class="form-control" type="text" value="<?= $data_admin['username'] ?>" name="username" readonly>
                  </div>
                  <div class="col-md-6">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                  </div>
                </div>
               <!--  <div class="form-group row">
                  <div class="col-md-6">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                  </div>
                  <div class="col-md-6">
                    <label>Kelas</label>
                    <select class="form-control" name="id_kelas" disabled>
                      <?php foreach ($kelas as $k): ?>     
                      <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div> -->
                <div class="form-group">
                  <br><button class="btn btn-primary" type="submit">Perbarui</button>
                </div>
                </form>
            </div>
    </div>
</div>