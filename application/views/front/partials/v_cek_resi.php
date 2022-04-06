
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
   
          <header class="section-header">
            <h2>Tracking Paket</h2>
            <p>Cek Nomor Resi</p>
         </header>
          <div class="col-lg-12">
            <form action="<?= base_url('check/search'); ?>" method="post">
              <input type="text" class="form-control-lg col-lg-11" name="id" id="id"  placeholder="Masukkan nomor resi Anda..">
              <button type="submit" class="form-control-lg btn btn-primary"><img src = "<?= base_url('assets/png/bi_search.png'); ?>"/> Lacak</button>
            </form> 
          </div>
        </div>
      </div>
    </div>

   
  </footer><!-- End Footer -->