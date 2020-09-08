     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>EDIT NILAI<a href="<?= base_url('C_Tugas') ?>" class="btn btn-primary float-right">Daftar Tugas</a></h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('C_Tugas/edit_nilai/').$awal['id_tugas_terkumpul'] ?>" method="post">
                <div class="form-group">
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                  <label>Nilai</label>
                  <input type="number" name="nilai" class="form-control" value="<?= $awal['nilai'] ?>">
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Perbarui</button>
                </form>
            </div>
    </div>
</div>