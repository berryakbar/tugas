     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>EDIT FITUR LOGIN</h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <form action="<?= base_url('C_tampilan_login_user/edit/').$data_login_id['id'] ?>" method="post">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Info</label>
                    <input value="<?= $data_login_id['info'] ?>" class="form-control" type="text" name="info">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Gambar</label>
                    <input class="form-control" type="file" name="gambar">
                  </div>
                </div>
                <div class="form-group">
                  <br><button class="btn btn-primary" type="submit">Perbarui</button>
                </div>
                </form>
            </div>
    </div>
</div>