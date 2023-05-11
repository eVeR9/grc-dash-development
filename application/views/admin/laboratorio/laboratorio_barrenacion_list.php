<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Seleccion de  Barreno</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped " data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                       <!-- <th style="display:none;">Id</th> -->
                        <th>Fecha</th>
                        <th>Maquina</th>
                        <th>Numero de Barreno</th>
                        <th>Metros perforados</th>
                        <th>Linea</th>
                        <th>Analisis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_barrenacion as $row) : ?>
                        <tr>
                          <!--  <td style="display:none;"><?= $row['id']; ?></td> -->
                            <td><?= $row['fecha']; ?></td>
                            <td><?= $row['maquina_id']; ?></td>
                            <td><?= $row['bar_perf']; ?></td>
                            <td><?= $row['metros_perf']; ?></td>
                            <td><?= $row['linea']?></td>
                            <td class="text-right"><a href="<?= base_url('admin/laboratorio/edit_barrenos/' . $row['id']); ?>" class="btn btn-info btn-flat">Analisis</a></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    //entries, pagination and search bar
    $(function() {
        $("#example1").DataTable();
    });
</script>