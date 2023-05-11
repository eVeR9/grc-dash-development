<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Editar Bitacora Diaria Horno 3</h1>
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

                    <?php echo form_open(base_url('admin/hornos/edit_bitacora_diaria_h3/' . $bitacora['id']), 'class="form-horizontal"') ?>

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
                                <option disabled value="1">Horno 1</option>
                                <option disabled value="2">Horno 2</option>
                                <option  value="3" selected>Horno 3</option>
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

                    <div id="body-h3">

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Horno 3</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Produccion</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_produccion_tons_piedra" class="col-sm-1">Toneladas Piedra</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_produccion_tons_piedra" id="h3_produccion_tons_piedra" class="form-control" value="<?= $bitacora['h3_produccion_tons_piedra']; ?>">
                            </div>

                            <label for="h3_produccion_tons_prod" class="col-sm-1">Toneladas Producidas</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_produccion_tons_prod" id="h3_produccion_tons_prod" class="form-control" value="<?= $bitacora['h3_produccion_tons_prod']; ?>">
                            </div>

                            <label for="h3_ciclos_por_dia" class="col-sm-1">Ciclo por dia</label>
                            <div class="col-sm-2">
                                <input type="number" step="any" min="0" name="h3_ciclos_por_dia" id="h3_ciclos_por_dia" class="form-control" value="<?= $bitacora['h3_ciclos_por_dia']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_ciclos_calor_especifico_ent" class="col-sm-1">Calor especifico entrada</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_ciclos_calor_especifico_ent" id="h3_ciclos_calor_especifico_ent" class="form-control" value="<?= $bitacora['h3_ciclos_calor_especifico_ent']; ?>">
                            </div>

                            <!-- 
                            <label for="h3_ciclos_calor_especifico_bajo" class="col-sm-1">Calor especifico bajo</label>
                            <div class="col-sm-2">
                                <input type="number" step="any" min="0" name="h3_ciclos_calor_especifico_bajo" id="h3_ciclos_calor_especifico_bajo" class="form-control">
                            </div>
                            -->

                            <label for="h3_ciclos_contador_de_gas" class="col-sm-1">Contador de gas</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_ciclos_contador_de_gas" id="h3_ciclos_contador_de_gas" class="form-control" value="<?= $bitacora['h3_ciclos_contador_de_gas']; ?>">
                            </div>

                            <label for="h3_ciclos_flujo_total_de_gas" class="col-sm-1">Flujo total del gas</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_ciclos_flujo_total_de_gas" id="h3_ciclos_flujo_total_de_gas" class="form-control" value="<?= $bitacora['h3_ciclos_flujo_total_de_gas']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Combustible</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_combustible_quemador_1" class="col-sm-1">Quemador Uno</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_combustible_quemador_1" id="h3_combustible_quemador_1" class="form-control" value="<?= $bitacora['h3_combustible_quemador_1']; ?>">
                            </div>

                            <label for="h3_combustible_quemador_2" class="col-sm-1">Quemador Dos</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_combustible_quemador_2" id="h3_combustible_quemador_2" class="form-control" value="<?= $bitacora['h3_combustible_quemador_2']; ?>">
                            </div>

                            <label for="h3_combustible_quemador_3" class="col-sm-1">Quemador Tres</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_combustible_quemador_3" id="h3_combustible_quemador_3" class="form-control" value="<?= $bitacora['h3_combustible_quemador_3']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Factor Exceso Aire</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_factor_exceso_aire_quemador_1" class="col-sm-1">Quemador Uno</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_factor_exceso_aire_quemador_1" id="h3_factor_exceso_aire_quemador_1" class="form-control" value="<?= $bitacora['h3_factor_exceso_aire_quemador_1']; ?>">
                            </div>

                            <label for="h3_factor_exceso_aire_quemador_2" class="col-sm-1">Quemador Dos</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_factor_exceso_aire_quemador_2" id="h3_factor_exceso_aire_quemador_2" class="form-control" value="<?= $bitacora['h3_factor_exceso_aire_quemador_2']; ?>">
                            </div>

                            <label for="h3_factor_exceso_aire_quemador_3" class="col-sm-1">Quemador Tres</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_factor_exceso_aire_quemador_3" id="h3_factor_exceso_aire_quemador_3" class="form-control" value="<?= $bitacora['h3_factor_exceso_aire_quemador_3']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Aires</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aires_factor_aire_enfriamiento" class="col-sm-2 control-label">Factor Aire Enfriamiento</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_aires_factor_aire_enfriamiento" id="h3_aires_factor_aire_enfriamiento" class="form-control" value="<?= $bitacora['h3_aires_factor_aire_enfriamiento']; ?>">
                            </div>

                            <label for="h3_aires_factor_aire_enfriamiento_centro" class="col-sm-2 control-label">Aire Enfriamiento Centro</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_aires_factor_aire_enfriamiento_centro" id="h3_aires_factor_aire_enfriamiento_centro" class="form-control" value="<?= $bitacora['h3_aires_factor_aire_enfriamiento_centro']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aires_exceso_aire_factor_total" class="col-sm-2 control-label">Exceso Aire Factor Total</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_aires_exceso_aire_factor_total" id="h3_aires_exceso_aire_factor_total" class="form-control"value="<?= $bitacora['h3_aires_exceso_aire_factor_total']; ?>">
                            </div>

                            <label for="h3_aires_factor_enfriamiento_exceso" class="col-sm-2 control-label">Factor Aire Enfriamiento Exceso</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_aires_factor_enfriamiento_exceso" id="h3_aires_factor_enfriamiento_exceso" class="form-control" value="<?= $bitacora['h3_aires_factor_enfriamiento_exceso']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Gas</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_gas_temperatura_horno_arriba" class="col-sm-2 control-label">Temperatura Horno Arriba</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_gas_temperatura_horno_arriba" id="h3_gas_temperatura_horno_arriba" class="form-control" value="<?= $bitacora['h3_gas_temperatura_horno_arriba']; ?>">
                            </div>

                            <label for="h3_gas_presion_horno_arriba" class="col-sm-2 control-label">Presion Horno Arriba</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" name="h3_gas_presion_horno_arriba" id="h3_gas_presion_horno_arriba" class="form-control" value="<?= $bitacora['h3_gas_presion_horno_arriba']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Agua Enfriamiento</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_agua_enf_temp_agua_enf" class="col-sm-2 control-label">Temperatura Agua Enfriamiento</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_agua_enf_temp_agua_enf" id="h3_agua_enf_temp_agua_enf" class="form-control" value="<?= $bitacora['h3_agua_enf_temp_agua_enf']; ?>">
                            </div>

                            <label for="h3_agua_enf_num_enfriadores" class="col-sm-2 control-label">Numero de Enfriadores</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_agua_enf_num_enfriadores" id="h3_agua_enf_num_enfriadores" class="form-control" value="<?= $bitacora['h3_agua_enf_num_enfriadores']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Temperatura Cal</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_temp_cal_1" class="col-sm-1">Temp Cal Uno</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_cal_1" id="h3_temp_cal_1" class="form-control" value="<?= $bitacora['h3_temp_cal_1']; ?>">
                            </div>

                            <label for="h3_temp_cal_2" class="col-sm-1">Temp Cal Dos</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_cal_2" id="h3_temp_cal_2" class="form-control" value="<?= $bitacora['h3_temp_cal_2']; ?>">
                            </div>

                            <label for="h3_temp_cal_3" class="col-sm-1">Temp Cal Tres</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_cal_3" id="h3_temp_cal_3" class="form-control" value="<?= $bitacora['h3_temp_cal_3']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Temperatura Horno</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_temp_horno_1" class="col-sm-1 control-label">Temp Uno</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_horno_1" id="h3_temp_horno_1" class="form-control" value="<?= $bitacora['h3_temp_horno_1']; ?>">
                            </div>

                            <label for="h3_temp_horno_2" class="col-sm-1 control-label">Temp Dos</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_horno_2" id="h3_temp_horno_2" class="form-control" value="<?= $bitacora['h3_temp_horno_2']; ?>">
                            </div>

                            <label for="h3_temp_horno_3" class="col-sm-1 control-label">Temp Tres</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_horno_3" id="h3_temp_horno_3" class="form-control" value="<?= $bitacora['h3_temp_horno_3']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_temp_horno_4" class="col-sm-1 control-label">Temp Cuatro</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_horno_4" id="h3_temp_horno_4" class="form-control" value="<?= $bitacora['h3_temp_horno_4']; ?>">
                            </div>

                            <label for="h3_temp_horno_5" class="col-sm-1 control-label">Temp Cinco</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_horno_5" id="h3_temp_horno_5" class="form-control" value="<?= $bitacora['h3_temp_horno_5']; ?>">
                            </div>

                            <label for="h3_temp_horno_6" class="col-sm-1 control-label">Temp Seis</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_temp_horno_6" id="h3_temp_horno_6" class="form-control" value="<?= $bitacora['h3_temp_horno_6']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Aire de Instrumentos</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">Aire de Inst</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="h3_aire_comprimido" id="h3_aire_comprimido" class="form-control" value="<?= $bitacora['h3_aire_comprimido']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Velocidad Soplador Combustion #1</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Nominal</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_combustion_1_rpm_nominal" id="velocidad_soplador_combustion_1_rpm_nominal" class="form-control" value="<?= $bitacora['velocidad_soplador_combustion_1_rpm_nominal']; ?>">
                            </div>

                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Actual</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_combustion_1_rpm_actual" id="velocidad_soplador_combustion_1_rpm_actual" class="form-control" value="<?= $bitacora['velocidad_soplador_combustion_1_rpm_actual']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Velocidad Soplador Combustion #2</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Nominal</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_combustion_2_rpm_nominal" id="velocidad_soplador_combustion_2_rpm_nominal" class="form-control" value="<?= $bitacora['velocidad_soplador_combustion_2_rpm_nominal']; ?>">
                            </div>


                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Actual</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_combustion_2_rpm_actual" id="velocidad_soplador_combustion_2_rpm_actual" class="form-control" value="<?= $bitacora['velocidad_soplador_combustion_2_rpm_actual']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Velocidad Soplador Combustion #3</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Nominal</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_combustion_3_rpm_nominal" id="velocidad_soplador_combustion_3_rpm_nominal" class="form-control" value="<?= $bitacora['velocidad_soplador_combustion_3_rpm_nominal']; ?>">
                            </div>


                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Actual</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_combustion_3_rpm_actual" id="velocidad_soplador_combustion_3_rpm_actual" class="form-control" value="<?= $bitacora['velocidad_soplador_combustion_3_rpm_actual']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Velocidad Soplador Enfriamiento Central</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Nominal</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_enfriamiento_central_rpm_nominal" id="velocidad_soplador_enfriamiento_central_rpm_nominal" class="form-control" value="<?= $bitacora['velocidad_soplador_enfriamiento_central_rpm_nominal']; ?>">
                            </div>


                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Actual</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_enfriamiento_central_rpm_actual" id="velocidad_soplador_enfriamiento_central_rpm_actual" class="form-control" value="<?= $bitacora['velocidad_soplador_enfriamiento_central_rpm_actual']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="box-header">
                                <h1 class="box-title">Velocidad Soplador Enfriamiento Principal</h1>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Nominal</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_enfriamiento_principal_rpm_nominal" id="velocidad_soplador_enfriamiento_principal_rpm_nominal" class="form-control" value="<?= $bitacora['velocidad_soplador_enfriamiento_principal_rpm_nominal']; ?>">
                            </div>


                            <label for="h3_aire_comprimido" class="col-sm-1 control-label">RPM Actual</label>
                            <div class="col-sm-3">
                                <input type="number" step="any" min="0" name="velocidad_soplador_enfriamiento_principal_rpm_actual" id="velocidad_soplador_enfriamiento_principal_rpm_actual" class="form-control" value="<?= $bitacora['velocidad_soplador_enfriamiento_principal_rpm_actual']; ?>">
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