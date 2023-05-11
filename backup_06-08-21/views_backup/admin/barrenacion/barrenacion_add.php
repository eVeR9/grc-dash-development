<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>
.main-footer{
    display: none;
}

.submit{
        /*margin-right: 5px;
        /*background: var(--form-black);*/
    }

    .cancelar {
        width:105px; 
        position: relative;
        left: 5px;
        /*margin-left:51em;*/
    }

    .margen-submit {
        margin-top: 30px;
    }

    .align-div {
        margin-top: 7px;
    }

    .align-razones {
        display: none;
        margin-top: 15px;
    }

    .align-paro {
        display: none;
        margin-top: 15px;
    }

    .horas_mod {
        border:none;
    }

    .comments-box {
        resize: none;
        height: 110px !important;
    }
</style>

<section class="content">
<div class="row">
    <div clas="col-md-12">
        <div class="box">
            <div class="box-header with-border"> <!-- Note: blue-aqua header -->
                <h3 class="box-title">Bitacora de Extraccion</h3>
            </div> <!-- box-header with-border -->
            <?php if(isset($msg) || validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                            <?= validation_errors();?>
                            <?= isset($msg)? $msg: ''; ?>
                    </div>
                <?php endif; ?>

            <!-- form starts -->
            <div class="box-body">
            <?php echo form_open(base_url('admin/barrenacion/add/'), 'class="form-horizontal"'); ?>
            <div class="form-group">
                <div class="box-header with-border">
                    <h3 class="box-title">Captura los datos</h3>
                </div> <!-- box-header with-border -->
            </div> <!-- close first form-group -->

            <!-- fecha -->
            <div class="form-group">
            <label for="nombre_del_material" class="col-md-2 control-label">Fecha:</label>
                <div class="col-md-10">
                  <input type="text" name="fecha" id="fecha" value="" class="daterange form-control" style="width:180px;" placeholder="" autocomplete="off" required>
                </div>
            </div> <!-- close date form-group -->

             <div class="form-group">
             <label for="operador" class="col-md-2 control-label">Operador:</label>
                <div class="col-md-10">
                 <select name="empleado_id" id="empleado_id" class="form-control" style="width:180px;">
                 <option value="">Operador</option>
                 <?php foreach($empleados_barrenacion as $row): ?>
                     <option value="<?= $row['id']; ?>"><?= $row['nombre']; ?>&nbsp;<?= $row['apellidos']; ?></option>
                 <?php endforeach; ?>
                 </select>
                </div>
             </div> <!-- close operador form-group -->
            
            <div class="form-group">
                <label for="maquina" class="col-md-2 control-label">Maquina:</label>
                  <div class="col-md-10">
                     <select name="maquina_id" id="maquina_id" class="form-control" style="width:180px;">
                        <option value="">Maquina</option>
                        <?php foreach($get_maquinas as $row): ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nombre'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
            </div> <!-- close maquina form-group -->

            <div class="form-group">
                <label for="ayduante" class="col-md-2 control-label">Ayudante:</label>
                  <div class="col-md-10">
                    <select name="ayudante_id" id="ayudante_id" class="form-control" style="width:180px;">
                      <option value="">Ayudante</option>
                    <?php foreach($get_ayudantes as $row): ?>
                        <option value="<?= $row['id']; ?>"><?= $row['nombre']; ?>&nbsp;<?= $row['apellidos']; ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
            </div> <!-- close ayudante form-group -->

            <div class="form-group">
                <label for="" class="col-md-2 control-label">Voladura:</label>
                  <div class="col-md-10">
                    <input type="number" min="0" class="form-control" name="id_voladura" id="id_voladura" style="width:180px;">
                  </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-2 control-label">Zona:</label>
                  <div class="col-md-10">
                    <select name="id_zona" class="form-control" style="width:180px;">
                        <option value="" selected>--Elegir Zona--</option>
                            <?php
                                foreach ($zona as $row) {
                                    echo '<option value="' . $row->id . '">' . $row->nombre . '</option>';
                                }
                            ?>
                    </select>
                  </div>
            </div>
            
            <div class="form-group">
                <label for="" class="col-md-2 control-label">Linea:</label>
                <div class="col-md-10">
                    <input type="number" min="0" class="form-control" name="linea" id="linea" style="width:180px;">
                </div>
            </div>

            <div class="form-group">
                <label for="Plantilla" class="col-md-2 control-label">Plantilla:</label>
                <div class="col-md-10">
                  <input type="text" class="form-control calc" min="0" step="any" placeholder="Capture medida" id="plantilla" name="plantilla" style="width:180px;" required>
                </div>
            </div> <!-- close plantilla form-group -->

            <div class="form-group">
                <label for="" class="col-md-2 control-label">Metros Perforados:</label>
                <div class="col-md-10">
                  <input type="number" class="form-control calc" min="0" step="any" placeholder="Capture metros" name="metros_perf" id="metros_perf" style="width:180px;" required>
                </div>
            </div> <!-- close m perf form-group -->

            <div class="form-group">
                <label for="barrenos" class="col-md-2 control-label">No. Barreno:</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" min="0" step="any" placeholder="Numero de barrenos perforados" name="bar_perf" id="bar_perf" style="width:180px;" required>
                </div>
            </div> <!-- close num barrenos form-group -->
            <!--
            <div class="form-group">
                <label for="barrenos_volar" class="col-md-2 control-label">Barrenos por Volar:</label>
                <div class="col-md-10">
                    <input type="hidden" class="form-control" min="0" step="any" placeholder="Barrenos por volar" name="bar_por_volar" id="bar_por_volar" style="width:180px;" required>
                </div>
            </div> close Barrenos por Volar -->
        
            <!-- campo calculado tons tumbe (edit) -->
            
            <div class="form-group">
                <label for="tons-tumbe" class="col-md-2 control-label">Toneladas Tumbe:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control calc" min="0" step="any" value="" name="tons_tumbe" id="tons_tumbe" style="width:180px;" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-md-2 control-label">Paro:</label>
                <div class="col-md-10 align-div prueba">
                    Si&nbsp;&nbsp;<input type="radio" name="paro" id="si" value="1">&nbsp;&nbsp;
                    No&nbsp;&nbsp;<input type="radio" name="paro" id="no" value="0" checked>
                  <div class="razones align-razones">
                  <select name="razon_id" id="" class="form-control" style="width:180px;">
                  <option value="NA" selected>Sin Paro</option>
                  <?php foreach($razones as $razon): ?>
                        <option value="<?= $razon["id"]; ?>"><?= $razon['nombre'];?></option>
                  <?php endforeach; ?>
                  </select>
                  <!-- 
                    <input type="text" name="razon" value="" class="form-control" style="width:200px;" placeholder="Razon del Paro">
                  -->
                    <?php //foreach($razones as $razon):?>
                    <!--
                        <table>
                            <td><input type="radio" name="razon" value="<?//= $razon['nombre']?>">&nbsp;</td>
                            <td class="light"><?//= $razon['nombre']?></td>
                        </table>
                    -->
                    <?php //endforeach; ?>
                    <!--
                    <input type="checkbox">&nbsp;<span>Razon 1</span><br><br>
                    <input type="checkbox">&nbsp;<span>Razon 2</span><br><br>
                    <input type="checkbox">&nbsp;<span>Razon 3</span><br><br>
                    <input type="checkbox">&nbsp;<span>Razon 4</span>
                    -->
                  </div> <!.-- close razones -->
                    <div class="paro-div align-paro">
                        <label for="" class="col-md-2 control-label">Horas Paro:</label>
                        <input type="number" step="0.5" name="horas_paro" class="form-control col-md-2 horas_mod" min="0" max="24" style="width:65px;">
                    </div>

                </div> <!.-- close radio inputs -->
            </div> <!-- close paro -->
            
            <div class="form-group">
            <label for="" class="col-md-2 control-label">Observaciones:</label>
                <div class="col-md-5">
                    <textarea name="observaciones" class="form-control comments-box" id=""></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 margen-submit">
                  <input type="submit" name="submit" id="submit" value="Guardar" class="btn btn-info pull-left submit">
                  <input type="button" name="back" id="back" value="Cancelar" class="btn btn-danger cancelar" onClick="history.go(-1)">  
                </div>
            </div> <!-- close last form-group -->
            <?php echo form_close(); ?>

            <!-- background_blank++ <div style="height:500px;"></div> -->
            <!-- 
              tons tumbe = (mts plantilla*2.7)
            -->

            </div> <!-- form-group -->
            </div> <!-- box-body -->
        </div> <!-- box -->
    </div> <!-- col-md-12 -->
</div> <!-- row -->
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

jQuery('body').on('input', 'input.calc', function(){
    var plantilla;
    var metros_perf;
    var dens_piedra = 2.7;
    var resultado;

        plantilla = parseFloat($('#plantilla').val());
        metros_perf = parseFloat($('#metros_perf').val());
        resultado = (plantilla*metros_perf)*dens_piedra;
    
    if(!isNaN(resultado)) {
        $('#tons_tumbe').val(resultado.toFixed(2));
    }
}); 

$('#si').on('click', function(){
    $('.razones').show('slow');
    $('.paro-div').show('slow');
});

$('#no').on('click', function(){
    $('.razones').hide();
    $('.paro-div').hide();
});

$('#submit').click(function(){
    console.log('delay click waiting...');

    setTimeout( function() {
        $('#submit').attr('disabled', true);
        console.log('Hellow disabled :)')
    },
    100);

});


//devuelve el name al



</script>