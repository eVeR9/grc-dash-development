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

<style>
.main-footer{
    display: none;
}

.align-div {
    margin-top: 4px;
}

.align-razones {
    display: none;
}

</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">   
                <div class="box-header with-border">
                    <h3 class="box-title">Trituración - Bitácora</h3>
                </div>
                <!-- Errors front -->

                <div class="box-body">
                <?php echo  form_open(base_url('admin/trituracion/bitacora_edit/'.$get_all_trituracion_bitacora_id['id']), 'class="form-horizontal"'); ?>
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Captura los datos</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-3">
                            <input type="text" name="fecha" class="form-control daterange" required value="<?php echo $get_all_trituracion_bitacora_id['fecha']; ?>">
                        </div>

                        <label for="" class="col-md-1 control-label">Turno</label>
                        <div class="col-md-3">
                        <select name="turno" id="turno" class="form-control" required>
                        <?php $valor=$get_all_trituracion_bitacora_id['turno']; ?>
                            <option value="">--Seleccione--</option>
                            <option value="Dia" <?php if($valor=="Dia"){ echo "selected";}?>>Dia</option>
                            <option value="Tarde" <?php if($valor=="Tarde"){ echo "selected";}?>>Tarde</option>
                            <option value="Noche" <?php if($valor=="Noche"){ echo "selected";}?>>Noche</option>
                        </select>
                        </div>

                        <label for="" class="col-md-1 control-label">Viajes</label>
                        <div class="col-md-3">
                            <input type="number" id="numero_viajes" name="numero_viajes" class="form-control" required value="<?php echo $get_all_trituracion_bitacora_id['numero_viajes']; ?>">
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="" class="col-md-3 control-label">Toneladas</label>
                        <div class="col-md-3">
                            <input type="number" step="any" id="toneladas_viajes" name="toneladas_viajes" class="form-control" readonly value="<?php echo $get_all_trituracion_bitacora_id['toneladas_viajes']; ?>">
                        </div>

                        <label for="" class="col-md-3 control-label">Toneladas- Producidas</label>
                        <div class="col-md-3">
                            <input type="number" step="any" id="total_toneladas_producidas" name="total_toneladas_producidas" class="form-control" readonly value="<?php echo $get_all_trituracion_bitacora_id['total_toneladas_producidas']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Paros</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Paro</label>
                        <?php $valor=$get_all_trituracion_bitacora_id['paro']; ?>
                        <div class="col-md-3 align-div">
                            Si&nbsp;&nbsp;<input type="radio" style="" name="paro" id="si" value="1">&nbsp;&nbsp;
                            No&nbsp;&nbsp;<input type="radio" style="" name="paro" id="no" value="0" checked>
                        </div>
                        <div class="razones align-razones">
                            <label for="" class="col-md-2 control-label">Motivo de Paro</label>
                            <div class="col-md-6">
                            <select name="paro_id_razon" id="paro_id_razon" class="form-control" required >
                                <option value="">-- Seleccione --</option>
                                <?php foreach($all_razones_paro as $row): ?>
                                <?php 
                                    $valor=$get_all_trituracion_bitacora_id['paro'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>" <?php echo $selected; ?>><?= $row['descripcion']; ?></option>
                                <?php endforeach; ?>
                            </select>                                       
                            </div>
                        </div> <!-- father align div -->
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Produccion Toneladas</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 col-md-offset-3 bold">Materiales</label>
                        <label for="" class="col-md-2 col-md-offset-3 bold">Toneladas</label>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 1</label>

                        <div class="col-md-4">
                            <select name="id_material_bascula1" id="id_material_bascula1" class="form-control" required>
                                <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula1'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                            </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="toneladas_bascula1" class="form-control bascula" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula1']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 2</label>

                        <div class="col-md-4">
                        <select name="id_material_bascula2" id="id_material_bascula2" class="form-control" required>
                        <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula2'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                        </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" step="any" name="toneladas_bascula2" class="form-control bascula" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula2']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 3</label>

                        <div class="col-md-4">
                        <select name="id_material_bascula3" id="id_material_bascula3" class="form-control" required>
                        <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula3'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                        </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="toneladas_bascula3" class="form-control bascula" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula3']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 4</label>

                        <div class="col-md-4">
                        <select name="id_material_bascula4" id="id_material_bascula4" class="form-control" required>
                        <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula4'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                        </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="toneladas_bascula4" class="form-control" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula4']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 5</label>

                        <div class="col-md-4">
                        <select name="id_material_bascula5" id="id_material_bascula5" class="form-control" required>
                        <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula5'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                        </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="toneladas_bascula5" class="form-control" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula5']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 6</label>

                        <div class="col-md-4">
                        <select name="id_material_bascula6" id="id_material_bascula6" class="form-control" required>
                        <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula6'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                        </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="toneladas_bascula6" class="form-control" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula6']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 7</label>

                        <div class="col-md-4">
                        <select name="id_material_bascula7" id="id_material_bascula7" class="form-control" required>
                        <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula7'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                        </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="toneladas_bascula7" class="form-control" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula7']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 8</label>

                        <div class="col-md-4">
                        <select name="id_material_bascula8" id="id_material_bascula8" class="form-control" required>
                        <option value="">Seleccione Material</option>
                                <?php foreach($all_materiales as $row): ?>
                                    <?php 
                                    $valor=$get_all_trituracion_bitacora_id['id_material_bascula8'];
                                    $selected = "";
                                    if($valor == $row['id']) $selected = "selected";
                                ?>
                                    <option value="<?= $row['id']; ?>"<?php echo $selected; ?>><?= $row['nombre_del_material']; ?></option>
                                <?php endforeach; ?>
                        </select>                            
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="toneladas_bascula8" class="form-control" value="<?php echo $get_all_trituracion_bitacora_id['toneladas_bascula8']; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Guardar Datos" class="btn btn-info pull-right">
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div> <!-- End box-body -->

            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
$('.daterange').datepicker({
    "locale": {
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa",
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                ],
                "firstDay": 1

    }, //End locale Object

    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true

  });

/* Calcular Toneladas de Viajes */
$('#numero_viajes').keyup(calcular_toneladas_viajes);
function calcular_toneladas_viajes(e)
{
    $('#toneladas_viajes').val($('#numero_viajes').val() * 30);
}
/* Calcular toneladas producidas en basculas 1-3 */
$('.bascula').keyup(function () {
 
 // initialize the sum (total price) to zero
 var sum = 0;
  
 // we use jQuery each() to loop through all the textbox with 'price' class
 // and compute the sum for each loop
 $('.bascula').each(function() {
     sum += Number($(this).val());
 });
  
 // set the computed value to 'totalPrice' textbox
 $('#total_toneladas_producidas').val(sum);
  
});


  $('#si').on('click', function () {
        $('.razones').show('slow');
  });

  $('#no').on('click', function () {
        $('.razones').hide();
  });
</script>