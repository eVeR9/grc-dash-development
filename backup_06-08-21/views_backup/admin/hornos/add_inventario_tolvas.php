<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Captura Bitacora Tolvas</h1>
                </div>

                <div class="box-body">

                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h3><i class="icon fa fa-warning"></i> Alerta!</h3>
                            <h4>Faltan campos por llenar:</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/hornos/add_inventario_tolvas'), 'class="form-horizontal"') ?>

                    <div class="form-group">
                        <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-5">
                            <input type="text" name="fecha" id="fecha" class="form-control datepick" autocomplete="off">
                        </div>

                        <label for="hora" class="col-sm-1 control-label">Hora</label>
                        <div class="col-sm-5">
                            <select name="hora" id="hora" class="form-control">
                                <option value="">Seleccione hora</option>
                                <?php foreach ($horas as $hora) : ?>
                                    <option value="<?= $hora['id'] ?>"><?= $hora['hora'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="material_id" class="col-sm-1 control-label">Material</label>
                        <div class="col-sm-5">
                            <select name="material_id" id="material_id" class="form-control">
                                <option value="">Seleccione Material</option>
                                <?php foreach ($materiales as $material) : ?>
                                    <option value="<?= $material['id'] ?>"><?= $material['nombre_del_material'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <!--
                        <label for="horno_id" class="col-sm-1 control-label">Horno</label>
                        <div class="col-sm-3">
                            <select name="horno_id" id="horno_id" class="form-control select-hornos">
                                <option value="3">Seleccione Horno</option>
                                <option value="1">Horno 1</option>
                                <option value="2">Horno 2</option>
                                
                            </select>
                        </div>
                        -->

                        <label for="" class="col-sm-1 control-label">Hornero</label>
                        <div class="col-sm-5">
                            <select name="hornero_en_turno" id="hornero_en_turno" class="form-control">
                                <option value="">Seleccione Operador</option>
                                <?php foreach ($empleados as $empleado) : ?>
                                    <option value="<?= $empleado['id'] ?>"><?= $empleado['nombreCompleto'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>



                    <div id="body-h1">

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Tolvas Horno 1</h1>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="tolva_uno" class="col-sm-1 control-label">Tolva 1</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_uno" id="tolva_uno" class="form-control">
                            </div>

                            <label for="tolva_dos" class="col-sm-1 control-label">Tolva 2</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_dos" id="tolva_dos" class="form-control">
                            </div>

                            <label for="tolva_tres" class="col-sm-1 control-label">Tolva 3</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_tres" id="tolva_tres" class="form-control">
                            </div>
                        </div>


                    </div>

                    <div id="body-h2">

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Tolvas Horno 2</h1>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="tolva_uno_a" class="col-sm-1 control-label">Tolva 1 a</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_uno_a" id="tolva_uno_a" class="form-control">
                            </div>

                            <label for="tolva_uno_b" class="col-sm-1 control-label">Tolva 1 b</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_uno_b" id="tolva_uno_b" class="form-control">
                            </div>

                            <label for="tolva_uno_c" class="col-sm-1 control-label">Tolva 1 c</label>
                            <div class="col-sm-2">
                                <input type="number" step="any" min="0" name="tolva_uno_c" id="tolva_uno_c" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tolva_dos_a" class="col-sm-1 control-label">Tolva 2 a</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_dos_a" id="tolva_dos_a" class="form-control">
                            </div>

                            <label for="tolva_dos_b" class="col-sm-1 control-label">Tolva 2 b</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_dos_b" id="tolva_dos_b" class="form-control">
                            </div>

                            <label for="tolva_dos_c" class="col-sm-1 control-label">Tolva 2 c</label>
                            <div class="col-sm-2">
                                <input type="number" step="any" min="0" name="tolva_dos_c" id="tolva_dos_c" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tolva_tres_a" class="col-sm-1 control-label">Tolva 3 a</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_tres_a" id="tolva_tres_a" class="form-control">
                            </div>

                            <label for="tolva_tres_b" class="col-sm-1 control-label">Tolva 3 b</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="tolva_tres_b" id="tolva_tres_b" class="form-control">
                            </div>

                            <label for="tolva_tres_c" class="col-sm-1 control-label">Tolva 3 c</label>
                            <div class="col-sm-2">
                                <input type="number" step="any" min="0" name="tolva_tres_c" id="tolva_tres_c" class="form-control">
                            </div>
                        </div>



                    </div>

                    <br>
                    <div class="form-group botonGuardar" >
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-info pull-right" name="submit" id="submit" value="Guardar">
                        </div>
                    </div>
                    <?php echo form_close() ?>


                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function() {

        console.log('hello world')

        $('.datepick').datepicker({

            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true

        })
        
        

    })
</script>

