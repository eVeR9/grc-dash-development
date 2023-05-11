<style>
    .plus {
        margin-left: 10px;
        font-size: 18px;
        color: #73C6B6;
    }
</style>

<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bitacora de Sacos</h3>
        </div>
        <a href="<?= base_url('admin/hornos/add_sacos'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <th width="40%">Fecha</th>
                        <th width="60%">Cantidad Sacos</th>
                        <th width="60%">Toneladas</th>
                        <th width="60%">Recribado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sacos as $sa) : ?>
                        <tr>
                            <td><?= $sa['fecha'] ?></td>
                            <td><?= $sa['cantidad_sacos'] ?></td>
                            <td><?= $sa['toneladas'] ?></td>
                            <td><?= $sa['recribado'] ?></td>
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