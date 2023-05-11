 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  
<style>
.big-col {
  width: 100px !important;
}

table#example1 {
  table-layout:fixed;
}

.plus {
  margin-left: 10px;
  font-size: 18px;
  color: #73C6B6;
}

.center {
  text-align:center;
}

.azul {
  background-color: #81d4fa !important;
}

.fila.azul {
  background-color: #81d4fa !important;
}

.main-footer{
  display: none;
}

input[type=checkbox] {

position: relative;

width: 40px;

height: 20px;

-webkit-appearance: none;

background: #c6c6c6;


outline: none;


border-radius: 20px;

box-shadow: inset 0 0 5px #BEBCBE;

transition: 0.5s;

}

input:checked[type=checkbox] {

background: #00C853;

}

input[type=checkbox]::before {

content: '';

position: absolute;

width: 20px;

height: 20px;

background: #fff;

border-radius: 20px;

top: 0;

left: 0;

box-shadow: 0 2px 5px #BEBCBE;

transition: 0.5s;

-webkit-appearance: none;

}

input:checked[type=checkbox]::before {

left:25px;

}

input[type=file]:focus, input[type=checkbox]:focus, input[type=radio]:focus {
    outline: none;
    outline-offset: none;
}
/*
.answerBtnsSelected{
  background-color: blue;
}
*/
</style>

<?php
$puesto = strtoupper($this->session->userdata('puesto'));
$isBascula = $puesto == "BASCULA";
$isTI = $puesto == "DESARROLLADOR";
$isVigilancia = $puesto == "GUARDIA";
?>

<?php //if($isTI || $isBascula):?>
 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Entradas Camiones Espera</h3>
    </div>
    <?php // if($isVigilancia): ?>
      <a href="<?= base_url('admin/espera/espera_add/');?>"><i class="fa fa-plus plus" aria-hidden="true"></i>&nbsp&nbsp<label for="" class="">Nueva Entrada</label></a>
    <?php // endif;?>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped " style="width:100%">
        <thead>
        <tr>
          <th style="width: 25px;" class="text-center">Id</th>
          <th style="width: 75px;" class="text-center">Pedido</th>
          <th style="width: 120px;" class="text-center">Material</th>
          <th style="width: 230px;" class="text-center">Cliente</th>
          <th style="width: 150px;" class="text-center">Operador</th>
          <th style="width: 120px;" class="text-center">Flete</th>
          <th style="width: 140px;" class="text-center">Fecha y Hora</th>
          <th style="width: 110px;" class="text-center">Autorizar</th>
          <th style="width: 100px;" class="text-center">Cancelar</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($remisiones_espera as $row):?>
          <?php 
              if($row['id_estatus_espera']==1)
              {
                $bg="style='background-color:#EEE8AA'"; 
                $disa = "";
              } else {
                $bg="style='background-color:#3CB371'";
                $disa = "disabled";
              }
          ?>
          <tr class="fila" id="fila" <?php echo $bg ?>>
            <td class="center"><?= $row['id']?></td>
            <td class="center"><?= $row['id_pedido']?></td>
            <td class="center"><?= $row['nombre_del_material']?></td>
            <td class="center"><?= $row['razon_social']?></td>
            <td class="center"><?= $row['nombre_operador_flete']?></td>
            <td class="center"><?= $row['nombre_flete']?></td>
            <td class="center"><?= $row['fecha_espera']?></td>
            <td class="center" >
            <?php if($row['id_estatus_espera']==1){ 
            $disabled = "";
            if($puesto == "GUARDIA"){$disabled = "disabled";}    
            ?>
            <a href="<?php echo base_url('admin/espera/cambiar_estatus_en_espera/'.$row['id']); ?>">
            <input type="button" value="Autorizar" class="btn btn-info btn-sm" name="checkbox1" id="prueba" <?php echo $disabled; ?> />
            </a>
            <?php } elseif($row['id_estatus_espera']==2) { ?>
            <a href="<?php echo base_url('admin/remisiones/add_remision_espera/'.$row['id']); ?>">
            <input type="button" value="Autorizada" class="btn btn-info btn-sm" name="checkbox1" id="prueba" disabled/>
            </a>
            <?php } ?>
            </td>
            <td class="center">
            <?php if($row['id_estatus_espera']==1){ ?>
            <a href="<?php echo base_url('admin/espera/cambiar_estatus_en_espera_cancelar/'.$row['id']); ?>">
            <input type="button" value="Cancelar" class="btn btn-info btn-sm" name="checkbox1" id="prueba" />
            </a>
            <?php } else { ?>
              <a href="<?php echo base_url('admin/espera/cambiar_estatus_en_espera_cancelar/'.$row['id']); ?>">
            <input type="button" value="Cancelar" class="btn btn-info btn-sm" name="checkbox1" id="prueba" disabled />
            </a>
            <?php } ?>
            </td>
            <!--
            <input type="button" value="Entrada" class="btn btn-info" name="checkbox1" onclick="colorSwitch();"/>
            -->
            <!--<a href="" class="btn btn-info btn-flat" onclick="chkboxcolorrow(this);">Dar Entrada</a> --> <!-- <a href="<?//= base_url('admin/pedidos/edit/'.$row['id']); ?>" class="btn btn-info btn-flat">Cancelar</a>
             Boton bascula #1: Autorizar entrada - Boton bascula #2: Remisionar -->
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  </section>  
<?php //endif; ?>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
    "aaSorting": [[1,'desc']
  } );
  });
</script> 
<script>
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
$("#view_users").addClass('active');



function chkboxcolorrow(result)
			{
				if (result.checked)
				{
					result.parentNode.parentNode.style.backgroundColor="#81d4fa ";
					result.parentNode.parentNode.style.color=" #17202a ";

				}else{
					result.parentNode.parentNode.style.backgroundColor="";
					result.parentNode.parentNode.style.color="";
				}

			}

      function hideRow(result)
{
        result.parentNode.parentNode.style.display = "none";
        return true;

}


/*
function chkboxcolorrow(result)
			{
				if (result.click)
				{
					backChange = result.parentNode.parentNode.style.backgroundColor="#81d4fa ";
					colorChange = result.parentNode.parentNode.style.color=" #17202a ";

				} else{
					result.parentNode.parentNode.style.backgroundColor="";
					result.parentNode.parentNode.style.color="";
        }
}

var btn = document.getElementById('btn'),
  fila = document.getElementById('fila'),
    contador = 0;

function colorSwitch() {

  if(contador == 0){
    fila.classList.add('azul');
    contador=1;
  } else {
    fila.classList.remove('azul');
    contador = 0;
  }
}

btn.addEventListener('click', colorSwitch, true);
*/
</script>