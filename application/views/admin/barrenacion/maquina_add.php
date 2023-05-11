<style>
.main-footer {
    display: none;
}
</style>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header  with-border">
                    <h3 class="box-title">Maquinas</h3>
                </div> <!-- box-header-->
                <div class="box-body">
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                            <?= validation_errors();?>
                            <?= isset($msg)? $msg: ''; ?>
                    </div>
                <?php endif; ?>
                <?php echo form_open(base_url('admin/barrenacion/maquina_add'), "class='form-horizontal'"); ?>
                    <div class="form-group">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registra una Maquina</h3>
                    </div>
                    <label for="" class="col-sm-2 control-label">Nombre de Maquina:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Codigo de Maquina:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="codigo_maquina">
                            </div>
                    </div>

                    <div class="form-group">
                        <div class=" col-md-11">
                            <input type="submit" name="submit" value="Guardar" class="btn btn-info pull-right">
                        </div>
                    </div>

                <?php echo form_close();?>

                </div> <!-- box-body -->
            </div> <!-- box -->
        </div> <!-- col-md-12 -->
    </div> <!-- row -->
</section>
