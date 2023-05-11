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
          <h3 class="box-title">Ver Empleado</h3>
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

			<?php echo form_open(base_url('admin/empleados/edit/'.$empleado['id']), 'class="form-horizontal" enctype="multipart/form-data"' )?>
			<input type="hidden" name="id" class="form-control" id="id" value="<?= $empleado['id']; ?>">
              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
              
                <label for="nombre" class="col-sm-1 control-label">Nombre(s)</label>

                <div class="col-sm-5">
                  <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $empleado['nombre']; ?>" readonly>
                </div>
                <label for="apellidos" class="col-sm-1 control-label">Apellido(s)</label>

                <div class="col-sm-5">
                  <input type="text" name="apellidos" class="form-control" id="apellidos" value="<?= $empleado['apellidos']; ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="domicilio" class="col-sm-1 control-label">Domicilio</label>

                <div class="col-sm-7">
					<textarea name="domicilio" class="form-control" id="domicilio" readonly><?= $empleado['domicilio']; ?></textarea>
                </div>
                <label for="tel_contacto" class="col-sm-1 control-label">Teléfono</label>

                <div class="col-sm-3">
                  <input type="text" name="tel_contacto" class="form-control" id="tel_contacto" value="<?= $empleado['tel_contacto']; ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="fecha_nacimiento" class="col-sm-1 control-label">Fecha Nac.</label>
                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_de_nacimiento" class="form-control" id="fecha_de_nacimiento" value="<?= $empleado['fecha_de_nacimiento']; ?>" disabled>
                  </div>
                </div>
				  
                <label for="nss" class="col-sm-2 control-label">CURP</label>

                <div class="col-sm-5">
                  <input type="text" name="curp" class="form-control" id="curp" placeholder="" readonly value="<?= $empleado['curp']; ?>">
                </div>
                              
                
              </div>


              <div class="form-group">
                <label for="sexo" class="col-sm-1 control-label">Sexo</label>

                <div class="col-sm-3">
                <input type="text" name="sexo" class="form-control" id="sexo" placeholder="" readonly value="<?= $empleado['sexo']; ?>">                </div>
                <label for="nss" class="col-sm-1 control-label">NSS</label>

                <div class="col-sm-3">
                  <input type="text" name="nss" class="form-control" id="nss" placeholder="" readonly value="<?= $empleado['nss']; ?>">
                </div>
                <label for="rfc" class="col-sm-1 control-label">RFC</label>

                <div class="col-sm-3">
                  <input type="text" name="rfc" class="form-control" id="rfc" readonly value="<?= $empleado['rfc']; ?>">
                </div>
                
              </div>


              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Laborales</h3>
                </div>
                <label for="fecha_de_ingreso" class="col-sm-2 control-label">Fecha de Ingreso</label>

                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_de_ingreso" class="form-control" id="datepicker"  value="<?= $empleado['fecha_de_ingreso']; ?>" disabled>
                  </div>
                </div>
                <label for="fecha_de_baja" class="col-sm-2 control-label">Fecha de Baja</label>

                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_de_baja" class="form-control" id="fecha_de_baja" value="<?= $empleado['fecha_de_baja']; ?>" disabled>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="numero_empleado" class="col-sm-2 control-label">Numero Empleado</label>

                <div class="col-sm-4">
                  <input type="text" name="numero_empleado" class="form-control" id="numero_empleado" readonly value="<?= $empleado['numero_empleado']; ?>" readonly>
                </div>

                <label for="id_empleado_estatus" class="col-sm-2 control-label">Estatus</label>

                <div class="col-sm-4">
                  <select name="id_empleado_estatus" class="form-control" disabled>
                    <option value="">Seleccione</option>
                  <?php foreach($all_empleados_estatus as $row){
                        	$selected="";
                          	if($empleado['id_empleado_estatus']==$row['id'])
								{
									$selected="selected";
								}
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['empleado_estatus']."</option>";
							}
							?>
                  </select>
                </div>
				  
              </div>
			
			
              <div class="form-group">
				  
                <label for="id_registro_patronal" class="col-sm-2 control-label">Registro Patronal</label>

                <div class="col-sm-4">
                  <select name="id_registro_patronal" class="form-control" disabled>
                    <option value="">Registro Patronal</option>
                  <?php foreach($all_registro_patronal as $row){
                        	$selected="";
                          	if($empleado['id_registro_patronal']==$row['id'])
								{
									$selected="selected";
								}
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['registro_patronal']." - ". $row['razon_social'] ."</option>";
							}
							?>
                  </select>
                </div>
				  
                <label for="id_area" class="col-sm-2 control-label">Area</label>

                <div class="col-sm-4">
                  <select name="id_area" class="form-control" disabled>
                    <option value="">Area</option>
                  <?php foreach($all_areas as $row){
                        	$selected="";
                          	if($empleado['id_area']==$row['id'])
								{
									$selected="selected";
								}
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['nombre_del_area']."</option>";
							}
							?>
                  </select>
                </div>                
				  			
              </div>

              <div class="form-group">
				  
                <label for="id_departamento" class="col-sm-2 control-label">Departamento</label>

                <div class="col-sm-4">
         <select name="id_departamento" id="id_departamento" class="form-control" disabled>
           <option value="">Departamento</option>
           <?php
           foreach($departamentos as $departamento){
			   $selected="";
			   if($empleado['id_departamento']==$departamento['id']){$selected="selected";}
             echo "<option value='".$departamento['id']."' ". $selected .">".$departamento['nombre_del_departamento']."</option>";
           }
           ?>
           <?php 
		   	    $departamento_id=$empleado['id_departamento'];
			      $puesto_id=$empleado['id_puesto'];
			    ?>
        </select>                  
                </div>
				  
                <label for="id_puesto" class="col-sm-2 control-label">Puesto</label>

                <div class="col-sm-4">
                  <select name="id_puesto" class="form-control" disabled>
                    <option value="">Seleccione</option>
                  <?php foreach($all_puestos as $row){
                        	$selected="";
                          	if($empleado['id_puesto']==$row['id'])
								{
									$selected="selected";
								}
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['nombre_del_puesto']."</option>";
							}
							?>
                  </select>

                </div>    
			</div>
			
              <div class="form-group">
				  <label for="id_tipo_contrato" class="col-sm-2 control-label">Tipo Contrato</label>

                <div class="col-sm-4">
                  <select name="id_tipo_contrato" class="form-control" disabled>
                    <option value="">Seleccione</option>
                  <?php foreach($all_tipo_contrato as $row){
                        	$selected="";
                          	if($empleado['id_tipo_contrato']==$row['id'])
								{
									$selected="selected";
								}
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['tipo_contrato']."</option>";
							}
							?>
                  </select>
                </div>
                
				  <label for="id_banco" class="col-sm-2 control-label">Banco</label>

                <div class="col-sm-4">
                  <select name="id_banco" class="form-control" disabled>
                    <option value="">Seleccione</option>
                  <?php foreach($all_bancos as $row){
                        	$selected="";
                          	if($empleado['id_banco']==$row['id'])
								{
									$selected="selected";
								}
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['nombre_del_banco']."</option>";
							}
							?>
                  </select>
                </div>
              </div>

			
              <div class="form-group">
				  <label for="id_forma_pago" class="col-sm-2 control-label">Forma de Pago</label>

                <div class="col-sm-4">
                  <select name="id_forma_pago" class="form-control" disabled>
                    <option value="">Seleccione</option>
                  <?php foreach($all_nomina_forma_pago as $row){
                        	$selected="";
                          	if($empleado['id_forma_pago']==$row['id'])
								{
									$selected="selected";
								}
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['forma_pago']."</option>";
							}
							?>
                  </select>
                </div>
                
				  <label for="id_frecuencia_pago" class="col-sm-2 control-label">Frec. Pago</label>

                <div class="col-sm-4">
                  <select name="id_frecuencia_pago" class="form-control" disabled>
                    <option value="">Seleccione</option>
                  <?php foreach($all_nomina_frecuencia_pago as $row){
                        	$selected="";
                          	if($empleado['id_frecuencia_pago']==$row['id'])
                              {
                                $selected="selected";
                              }
                         		echo "<option value='".$row['id']."' ". $selected .">".$row['frecuencia_pago']."</option>";
							          }
							?>
                  </select>
                </div>
              </div>
              			
			
              <div class="form-group">
				  
                <div class="box-header with-border">
                  <h3 class="box-title">Documentos del Empleado</h3>
                </div>

				<label for="doc1" class="col-sm-2 control-label">Subir Documento</label>

                <div class="col-sm-4">
					<input id="archivo_documento" name="archivo_documento" type="file" placeholder="Subir Archivo" accept="application/pdf"  />
                </div>

				<label for="doc1" class="col-sm-2 control-label">Nombre Documento</label>

                <div class="col-sm-4">
					<input id="nombre_documento" name="nombre_documento" type="text" placeholder="Opcional..."  />
                </div>

              </div>

			
			
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Actualizar Empleado" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

 
<script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
$(document).ready(function($){
    // Departamento change
    $('#id_departamento').change(function(){
      var id_departamento = $(this).val();
	  //alert(id_departamento);

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/empleados/getDepartamentoPuestos',
        method: 'post',
        data: {id_departamento: id_departamento,'<?php echo $this->security->get_csrf_token_name(); ?>': cct},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#id_puesto').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#id_puesto').append('<option value="'+data['id']+'">'+data['nombre_del_puesto']+'</option>');
          });
        }
     });
   });
 });
 </script>
 
 <!-- Select2 -->
<script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>public/plugins/daterangepicker/moment.min.js"></script>
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
      autoclose: true,
	  format: 'yyyy/mm/dd'
    });
	  
    $('#fecha_de_nacimiento').datepicker({
      autoclose: true,
	  format: 'yyyy/mm/dd'
    });
	  
    $('#fecha_de_ingreso').datepicker({
      autoclose: true,
	  format: 'yyyy/mm/dd'
    });
	  
    $('#fecha_de_baja').datepicker({
      autoclose: true,
	  format: 'yyyy/mm/dd'
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
</script><script>
$("#add_user").addClass('active');
</script>
