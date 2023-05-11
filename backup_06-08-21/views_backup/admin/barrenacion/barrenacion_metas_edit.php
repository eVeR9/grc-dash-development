<style>
    :root{
        --form-black: #000;
    }
    .submit{
        margin-right: 5px;
        /*background: var(--form-black);*/
    }

    .cancelar {
        width:105px; 
        /*margin-left:51em;*/
    }

    textarea {
        resize: none;
        border:none;
    }

    .main-footer {
        display:none;
    }
</style>


<section class="content">
<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Metas de Extraccion </h3>
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
           
            <?php echo form_open(base_url('admin/barrenacion/metas_edit/'.$metas_barrenacion_id['id']), 'class="form-horizontal"');  ?> 
              <div class="form-group">
              <!-- datos generales -->
                <div class="box-header with-border">
                  <h3 class="box-title">Capturar datos</h3>
                </div>
    
                <!-- fecha -->
                <label for="" class="col-md-1 control-label">Fecha</label>
                <div class="col-md-11">
                  <input type="date" name="fecha" value="<?php echo $metas_barrenacion_id['fecha'] ?>" class="form-control" style="width:180px;" readonly>
                </div>
              </div> <!-- close form-group -->

             <!-- concepto -->
             <div class="form-group">
              <label for="" class="col-md-1 control-label">Concepto</label>
                <div class="col-xs-11">
                <select name="concepto_id" id="" class="form-control" style="width:180px;">
                <?php foreach($all_conceptos as $row):?>
                  <?php 
                        $selected = "";
                    if($metas_barrenacion_id['concepto_id'] == $row['id']){
                        $selected = "selected";
                    }
                  ?>
                    <option value="<?= $row['id']?>" <?php echo $selected ?>><?php echo $row['descripcion'] ?></option>
                <?php endforeach; ?>
                    </select>
                </div>
             </div> <!-- close form-group --> 

            <!-- Operador -->
            <div class="form-group">
                <label for="" class="col-md-1 control-label">Operador</label>
                  <div class="col-xs-11">
                    <select name="empleado_id" id="" class="form-control" style="width:180px;">
                    <?php foreach($empleados_barrenacion as $row):?>
                    <?php 
                      $selected = "";
                      if($metas_barrenacion_id['empleado_id'] == $row['id']){
                          $selected = "selected";
                      }
                    ?>
                        <option value="<?= $row['id']?>" <?php echo $selected?>><?= $row['nombre']?>&nbsp<?= $row['apellidos']?></option>
                    <?php endforeach;?>
                    </select>
                  </div>
            </div> <!-- close form-group -->

            <!-- toneladas -->
            <div class="form-group">
                <label for="" class="col-md-1 control-label">Metros</label>
                  <div class="col-xs-11">
                    <input type="number" name="metros_por_barrenar" value="<?php echo $metas_barrenacion_id['metros_por_barrenar'] ?>" min="0" step="any" class="form-control" placeholder="metros" style="width:180px;">
                  </div>
            </div> <!-- close form-group -->

            <div class=form-group>
                <label for="" id="obs" class="col-sm-2">Observaciones:</label>
            </div>

            <div class="form-group" style="margin-top:-10px;">
                  <div class="col-md-6">
                    <textarea name="observaciones" id="" class="form-control"><?php echo $metas_barrenacion_id['observaciones'] ?></textarea>
                  </div>
            </div>

              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Editar Meta" class="btn btn-info pull-left submit">
                  <input type="button" name="back" value="Cancelar" class="btn btn-danger cancelar" onClick="history.go(-1)">  
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>