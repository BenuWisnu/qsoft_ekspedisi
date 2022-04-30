<?php
    $qrCode = new QrCode(123); // mengambil data kode siswa sebagai data  QR code
    $qrCode->writeFile('tes.png'); // direktori untuk menyimpan gambar QR code
    ?>
    <!-- tampilkan gambar QR code -->
    <img src="<?= base_url('./QRcode/' . $row->nama . '.png') ?>" alt="QRcode-siswa" width="100px">