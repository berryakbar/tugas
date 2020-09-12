     
<div class="card border-primary mt-3 animated--grow-in">
	<div class="card-header bg-primary text-white">
 	</div>
    <div class="card-body bg-gray-200">
            	<div class="col-md-12">
                <p><h4>UPLOAD TUGAS<a href="<?= base_url('C_siswa_tugas') ?>" class="btn btn-primary float-right">Daftar Tugas</a></h4>
                <br></p>
            		<?= $this->session->flashdata('message') ?>
               <?= form_open_multipart('C_siswa_tugas/upload_tugas_proses') ?>
                <div class="form-group">
                </div>
                <div class="form-group">
                  <label>Soal : </label>
                  <p style="border: blue solid 1px"><?= $awal['soal'] ?></p>
                  <input type="hidden" name="id_tugas" class="form-control" value="<?= $awal['id_tugas'] ?>">
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                  <label>Batas Pengumpulan : </label>
                  <input type="text" readonly class="form-control" value="<?= $awal['batas_tugas'] ?>">
                  </div>
                </div>
                <?php if ($awal['batas_tugas']<date('Y-m-d')){ ?>
                  <p style="color: red">anda telah melewati batas upload, dan tidak dapat mengupload tugas ini</p>
                <?php }else{ ?>
                  <div class="form-group">
                  <label class="text-center">Upload Jawaban : </label>
                  <input type="file" name="file" class="btn-primary">
                  <p>
                    <b>pernyarata file:</b><br>
                    1. berjenis file (doc,docx,pdf,jpeg,jpg,png).<br>
                    2. ukuran kurang dari 5 MB
                  </p>
                  </div>
                  <br><button class="btn btn-primary" type="submit">kirim</button>
                <?php } ?>
                </form>
            </div>
    </div>
</div>