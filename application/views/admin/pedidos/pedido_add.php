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



<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Nuevo Pedido</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body ">
          <?php if (isset($msg) || validation_errors() !== '') : ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
              <?= validation_errors(); ?>
              <?= isset($msg) ? $msg : ''; ?>
            </div>
          <?php endif; ?>

          <?php echo form_open(base_url('admin/pedidos/add/'), 'class="form-horizontal"') ?>
          <div class="form-group">
            <div class="box-header with-border">
              <h3 class="box-title">Información del Pedido</h3>
            </div>

            <label for="id_vendedor" class="col-sm-1 control-label">Nombre Vendedor</label>

            <div class="col-sm-3">
              <select name="id_vendedor" id="id_vendedor" class="form-control" required>
                <option value="">Vendedor</option>
                <?php foreach ($all_empleados_ventas as $row) : ?>
                  <option value="<?= $row['id']; ?>"><?= $row['nombre']; ?>&nbsp;<?= $row['apellidos']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <label for="id" class="col-sm-2 control-label">No. Pedido</label>

            <div class="col-sm-2">
              <input type="text" name="id" class="form-control" id="id" value="<?php echo $next_id; ?>" readonly required>
            </div>

            <label for="estatus_pedido" class="col-sm-2 control-label">Estatus Pedido</label>

            <div class="col-sm-2">
              <select name="id_estatus_pedido" id="id_estatus_pedido" class="form-control" required>
                <option value="">Estatus</option>
                <?php foreach ($all_estatus_pedidos as $row) : ?>
                  <?php
                  $selected = "";
                  if ($row['id'] == 1) {
                    $selected = "selected";
                  }
                  ?>
                  <option value="<?= $row['id']; ?>" <?php echo $selected; ?>><?= $row['estatus_pedido']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="fecha_pedido" class="col-sm-1 control-label">Fecha Creación</label>
            <div class="col-sm-2">
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" required name="fecha_pedido" class="form-control" id="fecha_pedido" data-date-format='yyyy-mm-dd'>
              </div>
            </div>

            <label for="" class="col-sm-1 control-label">Serie</label>
            <div class="col-sm-2">
              <select name="serie" id="" class="form-control">
                <option value="A" id="serie">A</option>
                <option value="G" id="serie">G</option>
                <option value="E" id="serie">E</option>
              </select>
            </div>

            <label for="orden_de_compra" class="col-sm-1 control-label">OC Relacionada</label>
            <div class="col-sm-2">
              <input type="text" name="orden_de_compra" class="form-control" id="orden_de_compra">
            </div>

            <label for="" class="col-sm-1 control-label">Forma de Pago</label>
            <div class="col-sm-2">
              <select name="f_de_pago" id="" class="form-control">
                <option value="credito" id="f_pago">Credito</option>
                <option value="pago-planta" id="f_pago">Planta</option>
                <option value='pago-ant-efectivo' id="f_pago">Pago Anticipado E</option>
                <option value='pago-ant-credito' id="f_pago">Pago Anticipado C</option>
              </select>
            </div>

          </div> <!-- end form-group -->

          <div class="form-group">
            <label for="id_cliente" class="col-sm-2 control-label">Cliente</label>

            <div class="col-sm-4">

              <select name="id_cliente" id="id_cliente" class="form-control select2" required>
                <option value="">Seleccione Cliente</option>
                <?php
                foreach ($all_clientes as $cliente) {
                  $selected = "";
                  //if($empleado['id_departamento']==$departamento['id']){$selected="selected";}
                  echo "<option value='" . $cliente['id'] . "' " . $selected . ">" . $cliente['razon_social'] . "</option>";
                }
                ?>
                <?php
                //$departamento_id=$empleado['id_departamento'];
                //$puesto_id=$empleado['id_puesto'];
                ?>
              </select>


              <!--<select name="id_cliente" id="id_cliente" class="form-control" required>
                    <option value="">Cliente</option>
                  <? php // foreach($all_clientes as $row): 
                  ?>
                    <option value="<? //= $row['id']; 
                                    ?>"><? //= $row['razon_social']; 
                                                          ?></option>
                    <? php // endforeach; 
                    ?>
                    </select>-->
            </div>
            <label for="id_registro_patronal" class="col-sm-2 control-label">Empresa que Remisiona</label>

            <div class="col-sm-4">
              <select name="id_registro_patronal" id="id_registro_patronal" class="form-control" required>
                <option value="">Remisiona</option>
                <?php foreach ($all_registro_patronal as $row) : ?>
                  <option value="<?= $row['id']; ?>"><?= $row['razon_social']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="id_sucursal" class="col-sm-2 control-label">Sucursal</label>

            <div class="col-sm-4">
              <select name="id_sucursal" id="id_sucursal" class="form-control" disabled>
                <option value="">Seleccione</option>
                <option value="0">Sin Sucursal</option>
                <?php foreach ($all_sucursales as $row) : ?>
                  <option value="<?= $row['id']; ?>"><?= $row['sucursal']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <label for="obra_cliente" class="col-sm-2 control-label">Obra de Cliente:</label>
            <div class="col-sm-4">
              <input name="obra_cliente" type="text" class="form-control" id="obra_cliente" value="">
            </div>


          </div>



          <div class="form-group">
            <label for="notas" class="col-sm-2 control-label">Anotaciones</label>
            <div class="col-sm-10">
              <textarea name="notas" class="form-control" id="notas" placeholder="Escriba Notas"></textarea>
            </div>
          </div>



          <div class="form-group">
            <div class="box-header with-border">
              <h3 class="box-title">Informacion del Material</h3>
            </div>
            <label for="id_material" class="col-sm-2 control-label">Material</label>

            <div class="col-sm-4">
              <select name="id_material" id="id_material" class="form-control" required>
                <option value="">Seleccione Material</option>
                <?php foreach ($all_materiales as $row) : ?>
                  <option value="<?= $row['id']; ?>"><?= $row['nombre_del_material']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <label for="toneladas" class="col-sm-2 control-label">Toneladas</label>

            <div class="col-sm-4">
              <input type="number" step="any" name="toneladas" class="form-control" id="toneladas" required>
            </div>

          </div>

          <div class="form-group">
            <label for="precio_tonelada" class="col-sm-2 control-label">Precio Por Tonelada</label>

            <div class="col-sm-4">
              <input type="number" step="any" name="precio_tonelada" class="form-control" id="precio_tonelada" required>
            </div>
            <label for="toneladas" class="col-sm-2 control-label">Monto Total</label>

            <div class="col-sm-4">
              <input type="number" step="any" name="monto_total" class="form-control" id="monto_total" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <input type="submit" name="submit" value="Agregar Pedido" class="btn btn-info pull-right">
            </div>
          </div>

          <div class="form-group">
            <div class="box-header with-border">
              <h3 class="box-title">Transportista</h3>
            </div>
            <label for="id_transportista" class="col-sm-2 control-label">Agrega Transportista</label>

            <div class="col-sm-4">
              <select name="id_transportista" id="id_transportista" class="form-control" disabled>
                <option value="">Seleccione Transportista</option>
              </select>
            </div>
            <a class="btn btn-info btn-sm" href="#" disabled>Agregar Transportista</a>
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
  $(function() {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {
      "placeholder": "dd/mm/yyyy"
    });
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {
      "placeholder": "mm/dd/yyyy"
    });
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    });
    //Date range as a button
    $('#daterange-btn').daterangepicker({
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
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
    );

    $('#fecha_pedido').datepicker({
      dateFormat: 'yy-mm-dd',
      autoclose: true,
      todayHighlight: true
    });


    //Date picker
    $('#datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      autoclose: true,

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
  var baseURL = "<?php echo base_url(); ?>";
  // Sucursales
  $('#id_cliente').change(function() {
    $("#id_sucursal").prop("disabled", false);
    var id_cliente = $(this).val();
    //alert(id_departamento);

    // AJAX request
    $.ajax({
      url: '<?= base_url() ?>admin/pedidos/getClienteSucursales',
      method: 'post',
      data: {
        id_cliente: id_cliente,
        '<?php echo $this->security->get_csrf_token_name(); ?>': cct
      },
      dataType: 'json',
      success: function(response) {

        // Remove options 
        $('#id_sucursal').find('option').not(':first').remove();

        // Add options
        $('#id_sucursal').append('<option value="0">Sin Sucursal</option>');
        $.each(response, function(index, data) {
          $('#id_sucursal').append('<option value="' + data['id'] + '">' + data['sucursal'] + '</option>');
        });
      }
    });
  });


  $('.form-group input[type="number"]').keyup(function() {
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