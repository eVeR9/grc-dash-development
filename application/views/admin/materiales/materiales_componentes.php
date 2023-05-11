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
                    <h3 class="box-title">Componentes de Materiales</h3>
                </div>
                <div class="box-body">
                    <?php echo form_open(base_url('admin/materiales/materiales_componentes'), "class='form-horizontal'") ?>
                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Materiales</label>
                        <div class="col-md-10">
                            <!-- <input type="hidden" name="id_material" id="id_material"> -->
                            <select class="form-control" name="id_material_venta" id="id_material_venta" onchange="get_values();">
                                <option value="">Materiales de Venta</option>
                                <?php foreach ($all_materiales as $material_venta) : ?>
                                    <option value="<?= $material_venta['id'] ?>"><?= $material_venta['nombre_del_material'] ?></option>
                                <script>
                                //var mat_id = <?php //echo $material_venta['id']?>
                                </script>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Produccion</label>
                        <div class="col-md-4">
                            <select class="form-control" name="id_material_produccion" id="">
                                <option value="">Materiales de Produccion</option>
                                <?php foreach ($materiales_prod as $mat_prod) : ?>
                                    <option value="<?= $mat_prod['id'] ?>"><?= $mat_prod['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <input type="number" name="porcentaje" step="any" min="0" class="form-control" placeholder="Porcentaje">
                        </div>

                        <div class="col-md-2">
                            <input type="submit" name="submit" class="btn btn-info" value="Guardar">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Componentes (Desglosado)</h3>
                </div>
                <div class="box-body">
                    <label for="" id="">Componente: #1:</label>
                    <br>
                    <ul>
                        <li id="id_material_produccion"></li>
                    </ul>
                    <label for="">Componente: #2:</label>
                    <br>
                    <label for="">Componente: #3:</label>
                </div>
            </div> <!-- second-box -->
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){

    });

        function get_values(){
            let id = $('#id_material_venta').val();
            if(id != 0){
                $.ajax({
                    url: "<?php echo base_url();?>admin/materiales/getComponentesByAjax/"+ id,
                    method: "POST",
                    data: {id:id},
                    async: true,
                    dataType: "json",
                    error: function(){
                        alert("Error en la transferencia de datos");
                    },
                    success: function(data){
                        $('#id_material_venta').val(data['id_material']);
                        $('#id_material_produccion').val(data['id_material_produccion']).html('<li>'+ data['id_material_produccion'] + '</li>');
                        //$('#componente_dos').val(data['id_material_produccion']).html('<label>'+data['id_material_produccion']+'</label>');
                    }

                });
            }
        }
/*
        function get_values() {
        let id = $('#id_cliente').val();
        if (id != 0) {
            let ajaxClient = $.ajax({
                url: '<?php echo base_url() ?>entradas/getAjaxClientes/' + id,
                method: 'POST',
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                error: function() {
                    alert('Error en la transferencia de datos');
                },
                success: function(data) {
                    $('#cldata').show();
                    $('#tel').val(data['tel']).html('<span>' + data['tel'] + '</span>');
                    $('#estatus_fiscal').val(data['estatus_fiscal']).html('<li>' + data['estatus_fiscal'] + '</li>');
                    $('#rfc').val(data['rfc']).html('<li>' + data['rfc'] + '</li>');
                    $('#dir_fiscal').val(data['dir_fiscal']).html('<li>' + data['dir_fiscal'] + '</li>');
                    $('#modelo').val(data['modelo']).html('<li>' + data['modelo'] + '</li>');
                }
            });

            if(ajaxClient){
                console.log(true);
            }
        }
    }

    */
</script>