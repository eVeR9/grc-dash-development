 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de Usuarios del Sistema</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Email</th>
          <!--<th>Acciones Tipo Usuario</th>-->
          <th style="width: 150px;" class="text-right">Acciones Usuarios</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_users as $row): ?>
          <tr>
            <td><?= $row['nombre']; ?></td>
            <td><?= $row['apellidos']; ?></td>
            <td><?= $row['email']; ?></td>
            <!--<td><span class="btn btn-primary btn-flat btn-xs"><?//= ($row['es_admin'] == 1)? 'admin': 'usuario'; ?><span></td>-->
            <!--<td>
            <? /*php switch ($row['tipo_usuario']) {
			  case 1: 
				if(is_null($row['id_empleado'])){ ?>
					<a href="<?= base_url('admin/empleados/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Crear Empleado</a>
                <? } else { ?>
					<a href="<?= base_url('admin/empleados/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Editar Empleado</a>
				<? } break; ?>
                
			<? case 2: echo "Cliente"; break; 
			case 3: echo "Proveedor"; break; }
			*/?>
            </td>
            -->
            <td class="text-right">
            <a href="<?= base_url('admin/users/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Editar</a>
            <?php if(($row['activo'] == 1)){ ?>
            <a href="<?= base_url('admin/users/inactive/'.$row['id']); ?>" class="btn btn-danger btn-flat enabled">Desactivar</a>
            <?php } else { ?>
            <a href="<?= base_url('admin/users/active/'.$row['id']); ?>" class="btn btn-danger btn-flat enabled">Activar</a>
            <?php } ?>
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
$("#view_users").addClass('active');
</script>        
