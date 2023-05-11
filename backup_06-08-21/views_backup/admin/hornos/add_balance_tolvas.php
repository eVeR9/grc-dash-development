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
                        </div>

                        <label for="" class="col-sm-1 control-label">Hornero</label>
                        <div class="col-sm-5">
                            <select name="hornero_en_turno" id="hornero_en_turno" class="form-control">
                                <option value="">Seleccione Operador</option>
                                <?php foreach ($empleados as $empleado) : ?>
                                    <option value="<?= $empleado['id'] ?>"><?= $empleado['nombreCompleto'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inventario_inicial" class="col-sm-1 control-label">Inventario Inicial</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="inventario_inicial" id="inventario_inicial" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Skips</h3>
                        </div>

                        <label for="cantidad_skips_h1" class="col-sm-1 control-label">Skips H-1</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="cantidad_skips_h1" id="cantidad_skips_h1" class="form-control">
                        </div>

                        <label for="cantidad_skips_h2" class="col-sm-1 control-label">Skips H-2</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" min="0" name="cantidad_skips_h2" id="cantidad_skips_h2" class="form-control">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Previa</h3>
                        </div>

                        <label for="previa_h1" class="col-sm-1 control-label">Previa H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_h1" id="previa_h1" class="form-control">
                        </div>

                        <label for="previa_h2" class="col-sm-1 control-label">Previa H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_h2" id="previa_h2" class="form-control">
                        </div>

                        <label for="previa_h3" class="col-sm-1 control-label">Previa H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_h3" id="previa_h3" class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="suma_previa" class="col-sm-1 control-label">Suma Previa</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="suma_previa" id="suma_previa" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Embarques</h3>
                        </div>

                        <label for="cal_embarques" class="col-sm-1 control-label">Cal Embarques</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_embarques" id="cal_embarques" class="form-control">
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
                            <input type="number" step="any" min="0" name="finos_h1" id="finos_h1" class="form-control finos_h1">
                            <!-- <input type="text" step="any" min="0" name="finos_h1_hide" id="finos_h1_hide" class="form-control finos_h1_hide">-->
                        </div>

                        <label for="finos_h2" class="col-sm-1 control-label">Finos H-2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_h2" id="finos_h2" class="form-control">
                            <!-- <input type="text" step="any" min="0" name="finos_h2_hide" id="finos_h2_hide" class="form-control">-->
                        </div>

                        <label for="finos_h3" class="col-sm-1 control-label">Finos H-3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="finos_h3" id="finos_h3" class="form-control">
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
                            <input type="number" step="any" min="0" name="calcita" id="calcita" class="form-control">
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cal Cruda</h3>
                        </div>

                        <label for="cal_cruda_h1" class="col-sm-1 control-label">Cal Cruda H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_cruda_h1" id="cal_cruda_h1" class="form-control txtCal">
                        </div>

                        <label for="cal_cruda_h2" class="col-sm-1 control-label">Cal Cruda H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_cruda_h2" id="cal_cruda_h2" class="form-control txtCal">
                        </div>

                        <label for="cal_cruda_h3" class="col-sm-1 control-label">Cal Cruda H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_cruda_h3" id="cal_cruda_h3" class="form-control txtCal">
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="desperdicio" class="col-sm-1 control-label">Desperdicio</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="desperdicio" id="desperdicio" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Existencias</h3>
                        </div>

                        <label for="existencia_teorica" class="col-sm-1 control-label">Exitencia Teorica</label>
                        <div class="col-sm-3">
                        <input type="number" step="any" min="0" name="existencia_teorica_final" id="existencia_teorica_final" class="form-control totCal">
                            <input type="hidden" step="any" min="0" name="existencia_teorica" id="existencia_teorica" class="form-control txtCal">
                        </div>

                        <label for="existencia_estimada" class="col-sm-1 control-label">Existencia Estimada</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="existencia_estimada" id="existencia_estimada" class="form-control">
                        </div>

                        <label for="diferencia" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_cruda_h3" id="cal_cruda_h3" class="form-control">
                        </div>


                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Previa 2</h3>
                        </div>

                        <label for="previa_2_h1" class="col-sm-1 control-label">Previa 2 H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_2_h1" id="previa_2_h1" class="form-control">
                        </div>

                        <label for="previa_2_h2" class="col-sm-1 control-label">Previa 2 H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_2_h2" id="previa_2_h2" class="form-control">
                        </div>

                        <label for="previa_2_h3" class="col-sm-1 control-label">Previa 2 H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="previa_2_h3" id="previa_2_h3" class="form-control">
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="diferencia_2_h3" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_2_h3" id="diferencia_2_h3" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cal Prod Final</h3>
                        </div>

                        <label for="cal_producida_final_h1" class="col-sm-1 control-label">Cal Prod Final H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h1" id="cal_producida_final_h1" class="form-control">
                        </div>

                        <label for="cal_producida_final_h2" class="col-sm-1 control-label">Cal Prod Final H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h2" id="cal_producida_final_h2" class="form-control">
                        </div>

                        <label for="cal_producida_final_h3" class="col-sm-1 control-label">Cal Prod Final H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h3" id="cal_producida_final_h3" class="form-control">
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="diferencia_2_h3" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_2_h3" id="diferencia_2_h3" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Finos Final</h3>
                        </div>

                        <label for="cal_producida_final_h1" class="col-sm-1 control-label">Finos Final H1</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h1" id="cal_producida_final_h1" class="form-control">
                        </div>

                        <label for="cal_producida_final_h2" class="col-sm-1 control-label">Finos Final H2</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h2" id="cal_producida_final_h2" class="form-control">
                        </div>

                        <label for="cal_producida_final_h3" class="col-sm-1 control-label">Finos Final H3</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="cal_producida_final_h3" id="cal_producida_final_h3" class="form-control">
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="calcita_final" class="col-sm-1 control-label">Calcita Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="calcita_final" id="calcita_final" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="diferencia_2_h3" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_2_h3" id="diferencia_2_h3" class="form-control">
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <label for="desperdicio_final" class="col-sm-1 control-label">Desperdicio Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="desperdicio_final" id="desperdicio_final" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Existencias Finales</h3>
                        </div>

                        <label for="existencia_teorica_final" class="col-sm-1 control-label">Existencia Teorica Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="existencia_teorica_final" id="existencia_teorica_final" class="form-control">
                        </div>

                        <label for="existencia_estimada_final" class="col-sm-1 control-label">Existencia Estimada Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="existencia_estimada_final" id="existencia_estimada_final" class="form-control">
                        </div>

                        <label for="diferencia_final" class="col-sm-1 control-label">Diferencia Final</label>
                        <div class="col-sm-3">
                            <input type="number" step="any" min="0" name="diferencia_final" id="diferencia_final" class="form-control">
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

        console.log('hello world')

        $('.datepick').datepicker({

            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true

        })

        let fecha;
        

        //if(fecha != ''){

            $('#fecha').on('change', function(){

                fecha = $('#fecha').val()

                $.ajax({
            
            url: "<?= base_url()?>admin/hornos/getValuesForBalanceTolvasController/"+fecha,
            type: "POST",
            data: {fecha:fecha},
            dataType: "json",
            error: function(){

                alert('Algo salio mal')
            },
            success: function(data){

                let previa_h1 = $('#previa_h1').val()
                let previa_h2 = $('#previa_h2').val()
                let previa_h3 = $('#previa_h3').val()
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
                $('#cal_embarques').val(data['cal_embarcada'])

                $('#existencia_estimada').attr('readonly', 'true')
                $('#existencia_estimada').val(data['inventario_tolvas'])

                $('#previa_h1').val(Number(data['total_skips_h1'])*Number(0.8))
                $('#previa_h1').attr('readonly', 'true')

                $('#previa_h2').val(Number(data['total_skips_h2'])*Number(1.18))
                $('#previa_h2').attr('readonly', 'true')

                $('#suma_previa').attr('readonly', 'true')
                $('#suma_previa').val(suma_previa)

                $('#porcentaje_finos').on('keyup', function(){

                    let finos_input = $('#finos_h1').val(previa_h1) 
                    let porcentaje_finos = $(this).val()
                    let finos_h1 = $(finos_input).val() * porcentaje_finos 
                    //si realizamos la operacoin con la variable finos_input nos arroja NaN, se requiere extraer el valor

                    //console.log($(finos_hide).val())
                    $('#finos_h1').attr('readonly', 'true')
                    $('#finos_h1').val(finos_h1.toFixed(2))

                    let finos_input_2 = $('#finos_h2').val(previa_h2)
                    let finos_h2 = $(finos_input_2).val() * porcentaje_finos

                    $('#finos_h2').attr('readonly', 'true')
                    $('#finos_h2').val(finos_h2.toFixed(2))

                    $('#existencia_teorica').attr('readonly','true')
                    $('#existencia_teorica').val(existencia_teorica - $('#finos_h1').val())

                })

                $('#porcentaje_calcita').on('keyup', function(){

                    let calcita = $(this).val()*suma_previa

                    $('#calcita').attr('readonly', 'true')
                    $('#calcita').val(calcita.toFixed(2))

                    $('#existencia_teorica').attr('readonly','true')
                    $('#existencia_teorica').val(existencia_teorica - $('#calcita').val())

                })

        
                let $calcita = $('#porcentaje_calcita').keyup(function(){

                    //console.log($(this).val())
                    return $(this).val()
                })

                let $finos = $('#porcentaje_finos').keyup(function(){

                    //console.log($(this).val())
                    return $(this).val()
                })
        
                
                let $finos1 = Number($('#finos_h1').val())
                let $finos2 = Number($('#finos_h2').val())        
/*
                let existencia_container = [$($calcita).val()*suma_previa, $($finos).val()*Number($('#finos_h1').val())]
                const totalSum = (accumulator, currentValue) => accumulator + currentValue

                console.log(existencia_container.reduce(totalSum))
                */

                const accumulate = arr => arr.map((sum => value => sum += value)(0));

                console.log(accumulate([$finos1, $finos2]))

                /*
                $('#existencia_teorica').on('click', function(){

                    operacion = (existencia_teorica_calculo) - (cal_embarques + Number($('#finos_h1').val()) + Number($('#finos_h2').val()) + Number($('#calcita').val()) + Number($('#cal_cruda_h1').val()) + Number($('#cal_cruda_h2').val()) + Number($('#cal_cruda_h3').val()) + Number($('#desperdicio').val()))

                    result = $('#existencia_teorica').val(operacion.toFixed(2))
                    return result

                })
                
                */

                let arr = document.getElementsByClassName('txtCal');

                function findTotal() {
                    let tot = 0;
                    for (let i = 0; i < arr.length; i++) {

                            tot += Number(arr[i].value);
                    }
                    document.getElementsByClassName('totCal')[0].value = tot;
                }

                for (let i = 0; i < arr.length; i++) {
                    arr[i].addEventListener('keyup', findTotal);
                }

                $('#cal_cruda_h1').keyup(function(){

                    let calCruda = $(this).val()
                        resultado = Number(calCruda)*-1
                        console.log(resultado)
                            return resultado

                })



 

                /*
                $('#finos_h1').val(Number(previa_h1) * porcentaje_finos)
                $('#finos_h1').attr('readonly', 'true')

                $('#finos_h2').val(previa_h2)
                $('#finos_h2').attr('readonly', 'true')
                */

            }
        })

    })
        //}

        
})

</script>