 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  
<?php 
    $depto = strtoupper($this->session->userdata('departamento'));
    strtoupper($this->session->userdata('puesto'));
    strtoupper($this->session->userdata('es_admin'));

    if(isset($depto)) {
      echo $depto;
    } 
?>

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de Materiales</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Material</th>
          <th>Estatus</th>
          <th style="width: 100px;" class="text-center">Opcion</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_materiales as $row): ?>
          <tr>
            <td><?= $row['nombre_del_material']; ?></td>
            <td><?= $row['activo']; ?></td>
            <!--<td><span class="btn btn-primary btn-flat btn-xs"><?//= ($row['is_admin'] == 1)? 'admin': 'usuario'; ?><span></td>-->
            <?php if($depto == "TI" || $depto == "VENTAS") { ?>
            <td class="text-right"><a href="<?= base_url('admin/materiales/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Editar</a>
            <!--<a href="<?//= base_url('admin/clientes/del/'.$row['id']); ?>" class="btn btn-danger btn-flat <?//=($_SESSION['is_admin_login'])? 'enabled': 'disabled'?>"></a>-->
            <?php } else { ?>
            <td class="text-center"><a hidden href="#" class="btn btn-info btn-flat">Editar</a></td>
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
$("#view_materiales").addClass('active');
</script>        
