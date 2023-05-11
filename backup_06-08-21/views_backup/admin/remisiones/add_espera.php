<style>
.main-footer{
    display: none;
}
</style>
<?php // echo PHP_VERSION

$datestring = 'Y-m-d - h:i a';
$time = time();


?>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Remisiones en espera</h3>
                </div> <!-- box header -->
                <div class="box-body">
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                        <?= validation_errors();?>
                        <?= isset($msg)? $msg: ''; ?>
                    </div>
                <?php endif; ?>

                <?php echo form_open(base_url('admin/remisiones/add_espera/'), "class='form-horizontal'")?>
                <div class="form-group">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos Generales</h3>
                    </div>

                    <label for="" class="col-md-1 control-label">Fecha</label>
                    <div class="col-md-3">
                        <input type="datetime" name="fecha_espera" id="datePicker" class="form-control" value="<?php echo date('Y-m-d - h:i:s'); ?>" readonly>
                        <?php //echo date('Y-m-d - h:m:s');?> <?php //echo date('Y-m-d - h:i a');?>
                    </div>

                    <label for="" class="col-md-1 control-label">Estatus</label>
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="estatus" id="estatus" value="Espera" readonly>
                    </div>

                    <label for="" class="col-md-1 control-label">ID Espera</label>
                    <div class="col-md-3">
                        <input type="text" name="id_espera" id="id_espera" value="" class="form-control">
                    </div>
                    </div>


                <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Información del Pedido</h3>
                </div>
                
                <label for="id_pedido" class="col-sm-1 control-label">Pedido</label>

                <div class="col-sm-5">
                  <select name="id_pedido" id="id_pedido" class="form-control select2"  onchange="get_values();">
                  <option value="" selected>Selecciona Pedido</option>
                  <option value="0">000 - Sin Pedido</option>
                  <?php foreach($all_pedidos_complete as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['id']; ?> - <?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <label for="razon_social" class="col-sm-1 control-label">Cliente</label>
                <div class="col-sm-5">
          		<input type="hidden" name="id_cliente" id="id_cliente" value="">
          		<select name="select_cliente"  disabled class="form-control select2" id="select_cliente" onchange="change_id_cliente();" >
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

              </div>

              <div class="form-group">
                <label for="vendedor" class="col-sm-1 control-label">Vendedor</label>
                <div class="col-sm-5">
					<!--<input type="text" name="vendedor" class="form-control" id="vendedor"  value="">-->

                    <input type="hidden" name="id_vendedor" id="id_vendedor" value="">   
                    
                  <select name="select_vendedor"  disabled class="form-control" id="select_vendedor" onchange="change_id_vendedor();">
                    <option value="">Seleccione Vendedor</option>
                    <option value="0">Bascula</option>
                  <?php foreach($all_empleados_ventas as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['nombre'] . " " . $row['apellidos']; ?></option>
                    <?php endforeach; ?>
                    </select>
                                 
                </div>

                <label for="nombre_del_material" class="col-sm-1 control-label">Material</label>
                <div class="col-sm-5">
                  <input type="hidden" name="id_material" id="id_material" value="">
                  <select name="select_material"  disabled class="form-control" id="select_material" onchange="change_material();">
                    <option value="">Seleccione Material</option>
                  <?php foreach($materiales as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['nombre_del_material']; ?></option>
                    <?php endforeach; ?>
                    </select>
                
					<!--<input name="nombre_del_material" type="text"  class="form-control" id="nombre_del_material" value="" >
                    <input type="hidden" name="id_material" id="id_material" value="">  -->              
                </div>
              </div>

                    <!-- Serie de pedido -->

                <div class="form-group">
                <label for="orden_de_compra" class="col-sm-1 control-label">Orden Compra</label>
                    <div class="col-sm-5">
					    <input name="orden_de_compra" type="text" readonly  class="form-control" id="orden_de_compra" value="">
                    </div>
                <label for="obra_cliente" class="col-sm-1 control-label">Obra de Cliente</label>
                     <div class="col-sm-5">
					    <input name="obra_cliente" type="text"  class="form-control" id="obra_cliente" value="" readonly>                
                    </div>
                </div>

                <div class="form-group">
                <label for="orden_de_compra" class="col-sm-1 control-label">Serie</label>
                    <div class="col-sm-5">
					    <input name="serie" type="text" readonly  class="form-control" id="serie" value="">
                    </div>
                <label for="obra_cliente" class="col-sm-1 control-label">Forma de Pago</label>
                     <div class="col-sm-5">
					    <input name="f_de_pago" type="text"  class="form-control" id="f_de_pago" value="" readonly>                
                    </div>
                </div>

              <div class="form-group">
                <label for="notas" class="col-sm-2 control-label">Comentarios Pedido</label>
                <div class="col-sm-10">
                <textarea name="notas" disabled class="form-control" id="notas"  placeholder="Notas"></textarea>
                </div>
               </div>

              <div class="form-group">
                <label for="toneladas_pedido" class="col-sm-2 control-label">Toneladas Pedido</label>

                <div class="col-sm-2">
					<input name="toneladas_pedido" type="text" readonly  class="form-control" id="toneladas_pedido">                
                </div>
 
                 <label for="toneladas_embarcadas" class="col-sm-2 control-label">Toneladas Embarcadas</label>

                <div class="col-sm-2">
					<input name="toneladas_embarcadas" type="text" readonly  class="form-control" id="toneladas_embarcadas">                
                </div>

                
                <label for="toneladas_restantes" class="col-sm-2 control-label">Toneladas Restantes</label>
                <div class="col-sm-2">
					<input name="toneladas_restantes" type="text" readonly  class="form-control" id="toneladas_restantes">                
                </div>

				</div>

                <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Información de la Remisión</h3>
                </div>
                
                <label for="flete_nombre" class="col-sm-1 control-label">Flete</label>
                <div class="col-sm-3">
					<input type="text" name="nombre_flete" class="form-control" id="nombre_flete"  value="">                
                </div>
                
                <label for="flete_operador" class="col-sm-1 control-label">Operador</label>
                <div class="col-sm-3">
					<input type="text" name="nombre_operador_flete" class="form-control" id="nombre_operador_flete" >                
                </div>
                
                <label for="flete_placas" class="col-sm-1 control-label">Placas</label>
                <div class="col-sm-3">
					<input type="text" name="placas_flete" class="form-control" id="placas_flete" >                
                </div>

				</div>

              <div class="form-group">

                <label for="entrada" class="col-sm-2 control-label">Hora Entrada</label>
                <div class="col-sm-2">
					<input type="text" name="entrada_flete" class="form-control" id="entrada_flete" >                
                </div>

                <label for="salida" class="col-sm-2 control-label">Hora Salida</label>
                <div class="col-sm-2">
                <?php //if($depto == "MINA" && $puesto == "ESPUELA") { ?>
                <input type="text" name="salida_flete" class="form-control" id="salida_flete" > 
                <?php //} else { ?>
					<!-- <input type="text" name="salida_flete" class="form-control" id="salida_flete" readonly> -->
                <?php //} ?>              
                </div>
              </div>

              <div class="form-group">
                <label for="destino"  class="col-sm-2 control-label">Destino</label>
                <div class="col-sm-4">
					<input type="text" name="destino_flete" class="form-control" id="destino_flete" >                
                </div>
                <!--
                <label for="cajas" class="col-sm-1 control-label">Cajas</label>
                <div class="col-sm-3">
					<input type="text" name="cajas_flete" class="form-control" id="cajas_flete" >                
                </div>
                -->
                <label for="tipo_flete" class="col-sm-2 control-label">Full/Sencillo</label>
                <div class="col-sm-4">
                  <select name="tipo_flete" id="tipo_flete" class="form-control" >
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
                  <input type="submit" id="submit" name="submit" value="Agregar Remision" class="btn btn-info pull-right">
                </div>
                <?php echo form_close();?>

                </div> <!-- box body -->
            </div> <!-- box -->
        </div> <!-- col-md-12 -->
    </div> <!-- row -->
</section>

<script>
//document.getElementById('datePicker').valueAsDate = new Date();
$(document).ready( function() {
    $('#datePicker').val(new Date().toDateInputValue());
});

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
 
 // INFO DEL PEDIDO						
							$('#id_registro_patronal').val(data['id_registro_patronal']);
							$('#select_registro_patronal').val(data['id_registro_patronal']);
							$('#select_registro_patronal').attr('disabled', true); 
							
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

                            $('#serie').val(data['serie']);
                            $('#serie').attr('readonly', true);


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
	
	// INFO DEL PEDIDO						
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


							//$('#razon_social').val('');
							//$('#razon_social').attr('readonly', false); 
														
							$('#obra_cliente').val('');
							$('#obra_cliente').attr('readonly', false); 
							$('#obra_cliente').attr('disabled', false); 

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