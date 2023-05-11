 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Metas de Ventas</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th style="width:60px;">Año</th>
          <th style="width:100px;">Mes</th>
          <th style="width:150px;">Cliente</th>
          <th style="width:100px;">Sucursal</th>
          <th style="width:100px;">Obra Cliente</th>
          <th style="width:100px;">Material</th>
          <th style="width:100px;">Toneladas</th>
          <th style="width:60px;">Dias</th>
          <th style="width:120px;">M. Diario</th>
          <th style="width:100px;">M. Semanal</th>
          
          
          <!--<th>Acciones Tipo Usuario</th>-->
          <th style="width: 150px;" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_me as $row): ?>
          <tr>
            <td><?= $row['id_anio']; ?></td>
            <td><?= $row['id_mes']; ?></td>
            <td><?= $row['razon_social']; ?></td>
            <td><?= $row['sucursal']; ?></td>
            <td><?= $row['obra_cliente']; ?></td>
            <td><?= $row['nombre_del_material']; ?></td>
            <td><?= $row['toneladas']; ?></td>
            <td><?= $row['dias_habiles']; ?></td>
            <td><?= $row['meta_diaria']; ?></td>
            <td><?= $row['meta_semanal']; ?></td>
            <td class="text-right">
            <a href="<?= base_url('admin/metas_embarques/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Editar</a>
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
