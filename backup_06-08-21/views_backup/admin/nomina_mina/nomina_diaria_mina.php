<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
<style>
    .main-footer {
        display: none;
    }
</style>

<?php //echo $secondDb['_ACCDAILY']; ?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Mina</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/nomina_mina/nomina_diaria_mina'), 'class="form-horizontal"');  ?>
                    <div class="form-group">

                        <?php //$salario_trituracion = $getTotalSalarioNetoExt['extraccion']; ?>
                        
                        <?php //$salario_extraccion = $getTotalSalarioNetoTrit['trituracion']; ?>

                        <?php //echo $salario_trituracion+$salario_extraccion; ?>

                        
                        <label for="fecha" class="col-sm-1 control-label">Fecha</label>
                        <div class="col-sm-3">
                            <input type="text" name="fecha" id="fecha" class="form-control daterange" autocomplete="off">
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label for="horno" class="col-sm-1 control-label">Mano de Obra</label>
                        
                        <div class="col-sm-3">
                            <select name="zona" id="zona" class="zona form-control">
                                <option value="" selected>--Selecciona--</option>
                                <option value="300">Extracción</option>
                                <option value="200">Trituración</option>
                            </select>
                        </div>
                    </div>
                    -->
                    <br>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <div class="box box-solid">

                                <!-- /.box-header -->
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Mano de Obra</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- <input type="text" id="total" class="form-control"> -->

                                        <table class="table table-bordered">
                                            <tr>
                                                <td> Nomina Directa</td>
                                                <td> Nomina Indirecta</td>

                                            </tr>
                                            <tr>

                                                <td class="" id="total" name="total"></td>
                                                <td id="total_dos" name="total_dos"></td>
                                            </tr>

                                        </table>
                                    </div>
                                    
                                    <input type="hidden" name="total_hidden" id="total_hidden">  
                                    <input type="hidden" name="total_dos_hidden" id="total_dos_hidden">
                                    <!-- /.box-body -->
                                    <div class="box-footer clearfix">
                                        <ul class="pagination pagination-sm no-margin pull-right">

                                        </ul>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    



                <div style="display:none;">
                    <div class="form-group">

                        <label for="" class="col-sm-1 control-label">Mano de Obra</label>

                        <div class="col-sm-3">
                            <input type="button" value="Gastos" step="any" name="" class="form-control">
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="pxc" class="col-sm-1 control-label">Nomina Directa</label>

                        <div class="col-sm-3">
                            <input type="text" placeholder="$gastos directos" step="any" name="" class="form-control">

                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label for="pxc" class="col-sm-1 control-label">Nomina Indirecta</label>

                        <div class="col-sm-3">
                            <input type="text" placeholder="$gastos indirectos" step="any" name="" class="form-control">

                        </div>

                    </div>
                </div> <!-- Ocultar gastos directos / indirectos -->


                    <div class="box-header with-border">
                        <h3 class="box-title">Gastos</h3>
                    </div>
                    <br>
                    <div class="form-group">

                        <label for="" class="col-sm-1 control-label">Gastos Fijos</label>

                        <div class="col-sm-3">
                            <input type="button" value="Gastos Fijos" step="any" name="" class="form-control">
                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label for="pxc" class="col-sm-1 control-label">Arrenda-miento</label>

                        <div class="col-sm-3">
                            <input type="text" placeholder="" step="any" name="arrendamiento" class="form-control" id="diario_arren"  readonly required>

                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label for="pxc" class="col-sm-1 control-label">CFE</label>

                        <div class="col-sm-3">
                            <input type="text" placeholder="" step="any" name="cfe" class="form-control" id="diario_cfe"  readonly required>

                        </div>

                    </div>


                    <br>
                    <br>

                    <div class="box-header with-border">
                        <h3 class="box-title">Produccion</h3>
                    </div>
                    <br>
                    <div class="form-group">

                        <label for="" class="col-sm-1 control-label">Produccion</label>

                        <div class="col-sm-3">
                            <input type="button" value="Produccion" step="any" name="" class="form-control" id="" required>
                        </div>

                    </div>
                    
                    <div class="form-group">

                        <label for="" class="col-sm-1 control-label">Toneladas</label>

                        <div class="col-sm-3">
                            <input type="text" placeholder="" step="any" name="total_prod" class="form-control" id="total_prod"  readonly required>

                        </div>

                    </div>

                    
                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Agregar" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
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

    $('#si').on('click', function() {
        $('.razones').show('slow');
    });

    $('#no').on('click', function() {
        $('.razones').hide();
    });
</script>
<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    //entries, pagination and search bar
    $(function() {
        $("#example1").DataTable();
    });
</script>

<script>

/*
const selectElement = document.querySelector('.zona');

selectElement.addEventListener('change', (event) => {
    const resultado = document.querySelector('.resultado');
    resultado.innerHTML = `$${event.target.value}`;
});
*/

$('#fecha').on('change', function(){
    let id = $('#fecha').val();

if(id != 0){
    $.ajax({
        url: "<?= base_url()?>admin/nomina_mina/getTotalNominaDiaria/"+id,
        method: 'POST',
        data: {id:id},
        async: true,
        dataType: 'json',
        error: function(data){

                alert('Los datos no llegaron...');

        },
        success: function (data){
            if(data === "noData") {
                alert('Falta un dato (gastos fijos o mano de obra)')
                //$(document).
                return location.reload();
            }
            
            $('#total').val(data['Total']).html('<td>' + '$ ' + data['Total'] + '</td>');
            $('#total_dos').val(data['Total_dos']).html('<td>' + '$ ' + data['Total_dos'] + '</td>');
            $('#total_hidden').val(data['Total']);
            $('#total_dos_hidden').val(data['Total_dos']);
            $('#diario_arren').val(data['Diario_arrend']).html('<td>' + '$ ' + data['Diario_arrend'] + '</td>');
            $('#diario_cfe').val(data['Diario_cfe']).html('<td>' + '$ ' + data['Diario_cfe'] + '</td>');
        }
    });

    $.ajax({
        url: "<?= base_url()?>admin/nomina_mina/get_total_produccion/"+id,
        method: 'POST',
        data: {id:id},
        async: true,
        dataType: 'json',
        error: function(data){
            if(data==0){
                alert('No hay registro de produccion');
            }
        },
        success: function (data){
            //alert('Los datos estan llegando')
            if(data) {
                $('#total_prod').val(data['b4_total']);
            } else{
                $('#total_prod').val(0);
            }
            
        }
    });
  }
});

</script>