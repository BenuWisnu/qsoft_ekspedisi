<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Q-Software Ekspedisi</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/frontend/img/icon.png" rel="icon">
    <link href="<?= base_url(); ?>assets/frontend/img/icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/frontend/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
            <header class="section-header">
                <h2>Selamat Datang</h2>
                <p>Halaman Login</p>
            </header>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100 center">
                                    <div class="post-img"><img src="assets/images/png/logo_for_admin.png" width="400px" class="img" alt=""></div>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="<?= base_url('auth/cheklogin'); ?>" method="post" class="signin-form">
                                <div class="form-group mt-3">
                                    <label class="form-control-placeholder" for="username">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan username Anda.." required>
                                </div><p></p>
                                <div class="form-group">
                                    <label class="form-control-placeholder" for="password">Kata Sandi</label>
                                    <input id="password-field" type="password" name="password" placeholder="Masukkan kata sandi Anda.." class="form-control" required>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div><p></p>
                                <div class="form-group">
                                    <button type="submit" style="background-color: #38A8EE" class="form-control btn btn-primary rounded submit px-3 mb-10">Masuk</button>
                                </div>

                                <div class="form-group text-center">
                                    <label class="center" for="username">atau</label>
                                </div>

                                <div class="form-group mb-1">
                                    <a href="" style="background-color: #9338EE" class="form-control btn btn-primary rounded submit px-3 mb-10">Masuk sebagai User</a>
                                </div>

                                <div class="form-group">
                                    <a href="" style="background-color: #386BEE" class="form-control btn btn-primary rounded submit px-3 mb-10">Masuk sebagai Admin</a>
                                </div>
                                

                                <div class="form-group d-md-flex">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url(); ?>assets/frontend/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/aos/aos.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>assets/frontend/js/main.js"></script>

</body>

</html>