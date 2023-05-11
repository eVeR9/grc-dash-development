<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>

    .comments-box {
        resize: none;
    }

    .main-footer {
        display:none;
    }

    
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Trituracion</h3>
            </div>

            <!-- errores -->

            <div class="box-body">
                <?php echo form_open(base_url('admin/trituracion/prog_trituracion/'), 'class="form-horizontal"'); ?>

                <div class="form-group">
                    <div class="box-header with-border">
                        <h3 class="box-title">Captura los datos</h3>
                    </div> <!-- box-header with-border -->
                </div> <!-- close first form-group -->

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Fecha</label>
                    <div class="col-md-10">
                        <input type="text" name="fecha" id="fecha" class="daterange form-control" style="width:180px;" autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Toneladas</label>
                    <div class="col-md-10">
                        <input type="number" name="toneladas" id="toneladas" class="form-control" style="width:180px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Conceptos</label>
                    <div class="col-md-10">
                        <select name="concepto_id" id="concepto_id" class="form-control" style="width:180px;">
                            <option value="1">Concepto 1</option>
                            <option value="2">Concepto 2</option>
                            <option value="3">Concepto 3</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Horas</label>
                    <div class="col-md-10">
                        <input type="number" step="0.5" name="horas" id="horas" class="form-control" style="width:180px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label">Observaciones</label>
                    <div class="col-md-6">
                        <textarea name="observaciones" id="observaciones" class="form-control comments-box"></textarea>
                    </div>
                </div>

                <div class="form-group">
                <div class="col-md-2 col-md-offset-2"> 
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Guardar">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div> <!-- box-body -->
                
            </div> <!-- box -->
        </div> <!-- col-md-12 -->
    </div> <!-- row -->
</section>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
$(document).ready( function (){

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

        }, //End locale object

        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true

    });
    

});
</script>
