<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Consumo de Gas por Hornos</h3>
                </div>
                <div class="box-body">
                    <?php echo form_open(base_url('admin/hornos/consumo_gas_hornos'), 'class="form-horizontal"')?>
                    
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Fecha</label>
                            <div class="col-sm-10">
                                <input type="date" name="fecha" id="fecha" class="form-control fecha">
                            </div>
                        <!-- 
                         <label for="" class="col-sm-2 control-label">Suma Cal Producida</label>
                            <div class="col-sm-3">
                                <input type="text" name="suma_cal_producida_final" id="suma_cal_producida_final" class="form-control">
                            </div>
                        -->
                    </div>

                    <div class="form-group">

                        <label for="" class="col-sm-2 control-label">m3 Totales</label>
                            <div class="col-sm-2">
                                <input type="text" name="m3_totales" id="m3_totales" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Mega Calorias Totales</label>
                            <div class="col-sm-2">
                                <input type="text" name="mega_calorias_totales" id="mega_calorias_totales" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Toneladas totales</label>
                            <div class="col-sm-2">
                                <input type="text" name="toneladas_totales" id="toneladas_totales" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">

                        <label for="" class="col-sm-2 control-label">GJ</label>
                            <div class="col-sm-2">
                                <input type="text" name="gj" id="gj" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">BTU</label>
                            <div class="col-sm-2">
                                <input type="text" name="btu" id="btu" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Factor m3 GJ</label>
                            <div class="col-sm-2">
                                <input type="text" name="factor_m3_GJ" id="factor_m3_GJ" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header">
                            <h3 class="box-title with-border">Horno 3</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Cal Producida</label>
                            <div class="col-sm-4">
                                <input type="text" name="cal_producida_final_h3" id="cal_producida_final_h3" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Horas Trabajadas</label>
                            <div class="col-sm-4">
                                <input type="text" name="horas_trabajadas_h3" id="horas_trabajadas_h3" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">m3</label>
                            <div class="col-sm-4">
                                <input type="text" name="m3_h3" id="m3_h3" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">m3 Real</label>
                            <div class="col-sm-4">
                                <input type="text" name="m3_real_h3" id="m3_real_h3" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">GJ</label>
                            <div class="col-sm-4">
                                <input type="text" name="gj_h3" id="gj_h3" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">BTU/TON</label>
                            <div class="col-sm-4">
                                <input type="text" name="btu_h3" id="btu_h3" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header">
                            <h3 class="box-title with-border">Horno 2</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Cal Producida</label>
                            <div class="col-sm-2">
                                <input type="text" name="cal_producida_final_h2" id="cal_producida_final_h2" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Horas Trabajadas</label>
                            <div class="col-sm-2">
                                <input type="text" name="horas_trabajadas_h2" id="horas_trabajadas_h2" class="form-control" value="">
                            </div>

                        <label for="" class="col-sm-1 control-label">Consumo H2 (m3)</label>
                            <div class="col-sm-3">
                                <input type="text" name="consumo_h2" id="consumo_h2" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Combustible Inf</label>
                            <div class="col-sm-4">
                                <input type="text" name="combustible_inferior_h2" id="combustible_inferior_h2" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Combustible Sup</label>
                            <div class="col-sm-4">
                                <input type="text" name="combustible_superior_h2" id="combustible_superior_h2" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">GJ</label>
                            <div class="col-sm-4">
                                <input type="text" name="gj_h2" id="gj_h2" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">BTU/TON</label>
                            <div class="col-sm-4">
                                <input type="text" name="btu_h2" id="btu_h2" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header">
                            <h3 class="box-title with-border">Horno 1</h3>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Cal Producida</label>
                            <div class="col-sm-2">
                                <input type="text" name="cal_producida_final_h1" id="cal_producida_final_h1" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Horas Trabajadas</label>
                            <div class="col-sm-2">
                                <input type="text" name="horas_trabajadas_h1" id="horas_trabajadas_h1" class="form-control">
                            </div>

                        <label for="" class="col-sm-1 control-label">Consumo H1 (m3)</label>
                            <div class="col-sm-3">
                                <input type="text" name="consumo_h1" id="consumo_h1" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Combustible Inf</label>
                            <div class="col-sm-4">
                                <input type="text" name="combustible_inferior_h1" id="combustible_inferior_h1" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">Combustible Sup</label>
                            <div class="col-sm-4">
                                <input type="text" name="combustible_superior_h1" id="combustible_superior_h1" class="form-control">
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">GJ</label>
                            <div class="col-sm-4">
                                <input type="text" name="gj_h1" id="gj_h1" class="form-control">
                            </div>

                        <label for="" class="col-sm-2 control-label">BTU/TON</label>
                            <div class="col-sm-4">
                                <input type="text" name="btu_h1" id="btu_h1" class="form-control">
                            </div>
                    </div>  

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" name="action" id="action" value="Guardar" class="btn btn-info  pull-right">
                        </div>
                    </div>

                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

