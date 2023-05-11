<?php
//include_once '../RegioCal/sitio/pedidos/zoho_methods.php';  
//$AUTH_TOKEN = '65787dff499618f566447c05337a0289';  
//$zoho_api = new Zoho($AUTH_TOKEN);  
//$email = 'Lezlie-craghead@craghead.org';  
//$zoho_result = $zoho_api->get_records_by_searching('Leads', '(Email:$email)');


/* GET RECORDS 

$zoho_api = new Zoho($AUTH_TOKEN);
$lead_index=1;
while (true) {
    $to_index = $lead_index+99;
    $response = $zoho_api->get_records('Leads',$lead_index,$to_index,[],false,'Created_Time',true);
    $lead_count=0;
    if (0==count($response)) break;
    $zoho_data = array();
    foreach ($response as $current_lead) {
        $record = array();
        $record['Id'] = $current_lead['LEADID'];
        $record['Lead Status']='Pending';
        $zoho_data[] = $record;
    }
    //$zoho_api->update_records('Leads', $zoho_data);
    $lead_index+=100;
}
/* ================================== */



              $cliente='TERNIUM MEXICO, S.A DE C.V.aaa';
              $criteria='Nombre_cliente';
              $str = "&" . $criteria . "==('" . $cliente . "')";
              //echo $str . "<br>";
              $token='65787dff499618f566447c05337a0289';  //dev
			  $token='6152741453100cb806dd0e7e0f8fc762';  //prod
			  $url="https://creator.zoho.com/api/json/gruporegiocal/formsandviews";//?authtoken=".token."&scope=crmapi";
              $url="https://creator.zoho.com/api/json/gruporegiocal/view/Bit_cora_de_embarques_generales"; //Bit_cora_de_embarques_generales
              $url="https://creator.zoho.com/api/json/gruporegiocal/view/Remisiones_de_los_pedidos"; //Remisiones de Pedidos
              $url="https://creator.zoho.com/api/json/gruporegiocal/view/Estatus_pedidos"; //Remisiones de Pedidos
              //$url="https://creator.zoho.com/api/json/gruporegiocal/view/Estatus_de_pedidos_embarques"; //Remisiones de Pedidos


              $param = "authtoken=".$token."&scope=creator&raw=true&limit=30000";
              //$param = $param . $str;
              //$param = $param . "&criteria=(" . $criteria;
              //$param = $param . "==" . $cliente . ")";
              //$param = $param . "&value='(" . $cliente. ")'";
              //echo $url.$param;
              //&newFormat=2&selectColumns=All&version=2&toIndex=2000&fromIndex=-1";
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, $url);
			  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
              curl_setopt($ch, CURLOPT_POST, 1);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
			  
			  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);        
			  
              $result = curl_exec($ch);
              curl_close($ch);
              //echo $result;
              //return $result;
			    //echo '<h2>API Response</h2>';
    			//print_r($result);
				
    $data = (json_decode($result,true));

    //echo '<h2>JSON Decoded Response</h2>';
    //echo '<pre>';
     //print_r($data);
    //echo '</pre>';
	//exit();
//$con = mysqli_connect("localhost","root","root","base_regiocal"); // LocalHost
$con = mysqli_connect("localhost","regiocal_dash","Silver11*123","regiocal_dash"); // TuSite


// Convertir Currency a Float o Decimal
function toInt($str)
{
    return preg_replace("/([^0-9\\.])/i", "", $str);
}



if (mysqli_connect_errno())
  {
  echo "No me puedo conectar a MySQL: " . mysqli_connect_error();
  }

	$a=0;
