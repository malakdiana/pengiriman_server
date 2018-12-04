
       <style type="text/css">
           * {margin:0; padding: 0;}

body {font-family: Arial, Helvetica, sans-serif;}

/* Tombol Button Pesan */
#button {margin: 5% auto; width: 100px; text-align: center;}
#button a {
    width: 100px;
    height: 30px;
    vertical-align: middle;
    background-color: #F00;
    color: #fff;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid transparent;
}

/* Jendela Pop Up */
#popup {
    width: 100%;
    height: 100%;
    position: fixed;
    background: rgba(0,0,0,.7);
    top: 0;
    left: 0;
    z-index: 9999;
    visibility: hidden;
}

.window {
    width: 600px;
    height: 200px;
    background: #fff;
    border-radius: 10px;
    position: relative;
    padding: 10px;
    text-align: center;
    margin: 15% auto;
}
.window h2 {
    margin: 30px 0 0 0;
}
/* Button Close */
.close-button {
    width: 6%;
    height: 20%;
    line-height: 23px;
    background: #000;
    border-radius: 50%;
    border: 3px solid #fff;
    display: block;
    text-align: center;
    color: #fff;
    text-decoration: none;
    position: absolute;
    top: -10px;
    right: -10px;   
}

/* Memunculkan Jendela Pop Up*/
#popup:target {
    visibility: visible;
}
       </style>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-8 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center" style="height: 100px">
                                
                                <h6 class="text-white" align="right">Pengiriman Hari Ini</h6>
                                <?php foreach ($jumlah as $data) { ?>
                                <h2 class="text-white" align="right"> <?php echo $data->total?></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-8 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-success text-center" style="height: 100px">
                                <h6 class="text-white" align="right">Total Uang</h6>
                               <?php foreach ($pengiriman as $data) { ?>
                                <h2 class="text-white" align="right">Rp. <?php echo $data->total?></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-8 col-lg-4">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center" style="height: 100px">
                                <h6 class="text-white" align="right">Pengiriman Sukses</h6>
                                 <?php foreach ($sukses as $data) { ?>
                                <h2 class="text-white" align="right"><?php echo $data->total?></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                   
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <div class="row">
                                  
                                    <div class="col-lg-9">
                                    <?php foreach ($filmPersen as $key) {
                                    $kursi[] = $key->total1;
                                    $judul[]=$key->judulFilm;} ?>
                                    <canvas id="canvas" width="800" height="280"></canvas>

    <!--Load chart js-->
    <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script>
    <script>
            var lineChartData = {
                labels : <?php echo json_encode($judul);?>,
                datasets : [        
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($kursi);?>
                    }

                ]
                
            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);
        
    </script>
                                       <!-- <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>-->
                                    </div> 
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <?php foreach ($admin as $data) { ?>
                                                   <h5 class="m-b-0 m-t-5"><?php echo $data->total ?></h5>
                                                   <?php }?>
                                                   <small class="font-light">Total Admin</small>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-users m-b-5 font-16"></i>
                                                   <?php foreach ($cabang as $data) { ?>
                                                   <h5 class="m-b-0 m-t-5"><?php echo $data->total ?></h5>
                                                   <?php }?>
                                                   <small class="font-light">Total Cabang</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                  <?php foreach ($kurir as $data) { ?>
                                                   <h5 class="m-b-0 m-t-5"><?php echo $data->total ?></h5>
                                                   <?php }?>
                                                   <small class="font-light">Total Kurir</small>
                                                </div>
                                            </div>
                                             <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <?php foreach ($tpengiriman as $data) { ?>
                                                   <h5 class="m-b-0 m-t-5"><?php echo $data->total ?></h5>
                                                   <?php }?>
                                                   <small class="font-light">Pengiriman</small>
                                                </div>
                                            </div>
                                           
                                           <!--  <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-globe m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">8540</h5>
                                                   <small class="font-light">Online Orders</small>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
     <!-- Modal Ubah -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   
    <script src="<?php echo base_url()?>/assets/admin/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>/assets/admin/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>/assets/admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>/assets/admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>/assets/admin/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url()?>/assets/admin/libs/flot/excanvas.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url()?>/assets/admin/dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>