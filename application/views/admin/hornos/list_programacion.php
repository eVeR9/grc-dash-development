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
            <h3 class="box-title">Programacion List</h3>
        </div>
        <?php if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/hornos/add_programacion_hornos'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Mes</th>
                        <th>Dia</th>
                        <th>Horno</th>
                        <th>Cal Diaria</th>
                        <th>Cal Mensual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($programacion_list as $programacion) : ?>
                        <tr>
                            <td><?= $programacion['año'] ?></td>
                            <td><?= $programacion['mes'] ?></td>
                            <td><?= $programacion['dia'] ?></td>
                            <td><?= $programacion['horno_id'] ?></td>
                            <td><?= $programacion['tons_cal_diaria'] ?></td>
                            <td><?= $programacion['tons_cal_mensual	'] ?></td>
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