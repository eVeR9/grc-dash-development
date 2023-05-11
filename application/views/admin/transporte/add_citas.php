<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Agrega Citas</h1>
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

                    <?php echo form_open(base_url('admin/transporte/add_citas'), 'class="form-horizontal"') ?>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="folio">Folio</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?= $folio ?>" name="folio" id="folio" readonly>
                        </div>
                        <label class="col-sm-1 control-label" for="fecha">Fecha</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="fecha" id="fecha">
                        </div>
                        <label class="col-sm-1 control-label" for="hora">Hora</label>
                        <div class="col-sm-2">
                            <input type="time" class="form-control" name="hora" id="hora">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="id_pedido">Pedido</label>
                        <div class="col-sm-6">
                            <select name="id_pedido" id="id_pedido" class="form-control">
                                <option value="0">Seleccione</option>
                                <?php foreach ($all_pedidos_complete as $pedido) : ?>
                                    <option value="<?= $pedido['id_pedido']; ?>"><?= $pedido['id_pedido']; ?> - <?= $pedido['id_cliente']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Material</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="material" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="tipo_flete">Tipo de Flete</label>
                        <div class="col-sm-2">
                            <select name="tipo_flete" id="tipo_flete" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="F">Full</option>
                                <option value="S">Sencillo</option>
                            </select>
                        </div>

                        <label class="col-sm-1 control-label" for="id_unidad">Unidad</label>
                        <div class="col-sm-3">
                            <select name="id_unidad" id="id_unidad" class="form-control">
                                <option value="">Seleccione</option>
                                <?php foreach ($unidades as $unidad) : ?>
                                    <option value="<?= $unidad['id'] ?>"><?= $unidad['marca'] ?>&nbsp;<?= $unidad['modelo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label class="col-sm-1 control-label" for="id_operador">Operador</label>
                        <div class="col-sm-2">
                            <select name="id_operador" id="id_operador" class="form-control">
                                <option value="">Seleccione</option>
                                <?php foreach ($operadores as $operador) : ?>
                                    <option value="<?= $operador['id'] ?>"><?= $operador['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="comentarios">Comentarios</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="comentarios" id="comentarios" cols="" rows=""></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-11">
                            <input type="submit" class="btn btn-info pull-right" value="Guardar" name="action" id="action">
                        </div>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#id_pedido').change(function() {

        if ($(this).val() == 0) {
            location.reload()
        }

        let id_pedido = $('#id_pedido').val()

        $.ajax({

            url: '<?= base_url() ?>admin/pedidos/getMaterialPedidoController/' + id_pedido,
            type: 'GET',
            data: {
                id_pedido: id_pedido
            },
            dataType: 'json',
            error: function() {

                alert('Algo salio mal')
            },
            success: function(data) {

                //alert(data)
                $('#material').val(data['id_material'])

            }
        })

    })
</script>