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

<style>
img {
    width:50%;
}

#invoice{
    padding: 0px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 10px;
    border-bottom: 1px solid #3989c6;
}

.invoice .company-details {
    text-align: right;
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0;
}

.invoice .contacts {
    margin-bottom: 20px;
	padding-left:10px;
}

.invoice .invoice-to {
    text-align: left;
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0;
}

.invoice .invoice-details {
    text-align: right;
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6;
}

.invoice main {
    padding-bottom: 10px;
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px;
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6;
}

.invoice main .notices .notice {
    font-size: 1.2em;
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}
.invoice table td,.invoice table th {
	vertical-align:top;
    padding: 2px;
    background: #fff;
    /*border-bottom: 1px solid #333*/
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em;
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
}

.invoice table .no {
    color: #fff;
    background: #3989c6;
}

.invoice table .unit {
    /*background: #ddd;*/
}

.invoice table .total {
    background: #3989c6;
    color: #fff;
}

.invoice table tbody tr:last-child td {
    /*border: none*/
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa;
}

.invoice table tfoot tr:first-child td {
    border-top: none;
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6;
}

.invoice table tfoot tr td:first-child {
    border: none;
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 0px 0;
    
}
/*borrar pie de pagina Reoca Derechos rsv */
.main-footer {
    display:none;
}

#notas_remision {
    resize: none;
    border:none;
    background-color: #fff;
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important;
    }
    
    .invoice footer {
        position: absolute;
        bottom: 0px;
        page-break-after: always;
        
    }

    .invoice>div:last-child {
        page-break-before: always;
    }

    .main-footer {
        display:none;
    }
}
</style>
<?php //$GLOBALS['remover_footer']=true; 
$puesto = strtoupper($this->session->userdata('puesto'));
?>
<section class="content">

<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-left">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Imprimir</button>
            <button type="button" name="back" onClick="history.go(-1)" class="btn btn-danger pull-left" style="margin-right:5px;">Cancelar</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
      <div class="row">
        <div class="col-xs-4">
        <img src="<?= base_url() ?>public/dist/img/regiocal-oficial.png" alt="logo-mymisa">
        </div>
        <div class="col-xs-4">
        <img src="<?= base_url() ?>public/dist/img/mymisa.jpg" alt="logo-regiocal">
        </div> 
        <div class="col-xs-4">
        <tr>
        <td height="20px" style="padding:5px;">Fecha:</td><td height=""></td>
        </tr>
        <tr>
        <td><strong><?= $all_remisiones_complete_id['fecha_remision'] ?></strong></td>
        </tr>
        <hr>
        <tr>
        <td height="20px">No. REMISION </td><td height="20px"><strong><?=  $all_remisiones_complete_id['id_serie'] ?></strong></td>
        </tr>
        </div>
      </div> <!-- row -->
            </header>

            <main>
                <TABLE>
                <h4><b><?php echo $all_remisiones_complete_id['razon_social_re'] ?></b></h4>
                <tr>
                <td colspan="2">
                <table border="1" cellpadding="1" cellspacing="1">
                <tr>
                <td colspan="4" align="left"><strong>DATOS GENERALES</strong></td>
                </tr>
                <tr>
                <td>Cliente</td><td><?php echo $all_remisiones_complete_id["razon_social"]; ?></td>
                <td>Obra cliente</td><td><?php echo $all_remisiones_complete_id["obra_cliente"]; ?></td>
                </tr>
                <tr>
                <td width="14%">Sucursal</td><td width="36%" height="" ><?php echo $all_remisiones_complete_id["sucursal"]; ?></td>
                <td width="15%">Orden de compra</td><td width="35%" height=""><?php echo $all_remisiones_complete_id["orden_de_compra"]; ?></td>
                </tr>
                <tr>
                <td>Pedido</td><td height=""><?php echo $all_remisiones_complete_id['id_pedido'] ?></td>
                <td>Vendedor</td><td height=""><?= $all_remisiones_complete_id['nombre_vendedor'] ?></td>
                </tr>
                <tr>
                <td>Ticket</td><td height=""><?php echo $all_remisiones_complete_id['ticket_bascula'] ?></td>
                <td>Full o Sencilla</td><td height=""><?= $all_remisiones_complete_id['tipo_flete'] ?></td>
                
                </tr>
                <tr>
                <td>Hora de entrada</td><td height=""><?php echo $all_remisiones_complete_id["entrada_flete"]; ?></td>
                <td>Hora Salida</td><td width="35%" height=""><?php echo $all_remisiones_complete_id["salida_flete"]; ?></td>
                
                </tr>
                <tr>
                <td>Flete</td><td><?php echo $all_remisiones_complete_id['nombre_flete'] ?></td>
                <td>Operador</td height=""><td><?= $all_remisiones_complete_id['nombre_operador_flete'] ?></td>
                <!--<td>&nbsp;</td><td>&nbsp;</td>-->
                </tr>
                <tr>
                <td>Placas</td><td height=""><?php echo $all_remisiones_complete_id["placas_flete"]; ?></td>
                <td></td><td height=""></td>
                </tr>
                <!-- <td height="40px">Fecha </td><td height="40px"></td> -->
                </table>
                <br>
                </td>
                </tr>
                <tr>
                <td colspan="6">
                <table border="1" cellpadding="1" cellspacing="1">
                <tr> <!-- Segunda fila de campos -->
                <td align="center"><strong>MATERIAL</strong></td>
                <td align="center"><strong>Unidad</strong></td>
                <td align="center"><strong>Cantidad</strong></td>
                </tr>
                <tr>
                <td height="" align="center"><?php echo $all_remisiones_complete_id["nombre_del_material"]; ?>&nbsp;</td>
                <td height="" align="center">Toneladas</td>
                
                <td height="" align="center"><?php if($puesto == "ESPUELA") { echo $all_remisiones_complete_id['toneladas_remision']; } else { echo ($all_remisiones_complete_id['peso_final'] - $all_remisiones_complete_id['peso_inicial']);} ?></td>
                </tr>
                </table>
                </td>
                </tr>
                <TR>
                <TD width="50%">
                
                </TD>
                <TD width="50%">
                </TD>
                </TR>
                <tr>
                <td colspan="4" text-align="center">
                <?php
				//echo "FOOTER";
				?>
                </td>
                </tr>
                </TABLE>
                Observaciones:
                <textarea readonly name="notas_remision" class="form-control" id="notas_remision" value=""><?= $all_remisiones_complete_id['notas_remision']; ?></textarea>
            </main>
        </div>
        <!--NO BORRAR ESTE DIV-->
        <!-- <div></div> -->
    </div>
</div>

</section> 

<!-- Select2 -->
<script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.min.js"></script>
<!-- Page script -->
<script>
  $(function () {	  
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });


});
</script>
<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
<script>
$("#add_formato").addClass('active');
</script>    