<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Bitacora Analisis de Barrenos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped " data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th style="display:none;">Id</th>
                        <th>Fecha de Extraccion</th>
                        <th>Maquina</th>
                        <th>Numero de Barreno</th>
                        <th>Metros perforados</th>
                        <th>Fecha de Analisis</th>
                        <th>Mgo</th>
                        <th>CaO</th>
                        <th>Comentarios</th>
                        <th>Estatus</th>
                        <th>Editar</th>



                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_laboratorio_barrenacion as $row) : ?>
                        <tr>
                            <td style="display:none;"><?= $row['id']; ?></td>
                            <td><?= $row['fecha_extraccion']; ?></td>
                            <td><?= $row['nombre']; ?></td>
                            <td><?= $row['id_barreno']; ?></td>
                            <td><?= $row['id_metros']; ?></td>
                            <td><?= $row['fecha_analisis']; ?></td>
                            <td><?= $row['mgo']; ?></td>
                            <td><?= $row['cao']; ?></td>
                            <td><?= $row['comentarios']; ?></td>
                            <td><?= $row['estatus']; ?></td>
                            <td class="text-right"><a href="<?= base_url('admin/laboratorio/add_barrenos/' . $row['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>


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