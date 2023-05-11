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
              $url="https://creator.zoho.com/api/json/gruporegiocal/view/Clientes_Oscar"; //Remisiones de Pedidos


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
foreach ( $data["Captura_cliente"] as $inv ) {
    //if($inv['Nombre_cliente']==$cliente){
        $a++;

        
    //}



/*
Array de CLIENTES ZOHO
                    [Pa_s] => MEXICO
                    [Tel_fono_primario] => +528115093978
                    [Colonia] => Los Elizondo
                    [N_mero_Exterior] => 106
                    [Ciudad] => Monterrey
                    [Nombre_del_contacto] =>  Mariza Venecia 
                    [Estado] => Nuevo León
                    [Municipio] => Escobedo
                    [Raz_n_social_de_cliente] => Electroconstructora Triple G
                    [R_F_C] => 
                    [C_digo_de_cliente] => Triple G
                    [Calle] => Escobedo
                    [ID] => 3816078000001996009
                    [C_digo_Postal] => 66050
                    [N_mero_Interior] => 

*** COLUMNAS SQL ***					
'id'
'codigo_cliente'
'razon_social'
'rfc'
'id_cliente_zoho'
'txt_id_cliente_zoho'
'municipio'
'calle'
'colonia'
'numero_int'
'numero_ext'
'ciudad'
'codigo_postal'
'estado'
'pais'
'nombre_contacto'
'telefono_contacto'
'email_contacto'
'created_at'
'created_by'
'updated_at'
'updated_by'
'activo'
	

    */

// Transformacion de Datos
    //$id		 			        = $inv['No_Pedido'];
    $codigo_cliente		        = "'" . $inv['C_digo_de_cliente'] . "'";
    $razon_social	 			= "'" . $inv['Raz_n_social_de_cliente'] . "'";
    $rfc						= "'" . $inv['R_F_C'] . "'";
    $id_cliente_zoho			= $inv['ID'];
    $txt_id_cliente_zoho		= "'" . $inv['ID'] . "'";
    $municipio					= "'" . $inv['Municipio'] . "'";
    $calle						= "'" . $inv['Calle'] . "'";
    $colonia					= "'" . $inv['Colonia'] . "'";
    $numero_int					= "'" . $inv['N_mero_Interior'] . "'";
    $numero_ext					= "'" . $inv['N_mero_Exterior'] . "'";
    $ciudad						= "'" . $inv['Ciudad'] . "'";
    $estado						= "'" . $inv['Estado'] . "'";
    $codigo_postal				= "'" . $inv['C_digo_Postal'] . "'";
    $pais						= "'" . $inv['Pa_s'] . "'";
    $nombre_contacto			= "'" . $inv['Nombre_del_contacto'] . "'";
    $telefono_contacto			= "'" . $inv['Tel_fono_primario'] . "'";
    $email_contacto				= "'Actualizar'";


$result=mysqli_query($con, "SELECT * from clientes where id_cliente_zoho='" . $id_cliente_zoho . "'");
if (mysqli_num_rows($result) > 0) {
    // EXISTE - IGNORAR
    //echo "ya existe el pedido" . $id . "<br>";
} else {
    // NO EXISTE - INSERTAR
    //echo "NO existe " . $id . "<br>";
$sql = "INSERT INTO clientes 
(codigo_cliente, razon_social, rfc, id_cliente_zoho, txt_id_cliente_zoho, municipio, calle, colonia, numero_int, numero_ext, ciudad, codigo_postal, estado, pais, nombre_contacto, telefono_contacto, email_contacto, created_at, created_by, activo)
VALUES ($codigo_cliente, $razon_social, $rfc, $id_cliente_zoho, $txt_id_cliente_zoho, $municipio, $calle, $colonia, $numero_int, $numero_ext, $ciudad, $codigo_postal, $estado, $pais, $nombre_contacto, $telefono_contacto, $email_contacto, created_at, 1, 1)
";
			  
echo $sql . "<br>";
$res = mysqli_query($con, $sql);

} 
} //FOR

// Actualizar Datos de Vendedor
/*
$sql = "UPDATE PEDIDOS SET id_vendedor = 4 WHERE UCASE(TXT_VENDEDOR) LIKE '%MARTINA%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE PEDIDOS SET id_vendedor = 5 WHERE UCASE(TXT_VENDEDOR) LIKE '%MANUEL%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE PEDIDOS SET id_vendedor = 6 WHERE UCASE(TXT_VENDEDOR) LIKE '%HECTOR%'";
$res = mysqli_query($con, $sql);

// Actualizar ID de Material
$sql="update pedidos join materiales on materiales.nombre_del_material = pedidos.txt_nombre_del_material set pedidos.id_material = materiales.id";
$res = mysqli_query($con, $sql);

//Actualizar Estatus de Pedidos
$sql="update pedidos join pedidos_estatus on pedidos_estatus.estatus_pedido = pedidos.txt_estatus_pedido set pedidos.id_estatus_pedido = pedidos_estatus.id";
$res = mysqli_query($con, $sql);

//Actualizar Registro Patronal
$sql = "UPDATE PEDIDOS SET id_registro_patronal = 1 WHERE UCASE(TXT_REGISTRO_PATRONAL) LIKE '%GRUPO%'";
$res = mysqli_query($con, $sql);

$sql = "UPDATE PEDIDOS SET id_registro_patronal = 2 WHERE UCASE(TXT_REGISTRO_PATRONAL) LIKE '%MINERALES%'";
$res = mysqli_query($con, $sql);
*/
//Cerrar Conexion a DB
mysqli_close($con);
?> 