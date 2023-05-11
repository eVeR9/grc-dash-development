<style>
    .plus {
        margin-left: 10px;
        font-size: 18px;
        color: #73C6B6;
    }
</style>

<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<?php 
$puesto = strtoupper($this->session->userdata('puesto'));
$depto = strtoupper($this->session->userdata('departamento'));
?>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bitacora Diaria Horno 3</h3>
        </div>

        <?php if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/hornos/add_bitacora_diaria'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>
        
        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Material</th>
                        <!-- <th>Horno</th> -->
                        <th>Hornero</th>
                        <th>Tons Piedra</th>
                        <th>Tons Producidas</th>
                        <th>Ciclos por Dia</th>
                        <th>Calor Especifico Ent</th>
                        <th>Calor Especifico Bajo</th>
                        <th>Contador de Gas</th>
                        <th>Flujo Total de Gas</th>
                        <th>Comb Quemador 1</th>
                        <th>Comb Quemador 2</th>
                        <th>Comb Quemador 3</th>
                        <th>Factor Exceso A Quemador 1</th>
                        <th>Factor Exceso A Quemador 2</th>
                        <th>Factor Exceso A Quemador 3</th>
                        <th>Factor Aire Enf</th>
                        <th>Aire Enf Centro</th>
                        <th>Exceso Aire Factor T</th>
                        <th>Factor Aire Enf Exceso</th>
                        <th>Temp Horno Arriba</th>
                        <th>Precion Horno Arriba</th>
                        <th>Temp Agua Enfriamiento</th>
                        <th>No de Enfriadores</th>
                        <th>Temp Cal 1</th>
                        <th>Temp Cal 2</th>
                        <th>Temp Cal 3</th>
                        <th>Temp 1</th>
                        <th>Temp 2</th>
                        <th>Temp 3</th>
                        <th>Temp 4</th>
                        <th>Temp 5</th>
                        <th>Temp 6</th>
                        <th>Aire Comprimido</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($horno_tres as $horno): ?>
                    <tr>
                        <td><?= $horno['fecha']?></td>
                        <td><?= $horno['hora']?></td>
                        <td><?= $horno['material_id']?></td>
                        <!-- <td><?//= $horno['horno_id']?></td> -->
                        <td><?= $horno['hornero_en_turno']?></td>
                        <td><?= $horno['h3_produccion_tons_piedra']?></td>
                        <td><?= $horno['h3_produccion_tons_prod']?></td>
                        <td><?= $horno['h3_ciclos_por_dia']?></td>
                        <td><?= $horno['h3_ciclos_calor_especifico_ent']?></td>
                        <td><?= $horno['h3_ciclos_calor_especifico_bajo']?></td>
                        <td><?= $horno['h3_ciclos_contador_de_gas']?></td>
                        <td><?= $horno['h3_ciclos_flujo_total_de_gas']?></td>
                        <td><?= $horno['h3_combustible_quemador_1']?></td>
                        <td><?= $horno['h3_combustible_quemador_2']?></td>
                        <td><?= $horno['h3_combustible_quemador_3']?></td>
                        <td><?= $horno['h3_factor_exceso_aire_quemador_1']?></td>
                        <td><?= $horno['h3_factor_exceso_aire_quemador_2']?></td>
                        <td><?= $horno['h3_factor_exceso_aire_quemador_3']?></td>
                        <td><?= $horno['h3_aires_factor_aire_enfriamiento']?></td>
                        <td><?= $horno['h3_aires_factor_aire_enfriamiento_centro']?></td>
                        <td><?= $horno['h3_aires_exceso_aire_factor_total']?></td>
                        <td><?= $horno['h3_aires_factor_enfriamiento_exceso']?></td>
                        <td><?= $horno['h3_gas_temperatura_horno_arriba']?></td>
                        <td><?= $horno['h3_gas_presion_horno_arriba']?></td>
                        <td><?= $horno['h3_agua_enf_temp_agua_enf']?></td>
                        <td><?= $horno['h3_agua_enf_num_enfriadores']?></td>
                        <td><?= $horno['h3_temp_cal_1']?></td>
                        <td><?= $horno['h3_temp_cal_2']?></td>
                        <td><?= $horno['h3_temp_cal_3']?></td>
                        <td><?= $horno['h3_temp_horno_1']?></td>
                        <td><?= $horno['h3_temp_horno_2']?></td>
                        <td><?= $horno['h3_temp_horno_3']?></td>
                        <td><?= $horno['h3_temp_horno_4']?></td>
                        <td><?= $horno['h3_temp_horno_5']?></td>
                        <td><?= $horno['h3_temp_horno_6']?></td>
                        <td><?= $horno['h3_aire_comprimido']?></td>
                        <td class="text-right"><a href="<?= base_url('admin/hornos/edit_bitacora_diaria_h3/' . $horno['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>

  $(function () {
    $("#example1").DataTable();
  });

  </script>