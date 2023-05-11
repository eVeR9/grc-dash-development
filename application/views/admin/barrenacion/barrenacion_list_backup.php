<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<?php 
      $puesto = strtoupper($this->session->userdata('puesto'));

      $dev = $puesto == "DESARROLLADOR";
      $jefe_barrenacion = $puesto == "JEFE-BARRENACION";
?>


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
            <h3 class="box-title">Bitacora de Extraccion</h3>
        </div> <!-- box-header -->
    <a href="<?= base_url('admin/barrenacion/add');?>">
      <i class="fa fa-plus plus" aria-hidden="true"></i>
    </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
    
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered"> 
            <thead>
              <tr>
                <th>Fecha</th>
                <th style="width:200px;">Operador</th>
                <th>Maquina</th>
                <th>Ayudante</th>
                <th>Plantilla</th>
                <th>M Perforados</th>
                <th>Barrenos perf</th>
                <!-- <th>B por Volar</th> -->
                <th>Toneladas Tumbe</th>
                <th style="width:80px;">Razones (Paro)</th>
                <th style="width:20px;">Horas</th>
                <th>Zona</th>
                <th>Linea</th>
                <th >Editar</th>
              </tr> <!-- table-row -->
            </thead> <!-- header table -->
            <tbody>
            <?php foreach($all_barrenacion as $row): ?>
              <tr>
                <td class="expand-date"><?= $row['fecha'] ?></td>
                <td><?= $row['empleado_id'] ?></td>
                <td><?= $row['maquina_id'] ?></td>
                <td><?= $row['ayudante_id'] ?></td>
                <td><?= $row['plantilla'] ?></td>
                <td><?= $row['metros_perf'] ?></td>
                <td><?= $row['bar_perf'] ?></td>
                <!-- <td><?//= $row['bar_por_volar'] ?></td> -->
                <td><?= $row['tons_tumbe'] ?><?//= $row[''] ?></td>
                <td><?php if(!empty($row['razon_id'])){ echo $row['razon_id'];} else{ echo 'Sin Paro'; } ?></td>
                <td><?= $row['horas_paro']?></td>
                <td><?= $row['zona'] ?></td>
                <td><?= $row['linea'] ?></td>
                <?//= var_dump($row['id']) ?>
                <?php if($dev || $jefe_barrenacion):?>
                  <td><a href="<?php echo base_url('admin/barrenacion/edit/'.$row['id']);?>"><button class="btn btn-info edit-btn">Editar</button></a></td>
                <?php else: ?>
                  <td><a href="#"><button class="btn btn-info edit-btn">Editar</button></a></td>
                <?php endif; ?>
              </tr> <!-- table-row -->
            <?php endforeach; ?>
            </tbody> <!-- table-body -->
        </table>
        <?php $segments = array('admin', 'barrenacion', 'add'); ?>
        <!-- <a href="<?//= base_url('admin/barrenacion/add') ?>"><button class="btn btn-success">Capture</button></a> -->
    </div><!-- box-body table-responsive -->
    </div> <!-- box -->
</section> <!-- content -->

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
//entries, pagination and search bar
$(function () {
    $("#example1").DataTable();
  });
</script>