$(document).ready(function(){

    $('#m3_h3').css({

        'border-color': 'red',
        'border-width': '3px'
    })


    $('#fecha').on('change', function(){

    let fecha = $('#fecha').val()

    $.ajax({

        url: '<?= base_url()?>admin/hornos/getValuesForConsumoGasHornosController/'+fecha,
        method: 'GET',
        data: {fecha:fecha},
        dataType: 'json',
        error: function(){

            alert('No se pudo enlazar a la Api')
        },
        success: function(data){

            //alert(data)
            $('#toneladas_totales').val(data['cal_prod_final'])
            $('#toneladas_totales').attr('readonly', true)

            $('#m3_totales').val(data['consumo_hornos_metros_cubicos'])
            $('#m3_totales').attr('readonly', true)

            $('#mega_calorias_totales').val(data['megacalorias_hornos'])
            $('#mega_calorias_totales').attr('readonly', true)

            $('#gj').val(data['GJ'])
            $('#gj').attr('readonly', true)


            
            //$('#gj').on('click', function(){

                //$('#gj').val(data['GJ'])
                //$('#gj').attr('readonly', true)

                let megaCaloriasTotales = Number($('#mega_calorias_totales').val())
                let gj_result = megaCaloriasTotales/239
                $('#gj').val(gj_result.toFixed(2))
                $('#gj').attr('readonly', true)
            //})
            

            /*
            $('#btu').on('click', function(){

                let gigaJoule = Number($('#gj').val())
                let toneladasTotales = Number($('#toneladas_totales').val())
                
                let result = (gigaJoule*947817)/toneladasTotales
                console.log(result.toFixed(2))
                $(this).val(result.toFixed(2))
                $(this).attr('readonly', true)
            })
            */

                let gigaJoule = Number($('#gj').val())
                let toneladasTotales = Number($('#toneladas_totales').val())
                
                let btu_result = (gigaJoule*947817)/toneladasTotales
                console.log(btu_result.toFixed(2))
                $('#btu').val(btu_result.toFixed(2))
                $('#btu').attr('readonly', true)


            //$('#factor_m3_GJ').on('click', function(){

                let m3Totales = Number($('#m3_totales').val())
                //let gigaJoule = Number($('#gj').val())
                let factor_result = gigaJoule/m3Totales

                $('#factor_m3_GJ').val(factor_result.toFixed(5))
                $('#factor_m3_GJ').attr('readonly', true)
            //})

            const factorm3Gj = Number($('#factor_m3_GJ').val())

            //Horno 1
            $('#cal_producida_final_h1').val(data['cal_prod_h1'])
            $('#cal_producida_final_h1').attr('readonly', true)

            $('#horas_trabajadas_h1').val(data['paro_h1'])
            $('#horas_trabajadas_h1').attr('readonly', true)

            $('#combustible_inferior_h1').val(data['comb_inf_h1'])
            $('#combustible_inferior_h1').attr('readonly', true)

            $('#combustible_superior_h1').val(data['comb_sup_h1'])
            $('#combustible_superior_h1').attr('readonly', true)

            $('#consumo_h1').attr('readonly','true')
            $('#gj_h1').attr('readonly','true')
            $('#btu_h1').attr('readonly','true')

            /*
                $('#gj_h1').on('click', function(){

                
                let consumo_h1 = Number(($('#consumo_h1').val()))
                const factorm3Gj = Number($('#factor_m3_GJ').val())


                result = consumo_h1 * factorm3Gj
                $('#gj_h1').val(result.toFixed(2))

            })
            */

            //$('#btu_h1').on('click', function(){



            //})

            //Horno 2
            $('#cal_producida_final_h2').val(data['cal_prod_h2'])
            $('#cal_producida_final_h2').attr('readonly', true)

            $('#horas_trabajadas_h2').val(data['paro_h2'])
            $('#horas_trabajadas_h2').attr('readonly', true)

            $('#combustible_inferior_h2').val(data['comb_inf_h2'])
            $('#combustible_inferior_h2').attr('readonly', true)

            $('#combustible_superior_h2').val(data['comb_sup_h2'])
            $('#combustible_superior_h2').attr('readonly', true)

            $('#consumo_h2').attr('readonly','true')

            //$('#horas_trabajadas_h2').on('keyup', function(){

                //let consumo_real_h3 = Number($('#m3_real_h3').val())
                let consumo_total = Number($('#m3_totales').val())
                let comb_inf_h1 = Number($('#combustible_inferior_h1').val())
                let comb_sup_h1 = Number($('#combustible_superior_h1').val())
                let comb_inf_h2 = Number($('#combustible_inferior_h2').val())
                let comb_sup_h2 = Number($('#combustible_superior_h2').val())
                let horas_h2 = Number($('#horas_trabajadas_h2').val())
                let consumo_h2_result = 0

                if(comb_inf_h1 == 0 && comb_sup_h1 == 0 && comb_sup_h2 == 0){

                    consumo_h2_result += comb_inf_h2 * 2.725 * horas_h2
                    
                    ('#consumo_h2').val(consumo_h2_result)
                    $('#consumo_h2').attr('readonly', 'true')


                } else if(comb_inf_h1 == 0 && comb_sup_h1 == 0){

                    consumo_h2_result += consumo_total - consumo_real_h3

                   $('#consumo_h2').val(consumo_h2_result.toFixed(2))
                   $('#consumo_h2').attr('readonly', 'true')

                } else{

                    consumo_h2_result += (comb_inf_h2 + comb_sup_h2) * 2.102 * horas_h2

                    $('#consumo_h2').val(consumo_h2_result.toFixed(2))
                    $('#consumo_h2').attr('readonly', 'true')
                }


                consumo_h2 = Number(($('#consumo_h2').val()))
                //factorm3Gj = Number($('#factor_m3_GJ').val())

                gj_h2_result = consumo_h2 * factorm3Gj
                $('#gj_h2').val(gj_h2_result.toFixed(2))
                $('#gj_h2').attr('readonly', true)

                let giga_joule_h2 = Number($('#gj_h2').val())
                let cal_prod_final_h2 = Number($('#cal_producida_final_h2').val())

                let btu_h2_result = (giga_joule_h2 * 947817) / cal_prod_final_h2
                $('#btu_h2').val(btu_h2_result.toFixed(2))
                $('#btu_h2').attr('readonly', true)

            //})

            //Horno 3
            $('#cal_producida_final_h3').val(data['cal_prod_h3'])
            $('#cal_producida_final_h3').attr('readonly', true)

            $('#horas_trabajadas_h3').val(data['paro_h3'])
            $('#horas_trabajadas_h3').attr('readonly', true)

            $('#m3_real_h3').attr('readonly','true')
            $('#gj_h3').attr('readonly','true')
            $('#btu_h3').attr('readonly','true')

            $('#m3_h3').keyup(function(){

                let consumo = Number($(this).val())
                let factor_consumo_h3 = 1.10
                let result = consumo*factor_consumo_h3

                $('#m3_real_h3').val(result.toFixed(2))
                $('#m3_real_h3').attr('readonly', true)
            })

            $('#m3_h3').keyup(function(){
                
                consumo_real_h3 = Number(($('#m3_real_h3').val()))
                //factorm3Gj = Number($('#factor_m3_GJ').val())

                gj_h3_result = consumo_real_h3 * factorm3Gj
                $('#gj_h3').val(gj_h3_result.toFixed(2))
                $('#gj_h3').attr('readonly', true)

                let giga_joule_h3 = Number($('#gj_h3').val())
                let cal_prod_final_h3 = Number($('#cal_producida_final_h3').val())

                let btu_h3_result = (giga_joule_h3 * 947817) / cal_prod_final_h3
                $('#btu_h3').val(btu_h3_result.toFixed(2))
                $('#btu_h3').attr('readonly', true)


                let consumo_h2 = Number($('#consumo_h2').val())
                //consumo_real_h3 = Number($('#m3_real_h3').val())
                let consumo_h1_result = 0

                consumo_h1_result += m3Totales - consumo_real_h3 - consumo_h2

                $('#consumo_h1').val(consumo_h1_result.toFixed(2))

                let consumo_h1 = Number(($('#consumo_h1').val()))
                //const factorm3Gj = Number($('#factor_m3_GJ').val())

                let gj_h1_result = consumo_h1 * factorm3Gj
                $('#gj_h1').val(gj_h1_result.toFixed(2))

                let giga_joule_h1 = Number($('#gj_h1').val())
                let cal_prod_final_h1 = Number($('#cal_producida_final_h1').val())

                let result = (giga_joule_h1 * 947817) / cal_prod_final_h1
                $('#btu_h1').val(result.toFixed(2))

            })


        }
    })

        
    })

})
    

</script>