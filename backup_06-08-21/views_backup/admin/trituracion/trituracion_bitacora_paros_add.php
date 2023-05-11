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
          <h3 class="box-title">Razones de Paro</h3>
        </div> <!-- box-header -->
          <div class="box-body">
            <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                    <?= validation_errors();?>
                      <?= isset($msg)? $msg: ''; ?>
                </div>
            <?php endif; ?>
            <?php echo form_open(base_url("admin/trituracion/trituracion_paros_add"), "class='form-horizontal'"); ?>
            <div class="form-group">
              <div class="box-header with-border">
                <h3 class="box-title">Registra una Razon de Paro</h3>
              </div>
                <label for="" class="col-md-2 control-label">Razón:</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="nombre" id="nombre">
                  </div>
            </div>
            <div class="form-group">
                  <label for="" class="col-md-2 control-label">Descripción:</label>
                  <div class="col-md-10">
                  <textarea name="descripcion" id="descripcion" class="form-control comments-box" placeholder="Escribe la descripcion detallada"></textarea>
                  </div>
            </div> <!-- form-group -->

            <div class="form-group">
              <div class="col-md-11">
                <input type="submit" class="btn btn-info pull-right" name="submit" value="Guardar">
              </div>
            </div> <!-- form-group -->

            <?php echo form_close(); ?>
          </div> <!.-- box-body -->
      </div> <!.-- box -->
    </div> <!.-- gen col -->
  </div> <!.-- row -->
</section>