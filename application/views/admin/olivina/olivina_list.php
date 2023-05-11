

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

<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<?php 
$puesto = strtoupper($this->session->userdata('puesto'));
$depto = strtoupper($this->session->userdata('departamento'));
?>

<section class="content">
    <div class="box">
        <div class="box-header">
           <h3  class="box-title"> Bitacora Consumo Olivina</h3>
        </div>

        <?php if ($depto == "TI" || $depto == "MINA") : ?>
        <a href="<?= base_url('admin/olivina/add'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php endif; ?>
        <!-- /.box-header -->

        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <!--<th style="display:none;"  >Id</th> -->
                        <th>Fecha</th>
                        <th>Lectura Inicial</th>
                        <th>Lectura Final</th>
                        <th>Consumo de Gas</th>
                        <th>Gigajoules</th>
                        <th>Editar</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_olivina as $row) : ?>
                        <tr>
                           <!-- <td style="display:none;"><?= $row['id']; ?></td> -->
                            <td><?= $row['fecha']; ?></td>
                            <td><?= $row['lectura_inicial']; ?></td>
                            <td><?= $row['lectura_final']; ?></td>
                            <td><?= $row['consumo_gas']; ?></td>
                            <td><?= $row['gigajoules']; ?></td>
                            
                            <td class="text-right"><a href="<?= base_url('admin/olivina/edit/' . $row['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>

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