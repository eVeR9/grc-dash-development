<style>
.big-col {
  width: 100px !important;
}

.table-mytable {
  table-layout:fixed;
}

/*borrar pie de pagina Reoca Derechos rsv */
.main-footer {
  display:none;
}
</style>
<style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
	
	.red {
  background-color: #F9E79F !important;
}

.green {
  background-color: #2ECC71 !important;
  color: #fff;
}
.plus {
  margin-left: 10px;
  font-size: 18px;
  color: #73C6B6;
}
        </style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Voladura</h3>
                </div>
                <div class="box-body">
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                          <?= validation_errors();?>
                          <?= isset($msg)? $msg: ''; ?>
                    </div>
                <?php endif; ?>
                <?php echo form_open(base_url('admin/barrenacion/voladuras_add'), "class='form-horizontal'"); ?>
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Registra una Voladura</h3>
                        </div>
                        <label for="" class="col-md-1 control-label">Rango</label>
                        <div class="col-md-3">
                            <input type="date" name="date1" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="date2" class="form-control">
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Zona</label>
                        <div class="col-md-6">
                            <input type="number" value="<?php //echo $rango_voladuras['zona']?>" class="form-control">
                        </div> 
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Operador</label>
                        <div class="col-md-6">
                            <select name="empleado_id" id="" class="form-control">
                                <option value="<?= $rango_voladuras['empleado_id']?>">Operador</option>
                            </select>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                    <label for="" class="col-md-1 control-label">Metros Perforados</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" value="<?= $rango_voladuras['metros_perf']?>" placeholder="Total de metros en el periodo">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="" class="col-md-1 control-label">Cantidad Barrenos</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" placeholder="Barrenos usados en el periodo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Total Tumbe</label>
                        <div class="col-md-6">
                            <input type="number" value="<?= $rango_voladuras['tons_tumbe']?>" readonly class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-info" value="Guardar">
                        </div>
                    </div>
                <?php echo form_close(); ?>
                </div> <!-- box-body -->
            </div>
        </div>
    </div>
</section>

<section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de voladuras</h3>
    </div>
    <!-- /.box-header -->
    <!-- <button class="btn plus">+</button> -->
    <?php $depto = strtoupper($this->session->userdata("departamento")); ?>
    <?php if ($depto == "MINA" || $depto == "TI"): ?>
    <a href="<?= base_url('admin/remisiones/add');?>"><i class="fa fa-plus plus" aria-hidden="true"></i></a>&nbsp&nbsp<label for="" class="">Nueva Voladura</label>
    <?php endif;?>
    <div class="box-body table-responsive">
      <table id="mytable" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr>
          <th width="140px">zona</th>
          <th width="90px">operador</th>
          <th width="90px">metros</th>
          <th width="200px">barrenos</th>
          <th width="100px">tumbe</th>
          <!--
          <th width="90px">Tons. Embr.</th>
          <th width="80px">Estatus</th>
          <th width="90px">Imprimir</th>
          <th width="70px">Editar</th>
          <th width="60px">Ver</th>
          -->
        </tr>
        </thead>
        <tbody>
        <?php foreach($rango_voladuras as $row):?>
          <tr>
            <td><?= $row['zona'];?></td>
            <td><?= $row['empleado_id'];?></td>
            <td><?= $row['metros_perf'];?></td>
            <td><?= $row['bar_perf'];?></td>
            <td><?= $row['tons_tumbe'];?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
 </section> 