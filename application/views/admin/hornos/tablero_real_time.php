<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tablero Hornos</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="text-center">HORNO 1</h1>
                            <div class="col-lg-12">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner text-center">
                                        <h4>Total Cal (Hoy):</h4>
                                        <h3><?= $info_hornos['total_cal_h1'] ?></h3>

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
                                        <h3><?= $info_hornos['total_cal_h2'] ?></h3>

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
                                        <h3><?= $info_hornos['total_cal_h3'] ?></h3>

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
                        <div class="col-md-5">
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

                        <div class="col-md-7">
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

                                    <section id="myTable"> 

                                    </section>
                                        <!--
                                        <table class="table table-condensed table-responsive" id="miTabla">
                                            <thead>
                                                <th>HORA</th>
                                                <th>MgO</th>
                                                <th>CaO</th>
                                                <th>PxC</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td name="id_hora" id="id_hora"></td>
                                                    <td name="mgo" id="mgo"></td>
                                                    <td name="cao" id="cao"></td>
                                                    <td name="pxc" id="pxc"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        -->

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

    function realTime() {

let miTabla =  $.ajax({

    url: '<?php echo base_url() ?>admin/hornos/calHornoH1TiempoReal',
    type: 'POST',
    dataType: 'text',
    async: false,
    //success: function(data) {}
}).responseText

    document.getElementById('myTable').innerHTML = miTabla;
}

setInterval(realTime, 1000);

</script>

<!-- 



INSERT INTO `laboratorio_calhorno` (`id`, `id_estatus`, `fecha`, `id_hora`, `horno`, `mgo`, `cao`, `pxc`, `comentarios`) VALUES
(4981, 1, '2021-07-07', 20, 'Horno 3', 0.00, 0.00, 0.00, 'parado por fallo de tolvas de descarga'),
(4980, 1, '2021-07-07', 20, 'Horno 2', 0.00, 0.00, 5.35, ''),
(4979, 1, '2021-07-07', 20, 'Horno 1', 0.00, 0.00, 4.20, ''),
(4978, 1, '2021-07-07', 16, 'Horno 3', 33.74, 60.58, 3.00, ''),
(4977, 2, '2021-07-07', 16, 'Horno 2', 31.17, 61.60, 7.30, ''),
(4976, 1, '2021-07-07', 16, 'Horno 1', 31.91, 63.14, 3.60, ''),
(4975, 1, '2021-07-07', 12, 'Horno 3', 0.00, 0.00, 3.60, '');
-->