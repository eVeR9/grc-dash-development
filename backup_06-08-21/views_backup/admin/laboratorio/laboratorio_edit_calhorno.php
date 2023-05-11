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
                    <h3 class="box-title">Editar Calidad Cal Horno</h3>
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

                    <?php echo form_open(base_url('admin/laboratorio/edit_calhorno/' . $edit_calhorno['id']), 'class="form-horizontal"');  ?>
                    <div class="form-group">

                        <label for="fecha" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-3">
                            <input type="text" name="fecha" value="<?= $edit_calhorno['fecha']; ?>" class="form-control daterange" autocomplete="off">
                        </div>
                        <div class="col-md-1" style="font-size: 18px;">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <label for="hora_laboratorio" class="col-sm-3 control-label">Hora</label>
                        <div class="col-sm-4">
                            <select name="hora_laboratorio" class="form-control" value="<?= $edit_calhorno['hora']; ?>">
                                <?php foreach ($laboratorio_hora as $row) : ?>
                                    <?php
                                    //$selected = ('id');
                                    $selected = "";
                                    if ($row['id'] == $edit_calhorno['id_hora']) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?= $row['id'] ?>" <?= $selected; ?>><?= $row['hora'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>







                    </div>
                    <div class="form-group">

                        <label for="estatus" class="col-sm-1 control-label">Estatus</label>

                        <div class="col-sm-4">
                            <select name="estatus" class="form-control" value="<?= $edit_calhorno['estatus']; ?>">
                                <?php foreach ($laboratorio_estatus as $row) : ?>
                                    <?php
                                    //$selected = ('id');
                                    $selected = "";
                                    if ($row['id'] == $edit_calhorno['id_estatus']) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?= $row['id'] ?>" <?= $selected; ?>><?= $row['estatus'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>







                        <label for="horno" class="col-sm-3 control-label">Horno</label>

                        <div class="col-sm-4">
                            <select name="horno" class="form-control">
                                <?php if ($edit_calhorno['horno'] == 'Horno 1') : ?>
                                    <option value="Horno 1" selected>Horno 1</option>
                                    <option value="Horno 2">Horno 2</option>
                                    <option value="Horno 3">Horno 3</option>
                                <?php elseif ($edit_calhorno['horno'] == 'Horno 2') : ?>
                                    <option value="Horno 1">Horno 1</option>
                                    <option value="Horno 2" selected>Horno 2</option>
                                    <option value="Horno 3">Horno 3</option>
                                <?php else : ?>
                                    <option value="Horno 1">Horno 1</option>
                                    <option value="Horno 2">Horno 2</option>
                                    <option value="Horno 3" selected>Horno 3</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">



                        <label for="mgo" class="col-sm-1 control-label">MgO</label>

                        <div class="col-sm-3">
                            <input type="number" value="<?= $edit_calhorno['mgo']; ?>" step="any" name="mgo" class="form-control" id="mgo" required>
                        </div>




                        <label for="cao" class="col-sm-1 control-label">CaO</label>

                        <div class="col-sm-3">
                            <input type="number" value="<?= $edit_calhorno['cao']; ?>" step="any" name="cao" class="form-control" id="cao" required>
                        </div>



                        <label for="pxc" class="col-sm-1 control-label">PxC</label>

                        <div class="col-sm-3">
                            <input type="number" value="<?= $edit_calhorno['pxc']; ?>" step="any" name="pxc" class="form-control" id="pxc" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">



                        <label for="comentario" class="col-sm-2 control-label">Comentarios</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" style="overflow:auto;resize:none" name="comentario" id="comentario" cols="" rows="" value><?php echo $edit_calhorno['comentarios']; ?></textarea>
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