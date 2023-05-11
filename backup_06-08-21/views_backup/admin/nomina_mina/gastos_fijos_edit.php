<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
<style>
    .main-footer {
        display: none;
    }
</style>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gastos Fijos - Editar</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body my-form-body">
                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/nomina_mina/gastos_fijos_edit/'.$gastosFijosById['id']), 'class="form-horizontal"');  ?>
                    
                    <div class="form-group">
                        <label for="mes" class="col-sm-1 control-label">Mes</label>
                        <div class="col-sm-4">
                        <select name="mes" class="form-control" readonly>
                            <?php foreach($meses as $mes):?>
                                
                                <?php 
                                      $selected = "";

                                        if($mes['id'] == $gastosFijosById['mes']){
                                             $selected = "selected";

                                }?>

                                <option value="<?= $mes['id']; ?>"<?= $selected; ?>><?= $mes['nombre']; ?></option>
                            <?php endforeach; ?>
                                <!-- 
                                
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                                -->
                            </select>
                        </div>

                        <label for="año" class="col-sm-1 control-label">Año</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="año" class="form-control" id="año" value="<?= $gastosFijosById['año']?>" readonly required>
                        </div>

                        <label for="dia_mes" class="col-sm-1 control-label">Dias mes</label>

                        <div class="col-sm-2">
                            <input type="number" step="any" name="dia_mes" class="form-control" id="valor1" oninput="calcular()" required>
                        </div>


                    </div>



                    <div class="form-group">


                        <label for="monto_arrendamiento" class="col-sm-2 control-label">Monto Arrendamiento</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="monto_arrendamiento" class="form-control" id="valor2" oninput="calcular()"  required>
                        </div>


                        <label for="monto_arrendamiento_diario" class="col-sm-2 control-label">Monto Arrendamiento Diario</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="monto_arrendamiento_diario" class="form-control" id="total" value="" readonly  required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="monto_cfe" class="col-sm-2 control-label">Monto CFE</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="monto_cfe" class="form-control" id="valor3" oninput="calcular()" required>
                        </div>

                        <label for="monto_cfe_diario" class="col-sm-2 control-label">Monto CFE Diario</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="monto_cfe_diario" class="form-control" id="total1" value="" readonly required>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Guardar" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
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

    $('#si').on('click', function() {
        $('.razones').show('slow');
    });

    $('#no').on('click', function() {
        $('.razones').hide();
    });
</script>

<script type="text/javascript">
    function calcular(){
        try{
            var a = parseFloat(document.getElementById("valor1").value)|| 0,
            b = parseFloat(document.getElementById("valor2").value)|| 0,
            c = parseFloat(document.getElementById("valor3").value)|| 0;
            document.getElementById("total").value = (b / a).toFixed(2);
            document.getElementById("total1").value = (c / a).toFixed(2);
            
        } catch (e) { }
    }
</script>
