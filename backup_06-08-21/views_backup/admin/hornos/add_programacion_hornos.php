<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Programacion de Hornos</h3>    
                </div>

                <div class="box-body">

                <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h3><i class="icon fa fa-warning"></i> Alerta!</h3>
                            <h4>Faltan campos por llenar:</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/hornos/add_programacion_hornos'), 'class="form-horizontal"') ?>
                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Año</label>
                            <div class="col-sm-2">
                                <input type="number" min="0" name="año" id="año" class="form-control">
                            </div>

                            
                            <label for="" class="col-sm-1 control-label">Mes</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="mes" id="mes">  
                                    <option value="">Seleccione</option>
                                    <?php foreach($meses as $mes):?>
                                    <option value="<?= $mes['id']?>"><?= $mes['mes']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <label for="" class="col-sm-1 control-label">Dias</label>
                            <div class="col-sm-2">
                                <input type="number" min="0" name="dia" id="dia" class="form-control">
                            </div>

                            <label for="" class="col-sm-1 control-label">Horno</label>
                            <div class="col-sm-2">
                                <select name="horno_id" id="horno_id" class="form-control">  
                                    <option value="">Seleccione</option>
                                    <option value="1">Horno 1</option>
                                    <option value="2">Horno 2</option>
                                    <option value="3">Horno 3</option>
                                </select>
                            </div>
                            
                    </div>

<!--
                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Mes</label>
                            <div class="col-sm-4">
                                <input type="number" min="0" max="12" name="mes" id="mes" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Dias</label>
                            <div class="col-sm-4">
                                <input type="number" min="0" max="31" name="dia" id="dia" class="form-control">
                            </div>
                    </div>
-->
                    <div class="form-group">

                        <label for="" class="col-sm-2 control-label">Toneladas Cal Diaria</label>
                            <div class="col-sm-4">
                                <input type="number" min="0" name="tons_cal_diaria" id="tons_cal_diaria" class="form-control">
                            </div>

                            <label for="" class="col-sm-2 control-label">Toneladas Cal Mensual</label>
                            <div class="col-sm-4">
                                <input type="text" name="tons_cal_mensual"   id="tons_cal_mensual" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <input type="submit" name="guardar" id="guardar" class="btn btn-info" value="Guardar">
                            </div>
                        </div>
                    </div>
                    <?php echo form_open() ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script>

  let tons_cal_diaria;
  let dia;
  let tons_cal_mensual;

  tons_cal_mensual = document.getElementById('tons_cal_mensual');
  tons_cal_mensual.setAttribute('readonly', true);

    function calcula(){

        dia = Number(document.getElementById('dia').value);
        tons_cal_diaria = Number(document.getElementById('tons_cal_diaria').value);

        return document.getElementById('tons_cal_mensual').value = dia*tons_cal_diaria

    }

    document.getElementById('tons_cal_diaria').addEventListener('keyup', calcula)


</script>