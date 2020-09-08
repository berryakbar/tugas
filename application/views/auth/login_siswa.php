<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MAN 3 Bantul - Login Siswa</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9 animated--grow-in">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div 
                  class="col-lg-9 d-none d-lg-block" 
                  style=" background: url(<?= base_url('assets/img/'.$info[0]['profil'].'') ?>);
                          background-position: center;
                          background-size: cover;">
                            
              </div>
              <div class="col-lg-3">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h5 text-gray-900 mb-4">Login Siswa</h1>
                  </div>
                  <?= $this->session->flashdata('message') ?>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nis" placeholder="Enter NIS" name="nis">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Enter Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <a href="<?= base_url('auth/login_admin') ?>" class="text-center"><--Login Sebagai Admin</a>
                    <hr>
                    
                    
                </div>
              </div>
              <div class="col-md-12" style="padding: 50px;">
                <center><strong><h2 style="color: red">Perhatian !!</h2></strong></center>
                <?= $info[0]["alert"] ?>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

 <!--  <div class="modal fade" id="modal_key_youtube" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">API key Youtube ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>key youtube adalah kunci untuk dapat menampilkan video secara automatis dari chanel anda pada akun desa wisata ini. adapun caranya bisa dilihat pada video di bawah ini</p>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/xM6XOkfCfMQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 -->
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>
