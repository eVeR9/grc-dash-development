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
      <h3 class="box-title">Lista de Puestos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Departamento</th>
          <th>Puesto</th>
          <th style="width: 150px;" class="text-right">Opcion</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_puestos as $row): ?>
          <tr>
            <td><?= $row['nombre_del_departamento']; ?></td>
            <td><?= $row['nombre_del_puesto']; ?></td>
            <!--<td><span class="btn btn-primary btn-flat btn-xs"><?//= ($row['is_admin'] == 1)? 'admin': 'usuario'; ?><span></td>-->
            <?php if($dev || $rh_depto):?>
              <td class="text-right"><a href="<?= base_url('admin/puestos/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Editar</a>
            <?php else: ?>
              <td class="text-right"><a href="#" class="btn btn-info btn-flat">Editar</a>
            <?php endif; ?>
            <!--<a href="<?//= base_url('admin/clientes/del/'.$row['id']); ?>" class="btn btn-danger btn-flat <?//=($_SESSION['is_admin_login'])? 'enabled': 'disabled'?>"></a>-->
            </td>
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
$("#view_puestos").addClass('active');
</script>        
