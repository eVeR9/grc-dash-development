<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>
    .main-footer {
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
            <h3 class="box-title">Voladura</h3>
        </div>
        
        <?php echo form_open(base_url('admin/barrenacion/voladura'), "class='form-horizontal'"); ?>
        <div class="form-group" style="margin-top:20px;">
            <label for="" class="col-md-1 control-label">Rango</label>
            <div class="col-md-3">
                <input type="text" name="date1" id="date1" class="daterange form-control" placeholder="Desde" autocomplete="off">
            </div>
            <div class="col-md-3">
                <input type="text" name="date2" id="date2" class="daterange form-control" placeholder="Hasta" autocomplete="off">
            </div>
            <label for="" class="col-md-1 control-label" style="margin-left:-30px;">Zona</label>
            <!-- 
            <select name="zona" id="">
                <option value="">Elegir Zona</option>
                <?php foreach($zonas as $zona): ?>
                    <option value="<?$zona['id']?>"><?= $zona['zona']?></option>
                <?php endforeach; ?>
            </select>
            -->
            
            <div class="col-md-2">
            <select name="id_zona" class="form-control">
                    <option value="" selected>--Elegir Zona--</option>
                    <?php
                    foreach ($zona as $row) {
                        echo '<option value="' . $row->id . '">' . $row->nombre . '</option>';
                    }
                    ?>


                </select>
            </div>
            
             <input type="submit" name="submit" class="btn btn-info" value="Buscar">
            <!-- <input type="submit" class="btn btn-info" value="Buscar"> -->
        </div> <!-- form-group -->
<!-- 
        <div class="form-group">
            
            <label for="" class="col-md-1 control-label" style="margin-left:5px;">Operador</label>
            <div class="col-md-3">
                <input type="text" class="form-control" name="key" id="key" placeholder="Perforista">
            </div>

            <label for="" class="col-md-1 control-label" style="margin-left:5px;">Zona</label>
            <div class="col-md-3">
                <input type="number" class="form-control" name="zona" id="zona" placeholder="zona">
            </div>
             <input type="submit" name="submit" class="btn btn-info" value="Buscar"> 
            
        </div>
-->
        <?php //echo form_close(); 
        ?>
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th class="center">Rango</th>
                        <th class="center">Zona</th>
                        <th class="center">Operador</th>
                        <th class="center">M Perforados</th>
                        <th class="center">ID Barreno</th>
                        <th class="center">Toneladas Tumbe</th>
                        <!-- <th>Prueba</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rangos as $rango) : ?>
                        <tr>
                            <td><?php echo $rango['fecha']; ?></td>
                            <?php /*
                                    $first_last_date = array(

                                        $rango['fecha'][0] .
                                        $rango['fecha'][1] .
                                        $rango['fecha'][2] .
                                        $rango['fecha'][3] .
                                        $rango['fecha'][4] .
                                        $rango['fecha'][5] .
                                        $rango['fecha'][6] .
                                        $rango['fecha'][7] .
                                        $rango['fecha'][8] .
                                        $rango['fecha'][9]
                                );
                            //var_dump($first_last_date);
                            foreach($first_last_date as $dates){
                                echo $dates . "</br>";
                            }     */
                            ?>
                            <td><?php echo $rango['id_zona']; ?></td>
                            <td><?php echo $rango['empleado_id']; ?></td>
                            <td><?php echo $rango['metros_perf']; ?></td>
                            <td><?php echo $rango['bar_perf']; ?></td>
                            <td><?php echo $rango['tons_tumbe']; ?></td>
                            <!-- <td><script></script></td> -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th>Total Metros</th>
                        <th>Total Barrenos</th>
                        <th>Total Tumbe</th>
                        <th>Metros / Barrenos</th>
                        <th>Guardar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($maxrango as $max) : ?>
                        <tr>
                            <th><?php echo $max->metros_perf; ?></th>
                            <input type="hidden" name="total_metros_perf" value="<?= $max->metros_perf;?>">

                            <th><?php echo $max->barreno; ?></th>
                            <input type="hidden" name="cantidad_barrenos" value="<?= $max->barreno; ?>">

                            <th><?php echo $max->tons_tumbe; ?></th>
                            <input type="hidden" name="total_toneladas_tumbe" value="<?php echo $max->tons_tumbe; ?>">
                            

                            <th><?= ceil($max->resultado); ?></th>
                            <input type="hidden" name="metros_entre_barrenos" value="<?= ceil($max->resultado); ?>">
                            <input type="hidden" name="fecha_inicial" id="fecha_inicial" value="<?php if($_POST){ echo $_POST['date1']; }?>">
                            <input type="hidden" name="fecha_final" id="fecha_final" value="<?php if($_POST){ echo $_POST['date2']; } ?>">
                            <input type="hidden" name="fecha" value="<?php echo date('Y-m-d')?>">

                            <th><input type="submit" name="voladura" value="Guardar" class="btn btn-flat btn-info"></th>
                            <?php echo form_close(); ?>
                            <!-- End forms -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
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
    $(document).ready(function() {
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
        $(function() {
            $("#example1").DataTable();
        });

    });

    function getDateOne(){
        let dateOne = $('#fecha_inicial').val($('#date1').val());
        return dateOne;
    }

    function getDateTwo(){
        let dateTwo = $('#fecha_final').val($('#date2').val());
        return dateTwo;
    }

    
    
    //console.log(fechaUno);

</script>   