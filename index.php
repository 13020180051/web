<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="icon" href="" type="image/x-icon">
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper auth p-0 theme-two">
        <div class="row d-flex align-items-stretch">
          
          <div class="col-12 col-md-12 h-100 bg-white">
            <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
              <form action="" id="formlogin">
                <h3 class="mr-auto">Selamat Datang !</h3>
                <p class="mb-5 mr-auto">Silahkan Masukkan Data Anda</p>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                    </div>
                    <input type="text" class="form-control" required="" id="txt_username" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="mdi mdi-lock-outline"></i></span>
                    </div>
                    <input type="password" class="form-control" required="" id="txt_password" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn">SIGN IN</button>
                </div>
                <div class="wrapper mt-5 text-gray">
                  <p class="footer-text">Copyright ?? 2020 R-T.3AG & Tim. All rights reserved.</p>
                  <ul class="auth-footer text-gray">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script>
    $('#formlogin').on('submit', function (e) {
      e.preventDefault();
      var username = $('#txt_username').val();
      var password = $('#txt_password').val();
      if (username!="" && password!="") {
          $.ajax({
        type: 'post',
        url: 'datamodel.php?page=proseslogin',
        data: $('form').serialize(),
          success: function (pesan) {
            if(pesan=='Berhasil Login Sebagai Administrator'){
              //Arahkan ke halaman admin jika script pemroses mencetak kata ok
              window.location = 'admin/index.php?mod=dashboard';
            }else if(pesan=='Berhasil Login Sebagai User'){
              //Arahkan ke halaman admin jika script pemroses mencetak kata ok
              window.location = 'user/index.php?mod=dashboard';
            }else{
              //Cetak peringatan untuk username & password salah
              swal({
                title: "Gagal !",
                icon: "error",
                text: pesan,
              });
            }
          }
        });
        }
    });
  </script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>