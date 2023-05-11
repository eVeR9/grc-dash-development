<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Sucursal</h3>
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
           
            <?php echo form_open(base_url('admin/sucursales/edit/'.$all_clientes_sucursal_id['id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Datos Generales</h3>
                </div>
                <label for="id_cliente" class="col-sm-2 control-label">Cliente</label>

                <div class="col-sm-4">
                  <select name="id_cliente" id="id_cliente" class="form-control" required>
                    <option value="">Cliente</option>
                  <?php foreach($all_clientes as $row): ?>
                  <? 
				  	$selected="";
					if($all_clientes_sucursal_id['id_cliente']==$row['id'])
						{
							$selected="selected";
						}
					?>
                    <option value="<?= $row['id']; ?>" <?php echo $selected; ?>><?= $row['razon_social']; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                
                <label for="sucursal" class="col-sm-2 control-label">Sucursal</label>
                <div class="col-sm-4">
                  <input type="text" name="sucursal" value="<?php echo $all_clientes_sucursal_id['sucursal'] ?>" class="form-control" id="sucursal" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Editar Sucursal" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
  			</div>  
          <!-- /.box-body -->
      </div>
    </div>
  </div>  
</section>
