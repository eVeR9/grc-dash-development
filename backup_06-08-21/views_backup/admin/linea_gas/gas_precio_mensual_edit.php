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
                    <h3 class="box-title">Editar Gas Consumo</h3>
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

                    <?php echo form_open(base_url('admin/linea_gas/gas_precio_mensual_edit/' . $gas_precio_mensual_edit['id']), 'class="form-horizontal"');  ?>

                    <div class="form-group">
                        <label for="mes" class="col-sm-1 control-label">Mes</label>
                        <div class="col-sm-5">


                            <select name="mes" class="form-control" readonly>
                                <?php if ($gas_precio_mensual_edit['mes'] == '1') : ?>

                                    <option value="1" selected>Enero</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '2') : ?>


                                    <option value="2" selected>Febrero</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '3') : ?>


                                    <option value="3" selected>Marzo</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '4') : ?>


                                    <option value="4" selected>Abril</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '5') : ?>


                                    <option value="5" selected>Mayo</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '6') : ?>


                                    <option value="6" selected>Junio</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '7') : ?>


                                    <option value="7" selected>Julio</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '8') : ?>


                                    <option value="8" selected>Agosto</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '9') : ?>


                                    <option value="9" selected>Septiembre</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '10') : ?>

                                    <option value="10" selected>Octubre</option>

                                <?php elseif ($gas_precio_mensual_edit['mes'] == '11') : ?>

                                    <option value="11" selected>Noviembre</option>

                                <?php else : ?>

                                    <option value="12" selected>Diciembre</option>
                                <?php endif; ?>




                            </select>
                        </div>

                    </div>



                    <div class="form-group">


                        <label for="año" class="col-sm-1 control-label">Año</label>

                        <div class="col-sm-5">
                            <input type="number" value="<?= $gas_precio_mensual_edit['año']; ?>" step="any" name="año" class="form-control" id="año" readonly required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="precio" class="col-sm-1 control-label">Precio</label>

                        <div class="col-sm-4">
                            <input type="number" value="<?= $gas_precio_mensual_edit['precio']; ?>" step="any" name="precio" class="form-control" id="precio" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="check_analisis" hidden class="col-sm-2 control-label">mes</label>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <input type="hidden" step="any" name="check_analisis" class="form-control" id="check_analisis" value="<?= $gas_precio_mensual_edit['mes']; ?>">
                            </div>
                        </div>


                    </div>

                    <div class="form-group">

                        <label for="check_analisis" hidden class="col-sm-2 control-label">año</label>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <input type="hidden" step="any" name="check_analisis" class="form-control" id="check_analisis" value="<?= $gas_precio_mensual_edit['año']; ?>">
                            </div>
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