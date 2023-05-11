<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">Captura de Bitacora Diaria</h1>
                </div>

                <div class="box-body">
                    <?php echo form_open(base_url(), 'class="form-horizontal"') ?>
                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Combustible</h3>
                        </div>
                        <label for="combustible_inferior" class="col-sm-1 control-label">Inferior</label>
                        <div class="col-sm-5">
                            <input type="number" name="combustible_inferior" class="form-control" id="combustible_inferior" required>
                        </div>

                        <label for="combustible_superior" class="col-sm-1 control-label">Superior</label>
                        <div class="col-sm-5">
                            <input type="number" name="combustible_superior" class="form-control" id="combustible_superior" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Aire</h3>
                        </div>
                        <label for="aire_periferia" class="col-sm-1 control-label">Periferia</label>
                        <div class="col-sm-3">
                            <input type="number" name="aire_periferia" class="form-control" id="aire_periferia" required>
                        </div>

                        <label for="aire_inferior" class="col-sm-1 control-label">Inferiores</label>
                        <div class="col-sm-3">
                            <input type="number" name="aire_inferior" class="form-control" id="aire_inferior" required>
                        </div>

                        <label for="aire_superior" class="col-sm-1 control-label">Superiores</label>
                        <div class="col-sm-3">
                            <input type="number" name="aire_superior" class="form-control" id="aire_superior" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Relaciones</h3>
                        </div>
                        <label for="relaciones_inferior" class="col-sm-1 control-label">Inferiores</label>
                        <div class="col-sm-3">
                            <input type="number" name="relaciones_inferior" class="form-control" id="relaciones_inferior">
                        </div>

                        <label for="relaciones_superior" class="col-sm-1 control-label">Superiores</label>
                        <div class="col-sm-3">
                            <input type="number" name="relaciones_superior" class="form-control" id="relaciones_superior">
                        </div>

                        <label for="relaciones_global" class="col-sm-1 control-label">Global</label>
                        <div class="col-sm-3">
                            <input type="number" name="relaciones_global" class="form-control" id="relaciones_global">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Temperaturas *Horno 1*</h3>
                        </div>
                        <label for="temperatura_gases" class="col-sm-1 control-label">Gases</label>
                        <div class="col-sm-5">
                            <input type="number" name="temperatura_gases" class="form-control" id="temperatura_gases" required>
                        </div>

                        <label for="temperatura_descarga" class="col-sm-1 control-label">Descarga</label>
                        <div class="col-sm-5">
                            <input type="number" name="temperatura_descarga" class="form-control" id="temperatura_descarga" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="temperatura_cal" class="col-sm-1 control-label">Cal</label>
                        <div class="col-sm-5">
                            <input type="number" name="temperatura_cal" class="form-control" id="temperatura_cal" required>
                        </div>

                        <label for="temperatura_ambiente" class="col-sm-1 control-label">Ambiente</label>
                        <div class="col-sm-5">
                            <input type="number" name="temperatura_ambiente" class="form-control" id="temperatura_ambiente" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Temperaturas *Horno 2*</h3>
                        </div>
                        <label for="temperatura_norte" class="col-sm-1 control-label">Norte</label>
                        <div class="col-sm-5">
                            <input type="number" name="temperatura_norte" class="form-control" id="temperatura_norte" required>
                        </div>

                        <label for="temperatura_sur" class="col-sm-1 control-label">Sur</label>
                        <div class="col-sm-5">
                            <input type="number" name="temperatura_sur" class="form-control" id="temperatura_sur" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="temperatura_promedio" class="col-sm-1 control-label">Promedio</label>
                        <div class="col-sm-3">
                            <input type="number" name="temperatura_promedio" class="form-control" id="temperatura_promedio" required>
                        </div>

                        <label for="temperatura_diferencia" class="col-sm-1 control-label">Diferencia</label>
                        <div class="col-sm-3">
                            <input type="number" name="temperatura_diferencia" class="form-control" id="temperatura_diferencia" required>
                        </div>

                        <label for="temperatura_mesa" class="col-sm-1 control-label">Mesa</label>
                        <div class="col-sm-3">
                            <input type="number" name="temperatura_mesa" class="form-control" id="temperatura_mesa" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Presiones P.S.I</h3>
                        </div>
                        <label for="presion_mesa" class="col-sm-1 control-label">Mesa</label>
                        <div class="col-sm-3">
                            <input type="number" name="presion_mesa" class="form-control" id="presion_mesa">
                        </div>

                        <label for="presion_inferior" class="col-sm-1 control-label">Inferiores</label>
                        <div class="col-sm-3">
                            <input type="number" name="presion_inferior" class="form-control" id="presion_inferior">
                        </div>

                        <label for="presion_superior" class="col-sm-1 control-label">Superiores</label>
                        <div class="col-sm-3">
                            <input type="number" name="presion_superior" class="form-control" id="presion_superior">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="box-header with-border">
                            <h3 class="box-title">Skip</h3>
                        </div>
                        <label for="skips_cantidad" class="col-sm-1 control-label">Cantidad</label>
                        <div class="col-sm-3">
                            <input type="number" name="skips_cantidad" class="form-control" id="skips_cantidad">
                        </div>

                        <label for="skips_toneladas_piedra" class="col-sm-1 control-label">Toneladas Piedra</label>
                        <div class="col-sm-3">
                            <input type="number" name="skips_toneladas_piedra" class="form-control" id="skips_toneladas_piedra">
                        </div>

                        <label for="skips_toneladas_prod" class="col-sm-1 control-label">Toneladas Producidas</label>
                        <div class="col-sm-3">
                            <input type="number" name="skips_toneladas_prod" class="form-control" id="skips_toneladas_prod">
                        </div>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>