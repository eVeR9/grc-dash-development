<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Agregar Departamento</h3>
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
           
            <?php echo form_open(base_url('admin/empleados/import_excel'), 'class="form-horizontal" enctype="multipart/form-data"');  ?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Importar datos de BioTime</h3>
                </div>
                <label for="nombre_del_departamento" class="col-sm-3 control-label">Archivo</label>

                <div class="col-sm-9">
                <input id="file" name="file" type="file" placeholder="Subir Archivo" accept="csv" />
                </div>
              </div>


              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Subir Archivo" class="btn btn-info pull-right">
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
$("#add_material").addClass('active');
</script>    