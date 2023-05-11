 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<style>
.plus {
  margin-left: 10px;
  font-size: 18px;
  color: #73C6B6;
}
</style>

 <section class="content">
     <div class="box">
         <div class="box-header with-border">
             <h3 class="box-title">Movimientos Almacen</h3>
         </div>

         <a href="<?= base_url('admin/inventario/entradas');?>"><i class="fa fa-plus plus" aria-hidden="true"></i></a>&nbsp&nbsp<label for="" class="">Nueva Entrada</label>
         <a href="<?= base_url('admin/inventario/salidas');?>"><i class="fa fa-plus plus" aria-hidden="true"></i></a>&nbsp&nbsp<label for="" class="">Nueva Salida</label>
         <div class="box-body table-responsive">
             <table class="table table-bordered table-striped" id="example1">
                 <thead>
                     <tr>
                         <th>Producto</th>
                         <th>Almacen</th>
                         <th>Unidades</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach($movimientos as $movimiento): ?>
                     <tr>
                         <td><?= $movimiento['producto_id']?></td>
                         <td><?= $movimiento['almacen_id']?></td>
                         <td><?= $movimiento['inventario']?></td>
                     </tr>
                     <?php endforeach ?>
                 </tbody>
             </table>
         </div>
     </div>
 </section>



 <!-- DataTables -->
 <script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
 <script>
     $(function() {
         $("#example1").DataTable();
     });
 </script>