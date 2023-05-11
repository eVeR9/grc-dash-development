<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<!--
<link rel="stylesheet" href="<?//php echo base_url('public/assets/bootstrap/css/bootstrap.css') ?>"/>
<link rel="stylesheet" href="<?//php echo base_url('public/assets/datatables/dataTables.bootstrap.css') ?>"/>
-->
<style>
.big-col {
  width: 100px !important;
}

.table-mytable {
  table-layout:fixed;
}
</style>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
	
	.red {
  background-color: #F9E79F !important;
}

.green {
  background-color: #2ECC71 !important;
  color: #fff;
}
        </style>        

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Lista de remisiones</h3>
    </div>
    <!-- /.box-header -->
    
    <div  class="box-body table-responsive">
      <table id="mytable" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr>
          <th width="80px">Remision</th>
          <th width="90px">Serie</th>
          <th width="80px">Fecha</th>
          <th width="150px">Vendedor</th>
          <th width="200px">Cliente</th>
          <th width="80px">Estatus</th>
          <th width="120px">Orden Compra</th>
          <th width="100px">Material</th>
          <th width="90px">Tons. Embr.</th>
          <th width="100px">Obra Cliente</th>
          <th width="90px">Imprimir</th>
          <th width="70px">Editar</th>
          <th width="60px">Ver</th>
        </tr>
        </thead>

      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
 </section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!--
        <script src="<?//php echo base_url('public/assets/datatables/jquery.dataTables.js') ?>" ></script>
        <script src="<?//php echo base_url('public/assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script src="<?//php echo base_url('public/assets/datatables/dataTables.fixedHeader.min.js') ?>" ></script>
-->
<script type="text/javascript">
            $(document).ready(function() {
				
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
					scrollX: true,
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {sProcessing: "Cargando datos..."},
                    processing: true,
                    serverSide: true,
					searching: true,
                    ajax: {"url": "remisiones/json", "type": "POST"},
                    columns: [
                        {"data": "id_remision", "orderable": true},
                        {"data": "serie"},
                        {"data": "fecha_remision"},
                        {"data": "nombre_vendedor", "orderable": true},
                        {"data": "razon_social", "orderable": true},
                        {"data": "fase_de_remision"},
                        {"data": "orden_de_compra"},
                        {"data": "nombre_del_material"},
                        {"data": "toneladas_remision"},
                        {"data": "obra_cliente"},
						{"data": "imprimir"},
						{"data": "editar"},
						{"data": "ver"}
                    ],
                    order: [[0, 'desc']],
					   rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
						var fr = data['fase_de_remision'];
                        //$('td:eq(1)', row).html(index); // Esconder la COUNTER COLUMN (el consecutivo)
						//alert(data[0]);
						//alert(fr);
						if ( fr == "Capturada" ) {
							//alert("Hello");        
							$(row).addClass('red');
					   	} 
               if(fr == "Cargada") {
                 $(row).addClass('green');
               }
				}
                });
            });
        </script>


<script>
$("#view_remisiones").addClass('active');
</script>