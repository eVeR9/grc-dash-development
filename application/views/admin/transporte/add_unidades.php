<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Agrega Unidad</h1>
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

                    <?php echo form_open(base_url('admin/transporte/add_unidades'), 'class="form-horizontal"') ?>

                    <!--
                        <div class="form-group">
                            <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        -->

                    <div class="form-group">
                        <!-- 
                        <label for="fecha" class="col-sm-2 control-label">Transportista</label>
                        <div class="col-sm-9">
                            <select name="id_transportista" id="id_transportista" class="form-control">
                                <option value="">Seleccione Transportista</option>
                            </select>
                        </div>
                    </div>  
                    -->
                    <div class="form-group">

                        <label for="fecha" class="col-sm-2 control-label">No Economico</label>
                        <div class="col-sm-4">
                            <input type="number" name="numero_unidad" id="numero_unidad" class="form-control" placeholder="codigo o numero de unidad">
                        </div>

                        <label for="fecha" class="col-sm-1 control-label">Placas</label>
                        <div class="col-sm-4">
                            <input type="text" name="placas" id="placas" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fecha" class="col-sm-2 control-label">Marca</label>
                        <div class="col-sm-4">
                            <input type="text" name="marca" id="marca" class="form-control">
                        </div>

                        <label for="fecha" class="col-sm-1 control-label">Modelo</label>
                        <div class="col-sm-4">
                            <input type="text" name="modelo" id="numero_unidad" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fecha" class="col-sm-2 control-label">Año</label>
                        <div class="col-sm-3">
                            <input type="text" name="año" id="año" class="form-control">
                        </div>

                        <label for="fecha" class="col-sm-1 control-label">Color</label>
                        <div class="col-sm-3">
                            <input type="text" name="color" id="color" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-11">
                            <input type="submit" name="action" id="action" value="Guardar" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close() ?>

                </div>
            </div>
        </div>
    </div>
</section>