foreach ( $data["Captura_pedido"] as $inv ) {
    //if($inv['Nombre_cliente']==$cliente){
        $a++;

        
    //}



/*
Array de Pedidos ZOHO
                    [Monto_embarcado] => 
                    [Empresa] => GRUPO REGIO CAL SA DE CV
                    [Orden_de_compra_relacionada] => 
                    [Material] => 
                    [No_Pedido] => 00002
                    [Precio_por_tonelada] => $ 25.00
                    [Nombre_vendedor] => Manuel Yerena
                    [Saldo_pendiente] => 
                    [Toneladas] => 10
                    [Fecha] => 23-May-2019
                    [Monto_total] => $ 250.00
                    [Diferencia_de_toneladas] => 0
                    [Obra_de_cliente] => 
                    [Toneladas_embarcadas] => 0
                    [ID] => 3816078000000832003
                    [Abono_del_cliente] => $ 0.00
                    [Estado_de_pedido] => Creado

*** COLUMNAS SQL ***					
id -- ok
id_vendedor -- ok - convertir
orden_de_compra -- ok
id_forma_de_pago ***??
id_material -- ok - convertir
nombre_del_material -- ok
toneladas -- ok
precio_tonelada -- ok
monto_total -- ok
toneladas_embarcadas -- ok
toneladas_diferencia -- ok
estatus_pedido -- ok - convertir
fecha_pedido - ok
id_cliente - ok 
id_registro_patronal - ok - convertir de txt_registro_patronal
notas
abono_cliente - ok
monto_embarcado - ok
saldo_pendiente - ok
obra_cliente - ok
created_at
created_by
updated_at
updated_by					

    */

// Transformacion de Datos
    $id		 			        = $inv['No_Pedido'];
    $txt_vendedor		        = "'" . $inv['Nombre_vendedor'] . "'";
    $orden_de_compra 			= "'" . $inv['Orden_de_compra_relacionada'] . "'";
    $nombre_del_material		= "'" . $inv['Material'] . "'";
    $toneladas					= $inv['Toneladas'];
    $precio_tonelada			= toInt($inv['Precio_por_tonelada']);
    $monto_total				= toInt($inv['Monto_total']);
    $toneladas_embarcadas		= $inv['Toneladas_embarcadas'];
    $toneladas_diferencia		= $inv['Diferencia_de_toneladas'];
    $txt_estatus_pedido			= "'" . $inv['Estado_de_pedido'] . "'";
    $fecha_pedido				= "'" . date("Y-m-d" , strtotime($inv['Fecha'])) . "'"; //DATE
	$id_cliente_zoho			= $inv['Nombre_de_cliente.ID'];
	$txt_id_cliente_zoho		= "'" .  $inv['Nombre_de_cliente.ID'] . "'";
	$txt_registro_patronal 		= "'" . $inv['Empresa'] . "'";

	if(toInt($inv['Abono_del_cliente'])=='')
		{
			$abono_cliente	= 0.00;
		} else {
    		$abono_cliente	= toInt($inv['Abono_del_cliente']);
		}

	if(toInt($inv['Monto_embarcado'])=='')
		{
			$monto_embarcado	= 0.00;
		} else {
    		$monto_embarcado	= toInt($inv['Monto_embarcado']);
		}

	if(toInt($inv['Saldo_pendiente'])=='')
		{
			$saldo_pendiente	= 0.00;
		} else {
    		$saldo_pendiente	= toInt($inv['Saldo_pendiente']);
		}

    $obra_cliente				= "'" . $inv['Obra_de_cliente'] . "'";
    //$estafecha= $inv['Fecha'];
    //$Fecha						= "'" . date("Y-m-d" , strtotime($estafecha)) . "'"; //DATE
    //$estafecha= $inv['Fecha'];
    //echo $inv['Fecha'] . "-" . $estafecha . " => " . date("Y-m-d" , strtotime($estafecha)) . "<br>";//     	$inv['Fecha']; 
    /*$Nombre_operador			= "'" . "" . "'";
	$ID							= "'" . $inv['ID'] . "'";
    $Nombre_cliente				= "'" . $inv['Nombre_cliente'] . "'";
    $Salida                     = "'" . $inv['Salida'] . "'";
    $Entrada                    = "'" . $inv['Entrada'] . "'";
    $Added_Time                 = "'" . "" . "'"; //DATETIME
    $Cliente_ID                 = "'" . $inv['Cliente.ID'] . "'";
    $Toneladas_pedidas_del_material                 = "'" . $inv['Toneladas_pedidas_del_material'] . "'";

    
    //echo $a . " - " . $inv['Nombre_cliente'] . " - Original: " . $inv['Added_Time'] . " Convertido: " . $Added_Time . "<br>";

*/

// EMBARQUES
// CHECAR SI EXISTE REGISTRO DE No_remision

$result=mysqli_query($con, "SELECT * from pedidos where id=" . $id);
if (mysqli_num_rows($result) > 0) {
    // EXISTE - IGNORAR
    //echo "ya existe el pedido" . $id . "<br>";
} else {
    // NO EXISTE - INSERTAR
    //echo "NO existe " . $id . "<br>";
$sql = "INSERT INTO pedidos 
(id, txt_vendedor, orden_de_compra, txt_nombre_del_material, toneladas, precio_tonelada, monto_total, toneladas_embarcadas, toneladas_diferencia, txt_estatus_pedido, fecha_pedido, id_cliente_zoho, txt_id_cliente_zoho, txt_registro_patronal, abono_cliente, monto_embarcado, saldo_pendiente, obra_cliente, created_by)
VALUES (
$id, $txt_vendedor, $orden_de_compra, $nombre_del_material, $toneladas, $precio_tonelada, $monto_total, $toneladas_embarcadas, $toneladas_diferencia, $txt_estatus_pedido, $fecha_pedido, $id_cliente_zoho, $txt_id_cliente_zoho, $txt_registro_patronal, $abono_cliente, $monto_embarcado, $saldo_pendiente, $obra_cliente, 1)
";
			  
echo $sql . "<br>";
$res = mysqli_query($con, $sql);

} 
} //FOR

// Actualizar Datos de Vendedor
$sql = "UPDATE pedidos SET id_vendedor = 4 WHERE UCASE(TXT_VENDEDOR) LIKE '%MARTINA%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE pedidos SET id_vendedor = 5 WHERE UCASE(TXT_VENDEDOR) LIKE '%MANUEL%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE pedidos SET id_vendedor = 6 WHERE UCASE(TXT_VENDEDOR) LIKE '%HECTOR%'";
$res = mysqli_query($con, $sql);

// Actualizar ID de Material
$sql="update pedidos join materiales on materiales.nombre_del_material = pedidos.txt_nombre_del_material set pedidos.id_material = materiales.id";
$res = mysqli_query($con, $sql);

//Actualizar Estatus de Pedidos
$sql="update pedidos join pedidos_estatus on pedidos_estatus.estatus_pedido = pedidos.txt_estatus_pedido set pedidos.id_estatus_pedido = pedidos_estatus.id";
$res = mysqli_query($con, $sql);

//Actualizar Registro Patronal
$sql = "UPDATE pedidos SET id_registro_patronal = 1 WHERE UCASE(TXT_REGISTRO_PATRONAL) LIKE '%GRUPO%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE pedidos SET id_registro_patronal = 2 WHERE UCASE(TXT_REGISTRO_PATRONAL) LIKE '%MINERALES%'";
$res = mysqli_query($con, $sql);

// Actualizar ID_CLIENTE
$sql="update pedidos join clientes on clientes.id_cliente_zoho = pedidos.id_cliente_zoho set pedidos.id_cliente = clientes.id";
$res = mysqli_query($con, $sql);


//Cerrar Conexion a DB
mysqli_close($con);
?> 