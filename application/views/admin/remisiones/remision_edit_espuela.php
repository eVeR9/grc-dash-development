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

        <?php 
        $depto = strtoupper($this->session->userdata('departamento'));
        $puest = strtoupper($this->session->userdata('puesto'));
        $esAdmin = strtoupper($this->session->userdata('es_admin'));
        //echo "<b>Validacion Desarrollo:</b>";
        //echo "<br>El depto firmado es: ". $depto;
        //echo "<br>El puesto es: ". $puest;
        //echo "<br>Es admin? ". $esAdmin;
				?>
            
           
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Remisión - Espuela - Remisión: <?= $all_remisiones_complete_id['id']?></h3>
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

        
            

			<?php echo form_open(base_url('admin/remisiones/edit/'.$all_remisiones_complete_id['id']), 'class="form-horizontal"' )?>    
      

              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Información General</h3>
                </div>
                <input type="hidden" name="serie_a" class="form-control" id="serie_a" value="<? //echo $next_id_a; ?>">
                <input type="hidden" name="serie_e" class="form-control" id="serie_e" value="<? //echo $next_id_e; ?>">
                <input type="hidden" name="serie_g" class="form-control" id="serie_g" value="<? //echo $next_id_g; ?>">
                <input type="hidden" name="chk_crg" class="form-control" id="chk_crg" value="1">
                
                <?php $id_pedido = $all_remisiones_complete_id['id_pedido']; ?>
                <?php $serie= $all_remisiones_complete_id['serie']; ?>
                <?php $precio_tonelada = $all_remisiones_complete_id['precio_tonelada'] ?>
                <input type="hidden" name="id_pedido"  id="id_pedido" value="<?php echo $id_pedido;?>">
                 <input type="hidden" name="serie"  id="serie" value="<?php echo $serie;?>">
                 <input type="hidden" name="precio_tonelada" id="precio_tonelada" value="<?php echo $precio_tonelada; ?>"> 

                
                <input type="hidden" name="depto" class="form-control" id="depto" value="<?php echo strtoupper($this->session->userdata('departamento')); ?>">

                <label for="fecha_remision" class="col-sm-2 control-label">Fecha Creación</label>
				
                <div class="col-sm-4">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  
                
                  <input type="text" name="fecha_remision" class="form-control" required value="<?= $all_remisiones_complete_id['fecha_remision']; ?>" readonly>
                  </div>
                  </div>
                <label for="estatus_pedido" class="col-sm-2 control-label">Fase Remisión</label>

                <div class="col-sm-4">
                  <select name="id_fase_de_remision" id="id_fase_de_remision" class="form-control" required>
                    <option value="">Selecciona Fase</option>
                  <?php foreach($remisiones_fases as $row): ?>
                  <?php
				  	$selected=""; 
				  	if($row['id']==$all_remisiones_complete_id['id_fase_de_remision']){$selected="selected";}
					        ?>
                    <option value="<?= $row['id']; ?>" <?php echo $selected; ?>><?= $row['fase_de_remision']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                </div>
                
                <div class="form-group">
              
                <label for="serie" class="col-sm-2 control-label">Serie</label>
                <div class="col-sm-4">
                <input type="text" name="id_serie" class="form-control" id="id_serie" value="<?= $all_remisiones_complete_id['serie']; ?>" readonly required>
                  <!--<select name="serie" id="serie" class="form-control" required>
                    <option value="" selected>Selecciona Serie</option>
                    <option value="A" data-value="A">Serie A</option>
                    <option value="E" data-value="E">Serie E</option>
                    <option value="G" data-value="G">Serie G</option>
                  </select>-->
                </div>
                <label for="id_serie" class="col-sm-2 control-label">Folio</label>
                <div class="col-sm-4">
					<input type="text" name="id_serie" class="form-control" id="id_serie" value="<?= $all_remisiones_complete_id['id_serie']; ?>" readonly required>
                </div>
                </div>
                
                <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Información del Pedido</h3>
                </div>
                
                <label for="id_pedido" class="col-sm-1 control-label">Pedido</label>

                <div class="col-sm-5">
                <input type="hidden" name="id_pedido" class="form-control" id="id_pedido" value="<?php echo $all_remisiones_complete_id['id_pedido'];?>" >
                <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $all_remisiones_complete_id['id_cliente'] ?>">
                
                <input type="text" name="id_pedido2" class="form-control" id="id_pedido2" value="<?php if(!empty($all_remisiones_complete_id['id_pedido'])) { echo $all_remisiones_complete_id['id_pedido'];} else echo 'Sin pedido'; ?>" readonly required>
                </div>
                <label for="razon_social_remisiona" class="col-sm-1 control-label">Remisiona:</label>
                <div class="col-sm-5">
                  <input type="hidden" name="id_registro_patronal" id="id_registro_patronal" value="<?php echo $all_remisiones_complete_id['id_registro_patronal'] ?>">
                  <input type="text" name="registro_patronal_re" class="form-control" id="registro_patronal_re" value="<?php echo $all_remisiones_complete_id['razon_social_re'] ?>" readonly required>
                </div>
              </div>

          <div class="form-group">
                <label for="razon_social" class="col-sm-1 control-label">Cliente:</label>
                <div class="col-sm-5">
          <input type="text" name="razon_social" class="form-control" id="razon_social"  value="<?php echo $all_remisiones_complete_id['razon_social']; ?>" readonly> 
                </div>

                <label for="obra_cliente" class="col-sm-2 control-label">Obra de Cliente:</label>
                <div class="col-sm-4">
					<input type="text" name="obra_cliente" id="obra_cliente" class="form-control"  value="<?php echo $all_remisiones_complete_id['obra_cliente']; ?>" readonly required>                
            </div>
              </div>

              <div class="form-group">
                <label for="sucursal" class="col-sm-1 control-label">Sucursal:</label>
                <div class="col-sm-5">
					<input name="sucursal" type="text"  class="form-control" id="sucursal" value="<?php echo $all_remisiones_complete_id['sucursal']; ?>" required readonly>                
                </div>

                <label for="nombre_del_material" class="col-sm-2 control-label">Material:</label>
                <div class="col-sm-4">
                  <input type="hidden" name="id_material" id="id_material" value="<?php echo $all_remisiones_complete_id['id_material']; ?>">
                  <input type="text" name="nombre_del_material" id="nombre_del_material"  class="form-control"  value="<?php echo $all_remisiones_complete_id['nombre_del_material']; ?>" required readonly> 
                
					<!--<input name="nombre_del_material" type="text" required class="form-control" id="nombre_del_material" value="" >
                    <input type="hidden" name="id_material" id="id_material" value="">  -->              
                </div>
              </div>

              <div class="form-group">
                <label for="vendedor" class="col-sm-1 control-label">Vendedor:</label>
                <div class="col-sm-5">
					<input type="text" name="vendedor" id="vendedor" class="form-control" value="<?php echo $all_remisiones_complete_id['nombre_vendedor']; ?>" required readonly>
                    <input type="hidden" name="id_vendedor" id="id_vendedor" value="<?php echo $all_remisiones_complete_id['id_vendedor']; ?>">                
                </div>

                <label for="orden_de_compra" class="col-sm-2 control-label">Orden de Compra:</label>
                <div class="col-sm-4">
					<input type="text" name="orden_de_compra" id="orden_de_compra" class="form-control" value="<?php echo $all_remisiones_complete_id['orden_de_compra']; ?>" required readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="notas" class="col-sm-2 control-label">Comentarios Pedido:</label>
                <div class="col-sm-10">
                <textarea name="notas" id="notas" class="form-control" readonly><?php echo $all_remisiones_complete_id['notas']; ?></textarea>
                </div>
              </div>
                
               <?php if($depto == "TI" || $depto == "Ventas") { ?>
              <div class="form-group">
                <label for="precio_tonelada" class="col-sm-2 control-label">Precio Tonelada</label>

                <div class="col-sm-4">
					<input type="text" class="form-control peso_monto" name="precio_tonelada" id="precio_tonelada" value="<?php echo $all_remisiones_complete_id['precio_tonelada']; ?>" required readonly>                
                </div>
                <label for="monto_total" class="col-sm-2 control-label">Monto Total</label>

                <div class="col-sm-4">
					<input type="text" name="monto_total_pedido" class="form-control peso_monto" id="monto_total_pedido" value="<?php echo $all_remisiones_complete_id['monto_total']; ?>" required readonly>                
                </div>
              </div>
               <?php } ?>

              <div class="form-group">
                
                
                <label for="toneladas_pedido" class="col-sm-2 control-label">Toneladas Pedido</label>

                <div class="col-sm-2">
					<input type="text" name="toneladas_pedido" class="form-control" id="toneladas_pedido" value="<?php echo $all_remisiones_complete_id['toneladas']; ?>" required readonly>                
                </div>
 
                 <label for="toneladas_embarcadas" class="col-sm-2 control-label">Toneladas Embarcadas</label>

                <div class="col-sm-2">
					<input type="text" name="toneladas_embarcadas" class="form-control" id="toneladas_embarcadas" value="<?php echo $all_remisiones_complete_id['toneladas_embarcadas']; ?>" required readonly>                
                </div>

                
                <label for="toneladas_restantes" class="col-sm-2 control-label">Toneladas Restantes</label>
                <div class="col-sm-2">
					<input type="text" name="toneladas_restantes" class="form-control" id="toneladas_restantes" value="<?php echo ($all_remisiones_complete_id['toneladas_embarcadas'] - $all_remisiones_complete_id['toneladas_embarcadas']); ?>" required readonly>               
                </div>
				</div>

        
              <div class="form-group">
   
                <div class="box-header with-border">
                  <h3 class="box-title">Información de la Remisión</h3>
                </div>
                <label for="flete_nombre" class="col-sm-1 control-label">Flete</label>
                <div class="col-sm-3">
					<input type="text" name="nombre_flete" class="form-control" id="nombre_flete" value="<?= $all_remisiones_complete_id['nombre_flete']; ?>" required >                
                </div>
                
                <label for="flete_operador" class="col-sm-1 control-label">Operador</label>
                <div class="col-sm-3">
					<input type="text" name="nombre_operador_flete" class="form-control" id="nombre_operador_flete" value="<?= $all_remisiones_complete_id['nombre_operador_flete']; ?>" required>                
                </div>
                
                <label for="flete_placas" class="col-sm-1 control-label">Placas</label>
                <div class="col-sm-3">
					<input type="text" name="placas_flete" class="form-control" id="placas_flete" value="<?= $all_remisiones_complete_id['placas_flete']; ?>"  required>                
                </div>

				</div>

              <div class="form-group">
                <label for="entrada" class="col-sm-2 control-label">Hora Entrada</label>
                <div class="col-sm-2">
					<input type="text" name="entrada_flete" class="form-control" id="entrada_flete" value="<?= $all_remisiones_complete_id['entrada_flete']; ?>" required>                
                </div>

                <label for="salida" class="col-sm-2 control-label">Hora Salida</label>
                <div class="col-sm-2">
					<input type="text" name="salida_flete" class="form-control" id="salida_flete" value="<?= $all_remisiones_complete_id['salida_flete']; ?>" required>                
                </div>
                <label for="cargado-interno" class="col-sm-2 control-label">Folio cargado externo</label>
                  <div class="col-sm-2">
          <input type="text" name="cargado_externo" class="form-control" id="cargado_externo">
                  </div>
              </div>

              <div class="form-group">
                <label for="destino" class="col-sm-2 control-label">Destino</label>
                <div class="col-sm-4">
					<input type="text" name="destino_flete" class="form-control" id="destino_flete" value="<?= $all_remisiones_complete_id['destino_flete']; ?>" required>                
                </div>
                <!--
                <label for="cajas" class="col-sm-1 control-label">Cajas</label>
                <div class="col-sm-3">
					<input type="text" name="cajas_flete" class="form-control" id="cajas_flete" value="<?//= $all_remisiones_complete_id['cajas_flete'] ?>" required>                
                </div>
                -->
                <label for="tipo_flete" class="col-sm-2 control-label">Full/Sencillo</label>
                <div class="col-sm-4">
                  <select name="tipo_flete" id="tipo_flete" class="form-control" value="<?= $all_remisiones_complete_id['tipo_flete']; ?>" required>
                  <?php if($all_remisiones_complete_id['tipo_flete'] == "Sencilla") { ?>
                    <option value="Sencilla" selected>Sencilla</option>
                    <option value="Full">Full</option>
                  <?php } else { ?>
                    <option value="Sencilla">Sencilla</option>
                    <option value="Full" selected>Full</option>
                  <?php } ?>  
                  </select>
                </div>

              </div> <!-- /form-group -->

              <div class="form-group">
              
                <label for="notas_remision" class="col-sm-2 control-label">Comentarios Remisión</label>
                <div class="col-sm-10">
                	<textarea name="notas_remision" class="form-control" id="notas_remision" value="<?= $all_remisiones_complete_id['notas_remision']; ?>"  placeholder="Anotaciones"></textarea>
                </div>
              </div>
       

