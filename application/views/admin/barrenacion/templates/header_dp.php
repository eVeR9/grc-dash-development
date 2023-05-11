<link rel="stylesheet" href="<?= base_url() ?>public/plugins_dp/datatables/dataTables.bootstrap.css"> 
<link rel="stylesheet" href="<?= base_url() ?>public/plugins_dp/datepicker/datepicker3.css"> 
<html>
 <head>
  <title>Filtrar por Rangos de fechas</title>
  <!--
  <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-3.3.7/css/csscustom.css">  
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
 -->

 
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
  
 
 </head>
 <body>
  <div class="container box">
 
 
   <h1 text-align="center">Filtrar por Rangos de fechas</h1>
   <br />
 
 
 
 
 
 
   <div class="table-responsive"  style="overflow-x: hidden;">
    <br />
    <div class="row">
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="text" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-md-4">
       <input type="text" name="end_date" id="end_date" class="form-control" />
      </div>      
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Buscar" class="btn btn-info active" />
     </div>
    </div>
    <br />
    <table id="order_data" class="table  table-striped  table-hover">
     <thead>
      <tr>
       <th>Orden ID</th>
       <th>Documento</th>
       <th>Cliente</th>
       <th>Producto</th>
       <th>Precio</th>
       <th>Iva</th>
       <th>Estado</th>
       <th>Fecha</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
  <script src="<?= base_url() ?>public/bootstrap-3.3.7/js/jQuery-2.1.4.min.js"></script>
  <script src="<?= base_url() ?>public/bootstrap-3.3.7/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>public/plugins_dp/datepicker/bootstrap-datepicker.js"></script>

  <script src="<?= base_url() ?>public/plugins_dp/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>public/plugins_dp/datatables/dataTables.bootstrap.js"></script>

  <script src="<?= base_url() ?>public/plugins_dp/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>public/plugins_dp/datatables/dataTables.bootstrap.min.js"></script>
  <!--
  <script src="bootstrap-3.3.7/js/jQuery-2.1.4.min.js"></script>
<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>

    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 -->
 </body>
</html>

<script type="text/javascript" language="javascript">
$(document).ready(function(){

$('.input-daterange').datepicker({
    "locale": {
                "separator": " - ",
                "applyLabel": "Aplicar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa",
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                ],
                "firstDay": 1

    }, //End locale Object

    format: "yyyy-mm-dd",
    autoclose: true

}); //End datepicker function

    fetch_data('no');

    function fetch_data(is_date_search, start_date="", end_date=""){
        var dataTable =  $('#order_data').DataTable({
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros por pagina.",
                "zeroRecords": "Lo sentimnos no se encontraron registros.",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros aun.",
                        "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                        "search": "Busqueda",
                        "LoadingRecords": "Cargando ...",
                        "Processing": "Procesando...",
                        "SearchPlaceholder": "Comience a telcear",
                        "paginate": {
                            "previous": "Anterior",
                            "next": "Siguiente"
                        }
            }, //End language key

            "processing": true,
            "serverSide": true,
            "sort": false,
            "order": [],
            "ajax": {
                url:"ajax.php",
                type:"POST",
                data:{
                    is_date_search:is_date_search,
                    start_date:start_date,
                    end_date:end_date
                }
            } //AJAX Callback
        }); //End DataTable
    } //End fetch_data function

    $('#search').click(function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    if(start_date != '' && end_date != ''){
        $('#order_data').DataTable().destroy();
        fetch_data('yes', start_date, end_date);
    } else{
        alert("Por favor seleccione la fecha");
    }
  });

}); //End jQuery
</script>
