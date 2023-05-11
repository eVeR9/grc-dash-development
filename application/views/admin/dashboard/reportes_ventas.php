<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/iCheck/flat/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/morris/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 

<?php $depto = strtoupper($this->session->userdata('departamento')); ?>

<style>
.main-footer {
  display:none;
}

.content-wrapper {
    background-color: #fff;
}

.content {
    /*background-color: #fff;*/
}
</style>

<section class="content">
<?php if($depto == 'TI' || $depto == 'VENTAS') { ?>
<iframe frameborder=0 width="1020" height="650" style="margin-left:-15px" src="https://analytics.zoho.com/open-view/1749734000011714667"></iframe>
<?php }?> 
  <!-- Small boxes (Stat box) -->

       <!-- ./col -->

        
        <!-- ./col -->
        
        <!-- ./col -->
        
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            
            <div class="">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px; display:none;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px; display:none;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->


          <!-- TO DO List -->
          
            <!-- /.box-header -->
            
            <!-- /.box-body -->
            <!--<div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>-->
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="">


          <!-- solid sales graph -->

            <div class="">
              <div class="chart" id="line-chart" style="height: 250px; display:none;"></div>
            </div>
            <!-- /.box-body -->
            
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->


        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
  

    </section>

  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="<?= base_url() ?>public/plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url() ?>public/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?= base_url() ?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url() ?>public/plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?= base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?= base_url() ?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>public/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url() ?>public/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>public/dist/js/demo.js"></script>

<script>
$("#dashboard1").addClass('active');
</script>  