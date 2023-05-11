<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Captura de Paros</h1>
                </div>

                <div class="box-body">

                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h3><i class="icon fa fa-warning"></i> Alerta!</h3>
                            <h4>Faltan campos por llenar:</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/hornos/add_paros'), 'class="form-horizontal"') ?>

                    <div class="form-group">

                        <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-3">
                            <input type="text" name="fecha" id="fecha" class="form-control datepick" autocomplete="off">
                        </div>

                        <label for="tiempo" class="col-sm-1 control-label">Tiempo</label>
                        <div class="col-sm-2">
                            <input type="number" min="0" step="0.01" name="tiempo" id="tiempo" class="form-control tiempo" autocomplete="off">
                        </div>

                        <label for="horno_id" class="col-sm-1 control-label">Horno</label>
                        <div class="col-sm-4">
                            <select name="horno_id" id="horno_id" class="form-control select-hornos">
                                <option value="">Seleccione Horno</option>
                                <option value="1">Horno 1</option>
                                <option value="2">Horno 2</option>
                                <option value="3">Horno 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="motivo_paro_id" class="col-sm-1 control-label">Motivos de Paro</label>
                        <div class="col-sm-5">
                            <select name="motivo_paro_id" id="motivo_paro_id" class="form-control">
                                <option value="">Seleccione Motivo</option>
                                <?php foreach ($motivos as $motivo) : ?>
                                    <option value="<?= $motivo['id'] ?>"><?= $motivo['motivo'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <label for="equipo_paro_id" class="col-sm-1 control-label">Equipo</label>
                        <div class="col-sm-5">
                            <select name="equipo_paro_id" id="equipo_paro_id" class="form-control select-hornos">
                                <option value="">Seleccione Equipo</option>
                                <?php foreach ($equipos as $equipo) : ?>
                                    <option value="<?= $equipo['id'] ?>"><?= $equipo['equipo'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    
                    <div class="form-group">

                        <!-- 
                        <label for="tiempo" class="col-sm-1 control-label">Tiempo</label>
                        <div class="col-sm-3">
                            <input type="text" name="tiempo" id="tiempo" class="form-control tiempo">
                        </div>
                        -->

                        <label for="hora_inicio" class="col-sm-1 control-label">Hora Inicio</label>
                        <div class="col-sm-3">
                            <input type="datetime-local" name="hora_inicio" id="hora_inicio" class="form-control">
                        </div>

                        <label for="hora_final" class="col-sm-1 control-label">Hora Final</label>
                        <div class="col-sm-3">
                            <input type="datetime-local" name="hora_final" id="hora_final" class="form-control">
                        </div>
                    </div>
                

                    <div class="form-group">

                        <label for="comentarios" class="col-sm-1 control-label">Comentarios</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="comentarios" style="overflow:auto;resize:none" name="" id="" cols="" rows=""></textarea>
                        </div>

                        <label for="atribuido_a" class="col-sm-1 control-label">Atribuible a:</label>
                        <div class="col-sm-3">
                            <input type="text" name="atribuido_a" id="atribuido_a" class="form-control">
                        </div>

                    </div>

                    <!-- body-h3 -->
                    <br>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="pull-right">
                                <!-- <input type="button" class="btn btn-success" name="calcular" id="calcular" value="Calcular"> -->
                                <input type="submit" class="btn btn-info" name="submit" id="submit" value="Guardar">
                            </div>
                        </div>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function() {

        $('.datepick').datepicker({

            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true

        })

    })
</script>

<script>
    //let end = new Date(document.getElementById('hora_final'))
    //let start = new Date(document.getElementById('hora_inicio'))

    function diferencia(end, start) {

        let diferenciaEnSegundos = Math.abs(end - start) / 1000

        let days = Math.floor(diferenciaEnSegundos / 86400)
        diferenciaEnSegundos -= days * 86400
        console.log('Days: ' + days)

        let hours = Math.floor(diferenciaEnSegundos / 3600) % 24
        diferenciaEnSegundos -= hours * 3600
        console.log('Hours: ' + hours)

        let minutes = Math.floor(diferenciaEnSegundos / 60) % 60
        diferenciaEnSegundos -= minutes * 60
        console.log('Minutes: ' + minutes)

        console.log(diferenciaEnSegundos)

        let diference = ''
        //if (days > 0) {

            //diference += (days === 1) ? `${days} dia ` : `${days} dias `

        //}

        diference += hours + '.' + minutes

        //diference += (minutes === 1) ? `${hours} hora ` : `${hours} horas `;

        //diference += (minutes === 1) ? `${minutes} minuto ` : `${minutes} minutos`

        tiempo = document.getElementById('tiempo').value = diference

        return tiempo
    }

    /*
    document.getElementById('calcular').onclick = function() {

        diferencia(new Date(document.getElementById('hora_final').value), new Date(document.getElementById('hora_inicio').value))
        document.getElementById('tiempo').setAttribute('readonly', 'true');
    }
    */
</script>