<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bitacora Diaria Horno 2</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Material</th>
                        <th>Horno</th>
                        <th>Hornero</th>
                        <th>Skips</th>
                        <th>Tons Piedra</th>
                        <th>Tons Producidas</th>
                        <th>Combustible Inf</th>
                        <th>Conbustible Sup</th>
                        <th>Aire Periferia</th>
                        <th>Aire Inferiores</th>
                        <th>Aire Superiores</th>
                        <th>Relaciones Inferiores</th>
                        <th>Relaciones Superiores</th>
                        <th>Relaciones Global</th>
                        <th>Temp Norte</th>
                        <th>Temp Sur</th>
                        <th>Temp Promedio</th>
                        <th>Temp Diferencia</th>
                        <th>Temp Mesa</th>
                        <th>Presiones Mesa</th>
                        <th>Presiones Inferiores</th>
                        <th>Presiones Superiores</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($horno_dos as $horno): ?>
                    <tr>
                        <td><?= $horno['fecha']?></td>
                        <td><?= $horno['hora']?></td>
                        <td><?= $horno['material_id']?></td>
                        <td><?= $horno['horno_id']?></td>
                        <td><?= $horno['hornero_en_turno']?></td>
                        <td><?= $horno['skips_cantidad_h2']?></td>
                        <td><?= $horno['skips_toneladas_piedra']?></td>
                        <td><?= $horno['skips_toneladas_prod']?></td>
                        <td><?= $horno['combustible_inferior']?></td>
                        <td><?= $horno['combustible_superior']?></td>
                        <td><?= $horno['aire_periferia']?></td>
                        <td><?= $horno['aire_inferior']?></td>
                        <td><?= $horno['aire_superior']?></td>
                        <td><?= $horno['relaciones_inferior']?></td>
                        <td><?= $horno['relaciones_superior']?></td>
                        <td><?= $horno['relaciones_global']?></td>
                        <td><?= $horno['temperatura_norte']?></td>
                        <td><?= $horno['temperatura_sur']?></td>
                        <td><?= $horno['temperatura_promedio']?></td>
                        <td><?= $horno['temperatura_diferencia']?></td>
                        <td><?= $horno['temperatura_mesa']?></td>
                        <td><?= $horno['presion_mesa']?></td>
                        <td><?= $horno['presion_inferior']?></td>
                        <td><?= $horno['presion_superior']?></td>
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