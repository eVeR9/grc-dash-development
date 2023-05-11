<!-- Fix DataTables styles -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<style>
.main-footer {
    display: none;
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
      <h3 class="box-title">Lista de Conceptos</h3>
    </div>
    <a href="<?= base_url('admin/trituracion/conceptos_add');?>">
      <i class="fa fa-plus plus" aria-hidden="true"></i>
    </a>&nbsp&nbsp<label for="" class="">Nuevo Concepto</label>

      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered">
          <thead>
            <tr>
              <th>Concepto</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($conceptos as $concepto): ?>
            <tr>
              <td><?= $concepto['descripcion']?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div> <!.-- box-body -->
  </div> <!.-- box -->
</section>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
//entries, pagination and search bar
$(function () {
    $("#example1").DataTable();
  });
</script>