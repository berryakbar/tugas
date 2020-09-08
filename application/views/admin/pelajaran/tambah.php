     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>TAMBAH PELAJARAN<a href="<?= base_url('C_pelajaran') ?>" class="btn btn-primary float-right">Daftar Pelajaran</a></h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('C_pelajaran/tambah') ?>" method="post">
                <div class="form-group row">
                  <div class="col-md-8">
                    <label>Nama Pelajaran</label>
                    <input class="form-control" type="text" name="nama_pelajaran">
                  </div>
                </div>
                <div class="form-group">
                  <br><button class="btn btn-primary" type="submit">Tambah</button>
                </div>
                </form>
            </div>
    </div>
</div>