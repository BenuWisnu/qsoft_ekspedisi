<!DOCTYPE html>
<html lang="en">

<?php include_once("partials/v_header.php"); ?>



  <main id="main">
    <!-- ======= Cek Resi Section ======= -->
    
    <?php include_once("partials/v_cek_resi.php"); ?>
    <!-- End Cek Resi Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

    

      <div class="container" data-aos="fade-up"> 


      <header class="section-header">
            <h2>Data pelacakan barang Anda saat ini:</h2>
      </header>
    <?php if ($flag == 0) { ?>
      <div class="box bg-danger" style="color: #FFF">
          <h3 style="color: #FFF">Maaf, ID Paket Tidak di Temukan.</h3>
          <p>Anda dapat menghubungi Pihak Admin bila paket yang telusuri tidak dapat ditemukan.</p>
      </div>
    
    <?php }

    else { ?>


      <table class="table table-ligh table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">No. Resi</th>
                  <th scope="col">Layanan</th>
                  <th scope="col">Tgl. Kirim</th>
                  <th scope="col">Kapal</th>
                  <th scope="col">Tujuan</th>
                  <th scope="col">Sopir</th>
                  <th scope="col">Biaya Ongkir</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $data) {
                  $no = 1; ?>
                  <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $data->NoNota; ?></td>
                    <td>REG</td>
                    <td><?= $data->Tanggal; ?></td>
                    <td><?= $data->Kapal; ?></td>
                    <td><?= $data->DaerahTujuan; ?></td>
                    <td><?= $data->Sopir; ?></td>
                    <td><?= $data->TotalBayarTujuan; ?></td>
                    <td>OTW</td>
                  </tr>


                <?php
                } 
                
                ?>
              
              </tbody>
      </table>



    <?php } ?>
                <p></p>

          <header class="section-header">
                <p>Layanan Kami</p>
          </header>
        

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Pengiriman Cepat & Aman</h3>
              <p>Pengiriman melalui transportasi, darat, laut, maupun udara tepat waktu dan barang aman terjamin.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Ongkos Kirim Terjangkau</h3>
              <p>Murah dan terjangkau untuk biaya ongkos kirim di setiap pengiriman (fasilitas Uang Muka & Jaminan).</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/values-3.png" class="img-fluid" alt="">
              <h3>Amanah & Terpercaya</h3>
              <p>Dengan pengadaan fasilitas Jaminan, kami akan bertanggungjawab terhadap barang kiriman Anda.</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Values Section -->

   

    <!-- ======= Features Section ======= -->
    
    <!-- End Features Section -->


    

    <!-- ======= F.A.Q Section ======= -->
    
    <!-- End F.A.Q Section -->

    <!-- ======= Portfolio Section ======= -->
    
    <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    
    <!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    
    <!-- End Clients Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <?php include_once("partials/v_blog.php"); ?>
    
    <!-- End Recent Blog Posts Section -->


    <!-- ======= Contact Section ======= -->
    
    <!-- End Contact Section -->

  </main><!-- End #main -->


<?php include_once("partials/v_footer.php"); ?>


</body>

</html>