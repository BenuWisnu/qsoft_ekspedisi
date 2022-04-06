
<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="<?= base_url('home'); ?>">
                            <h4><strong>QSoftware</strong></h4>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                                <!-- <a href="https://wa.me/6285233611225" style="padding: 10px" class="btn btn-success btn-round; text-white"><i class="feather icon-phone"></i> 085233611225</a>
                                -->
                            </li>
                            <li>
                                <a href="<?= base_url('pemberitahuan'); ?>">
                                    <i class="feather icon-bell"></i>
                                </a>
                                <!-- <a href="https://wa.me/6285233611225" style="padding: 10px" class="btn btn-success btn-round; text-white"><i class="feather icon-phone"></i> 085233611225</a>
                                -->
                            </li>
                            <li>
                                <a href="<?= base_url('pengguna'); ?>">
                                    <i class="feather icon-user"></i>
                                </a>
                                <!-- <a href="https://wa.me/6285233611225" style="padding: 10px" class="btn btn-success btn-round; text-white"><i class="feather icon-phone"></i> 085233611225</a>
                                -->
                            </li>
                        </ul>
                        <ul class="nav-right">
                          
                     
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <span><?= $this->session->userdata('nama_lengkap'); ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
              
                                        <li>
                                            <a href="<?= base_url('auth/logout'); ?>">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
