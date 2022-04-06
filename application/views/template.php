
    <?php include_once "partials/v_header.php"; ?>


    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">


            <!-- Sidebar chat start -->
            <?php $this->load->view('partials/v_navbar'); ?>
     
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                <?php $this->load->view('partials/v_sidebar'); ?>  
                    <?= $contents; ?>
                </div>
            </div>
        </div>
    </div>

 <?php include_once "partials/v_footer.php"; ?>
</body>

</html>
