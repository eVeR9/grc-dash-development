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



<section class="content-1">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ver Remision</h3>
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
            <?php echo form_open(base_url('admin/remisiones/edit/'), 'class="form-horizontal"' )?>            
                <?php 
				$depto = strtoupper($this->session->userdata('departamento'));
				//echo $depto;
				        ?>
                <input type="hidden" name="depto" class="form-control" id="depto" value="<?php echo strtoupper($this->session->userdata('departamento')); ?>">
                
                <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Información de la Remisión</h3>
                </div>

                <label for="flete_nombre" class="col-sm-1 control-label bold">Flete:</label>
                <div class="col-sm-3">
                  <label class="control-label"><?= $all_remisiones_complete_id['nombre_flete']; ?></label>               
                </div>
                
                <label for="flete_operador" class="col-sm-1 control-label bold">Operador:</label>
                <div class="col-sm-3">
                  <label class="control-label"><?= $all_remisiones_complete_id['nombre_operador_flete']; ?></label>
                </div>
                
                <label for="flete_placas" class="col-sm-1 control-label bold">Placas:</label>
                <div class="col-sm-3">
                  <label class="control-label"><?= $all_remisiones_complete_id['placas_flete']; ?></label>
                </div>
				        </div> <!-- espacio -->

              <div class="form-group">
                <label for="entrada" class="col-sm-1 control-label bold">Hora Entrada:</label>
                <div class="col-sm-3">
					        <label class="control-label"><?= $all_remisiones_complete_id['entrada_flete']; ?></label>                
                </div>

                <label for="salida" class="col-sm-1 control-label bold">Hora Salida:</label>
                <div class="col-sm-3">
					        <label class="control-label"><?= $all_remisiones_complete_id['salida_flete']; ?></label>                
                </div>

                <label for="fase_de_remision" class="col-sm-1 control-label bold">Estatus Remision:</label>
                <div class="col-sm-3">
                <label class="control-label"><?= $all_remisiones_complete_id['fase_de_remision']; ?></label>
                </div>
              </div>

              

              <div class="form-group">
                <label for="destino" class="col-sm-1 control-label bold">Destino:</label>
                <div class="col-sm-3">
					        <label class="control-label"><?= $all_remisiones_complete_id['destino_flete']; ?></label>                
                </div>

                <label for="cajas" class="col-sm-1 control-label bold">Cajas:</label>
                <div class="col-sm-3">
					        <label class="control-label"><?= $all_remisiones_complete_id['cajas_flete']; ?></label>                
                </div>

                <label for="tipo_flete" class="col-sm-1 control-label bold">Full/Sencilla:</label>
                <div class="col-sm-3">
                  <label class="control-label"><?= $all_remisiones_complete_id['tipo_flete']; ?></label>
                </div>

              </div>

              <div class="form-group">
                <label for="notas_remision" class="col-sm-2 control-label bold">Comentarios Remisión:</label>
                <div class="col-sm-10">
                	<label class="control-label"><?= $all_remisiones_complete_id['notas_remision']; ?></label>
                </div>
              </div>
      
<div class="green box">

              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Ticket Báscula</h3>
                </div>
                <label for="ticket_bascula" class="col-sm-2 control-label bold">Ticket:</label>
                <div class="col-sm-4">
					        <label class="control-label"><?= $all_remisiones_complete_id['ticket_bascula']; ?></label>                
                </div>
                <label for="toneladas_remision" class="col-sm-2 control-label bold">Toneladas:</label>
                <div class="col-sm-4">
					        <label class="control-label"><?= $all_remisiones_complete_id['toneladas_remision']; ?></label>                
                </div>


                </div>

              <div class="form-group">
                <label for="peso_inicial" class="col-sm-2 control-label bold">Peso Inicial:</label>
                <div class="col-sm-4">
					        <label class="control-label"><?= $all_remisiones_complete_id['peso_inicial']; ?></label>               
                </div>

                <label for="peso_final" class="col-sm-2 control-label bold">Peso Final:</label>
                <div class="col-sm-4">
					        <label class="control-label"><?= $all_remisiones_complete_id['peso_final']; ?></label>                
                </div>
              </div>
              <br>
</div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

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