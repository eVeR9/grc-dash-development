<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>
    .main-footer {
        display: none;
    }

    .center {
        text-align: center;
    }

    .plus {
        margin-left: 10px;
        font-size: 18px;
        color: #73C6B6;
    }
</style>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Asignacion de Explosivo</h3>
    </div>
    <!-- 
    <a href="<?//= base_url('admin/barrenacion/rangos_voladuras'); ?>">
        <i class="fa fa-plus plus" aria-hidden="true"></i>
    </a>&nbsp&nbsp<label for="" class="">Nuevo Rango</label>
    -->
    <div class="box-body table-responsive">
        <table class="table table-bordered" id="example1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Fecha</th>
                    <th>Total Metros</th>
                    <th>Cantidad de Barrenos</th>
                    <th>Total toneladas tumbe</th>
                    <th>Metros / Barrenos</th>
                    <th>Explosivo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($voladuras as $voladura) : ?>
                    <tr>
                        <td><?= $voladura['id'] ?></td>
                        <td><?= $voladura['fecha_inicial'] ?></td>
                        <td><?= $voladura['fecha_final'] ?></td>
                        <td><?= $voladura['fecha'] ?></td>
                        <td><?= $voladura['total_metros_perf'] ?></td>
                        <td><?= $voladura['cantidad_barrenos'] ?></td>
                        <td><?= $voladura['total_toneladas_tumbe'] ?></td>
                        <td><?= $voladura['metros_entre_barrenos'] ?></td>
                        <td><a href="<?= base_url('admin/barrenacion/voladuras_explosivo/'.$voladura['id']);?>" class="btn btn-info btn-sm">Explosivo</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function() {
        $(function() {
            $("#example1").DataTable();
        });
    });
</script>