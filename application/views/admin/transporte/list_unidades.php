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
            <h3 class="box-title">Catalogo de Unidades</h3>
        </div>

        <?php //if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/transporte/add_unidades'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php //endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>No Unidad</th>
                        <!-- <th>Transportista</th> -->
                        <th>Placas</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Color</th>
                        <!-- <th>Editar</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($unidades as $unidad) : ?>
                        <tr>
                            <!-- <td><?//= $op['id'] ?></td> -->
                            <td><?= $unidad['numero_unidad'] ?></td>
                            <!-- <td><?//= $unidad['id_transportista'] ?></td> -->
                            <td><?= $unidad['placas'] ?></td>
                            <td><?= $unidad['marca'] ?></td>
                            <td><?= $unidad['modelo'] ?></td>
                            <td><?= $unidad['año'] ?></td>
                            <td><?= $unidad['color'] ?></td>
                            <!-- <td class="text-right"><a href="<?= base_url('admin/hornos/edit_paros/' . $unidad['id']); ?>" class="btn btn-info btn-flat">Editar</a></td> -->
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