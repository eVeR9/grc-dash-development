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
          <h3 class="box-title">Agregar Sucursal</h3>
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
           
            <?php echo form_open(base_url('admin/sucursales/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
                <label for="id_cliente" class="col-sm-2 control-label">Razon Social</label>

                <div class="col-sm-4">
                  <select name="id_cliente" id="id_cliente" class="form-control" required>
                    <option value="">Seleccionar...</option>
                  <?php foreach($all_clientes as $row): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                
                <label for="sucursal" class="col-sm-2 control-label">Sucursal</label>
                <div class="col-sm-4">
                  <input type="text" name="sucursal" value="" class="form-control" id="sucursal" placeholder="Sucursal">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Agregar Sucursal" class="btn btn-info pull-right">
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