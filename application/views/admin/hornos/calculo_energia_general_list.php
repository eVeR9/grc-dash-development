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
            <h3 class="box-title">Calculo Energia List</h3>
        </div>

        <?php if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/hornos/calculo_energia_general'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>m3</th>
                        <th>Mega Calorias</th>
                        <th>Masa</th>
                        <th>Densidad</th>
                        <th>Consumo hornos(m3)</th>
                        <th>Mega Calorias Hornos</th>
                        <th>Consumo Planta Olivina</th>
                        <th>Mega Calorias Olivina   </th>
                        <th>GJ Olivina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($energia_list as $energia) : ?>
                        <tr>
                            <td><?= $energia['fecha'] ?></td>
                            <td><?= $energia['metros_cubicos'] ?></td>
                            <td><?= $energia['megacalorias'] ?></td>
                            <td><?= $energia['densidad'] ?></td>
                            <td><?= $energia['masa'] ?></td>
                            <td><?= $energia['consumo_hornos_metros_cubicos'] ?></td>
                            <td><?= $energia['megacalorias_hornos'] ?></td>
                            <td><?= $energia['consumo_planta_olivina'] ?></td>
                            <td><?= $energia['megacalorias_olivina'] ?></td>
                            <td><?= $energia['gj_olivina'] ?></td>

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