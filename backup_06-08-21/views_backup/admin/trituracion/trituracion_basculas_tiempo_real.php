<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/morris/morris.css">


<style>
.main-footer {
    display: none;
}

.plus {
  margin-left: 10px;
  font-size: 18px;
  color: #73C6B6;
}
</style>

<section class="content">
  <div class="box">
    <div class="row">
        <div class="col-xs-12">
          <!-- interactive chart -->
          <div class="box box-primary">
          <div class="box-header with-border">
                <?php
                //Divide entre 100 
                //Multiplica por .454 para sacar kilos
                //Divide entre 1000 para sacar toneladas
                //echo "Bascula1: " . $bascula1['total'];
                //exit(); 
                $bascula1 = ((int)$bascula1['total']/1000);
                $bascula2 = ((int)$bascula2['total']/1000);
                $bascula3 = ((int)$bascula3['total']/1000);
                //echo count($bascula1);
                //echo $bascula1['total'];
                //$myvar = json_encode($bascula1);
                //echo $myvar;
                //echo json_decode($myvar);
                ?>
                <h3 class="box-title">
                  Bascula 1: <?php echo $bascula1; ?>, 
                  Bascula 2: <?php echo $bascula2; ?>,
                  Bascula 3: <?php echo $bascula3; ?>
                </h3>
          </div>

          
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Grafica de Basculas en Tiempo Real</h3>
              <?php echo $grafica;?>
            </div>
            <div id="graph"></div>
 
                  <!--<script src="<?php echo base_url().'public/plugins/morris/jquery-min.js'?>"></script>
                  <script src="<?php echo base_url().'public/plugins/morris/raphael-min.js'?>"></script>
                  <script src="<?php echo base_url().'public/plugins/morris/morris.min.js'?>"></script>
                  <script>
                      Morris.Line({
                        element: 'graph',
                        data: <?php echo $grafica;?>,
                        xkey: 'hora',
                        ykeys: ['bascula1', 'bascula2', 'bascula3'],
                        labels: ['Bascula 1', 'Bascula 2', 'Bascula 3']
                      });
                  </script>-->
   
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

  </div> <!.-- box -->
</section>

<!-- Morris & Raphael -->
          <script src="<?php echo base_url().'public/plugins/morris/jquery-min.js'?>"></script>
          <script src="<?php echo base_url().'public/plugins/morris/raphael-min.js'?>"></script>
          <script src="<?php echo base_url().'public/plugins/morris/morris.min.js'?>"></script>
<!-- Page script -->
