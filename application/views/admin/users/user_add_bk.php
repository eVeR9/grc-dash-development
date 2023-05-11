<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Agregar Usuario</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/users/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>

                <div class="col-sm-9">
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>

                <div class="col-sm-9">
                  <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="mobile_no" class="col-sm-2 control-label">Celular</label>

                <div class="col-sm-9">
                  <input type="number" name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="password" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Administrador</label>

                <div class="col-sm-4">
                  <select name="es_admin" class="form-control">
                    <option value="">Es Admin?</option>
                    <option value="1">Si</option>
                    <option value="0" selected>No</option>
                  </select>
                </div>
                
                <label for="role" class="col-sm-2 control-label">Tipo Usuario</label>

                <div class="col-sm-4">
                  <select name="tipo_usuario" class="form-control" >
                    <option value="">Tipo</option>
                    <option value="1" selected>Empleado</option>
                    <!--<option value="2">Cliente</option>
                    <option value="3">Proveedor</option>-->
                  </select>
                </div>
                </div>
                <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Activo?</label>

                <div class="col-sm-4">
                  <select name="activo" class="form-control">
                    <option value="">Activo?</option>
                    <option value="1" selected>Si</option>
                    <option value="0">No</option>
                  </select>
                </div>
                
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Agregar Usuario" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 


<script>
$("#add_user").addClass('active');
</script>    