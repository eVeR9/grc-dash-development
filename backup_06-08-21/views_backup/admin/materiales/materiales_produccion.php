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
      <h3 class="box-title">Materiales de Produccion</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th style="width: 100px;" class="text-center">Estatus</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($materiales_prod as $mat_prod):?>
        <tr>
            <th><?= $mat_prod['id']?></th>
            <td><?= $mat_prod['nombre']?></td>
            <td><?= $mat_prod['estatus']?></td>
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


