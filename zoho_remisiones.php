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
              $url="https://creator.zoho.com/api/json/gruporegiocal/view/Remisiones_para_clientes"; //Remisiones de Pedidos
              $url="https://creator.zoho.com/api/json/gruporegiocal/view/Embarques_para_Oscar"; //Remisiones de Pedidos

              //$url="https://creator.zoho.com/api/json/gruporegiocal/view/Estatus_pedidos"; //Remisiones de Pedidos
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

    echo '<h2>JSON Decoded Response</h2>';
    //echo '<pre>';
     //print_r($data);
    //echo '</pre>';
	//exit();
//$con = mysqli_connect("localhost","regiocal_embarq","Silver11*123","regiocal_embarques"); // Server TuSite
if (is_array($data)) {
echo 'This is an array....';
$elementCount  = count($data);
echo $elementCount;
//echo count($data,COUNT_NORMAL);
foreach ($data as $key => $value) {
    echo $key.' - '.count($value);
}
} else {
echo 'This is not an array....';
exit();
}


$con = mysqli_connect("localhost","root","root","base_regiocal"); // LocalHost
//$con = mysqli_connect("localhost","regiocal_dash","Silver11*123","regiocal_dash"); // TuSite

// Convertir Currency a Float o Decimal
function toInt($str)
{
    return preg_replace("/([^0-9\\.])/i", "", $str);
}



if (mysqli_connect_errno())
  {
  echo "No me puedo conectar a MySQL: " . mysqli_connect_error();
  }

