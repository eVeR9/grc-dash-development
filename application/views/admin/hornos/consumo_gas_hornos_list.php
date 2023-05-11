<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<style>
    .plus {
        margin-left: 10px;
        font-size: 18px;
        color: #73C6B6;
    }
</style>



<?php
$puesto = strtoupper($this->session->userdata('puesto'));
$depto = strtoupper($this->session->userdata('departamento'));
?>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bitacora de Consumo de Gas Hornos</h3>
        </div>

        <?php if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
            <a href="<?= base_url('admin/hornos/consumo_gas_hornos'); ?>">
                <i class="fa fa-plus plus" aria-hidden="true"></i>
            </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>m3 T</th>
                        <th>Mega Calorias T</th>
                        <th>Toneladas T</th>
                        <th>GJ</th>
                        <th>BTU</th>
                        <th>Factor m3 GJ</th>
                        <th>Cal Producida H3</th>
                        <th>Horas T H3</th>
                        <th>m3 H3</th>
                        <th>m3 Real H3</th>
                        <th>GJ H3</th>
                        <th>BTU/TON H3</th>
                        <th>Cal Producida H2</th>
                        <th>Horas T H2</th>
                        <th>Consumo H2(m3)</th>
                        <th>Comb Inf H2</th>
                        <th>Comb Sup H2</th>
                        <th>GJ H2</th>
                        <th>BTU/TON H2</th>
                        <th>Cal Producida H1</th>
                        <th>Horas T H1</th>
                        <th>Consumo H1(m3)</th>
                        <th>Comb Inf H1</th>
                        <th>Comb Sup H1</th>
                        <th>GJ H1</th>
                        <th>BTU/TON H1</th>
                        <th>BTU/TON</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consumo_list as $consumo) : ?>
                        <tr>
                            <td><?= $consumo['fecha'] ?></td>
                            <td><?= $consumo['m3_totales'] ?></td>
                            <td><?= $consumo['mega_calorias_totales'] ?></td>
                            <td><?= $consumo['toneladas_totales'] ?></td>
                            <td><?= $consumo['gj'] ?></td>
                            <td><?= $consumo['btu'] ?></td>
                            <td><?= $consumo['factor_m3_GJ'] ?></td>
                            <td><?= $consumo['cal_producida_final_h3'] ?></td>
                            <td><?= $consumo['horas_trabajadas_h3'] ?></td>
                            <td><?= $consumo['m3_h3'] ?></td>
                            <td><?= $consumo['m3_real_h3'] ?></td>
                            <td><?= $consumo['gj_h3'] ?></td>
                            <td><?= $consumo['btu_h3'] ?></td>
                            <td><?= $consumo['cal_producida_final_h2'] ?></td>
                            <td><?= $consumo['horas_trabajadas_h2'] ?></td>
                            <td><?= $consumo['consumo_h2'] ?></td>
                            <td><?= $consumo['combustible_inferior_h2'] ?></td>
                            <td><?= $consumo['combustible_superior_h2'] ?></td>
                            <td><?= $consumo['gj_h2'] ?></td>
                            <td><?= $consumo['btu_h2'] ?></td>
                            <td><?= $consumo['cal_producida_final_h1'] ?></td>
                            <td><?= $consumo['horas_trabajadas_h1'] ?></td>
                            <td><?= $consumo['consumo_h1'] ?></td>
                            <td><?= $consumo['combustible_inferior_h1'] ?></td>
                            <td><?= $consumo['combustible_superior_h1'] ?></td>
                            <td><?= $consumo['gj_h1'] ?></td>
                            <td><?= $consumo['btu_h1'] ?></td>
                            <td><?= $consumo['mbtu_ton'] ?></td>
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

        $("#example1").DataTable({

            order: [
                [0, 'desc']
            ]
        })
</script>