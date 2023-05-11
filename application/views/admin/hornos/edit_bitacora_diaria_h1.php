<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Editar Bitacora Diaria Horno 1</h1>
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

                    <?php echo form_open(base_url('admin/hornos/edit_bitacora_diaria_h1/' . $bitacora['id']), 'class="form-horizontal"') ?>

                    <div class="form-group">
                        <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-5">
                            <input type="text" name="fecha" id="fecha" value="<?= $bitacora['fecha']; ?>" class="form-control datepick" autocomplete="off">
                        </div>

                        <label for="hora" class="col-sm-1 control-label">Hora</label>
                        <div class="col-sm-5">
                            <select name="hora" id="hora" class="form-control">
                                <?php foreach ($horas as $row) : ?>
                                    <?php
                                    //$selected = ('id');
                                    $selected = "";
                                    if ($row['id'] == $bitacora['hora']) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?= $row['id'] ?>" <?= $selected; ?>><?= $row['hora'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="material_id" class="col-sm-1 control-label">Material</label>
                        <div class="col-sm-3">
                        <select name="material_id" id="material_id" class="form-control">
                                <?php foreach ($materiales as $row) : ?>
                                    <?php
                                    //$selected = ('id');
                                    $selected = "";
                                    if ($row['id'] == $bitacora['material_id']) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?= $row['id'] ?>" <?= $selected; ?>><?= $row['nombre_del_material'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label for="horno_id" class="col-sm-1 control-label">Horno</label>
                        <div class="col-sm-3">
                            <select name="horno_id" id="horno_id" class="form-control select-hornos">
                                <option value="1" selected>Horno 1</option>
                                <option disabled value="2">Horno 2</option>
                                <option disabled value="3">Horno 3</option>
                            </select>
                        </div>

                        <label for="" class="col-sm-1 control-label">Hornero</label>
                        <div class="col-sm-3">
                            <select name="hornero_en_turno" id="hornero_en_turno" class="form-control">
                            <?php foreach ($empleados as $row) : ?>
                                    <?php
                                    //$selected = ('id');
                                    $selected = "";
                                    if ($row['id'] == $bitacora['hornero_en_turno']) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?= $row['id'] ?>" <?= $selected; ?>><?= $row['nombreCompleto'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div id="body-h1-h2">

                        <div class="form-group" id="header-h1">
                            <div class="box-header">
                                <h1 class="box-title">Horno 1</h1>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="box-header with-border">
                                <h3 class="box-title">Skip</h3>
                            </div>
                            <label for="skips_cantidad" class="col-sm-1 control-label">Cantidad</label>
                            <div class="col-sm-3">
                                <input type="number" name="skips_cantidad" class="form-control" id="skips_cantidad" value="<?= $bitacora['skips_cantidad']; ?>">

                            </div>

                            <label for="skips_toneladas_piedra" class="col-sm-1 control-label">Toneladas Piedra</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="skips_toneladas_piedra" class="form-control" id="skips_toneladas_piedra" value="<?= $bitacora['skips_toneladas_piedra']; ?>">
                            </div>

                            <label for="skips_toneladas_prod" class="col-sm-1 control-label">Toneladas Producidas</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="skips_toneladas_prod" class="form-control" id="skips_toneladas_prod" value="<?= $bitacora['skips_toneladas_prod']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header with-border">
                                <h3 class="box-title">Combustible</h3>
                            </div>
                            <label for="combustible_inferior" class="col-sm-1 control-label">Inferior</label>
                            <div class="col-sm-4">
                                <input type="number" step="any" min="0" name="combustible_inferior" class="form-control" id="combustible_inferior" value="<?= $bitacora['combustible_inferior']; ?>">
                            </div>

                            <label for="combustible_superior" class="col-sm-1 control-label">Superior</label>
                            <div class="col-sm-4">
                                <input type="number" step="any" min="0" name="combustible_superior" class="form-control" id="combustible_superior" value="<?= $bitacora['combustible_superior']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header with-border">
                                <h3 class="box-title">Aire</h3>
                            </div>
                            <label for="aire_periferia" class="col-sm-1 control-label">Periferia</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="aire_periferia" class="form-control" id="aire_periferia" value="<?= $bitacora['aire_periferia']; ?>">
                            </div>

                            <label for="aire_inferior" class="col-sm-1 control-label">Inferiores</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="aire_inferior" class="form-control" id="aire_inferior" value="<?= $bitacora['aire_inferior']; ?>">
                            </div>

                            <label for="aire_superior" class="col-sm-1 control-label">Superiores</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="aire_superior" class="form-control" id="aire_superior" value="<?= $bitacora['aire_superior']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header with-border">
                                <h3 class="box-title">Relaciones</h3>
                            </div>
                            <label for="relaciones_inferior" class="col-sm-1 control-label">Inferiores</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="relaciones_inferior" class="form-control" id="relaciones_inferior" value="<?= $bitacora['relaciones_inferior']; ?>">
                            </div>

                            <label for="relaciones_superior" class="col-sm-1 control-label">Superiores</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="relaciones_superior" class="form-control" id="relaciones_superior" value="<?= $bitacora['relaciones_superior']; ?>">
                            </div>

                            <label for="relaciones_global" class="col-sm-1 control-label">Global</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="relaciones_global" class="form-control" id="relaciones_global" value="<?= $bitacora['relaciones_global']; ?>">
                            </div>
                        </div>

                        <div id="temp-horno-1">
                            <div class="form-group">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Temperaturas</h3>
                                </div>
                                <label for="temperatura_gases" class="col-sm-1 control-label">Gases</label>
                                <div class="col-sm-4">
                                    <input type="number" step="any" min="0" name="temperatura_gases" class="form-control" id="temperatura_gases" value="<?= $bitacora['temperatura_gases']; ?>" >
                                </div>

                                <label for="temperatura_descarga" class="col-sm-1 control-label">Descarga</label>
                                <div class="col-sm-4">
                                    <input type="number" step="any" min="0" name="temperatura_descarga" class="form-control" id="temperatura_descarga" value="<?= $bitacora['temperatura_descarga']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="temperatura_cal" class="col-sm-1 control-label">Cal</label>
                                <div class="col-sm-4">
                                    <input type="number" step="any" min="0" name="temperatura_cal" class="form-control" id="temperatura_cal" value="<?= $bitacora['temperatura_cal']; ?>">
                                </div>

                                <label for="temperatura_ambiente" class="col-sm-1 control-label">Ambiente</label>
                                <div class="col-sm-4">
                                    <input type="number" step="any" min="0" name="temperatura_ambiente" class="form-control" id="temperatura_ambiente" value="<?= $bitacora['temperatura_ambiente']; ?>">
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="box-header with-border">
                                <h3 class="box-title">Presiones P.S.I</h3>
                            </div>
                            <label for="presion_mesa" class="col-sm-1 control-label">Mesa</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="presion_mesa" class="form-control" id="presion_mesa" value="<?= $bitacora['presion_mesa']; ?>">
                            </div>

                            <label for="presion_inferior" class="col-sm-1 control-label">Inferiores</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="presion_inferior" class="form-control" id="presion_inferior" value="<?= $bitacora['presion_inferior']; ?>">
                            </div>

                            <label for="presion_superior" class="col-sm-1 control-label">Superiores</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="presion_superior" class="form-control" id="presion_superior" value="<?= $bitacora['presion_superior']; ?>">
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

        $('.select-hornos').on('change', function() {

            if ($('#horno_id').val() == 3) {



            } else if ($('#horno_id').val() == 2) {



                $('#skips_cantidad_h2').on('keyup', function() {

                    let toneladas_piedra = Number($('#skips_cantidad_h2').val()) * Number(2.124)
                    let toneladas_producidas = Number($('#skips_cantidad_h2').val()) * Number(1.18)

                    $('#skips_toneladas_piedra').val(toneladas_piedra.toFixed(2))
                    $('#skips_toneladas_prod').val(toneladas_producidas.toFixed(2))

                })

            } else if ($('#horno_id').val() == 1) {



                $('#skips_cantidad').on('keyup', function() {

                    let toneladas_piedra = Number($('#skips_cantidad').val()) * Number(1.44)
                    let toneladas_producidas = Number($('#skips_cantidad').val()) * Number(0.8)

                    $('#skips_toneladas_piedra').val(toneladas_piedra.toFixed(2))
                    $('#skips_toneladas_prod').val(toneladas_producidas.toFixed(2))

                })

            } else {

            }
        })

        $('#temperatura_sur').keyup(function() {

            let t_sur = Number($(this).val())
            let t_norte = Number($('#temperatura_norte').val())
            let promedio = (t_norte + t_sur) / 2
            let diferencia = (t_norte - t_sur)

            $('#temperatura_promedio').val(promedio)
            $('#temperatura_promedio').attr('readonly', true)

            $('#temperatura_diferencia').val(diferencia)
            $('#temperatura_diferencia').attr('readonly', true)

        })

        $('#aire_inferior').keyup(function() {

            let aireInf = Number($(this).val())
            let combInf = Number($('#combustible_inferior').val())

            let relacionInf = aireInf / combInf

            $('#relaciones_inferior').val(relacionInf.toFixed(2))

        })

        $('#aire_superior').keyup(function() {

            let aireSup = Number($(this).val())
            let combSup = Number($('#combustible_superior').val())

            let relacionSup = aireSup / combSup

            $('#relaciones_superior').val(relacionSup.toFixed(2))

            let periferia = Number($('#aire_periferia').val())
            let aireI = Number($('#aire_inferior').val())
            let aireP = Number($('#aire_superior').val())

            let combustibleInf = Number($('#combustible_inferior').val())
            let combustibleSup = Number($('#combustible_superior').val())

            let global = (periferia + aireI + aireP) / (combustibleInf + combustibleSup)

            $('#relaciones_global').val(global.toFixed(2))

        })

    })
</script>