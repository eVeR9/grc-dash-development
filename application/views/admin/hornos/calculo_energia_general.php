<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Captura Calculo Energia Gral</h1>
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

                    <?php echo form_open(base_url('admin/hornos/calculo_energia_general'), 'class="form-horizontal"') ?>

                    <div class="form-group">
                        <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-3">
                            <input type="text" name="fecha" id="fecha" class="form-control datepick" autocomplete="off">
                        </div>


                    

                        <label for="metros_cubicos" class="col-sm-1 control-label">M3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="metros_cubicos" id="metros_cubicos" class="form-control">
                        </div>



                        <label for="megacalorias" class="col-sm-1 control-label">MegaCalorias</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="megacalorias" id="megacalorias" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="masa" class="col-sm-1 control-label">Masa</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="masa" id="masa" class="form-control">
                            </div>

                            <label for="densidad" class="col-sm-1 control-label">Densidad</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="densidad" id="densidad" class="form-control">
                            </div>

                            
                        </div>



                    <div id="body-h1">

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Hornos</h1>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="consumo_hornos_metros_cubicos" class="col-sm-1 control-label">Consumo Hornos M3</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="consumo_hornos_metros_cubicos" id="consumo_hornos_metros_cubicos" class="form-control">
                            </div>

                            <label for="megacalorias_hornos" class="col-sm-1 control-label">MegaCalorias Hornos</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="megacalorias_hornos" id="megacalorias_hornos" class="form-control">
                            </div>

                            <label for="consumo_planta_olivina" class="col-sm-1 control-label">Consumo Planta Olivina M3</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="consumo_planta_olivina" id="consumo_planta_olivina" class="form-control">
                            </div>
                        </div>


                    </div>

                    <div id="body-h2">

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Olivina</h1>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="megacalorias_olivina" class="col-sm-1 control-label">MegaCalorias Olivina</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="megacalorias_olivina" id="megacalorias_olivina" class="form-control">
                            </div>

                            <label for="gj_olivina" class="col-sm-1 control-label">GJ Olivina</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="gj_olivina" id="gj_olivina" class="form-control">
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group botonGuardar">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-info pull-right" name="submit" id="submit" value="Guardar">
                        </div>
                    </div>
                    <?php echo form_close() ?>


                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function() {

        console.log('hello world')

        $('.datepick').datepicker({

            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true

        })

        

        $('body').change(fecha, function(){

            let fecha = $('#fecha').val()

        $.ajax({

            url: '<?php echo base_url()?>admin/hornos/getValuesForCalculoEnergiaGralController/'+fecha,
            type: 'POST',
            data: {fecha:fecha},
            dataType: 'json',
            errror: function(){

                alert('Algo salio mal')
            },
            success: function(data){

                //alert(data)

                $('#metros_cubicos').val(data['m3'])
                $('#megacalorias').val(data['megacalorias'])
                $('#consumo_hornos_metros_cubicos').val(data['consumo_hornos_m3'])
                $('#megacalorias_hornos').val(data['mega_calorias_hornos'])
                $('#consumo_planta_olivina').val(data['consumo_olivina'])
                $('#megacalorias_olivina').val(data['mega_calorias_olivina'])
                $('#gj_olivina').val(data['gj_olivina'])
                $('#densidad').val(data['densidad'])
                $('#masa').val(data['masa'])

            }
        })
        })
    })
</script>