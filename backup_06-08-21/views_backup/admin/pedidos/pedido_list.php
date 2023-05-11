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
<style>
.big-col {
  width: 100px !important;
}

table#example1{
  table-layout:fixed;
}
</style>
 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de Pedidos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped " style="width:100%">
        <thead>
        <tr>
          <th style="width: 60px;">Fecha</th>
          <th style="width: 40px;">Pedido</th>
          <th style="width: 120px;">Vendedor</th>
          <th style="width: 230px;">Cliente</th>
          <th style="width: 120px;">Sucursal</th>
          <th style="width: 120px;">Obra Cliente</th>
          <th style="width: 80px;">Orden Compra</th>
          <th style="width: 120px;">Material</th>
          <th style="width: 60px;">Tons.</th>
          <th style="width: 60px;">Tons. Embr.</th>
          <th style="width: 60px;">Tons. Pend</th>
          <th style="width: 60px;">Estatus</th>
          <th style="width: 130px;" class="text-right">Opciones</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach($all_pedidos_complete as $row): ?>
          <tr>
            <td><?= $row['fecha_pedido']; ?></td>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nombre'] . " " .  $row['apellidos']?></td>
            <td><?= $row['razon_social']; ?></td>
            <td><?= $row['sucursal']; ?></td>
            <td><?= $row['obra_cliente']; ?></td>
            <td><?= $row['orden_de_compra']; ?></td>
            <td><?= $row['nombre_del_material']; ?></td>
            <td><?= $row['toneladas']; ?></td>
            <td><?= $row['toneladas_embarcadas']; ?></td>
            <td><?= $row['toneladas']-$row['toneladas_embarcadas']; ?></td>
            <td><?= $row['estatus_pedido']; ?></td>
            <td class="text-right">
            	<a href="<?= base_url('admin/pedidos/view/'.$row['id']); ?>" class="btn btn-info btn-flat" style="margin-right:1px; text-align:center;">Ver</a> 
              <?php if($depto == "TI" || $depto == "VENTAS") { ?>
              <a href="<?= base_url('admin/pedidos/edit/'.$row['id']); ?>" class="btn btn-info btn-flat" style="text-align:center;">Editar</a>
              <?php } else { ?>
                <a href="#" class="btn btn-info btn-flat">Editar</a>
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
  
  <!-- Modal -->
  <div class="modal fade" id="DescModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                 <h3 class="modal-title">Job Requirements & Description</h3>

            </div>
            <div class="modal-body">
                 <h5 class="text-center">Hello. Below is the descripton and/or requirements for hiring consideration.</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default " data-dismiss="modal">Apply!</button>
                <button type="button" class="btn btn-primary">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
  
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
/*
$(document).ready(function () {
    $('#example1').DataTable();

    
    $('#example1').on('click', 'tr', function () {
        var name = $('td', this).eq(1).text();
        $('#DescModal').modal("show");
    });
});
*/
</script>
<script>
$("#view_users").addClass('active');
</script>