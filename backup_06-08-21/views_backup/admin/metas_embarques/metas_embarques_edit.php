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
          <h3 class="box-title">Editar Meta Mensual de Embarques</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/metas_embarques/edit/'.$me_id['id']), 'class="form-horizontal"');  ?> 
            <?php
				$mes = date("m");
				$mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
				//echo $mes;
				$anio = date("Y");
				$prev_anio = $anio - 1;
				//echo $anio;
			      ?>
              <div class="form-group">
                <label for="id_mes" class="col-sm-1 control-label">Mes</label>
                <div class="col-sm-2">
<?php
// set the month array
$meses = array(
                    "1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril",
                    "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto",
                    "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre",
                );
?>
                
                  <select name="id_mes" class="form-control" id="id_mes" required>
                  <option value="">Mes</option>
					<?php
						foreach ($meses as $num => $name) {
							$selected="";
							if($me_id['id_mes'] == $num) {$selected = "selected";}
					?>
							<option value="<?php echo $num; ?>" <?php echo $selected; ?>><?php echo $name; ?></option>
                    <?php } ?>                    
                  </select>
                </div>

                <label for="id_anio" class="col-sm-1 control-label">Año</label>
                <div class="col-sm-2">
                  <select name="id_anio" class="form-control" id="id_anio" required>
                  <option value="">Año</option>
					<?php
                        for($i=$anio-1; $i<=$anio+1; $i++)
                        { $selected="";
                            if($i == $me_id['id_anio']) {$selected = "selected"; }?>
                            <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                    <?php } ?>                    
                  </select>
                </div>

                <label for="id_vendedor" class="col-sm-2 control-label">Vendedor</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_vendedor" id="id_vendedor" value="">   
                    
                  <select name="id_vendedor" id="id_vendedor" class="form-control select2" required>
                    <option value="">Seleccione Vendedor</option>
                    <option value="0">Sin Vendedor</option>
                  <?php foreach($empleados_ventas as $row): 
				  $selected="";
                  if($row['id'] == $me_id['id_vendedor']) {$selected = "selected"; }
				  ?>
                    <option value="<?= $row['id']; ?>" <?php echo $selected; ?>> <?= $row['nombre'] . " " . $row['apellidos']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                
              </div>

              <div class="form-group">
                <label for="id_cliente" class="col-sm-2 control-label">Cliente</label>

                <div class="col-sm-9">
                  <select name="id_cliente" id="id_cliente" class="form-control select2" required>
                    <option value="">Selecciona Cliente</option>
                  <?php foreach($all_clientes as $row): 
				  $selected="";
                  if($row['id'] == $me_id['id_cliente']) {$selected = "selected"; }
				  ?>
                    <option value="<?= $row['id']; ?>" <?php echo $selected; ?>><?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label for="id_sucursal" class="col-sm-2 control-label">Sucursal</label>

                <div class="col-sm-4">
                  <select name="id_sucursal" id="id_sucursal" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="0">Sin Sucursal</option>
                  <?php foreach($all_sucursales as $row): 
                    $selected="";
                      if($row['id_cliente']==$me_id['id_cliente']){ 
                        if($row['id']==$me_id['id_sucursal']) { $selected="selected"; } 
                  ?>
                    <option value="<?= $row['id']; ?>" <?php echo $selected; ?>><?= $row['sucursal']; ?></option>
                  <?php } ?>
                  <?php endforeach; ?>
                    </select>
                </div>
                
                <label for="obra_cliente" class="col-sm-2 control-label">Obra de Cliente</label>
                <div class="col-sm-4">
                <input type="text" name="obra_cliente" class="form-control" id="obra_cliente" value="<?php echo $me_id['obra_cliente']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="id_material" class="col-sm-2 control-label">Material</label>

                <div class="col-sm-9">
                  <select name="id_material" id="id_material" class="form-control" required >
                    <option value="">Seleccione Material</option>
                  <?php foreach($materiales as $row): 
                  $selected="";
                  if($row['id']==$me_id['id_material']) { $selected="selected"; }   
                  ?>
                    <option value="<?= $row['id']; ?>" <?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label for="toneladas" class="col-sm-2 control-label">Toneladas</label>
                <div class="col-sm-4">
                    <input type="any" name="toneladas" class="form-control calcular" id="toneladas" required value="<?php echo $me_id['toneladas']; ?>">
                </div>
                
                <label for="dias_habiles" class="col-sm-2 control-label">Días Hábiles</label>
                <div class="col-sm-4">
                    <input type="any" name="dias_habiles" class="form-control calcular" id="dias_habiles" required value="<?php echo $me_id['dias_habiles']; ?>">
                </div>
                </div>

              <div class="form-group">
                <label for="meta_diaria" class="col-sm-2 control-label">Meta Diaria</label>
                <div class="col-sm-4">
                    <input type="any" name="meta_diaria" class="form-control" id="meta_diaria" placeholder="" required readonly value="<?php echo $me_id['meta_diaria']; ?>">
                </div>
                
                <label for="meta_semanal" class="col-sm-2 control-label">Meta Semanal</label>
                <div class="col-sm-4">
                    <input type="any" name="meta_semanal" class="form-control" id="meta_semanal" placeholder="" required readonly value="<?php echo $me_id['meta_semanal']; ?>">
                </div>
                </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Editar Meta" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
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
    $('.select2').select2();

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
		format: 'yyyy/mm/dd',
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
jQuery('body').on('input','input.calcular',function(){
       var toneladas;
       var dias_habiles;
       var meta_diaria;
       var meta_semanal;

       toneladas = parseFloat($('#toneladas').val());
       dias_habiles = parseFloat($('#dias_habiles').val());
	   meta_diaria = toneladas / dias_habiles;
       meta_semanal = toneladas / 4.345;

	   if(!isNaN(meta_diaria)){
	   		$('#meta_diaria').val(meta_diaria.toFixed(2));
	   }
	   if(!isNaN(meta_semanal)){
	   		$('#meta_semanal').val(meta_semanal.toFixed(2));
	   }
});

var baseURL= "<?php echo base_url();?>";
  // Sucursales
    $('#id_cliente').change(function(){
		$("#id_sucursal").prop("disabled", false); 
      var id_cliente = $(this).val();
	  //alert(id_departamento);

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/metas_embarques/getClienteSucursales',
        method: 'post',
        data: {id_cliente: id_cliente,'<?php echo $this->security->get_csrf_token_name(); ?>': cct},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#id_sucursal').find('option').not(':first').remove();

          // Add options
          $('#id_sucursal').append('<option value="0">Sin Sucursal</option>');
          $.each(response,function(index,data){
             $('#id_sucursal').append('<option value="'+data['id']+'">'+data['sucursal']+'</option>');
          });
        }
     });
   });
</script>

<script>
$("#add_meta").addClass('active');
</script>    