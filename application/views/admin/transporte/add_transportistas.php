<style>
    footer{ display:none;}
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Transportista</h3>
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

                    <?php echo form_open(base_url('admin/transporte/add_transportistas'), 'class="form-horizontal"');  ?>
                    <div class="form-group">
                        <!-- datos generales -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos Generales</h3>
                        </div>

                        <label for="razon_social" class="col-sm-2 control-label">Razon Social</label>

                        <div class="col-sm-10">
                            <input type="text" name="razon_social" value="" class="form-control" id="razon_social" placeholder="Razon Social">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="codigo_cliente" class="col-sm-2 control-label">Codigo Transportista</label>

                        <div class="col-sm-4">
                            <input type="text" name="codigo_transportista" value="" class="form-control" id="codigo_transportista" placeholder="Codigo de Transportista">
                        </div>
                        <label for="rfc" class="col-sm-2 control-label">RFC</label>

                        <div class="col-sm-4">
                            <input type="text" name="rfc" value="" class="form-control" id="rfc" placeholder="RFC">
                        </div>
                    </div>
                    <!-- fin datos generales -->


                    <!-- Direccion -->
                    <div class="form-group">
                        <!-- datos generales -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Dirección</h3>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="calle" class="col-sm-2 control-label">Calle</label>

                    <div class="col-sm-4">
                            <input type="text" name="calle" value="" class="form-control" id="calle" placeholder="">
                        </div>
                        <label for="numero_ext" class="col-sm-2 control-label">Número Ext.</label>

                        <div class="col-sm-4">
                            <input type="number" min="0" name="num_exterior" value="" class="form-control" id="num_exterior" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="colonia" class="col-sm-2 control-label">Colonia</label>

                        <div class="col-sm-4">
                            <input type="text" name="colonia" value="" class="form-control" id="colonia" placeholder="">
                        </div>
                        <label for="codigo_postal" class="col-sm-2 control-label">Código Postal</label>

                        <div class="col-sm-4">
                            <input type="number" min="0" name="codigo_postal" value="" class="form-control" id="codigo_postal" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="municipio" class="col-sm-2 control-label">Municipio</label>

                        <div class="col-sm-4">
                            <input type="text" name="municipio" value="" class="form-control" id="municipio" placeholder="">
                        </div>
                        <label for="codigo_postal" class="col-sm-2 control-label">Ciudad</label>

                        <div class="col-sm-4">
                            <input type="text" name="ciudad" value="" class="form-control" id="ciudad" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estado" class="col-sm-2 control-label">Estado</label>

                        <div class="col-sm-4">
                            <input type="text" name="estado" value="" class="form-control" id="estado" placeholder="">
                        </div>
                        <label for="pais" class="col-sm-2 control-label">País</label>

                        <div class="col-sm-4">
                            <input type="text" name="pais" value="" class="form-control" id="pais" placeholder="">
                        </div>
                    </div>




                    <!-- Fin Direccion -->
                    <!-- Datos de Contacto -->
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos de Contacto</h3>
                        </div>
                        <label for="nombre_contacto" class="col-sm-2 control-label">Contacto</label>

                        <div class="col-sm-10">
                            <input type="text" name="nombre_contacto" value="" class="form-control" id="nombre_contacto" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono_contacto" class="col-sm-2 control-label">Teléfono</label>

                        <div class="col-sm-4">
                            <input type="number" min="0" name="tel_contacto" value="" class="form-control" id="tel_contacto" placeholder="">
                        </div>
                        <label for="email_contacto" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-4">
                            <input type="text" name="email_contacto" value="" class="form-control" id="email_contacto" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" name="action" id="action" value="Guardar" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>