<div class="green box">

              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos del Ticket Báscula</h3>
                </div>
                <label for="ticket_bascula" class="col-sm-2 control-label">Ticket</label>
                <div class="col-sm-4">
					<input type="text" name="ticket_bascula" class="form-control" id="ticket_bascula" value="<?= $all_remisiones_complete_id['ticket_bascula']; ?>" required placeholder="Ticket Báscula" style="margin-bottom:10px;" >                
          </div>
                <label for="toneladas_remision" class="col-sm-2 control-label">Total Toneladas</label>
                <div class="col-sm-4">
					<input type="text" name="toneladas_remision" class="form-control peso_monto" id="toneladas_remision" value="<?= $all_remisiones_complete_id['toneladas_remision']; ?>" readonly style="margin-bottom:10px;">                
                </div>


                </div>

              <div class="form-group">
                <label for="peso_inicial" class="col-sm-2 control-label">Peso Inicial</label>
                <div class="col-sm-4">
					<input type="text" name="peso_inicial" class="form-control peso_monto" id="peso_inicial" value="<?= $all_remisiones_complete_id['peso_inicial']; ?>" readonly>                
                </div>

                <label for="peso_final" class="col-sm-2 control-label">Peso Final</label>
                <div class="col-sm-4">
					<input type="text" name="peso_final" class="form-control peso_monto" id="peso_final" value="<?= $all_remisiones_complete_id['peso_final']; ?>" required>                
                </div>

              </div>

