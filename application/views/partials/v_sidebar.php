
<!-- Sidebar chat start -->
<div id="sidebar" class="users p-chat-user showChat">
    <div class="had-container">
        <div class="card card_main p-fixed users-main">
            <div class="user-box">
                <div class="chat-inner-header">
                    <div class="back_chatBox">
                        <div class="right-icon-control">
                            <input type="text" class="form-control  search-text" placeholder="Search Friend"
                                id="search-friends">
                            <div class="form-icon">
                                <i class="icofont icofont-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
<?php

    $level = $this->session->userdata('level'); 

?>
<nav class="pcoded-navbar ">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class=" ">
                <a href="<?= base_url('dashboard'); ?>">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-badge label label-success">NEW</span>
                </a>
            </li>
 
        </ul>
      
        <div class="pcoded-navigatio-lavel">Menu Utama</div>
        <ul class="pcoded-item pcoded-left-item">
            <?php if ($level == "ADMIN") { ?>
        
            <?php } ?>
            <li class="">
                <a href="<?= base_url("ekspedisi"); ?>"> 
                    <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                    <span class="pcoded-mtext">Ekspedisi</span>
                </a>
            </li>
     
            <li class="">
                <a href="<?= base_url("invoice"); ?>"> 
                    <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                    <span class="pcoded-mtext">Invoice</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("pembayaran"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                    <span class="pcoded-mtext">Pembayaran</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("returkiriman"); ?>"> 
                    <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                    <span class="pcoded-mtext">Retur Kiriman</span>
                </a>
            </li>

            <li class="">
                <a href="<?= base_url("pengirimanmasuk"); ?>"> 
                    <span class="pcoded-micon"><i class="feather icon-arrow-down"></i></span>
                    <span class="pcoded-mtext">Pengiriman Masuk</span>
                </a>
            </li>

            <li class="">
                <a href="<?= base_url("pengirimankeluar"); ?>"> 
                    <span class="pcoded-micon"><i class="feather icon-arrow-up"></i></span>
                    <span class="pcoded-mtext">Pengiriman Keluar</span>
                </a>
            </li>

        </ul>
        
        <div class="pcoded-navigatio-lavel">Pengguna</div>
        <ul class="pcoded-item pcoded-left-item">
            <?php if ($level == "ADMIN") { ?>
            <li class="">
                <a href="<?= base_url("belanja/add"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <span class="pcoded-mtext">Tambah Belanja</span>
                </a>
            </li>
            <?php } ?>
            <li class="">
                <a href="<?= base_url("pelanggan"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                    <span class="pcoded-mtext">Pelanggan</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("vendorekspedisi"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                    <span class="pcoded-mtext">Vendor</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("sopir"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user-check"></i></span>
                    <span class="pcoded-mtext">Sopir</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("armada"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                    <span class="pcoded-mtext">Armada</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("karyawan"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                    <span class="pcoded-mtext">Karyawan</span>
                </a>
            </li>
            <li class="">
                <a href="<?= base_url("#"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                    <span class="pcoded-mtext">Akun</span>
                </a>
            </li>

        </ul>
       
        <div class="pcoded-navigatio-lavel">Laporan</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class=" ">
                <a href="<?= base_url("laporan"); ?>">
                    <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
                    <span class="pcoded-mtext">Laporan</span>
                </a>
            </li>


        </ul>

</nav>