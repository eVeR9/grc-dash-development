<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Cambiar Password</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/auth/change_pwd'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Nuevo Password</label>

                <div class="col-sm-8">
                  <input type="text" name="password" class="form-control" id="password" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="confirm_pwd" class="col-sm-3 control-label">Confirmar Password</label>

                <div class="col-sm-8">
                  <input type="text" name="confirm_pwd" class="form-control" id="confirm_pwd" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Cambiar Password" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 