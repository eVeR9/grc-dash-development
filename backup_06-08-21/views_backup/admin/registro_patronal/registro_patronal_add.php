<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Agregar Registro Patronal</h3>
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
           
            <?php echo form_open(base_url('admin/registro_patronal/add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
                <label for="razon_social" class="col-sm-2 control-label">Razon Social</label>

                <div class="col-sm-10">
                  <input type="text" name="razon_social" value="" class="form-control" id="razon_social" placeholder="Razon Social" required>
                </div>
              </div>

              <div class="form-group">
                <label for="rfc" class="col-sm-2 control-label">RFC</label>

                <div class="col-sm-4">
                  <input type="text" name="rfc" value="" class="form-control" id="rfc" placeholder="RFC" required>
                </div>
              </div>
              <!-- fin datos generales -->
              <!-- Direccion -->
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Dirección</h3>
                </div>
                <label for="calle" class="col-sm-2 control-label">Calle</label>

                <div class="col-sm-10">
                  <input type="text" name="calle" value="" class="form-control" id="calle" placeholder="Calle" required>
                </div>
              </div>

              <div class="form-group">
                <label for="numero_int" class="col-sm-2 control-label">Número Int.</label>

                <div class="col-sm-4">
                  <input type="text" name="numero_int" value="" class="form-control" id="numero_int" placeholder="" required>
                </div>
                <label for="numero_ext" class="col-sm-2 control-label">Número Ext.</label>

                <div class="col-sm-4">
                  <input type="text" name="numero_ext" value="" class="form-control" id="numero_ext" placeholder="" required>
                </div>
              </div> 
              
              <div class="form-group">
                <label for="colonia" class="col-sm-2 control-label">Colonia</label>

                <div class="col-sm-4">
                  <input type="text" name="colonia" value="" class="form-control" id="colonia" placeholder="" required>
                </div>
                <label for="codigo_postal" class="col-sm-2 control-label">Código Postal</label>

                <div class="col-sm-4">
                  <input type="text" name="codigo_postal" value="" class="form-control" id="codigo_postal" placeholder="" required>
                </div>
              </div>  
              
              <div class="form-group">
                <label for="municipio" class="col-sm-2 control-label">Municipio</label>

                <div class="col-sm-4">
                  <input type="text" name="municipio" value="" class="form-control" id="municipio" placeholder="" required>
                </div>
                <label for="codigo_postal" class="col-sm-2 control-label">Ciudad</label>

                <div class="col-sm-4">
                  <input type="text" name="ciudad" value="" class="form-control" id="ciudad" placeholder="" required>
                </div>
              </div>  

              <div class="form-group">
                <label for="estado" class="col-sm-2 control-label">Estado</label>

                <div class="col-sm-4">
                  <input type="text" name="estado" value="" class="form-control" id="estado" placeholder="" required>
                </div>
                <label for="pais" class="col-sm-2 control-label">País</label>

                <div class="col-sm-4">
                  <input type="text" name="pais" value="" class="form-control" id="pais" placeholder="" required>
                </div>
              </div>  
              <!-- Fin Direccion -->

              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Agregar Registro Patronal" class="btn btn-info pull-right">
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
$("#add_registro_patronal").addClass('active');
</script>    