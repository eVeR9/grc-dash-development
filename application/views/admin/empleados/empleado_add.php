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
          <h3 class="box-title">Agregar Colaborador</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body ">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg) ? $msg: ''; ?>
              </div>
            <?php endif; ?>

			<?php echo form_open(base_url('admin/empleados/add/'), 'class="form-horizontal" enctype="multipart/form-data"' )?>            
              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
              
                <label for="nombre" class="col-sm-1 control-label">Nombre(s)</label>

                <div class="col-sm-5">
                  <input type="text" name="nombre" class="form-control" id="nombre" value="" >
                </div>
                <label for="apellidos" class="col-sm-1 control-label">Apellido(s)</label>

                <div class="col-sm-5">
                  <input type="text" name="apellidos" class="form-control" id="apellidos" value="" >
                </div>
              </div>

              <div class="form-group">
                <label for="domicilio" class="col-sm-1 control-label">Domicilio</label>

                <div class="col-sm-7">
					<textarea name="domicilio" class="form-control" id="domicilio" ></textarea>
                </div>
                <label for="tel_contacto" class="col-sm-1 control-label">Teléfono</label>

                <div class="col-sm-3">
                  <input type="text" name="tel_contacto" class="form-control" id="tel_contacto" value="" >
                </div>
              </div>

              <div class="form-group">
                <label for="fecha_nacimiento" class="col-sm-1 control-label">Fecha Nac.</label>
                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_de_nacimiento" class="form-control" id="fecha_de_nacimiento" value="" >
                  </div>
                </div>
				  
                <label for="nss" class="col-sm-2 control-label">CURP</label>

                <div class="col-sm-5">
                  <input type="text" name="curp" class="form-control" id="curp" placeholder=""  value="">
                </div>
                              
                
              </div>

              <div class="form-group">
                <label for="sexo" class="col-sm-1 control-label">Sexo</label>

                <div class="col-sm-3">
                  <select name="sexo" class="form-control" id="sexo" >
                    <option value="">Seleccionar</option>
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                  </select>
                </div>
                <label for="nss" class="col-sm-1 control-label">NSS</label>

                <div class="col-sm-3">
                  <input type="text" name="nss" class="form-control" id="nss" placeholder=""  value="">
                </div>
                <label for="rfc" class="col-sm-1 control-label">RFC</label>

                <div class="col-sm-3">
                  <input type="text" name="rfc" class="form-control" id="rfc"  value="">
                </div>
              </div>

              <div class="form-group">

              <label for="nss" class="col-sm-1 control-label">Talla Camisa</label>
              <div class="col-sm-3">
                <input type="text" name="talla_camisa" class="form-control" id="talla_camisa" placeholder=""  value="">
              </div>

              <label for="nss" class="col-sm-1 control-label">Talla Pantalon</label>
              <div class="col-sm-3">
                <input type="text" name="talla_pantalon" class="form-control" id="talla_pantalon" placeholder=""  value="">
              </div>

            <label for="rfc" class="col-sm-1 control-label">Talla Zapatos</label>
            <div class="col-sm-3">
              <input type="text" name="talla_zapatos" class="form-control" id="talla_zapatos"  value="">
            </div>
            </div>

              <div class="form-group">
              <label for="" class="col-md-1 control-label">Numero CLABE</label>
              <div class="col-md-3">
                <input type="text" name="numero_clabe" id="numero_clabe" class="form-control">
              </div>

              <label for="" class="col-md-1 control-label">Nombre Contacto Emergencia</label>
              <div class="col-md-3">
                <input type="text" name="contacto_emergencia" id="contacto_emergencia" class="form-control">
              </div>

              <label for="" class="col-md-1 control-label">Tel Contacto Emergencia</label>
              <div class="col-md-3">
                <input type="text" name="tel_contacto_emergencia" id="tel_contacto_emergencia" class="form-control">
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
                
                  <input type="text" name="fecha_de_ingreso" class="form-control" id="datepicker"  value="">
                  </div>
                </div>
                <label for="fecha_de_baja" class="col-sm-2 control-label">Fecha de Baja</label>

                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_de_baja" class="form-control" id="fecha_de_baja" value="">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="numero_empleado" class="col-sm-2 control-label">Numero de Colaborador</label>

                <div class="col-sm-4">
                  <input type="text" value="0" name="numero_empleado" class="form-control" id="numero_empleado"   readonly>
                </div>

                <label for="id_empleado_estatus" class="col-sm-2 control-label">Estatus</label>

                <div class="col-sm-4">
                  <select name="id_empleado_estatus" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_empleados_estatus as $row){
                         echo "<option value='".$row['id']."'>".$row['empleado_estatus']."</option>";
					}?>
                  </select>
                </div>
				  
              </div>
			
			
              <div class="form-group">
				  
                <label for="id_registro_patronal" class="col-sm-2 control-label">Registro Patronal</label>

                <div class="col-sm-4">
                  <select name="id_registro_patronal" id="id_registro_patronal" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_registro_patronal as $row){
                         		echo "<option value=".$row['id'].">".$row['registro_patronal']." - ". $row['razon_social'] ."</option>";
				   }?>
                  </select>
                </div>
				  
                <label for="id_area" class="col-sm-2 control-label">Area</label>

                <div class="col-sm-4">
                  <select name="id_area" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_areas as $row){
                         		echo "<option value='".$row['id']."'>".$row['nombre_del_area']."</option>";
							}
							?>
                  </select>
                </div>                
				  			
              </div>

              <div class="form-group">
				  
                <label for="id_departamento" class="col-sm-2 control-label">Departamento</label>

                <div class="col-sm-4">
         <select name="id_departamento" id="id_departamento" class="form-control" >
           <option value="">Seleccione</option>
           <?php
           foreach($departamentos as $departamento){
             echo "<option value='".$departamento['id']."'>".$departamento['nombre_del_departamento']."</option>";
           }
           ?>
           <?php 
			?>
        </select>                  
                </div>
				  
                <label for="id_puesto" class="col-sm-2 control-label">Puesto</label>

                <div class="col-sm-4">
                  <select name="id_puesto" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_puestos as $row){
                         echo "<option value='".$row['id']."'>".$row['nombre_del_puesto']."</option>";
							}?>
                  </select>

                </div>    
			</div>
			
              <div class="form-group">
				  <label for="id_tipo_contrato" class="col-sm-2 control-label">Tipo Contrato</label>

                <div class="col-sm-4">
                  <select name="id_tipo_contrato" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_tipo_contrato as $row){
                         		echo "<option value='".$row['id']."'>".$row['tipo_contrato']."</option>";
							}?>
                  </select>
                </div>
                
				  <label for="id_banco" class="col-sm-2 control-label">Banco</label>

                <div class="col-sm-4">
                  <select name="id_banco" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_bancos as $row){
                         		echo "<option value='".$row['id']."'>".$row['nombre_del_banco']."</option>";
							}
							?>
                  </select>
                </div>
              </div>

			
              <div class="form-group">
				  <label for="id_forma_pago" class="col-sm-2 control-label">Forma de Pago</label>

                <div class="col-sm-4">
                  <select name="id_forma_pago" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_nomina_forma_pago as $row){
                         		echo "<option value='".$row['id']."'>".$row['forma_pago']."</option>";
							}
							?>
                  </select>
                </div>
                
				  <label for="id_frecuencia_pago" class="col-sm-2 control-label">Frec. Pago</label>

                <div class="col-sm-4">
                  <select name="id_frecuencia_pago" class="form-control" >
                    <option value="">Seleccione</option>
                  <?php foreach($all_nomina_frecuencia_pago as $row){
                         		echo "<option value='".$row['id']."'>".$row['frecuencia_pago']."</option>";
							}
							?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Médicos</h3>
                </div>
				        <label for="doc1" class="col-sm-3 control-label">Tipo de Sangre</label>
                <div class="col-sm-9">
                  <select name="tipo_sangre" class="form-control" id= "tipo_sangre" >
                    <option value="">Seleccione</option>
                    <?php foreach($all_tipo_sangre as $row)
                      {
                         		echo "<option value='".$row['tipo_sangre']."'>".$row['tipo_sangre']."</option>";
							        }
							      ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="alergias" class="col-sm-3 control-label">Alergias</label>
                <div class="col-sm-9">
					        <textarea name="alergias" class="form-control" id="alergias" ></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="padecimientos" class="col-sm-3 control-label">Padecimientos</label>
                <div class="col-sm-9">
					        <textarea name="padecimientos" class="form-control" id="padecimientos" ></textarea>
                </div>
              </div>


              <div class="form-group">
				  
                <div class="box-header with-border">
                  <h3 class="box-title">Fotografia del Empleado</h3>
                </div>

				<label for="doc1" class="col-sm-3 control-label">Subir Imagen, solo jpg</label>

                <div class="col-sm-4">
					<input id="fotografia" name="fotografia" type="file" placeholder="Subir Fotografia" accept="image/jpg"  />
                </div>

				<label for="doc1" class="col-sm-3 control-label">La imagen se almacena como numero_empleado.jpg </label>

          <!--      <div class="col-sm-4">
					<input id="nombre_doc1" name="nombre_doc1" type="text" placeholder="Opcional..."  />
                </div>-->

              </div>
			
			
			

              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Agregar Colaborador" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

<script>

$(document).ready(function($){
      $.ajax({
        url:"<?=base_url()?>admin/empleados/NextEmpNumber/",
        method: "get",
        dataType: "json",
        success: function(response)
          {
            console.log(response);
            var datos = response;
            $('#numero_empleado').val("hello");
            //alert(datos);
            var numero_empleado = parseInt(datos, 10) + 1;
            $('#numero_empleado').val(numero_empleado);
          }
   		});
	  //});
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
