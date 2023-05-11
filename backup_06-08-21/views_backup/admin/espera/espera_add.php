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

<!-- No almacenar cache de esta vista -->
<?php
//header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
//header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

//header("Cache-Control: no-store");
//header("Cache-Control: no-cache, no-store, must-revalidate");

//header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
//header("Pragma: no-cache"); // HTTP 1.0.
//header("Expires: 0"); // Proxies.
?>

<head>
<meta http-equiv="Expires" content="0">

<meta http-equiv="Last-Modified" content="0">

<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

<meta http-equiv="Pragma" content="no-cache">
<script>
$(function() {
    $('#fecha_espera123').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        locale: {
            format: 'MM/DD/YYYY h:mm a'
        }
    });
});
</script>
</head>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Nueva Entrada</h3>
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
            <!-- esconder para bascula -->
              <?php 
			  $depto = strtoupper($this->session->userdata('departamento'));
        	  $puesto = strtoupper($this->session->userdata('puesto'));

			  if($depto == "TI" || $depto == "VENTAS")
			  {
			  	$text="";
			  } else {
				$text="style='display:none'";
			  }
			  ?>

			<?php echo form_open(base_url('admin/espera/espera_add/'), 'class="form-horizontal"' )?>            
              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Seleccione Fecha y Fase</h3>
                </div>
                <input type="hidden" name="serie_a" class="form-control" id="serie_a" value="<?php echo $next_id_a; ?>">
                <input type="hidden" name="serie_e" class="form-control" id="serie_e" value="<?php echo $next_id_e; ?>">
                <input type="hidden" name="serie_g" class="form-control" id="serie_g" value="<?php echo $next_id_g; ?>">
                <?php 
				$depto = strtoupper($this->session->userdata('departamento'));
				//echo $depto;
				?>
                <input type="hidden" name="depto" class="form-control" id="depto" value="<?php echo strtoupper($this->session->userdata('departamento')); ?>">

                <label for="fecha_espera" class="col-sm-2 control-label">Fecha y Hora de Entrada</label>
                <div class="col-sm-4">
                  <input type="text" autocomplete="off" name="fecha_espera" class="form-control" id="fecha_espera" readonly  value="<?php echo date('Y-m-d - h:i:s'); ?>">
                </div>
				
                <!--<div class="col-sm-4">
                <div class="input-group" >
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                
                  <input type="text" autocomplete="off" name="fecha_espera" class="form-control" id="fecha_espera" required>
                  
                  </div>
                  </div>-->
                <label for="id_estatus_espera" class="col-sm-2 control-label">Fase de Espera</label>

                <div class="col-sm-4">
                  <select name="id_estatus_espera" id="id_estatus_espera" class="form-control" required>
                    <option value="">Selecciona Fase</option>
                    <option value="1" selected>En Espera</option>
                  </select>
                </div>
                </div>
                

                
                <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Seleccione Pedido</h3>
                </div>
                
                <label for="id_pedido" class="col-sm-1 control-label">Pedido</label>

                <div class="col-sm-5">
                  <select name="id_pedido" id="id_pedido" class="form-control select2" required onchange="get_values();">
                  <option value="" selected>Selecciona Pedido</option>
                  <option value="0">000 - Sin Pedido</option>
                  <?php foreach($all_pedidos_complete as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['id']; ?> - <?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <label for="razon_social_remisiona" class="col-sm-1 control-label">Remisiona:</label>
                <div class="col-sm-5">
                  <input type="hidden" name="id_registro_patronal" id="id_registro_patronal" value="">
                  <select name="select_registro_patronal" required disabled class="form-control" id="select_registro_patronal" onchange="change_registro_patronal();">
                    <option value="">Empresa que Remisiona</option>
                  <?php foreach($all_registro_patronal as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                    </select>
					<!--<input type="text" name="razon_social_re" class="form-control" id="razon_social_re" required value="">
                    <input type="hidden" name="id_registro_patronal" id="id_registro_patronal" value=""> -->               
                </div>
              </div>


          <div class="form-group">
                <label for="razon_social" class="col-sm-1 control-label">Cliente:</label>
                <div class="col-sm-5">
          		<input type="hidden" name="id_cliente" id="id_cliente" value="">
          		<select name="select_cliente" required disabled class="form-control select2" id="select_cliente" onchange="change_id_cliente();" >
                	<option value="">Cliente</option>
                  	<?php foreach($all_clientes as $row): ?>
                    <? 
				  	//$selected="";
					//if($all_pedidos_complete_id['id_cliente']==$row['id'])
					//	{
					//		$selected="selected";
					//	}
					?>
                    	<option value="<?= $row['id']; ?>"><?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>

                <label for="orden_de_compra" class="col-sm-2 control-label">Orden de Compra:</label>
                <div class="col-sm-4">
					<input name="orden_de_compra" type="text" readonly required class="form-control" id="orden_de_compra" value="">
                </div>


              </div>

              <div class="form-group">
                <label for="id_sucursal" class="col-sm-1 control-label">Sucursal:</label>
                <div class="col-sm-5">
                  <input type="hidden" name="id_sucursal" id="id_sucursal" value="">
                  <select name="select_sucursal" required disabled class="form-control" id="select_sucursal" onchange="change_id_sucursal();">
                    <option value="0">Sin Sucursal</option>
                  <?php foreach($all_sucursales as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['sucursal']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <label for="obra_cliente" class="col-sm-2 control-label">Obra de Cliente:</label>
                <div class="col-sm-4">
					<input name="obra_cliente" type="text" required class="form-control" id="obra_cliente" value="" readonly>                
            </div>


              </div>

              <div class="form-group">
                <label for="vendedor" class="col-sm-1 control-label">Vendedor:</label>
                <div class="col-sm-5">
					<!--<input type="text" name="vendedor" class="form-control" id="vendedor" required value="">-->
                    <input type="hidden" name="id_vendedor" id="id_vendedor" value="">   
                    
                  <select name="select_vendedor" required disabled class="form-control" id="select_vendedor" onchange="change_id_vendedor();">
                    <option value="">Seleccione Vendedor</option>
                    <option value="0">Bascula</option>
                  <?php foreach($all_empleados_ventas as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['nombre'] . " " . $row['apellidos']; ?></option>
                    <?php endforeach; ?>
                    </select>
                                 
                </div>

                <label for="nombre_del_material" class="col-sm-2 control-label">Material:</label>
                <div class="col-sm-4">
                  <input type="hidden" name="id_material" id="id_material" value="">
                  <select name="select_material" required disabled class="form-control" id="select_material" onchange="change_material();">
                    <option value="">Seleccione Material</option>
                  <?php foreach($materiales as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['nombre_del_material']; ?></option>
                    <?php endforeach; ?>
                    </select>
                
                </div>
              </div>

              <div class="form-group">
                <label for="vendedor" class="col-sm-1 control-label">Serie:</label>
                <div class="col-sm-5">
					<!--<input type="text" name="vendedor" class="form-control" id="vendedor" required value="">-->
                    <input type="hidden" name="id_vendedor" id="id_vendedor" value="">   
                    
                    <input type="text" name="serie" class="form-control" id="serie" value="" readonly required>                                 
                </div>

                <label for="nombre_del_material" class="col-sm-2 control-label">Folio:</label>
                <div class="col-sm-4">
                  <input type="text" name="id_serie" class="form-control" id="id_serie" value="" readonly required>

                </div>
              </div>

              <div class="form-group">
                <label for="notas" class="col-sm-2 control-label">Comentarios Pedido:</label>
                <div class="col-sm-10">
                <textarea name="notas" disabled class="form-control" id="notas"  placeholder="Notas"></textarea>
                </div>
               </div>
               


              <div class="form-group">
                <label for="toneladas_pedido" class="col-sm-1 control-label">Toneladas Pedido</label>

                <div class="col-sm-2">
					<input name="toneladas_pedido" type="text" readonly required class="form-control" id="toneladas_pedido">                
                </div>
 
                 <label for="toneladas_embarcadas" class="col-sm-1 control-label">Toneladas Embarcadas</label>

                <div class="col-sm-2">
					<input name="toneladas_embarcadas" type="text" readonly required class="form-control" id="toneladas_embarcadas">                
                </div>

                
                <label for="toneladas_restantes" class="col-sm-1 control-label">Toneladas Restantes</label>
                <div class="col-sm-2">
					<input name="toneladas_restantes" type="text" readonly required class="form-control" id="toneladas_restantes">                
                </div>

                <label for="" class="col-sm-1">Forma de Pago</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" value="" name="f_de_pago" id="f_de_pago">
                </div>
				</div>

              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Llenar información para la Remisión</h3>
                </div>
                <label for="flete_nombre" class="col-sm-1 control-label">Flete</label>
                <div class="col-sm-3">
					<input type="text" name="nombre_flete" class="form-control" id="nombre_flete" required >                
                </div>
                
                <label for="flete_operador" class="col-sm-1 control-label">Operador</label>
                <div class="col-sm-3">
					<input type="text" name="nombre_operador_flete" class="form-control" id="nombre_operador_flete" required>                
                </div>
                
                <label for="flete_placas" class="col-sm-1 control-label">Placas</label>
                <div class="col-sm-3">
					<input type="text" name="placas_flete" class="form-control" id="placas_flete" required>                
                </div>

				</div>

              <div class="form-group">
                <label for="destino"  class="col-sm-2 control-label">Destino</label>
                <div class="col-sm-4">
					<input type="text" name="destino_flete" class="form-control" id="destino_flete" required>                
                </div>
                <!--
                <label for="cajas" class="col-sm-1 control-label">Cajas</label>
                <div class="col-sm-3">
					<input type="text" name="cajas_flete" class="form-control" id="cajas_flete" required>                
                </div>
                -->
                <label for="tipo_flete" class="col-sm-2 control-label">Full/Sencillo</label>
                <div class="col-sm-4">
                  <select name="tipo_flete" id="tipo_flete" class="form-control" required>
                    <option value="" selected>Seleccionar...</option>
                    <option value="N/A">N/A</option>
                    <option value="Sencilla">Sencilla</option>
                    <option value="Full">Full</option>
                  </select>
                </div>

              </div>

              <div class="form-group">
              
                <label for="notas_remision" class="col-sm-2 control-label">Comentarios Remisión</label>
                <div class="col-sm-10">
                	<textarea name="notas_remision" class="form-control" id="notas_remision"  placeholder="Anotaciones"></textarea>
                </div>
              </div>




              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" id="submit" name="submit" value="Agregar Entrada" class="btn btn-info pull-right">
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
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
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
    $('#reservation-old').daterangepicker({
        format: 'MM/DD/YYYY h:mm a',
        autoclose: true,
        todayBtn: true,
        timePicker: true,
        singleDatePicker: true, //<==HERE
    });

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
    todayHighlight: true,
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
	
	$('#serie').on('change',function(){
    //alert($('select option:selected').val());
    var get=$('#serie').val();
	//alert(get);
	if (get=='A'){ //NORMAL
    	$('#id_serie').val($('#serie_a').val());
		$("#serie_espuela").css({"display":"none"});
	}
	if (get=='G'){ //EFECTIVO
    	$('#id_serie').val($('#serie_g').val());
		$("#serie_espuela").css({"display":"none"});
	}
	if (get=='E'){ //ESPUELA
    	$('#id_serie').val($('#serie_e').val());
		$("#serie_espuela").css({"display":"block"});
		$('#monto_total_remision').attr('readonly', false);
		$('#monto_total_remision').attr('disabled', false);
	}

});
});
</script>
<script>

    function get_values()
    {
        var id = $("#id_pedido").val();
		departamento = $('#depto').val();
		if(id != 0) { //CON PEDIDO
                 $.ajax({
                    url : "<?php echo base_url();?>admin/espera/get_pedido/"+id,
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
					error: function() {
              			alert('Algo falló...');
           			},
                    success: function(data){
							
 /*
 {"fecha_pedido":"2019-11-11","id":"407","id_vendedor":"5","id_estatus_pedido":"2","estatus_pedido":"Parcialmente Surtido","id_cliente":"603","orden_de_compra":"","toneladas":"55.00","toneladas_embarcadas":"19.44","precio_tonelada":"102.00","monto_total":"5610.00","obra_cliente":"CUMBRES PLATINUM","razon_social_cliente":"CARO SERVICIOS INMOBILIARIOS, S.A DE C.V.","nombre_del_material":"Grava 2","vendedor":"Manuel Yerena","razon_social_re":"GRUPO REGIO CAL SA DE CV","id_registro_patronal":"1","notas":"","id_material":"16"}
 */	
 
 // INFO DEL PEDIDO						
							$('#id_registro_patronal').val(data['id_registro_patronal']);
							$('#select_registro_patronal').val(data['id_registro_patronal']);
							$('#select_registro_patronal').attr('disabled', true); 

              $('#serie').val(data['serie']);
							$('#serie').attr('disabled', true); 

							
							$('#id_cliente').val(data['id_cliente']);
							$('#select_cliente').val(data['id_cliente']).change();;
							$('#select_cliente').attr('disabled', true); 
							
							$('#id_sucursal').val(data['id_sucursal']);
							$('#select_sucursal').val(data['id_sucursal']);
							$('#select_sucursal').attr('disabled', true); 
							
							//$('#razon_social').val(data['razon_social_cliente']);
							//$('#razon_social').attr('readonly', true); 
							
							$('#obra_cliente').val(data['obra_cliente']);
							$('#obra_cliente').attr('readonly', true); 

							$('#sucursal').val(data['sucursal']);
							$('#sucursal').attr('readonly', true); 
	
							$('#id_material').val(data['id_material']);
							$('#select_material').val(data['id_material']);
							$('#select_material').attr('disabled', true); 
							
	
							$('#id_vendedor').val(data['id_vendedor']);
							$('#select_vendedor').val(data['id_vendedor']);
							$('#select_vendedor').attr('disabled', true); 
	
							//$('#vendedor').val(data['vendedor']);
							//$('#vendedor').attr('readonly', true); 
							//$('#id_vendedor').val(data['id_vendedor']);
							
							$('#orden_de_compra').val(data['orden_de_compra']);
							$('#orden_de_compra').attr('readonly', true); 
							
							$('#notas').val(data['notas']);
							$('#notas').attr('readonly', true); 

							$('#precio_tonelada').val(data['precio_tonelada']);
							$('#precio_tonelada').attr('readonly', true); 
							
							$('#monto_total_pedido').val(data['monto_total']);
							$('#monto_total_pedido').attr('readonly', true); 

							$('#toneladas_pedido').val(data['toneladas']);
							$('#toneladas_pedido').attr('readonly', true); 

							$('#toneladas_restantes').val(data['toneladas_restantes']);
							$('#toneladas_restantes').attr('readonly', true); 
							
							$('#toneladas_embarcadas').val(data['toneladas_embarcadas']);
              $('#toneladas_embarcadas').attr('readonly', true); 
              
              $('#f_de_pago').val(data['f_de_pago']);
              $('#f_de_pago').attr('readonly', true);



// INFO DE LA REMISION							
							$('#peso_inicial').val(0);
							$('#peso_final').val(0);
							$('#toneladas_remision').val(0);
							$('#monto_total_remision').val(0);
							//$("#mtr").hide();
							
                    }
                });
	} else { 
	// SIN PEDIDO
							$('#id_registro_patronal').val(0);
							$('#select_registro_patronal').attr('readonly', false);
							$('#select_registro_patronal').attr('disabled', false);
							$('#select_registro_patronal').attr('required', true);
							$("#select_registro_patronal").val($("#id_registro_patronal option:first").val());

							//SIN PEDIDO, 1) SE ESCONDE EL INPUT RAZON_SOCIAL, SE AGREGA EL DROPDOWN DE LOS CLIENTES. 
							//CON PEDIDO, 1) SE ESCONDE EL DROPDOWN, SE MUESTRA EL INPUT
							
							$('#id_cliente').val(0);
							$('#select_cliente').attr('readonly', false);
							$('#select_cliente').attr('disabled', false);
							$('#select_cliente').attr('required', true);
							$("#select_cliente").val($("#id_cliente option:first").val());
							
							$('#id_sucursal').val(0);
							$('#select_sucursal').val(0);
							$('#select_sucursal').attr('readonly', false);
							$('#select_sucursal').attr('disabled', false);
							$('#select_sucursal').attr('required', false);
							$("#select_sucursal").val($("#id_sucursal option:first").val());
							
							  var baseURL= "<?php echo base_url();?>";
  // Sucursales
    $('#select_cliente').change(function(){
		$("#select_sucursal").prop("disabled", false); 
      var id_cliente = $(this).val();
	  //alert(id_departamento);

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>admin/espera/getClienteSucursales',
        method: 'post',
        data: {id_cliente: id_cliente,'<?php echo $this->security->get_csrf_token_name(); ?>': cct},
        dataType: 'json',
        success: function(response){

          // Remove options 
          $('#select_sucursal').find('option').not(':first').remove();

          // Add options
		  $('#select_sucursal').append('<option value="0">Sin Sucursal</option>');
          $.each(response,function(index,data){
             $('#select_sucursal').append('<option value="'+data['id']+'">'+data['sucursal']+'</option>');
          });
        }
     });
   });


							//$('#razon_social').val('');
							//$('#razon_social').attr('readonly', false); 
														
							$('#obra_cliente').val('');
							$('#obra_cliente').attr('readonly', false); 
							$('#obra_cliente').attr('disabled', false); 

              $('#serie').val('');
							$('#serie').attr('readonly', false); 
							$('#serie').attr('disabled', false); 



							//$('#sucursal').val('');
							//$('#sucursal').attr('readonly', false); 
							

							$('#id_material').val(0);
							$('#select_material').attr('readonly', false);
							$('#select_material').attr('disabled', false);
							$("#select_material").val($("#id_material option:first").val());

							$('#id_vendedor').val(0);
							$('#select_vendedor').attr('readonly', false);
							$('#select_vendedor').attr('disabled', false);
							$("#select_vendedor").val($("#id_vendedor option:first").val());

	
							$('#vendedor').val('');
							$('#vendedor').attr('readonly', false); 
							$('#id_vendedor').val('');
							
							$('#orden_de_compra').val('');
							$('#orden_de_compra').attr('readonly', false); 
							
							$('#notas').val('');
							$('#notas').attr('readonly', false); 
							$('#notas').attr('disabled', false); 

							$('#precio_tonelada').val(0);
							$('#precio_tonelada').attr('readonly', true); 

							$('#monto_total_pedido').val(0);
							$('#monto_total_pedido').attr('readonly', true); 

							
							$('#toneladas_pedido').val(0);
							$('#toneladas_pedido').attr('readonly', true); 

							$('#toneladas_restantes').val(0);
							$('#toneladas_restantes').attr('readonly', true); 
							
							$('#toneladas_embarcadas').val(0);
              $('#toneladas_embarcadas').attr('readonly', true); 
              
              $('#f_de_pago').val('Sin Pedido');
              $('#f_de_pago').attr('readonly', true);
	
	//INFO DE LA REMISION
							
							$('#peso_inicial').val(0);
							$('#peso_final').val(0);
							$('#toneladas_remision').val(0);
							//$("#mtr").show();// and $("#dv1").hide();
							$('#monto_total_remision').val(0);
							$('#monto_total_remision').attr('readonly', false);
							
							$('label[for=precio_tonelada], input#precio_tonelada').show();
							/*if(departamento=='MINA'){
								//Hide Input Precio_Tonelada
								//$('#precio_tonelada').hide();
								//$('label[for=precio_tonelada], input#precio_tonelada').hide();
								//$('#precio_tonelada_remision').show();
								//$('label[for=lbl_precio_tonelada_remision], input#precio_tonelada_remision').show();
							}*/

	}
                return false;
    }

function change_show_monto_serie(){
	$('#id_registro_patronal').val($('#select_registro_patronal').val());
}	
	
function change_registro_patronal(){
	$('#id_registro_patronal').val($('#select_registro_patronal').val());
}
function change_material(){
	$('#id_material').val($('#select_material').val());
}

function change_id_cliente(){
  $('#id_cliente').val($('#select_cliente').val());
}

function change_id_sucursal(){
  $('#id_sucursal').val($('#select_sucursal').val());
}


function change_id_vendedor(){
	$('#id_vendedor').val($('#select_vendedor').val());
}

</script>


<script>
jQuery('body').on('input','input.peso_monto',function(){
       var peso_inicial;
       var peso_final;
	   var result_peso;
	   var precio_tonelada_calc;
	   var result_monto;

       peso_inicial = parseFloat($('#peso_inicial').val());
       peso_final = parseFloat($('#peso_final').val());
	   precio_tonelada_calc = parseFloat($('#precio_tonelada').val());
	   result_peso = peso_final - peso_inicial;
	   if(result_peso<0){result_peso = result_peso*-1;}
       result_monto = result_peso * precio_tonelada_calc;

	   if(!isNaN(result_peso)){
	   		$('#toneladas_remision').val(result_peso.toFixed(3));
	   }
	   if(!isNaN(result_monto)){
	   		$('#monto_total_remision').val(result_monto.toFixed(2));
	   }
});

$('#submit').click(function(){
    console.log('delay click waiting...');

    setTimeout( function() {
        $('#submit').attr('disabled', true);
        console.log('Hellow disabled :)')
    },
    100);
});

/*
  $('#nombre_flete').attr('readonly', true);
    $('#nombre_flete').click(function(){

      $('#nombre_flete').attr('readonly', false);
});


$('#nombre_operador_flete').attr('readonly', true);
    $('#nombre_operador_flete').click(function(){

      $('#nombre_operador_flete').attr('readonly', false);
});


$('#placas_flete').attr('readonly', true);
    $('#placas_flete').click(function(){

      $('#placas_flete').attr('readonly', false);
});


$('#entrada_flete').attr('readonly', true);
    $('#entrada_flete').click(function(){

      $('#entrada_flete').attr('readonly', false);
});


$('#salida_flete').attr('readonly', true);
    $('#salida_flete').click(function(){

      $('#salida_flete').attr('readonly', false);
});


$('#destino_flete').attr('readonly', true);
    $('#destino_flete').click(function(){

      $('#destino_flete').attr('readonly', false);
});

$('#tipo_flete').attr('readonly', true);
    $('#tipo_flete').click(function(){

      $('#tipo_flete').attr('readonly', false);
});

$('#notas_remision').attr('readonly', true);
    $('#notas_remision').click(function(){

      $('#notas_remision').attr('readonly', false);
});

*/

</script>


<script>
$("#add_user").addClass('active');
</script>    