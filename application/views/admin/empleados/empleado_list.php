 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<?php 
      $puesto = strtoupper($this->session->userdata('puesto'));
      $depto = strtoupper($this->session->userdata('departamento'));

      $dev = $puesto == "DESARROLLADOR";
      $rh_depto = $depto == "RH";
?>

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de Colaboradores del Sistema</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Numero</th>
          <th>Estatus</th>
          <th>Area</th>
          <th>Depto</th>
          <th>Puesto</th>
          <th style="width: 150px;" class="text-right">Opcion</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_empleados as $row): ?>
          <?php 
          $trcolor = "style='background-color:grey'";
          if($row['id_empleado_estatus'] == 1 ) { $trcolor = "style='background-color:#FFFFFF'";} ?>
          <tr <?php echo $trcolor; ?>>
            <td> <img height="50px" src="../public/uploads/rh/empleados/fotografias/<?=$row['fotografia'];?>" alt=""></td>
            <td><?= $row['nombre']; ?></td>
            <td><?= $row['apellidos']; ?></td>
            <td><?= $row['numero_empleado']; ?></td>
            <td><?= $row['empleado_estatus']; ?></td>
            <td><?= $row['nombre_del_area']; ?></td>
            <td><?= $row['nombre_del_departamento']; ?></td>
            <td><?= $row['nombre_del_puesto']; ?></td>
            <td class="text-right"><a href="<?= base_url('admin/empleados/view/'.$row['id']); ?>" class="btn btn-info btn-flat">Ver</a>|
            <?php if($dev || $rh_depto):?>
            <a href="<?= base_url('admin/empleados/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Editar</a></td>
            <?php else: ?>
            <a href="#" class="btn btn-info btn-flat">Editar</a></td>
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
  $(function () {
    $("#example1").DataTable();
  });
</script> 
<script>
$("#view_users").addClass('active');
</script>