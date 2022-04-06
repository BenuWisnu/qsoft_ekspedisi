<!-- ======= Footer ======= -->
<footer id="footer" class="footer">


  <div class="footer-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a class="logo d-flex align-items-center mt-3">

            <span>Alamat</span>
          </a>
          <h4 class="mt-3"></h4>
          <p>Jalan Siratalmustakim No. 666, Kec. Narmada, Kab. Lombok Barat, Prov. Nusa Tenggara Barat 83313</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>

          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Tentang Kami</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == '' ? 'active' : ''; ?>" href="<?= base_url(''); ?>">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == 'profilkami' ? 'active' : ''; ?>" href="<?= base_url('profilkami'); ?>">Profil Kami</a></li>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == 'visimisi' ? 'active' : ''; ?>" href="<?= base_url('visimisi'); ?>">Visi Misi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == 'syaratlayanan' ? 'active' : ''; ?>" href="<?= base_url('syaratlayanan'); ?>">Syarat & Layanan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == 'faq' ? 'active' : ''; ?>" href="<?= base_url('faq'); ?>">FAQ</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Ekspedisi Kami</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == 'kemitraan' ? 'active' : ''; ?>" href="<?= base_url('kemitraan'); ?>">Kemitraan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == 'pengiriman' ? 'active' : ''; ?>" href="<?= base_url('pengiriman'); ?>">Pengiriman</a></li>
            <li><i class="bi bi-chevron-right"></i> <a class=" <?= uri_string() == 'manajemengudang' ? 'active' : ''; ?>" href="<?= base_url('manajemengudang'); ?>">Manajemen Gudang</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Hubungi Kami</h4>
          <p>

            <strong>Phone:</strong> +62 819-1480-1522<br>
            <strong>Email:</strong> info@cvsinergilintasraya.com<br>
          </p>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright by <strong><span>Q-Software Logistic 2022</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
    </div>
  </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>assets/frontend/vendor/purecounter/purecounter.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/vendor/aos/aos.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>assets/frontend/js/main.js"></script>