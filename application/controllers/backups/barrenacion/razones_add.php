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
                    <h3 class="box-title">Razones (Paros)</h3>
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
                <?php echo form_open(base_url('admin/barrenacion/razones_add'), "class='form-horizontal'"); ?>
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Registra una Razon</h3>
                        </div>
                    </div> <!-- form-group -->

                    <!-- 
                    <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Fecha</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fecha" id="fecha">
                        </div>
                    </div>
                    -->
                    
                    <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Razon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-8">
                                <textarea name="descripcion" class="form-control" style="resize:none; width:630px; height:70px;"></textarea>
                            </div>
                    </div>

                    <div class="form-group">
                        <div class=" col-md-10">
                            <input type="submit" name="submit" value="Guardar" class="btn btn-info pull-right">
                        </div>
                    </div>

                <?php echo form_close();?>

                </div> <!-- box-body -->
            </div> <!-- box -->
        </div> <!-- col-md-12 -->
    </div> <!-- row -->
</section>