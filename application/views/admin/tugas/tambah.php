     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>TAMBAH TUGAS<a href="<?= base_url('C_Tugas') ?>" class="btn btn-primary float-right">Daftar Tugas</a></h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('C_Tugas/tambah') ?>" method="post">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Pelajaran</label>
                    <select class="form-control" name="id_pelajaran">
                      <?php foreach ($pelajaran as $p): ?>     
                      <option value="<?= $p['id_pelajaran'] ?>"><?= $p['nama_pelajaran'] ?></option>
                      <?php endforeach ?>   
                    </select>
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
                <div class="form-group">
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                  <label>Batas Pengumpulan</label>
                  <input type="date" name="batas_kumpul" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label>Soal</label>
                  <textarea class="ckeditor" id="ckedtor" name="soal"></textarea>
                  <br><button class="btn btn-primary" type="submit">Tambah</button>
                </div>
                </form>
            </div>
    </div>
</div>