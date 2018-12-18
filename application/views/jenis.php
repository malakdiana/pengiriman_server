 <div class="page-wrapper">
  
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tabel Harga</h4>
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                            
                        <div class="card">
                            <div class="card-body">
                                <a href="" data-toggle="modal" data-target="#myModal">
                                 <button type="button" class="btn btn-success" style="margin-bottom: 20px" >Tambah</button></a>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                    <td><b>Id Jenis</b></td>
                                    <td><b>Jenis</b></td>
                                    <td><b>Harga</b></td>
                                    <td><b>Keterangan</b></td>
                                    
                                    <td><b>Aksi</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($jenis as $key ) { ?>
                                    <tr>
                                        <td><?php echo $key->idJenis ?></td>
                                        <td><?php echo $key->jenis ?></td>
                                        <td><?php echo $key->harga ?></td>
                                        <td><?php echo $key->keterangan ?></td>
                                        <td>
                                            <a href="javascript:void(0);" 
                                            onclick="showmodal('<?php echo $key->idJenis ?>','<?php echo $key->jenis ?>','<?php echo $key->harga ?>','<?php echo $key->keterangan ?>')" 
                                                data-toggle="modal" 
                                                data-target="#myModalEdit"><button class="btn btn-secondary">Update</button></a>
                                            <a href="<?php echo site_url()?>/Server/deleteJenis/<?php echo $key->idJenis; ?>" onclick="return confirm('Are you sure to delete this data permanently?');"><button class="btn btn-warning">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                                           
                                       
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
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


    

        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade-in">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 20px">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                </div>
     <?php echo form_open_multipart('Server/updateJenis'); ?>
                <div class="form-group">
                <input type="text" name="idJenis" id="idJenis" hidden="">
                <label for="">Jenis Pengiriman</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="" placeholder="username" >
                </div>

                <div class="form-group">
                <label for="">Harga</label>
                <input class="form-control" name="harga" id="harga" value="" placeholder="" >
                </div>
                <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" value=""  >
                </div>
                
                <center><button type="submit" class="btn btn-primary">Submit</button></center>
                <?php echo form_close(); ?>
    </div>
    </div>
    </div>
</div>

  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade-in">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 20px">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                </div>
     <?php echo form_open_multipart('Server/addJenis'); ?>
                <div class="form-group">
                <input type="text" name="idJenis" id="idJenis" hidden="">
                <label for="">Jenis Pengiriman</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="" >
                </div>

                <div class="form-group">
                <label for="">Harga</label>
                <input class="form-control" name="harga" id="harga" value="" placeholder="" >
                </div>
                <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" value=""  >
                </div>
                
                <center><button type="submit" class="btn btn-primary">Submit</button></center>
                <?php echo form_close(); ?>
    </div>
    </div>
    </div>
</div>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     <script src="<?php echo base_url()?>/assets/admin/libs/jquery/dist/jquery.min.js"></script>

  <script type="text/javascript">
    function showmodal(id,jenis,harga,keterangan){
        document.getElementById('idJenis').value = id;
        document.getElementById('jenis').value=jenis;
        document.getElementById('harga').value=harga;
        document.getElementById('keterangan').value=keterangan;

        
    }
</script>
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
       <script src="<?php echo base_url();?>assets/datatables/jquery-2.2.4.js"></script>
        <script src="<?php echo base_url();?>assets/datatables/jquery-2.2.4.min.js"></script>
        <script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>      
        <link rel="stylesheet" href="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.css">
<script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
</body>

</html>