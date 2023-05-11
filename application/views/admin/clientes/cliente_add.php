<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Agregar Cliente</h3>
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
           
            <?php echo form_open(base_url('admin/clientes/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
                <label for="razon_social" class="col-sm-2 control-label">Razon Social</label>

                <div class="col-sm-10">
                  <input type="text" name="razon_social" value="" class="form-control" id="razon_social" placeholder="Razon Social">
                </div>
              </div>

              <div class="form-group">
                <label for="codigo_cliente" class="col-sm-2 control-label">Codigo Cliente</label>

                <div class="col-sm-4">
                  <input type="text" name="codigo_cliente" value="" class="form-control" id="codigo_cliente" placeholder="Codigo de Cliente">
                </div>
                <label for="rfc" class="col-sm-2 control-label">RFC</label>

                <div class="col-sm-4">
                  <input type="text" name="rfc" value="" class="form-control" id="rfc" placeholder="RFC">
                </div>
              </div>
              <!-- fin datos generales -->
              
              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Agregar Sucursales (si aplica)</h3>
                </div>
                
                <div class="col-sm-12">
                <input type='button' class="btn btn-block btn-primary" value="Agregar Renglon" id="addButton">
                </div>
                </div>
                <div id="TextBoxesGroup" class="form-group">
                               
                <div id="LabelDiv1" class="col-sm-2" style="text-align:right;">
                <label for="lbl_sucursal1" class="control-label">Sucursal</label>
                </div>
                <div id="TextBoxDiv1" class="col-sm-4">
                	<input type="text" name="sucursal1" value="" class="form-control" id="sucursal1" placeholder="">
                </div>

                </div>
              
              <!-- Direccion -->
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Dirección</h3>
                </div>
                <label for="calle" class="col-sm-2 control-label">Calle</label>

                <div class="col-sm-10">
                  <input type="text" name="calle" value="" class="form-control" id="calle" placeholder="Calle">
                </div>
              </div>

              <div class="form-group">
                <label for="numero_int" class="col-sm-2 control-label">Número Int.</label>

                <div class="col-sm-4">
                  <input type="text" name="numero_int" value="" class="form-control" id="numero_int" placeholder="">
                </div>
                <label for="numero_ext" class="col-sm-2 control-label">Número Ext.</label>

                <div class="col-sm-4">
                  <input type="text" name="numero_ext" value="" class="form-control" id="numero_ext" placeholder="">
                </div>
              </div> 
              
              <div class="form-group">
                <label for="colonia" class="col-sm-2 control-label">Colonia</label>

                <div class="col-sm-4">
                  <input type="text" name="colonia" value="" class="form-control" id="colonia" placeholder="">
                </div>
                <label for="codigo_postal" class="col-sm-2 control-label">Código Postal</label>

                <div class="col-sm-4">
                  <input type="text" name="codigo_postal" value="" class="form-control" id="codigo_postal" placeholder="">
                </div>
              </div>  
              
              <div class="form-group">
                <label for="municipio" class="col-sm-2 control-label">Municipio</label>

                <div class="col-sm-4">
                  <input type="text" name="municipio" value="" class="form-control" id="municipio" placeholder="">
                </div>
                <label for="codigo_postal" class="col-sm-2 control-label">Ciudad</label>

                <div class="col-sm-4">
                  <input type="text" name="ciudad" value="" class="form-control" id="ciudad" placeholder="">
                </div>
              </div>  

              <div class="form-group">
                <label for="estado" class="col-sm-2 control-label">Estado</label>

                <div class="col-sm-4">
                  <input type="text" name="estado" value="" class="form-control" id="estado" placeholder="">
                </div>
                <label for="pais" class="col-sm-2 control-label">País</label>

                <div class="col-sm-4">
                  <input type="text" name="pais" value="" class="form-control" id="pais" placeholder="">
                </div>
              </div>  




              <!-- Fin Direccion -->
              <!-- Datos de Contacto -->
              <div class="form-group">
                <div class="box-header with-border">
                  <h3 class="box-title">Datos de Contacto</h3>
                </div>
                <label for="nombre_contacto" class="col-sm-2 control-label">Contacto</label>

                <div class="col-sm-10">
                  <input type="text" name="nombre_contacto" value="" class="form-control" id="nombre_contacto" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="telefono_contacto" class="col-sm-2 control-label">Teléfono</label>

                <div class="col-sm-4">
                  <input type="text" name="telefono_contacto" value="" class="form-control" id="telefono_contacto" placeholder="">
                </div>
                <label for="email_contacto" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-4">
                  <input type="text" name="email_contacto" value="" class="form-control" id="email_contacto" placeholder="">
                </div>
              </div>  

			  <!--
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Rol</label>

                <div class="col-sm-9">
                  <select name="user_role" class="form-control">
                    <option value="">Select Role</option>
                    <option value="1" <?//= ($user['is_admin'] == 1)?'selected': '' ?> >Admin</option>
                    <option value="0" <?//= ($user['is_admin'] == 0)?'selected': '' ?>>User</option>
                  </select>
                </div>
              </div>
              -->
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Agregar Cliente" class="btn btn-info pull-right">
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
$(document).ready(function(){

    var counter = 1;
		
    $("#addButton").click(function () {
				
	if(counter>10){
            alert("Máximo 10 sucursales.");
            return false;
	}   

	var LabelDiv = $(document.createElement('div'))
	     .attr("id", 'LabelDiv' + counter)
		 .addClass("col-sm-5");
                
	LabelDiv.after().html('<label for="lbl_sucursal' + counter + '" class="control-label"><center>Sucursal</center></label>');
            
	LabelDiv.appendTo("#TextBoxesGroup");


		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter)
		 .addClass("col-sm-5");
	newTextBoxDiv.after().html('<input type="text" class="form-control" name="sucursal' + counter + '" id="sucursal' + counter + '" value="" >');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
			
     });
		
     $("#getButtonValue").click(function () {
		
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });
</script>
<script>
$("#add_cliente").addClass('active');
</script>    