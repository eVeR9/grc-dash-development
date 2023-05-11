<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<style>
.main-footer {
    display: none;
}
.plus {
  margin-left: 10px;
  font-size: 18px;
  color: #73C6B6;
}

</style>

<section class="content">
    <div class="box">
        <div class="box-header">
           <h3  class="box-title"> Mina / Total </h3>
        </div>
        <a href="<?= base_url('admin/nomina_mina/nomina_diaria_mina'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th style="display:none;"  >Id</th>
                        <th>Fecha</th>
                        <th>Nomina Directa</th>
                        <th>Nomina Indirecta</th>
                        <th>Gasto Arrendamiento</th>
                        <th>Gasto CFE</th>
                        <th>Produccion</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($get_total_mina as $row) : ?>
                        <tr>
                            <td style="display:none;"><?= $row['id']; ?></td>
                            <td><?= $row['fecha']; ?></td>
                            <td><?= $row['total']; ?></td>
                            <td><?= $row['total_dos']; ?></td>
                            <td><?= $row['arrendamiento']; ?></td>
                            <td><?= $row['cfe']; ?></td>
                            <td><?= $row['total_prod']; ?></td>
                            <!-- <td class="text-right"><a href="<?//= base_url('admin/salidas_prot/   ' . $row['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>-->

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
//entries, pagination and search bar
$(function () {
    $("#example1").DataTable();
  });
</script>