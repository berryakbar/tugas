     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>EDIT SISWA<a href="<?= base_url('C_siswa') ?>" class="btn btn-primary float-right">Daftar Siswa</a></h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('C_siswa/edit/').$awal['nis'] ?>" method="post">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Nomor Induk Siswa</label>
                    <input class="form-control" value="<?= $awal['nis'] ?>" type="text" name="nis">
                  </div>
                  <div class="col-md-6">
                    <label>Nama Siswa</label>
                    <input class="form-control" type="text" value="<?= $awal['nama'] ?>" name="nama">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                  </div>
                  <div class="col-md-6">
                    <label>Kelas</label>
                    <select class="form-control" name="id_kelas">
                      <?php foreach ($kelas as $k): ?>     
                      <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="AKTIF">AKTIF</option>
                      <option value="KELUAR">KELUAR</option>
                      <option value="LULUS">LULUS</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <br><button class="btn btn-primary" type="submit">Perbarui</button>
                </div>
                </form>
            </div>
    </div>
</div>