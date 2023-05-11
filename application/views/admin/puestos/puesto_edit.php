<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Puesto</h3>
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
           
            <?php echo form_open(base_url('admin/puestos/edit'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
                <label for="nombre_puestos" class="col-sm-3 control-label">Nombre del Puesto</label>
                <div class="col-sm-9">
                  <select name="puestos" class="form-control">
                    <option value="">Eliga un puesto</option>
                      <?php foreach($dit_puesto as $row): ?>
                          <option value="<?= $row['id']; ?><?= $row['puestos']; ?>"></option>
                      <?php endforeach; ?>
                  </select>
                </div>
                </div>
                <div class="form-group">
                <label for="id_departamento" class="col-sm-3 control-label">Departamento</label>

                <div class="col-sm-9">
                  <select name="id_departamento" class="form-control">
                    <option value="">Departamento</option>
                  <?php foreach($all_departamentos as $row): ?>
                    <label for="id-departamento"> <?= $row['id']; ?><?= $row['nombre_del_departamento']; ?></label>
                    
                    <?php endforeach; ?>
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