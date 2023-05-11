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
            <h3 class="box-title">Bitacora de Trituracion</h3>
        </div> <!-- box-header -->
    <a href="<?php echo base_url('admin/trituracion/bitacora_add');?>">
      <i class="fa fa-plus plus" aria-hidden="true"></i>
    </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
    
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered"> 
            <thead>
              <tr>
                <th>Fecha</th>
                <!-- <th>Turno</th> -->
                <th>Viajes</th>
                <th>Toneladas / Viajes</th>
                <th>Ton. Producidas</th>
                <!-- <th style="width:80px;">Razones (Paro)</th> -->
                <th>Bascula 1</th>
                <th>Bascula 2</th>
                <th>Bascula 3</th>
                <th>Editar</th>
              </tr> <!-- table-row -->
            </thead> <!-- header table -->
            <tbody>
            <?php foreach($all_trituracion_bitacora as $row): ?>
              <tr>
                <td class="expand-date"><?php echo $row['fecha'] ?></td>
                <!-- <td><?php //echo $row['turno'] ?></td> -->
                <td><?php echo $row['numero_viajes'] ?></td>
                <td><?php echo $row['toneladas_viajes'] ?></td>
                <td><?php echo $row['total_toneladas_producidas'] ?></td>
                <!-- <td><?php //echo $row['descripcion'] ?></td> -->
                <td><?php echo $row['toneladas_bascula1'] . " tons. de " . $row['material1'] ?></td>
                <td><?php echo $row['toneladas_bascula2'] . " tons. de " . $row['material2'] ?></td>
                <td><?php echo $row['toneladas_bascula3'] . " tons. de " . $row['material3'] ?></td>
                <td><a href="<?php echo base_url('admin/trituracion/bitacora_edit/'.$row['id']);?>"><button class="btn btn-info edit-btn">Editar</button></a></td>
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