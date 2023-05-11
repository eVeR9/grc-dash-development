<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Material</h3>
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

                    <?php echo form_open(base_url('admin/materiales/add_materiales_produccion'), 'class="form-horizontal"');  ?>
                    <div class="form-group">
                        <!-- datos generales -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Materiales de Produccion</h3>
                        </div>
                        <label for="nombre_del_material" class="col-sm-2 control-label">Nombre del Material</label>

                        <div class="col-sm-9">
                            <input type="text" name="material_prod" value="" class="form-control" id="material_prod" placeholder="Nombre del Material">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Estatus</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="estatus" id="estatus">
                                <option value="">Selecciona estatus</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Agregar Material" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>


<script>
    $("#add_material").addClass('active');
</script>