<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tablero Hornos</h3>
                </div>
                <div class="box-body">
                <div class="row">
                        <div class="col-md-6">
                            <h1 class="text-center">PRODUCCION TOTAL/DIA</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3 class="text-center">Total Cal:</h3>
                                        <h3 class="text-center"><?= $suma_total_cal['suma_total_cal_hoy'] == null ? 0 : $suma_total_cal['suma_total_cal_hoy']  ?> t</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                    <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h1 class="text-center">PRODUCCION TOTAL/MES</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3 class="text-center">Total Cal:</h3>
                                        <h3 class="text-center"><?= $suma_total_cal_mes['suma_total_cal_mes']?> t</h3>

                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                    <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="text-center">HORNO 1</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner text-center">
                                        <h4>Total Cal (Hoy):</h4>
                                        <h3><?= $horno1_hoy['total_cal_hoy_h1'] ?></h3>

                                    </div>
                                    <div class="small-box-footer">
                                        <h4>Mensual: <b><?= $total_cal_mes_horno1['total_mes_horno1']?> t</b></h4>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                    <!--
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h1 class="text-center">HORNO 2</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner text-center">
                                        <h4>Total Cal (Hoy):</h4>
                                        <h3><?= $horno2_hoy['total_cal_hoy_h2'] ?></h3>
                                    </div>
                                    <div class="small-box-footer">
                                        <h4>Mensual: <b><?= $total_cal_mes_horno2['total_mes_horno2']?> t</b></h4>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                    <!--
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h1 class="text-center">HORNO 3</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner text-center">
                                        <h4>Total Cal (Hoy):</h4>
                                        <h3><?= $horno3_hoy['total_cal_hoy_h3'] == null ? 0 . '.00' : $horno3_hoy['total_cal_hoy_h3'] ?></h3>
                                    </div>
                                    <div class="small-box-footer">
                                        <h4>Mensual: <b><?= $total_cal_mes_horno3['total_mes_horno3']?> t</b></h4>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                    <!--
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="text-center">INVENTARIO MP</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">

                                        <table class="table table-condensed table-responsive">
                                            <thead>
                                                <th width="50%">MATERIAL</th>
                                                <th width="50%">TONELADAS</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($inventario as $inv) : ?>
                                                    <tr>
                                                        <td><?= $inv['material_id'] ?></td>
                                                        <td><?= $inv['toneladas_por_horno'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                        <!--
                                        <?php //foreach ($inventario as $inv) : 
                                        ?>
                                            <p><? //= $inv['material_id'] 
                                                ?> ...........<b><? //= $inv['toneladas_por_horno'] 
                                                                                            ?></b></p>
                                        <?php //endforeach; 
                                        ?>
                                        -->
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-cubes"></i>
                                    </div>
                                    <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h1 class="text-center">EMBARQUES HOY / MES</h1>
                            <div class="col-md-6">
                                <!-- <h1 class="text-center">EMBARQUES</h1> -->
                                <div class="col-lg-12">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <p class="text-center">HOY</p>

                                            <table class="table table-condensed table-responsive">
                                                <thead>
                                                    <th>CAL</th>
                                                    <th>TONELADAS</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($embarques_hoy as $embarques) : ?>
                                                        <tr>
                                                            <td><?= $embarques['id_material'] ?></td>
                                                            <td><b><?= $embarques['total'] ?></b></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <!--
                                        <?php //foreach ($inventario as $inv) : 
                                        ?>
                                            <p><? //= $inv['material_id'] 
                                                ?> ...........<b><? //= $inv['toneladas_por_horno'] 
                                                                                            ?></b></p>
                                        <?php //endforeach; 
                                        ?>
                                        -->
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-cubes"></i>
                                        </div>
                                        <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- <h1 class="text-center">EMBARQUES</h1> -->
                                <div class="col-lg-12">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <p class="text-center">MES ACTUAL</p>
                                            <table class="table table-condensed table-responsive">
                                                <thead>
                                                    <th>CAL</th>
                                                    <th>TONELADAS</th>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($embarques_mes as $embarques) : ?>
                                                        <tr>
                                                            <td><?= $embarques['id_material'] ?></td>
                                                            <td><b><?= $embarques['total_mensual'] ?></b></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <!--
                                        <?php //foreach ($inventario as $inv) : 
                                        ?>
                                            <p><? //= $inv['material_id'] 
                                                ?> ...........<b><? //= $inv['toneladas_por_horno'] 
                                                                                            ?></b></p>
                                        <?php //endforeach; 
                                        ?>
                                        -->
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-cubes"></i>
                                        </div>
                                        <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="text-center">CALIDAD H1</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <table class="table table-condensed table-responsive">
                                            <thead>
                                                <th>HORA</th>
                                                <th>MgO</th>
                                                <th>CaO</th>
                                                <th>PxC</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($calidad_horno_1 as $calH1) : ?>
                                                    <tr>
                                                        <td><?= $calH1['id_hora'] ?></td>
                                                        <td><?= $calH1['mgo'] ?></td>
                                                        <td><?= $calH1['cao'] ?></td>
                                                        <td><?= $calH1['pxc'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-check-circle"></i>
                                    </div>
                                    <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h1 class="text-center">CALIDAD H2</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <table class="table table-condensed table-responsive">
                                            <thead>
                                                <th>HORA</th>
                                                <th>MgO</th>
                                                <th>CaO</th>
                                                <th>PxC</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($calidad_horno_2 as $calH2) : ?>
                                                    <tr>
                                                        <td><?= $calH2['id_hora'] ?></td>
                                                        <td><?= $calH2['mgo'] ?></td>
                                                        <td><?= $calH2['cao'] ?></td>
                                                        <td><?= $calH2['pxc'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-check-circle"></i>
                                    </div>
                                    <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h1 class="text-center">CALIDAD H3</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <table class="table table-condensed table-responsive">
                                            <thead>
                                                <th>HORA</th>
                                                <th>MgO</th>
                                                <th>CaO</th>
                                                <th>PxC</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($calidad_horno_3 as $calH3) : ?>
                                                    <tr>
                                                        <td><?= $calH3['id_hora'] ?></td>
                                                        <td><?= $calH3['mgo'] ?></td>
                                                        <td><?= $calH3['cao'] ?></td>
                                                        <td><?= $calH3['pxc'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-check-circle"></i>
                                    </div>
                                    <!-- 
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function myFunction() {

        location.reload()
        console.log('refresh')
    }

    setInterval(myFunction, 60000);
</script>