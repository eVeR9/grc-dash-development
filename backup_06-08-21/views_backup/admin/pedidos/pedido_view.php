<!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<style>
.big-col {
  width: 100px !important;
}

table#example1{
  table-layout:fixed;
}
</style>



<section class="content-1">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ver Pedido</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body ">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>

			<?php echo form_open(base_url('admin/pedidos/view/'.$all_pedidos_complete_id['id']), 'class="form-horizontal"' )?>  
            <?php $depto = strtoupper($this->session->userdata('departamento')); ?>          
              <div class="form-group">
                <div class="box-header with-border">
                  <h4 class="box-title">Información del Pedido - <?php
                   if($all_pedidos_complete_id['serie'] != ''){
                     echo 'Serie'.' '. $all_pedidos_complete_id['serie'];
                     } else{
                       echo 'Serie ?';
                      }?>
                  </h4>
                </div>
              
                <label for="id_vendedor" class="col-sm-1 control-label bold">Vendedor:</label>

                <div class="col-sm-3">
                <label class="control-label"><?= $all_pedidos_complete_id['nombre']; ?>&nbsp;<?= $all_pedidos_complete_id['apellidos']; ?></label>
                </div>
                <label for="id_pedido" class="col-sm-2 control-label bold">No. Pedido:</label>

                <div class="col-sm-2">
                <label class="control-label"><?= $all_pedidos_complete_id['id']; ?></label>
                </div>
                
                <label for="estatus_pedido" class="col-sm-2 control-label bold">Estatus Pedido</label>

                <div class="col-sm-2">
                <label class="control-label"><?= $all_pedidos_complete_id['estatus_pedido']; ?></label>
                </div>
                
                
              </div>

              <div class="form-group">
                <label for="fecha_pedido" class="col-sm-2 control-label bold">Fecha de Creación:</label>
				
                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['fecha_pedido']; ?></label>
                  </div>
                  
                <label for="orden_de_compra" class="col-sm-3 control-label bold">Orden de Compra Relacionada:</label>

                <div class="col-sm-3">
                <label class="control-label"><?= $all_pedidos_complete_id['orden_de_compra']; ?></label>
                </div>
              </div>

              <div class="form-group">
                <label for="id_cliente" class="col-sm-2 control-label bold">Nombre de Cliente: </label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['razon_social_cliente']; ?></label>
                </div>
                <label for="id_registro_patronal" class="col-sm-2 control-label bold">Remisiona</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['razon_social_re']; ?></label>
                </div>
              </div>

              <div class="form-group">
                <label for="sucursal" class="col-sm-2 control-label bold">Sucursal: </label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['sucursal']; ?></label>
                </div>
                <label for="obra_cliente" class="col-sm-2 control-label bold">Obra de Cliente</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['obra_cliente']; ?></label>
                </div>
              </div>


              <div class="form-group">
                <label for="notas" class="col-sm-2 control-label bold">Anotaciones:</label>
                <div class="col-sm-4">
                  <label class="control-label"><?= $all_pedidos_complete_id['notas']; ?></label>
                </div>
                <label for="" class="col-sm-2 control-label bold">Forma de Pago:</label>
                <div class="col-sm-4">
                  <label for="" class="control-label"><?= $all_pedidos_complete_id['f_de_pago']; ?></label>
                </div>
              </div>



              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Informacion del Material</h3>
                </div>
                <label for="id_material" class="col-sm-2 control-label bold">Material:</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['nombre_del_material']; ?></label>
                </div>
                <label for="toneladas" class="col-sm-2 control-label bold">Toneladas:</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['toneladas']; ?></label>
             	</div>
                
              </div>

              <div class="form-group">
                <label for="toneladas" class="col-sm-2 control-label bold">Toneladas Embarcadas:</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['toneladas_embarcadas']; ?></label>
             	</div>

               <label for="toneladas" class="col-sm-2 control-label bold">Toneladas Pendientes:</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['toneladas'] - $all_pedidos_complete_id['toneladas_embarcadas']; ?></label>
                </div>
              </div>

              <?php if($depto != 'MINA'){ ?>
              <div class="form-group">
                <label for="precio_tonelada" class="col-sm-2 control-label bold">Precio Por Tonelada:</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['precio_tonelada']; ?></label>
                </div>
                <label for="toneladas" class="col-sm-2 control-label bold">Monto Total:</label>

                <div class="col-sm-4">
                <label class="control-label"><?= $all_pedidos_complete_id['monto_total']; ?></label>
             	</div>
              </div>
              <?php } ?>

    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped " style="width:100%">
        <thead>
        <tr>
          <th style="width: 60px;">Remision</th>
          <th style="width: 40px;">Serie</th>
          <th style="width: 40px;">Fecha</th>
          <th style="width: 120px;">Toneladas</th>
          <th style="width: 60px;">Fase</th>
          <th style="width: 130px;" class="text-right">Opciones</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_remisiones_pedido as $row): ?>
          <tr>
            <td><?= $row['id_serie']; ?></td>
            <td><?= $row['serie']; ?></td>
            <td><?= $row['fecha_remision']?></td>
            <td><?= $row['toneladas_remision']; ?></td>
            <td><?= $row['txt_fase_de_remision']; ?></td>
            <td class="text-right">
            	<a href="<?= base_url('admin/remisiones/view/'.$row['id']); ?>" class="btn btn-info btn-flat" style="margin-right:1px; text-align:center;">Ver</a> 
              <?php if($depto == "TI" || $depto == "VENTAS") { ?>
              <a href="<?= base_url('admin/remisiones/edit/'.$row['id']); ?>" class="btn btn-info btn-flat" style="text-align:center;">Editar</a>
              <?php } else { ?>
                <a href="#" class="btn btn-info btn-flat">Editar</a>
              <?php } ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
       
      </table>
    </div>


              <div class="form-group">
                <div class="col-md-12">
                  <!--<input type="submit" name="submit" value="Editar Pedido" class="btn btn-info pull-right">-->
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script> 


<!-- Select2 -->
<script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<script>
   $('.form-group input[type="number"]').keyup(function(){
       var textone;
       var texttwo;
       textone = parseFloat($('#toneladas').val());
       texttwo = parseFloat($('#precio_tonelada').val());
       var result = textone * texttwo;
       $('#monto_total').val(result.toFixed(2));
   });
</script>

<script>
$("#add_user").addClass('active');
</script>    