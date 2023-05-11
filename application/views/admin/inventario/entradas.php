<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Entradas Almacen</h3>
                </div>
                <div class="box-body">
                <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>

                    <?php echo form_open('admin/inventario/entradas') ?>
                    <div class="row">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Producto</label>
                            <div class="col-md-5">
                                <select class="form-control" name="producto_id" id="">
                                    <option value="">Seleccione un producto</option>
                                    <?php foreach($productos as $producto): ?>
                                        <option value="<?= $producto['id']?>"><?= $producto['nombre_prod']?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Datos del Producto</h3>
                                </div>
                                <div class="box-body">
                                    <p>Feature #1</p>
                                    <p>Feature #2</p>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Almacen</label>
                            <div class="col-md-5">
                            <select class="form-control" name="almacen_id" id="">
                                <option value="">Seleccione un almacen</option>
                                    <?php foreach($almacenes as $almacen): ?>
                                        <option value="<?= $almacen['id']?>"><?= $almacen['nombre']?></option>
                                    <?php endforeach?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Unidades</label>
                            <div class="col-md-5">
                                <input type="number" name="unidades" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="form-group">
                            <div class="col-md-1">
                                <input type="submit" name="submit" class="btn btn-info" value="Guardar">
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>