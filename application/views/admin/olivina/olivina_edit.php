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
                    <h3 clas="box-title">Consumo Olivina</h3>
                </div>
                <div class="box-body my-form-body">
                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open(base_url('admin/olivina/edit/'. $edit_olivina['id']), 'class="form-horizontal"'); ?>

                    <div class="form-group">

                        <label for="fecha" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-5">
                            <input type="text" value="<?= $edit_olivina['fecha']; ?>" name="fecha" id="fecha" class="form-control daterange" autocomplete="off">
                        </div>
                        <div class="col-md-1" style="font-size: 18px;">
                            <i class="fa fa-calendar"></i>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="lectura_inicial" class="col-sm-1 control-label">Lectura Inicial</label>
                        <div class="col-sm-5">
                            <input type="number" value="<?= $edit_olivina['lectura_inicial']; ?>" step="any" name="lectura_inicial" class="form-control" id="lectura_inicial" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="lectura_final" class="col-sm-1 control-label">Lectura Final</label>
                        <div class="col-sm-5">
                            <input type="number" value="<?= $edit_olivina['lectura_final']; ?>" step="any" name="lectura_final" class="form-control" id="lectura_final" onKeyUp="fncRest()"  required>
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="consumo_gas" class="col-sm-1 control-label">Consumo Gas</label>

                        <div class="col-sm-5">
                            <input type="number" value="<?= $edit_olivina['consumo_gas']; ?>" step="any" name="consumo_gas" class="form-control" id="consumo_gas" required>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="gigajoules" class="col-sm-1 control-label">Gigajoules</label>

                        <div class="col-sm-5">
                            <input type="number" value="<?= $edit_olivina['gigajoules']; ?>" step="any" name="gigajoules" class="form-control" id="gigajoules"  required>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Guardar" class="btn btn-info pull-right">
                        </div>
                    </div>


                    <?php echo form_close(); ?>
                </div>


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

<script>
    function fncRest() {
        var numero1 = Number(document.getElementById("lectura_final").value);
        var numero2 = Number(document.getElementById("lectura_inicial").value);
        document.getElementById("consumo_gas").value = numero1 - numero2;
    }
</script>

<script>


</script>