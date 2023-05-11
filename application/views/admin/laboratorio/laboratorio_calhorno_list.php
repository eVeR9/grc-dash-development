<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<?php

    $puesto = strtoupper($this->session->userdata('puesto'));
    $depto = strtoupper($this->session->userdata('departamento'));

    //$dev = $puesto == "DESARROLLADOR";
    $iT = $depto == "TI";
    $jefeLab = $puesto == "JEFE-LABORATORIO";

?>

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
            <h3 class="box-title">Bitacora Cal Horno</h3>
        </div>
        <a href="<?= base_url('admin/laboratorio/add_calhorno'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th style="display:none;"  >Id</th>
                        <th>Estatus</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Horno</th>
                        <th>MgO</th>
                        <th>CaO</th>
                        <th>PxC</th>
                        <th>Comentarios</th>
                        <th>Editar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_calhorno as $row) : ?>
                        <tr>
                            <td style="display:none;"><?= $row['id']; ?></td>
                            <td><?= $row['estatus']; ?></td>
                            <td><?= $row['fecha']; ?></td>
                            <td><?= $row['hora']; ?></td>
                            <td><?= $row['horno']; ?></td>
                            <td><?= $row['mgo']; ?></td>
                            <td><?= $row['cao']; ?></td>
                            <td><?= $row['pxc']; ?></td>
                            <td><?= $row['comentarios']; ?></td>
                            <?php if($jefeLab || $iT):?>
                            <td class="text-right"><a href="<?= base_url('admin/laboratorio/edit_calhorno/' . $row['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>
                            <?php else: ?>
                            <td class="text-right"><a href="#" class="btn btn-info btn-flat">Editar</a></td>
                            <?php endif; ?>
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

