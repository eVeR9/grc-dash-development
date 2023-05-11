

<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Captura Balance Tolvas</h3>
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

                    <?php echo form_open(base_url('admin/hornos/add_balance_tolvas'), 'class="form-horizontal"') ?>

                    <div class="form-group">
                        <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-5">
                            <input type="text" name="fecha" id="fecha" class="form-control datepick fecha_query" autocomplete="off">
                            <input type="hidden" name="fecha_real" class="form-control" value="<?= date('Y-'),date('m-'), date('d')+1 ?>">
                        </div>

                        <label for="inventario_inicial" class="col-sm-1 control-label">Inventario Inicial</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="inventario_inicial" id="inventario_inicial" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Skips</h3>
                        </div>

                        <label for="cantidad_skips_h1" class="col-sm-1 control-label">Skips H-1</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="cantidad_skips_h1" id="cantidad_skips_h1" class="form-control" readonly>
                        </div>

                        <label for="cantidad_skips_h2" class="col-sm-1 control-label">Skips H-2</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="cantidad_skips_h2" id="cantidad_skips_h2" class="form-control" readonly>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Previa</h3>
                        </div>

                        <label for="previa_h1" class="col-sm-1 control-label">Previa H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_h1" id="previa_h1" class="form-control" readonly>
                        </div>

                        <label for="previa_h2" class="col-sm-1 control-label">Previa H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_h2" id="previa_h2" class="form-control" readonly>
                        </div>

                        <label for="previa_h3" class="col-sm-1 control-label">Previa H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_h3" id="previa_h3" class="form-control" readonly>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="suma_previa" class="col-sm-1 control-label">Suma Previa</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="suma_previa" id="suma_previa" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Embarques</h3>
                        </div>

                        <label for="cal_embarques" class="col-sm-1 control-label">Cal Embarques</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_embarques" id="cal_embarques" class="form-control" readonly>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Finos</h3>
                        </div>


                        <label for="porcentaje_finos" class="col-sm-1 control-label">% Finos</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="porcentaje_finos" id="porcentaje_finos" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="finos_h1" class="col-sm-1 control-label">Finos H-1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_h1" id="finos_h1" data-action="sub" class="form-control txtCal calc" readonly>
                            <!-- <input type="text" step="any" min="0" name="finos_h1_hide" id="finos_h1_hide" class="form-control finos_h1_hide">-->
                        </div>

                        <label for="finos_h2" class="col-sm-1 control-label">Finos H-2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_h2" id="finos_h2" data-action="sub" class="form-control txtCal calc" readonly>
                            <!-- <input type="text" step="any" min="0" name="finos_h2_hide" id="finos_h2_hide" class="form-control">-->
                        </div>

                        <label for="finos_h3" class="col-sm-1 control-label">Finos H-3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_h3" id="finos_h3" data-action="sub" class="form-control txtCal calc" readonly>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Calcita</h3>
                        </div>

                        <label for="porcentaje_calcita" class="col-sm-1 control-label">% Calcita</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="porcentaje_calcita" id="porcentaje_calcita" class="form-control">
                        </div>

                        <label for="tons_calculadas" class="col-sm-1 control-label">Calcita</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="calcita" id="calcita" data-action="sub" class="form-control txtCal calc" readonly>
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cal Cruda</h3>
                        </div>

                        <label for="cal_cruda_h1" class="col-sm-1 control-label">Cal Cruda H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_cruda_h1" id="cal_cruda_h1" data-action="sub" class="form-control txtCal calc calc_final">
                        </div>

                        <label for="cal_cruda_h2" class="col-sm-1 control-label">Cal Cruda H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_cruda_h2" id="cal_cruda_h2" data-action="sub" class="form-control txtCal calc calc_final">
                        </div>

                        <label for="cal_cruda_h3" class="col-sm-1 control-label">Cal Cruda H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_cruda_h3" id="cal_cruda_h3" data-action="sub" class="form-control txtCal calc calc_final">
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="desperdicio" class="col-sm-1 control-label">Desperdicio</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="desperdicio" id="desperdicio" data-action="sub" class="form-control txtCal calc">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Existencias</h3>
                        </div>

                        <label for="existencia_teorica" class="col-sm-1 control-label">Exitencia Teorica</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="existencia_teorica_final" id="existencia_teorica_final" class="form-control totCal" readonly>
                            <input type="hidden" step="any" min="0" name="existencia_teorica" id="existencia_teorica" data-action="add" class="form-control txtCal calc">
                        </div>

                        <label for="existencia_estimada" class="col-sm-1 control-label">Existencia Estimada</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="existencia_estimada" id="existencia_estimada" class="form-control" readonly>
                            <input type="hidden" step="any" min="0" name="existencia_estimada_hidden" id="existencia_estimada_hidden" class="form-control" readonly>
                        </div>

                        <label for="diferencia" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia" id="diferencia" class="form-control" readonly>
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                    <label for="diferencia" class="col-sm-1 control-label">Patio</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="patio" id="patio" class="form-control">
                        </div>

                    </div>
                    -->

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Previa 2</h3>
                        </div>

                        <label for="previa_2_h1" class="col-sm-1 control-label">Previa 2 H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_2_h1" id="previa_2_h1" class="form-control" readonly>
                        </div>

                        <label for="3" class="col-sm-1 control-label">Previa 2 H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_2_h2" id="previa_2_h2" class="form-control" readonly>
                        </div>

                        <label for="previa_2_h3" class="col-sm-1 control-label">Previa 2 H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_2_h3" id="previa_2_h3" class="form-control" readonly>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="diferencia_2_h3" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_2_h3" id="diferencia_2_h3" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cal Prod Final</h3>
                        </div>

                        <label for="cal_producida_final_h1" class="col-sm-1 control-label">Cal Prod Final H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h1" id="cal_producida_final_h1" class="form-control" readonly>
                        </div>

                        <label for="cal_producida_final_h2" class="col-sm-1 control-label">Cal Prod Final H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h2" id="cal_producida_final_h2" class="form-control" readonly>
                        </div>

                        <label for="cal_producida_final_h3" class="col-sm-1 control-label">Cal Prod Final H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h3" id="cal_producida_final_h3" class="form-control" readonly>
                        </div>


                    </div>

                    <!--
                    <div class="form-group">
                        <label for="diferencia_2_h3" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_2" id="diferencia_2" class="form-control">
                        </div>
                    </div>
                    -->

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Finos Final</h3>
                        </div>

                        <label for="finos_final_h1" class="col-sm-1 control-label">Finos Final H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_final_h1" id="finos_final_h1" data-action="sub" class="form-control calc_final" readonly>
                        </div>

                        <label for="finos_final_h2" class="col-sm-1 control-label">Finos Final H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_final_h2" id="finos_final_h2" data-action="sub" class="form-control calc_final" readonly>
                        </div>

                        <label for="finos_final_h3" class="col-sm-1 control-label">Finos Final H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_final_h3" id="finos_final_h3" data-action="sub" class="form-control calc_final" readonly>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="calcita_final" class="col-sm-2 control-label">Calcita Final</label>
                        <div class="col-sm-4">
                            <input type="number" step="any" min="0" name="calcita_final" id="calcita_final" data-action="sub" class="form-control calc_final" readonly>
                        </div>

                        <label for="desperdicio_final" class="col-sm-2 control-label">Desperdicio Final</label>
                        <div class="col-sm-4">
                            <input type="number" step="any" min="0" name="desperdicio_final" id="desperdicio_final" data-action="sub" class="form-control calc_final">
                        </div>
                    </div>

                    <!-- 
                    <div class="form-group">
                        <label for="diferencia_2_h3" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_3" id="diferencia_3" class="form-control">
                        </div>
                    </div>
                    -->


                    <div class="form-group">

                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Existencias Finales</h3>
                        </div>

                        <label for="existencia_teorica_final" class="col-sm-1 control-label">Existencia Teorica Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="existencia_teorica_final_2" id="existencia_teorica_final_2" class="form-control" readonly>
                            <input type="hidden" step="any" min="0" name="existencia_teorica_final_hidden" id="existencia_teorica_final_hidden" data-action="add" class="form-control txtCal calc_final">
                        </div>

                        <!--
                        <label for="existencia_estimada_final" class="col-sm-1 control-label">Existencia Estimada Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="existencia_estimada_final" id="existencia_estimada_final" class="form-control">
                        </div>
                        -->
                        
                        <label for="diferencia_final" class="col-sm-1 control-label">Diferencia Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_final" id="diferencia_final" class="form-control" readonly>
                        </div>
                        

                    </div>

                    <div class="form-group botonGuardar">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-info pull-right" name="submit" id="submit" value="Guardar">
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

        let focus = [

            '#fecha', 
            '#porcentaje_finos',
            '#porcentaje_calcita',
            '#cal_cruda_h1',
            '#cal_cruda_h2',
            '#cal_cruda_h3',
            '#desperdicio',
            '#desperdicio_final',
            //'#patio'

        ].join(',')

        //console.log(focus)

        $(focus).css({

            'border-color': 'red',
            'border-width': '3px'
        })


        let fecha;
        //if(fecha != ''){

        $('#fecha').on('change', function() {

            fecha = $('#fecha').val()

            $.ajax({

                url: "<?= base_url() ?>admin/hornos/getValuesForBalanceTolvasController/" + fecha,
                type: "POST",
                data: {
                    fecha: fecha
                },
                dataType: "json",
                error: function() {

                    alert('Algo salio mal')
                },
                success: function(data) {

                    let previa_h1 = Number($('#previa_h1').val())
                    let previa_h2 = Number($('#previa_h2').val())
                    let previa_h3 = Number($('#previa_h3').val())
                    let cal_embarques = $('#cal_embarques').val()
                    //let porcentaje_finos = $('#porcentaje_finos').val()
                    let suma_previa = Number(previa_h1) + Number(previa_h2) + Number(previa_h3)
                    let inventario_inicial = Number($('#inventario_inicial').val())
                    let existencia_teorica = (inventario_inicial + suma_previa) - (cal_embarques)

                    $('#cantidad_skips_h1').attr('readonly', 'true')
                    $('#cantidad_skips_h1').val(data['total_skips_h1'])

                    $('#cantidad_skips_h2').attr('readonly', 'true')
                    $('#cantidad_skips_h2').val(data['total_skips_h2'])

                    $('#inventario_inicial').attr('readonly', 'true')
                    $('#inventario_inicial').val(data['existencia_teorica_final'])

                    $('#cal_embarques').attr('readonly', 'true')
                    $('#cal_embarques').val((Number(data['cal_embarcada'])).toFixed(2))

                    $('#existencia_estimada').attr('readonly', 'true')
                    $('#existencia_estimada').val(Number(data['inventario_tolvas']))

                    /*$('#patio').keyup(function() {

                        let patios = Number($('#existencia_estimada_hidden').val()) + Number($(this).val())

                        $('#existencia_estimada').val(patios)
                    })*/

                    $('#previa_h1').val((Number(data['total_skips_h1']) * Number(0.8)).toFixed(2))
                    $('#previa_h1').attr('readonly', 'true')

                    $('#previa_h2').val((Number(data['total_skips_h2']) * Number(1.18)).toFixed(2))
                    $('#previa_h2').attr('readonly', 'true')

                    $('#previa_h3').val(Number(data['tons_prod_h3']))
                    //$('#previa_h3').attr('readonly', 'true')

                    $('#suma_previa').attr('readonly', 'true')
                    $('#suma_previa').val((Number(suma_previa)).toFixed(2))

                    $('#porcentaje_finos').on('keyup', function() {

                        //let finos_input = $('#finos_h1').val(previa_h1)
                        let porcentaje_finos = $(this).val()/100
                        let finos_h1 = previa_h1 * porcentaje_finos
                        //si realizamos la operacoin con la variable finos_input nos arroja NaN, se requiere extraer el valor

                        //console.log($(finos_hide).val())
                        $('#finos_h1').attr('readonly', 'true')
                        $('#finos_h1').val(finos_h1.toFixed(2))


                        //let finos_input_2 = $('#finos_h2').val(previa_h2)
                        //let finos_h2 = $(finos_input_2).val() * porcentaje_finos
                        let finos_h2 = previa_h2 * porcentaje_finos

                        $('#finos_h2').attr('readonly', 'true')
                        $('#finos_h2').val(finos_h2.toFixed(2))


                        let finos_input_3 = $('#finos_h3').val(previa_h3)
                        let finos_h3 = previa_h3 * porcentaje_finos

                        $('#finos_h3').attr('readonly', 'true')
                        $('#finos_h3').val(finos_h3.toFixed(2))

                    })

                    $('#porcentaje_calcita').on('keyup', function() {

                        let calcita = ($(this).val()/100) * suma_previa

                        $('#calcita').attr('readonly', 'true')
                        $('#calcita').val(calcita.toFixed(2))

                    })

                    $('#existencia_teorica').val(existencia_teorica)

                    /*
                    let arr = document.getElementsByClassName('txtCal');

                    function findTotal() {
                        let tot = 0;
                        for (let i = 0; i < arr.length; i++) {

                            //console.log(arr[i].value)
                                tot += Number(arr[i].value);
                        }

                        document.getElementsByClassName('totCal')[0].value = tot;
                    }

                    for (let i = 0; i < arr.length; i++) {
                        arr[i].addEventListener('keyup', findTotal);

                    }
                    */

                    $(document.body).on('keyup', '.calc', function() {
                        let result = 0
                        $('.calc').each(function() {
                            let $input = $(this),
                                value = parseFloat($input.val())

                            if (isNaN(value)) {
                                return
                            }

                            let action = $input.data('action') == 'add' ? 1 : -1

                            result += value * action
                        })

                        $('#existencia_teorica_final').val(result.toFixed(2))


                        //$('#diferencia').on('click', function() {

                        let valor_uno = Number($('#existencia_teorica_final').val())
                        let valor_dos = Number($('#existencia_estimada').val())

                        let diferencia_result = valor_uno - valor_dos

                        $('#diferencia').val(diferencia_result.toFixed(2))
                        $('#diferencia').attr('readonly', true)



                    //})

                        //$('#diferencia').on('change', function() {

                        let diferencia = $('#diferencia').val()
                        let operacion_previa_h1 = diferencia * (previa_h1 / suma_previa)
                        console.log(operacion_previa_h1)
                        let previa_2_h1 = previa_h1 - operacion_previa_h1

                        $('#previa_2_h1').val(previa_2_h1.toFixed(2))
                    //})


                        //$('#previa_2_h2').on('click', function() {

                        //let diferencia_ph2 = $('#diferencia').val()
                        let operacion_previa_h2 = diferencia * (previa_h2 / suma_previa)
                        let previa_2_h2 = previa_h2 - operacion_previa_h2

                        $('#previa_2_h2').val(previa_2_h2.toFixed(2))
                    //})

                        //$('#previa_2_h3').on('click', function() {

                        //let diferencia_ph3 = $('#diferencia').val()
                        let operacion_previa_h3 = diferencia * (previa_h3 / suma_previa)
                        let previa_2_h3 = previa_h3 - operacion_previa_h3

                        $('#previa_2_h3').val(previa_2_h3.toFixed(2))
                    //})


                        //$('#diferencia_2_h3').on('click', function(){

                        let previa_2_h3_val = Number($('#previa_2_h3').val())
                        let previa_h3_2_porciento = Number(previa_h3*1.02)
                        let previa_h3_punto_98_porciento = Number(previa_h3*0.98)
                        let result_diferencia_2

                        //let result_diferencia_2 = previa_2_h3 - (previa_2_h3 > previa_h3_2_porciento ? previa_h3_2_porciento : previa_2_h3 < previa_h3_punto_98_porciento ? previa_h3_punto_98_porciento : previa_2_h3)

                        //console.log('Soy el 2%: ' + previa_h3_2_porciento)
                        //console.log('Soy previa 3: ' + previa_h3)

                        if(previa_2_h3_val > previa_h3_2_porciento){

                            result_diferencia_2 = previa_2_h3_val - previa_h3_2_porciento

                            console.log('Case 1: ' + result_diferencia_2)
                            $('#diferencia_2_h3').val(result_diferencia_2.toFixed(2))
                            

                        } else if(previa_2_h3_val < previa_h3_punto_98_porciento){

                            result_diferencia_2 = previa_2_h3_val - previa_h3_punto_98_porciento

                            console.log('Case 2: ' + result_diferencia_2)
                            $('#diferencia_2_h3').val(result_diferencia_2.toFixed(2))

                        } else{

                            result_diferencia_2 = previa_2_h3_val - previa_2_h3_val

                            console.log('Case 3: ' + result_diferencia_2)
                            $('#diferencia_2_h3').val(result_diferencia_2.toFixed(2))
                            
                        }
                        //$('#diferencia_2_h3').val(result)
                    //})


                        //$('#cal_producida_final_h1').on('click', function(){

                        let diferencia_dos = Number($('#diferencia_2_h3').val())
                        let previa_2_h1_value = Number($('#previa_2_h1').val())
                        let factor_cal_prod_h1 = diferencia_dos * Number((previa_h1/suma_previa))
                        let cal_producida_final_h1_result = diferencia_dos != 0 ? previa_2_h1_value + factor_cal_prod_h1 : previa_2_h1_value

                        $('#cal_producida_final_h1').val(cal_producida_final_h1_result.toFixed(2))

                    //})


                        //$('#cal_producida_final_h2').on('click', function(){

                        //let diferencia_dos = Number($('#diferencia_2_h3').val())
                        let previa_2_h2_value = Number($('#previa_2_h2').val())
                        let factor_cal_prod_h2 = diferencia_dos * Number((previa_h2/suma_previa))
                        let cal_producida_final_h2_result = diferencia_dos != 0 ? previa_2_h2_value + factor_cal_prod_h2 : previa_2_h2_value

                        $('#cal_producida_final_h2').val(cal_producida_final_h2_result.toFixed(2))

                    //})


                        //$('#cal_producida_final_h3').on('click', function(){

                        //let diferencia_dos = Number($('#diferencia_2_h3').val())
                        let previa_2_h3_value = Number($('#previa_2_h3').val())
                        let diferencia_2_h3 = Number($('#diferencia_2_h3').val() *-1)
                        let cal_producida_final_h3_result = diferencia_dos != 0 ? previa_2_h3_value + diferencia_2_h3 : previa_2_h3_value

                        //let factor_cal_prod_h3 = diferencia_dos * Number((previa_h2/suma_previa))
                        //let cal_producida_final_h3_result = diferencia_dos != 0 ? previa_2_h3_value + factor_cal_prod_h3 : previa_2_h3_value

                        $('#cal_producida_final_h3').val(cal_producida_final_h3_result.toFixed(2))

                    //})

                        //$('#finos_final_h1').on('click', function(){

                        let porcentaje_finos = $('#porcentaje_finos').val()/100
                        let cal_producida_final_h1 = $('#cal_producida_final_h1').val() 
                        let finos_final_h1 = cal_producida_final_h1 * porcentaje_finos

                        $('#finos_final_h1').val(finos_final_h1.toFixed(2))
                        
                    //})


                        //$('#finos_final_h2').on('click', function(){

                        //let porcentaje_finos = $('#porcentaje_finos').val()
                        let cal_producida_final_h2 = $('#cal_producida_final_h2').val() 
                        let finos_final_h2 = cal_producida_final_h2 * porcentaje_finos

                        $('#finos_final_h2').val(finos_final_h2.toFixed(2))
                        
                    //})

                        //$('#finos_final_h3').on('click', function(){

                        //let porcentaje_finos = $('#porcentaje_finos').val()
                        let cal_producida_final_h3 = $('#cal_producida_final_h3').val() 
                        let finos_final_h3 = cal_producida_final_h3 * porcentaje_finos

                        $('#finos_final_h3').val(finos_final_h3.toFixed(2))
                        
                    //})


                        //$('#calcita_final').on('click', function(){

                        //let cal_producida_final_h1 = $('#cal_producida_final_h1').val()
                        //let cal_producida_final_h2 = $('#cal_producida_final_h2').val()
                        //let cal_producida_final_h3 = $('#cal_producida_final_h3').val()
                        let porcentaje_calcita = Number($('#porcentaje_calcita').val()/100)

                        let factor_calcita_final = Number(cal_producida_final_h1) + Number(cal_producida_final_h2) + Number(cal_producida_final_h3)
                        let calcita_final_result = factor_calcita_final * porcentaje_calcita


                        $('#calcita_final').val(calcita_final_result.toFixed(2))
                    //})


                    let suma_final = Number(cal_producida_final_h1) + Number(cal_producida_final_h2) + Number(cal_producida_final_h3)
                    let existencia_teorica_final = (inventario_inicial + suma_final) - cal_embarques

                    $('#existencia_teorica_final_hidden').val(existencia_teorica_final)

                    })


                    //let cal_producida_final_h1 = $('#cal_producida_final_h1').val()
                    //let cal_producida_final_h2 = $('#cal_producida_final_h2').val()
                    //let cal_producida_final_h3 = $('#cal_producida_final_h3').val()

                    $(document.body).on('keyup', '.calc_final', function(){

                        let result = 0

                        $('.calc_final').each(function(){
                            let $input = $(this),
                            value = parseFloat($input.val())

                            if(isNaN(value)){

                                return
                            }

                            let action = $input.data('action') == "add" ? 1 : -1
                            result += value * action
                            
                        })

                        $('#existencia_teorica_final_2').val(result.toFixed(2))

                        //$('#diferencia_final').on('click', function(){

                        let valor_uno = Number($('#existencia_teorica_final_2').val())
                        let valor_dos = Number($('#existencia_estimada').val())

                        let diferencia_final_result = valor_uno - valor_dos

                        $('#diferencia_final').val(diferencia_final_result.toFixed(2))
                    //})
                    })

                }
            })

        })
        //}


    })
</script>