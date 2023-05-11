<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Captura Inventario Sacos</h1>
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

                    <?php echo form_open(base_url('admin/hornos/add_sacos'), 'class="form-horizontal"') ?>

                    <div class="form-group">
                        <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-5">
                            <input type="text" name="fecha" id="fecha" class="form-control datepick" autocomplete="off">
                        </div>

                        <label for="material_id" class="col-sm-1 control-label">Material</label>
                        <div class="col-sm-5">
                            <select name="material_id" id="material_id" class="form-control">
                                <option value="">Seleccione Material</option>
                                <?php foreach ($materiales as $material) : ?>
                                    <option value="<?= $material['id'] ?>"><?= $material['nombre_del_material'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>


                    </div>

                    <div class="form-group">

                        <label for="cantidad_sacos" class="col-sm-1 control-label">Sacos</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="cantidad_sacos" id="cantidad_sacos" class="form-control">
                        </div>

                        

                        <label for="toneladas" class="col-sm-1 control-label">Toneladas</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="toneladas" id="toneladas" class="form-control">
                        </div>
                    </div>




                    <br>
                    <div class="form-group botonGuardar">
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