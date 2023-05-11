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
            <h3 class="box-title">Balance Tolvas List</h3>
        </div>

        <?php if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/hornos/add_balance_tolvas'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Inv Inicial</th>
                        <th>Skips H1</th>
                        <th>Skips H2</th>
                        <th>Previa H1</th>
                        <th>Previa H2</th>
                        <th>Previa H3</th>
                        <th>Suma Previa</th>
                        <th>Cal Embarques</th>
                        <th>Finos H1</th>
                        <th>Finos H2</th>
                        <th>Finos H3</th>
                        <th>Calcita</th>
                        <th>Cal Cruda H1</th>
                        <th>Cal Cruda H2</th>
                        <th>Cal Cruda H3</th>
                        <th>Desperdicio</th>
                        <th>Existencia Teorica</th>
                        <th>Existencia Estimada</th>
                        <th>Diferencia</th>
                        <th>Previa 2 H1</th>
                        <th>Previa 2 H2</th>
                        <th>Previa 2 H3</th>
                        <th>Diferencia 2 H3</th>
                        <th>Cal Prod Final H1</th>
                        <th>Cal Prod Final H2</th>
                        <th>Cal Prod Final H3</th>
                        <th>Finos Final H1</th>
                        <th>Finos Final H2</th>
                        <th>Finos Final H3</th>
                        <th>Calcita Final</th>
                        <th>Desperdicio Final</th>
                        <th>Existencia T Final</th>
                        <th>Existencia E Final</th>
                        <th>Diferencia Final</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($balance_list as $balance) : ?>
                        <tr>
                            <td><?= $balance['fecha'] ?></td>
                            <td><?= $balance['inventario_inicial'] ?></td>
                            <td><?= $balance['skips_h1'] ?></td>
                            <td><?= $balance['skips_h2'] ?></td>
                            <td><?= $balance['previa_h1'] ?></td>
                            <td><?= $balance['previa_h2'] ?></td>
                            <td><?= $balance['previa_h3'] ?></td>
                            <td><?= $balance['suma_previa'] ?></td>
                            <td><?= $balance['cal_embarques'] ?></td>
                            <td><?= $balance['finos_h1'] ?></td>
                            <td><?= $balance['finos_h2'] ?></td>
                            <td><?= $balance['finos_h3'] ?></td>
                            <td><?= $balance['calcita'] ?></td>
                            <td><?= $balance['cal_cruda_h1'] ?></td>
                            <td><?= $balance['cal_cruda_h2'] ?></td>
                            <td><?= $balance['cal_cruda_h3'] ?></td>
                            <td><?= $balance['desperdicio'] ?></td>
                            <td><?= $balance['existencia_teorica'] ?></td>
                            <td><?= $balance['existencia_estimada'] ?></td>
                            <td><?= $balance['diferencia'] ?></td>
                            <td><?= $balance['previa_2_h1'] ?></td>
                            <td><?= $balance['previa_2_h2'] ?></td>
                            <td><?= $balance['previa_2_h3'] ?></td>
                            <td><?= $balance['diferencia_2_h3'] ?></td>
                            <td><?= $balance['cal_producida_final_h1'] ?></td>
                            <td><?= $balance['cal_producida_final_h2'] ?></td>
                            <td><?= $balance['cal_producida_final_h3'] ?></td>
                            <td><?= $balance['finos_final_h1'] ?></td>
                            <td><?= $balance['finos_final_h2'] ?></td>
                            <td><?= $balance['finos_final_h3'] ?></td>
                            <td><?= $balance['calcita_final'] ?></td>
                            <td><?= $balance['desperdicio_final'] ?></td>
                            <td><?= $balance['existencia_teorica_final'] ?></td>
                            <td><?= $balance['existencia_estimada_final'] ?></td>
                            <td><?= $balance['diferencia_final'] ?></td>

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
    $(function() {

        $("#example1").DataTable({

            order: [[0, 'desc']]
        })

    });
</script>