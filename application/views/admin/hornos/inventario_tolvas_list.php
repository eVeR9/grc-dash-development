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
            <h3 class="box-title">Inventario Tolvas List</h3>
        </div>

        <?php if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/hornos/add_inventario_tolvas'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Tolva 1</th>
                        <th>Tolva 2</th>
                        <th>Tolva 3</th>
                        <th>Tolva 1 a</th>
                        <th>Tolva 1 b</th>
                        <th>Tolva 1 c</th>
                        <th>Tolva 2 a</th>
                        <th>Tolva 2 b</th>
                        <th>Tolva 2 c</th>
                        <th>Tolva 3 a</th>
                        <th>Tolva 3 b</th>
                        <th>Tolva 3 c</th>
                        <th>Cal/Patio</th>
                        <th>Cal Cruda H2</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventario_tolvas_list as $inv_tolvas) : ?>
                        <tr>
                            <td><?= $inv_tolvas['fecha'] ?></td>
                            <td><?= $inv_tolvas['hora'] ?></td>
                            <td><?= $inv_tolvas['tolva_uno'] ?></td>
                            <td><?= $inv_tolvas['tolva_dos'] ?></td>
                            <td><?= $inv_tolvas['tolva_tres'] ?></td>
                            <td><?= $inv_tolvas['tolva_uno_a'] ?></td>
                            <td><?= $inv_tolvas['tolva_uno_b'] ?></td>
                            <td><?= $inv_tolvas['tolva_uno_c'] ?></td>
                            <td><?= $inv_tolvas['tolva_dos_a'] ?></td>
                            <td><?= $inv_tolvas['tolva_dos_b'] ?></td>
                            <td><?= $inv_tolvas['tolva_dos_c'] ?></td>
                            <td><?= $inv_tolvas['tolva_tres_a'] ?></td>
                            <td><?= $inv_tolvas['tolva_tres_b'] ?></td>
                            <td><?= $inv_tolvas['tolva_tres_c'] ?></td>
                            <td><?= $inv_tolvas['cal_en_patio'] ?></td>
                            <td><?= $inv_tolvas['cal_cruda_h2'] ?></td>
                            <td class="text-right"><a href="<?= base_url('admin/hornos/edit_inventario_tolvas/' . $inv_tolvas['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>
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