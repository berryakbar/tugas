     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>EDIT KELAS<a href="<?= base_url('C_kelas') ?>" class="btn btn-primary float-right">Daftar Kelas</a></h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('C_kelas/edit/').$awal['id_kelas'] ?>" method="post">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Kelas</label>
                    <input value="<?= $awal['nama_kelas'] ?>" class="form-control" type="text" name="nama_kelas">
                  </div>
                </div>
                <div class="form-group">
                  <br><button class="btn btn-primary" type="submit">Perbarui</button>
                </div>
                </form>
            </div>
    </div>
</div>