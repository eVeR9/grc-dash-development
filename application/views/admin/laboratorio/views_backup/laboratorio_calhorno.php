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
                    <h3 class="box-title">Calidad Cal Horno</h3>
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

                    <?php echo form_open(base_url('admin/laboratorio/add_calhorno'), 'class="form-horizontal"');  ?>
                    <div class="form-group">



                        <label for="fecha" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-3">
                            <input type="text" name="fecha" class="form-control daterange" autocomplete="off">
                        </div>
                        <div class="col-md-1" style="font-size: 18px;">
                            <i class="fa fa-calendar"></i>
                        </div>

                        <label for="hora_laboratorio" class="col-sm-3 control-label">Hora</label>
                        <div class="col-sm-4">
                            <select name="hora_laboratorio" class="form-control">
                                <option value="" selected>--Elegir Hora--</option>
                                <?php
                                foreach ($laboratorio_hora as $row) {
                                    echo '<option value="' . $row->id . '">' . $row->hora
                                        . '</option>';
                                }
                                ?>


                            </select>
                        </div>






                    </div>
                    <div class="form-group">

                        <label for="horno" class="col-sm-1 control-label">Horno</label>

                        <div class="col-sm-4">
                            <select name="horno" class="form-control">
                                <option value="" selected>--Elegir Horno--</option>
                                <option value="Horno 1">Horno 1</option>
                                <option value="Horno 2">Horno 2</option>
                                <option value="Horno 3">Horno 3</option>
                            </select>
                        </div>

                        <label for="estatus" class="col-sm-3 control-label">Estatus</label>

                        <div class="col-sm-4">
                            <select name="estatus" class="form-control">
                                <option value="">--Estatus--</option>
                                <?php
                                foreach ($laboratorio_estatus as $row) {
                                    echo '<option value="' . $row->id . '">' . $row->estatus
                                        . '</option>';
                                }
                                ?>
                            </select>
                        </div>









                    </div>

                    <div class="form-group">



                        <label for="mgo" class="col-sm-1 control-label">MgO</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="mgo" class="form-control" id="mgo" required>
                        </div>




                        <label for="cao" class="col-sm-1 control-label">CaO</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="cao" class="form-control" id="cao" required>
                        </div>



                        <label for="pxc" class="col-sm-1 control-label">PxC</label>

                        <div class="col-sm-3">
                            <input type="number" step="any" name="pxc" class="form-control" id="pxc" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">



                        <label for="comentario" class="col-sm-2 control-label">Comentarios</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" style="overflow:auto;resize:none" name="comentario" id="comentario" cols="" rows=""></textarea>
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