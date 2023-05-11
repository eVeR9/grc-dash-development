<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>
.main-footer{
    display: none;
}

.align-div {
    margin-top: 4px;
}

.align-razones {
    display: none;
    margin-top: 20px;
}

</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box">   
                <div class="box-header with-border">
                    <h3 class="box-title">Bitacora de Trituracion</h3>
                </div>
                <!-- Errors front -->

                <div class="box-body">
                    <?= form_open(base_url('admin/trituracion/add'), 'class="form-horizontal"'); ?>
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Captura los datos</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-2">
                            <input type="text" name="fecha" class="form-control daterange">
                        </div>

                        <label for="" class="col-md-1 control-label">Viajes</label>
                        <div class="col-md-2">
                            <input type="number" name="viajes" class="form-control">
                        </div>

                        <label for="" class="col-md-1 control-label">Toneladas</label>
                        <div class="col-md-2">
                            <input type="number" step="any" name="toneladas_viajes" class="form-control">
                        </div>

                        <label for="" class="col-md-1 control-label">Toneladas- Producidas</label>
                        <div class="col-md-2">
                            <input type="number" step="any" name="total_tons_prod" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Paros</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Paro</label>

                        <div class="col-md-10 align-div">
                            Si&nbsp;&nbsp;<input type="radio" style="" name="paro" id="si" value="1">&nbsp;&nbsp;
                            No&nbsp;&nbsp;<input type="radio" style="" name="paro" id="no" value="0" checked>
                        
                            <div class="razones align-razones">
                                <select name="razon_id" id="" class="form-control" style="width:180px;">
                                    <option value="NA">Razones</option>
                                </select>
                            </div>
                        </div> <!-- father align div -->
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Produccion Toneladas</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 col-md-offset-3 bold">Materiales</label>
                        <label for="" class="col-md-2 col-md-offset-3 bold">Toneladas</label>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 1</label>

                        <div class="col-md-4">
                            <select name="mat_b1" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="tons_b1" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 2</label>

                        <div class="col-md-4">
                            <select name="mat_b2" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" step="any" name="tons_b2" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 3</label>

                        <div class="col-md-4">
                            <select name="mat_b3" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="tons_b3" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 4</label>

                        <div class="col-md-4">
                            <select name="mat_b4" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="tons_b4" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 5</label>

                        <div class="col-md-4">
                            <select name="mat_b5" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="tons_b5" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 6</label>

                        <div class="col-md-4">
                            <select name="mat_b6" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="tons_b6" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 7</label>

                        <div class="col-md-4">
                            <select name="mat_b7" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="tons_b7" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-2 control-label">Bascula 8</label>

                        <div class="col-md-4">
                            <select name="mat_b8" id="" class="form-control">
                                <option value="">Materiales</option>
                            </select>
                        </div>

                        <label for="" class="col-md-1 control-label"></label>
                        <div class="col-md-4">
                            <input type="number" step="any" name="tons_b8" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-md-1">
                            <input type="submit" class="btn btn-info" value="Guardar">
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div> <!-- End box-body -->

            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
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

  $('#si').on('click', function () {
        $('.razones').show('slow');
  });

  $('#no').on('click', function () {
        $('.razones').hide();
  });
</script>