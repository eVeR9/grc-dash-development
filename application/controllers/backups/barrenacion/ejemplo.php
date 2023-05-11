<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/iCheck/all.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.css">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Materiales</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body ">


                        <?php echo form_open() ?>

                        <!-- Fin Datos Laboraes -->
                        <div class="form-group">
                            <!--<div class="box-header with-border">
                                <h3 class="box-title">Materiales</h3>
                            </div>-->
                            <fieldset>
                                <label for="estado_civil" class="col-sm-3 control-label">Tipo de Arena</label>
                                <div class="col-sm-4">

                                    <input type="checkbox" name="tipo_arena" value="arena_4"> Arena 4<br>
                                    <input type="checkbox" name="tipo_arena" value="arena_5"> Arena 5<br>
                                    <input type="checkbox" name="tipo_arena" value="arena_olivina"> Arena de Olivina<br>
                                    <input type="checkbox" name="tipo_arena" value="arena_olivina_sacos1/8"> Arena de Olivina Sacos 1/8<br>
                                    <input type="checkbox" name="tipo_arena" value="arena_olivina_sacos3/16"> Arena de Olivina Sacos 3/16<br>
                                    <input type="checkbox" name="tipo_arena" value="arena_olivina_sacosfinos"> Arena de Olivina Sacos Finos<br>
                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <fieldset>
                                <label for="estado_civil" class="col-sm-3 control-label">Tipo de Cal</label>
                                <div class="col-sm-4">

                                    <input type="checkbox" name="tipo_cal" value="cal_dolomitica"> Cal Dolomitica<br>
                                    <input type="checkbox" name="tipo_cal" value="cal_dolomitica_insuflada"> Cal Dolomitica Insuflada<br>
                                    <input type="checkbox" name="tipo_cal" value="cal_dolomitica_lh"> Cal Dolomitica LH<br>

                                </div>
                            </fieldset>

                        </div>
                        <br>
                        <br>
                        <div class="form-group">

                            <fieldset>
                                <label for="estado_civil" class="col-sm-3 control-label">Tipo de Dolomita</label>
                                <div class="col-sm-4">

                                    <input type="checkbox" name="tipo_dolomita" value="dolomita"> Dolomita 1 1/2 a 2<br>
                                    <input type="checkbox" name="tipo_dolomita" value="dolomita"> Dolomita 1 1/2 a 2 1/2<br>
                                    <input type="checkbox" name="tipo_dolomita" value="dolomita"> Dolomita 1 1/2 a 3<br>
                                    <input type="checkbox" name="tipo_dolomita" value="dolomita"> Dolomita 1/4 a 0<br>
                                    <input type="checkbox" name="tipo_dolomita" value="dolomita"> Dolomita 1/4 a 3/4<br>
                                    <input type="checkbox" name="tipo_dolomita" value="dolomita"> Dolomita 3/4 a 1 1/2<br>

                                </div>
                            </fieldset>
                            <br>
                            <br>
                            <fieldset>
                                <label for="estado_civil" class="col-sm-3 control-label">Tipo de Finos</label>
                                <div class="col-sm-4">

                                    <input type="checkbox" name="tipo_finos" value="fino_cal"> Finos de Cal<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_dolomita"> Finos de Dolomita<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_serpentina"> Finos de Serpentina<br>


                                </div>
                            </fieldset>

                        </div>
                        <br>
                        <br>
                        <div class="form-group">

                            <fieldset>
                                <label for="estado_civil" class="col-sm-3 control-label">Otros Materiales</label>
                                <div class="col-sm-4">

                                    <input type="checkbox" name="tipo_finos" value="fino_cal"> Base<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_dolomita"> CNC<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_serpentina"> Despolve<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_serpentina"> Dunita<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_serpentina"> Grava 2<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_serpentina"> Mixto<br>
                                    <input type="checkbox" name="tipo_finos" value="fino_serpentina"> Sub Base<br>

                                </div>
                            </fieldset>

                        </div>




                        <div class="form-group">
                            <div class="col-md-12">

                                <input type="submit" name="submit" value="Agregar Material" class="btn btn-info pull-right">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </section>
