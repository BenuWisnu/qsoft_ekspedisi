<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Q-Software Ekspedisi</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/frontend/png/favicon.svg" rel="icon">
  <link href="<?= base_url(); ?>assets/frontend/png/favicon.svg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?= base_url(''); ?>" class="logo d-flex align-items-center">
        <img src="<?= base_url(); ?>assets/frontend/png/logo.svg" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto <?= uri_string() == '' ? 'active' : ''; ?>" href="<?= base_url(''); ?>">Beranda</a></li>
          <li><a class="nav-link scrollto <?= uri_string() == 'article' ? 'active' : ''; ?>" href="<?= base_url('article'); ?>">Artikel</a></li>
          <li><a class="nav-link scrollto <?= uri_string() == 'callus' ? 'active' : ''; ?>" href="<?= base_url('callus'); ?>">Hubungi Kami</a></li>
          <li><a class="getstarted scrollto <?= uri_string() == 'account' ? 'active' : ''; ?>" href="<?= base_url('account'); ?>">Masuk <img src = "<?= base_url('assets/frontend/png/bi_box-arrow-in-right.png'); ?>"/></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Q-Software: Aplikasi Website Kurir Barang, Logistik, & Cek Resi</h1>
          <h4 data-aos="fade-up" data-aos-delay="400">Proses pengelolaan barang dalam hal pemindahan dan penyimpanan barang beserta infomasi terkait dari produsen atau sumber pengadaaan kepada pengguna atau konsumen secara efektif dan efisien.</h4>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Baca Selengkapnya</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/frontend/img/header.svg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->