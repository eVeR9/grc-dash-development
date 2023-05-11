<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Agrega Operador</h1>
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

                    <?php echo form_open(base_url('admin/transporte/add_operadores'), 'class="form-horizontal"') ?>

                    <div class="form-group">

                        <!-- 
                        <label for="fecha" class="col-sm-2 control-label">Transportista</label>
                        <div class="col-sm-2">
                            <select name="id_transportista" id="id_transportista" class="form-control">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        -->
                        
                        <label for="nombre" class="control-label col-sm-2">Nombre</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>

                        <label for="apellidos" class="control-label col-sm-1">Apellidos</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="apellidos" id="apellidos">
                        </div>


                    </div>

                    <div class="form-group">

                        <label for="apellidos" class="control-label col-sm-2">Codigo Operador</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" name="codigo_operador" id="codigo_operador">
                        </div>

                        <!--
                        <label for="apellidos" class="control-label col-sm-1">Estatus</label>
                        <div class="col-sm-3">
                            <select name="id_estatus" id="id_estatus" class="form-control">
                                <option value="0">Sin Estatus</option>
                            </select>
                        </div>
                         -->

                        <label for="nombre" class="control-label col-sm-1">Sexo</label>
                        <div class="col-sm-4">
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="N/A">Seleccione</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nombre" class="control-label col-sm-2">Domicilio</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="domicilio" id="domicilio">
                        </div>

                        <label for="apellidos" class="control-label col-sm-1">Tel</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tel" id="tel">
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