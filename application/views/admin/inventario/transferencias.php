<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <?php if (isset($msg) || validation_errors() !== '') : ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                        <?= validation_errors(); ?>
                        <?= isset($msg) ? $msg : ''; ?>
                    </div>
                <?php endif; ?>
                <div class="box-header with-boder">
                    <h3 class="box-title">Transferencias de Almacen</h3>
                </div>

                <div class="row">
                    <?php echo form_open(base_url('admin/inventario/transferencias'), 'class="form-horizontal"') ?>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">

                        <div class="box-header with-border">
                            <h3 class="box-title">Almacen Origen</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="form-group">
                            <label for="almacen_id" class="col-sm-2 control-label">Almacen</label>
                            <div class="col-sm-10">
                                <select name="almacen_id" class="form-control" id="almacen_id">
                                    <option value="">Seleccione el almacen de origen</option>
                                    <?php foreach ($almacenes as $almacen) : ?>
                                        <option value="<?= $almacen['id'] ?>"><?= $almacen['nombre'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="producto_id" class="col-sm-2 control-label">Producto</label>

                            <div class="col-sm-10">
                                <select name="producto_id" class="form-control" id="producto_id">
                                    <option value="">Seleccione el producto </option>
                                    <?php foreach ($productos as $producto) : ?>
                                        <option value="<?= $producto['id'] ?>"><?= $producto['nombre_prod'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="unidades" class="col-sm-2 control-label">Unidades</label>

                            <div class="col-sm-10">
                                <input type="number" name="unidades" min="0" class="form-control" id="unidades" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Datos del Producto</h3>
                                    </div>
                                    <div class="box-body">
                                        <p>Feature #1</p>
                                        <p>Feature #2</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" name="submit" value="Transferir" class="btn btn-info">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <div class="box-header with-border">
                            <h3 class="box-title">Almacen Destino </h3>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Almacen</label>

                            <div class="col-sm-10">
                                <select name="almacen_id2" class="form-control" id="almacen_id2">
                                    <option value="">Seleccione el almacen destino</option>
                                    <?php foreach ($almacenes as $almacen) : ?>
                                        <option value="<?= $almacen['id'] ?>"><?= $almacen['nombre'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Producto</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="" readonly>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Datos del Producto</h3>
                                    </div>
                                    <div class="box-body">
                                        <p>Feature #1</p>
                                        <p>Feature #2</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
</section>