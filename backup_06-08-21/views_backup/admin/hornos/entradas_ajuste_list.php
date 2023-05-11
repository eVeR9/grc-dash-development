<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css"> 

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">Inventario</h1>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-striped" id="example1">
                <thead>
                    <tr>
                        <!-- <th>ID</th>-->
                        <!-- <th>Horno</th> -->
                        <th>Material</th>
                        <th>Toneladas</th>
                        <!-- <th>Fecha</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($inventario as $inv): ?>
                    <tr>
                        <!-- <td><?//= $inv['id']?></td> -->
                        <!-- <td><?//= $inv['horno_id']?></td>-->
                        <td><?= $inv['material_id']?></td>
                        <td><?= $inv['toneladas_por_horno']?></td>
                        <!-- <td><?//= $inv['fecha']?></td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>

  $(function () {
    $("#example1").DataTable();
  });

  </script>