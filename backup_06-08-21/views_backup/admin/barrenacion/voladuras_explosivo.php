<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Barrenos registrados de voladura #<?= $voladura_explosivo_by_id['id'] ?></h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Fecha</th>
                        <th>Zona</th>
                        <th>Barrenador</th>
                        <th>Metros Perforados</th>
                        <th>ID Barreno</th>
                        <th>Toneladas Tumbe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barreno_voladura_by_id as $historic) : ?>
                        <tr>
                            <!-- <td><?//= $historic['id_voladura']; ?></td>-->
                            <td><?= $historic['fecha']; ?></td>
                            <td><?= $historic['id_zona']; ?></td>
                            <td><?= $historic['empleado_id']; ?></td>
                            <td><?= $historic['metros_perf']; ?></td>
                            <td><?= intval($historic['bar_perf']); ?></td>
                            <td><?= $historic['tons_tumbe']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Explosivos</h3>
        </div>
        <div class="box-body">
            <?= form_open(base_url('admin/barrenacion/add_explosivos_voladura/'.$voladura_explosivo_by_id['id']), "class='form-horizontal'"); ?>

            <input type="hidden" class="form-control" name="id_voladura" value="<?= $voladura_explosivo_by_id['id'] ?>">

            <div class="form-group">
                <!-- 
                <label for="" class="col-md-1 control-label">Fecha</label>
                <div class="col-md-3">
                    <input type="input" name="fecha" class="form-control daterange" autocomplete="off">
                </div>
                -->

                <label for="" class="col-md-1 control-label">Agente Explosivo</label>
                <div class="col-md-2">
                    <!-- SUMA total de barrenos -->
                    <input type="hidden" value=" <?= $total_barrenos['barreno']?>">
                    <input type="hidden" value=" <?= $total_barrenos['metros_perf']?>">
                    <input type="number" step="any" min="0" name="agente_explosivo" id="agente_explosivo" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Kg</span>

                <label for="" class="col-md-1 control-label">Alto Explosivo</label>
                <div class="col-md-2">
                    <input type="number" step="any" min="0" name="alto_explosivo" id="alto_explosivo" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Kg</span>
            </div>

            <div class="form-group">
                <label for="" class="col-md-1 control-label">Conductor Mecha</label>
                <div class="col-md-2">
                    <input type="number" step="any" min="0" name="conductor_mecha" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Mts</span>

                <label for="" class="col-md-1 control-label">Cordon Detonante</label>
                <div class="col-md-2">
                    <input type="number" step="any" min="0" name="cordon_detonante" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Mts</span>

                <label for="" class="col-md-1 control-label">Fulminante</label>
                <div class="col-md-2">
                    <input type="number" min="0" name="fulminante" id="fulminante" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Pza</span>
            </div>

            <div class="form-group">
                <label for="" class="col-md-1 control-label">Nonel 1</label>
                <div class="col-md-2">
                    <input type="number" min="0" name="nonel_1" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Pza</span>

                <label for="" class="col-md-1 control-label">Nonel 2</label>
                <div class="col-md-2">
                    <input type="number" min="0" name="nonel_2" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Pza</span>

                <label for="" class="col-md-1 control-label">Nonel 3</label>
                <div class="col-md-2">
                    <input type="number" min="0" name="nonel_3" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Pza</span>
            </div>

            <div class="form-group">
                <!-- <div class="col-md-1"></div>-->
                <label for="" class="col-md-1 control-label">Retardador</label>
                <div class="col-md-2">
                    <input type="number" min="0" name="retardador" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Pza</span>

                <label for="" class="col-md-1 control-label">Lead line</label>
                <div class="col-md-2">
                    <input type="number" min="0" name="lead_line" id="lead_line" class="form-control">
                </div>
                <span class="col-md-1" style="margin-left:-25px;margin-top:15px;">Mts</span>
                <!-- <input type="submit" class="btn btn-info" name="submit" value="Guardar"> -->
            </div>
            <div class="form-group">
                <div class="col-md-10"></div>
                <div class="col-md-1">
                    <input type="submit" class="btn btn-info" style="margin-left:60px;" name="submit" value="Guardar">
                </div>
            </div>
            <?= form_close(); ?>
        </div> <!-- box-body -->
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

    function getAnfo(){
        totalbarreno = "<?php echo $total_barrenos['barreno']; ?>";
        totalMetros = "<?php echo $total_barrenos['metros_perf']; ?>";
        cantidadBarrXtres = totalbarreno*3;
        operacionUno =  totalMetros - cantidadBarrXtres;
        operacionFinal = operacionUno * 5.5;
        //console.log(operacionFinal)
        agente = document.getElementById('agente_explosivo').value;
        agente = operacionFinal;
        //console.log(agente)
        return agente;
        //return operacionFinal;
    }

    $('#agente_explosivo').val(getAnfo());
    $('#agente_explosivo').attr('readonly', true);


    function getBooster(){
            totalBarreno = "<?= $total_barrenos['barreno']; ?>";
            operacionUno = totalBarreno*1;
            resultado = operacionUno*0.340;
            //console.log(resultado)
            return resultado;
        }

        $('#alto_explosivo').val(getBooster());
        $('#alto_explosivo').attr('readonly', true);

    function getFulminante(){
        fulminante = document.getElementById('fulminante').value
        fulminante = 2
        return fulminante
    }

    $('#fulminante').val(getFulminante());
    $('#fulminante').attr('readonly', true);

    function getLeadLine(){
        leadLine = document.getElementById('lead_line').value
        leadLine = 150;
        resultado = leadLine*1
        return resultado
        //console.log(resultado)
    }

    $('#lead_line').val(getLeadLine());
    $('#lead_line').attr('readonly', true)


</script> 