foreach ((array) $data["Captura_embarque"] as $inv) {	

/*
Array de Embarques/Remisiones ZOHO
                    [Cajas] => 2
                    [Salida] => 21:10
                    [Empresa] => GRUPO REGIO CAL SA DE CV
                    [Nombre_cliente] => ARCELORMITTAL MEXICO, S.A DE C.V.
                    [ESTACION_LOS_GARCIA] => 
                    [Captura_material.Hornos] => 1
                    [Cancelado] => 
                    [Pago_en_efectivo] => 
                    [Facturado] => 
                    [Precio_tonelada] => $ 1,490.00
                    [Ticket_field] => 26982
                    [Comentarios] => 
                    [Espuela] => 
                    [Full_o_sencillo] => Full
                    [No_Remisi_n] => 00058752
                    [Toneladas] => 25.01
                    [Gu_a] => $ 0.00
                    [Placas] => 92UE7K
                    [Fecha] => 30-Sep-2019
                    [Obra_de_cliente] => S/O
                    [Nombre_pedido] => 00266
                    [Meta_diaria_material] => 200
                    [Nombre_operador] => Timoteo Rodriguez
                    [Meta_mensual] => 6000
                    [ID] => 3816078000001817035
                    [Toneladas_pendientes] => 32649.08
                    [Meta_del_cliente_mensual] => 6000
                    [SIN_PAGO_EN_EFECTIVO] => 00058715
                    [Toneladas_pedidas_del_material] => 35000
                    [Cliente] => ARCELORMITTAL MEXICO, S.A DE C.V.
                    [Added_Time] => 30-Sep-2019 20:37:19
                    [CON_PAGO_EN_EFECTIVO] => 
                    [Cliente.ID] => 3816078000000065423
                    [Fase_de_remision] => Cargada
                    [Nombre_material] => Cal Dolomitica LH
                    [Destino] => 
                    [No_Orden_de_compra_cliente] => 1100150080
                    [Pedido] => 1
                    [Entrada] => 20:35
                    [Nombre_vendedor] => Héctor Davalos
                    [Fecha_de_venta] => 30-Sep-2019
                    [Nombre_flete] => Titanium Express
                    [Numero_de_guia] => 
                    [Total_remisi_n] => $ 37,264.90
                    [No_Factura] => 
                    [Selecciona_pedido] => 00266 - ARCELORMITTAL MEXICO, S.A DE C.V.						

*** COLUMNAS SQL ***					
COLUMN_NAME
id AutoIncrement
fecha_remision ok
id_pedido ok
id_cliente_zoho ok
txt_id_cliente_zoho ok
orden_de_compra_cliente no 
id_fase_de_remision no
txt_fase_de_remision
ticket_bascula no
nombre_flete ok
nombre_operador_flete no
placas_flete no
entrada_flete ok
salida_flete ok
destino_flete no
cajas_flete no
tipo_flete no
numero_guia_flete no
monto_guia_flete
toneladas_remision ok
toneladas_pedido ok
precio_tonelada --
monto_total_remision ok
toneladas_embarcadas ok
toneladas_diferencia ok
estatus_pedido ok
fecha_pedido ok
-- id_cliente ok
-- id_registro_patronal ok
notas ok
abono_cliente ok
monto_embarcado ok
saldo_pendiente ok
created_at
created_by				

    */

// Transformacion de Datos
    $id		 			        = toInt($inv['No_Remisi_n']);
    $fecha_remision				= "'" . date("Y-m-d" , strtotime($inv['Fecha'])) . "'"; //DATE
	if($inv['Nombre_pedido']=='')
		{
			$id_pedido	= 0;
		} else {
    		$id_pedido	= toInt($inv['Nombre_pedido']);
		}
	//$id_pedido					= toInt($inv['Nombre_pedido']);
	$txt_nombre_vendedor 		= "'" . $inv['Nombre_vendedor'] . "'";
	$id_cliente_zoho			= $inv['Cliente.ID'];
	$txt_id_cliente_zoho		= "'" . $inv['Cliente.ID'] . "'";
    $orden_de_compra			= "'" . $inv['No_Orden_de_compra_cliente'] . "'";
	$txt_fase_de_remision 		= "'" . $inv['Fase_de_remision'] . "'";
    $ticket_bascula				= "'" . $inv['Ticket_field'] . "'";
    $nombre_flete				= "'" . $inv['Nombre_flete'] . "'";
    $nombre_operador_flete		= "'" . $inv['Nombre_operador'] . "'";
    $placas_flete				= "'" . $inv['Placas'] . "'";
    $entrada_flete				= "'" . $inv['Entrada'] . "'";
    $salida_flete				= "'" . $inv['Salida']. "'"; 
    $destino_flete				= "'" . $inv['Destino'] . "'";
    $cajas_flete				= "'" . $inv['Cajas'] . "'";
    $tipo_flete					= "'" . $inv['Full_o_sencillo'] . "'";
    $numero_guia_flete			= "'" . $inv['Numero_de_guia'] . "'";
	if($inv['Gu_a']=='')
		{
			$monto_guia_flete	= 0.0;
		} else {
    		$monto_guia_flete	= toInt($inv['Gu_a']);
		}
		
	if(toInt($inv['Toneladas'])=='')
		{
			$toneladas_remision	= 0;
		} else {
    		$toneladas_remision	= toInt($inv['Toneladas']);
		}
		
	if(toInt($inv['Toneladas_pedidas_del_material'])=='')
		{
			$toneladas_pedido	= 0;
		} else {
    		$toneladas_pedido	= toInt($inv['Toneladas_pedidas_del_material']);
		}
    //$toneladas_pedido			= $inv['Toneladas_pedidas_del_material'];
	if(toInt($inv['Precio_tonelada'])=='')
		{
			$precio_tonelada	= 0;
		} else {
    		$precio_tonelada	= toInt($inv['Precio_tonelada']);
		}

	if(toInt($inv['Total_remisi_n'])=='')
		{
			$monto_total_remision	= 0;
		} else {
    		$monto_total_remision	= toInt($inv['Total_remisi_n']);
		}

	if(toInt($inv['Toneladas'])=='')
		{
			$toneladas_embarcadas	= 0;
		} else {
    		$toneladas_embarcadas	= toInt($inv['Toneladas']);
		}

	if(toInt($inv['Toneladas_pendientes'])=='')
		{
			$toneladas_diferencia	= 0;
		} else {
    		$toneladas_diferencia	= toInt($inv['Toneladas_pendientes']);
		}
    //$toneladas_diferencia		= toInt($inv['Toneladas_pendientes']);
    $txt_nombre_del_material	= "'" . $inv['Nombre_material'] . "'";
    $txt_registro_patronal		= "'" . $inv['Empresa'] . "'";
    //$fecha_pedido				= "'" . date("Y-m-d" , strtotime($inv['Fecha'])) . "'"; //DATE
	
	//$cliente					= $inv['Cliente'];
	//$id_cliente				= "'" .  $inv['Nombre_de_cliente.ID'] . "'";
	//$id_registro_patronal 		= "'" . $inv['Empresa'] . "'";
	$notas				 		= "'" . $inv['Comentarios'] . "'";
	$facturado				 	= "'" . $inv['Facturado'] . "'";
	$txt_num_factura			= "'" . $inv['No_Factura'] . "'";

	/*
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

$result=mysqli_query($con, "SELECT * from remisiones where id=" . $id);
if (mysqli_num_rows($result) > 0) {
    // EXISTE - IGNORAR
    //echo "ya existe la remision " . $id . "<br>";
} else {
    // NO EXISTE - INSERTAR
    echo "NO existe " . $id . "<br>";
	
	
$sql = "INSERT INTO remisiones 
(id, fecha_remision, id_pedido, txt_nombre_vendedor, id_cliente_zoho, txt_id_cliente_zoho, orden_de_compra, txt_fase_de_remision, ticket_bascula, nombre_flete, nombre_operador_flete, placas_flete, entrada_flete, salida_flete, destino_flete, cajas_flete, tipo_flete, numero_guia_flete, monto_guia_flete, toneladas_remision, toneladas_pedido, precio_tonelada, monto_total_remision, toneladas_embarcadas, toneladas_diferencia, notas, txt_nombre_del_material, txt_registro_patronal, facturado, txt_num_factura, created_by)
VALUES (
$id, $fecha_remision, $id_pedido, $txt_nombre_vendedor, $id_cliente_zoho, $txt_id_cliente_zoho, $orden_de_compra, $txt_fase_de_remision, $ticket_bascula, $nombre_flete, $nombre_operador_flete, $placas_flete, $entrada_flete, $salida_flete, $destino_flete, $cajas_flete, $tipo_flete, $numero_guia_flete, $monto_guia_flete, $toneladas_remision, $toneladas_pedido, $precio_tonelada, $monto_total_remision, $toneladas_embarcadas, $toneladas_diferencia, $notas, $txt_nombre_del_material, $txt_registro_patronal, $facturado, $txt_num_factura, 1)
";
			  
echo $sql . "<br>";
$res = mysqli_query($con, $sql);

} 
} //FOR

// Actualizar Fase de Remision

$sql = "update remisiones join remisiones_fases on remisiones.txt_fase_de_remision = remisiones_fases.fase_de_remision set remisiones.id_fase_de_remision = remisiones_fases.id";
$res = mysqli_query($con, $sql);

// Actualizar ID Cliente
$sql = "update remisiones join clientes on remisiones.id_cliente_zoho = clientes.id_cliente set remisiones.id_cliente = clientes.id";
$res = mysqli_query($con, $sql);

//Actualizar Registro Patronal
$sql = "UPDATE REMISIONES SET id_registro_patronal = 1 WHERE UCASE(TXT_REGISTRO_PATRONAL) LIKE '%GRUPO%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE REMISIONES SET id_registro_patronal = 2 WHERE UCASE(TXT_REGISTRO_PATRONAL) LIKE '%MINERALES%'";
$res = mysqli_query($con, $sql);

// Actualizar ESTATUS PEDIDO En Remision
$sql = "update remisiones join pedidos on remisiones.id_pedido = pedidos.id set remisiones.estatus_pedido = pedidos.id_estatus_pedido";
$res = mysqli_query($con, $sql);

// Actualizar ID_CLIENTE
$sql="update remisiones join clientes on clientes.id_cliente_zoho = remisiones.id_cliente_zoho set remisiones.id_cliente = clientes.id";
$res = mysqli_query($con, $sql);

// Actualizar Datos de Vendedor
$sql = "UPDATE REMISIONES SET id_vendedor = 4 WHERE UCASE(TXT_NOMBRE_VENDEDOR) LIKE '%MARTINA%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE REMISIONES SET id_vendedor = 5 WHERE UCASE(TXT_NOMBRE_VENDEDOR) LIKE '%MANUEL%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE REMISIONES SET id_vendedor = 6 WHERE UCASE(TXT_NOMBRE_VENDEDOR) LIKE '%HECTOR%'";
$res = mysqli_query($con, $sql);

// Actualizar ID de Material
$sql="update remisiones join materiales on materiales.nombre_del_material = remisiones.txt_nombre_del_material set remisiones.id_material = materiales.id";
$res = mysqli_query($con, $sql);

//Cerrar Conexion a DB
mysqli_close($con);
?> 