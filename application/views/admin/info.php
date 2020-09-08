     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>EDIT INFO</h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
                <?= form_open_multipart('C_info/edit/1') ?>
                  <img width="50%" src="<?= base_url('assets/img/'.$info['profil'].'') ?>">
                  <div class="form-group">
                    <input type="file" name="profil">
                    <input type="hidden" name="profil_lama" value="<?= $info['profil'] ?>">
                  </div>
                <div class="form-group">
                  <label>Soal</label>
                  <textarea class="ckeditor" id="ckedtor" name="alert"><?= $info['alert'] ?></textarea>
                  <br><button class="btn btn-primary" type="submit">Perbarui</button>
                </div>
                </form>
            </div>
    </div>
</div>