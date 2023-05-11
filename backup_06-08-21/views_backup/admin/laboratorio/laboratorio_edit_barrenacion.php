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
                    <h3 class="box-title">Analisis de Calidad Barrenos</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body ">
                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/laboratorio/edit_barrenos/' . $barrenacion['id']), 'class="form-horizontal"');  ?>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de extraccion</h3>
                        </div>
                        <div class="form-group">



                            <label for="fecha_extraccion" class="col-md-2 control-label">Fecha/Extraccion</label>
                            <div class="col-md-3">
                                <input type="text" name="fecha_extraccion" class="form-control" id="fecha_extraccion" value="<?= $barrenacion['fecha']; ?>" readonly required>

                            </div>






                            <label for="maquina" class="col-sm-2 control-label">Maquina</label>

                            <div class="col-sm-4">
                                <select onmousedown="return false" onkeydown="return false" name="maquina" class="form-control">
                                    <?php foreach ($laboratorio_maquina as $row) : ?>
                                        <?php
                                        //$selected = ('id');
                                        $selected = "";
                                        if ($row['id'] == $barrenacion['maquina_id']) {
                                            $selected = "selected";
                                        }
                                        ?>
                                        <option value="<?= $row['id'] ?>" <?= $selected; ?>><?= $row['nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>




                        </div>





                        <div class="form-group">



                            <label for="barreno" class="col-sm-2 control-label">No.Barreno</label>

                            <div class="col-sm-3">
                                <input type="text" name="barreno" class="form-control" id="barreno" value="<?= $barrenacion['bar_perf']; ?>" readonly required>
                            </div>






                            <label for="metros" class="col-sm-2 control-label">Metros</label>

                            <div class="col-sm-4">
                                <input type="text" name="metros" class="form-control" id="metros" value="<?= $barrenacion['metros_perf']; ?>" readonly required>
                            </div>




                        </div>
                    </div>
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Analisis</h3>
                        </div>
                        <div class="form-group">



                            <label for="fecha_analisis" class="col-md-2 control-label">Fecha Analisis</label>
                            <div class="col-md-2">
                                <input type="text" name="fecha_analisis" class="form-control daterange" autocomplete="off">
                            </div>
                            <div class="col-md-1" style="font-size: 18px;">
                                <i class="fa fa-calendar"></i>
                            </div>



                            <label for="estatus" class="col-sm-2 control-label">Estatus</label>

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



                            <label for="mgo" class="col-sm-2 control-label">MgO</label>

                            <div class="col-sm-3">
                                <input type="number" step="any" name="mgo" class="form-control" id="mgo" required>
                            </div>




                            <label for="cao" class="col-sm-2 control-label">CaO</label>

                            <div class="col-sm-2">
                                <input type="number" step="any" name="cao" class="form-control" id="cao" required>
                            </div>

                            <label for="check_analisis" class="col-sm-2 control-label" hidden>Check</label>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <input type="hidden" step="any" name="check_analisis" class="form-control" id="check_analisis"  value="<?= $barrenacion['id']; ?>">
                                </div>
                            </div>





                        </div>

                        <div class="form-group">



                            <label for="comentario" class="col-sm-2 control-label">Comentarios</label>

                            <div class="col-sm-9">
                                <textarea class="form-control" style="overflow:auto;resize:none" name="comentario" id="comentario" cols="" rows=""></textarea>
                            </div>

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