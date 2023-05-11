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
            <h3 class="box-title">Bitacora de Paros</h3>
        </div>

        <?php if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/hornos/add_paros'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Horno</th>
                        <th>Motivo</th>
                        <th>Equipo</th>
                        <th>Tiempo</th>
                        <th>Hora Inicio</th>
                        <th>Hora Final</th>
                        <th>Atribuido a</th>
                        <th>Comentarios</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paros_list as $pl) : ?>
                        <tr>
                            <td><?= $pl['id'] ?></td>
                            <td><?= $pl['fecha'] ?></td>
                            <td><?= $pl['horno_id'] ?></td>
                            <td><?= $pl['motivo_paro_id'] ?></td>
                            <td><?= $pl['equipo_paro_id'] ?></td>
                            <td><?= $pl['tiempo'] ?></td>
                            <td><?= $pl['hora_inicio'] ?></td>
                            <td><?= $pl['hora_final'] ?></td>
                            <td><?= $pl['atribuido_a'] ?></td>
                            <td><?= $pl['comentarios'] ?></td>
                            <td class="text-right"><a href="<?= base_url('admin/hornos/edit_paros/' . $pl['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>
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
            order: [
                [0, 'desc']
            ]
        })

    });
</script>