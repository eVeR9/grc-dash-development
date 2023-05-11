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
          <h3 class="box-title">Agregar Empleado</h3>
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

			<?php echo form_open(base_url('admin/empleados/add/'), 'class="form-horizontal"' )?>            
              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                <label for="nombre" class="col-sm-1 control-label">Nombre(s)</label>

                <div class="col-sm-5">
                  <input type="text" name="nombre" class="form-control" id="nombre" required>
                </div>
                <label for="apellidos" class="col-sm-1 control-label">Apellido(s)</label>

                <div class="col-sm-5">
                  <input type="text" name="apellidos" class="form-control" id="apellidos" required>
                </div>
              </div>

              <div class="form-group">
                <label for="direccion" class="col-sm-1 control-label">Dirección</label>

                <div class="col-sm-7">
                  <input type="text" name="direccion" class="form-control" id="direccion" required>
                </div>
                <label for="colonia" class="col-sm-1 control-label">Colonia</label>

                <div class="col-sm-3">
                  <input type="text" name="colonia" class="form-control" id="colonia" required>
                </div>
              </div>

              <div class="form-group">
                <label for="municipio" class="col-sm-1 control-label">Municipio</label>

                <div class="col-sm-3">
                  <input type="text" name="municipio" class="form-control" id="municipio" required>
                </div>
                <label for="estado" class="col-sm-1 control-label">Estado</label>

                <div class="col-sm-3">
                  <input type="text" name="estado" class="form-control" id="estado" required>
                </div>
                <label for="pais" class="col-sm-1 control-label">País</label>

                <div class="col-sm-3">
                  <input type="text" name="pais" class="form-control" id="pais" required>
                </div>
                
              </div>




              <div class="form-group">
                <label for="fecha_de_nacimiento" class="col-sm-1 control-label">Fecha Nac.</label>
                <div class="col-sm-3">
                

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_de_nacimiento" class="form-control" id="fecha_de_nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                  </div>
                </div>

                <label for="estado_civil" class="col-sm-1 control-label">Est. Civil</label>
                <div class="col-sm-3">
                  <select name="estado_civil" class="form-control" required>
                    <option value="">Estado Civil</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Union Libre">Unión Libre</option>
                    <option value="Viudo">Viudo</option>
                  </select>
                </div>

                <label for="hijos" class="col-sm-1 control-label">Hijos</label>
                <div class="col-sm-2">
                  <select name="hijos" class="form-control" required>
                    <option value="">Hijos</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>

                  </select>
                </div>
                
              </div>


              <div class="form-group">
                <label for="sexo" class="col-sm-1 control-label">Sexo</label>

                <div class="col-sm-3">
                  <select name="sexo" class="form-control" required>
                    <option value="">Sexo</option>
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                  </select>
                </div>
                <label for="estado" class="col-sm-1 control-label">CURP</label>

                <div class="col-sm-3">
                  <input type="text" name="curp" class="form-control" id="curp" placeholder="" required>
                </div>
                <label for="rfc" class="col-sm-1 control-label">RFC</label>

                <div class="col-sm-3">
                  <input type="text" name="rfc" class="form-control" id="rfc" required >
                </div>
                
              </div>

              <div class="form-group">
                <label for="imss" class="col-sm-1 control-label">IMSS</label>

                <div class="col-sm-3">
                  <input type="text" name="imss" class="form-control" id="imss" placeholder="" required>
                </div>
                <label for="ife" class="col-sm-1 control-label">IFE</label>

                <div class="col-sm-3">
                  <input type="text" name="ife" class="form-control" id="ife" placeholder="" required>
                </div>                
                <label for="mobile_no" class="col-sm-1 control-label">Celular</label>

                <div class="col-sm-3">
                  <input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="" required>
                </div>                


              </div>

              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Laborales</h3>
                </div>
                <label for="fecha_ingreso" class="col-sm-2 control-label">Fecha Ingreso</label>

                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_ingreso" class="form-control" id="fecha_ingreso" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                  </div>
                </div>
                <label for="fecha_salida" class="col-sm-2 control-label">Fecha Salida</label>

                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                
                  <input type="text" name="fecha_salida" class="form-control" id="fecha_salida" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask >
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label for="id_departamento1" class="col-sm-2 control-label">Departamento</label>

                <div class="col-sm-4">
         <select name="id_departamento" id="id_departamento" class="form-control" required>
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
                <?php //echo $empleado['id_departamento'] . " : " . $empleado['id_puesto']; ?>
                  <select name="id_puesto" id="id_puesto" class="form-control" required>
                  <option value="">Seleccione Puesto</option>
					   <?php
                       foreach($puestos as $puesto){
                          $selected="";
                          if($puesto['id']==$puesto_id and $puesto['id_departamento']==$departamento_id)
						  	{
								$selected="selected";
							}
							if($puesto['id_departamento']==$departamento_id){
                         echo "<option value='".$puesto['id']."' ". $selected .">".$puesto['nombre_del_puesto']."</option>";
							}
                       }
                       ?>
                  </select>
                </div>                
              </div>

              <div class="form-group">
                <label for="id_registro_patronal" class="col-sm-2 control-label">Registro Patronal</label>

                <div class="col-sm-4">
                  <select name="id_registro_patronal" class="form-control" required>
                    <option value="">Registro Patronal</option>
                  <?php foreach($all_registro_patronal as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <label for="id_empleado" class="col-sm-2 control-label">Numero Empleado</label>

                <div class="col-sm-4">
                  <input type="text" name="id_empleado" class="form-control" id="id_empleado" required value="">
                </div>
                
              </div>


              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Agregar Empleado" class="btn btn-info pull-right">
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
</script><script>
$("#add_user").addClass('active');
</script>    