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
                            <select class="form-control" name="id_material_venta" id="id_material_venta">
                                <option value="">Materiales de Venta</option>
                                <?php foreach ($all_materiales as $material_venta) : ?>
                                    <option value="<?= $material_venta['id'] ?>"><?= $material_venta['nombre_del_material'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-1 control-label">Produccion</label>
                        <div class="col-md-4">
                            <select class="form-control" name="id_material_produccion" id="id_material_produccion">
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
                    <label for="">Componente: #1:</label>
                    <br>
                    <label for="">Componente: #2:</label>
                    <br>
                    <label for="">Componente: #3:</label>
                </div>
            </div> <!-- second-box -->
        </div>
    </div>
</section>

<script>
    console.log('Hola JS!');
</script>