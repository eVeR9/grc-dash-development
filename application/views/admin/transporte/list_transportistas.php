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
            <h3 class="box-title">Catalogo de Transportistas</h3>
        </div>

        <?php //if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/transporte/add_transportistas'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php //endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Codigo Transportista</th>
                        <th>Razon Social</th>
                        <th>RFC</th>
                        <th>Contacto</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <!-- <th>Editar</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transportistas as $transp) : ?>
                        <tr>
                            <!-- <td><?//= $op['id'] ?></td> -->
                            <td><?= $transp['codigo_transportista'] ?></td>
                            <td><?= $transp['razon_social'] ?></td>
                            <td><?= $transp['rfc'] ?></td>
                            <td><?= $transp['nombre_contacto'] ?></td>
                            <td><?= $transp['tel_contacto'] ?></td>
                            <td><?= $transp['email_contacto'] ?></td>
                            <!-- <td class="text-right"><a href="<?= base_url('admin/hornos/edit_paros/' . $transp['id']); ?>" class="btn btn-info btn-flat">Editar</a></td> -->
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