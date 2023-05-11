<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>
    .main-footer {
        display: none;
    }
</style>

<section class="contain">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Entradas</h3>
                </div>

                <div class="box-body">


                    <?php echo form_open(base_url('admin/hornos/entradas_inventario'),"class='form-horizontal'"); ?>
                    
                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Fecha</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control datepick" value="" name="fecha" id="fecha" autocomplete="off">
                        </div>
                    </div>

                    <!-- 
                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Hornos:</label>
                        <div class="col-md-4">
                            <select class="form-control" name="horno_id" id="horno_id">
                                <option value="">Selecciona horno</option>
                                <?php //foreach($hornos as $horno):?>
                                <option value="<?//= $horno['id']?>"><?//= $horno['horno']?></option>
                                <?php //endforeach; ?>
                            </select>
                        </div>
                    </div>
                    -->

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Material:</label>
                        <div class="col-md-4">
                            <select class="form-control" name="material_id" id="material_id">
                                <option value="">Selecciona concepto</option>
                                <?php foreach($materiales as $material):?>
                                <option value="<?= $material['id']?>"><?= $material['nombre_del_material']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Toneladas:</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="toneladas" id="toneladas" min="0" step="any">
                        </div>
                    </div>
  
                    <!-- 
                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Comentarios:</label>
                        <div class="col-md-3">
                            <textarea name="comentarios" class="form-control" style="margin-left:2px; resize:none; width:310px; height:70px;"></textarea>
                        </div>
                    </div>
                    -->

                    <div class="form-group">
                        <div class="col-md-1" style="margin-left:16px;"> </div>
                        <input type="submit" name="submit" class="btn btn-info" value="Guardar">
                    </div>

                    <?php echo form_close(); ?>

                </div> <!-- box-body-->
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $('.datepick').datepicker({

        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true

    })
</script>