<!--
<?php// if ($serie == 'G' || $id_pedido = 0) { ?>
              <div class="form-group">
              
                <label for="monto_total_remision" class="col-sm-2 control-label">Monto Total</label> 
                <div class="col-sm-4">
                	<input type="number" step="any" name="monto_total_remision" class="form-control" id="monto_total_remision" value="<?//= $all_remisiones_complete_id['monto_total_remision']; ?>">
             	</div>
              </div>
<?php// } ?>
-->


</div>



              <div class="form-group">
                <div class="col-md-12">
                  <input type="button" value="Cancelar" class="btn btn-danger pull-left" onClick="history.go(-1)" style="width:105px;">
                  <input type="submit" name="submit" value="Editar Remision" class="btn btn-info pull-right">
                </div>
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
	
	$('#serie').on('change',function(){
    //alert($('select option:selected').val());
    var get=$('#serie').val();
	//alert(get);
	if (get=='A'){
    	$('#id_serie').val($('#serie_a').val());
	}
	if (get=='E'){
    	$('#id_serie').val($('#serie_e').val());
	}
	if (get=='G'){
    	$('#id_serie').val($('#serie_g').val());
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
                    url : "<?php echo base_url();?>admin/remisiones/get_pedido/"+id,
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
							$('#id_registro_patronal').val(data['id_registro_patronal']);
							$('#select_registro_patronal').val(data['id_registro_patronal']);
							$('#select_registro_patronal').attr('disabled', true); 
							
							$('#razon_social').val(data['razon_social_cliente']);
							$('#razon_social').attr('readonly', true); 
							
							$('#obra_cliente').val(data['obra_cliente']);
							$('#obra_cliente').attr('readonly', true); 

							$('#sucursal').val(data['sucursal']);
							$('#sucursal').attr('readonly', true); 
	
							$('#id_material').val(data['id_material']);
							$('#select_material').val(data['id_material']);
							$('#select_material').attr('disabled', true); 
	
							$('#vendedor').val(data['vendedor']);
							$('#vendedor').attr('readonly', true); 
							$('#id_vendedor').val(data['id_vendedor']);
							
							$('#orden_de_compra').val(data['orden_de_compra']);
							$('#orden_de_compra').attr('readonly', true); 
							
							$('#notas').val(data['notas']);
							$('#notas').attr('readonly', true); 

							$('#precio_tonelada').val(data['precio_tonelada']);
							$('#precio_tonelada').attr('readonly', true); 

							$('#toneladas_pedido').val(data['toneladas']);
							$('#toneladas_pedido').attr('readonly', true); 

							$('#toneladas_restantes').val(data['toneladas_restantes']);
							$('#toneladas_restantes').attr('readonly', true); 
							
							$('#toneladas_embarcadas').val(data['toneladas_embarcadas']);
							$('#toneladas_embarcadas').attr('readonly', true); 
							
							$('#peso_inicial').val(0);
							$('#peso_final').val(0);
							$('#toneladas_remision').val(0);
							$('#monto_total_remision').val(0);
							
							$('label[for=precio_tonelada], input#precio_tonelada').show();
							if(departamento=='MINA'){ //ESCONDER PRECIO TONELADA
								$('label[for=precio_tonelada], input#precio_tonelada').hide();
							}
                    }
                });
	} else { 
	// SIN PEDIDO
							
							$('#id_registro_patronal').val(0);
							$('#select_registro_patronal').attr('readonly', false);
							$('#select_registro_patronal').attr('disabled', false);
							$('#select_registro_patronal').attr('required', true);
							$("#select_registro_patronal").val($("#id_registro_patronal option:first").val());

							
							$('#razon_social').val('');
							$('#razon_social').attr('readonly', false); 
							
							$('#obra_cliente').val('');
							$('#obra_cliente').attr('readonly', false); 

							$('#sucursal').val('');
							$('#sucursal').attr('readonly', false); 

							$('#id_material').val(0);
							$('#select_material').attr('readonly', false);
							$('#select_material').attr('disabled', false);
	
							$('#vendedor').val('');
							$('#vendedor').attr('readonly', false); 
							$('#id_vendedor').val('');
							
							$('#orden_de_compra').val('');
							$('#orden_de_compra').attr('readonly', false); 
							
							$('#notas').val('');
							$('#notas').attr('readonly', false); 

							$('#precio_tonelada').val(0);
							$('#precio_tonelada').attr('readonly', false); 
							
							$('#toneladas_pedido').val(0);
							$('#toneladas_pedido').attr('readonly', true); 

							$('#toneladas_restantes').val(0);
							$('#toneladas_restantes').attr('readonly', true); 
							
							$('#toneladas_embarcadas').val(0);
							$('#toneladas_embarcadas').attr('readonly', true); 
							
							$('#peso_inicial').val(0);
							$('#peso_final').val(0);
							$('#toneladas_remision').val(0);
							$('#monto_total_remision').val(0);
							
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
	
	
function change_registro_patronal(){
	$('#id_registro_patronal').val($('#select_registro_patronal').val());
}
function change_material(){
	$('#id_material').val($('#select_material').val());
}

function change_id_cliente(){
  $('#id_cliente').val($('#select_cliente').val());
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
       result_monto = result_peso * precio_tonelada_calc;

	   if(!isNaN(result_peso)){
	   		$('#toneladas_remision').val(result_peso.toFixed(2));
	   }
	   if(!isNaN(result_monto)){
	   		$('#monto_total_remision').val(result_monto.toFixed(2));
	   }
});
</script>


<script>
$("#add_user").addClass('active');
</script>   