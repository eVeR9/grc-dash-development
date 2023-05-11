<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<?php 
      $puesto = strtoupper($this->session->userdata('puesto'));

      $dev = $puesto == "DESARROLLADOR";
      $jefe_barrenacion = $puesto == "JEFE-BARRENACION";
?>

<style>

.ancho {
    width: 30px;
}


.edit-btn{
    margin-left: 5px;
}

.plus {
  margin-left: 10px;
  font-size: 18px;
  color: #73C6B6;
}
</style>


<section class="content">
<div class="box"> <!-- blank space -->
        <div class="box-header"> <!-- blue background -->
            <h3 class="box-title">Programacion</h3>
        </div> <!-- box-header -->

  <a href="<?= base_url('admin/barrenacion/metas_add');?>">
    <i class="fa fa-plus plus" aria-hidden="true"></i>
  </a>&nbsp&nbsp<label for="" class="">Nueva Meta</label>

<div class="box-body table-responsive">
<table id="example1" class="table table-bordered">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>Concepto</th>
      <th>Operador</th>
      <th>Meta (Metros)</th>
      <th>Horas (Suspension)</th>
      <th>Observaciones</th>
      <th class="ancho">Editar</th>
    </tr> <!-- table-row -->
  </thead>
    <tbody>
      <?php foreach($metas_barrenacion as $row): ?>
      <tr>
        <td><?= $row['fecha'] ?></td>
        <td><?= $row['descripcion'] ?></td>
        <td><?= $row['empleado_id'] ?></td>
        <td><?= $row['metros_por_barrenar'] ?></td>
        <td><?= $row['horas'] ?></td>
        <td><?= $row['observaciones'] ?></td>
        <?php if($dev || $jefe_barrenacion): ?>
          <td><a href="<?= base_url('admin/barrenacion/metas_edit/'.$row['id']); ?>"><button id="" class="btn btn-info edit-btn">Editar</button></a></td>
        <?php else: ?>
          <td><a href="#"><button id="" class="btn btn-info edit-btn">Editar</button></a></td>
        <?php endif; ?>
      </tr> <!-- table-row -->
      <?php endforeach; ?>
    </tbody>
</table>
<!--
<a href="<?//= base_url('admin/barrenacion/metas_add') ?>"><button class="btn btn-success">Nueva Meta</button></a>
-->
</div> <!-- box-body table-responsive -->
</section> <!-- Content -->

<!-- Source of DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
//entries, pagination and search bar
$(function () {
    $("#example1").DataTable();
  });
</script>