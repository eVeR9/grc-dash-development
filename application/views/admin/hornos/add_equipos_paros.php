<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Equipos de Paro</h3>
                </div>
                <div class="box-body">
                    <?php echo form_open(base_url('admin/hornos/add_equipos_paros'), 'class="form-horizontal"') ?>

                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h3><i class="icon fa fa-warning"></i> Alerta!</h3>
                            <h4>Faltan campos por llenar:</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <label for="equipo" class="col-sm-1 control-label">Equipos de Paro</label>
                            <div class="col-sm-7">
                                <input type="text" name="equipo" id="equipo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-info pull-right" name="guardar" id="guardar" value="Guardar">
                            </div>
                        </div>

                    <br>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>