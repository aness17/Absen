<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/admin/') ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/admin/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="icon" href="<?= base_url('/fotouser/.png') ?>" style="width:200%;" type="image/ico">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/admin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/admin/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/admin/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/admin/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url('assets/admin/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url('assets/admin/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets/admin/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/admin/') ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <!-- <div class="d-none d-sm-none d-md-block d-lg-block d-xl-block text-center">
      <h1>Please use your mobile phone!</h1>
    </div> -->
    <!-- <div class="container d-md-none d-lg-none d-xl-none"> -->
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="text-center">
                <h3>Absensi Digital</h3>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <form class="row g-3 needs-validation" method="POST" action="<?= base_url('auth/login') ?>" novalidate>
                    <div></div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">NIP</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nip" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your NIP.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>assets/vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/admin/') ?>assets/js/main.js"></script>

</body>

</html>