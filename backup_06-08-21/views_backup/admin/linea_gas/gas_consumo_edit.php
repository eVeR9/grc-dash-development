<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
<style>
    .main-footer {
        display: none;
    }
</style>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Gas Consumo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body my-form-body">
                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/linea_gas/gas_consumo_edit/' .$gas_consumo_edit['id']), 'class="form-horizontal"');  ?>
                    <div class="form-group">



                    <label for="fecha" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-5">
                            <input type="text" name="fecha" value="<?= $gas_consumo_edit['fecha']; ?>" id="fecha" class="form-control daterange" onkeyUp="get_precio_gas();" autocomplete="off" readonly>
                        </div>
                        <div class="col-md-1" style="font-size: 18px;">
                            <i class="fa fa-calendar"></i>
                        </div>


                    </div>

                    

                    <div class="form-group">
                        <label for="metros_cubicos" class="col-sm-1 control-label">Metros Cubicos</label>
                        <div class="col-sm-5">
                            <input type="number" step="any" name="metros_cubicos" value="<?= $gas_consumo_edit['metros_cubicos']; ?>" class="form-control" id="metros_cubicos" required>
                        </div>

                    </div>



                    <div class="form-group">


                        <label for="masa" class="col-sm-1 control-label">Masa (Kg)</label>

                        <div class="col-sm-5">
                            <input type="number" step="any" name="masa" value="<?= $gas_consumo_edit['masa']; ?>" class="form-control" id="masa" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="megacalorias" class="col-sm-2 control-label">Megacalorias</label>

                        <div class="col-sm-4">
                            <input type="number" step="any" name="megacalorias" value="<?= $gas_consumo_edit['megacalorias']; ?>" class="form-control" id="megacalorias" required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="densidad" class="col-sm-1 control-label">Densidad</label>

                        <div class="col-sm-5">
                            <input type="number" step="any" name="densidad" value="<?= $gas_consumo_edit['densidad']; ?>" class="form-control" id="densidad" required>
                        </div>


                    </div>


                    <div class="form-group">

                        <label for="gigajoules" class="col-sm-1 control-label">Gigajoules</label>

                        <div class="col-sm-5">
                            <input type="number" step="any" name="gigajoules" value="<?= $gas_consumo_edit['gigajoules']; ?>" class="form-control" id="gigajoules"  required>
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="precio" class="col-sm-1 control-label">Precio Gas</label>

                        <div class="col-sm-5">
                            <input type="number" step="any" name="precio" value="<?= $gas_consumo_edit['precio']; ?>" class="form-control" id="precio"  readonly required>
                       <!--onKeyUp="fncMult()"--> 
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="costo" class="col-sm-1 control-label">Costo</label>

                        <div class="col-sm-5">
                            <input type="number" step="any" name="costo" value="<?= $gas_consumo_edit['costo']; ?>" class="form-control" id="costo" readonly required>

                        </div>

                    </div>



                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Guardar" class="btn btn-info pull-right">
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
    
    
</script>

<script>
    $("#fecha").on("change paste keyup", function()
    {
        var id = $("#fecha").val();
        if(id!= 0)
        {
            $.ajax({
                url : "<?php echo base_url();?>admin/linea_gas/get_precio_gas/"+id,
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
                error: function(data)
                {
                    alert("Algo salio mal...");
                },
                success: function(data)
                {
                    if(data=="nada"){alert("algo fallo");}
                    $('#precio').val(data['precio']);
                    $('#precio').attr('readonly', true);
                }
                });
        }
    })
    $('#gigajoules, #precio_gas').keyup(function(){
    var numero1 = parseFloat($('#gigajoules').val()) || 0;
    var numero2 = parseFloat($('#precio').val()) || 0;

    $('#costo').val(numero1 * numero2);    
});

    
</script>

<script>


</script>