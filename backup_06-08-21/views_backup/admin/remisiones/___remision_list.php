 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  
<style>
.big-col {
  width: 100px !important;
}

table#example1{
  table-layout:fixed;
}
</style>
 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de remisiones</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
<?php
	$this->datatables->generate();

	$this->datatables->jquery();
?>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  
  <!-- Modal -->
  <div class="modal fade" id="DescModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                 <h3 class="modal-title">Job Requirements & Description</h3>

            </div>
            <div class="modal-body">
                 <h5 class="text-center">Hello. Below is the descripton and/or requirements for hiring consideration.</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default " data-dismiss="modal">Apply!</button>
                <button type="button" class="btn btn-primary">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
  
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
/*
$(document).ready(function () {
    $('#example1').DataTable();

    
    $('#example1').on('click', 'tr', function () {
        var name = $('td', this).eq(1).text();
        $('#DescModal').modal("show");
    });
});
*/
</script>
<script>
$("#view_remisiones").addClass('active');
</script>