<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

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

<section class="content">
    <div class="box">
        <div class="box-header">
           <h3  class="box-title"> Bitacora de Zonas</h3>
        </div>
        <a href="<?= base_url('admin/barrenacion/add_zonas'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th style="display:none;"  >Id</th> 
                        <th>Nombre</th>
                        
                        

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_zonas as $row) : ?>
                        <tr>
                           <td style="display:none;"><?= $row['id']; ?></td> 
                            <td><?= $row['nombre']; ?></td>
                            
                            
                            <!--<td class="text-right"><a href="<?= base_url('admin/barrenacion/zonas_edit/' . $row['id']); ?>" class="btn btn-info btn-flat">Editar</a></td> -->

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