<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<style>
.edit-btn{
    margin-left: 5px;
}

.expand-date{
  width: 75px;
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
            <h3 class="box-title">Programacion de Trituracion</h3>
        </div> <!-- box-header -->
    <a href="<?php echo base_url('admin/trituracion/programacion_add');?>">
      <i class="fa fa-plus plus" aria-hidden="true"></i>
    </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
    
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered"> 
            <thead>
              <tr>
                <th>Fecha</th>
                <!--<th>Turno</th> -->
                <th>Toneladas</th>
                <th>Horas</th>
                <th>Conceptos</th>
                <th>Observaciones</th>
                <th>Editar</th>
              </tr> <!-- table-row -->
            </thead> <!-- header table -->
            <tbody>
            <?php foreach($all_trituracion_programacion as $row): ?>
              <tr>
                <td class="expand-date"><?php echo $row['fecha'] ?></td>
                <!-- <td>Turno</td> -->
                <td><?php echo $row['toneladas'] ?></td>
                <td><?php echo $row['horas'] ?></td>
                <td><?php echo $row['descripcion'] ?></td>
                <td><?php echo $row['observaciones'] ?></td>
                <td><a href="<?php echo base_url('admin/trituracion/programacion_edit/'.$row['id']);?>"><button class="btn btn-info edit-btn">Editar</button></a></td>
              </tr> <!-- table-row -->
            <?php endforeach; ?>
            </tbody> <!-- table-body -->
        </table>
        <?php $segments = array('admin', 'trituracion', 'bitacora_add'); ?>
        <!-- <a href="<?//= base_url('admin/barrenacion/add') ?>"><button class="btn btn-success">Capture</button></a> -->
    </div><!-- box-body table-responsive -->
    </div> <!-- box -->
</section> <!-- content -->

<!-- DataTables -->
<script src="<?php echo base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
//entries, pagination and search bar
$(function () {
    $("#example1").DataTable();
  });
</script>