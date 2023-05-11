<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

<style>
    .main-footer {
        display: none;
    }

    .center {
        text-align: center;
    }

    .plus {
        margin-left: 10px;
        font-size: 18px;
        color: #73C6B6;
    }
</style>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bitacora de Explosivos por Voladura</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th class="center">Voladura</th>
                        <!-- <th class="center">Fecha</th> -->
                        <th class="center">Ag. Explosivo</th>
                        <th class="center">Al. Explosivo</th>
                        <th class="center">Mecha</th>
                        <th class="center">Detonante</th>
                        <th class="center">Fulminante</th>
                        <th class="center">Nonel 1</th>
                        <th class="center">Nonel 2</th>
                        <th class="center">Nonel 3</th>
                        <th class="center">Retardador</th>
                        <th class="center">Leadline</th>
                        <!-- <th>Prueba</th> -->
                    </tr>
                </thead>
                <tbody>
                        <?php foreach($get_explosivos_voladura as $explosivo_voladura): ?>
                        <tr>
                            <td><?php echo $explosivo_voladura['id_voladura']; ?></td>
                            <!-- <td><?php //echo $explosivo_voladura['fecha']; ?></td> -->
                            <td><?php echo $explosivo_voladura['agente_explosivo']; ?></td>
                            <td><?php echo $explosivo_voladura['alto_explosivo']; ?></td>
                            <td><?php echo $explosivo_voladura['conductor_mecha']; ?></td>
                            <td><?php echo $explosivo_voladura['cordon_detonante']; ?></td>
                            <td><?php echo $explosivo_voladura['fulminante']; ?></td>
                            <td><?php echo $explosivo_voladura['nonel_1']; ?></td>
                            <td><?php echo $explosivo_voladura['nonel_2']; ?></td>
                            <td><?php echo $explosivo_voladura['nonel_3']; ?></td>
                            <td><?php echo $explosivo_voladura['retardador']; ?></td>
                            <td><?php echo $explosivo_voladura['lead_line']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
  