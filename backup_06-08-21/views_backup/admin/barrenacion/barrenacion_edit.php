<style>
  :root {
    --form-black: #000;
  }

  .submit {
    margin-right: 5px;
    /*background: var(--form-black);*/
  }

  .cancelar {
    width: 105px;
    /*margin-left:51em;*/
  }

  .resize-up {
    width: 180px;
  }

  .main-footer {
    display: none;
  }
</style>


<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit de Extraccion </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body ">
          <?php if (isset($msg) || validation_errors() !== '') : ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
              <?= validation_errors(); ?>
              <?= isset($msg) ? $msg : ''; ?>
            </div>
          <?php endif; ?>

          <?php echo form_open(base_url('admin/barrenacion/edit/' . $all_barrenacion_id['id']), 'class="form-horizontal"');  ?>
          <div class="form-group">
            <!-- datos generales -->
            <div class="box-header with-border">
              <h3 class="box-title">Capturar datos</h3>
            </div>

            <!-- fecha -->
            <label for="" class="col-md-2 control-label">Fecha</label>
            <div class="col-md-10">
              <input type="date" name="fecha" value="<?php echo $all_barrenacion_id['fecha'] ?>" class="form-control resize-up" readonly>
            </div>
          </div> <!-- close form-group -->

          <!-- concepto -->
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Operador</label>
            <div class="col-xs-10">
              <select name="empleado_id" id="" class="form-control resize-up">
                <?php foreach ($empleados_barrenacion as $row) : ?>
                  <?php $selected = "";
                  if ($all_barrenacion_id['empleado_id'] == $row['id']) {
                    $selected = "selected";
                  }
                  ?>
                  <option value="<?= $row['id'] ?>" <?php echo $selected; ?>><?= $row['nombre'] ?>&nbsp<?= $row['apellidos'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div> <!-- close form-group -->

          <!-- Operador -->
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Maquina</label>
            <div class="col-xs-10">
              <select name="maquina_id" id="" class="form-control resize-up">
                <?php foreach ($get_maquinas as $row) : ?>
                  <?php $selected = "";
                  if ($all_barrenacion_id['maquina_id'] == $row['id']) {
                    $selected = "selected";
                  }
                  ?>
                  <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div> <!-- close form-group -->

          <!-- toneladas -->
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Ayudante</label>
            <div class="col-xs-10">
              <select name="ayudante_id" id="" class="form-control" style="width:180px;">
                <?php foreach ($ayudantes_barrenacion as $row) : ?>
                  <?php $selected = "";
                  if ($all_barrenacion_id['ayudante_id'] == $row['id']) {
                    $selected = "selected";
                  }
                  ?>
                  <option value="<?= $row['id'] ?>" <?php echo $selected; ?>><?= $row['nombre'] ?>&nbsp<?= $row['apellidos'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div> <!-- close form-group -->

          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Zona</label>

            <div class="col-xs-10">
              <select name="id_zona" id="" class="form-control" style=width:180px;">
                <?php foreach ($zonas as $row) : ?>
                  <?php $selected = "";
                  if ($all_barrenacion_id['id_zona'] == $row['id']) {
                    $selected = "selected";
                  }
                  ?>
                  <option value="<?= $row['id'] ?>" <?= $selected ?>><?= $row['nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class=form-group>
            <label for="" id="" class="col-sm-2 control-label">Plantilla:</label>
            <div class="col-xs-10">
              <input type="number" min="0" step="any" name="plantilla" value="<?= $all_barrenacion_id['plantilla'] ?>" class="form-control resize-up calc" id="plantilla">
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-2 control-label">Metros Perforados:</label>
            <div class="col-md-10">
              <input type="number" value="<?= $all_barrenacion_id['metros_perf'] ?>" class="form-control calc" min="0" step="any" name="metros_perf" id="metros_perf" style="width:180px;">
            </div>
          </div> <!-- close m perf form-group -->

          <div class="form-group">
            <label for="barrenos" class="col-md-2 control-label">No. Barrenos:</label>
            <div class="col-md-10">
              <input type="number" value="<?= $all_barrenacion_id['bar_perf'] ?>" class="form-control" min="0" step="any" name="bar_perf" id="bar_perf" style="width:180px;">
            </div>
          </div> <!-- close num barrenos form-group -->

          <div class="form-group">
            <label for="barrenos_volar" class="col-md-2 control-label">Barrenos por Volar:</label>
            <div class="col-md-10">
              <input type="number" value="<?= $all_barrenacion_id['bar_por_volar'] ?>" class="form-control" min="0" step="any" name="bar_por_volar" id="bar_por_volar" style="width:180px;">
            </div>
          </div> <!-- close Barrenos por Volar -->

          <!-- campo calculado tons tumbe (edit) -->

          <div class="form-group">
            <label for="tons-tumbe" class="col-md-2 control-label">Toneladas Tumbe:</label>
            <div class="col-md-10">
              <input type="number" value="<?= $all_barrenacion_id['tons_tumbe'] ?>" class="form-control calc" min="0" step="any" name="tons_tumbe" id="tons_tumbe" style="width:180px;" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <input type="submit" name="submit" value="Editar" class="btn btn-info pull-left submit">
              <input type="button" name="back" value="Cancelar" class="btn btn-danger cancelar" onClick="history.go(-1)">
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>
<script>
  $(function() {

    var plantilla;
    var metros_perf;
    var dens_piedra = 2.7;
    var result;

    $('body').on('input', 'input.calc', function() {

      plantilla = parseFloat($('#plantilla').val());
      metros_perf = parseFloat($('#metros_perf').val());
      result = (metros_perf * plantilla) * dens_piedra;

      if (!isNaN(result)) {
        $('#tons_tumbe').val(result.toFixed(2));
      }

    });

  });
</script>