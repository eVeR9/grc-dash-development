<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Material</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body ">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('admin/materiales/edit/'.$material['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
                <label for="nombre_del_material" class="col-sm-2 control-label">Nombre del Material</label>

                <div class="col-sm-10">
                  <input type="text" name="nombre_del_material" value="<?= $material['nombre_del_material']; ?>" class="form-control" id="nombre_del_material" >
                </div>
              </div>

              <div class="form-group">
                <label for="codigo_cliente" class="col-sm-6 control-label">Activo / Inactivo</label>

                <div class="col-sm-6">
                  <select name="user_role" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="1" <?= ($material['activo'] == 1)?'selected': '' ?> >Activo</option>
                    <option value="0" <?= ($material['activo'] == 0)?'selected': '' ?>>Inactivo</option>
                  </select>
                </div>
              </div>
              <!-- fin datos generales -->

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Actualizar" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 