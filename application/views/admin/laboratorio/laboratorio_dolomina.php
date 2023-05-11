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
                    <h3 class="box-title">Calidad Dolomita Mina</h3>
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

                    <?php echo form_open(base_url('admin/laboratorio/add_mina'), 'class="form-horizontal"');  ?>

                    <div class="form-group">



                        <label for="fecha" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-3">
                            <input type="text" name="fecha" class="form-control daterange" autocomplete="off">
                        </div>
                        <div class="col-md-1" style="font-size: 18px;">
                            <i class="fa fa-calendar"></i>
                        </div>



                        <label for="material" class="col-sm-3 control-label">Material</label>

                        <div class="col-sm-4">
                            <select name="material" class="form-control">
                                <option value="">--Elegir Material--</option>
                                <?php
                                foreach ($nombre_del_material as $row) {
                                    echo '<option value="' . $row->id . '">' . $row->nombre_del_material
                                        . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">



                        <!--<label for="tamaño" class="col-sm-1 control-label">Tamaño</label>

                        <div class="col-sm-4">
                            <input type="number" step="any" name="tamaño" class="form-control" id="tamaño" >
                        </div> -->








                        <label for="estatus" class="col-sm-1 control-label">Estatus</label>

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

                        <div class="col-sm-4">
                            <input type="number" step="any" name="mgo" class="form-control" id="mgo">
                        </div>




                        <label for="cao" class="col-sm-3 control-label">CaO</label>

                        <div class="col-sm-4">
                            <input type="number" step="any" name="cao" class="form-control" id="cao">
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