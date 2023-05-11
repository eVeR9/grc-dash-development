<style>
    .plus {
        margin-left: 10px;
        font-size: 18px;
        color: #73C6B6;
    }

    .red{
            /*background-color: #EC7063;*/
            background-color:  #B9A1EB;
            background-color: #ff6961 !important;
            color: #fff;
    }

    .yellow{
            /*background-color: #FDD835;*/
            background-color: #FDEDB2 !important;
            color: #000;
          }

    .blue{
            /*background-color: #85C1E9;*/
            background-color: #CDE5C1;
            background-color: #BBDAFF;
            background-color: #85C1E9 !important;
            color: #fff;

          }

    
</style>

<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<?php 
$puesto = strtoupper($this->session->userdata('puesto'));
$depto = strtoupper($this->session->userdata('departamento'));
?>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Bitacora de Citas</h3>
        </div>

        <?php //if ($puesto == "JEFE-TURNO" || $puesto == "OPERADOR-HORNOS" || $depto == "TI") : ?>
        <a href="<?= base_url('admin/transporte/add_citas'); ?>">
            <i class="fa fa-plus plus" aria-hidden="true"></i>
        </a>&nbsp&nbsp<label for="" class="">Nuevo Registro</label>
        <?php //endif; ?>

        <div class="box-body table-responsive">
            <table class="table table-stripped" id="example1">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <!-- <th>Transportista</th> -->
                        <th>Operador</th>
                        <th>Unidad</th>
                        <th>Pedido</th>
                        <th>Tipo Flete</th>
                        <th>Comentarios</th>
                        <th>Estatus</th>
                        <?php if ($depto == "TI"): ?>
                        <th class="text-center">Opciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($citas as $cita) : ?>
                        <tr>
                            <!-- <td><?//= $op['id'] ?></td> -->
                            <td><?= $cita['folio'] ?></td>
                            <td><?= $cita['fecha'] ?></td>
                            <td><?= $cita['hora'] ?></td>
                            <!-- <td><?//= $cita['id_transportista'] ?></td> -->
                            <td><?= $cita['id_operador'] ?></td>
                            <td><?= $cita['id_unidad'] ?></td>
                            <td><?= $cita['id_pedido'] ?></td>
                            <td><?= $cita['tipo_flete'] ?></td>
                            <td><?= $cita['comentarios'] ?></td>
                            <td><?= $cita['id_estatus'] ?></td>
                            <?php if ($depto == "TI"): ?>
                            <td class="text-center">
                                <?php if($cita['id_estatus'] == "Programada"):?>
                                    <button class="btn btn-info btn-sm entrada" value="<?= $cita['folio']?>">Entrada</button> |
                                    <button class="btn btn-info btn-sm salida" value="" disabled>Salida</button>
                                <?php else: ?>
                                    <button class="btn btn-info btn-sm entrada" value="" disabled>Entrada</button> |
                                    <button class="btn btn-info btn-sm salida" value="<?= $cita['folio']?>">Salida</button>
                                <?php endif; ?>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>