<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>
.main-footer{
    display: none;
}

.center {
    text-align: center;
}

.plus {
  margin-left: 10px;
  font-size: 18px;
  color: #73C6B6;
}
</style>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Voladuras</h3>
        </div>
        <a href="<?= base_url('admin/barrenacion/voladuras_add');?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nueva Voladura</label>
        <?php echo form_open(base_url('admin/barrenacion/voladuras'), "class='form-horizontal'"); ?>
        <div class="form-group" style="margin-top:20px;">
            <label for="" class="col-md-1 control-label">Rango</label>
            <div class="col-md-3">
                <input type="text" name="date1" id="date1" class="daterange form-control" placeholder="Desde" autocomplete="off">
            </div>
                <div class="col-md-3">
                    <input type="text" name="date2" id="date2" class="daterange form-control" placeholder="Hasta" autocomplete="off">
                </div>
               <!-- <input type="submit" class="btn btn-info" value="Buscar"> -->
        </div> <!-- form-group -->

        <div class="form-group">
            <label for="" class="col-md-1 control-label" style="margin-left:5px;">Operador</label>
            <div class="col-md-3">
                <input type="search" class="form-control" name="key" id="key" placeholder="Perforista">
            </div>
            <div class="col-md-3">
                <input type="number" class="form-control" name="zona" id="zona" placeholder="zona">
            </div>
            <input type="submit" class="btn btn-info" value="Buscar">
        </div>

        <?php echo form_close(); ?>
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th class="center">Rango</th>
                        <th class="center">Zona</th>
                        <th class="center">Operador</th>
                        <th class="center">M Perforados</th>
                        <th class="center"># Barrenos</th>
                        <th class="center">Total Tumbe</th>
                        <!-- <th>Prueba</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach($rangos as $rango): ?>
                    <tr>
                        <td><?php echo $rango->fecha; ?></td>
                        <td><?php echo $rango->zona; ?></td>
                        <td><?php echo $rango->empleado_id; ?></td>
                        <td><?php echo $rango->metros_perf; ?></td>
                        <td><?php echo $rango->bar_perf; ?></td>
                        <td><?php echo $rango->tons_tumbe; ?></td>
                        <!-- <td><script></script></td> -->
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <!--
            <table class="table">
                <thead>
                    <tr>
                        <th>Total Metros</th>
                        <th>Total Barrenos</th>
                        <th>Total Tumbe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                    </tr>
                </tbody>
            </table>
            -->
            </table>
        </div>
    </div>
</section>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
//entries, pagination and search bar
$(document).ready(function(){
    $('.daterange').datepicker({
    "locale": {
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa",
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                ],
                "firstDay": 1

    }, //End locale Object

    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true

  });
$(function () {
    $("#example1").DataTable();
  });
  
});

</script>