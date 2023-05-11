<?php

/*
    public function getInfoCalidadHorno1_2(){

        $host="localhost";
$usuario="root";
$contraseña="root";
$base="regiocal_dash";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		mysqli_connect_error());
}


        $query = $this->db->query("SELECT lh.hora as id_hora, lc.mgo, lc.cao, lc.pxc 
        FROM laboratorio_calhorno lc
        LEFT JOIN laboratorio_hora lh ON lc.id_hora = lh.id
        WHERE lc.fecha = CURDATE() AND lc.horno LIKE '%Horno 1%'
        ORDER BY lh.id DESC LIMIT 5;");


$query = $conexion->query("SELECT lh.hora as id_hora, lc.mgo, lc.cao, lc.pxc 
FROM laboratorio_calhorno lc
LEFT JOIN laboratorio_hora lh ON lc.id_hora = lh.id
WHERE lc.fecha = CURDATE() AND lc.horno LIKE '%Horno 1%'
ORDER BY lh.id DESC LIMIT 5;");
        
//$response = $query->result_array();

echo '<table class="table" style="font-size:12px; margin-top:-1%;">

				<tr class="active">
					<th>Hora</th>
					<th>MgO</th>
					<th>CaO</th>
                    <th>PxC</th>
				</tr>';

        while($response = $query->fetch_array(MYSQLI_BOTH)){

            echo'<tr>
            <td>'.$response['id_hora'].'</td>
            <td>'.$response['mgo'].'</td>
            <td>'.$response['cao'].'</td>
            <td>'.$response['pxc'].'</td>
            </tr>';
        }
echo '</table>'; 
           
        
        //return $response;
    }
 */

class Hornos_model extends CI_Model
{

    private $inventario = 'hornos_inventario';
    private $hornos = 'hornos_hornos';
    private $materiales = 'materiales';
    private $horas = 'hornos_hora';
    private $empleados = 'rh_empleados';
    private $bitacora = 'hornos_bitacora_diaria';
    private $equipo_paros = 'hornos_equipos_paros';
    private $motivos_paros = 'hornos_motivos_paros';
    private $paros = 'hornos_paros';
    private $meses = 'hornos_mes';
    private $programacion = 'hornos_programacion';
    private $consumo_gas = 'hornos_consumo_gas';
    private $atribuibleA = 'hornos_atribuible_a_paros';
    private $tolvas = 'hornos_inventario_tolvas';
    private $energia = 'hornos_calculo_energia_gral';
    private $sacos = 'hornos_sacos';
    private $balance_tolvas = 'hornos_balance_tolvas';

    public function __construct()
    {
        parent::__construct();
    }

    public function addAtribuibleAParos($data)
    {

        $this->db->insert($this->atribuibleA, $data);
        return true;
    }

    public function add_balance_tolvas($data)
    {

        $this->db->insert($this->balance_tolvas, $data);
        return true;
    }

    public function addBitacoraDiaria($toneladasPiedraH1H2)
    {

        $this->db->insert($this->bitacora, $toneladasPiedraH1H2);
        return true;
    }

    public function add_hornos_calculo_energia_gral($data)
    {

        $this->db->insert($this->energia, $data);
        return true;
    }

    public function add_hornos_consumo_gas($data)
    {

        $this->db->insert($this->consumo_gas, $data);
        return true;
    }

    public function addEntradas($data)
    {
        $this->db->insert($this->inventario, $data);
        return true;
    }

    public function addEquiposParos($data)
    {
        $this->db->insert($this->equipo_paros, $data);
        return true;
    }

    public function add_inventario_tolvas($data)
    {
        $this->db->insert($this->tolvas, $data);
        return true;
    }

    public function addMotivosParos($data)
    {
        $this->db->insert($this->motivos_paros, $data);
        return true;
    }

    public function addParos($data)
    {
        $this->db->insert($this->paros, $data);
        return true;
    }

    public function addProgramacion($data)
    {

        $this->db->insert($this->programacion, $data);
        return true;
    }

    public function add_sacos($data)
    {
        $this->db->insert($this->sacos, $data);
        return true;
    }

    public function getAtribuibleAParos()
    {

        $this->db->select('*');
        $this->db->from($this->atribuibleA);
        //$this->db->order_by('atribuible_a', 'DESCs');

        $response = $this->db->get();
        $result = $response->result_array();
        return $result;
    }

    public function getBalanceTolvas()
    {

        $this->db->select('*');
        $this->db->from($this->balance_tolvas);
        //$this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getCalculoEnergiaGeneral()
    {

        $this->db->select('*');
        $this->db->from($this->energia);
        //$this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getConsumoGasHornos()
    {

        $this->db->select('*');
        $this->db->from($this->consumo_gas);
        //$this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getInventarioTolvas()
    {

        $this->db->select('*');
        $this->db->from($this->tolvas);
        //$this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getValuesForBalanceTolvas($fecha)

    /* 
        BU
        "SELECT hbt.fecha, SUM(hbd.skips_cantidad) as 'total_skips_h1', 
         SUM(hbd.skips_cantidad_h2) as 'total_skips_h2', hbt.existencia_teorica_final, SUM(hbd.h3_produccion_tons_prod) as tons_prod_h3,
         (SELECT SUM(r.toneladas_remision) as 'total_toneladas' 
         FROM remisiones r WHERE r.id_material IN(5,6,7) AND r.chk_crg = 1 AND r.fecha_remision = '{$fecha}') as 'cal_embarcada', 
         (SELECT (hit.tolva_uno + hit.tolva_dos + hit.tolva_tres + hit.tolva_uno_a + hit.tolva_uno_c + hit.tolva_dos_a + hit.tolva_dos_b + hit.tolva_dos_c + hit.tolva_tres_a + hit.tolva_tres_b + hit.tolva_tres_c + IFNULL(hs.toneladas,0) + IFNULL(hs.recribado,0)) 
         FROM hornos_inventario_tolvas hit LEFT JOIN hornos_sacos hs ON hit.fecha = hs.fecha
         WHERE hit.fecha = '{$fecha}' AND hit.hora = 24) as 'inventario_tolvas' 
         FROM hornos_balance_tolvas hbt 
         LEFT JOIN hornos_bitacora_diaria hbd ON hbt.fecha = hbd.fecha WHERE hbt.fecha = '{$fecha}' 
         GROUP BY hbt.existencia_teorica_final"
    */
    {

        $sql = "";

        $sql .= "SELECT hbd.fecha, SUM(hbd.skips_cantidad) as 'total_skips_h1', SUM(hbd.skips_cantidad_h2) as 'total_skips_h2', SUM(hbd.h3_produccion_tons_prod) as tons_prod_h3, 

        (SELECT SUM(r.toneladas_remision) as 'total_toneladas' FROM remisiones r WHERE r.id_material IN(5,6,7) AND r.chk_crg = 1 AND r.fecha_remision = '{$fecha}') as 'cal_embarcada', 
        
        (SELECT IFNULL(existencia_teorica_final,0) FROM hornos_balance_tolvas WHERE fecha = '{$fecha}' - INTERVAL 1 DAY) as 'existencia_teorica_final',
        
        (SELECT (hit.tolva_uno + hit.tolva_dos + hit.tolva_tres + hit.tolva_uno_a + hit.tolva_uno_c + hit.tolva_dos_a + hit.tolva_dos_b + hit.tolva_dos_c + hit.tolva_tres_a + hit.tolva_tres_b + hit.tolva_tres_c + hit.cal_en_patio + IFNULL(hs.toneladas,0))
        FROM hornos_inventario_tolvas hit 
        LEFT JOIN hornos_sacos hs ON hit.fecha = hs.fecha WHERE hit.fecha = '{$fecha}' AND hit.hora = 24) as 'inventario_tolvas' 

        FROM hornos_bitacora_diaria hbd WHERE hbd.fecha = '{$fecha}' 
         #LEFT JOIN hornos_bitacora_diaria hbd ON hbt.fecha = hbd.fecha WHERE hbd.fecha = '{$fecha}' #GROUP BY hbt.existencia_teorica_final;";

        /* sacos
         SELECT (hit.tolva_uno + hit.tolva_dos + hit.tolva_tres + hit.tolva_uno_a + hit.tolva_uno_c + hit.tolva_dos_a + hit.tolva_dos_b + hit.tolva_dos_c + hit.tolva_tres_a + hit.tolva_tres_b + hit.tolva_tres_c) + (SELECT SUM(toneladas) + SUM(recribado) FROM hornos_sacos WHERE fecha = '2021-06-01') as 'inventario_tolvas y sacos' FROM hornos_inventario_tolvas hit WHERE hit.fecha = '2021-06-01' AND hit.hora = 24
         */


        $query = $this->db->query($sql);

        if ($query->num_rows() < 1) {

            $data = "No hay filas por mostrar";
            //print_r($data);
            return $data;
        } else {

            $data = $query->row_array();
            //print_r($data);
            return $data;
        }
    }

    function getValuesForConsumoGasHornos($fecha)
    {

        /* Query calculo energia general

        SELECT gc.metros_cubicos, gc.megacalorias, gc.densidad, gc.masa, ho.consumo_gas as 'consumo_planta_olivina_m3', (gc.metros_cubicos - ho.consumo_gas) as 'consumo_horno_m3', ROUND(((gc.megacalorias/gc.metros_cubicos)*(gc.metros_cubicos - ho.consumo_gas)),2) as 'mega_calorias_hornos', ROUND(gc.megacalorias - ((gc.megacalorias/gc.metros_cubicos)*(gc.metros_cubicos - ho.consumo_gas)),2) as 'mega_calorias_olivina', 
        ROUND((gc.megacalorias - ((gc.megacalorias/gc.metros_cubicos)*(gc.metros_cubicos - ho.consumo_gas)))/239,2) as 'gj_olivina'
        FROM gas_consumo gc
        INNER JOIN hornos_olivina ho ON gc.fecha = ho.fecha
        WHERE gc.fecha = '2021-05-10'

         */

        $sql = "";

        $sql .= "SELECT hceg.fecha, hceg.consumo_hornos_metros_cubicos, hceg.megacalorias_hornos, ROUND((hceg.megacalorias_hornos/239),2) as 'GJ', hbt.cal_producida_final_h1 as 'cal_prod_h1', hbt.cal_producida_final_h2 as 'cal_prod_h2',  hbt.cal_producida_final_h3 as 'cal_prod_h3', (hbt.cal_producida_final_h1+hbt.cal_producida_final_h2+hbt.cal_producida_final_h3) as 'cal_prod_final', 
        (SELECT ROUND(AVG(hbd.combustible_inferior), 2) FROM hornos_bitacora_diaria hbd WHERE hbd.fecha = '{$fecha}' AND hbd.horno_id = 1) as 'comb_inf_h1', 
        (SELECT ROUND(AVG(hbd.combustible_superior), 2) FROM hornos_bitacora_diaria hbd WHERE hbd.fecha = '{$fecha}' AND hbd.horno_id = 1) as 'comb_sup_h1',
        (SELECT ROUND(AVG(hbd.combustible_inferior), 2) FROM hornos_bitacora_diaria hbd WHERE hbd.fecha = '{$fecha}' AND hbd.horno_id = 2) as 'comb_inf_h2', 
        (SELECT ROUND(AVG(hbd.combustible_superior), 2) FROM hornos_bitacora_diaria hbd WHERE hbd.fecha = '{$fecha}' AND hbd.horno_id = 2) as 'comb_sup_h2',
        (SELECT 24 - SUM(tiempo) FROM hornos_paros WHERE fecha = '{$fecha}' AND horno_id = 1) as 'paro_h1',
        (SELECT 24 - SUM(tiempo) FROM hornos_paros WHERE fecha = '{$fecha}' AND horno_id = 2) as 'paro_h2',
        (SELECT 24 - SUM(tiempo) FROM hornos_paros WHERE fecha = '{$fecha}' AND horno_id = 3) as 'paro_h3'
        FROM hornos_calculo_energia_gral hceg
        LEFT JOIN hornos_balance_tolvas hbt ON hceg.fecha = hbt.fecha
        WHERE hceg.fecha = '{$fecha}'
        #GROUP BY ho.consumo_gas, ho.gigajoules, hbt.cal_producida_final_h1, hbt.cal_producida_final_h2,  hbt.cal_producida_final_h3";

        $query = $this->db->query($sql);

        if ($query->num_rows() <= 0) {

            $data = "No hay filas por retornar";
        } else {

            $data = $query->row_array();
        }

        return $data;
    }

    public function getEmbarquesToday()
    {

        $sql = "SELECT m.nombre_del_material as id_material, SUM(r.toneladas_remision) as 'total' 
        FROM remisiones r
        LEFT JOIN materiales m ON r.id_material = m.id
        WHERE r.id_material IN(5,6,7) AND r.chk_crg = 1 AND r.fecha_remision = CURDATE()
        GROUP BY r.id_material";

        $query = $this->db->query($sql);
        $response = $query->result_array();
        return $response;
    }

    /*
        SELECT COUNT(*) FROM remisiones WHERE id_material IN(5,6,7) AND chk_crg = 1 AND MONTH(fecha_remision) = MONTH(CURDATE());
     */

    public function getEmbarquesOfMonth()
    {

        $sql = "SELECT m.nombre_del_material as id_material, SUM(r.toneladas_remision) as 'total_mensual' 
        FROM remisiones r
        LEFT JOIN materiales m ON r.id_material = m.id
        WHERE r.id_material IN(5,6,7) AND r.chk_crg = 1 AND MONTH(r.fecha_remision) = MONTH(CURDATE())
        GROUP BY r.id_material";

        $query = $this->db->query($sql);
        $response = $query->result_array();
        return $response;
    }

    public function getEmpleados()
    {

        $this->db->select('id, CONCAT(nombre, " ", apellidos) as nombreCompleto');
        $this->db->from($this->empleados);
        //$this->db->where('id_puesto', 15);
        //$this->db->or_where('id_puesto', 57);
        $this->db->where('id_puesto', 70);
        $this->db->where('id_empleado_estatus', 1);
        //$this->db->or_where('id_puesto', 86);
        $this->db->order_by('nombre', 'ASC');

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    public function getEquipos()
    {

        $this->db->order_by('equipo', 'ASC');
        $query = $this->db->get($this->equipo_paros);

        return $result = $query->result_array();
    }

    

    public function getHoras()
    {

        $query = $this->db->get($this->horas);

        return $result = $query->result_array();
    }

    

    public function getHorno1()
    {

        $this->db->select('b.id, b.fecha, h.hora as hora, m.nombre_del_material as material_id, hornos.horno as horno_id, CONCAT(e.nombre, " ", e.apellidos) as hornero_en_turno, combustible_inferior, combustible_superior, aire_periferia, aire_inferior, aire_superior, relaciones_inferior, relaciones_superior, relaciones_global, temperatura_gases, temperatura_descarga, temperatura_cal, temperatura_ambiente, presion_mesa, presion_inferior, presion_superior, skips_cantidad, skips_toneladas_piedra, skips_toneladas_prod');
        $this->db->from($this->bitacora . ' b');
        $this->db->join($this->horas . ' h', 'h.id = b.hora', 'left');
        $this->db->join($this->materiales . ' m', 'm.id = b.material_id', 'left');
        $this->db->join($this->hornos . ' hornos', 'hornos.id = b.horno_id', 'left');
        $this->db->join($this->empleados . ' e', 'e.id = b.hornero_en_turno', 'left');
        $this->db->where('horno_id', 1);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getHorno2()
    {

        $this->db->select('b.id, b.fecha, h.hora as hora, m.nombre_del_material as material_id, hornos.horno as horno_id, CONCAT(e.nombre, " ", e.apellidos) as hornero_en_turno, combustible_inferior, combustible_superior, aire_periferia, aire_inferior, aire_superior, relaciones_inferior, relaciones_superior, relaciones_global, temperatura_norte, temperatura_sur, temperatura_promedio, temperatura_diferencia, temperatura_mesa,  presion_mesa, presion_inferior, presion_superior, skips_cantidad_h2, skips_toneladas_piedra, skips_toneladas_prod');
        $this->db->from($this->bitacora . ' b');
        $this->db->join($this->horas . ' h', 'h.id = b.hora', 'left');
        $this->db->join($this->materiales . ' m', 'm.id = b.material_id', 'left');
        $this->db->join($this->hornos . ' hornos', 'hornos.id = b.horno_id', 'left');
        $this->db->join($this->empleados . ' e', 'e.id = b.hornero_en_turno', 'left');
        $this->db->where('horno_id', 2);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getHorno3()
    {

        $this->db->select('b.id, b.fecha, h.hora as hora, m.nombre_del_material as material_id, hornos.horno as horno_id, CONCAT(e.nombre, " ", e.apellidos) as hornero_en_turno, h3_produccion_tons_piedra, h3_produccion_tons_prod, h3_ciclos_por_dia, h3_ciclos_calor_especifico_ent, h3_ciclos_calor_especifico_bajo, h3_ciclos_contador_de_gas, h3_ciclos_flujo_total_de_gas, h3_combustible_quemador_1, h3_combustible_quemador_2, h3_combustible_quemador_3, h3_factor_exceso_aire_quemador_1, h3_factor_exceso_aire_quemador_2, h3_factor_exceso_aire_quemador_3, h3_aires_factor_aire_enfriamiento, h3_aires_factor_aire_enfriamiento_centro, h3_aires_exceso_aire_factor_total, h3_aires_factor_enfriamiento_exceso, h3_gas_temperatura_horno_arriba, h3_gas_presion_horno_arriba, h3_agua_enf_temp_agua_enf, h3_agua_enf_num_enfriadores, h3_temp_cal_1, h3_temp_cal_2, h3_temp_cal_3, h3_temp_horno_1, h3_temp_horno_2, h3_temp_horno_3, h3_temp_horno_4, h3_temp_horno_5, h3_temp_horno_6, h3_aire_comprimido');
        $this->db->from($this->bitacora . ' b');
        $this->db->join($this->horas . ' h', 'h.id = b.hora', 'left');
        $this->db->join($this->materiales . ' m', 'm.id = b.material_id', 'left');
        $this->db->join($this->hornos . ' hornos', 'hornos.id = b.horno_id', 'left');
        $this->db->join($this->empleados . ' e', 'e.id = b.hornero_en_turno', 'left');
        $this->db->where('horno_id', 3);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getHornos()
    {

        $this->db->order_by('id', 'ASC');
        $query = $this->db->get($this->hornos);

        return $result = $query->result_array();
    }

    public function getInventario()
    {

        $this->db->select('m.nombre_del_material as material_id, SUM(i.toneladas) as toneladas_por_horno');
        $this->db->from($this->inventario . ' as i');
        //$this->db->join($this->hornos. ' as h', 'i.horno_id = h.id', 'left');
        $this->db->join($this->materiales . ' as m', 'i.material_id = m.id', 'left');
        //$this->db->group_by('h.horno');
        $this->db->group_by('i.material_id');


        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getMateriales()
    {

        $this->db->order_by('nombre_del_material', 'ASC');
        $this->db->where('horno_check', 1);
        $query = $this->db->get($this->materiales);

        return $result = $query->result_array();
    }

    public function getMaterialesSacos()
    {

        $this->db->order_by('nombre_del_material', 'ASC');
        $this->db->where('id', 6);
        $query = $this->db->get($this->materiales);

        return $result = $query->result_array();
    }

    public function getMes()
    {

        $query = $this->db->get($this->meses);

        return $query->result_array();
    }

    public function getMotivos()
    {

        $this->db->order_by('motivo', 'ASC');
        $query = $this->db->get($this->motivos_paros);

        return $result = $query->result_array();
    }

    

    public function getParos()
    {

        $this->db->select('p.id, p.fecha, h.horno as horno_id, mp.motivo as motivo_paro_id, ep.equipo as equipo_paro_id, p.tiempo, p.hora_inicio, p.hora_final, p.atribuido_a, p.comentarios');
        $this->db->from($this->paros . ' p');
        $this->db->join($this->hornos . ' h', 'p.horno_id = h.id', 'left');
        $this->db->join($this->motivos_paros . ' mp', 'p.motivo_paro_id = mp.id', 'left');
        $this->db->join($this->equipo_paros . ' ep', 'p.equipo_paro_id = ep.id', 'left');
        //$this->db->order_by('p.id', 'DESC');

        $response = $this->db->get();
        $result =  $response->result_array();
        return $result;
    }

    public function getProgramacion()
    {

        $this->db->select('*');
        $this->db->from($this->programacion);
        //$this->db->order_by('id', 'DESC');

        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function getSacos()
    {

        $this->db->select('*');
        $this->db->from($this->sacos);

        $query = $this->db->get();

        $response = $query->result_array();
        return $response;
    }

    public function getInfoCalidadHorno1()
    {

        $query = $this->db->query("SELECT lh.hora as id_hora, lc.mgo, lc.cao, lc.pxc 
        FROM laboratorio_calhorno lc
        LEFT JOIN laboratorio_hora lh ON lc.id_hora = lh.id
        WHERE lc.fecha = CURDATE() AND lc.horno LIKE '%Horno 1%'
        ORDER BY lh.id DESC LIMIT 5;
        ");

        $response = $query->result_array();

        return $response;
    }

    public function getInfoCalidadHorno1_2()
    {

        $query = $this->db->query("SELECT lh.hora as id_hora, lc.mgo, lc.cao, lc.pxc 
        FROM laboratorio_calhorno lc
        LEFT JOIN laboratorio_hora lh ON lc.id_hora = lh.id
        WHERE lc.fecha = CURDATE() AND lc.horno LIKE '%Horno 1%'
        ORDER BY lh.id DESC LIMIT 5;");


        echo '<table class="table" table table-condensed table-responsive>

				<tr>
					<th>Hora</th>
					<th>MgO</th>
					<th>CaO</th>
                    <th>PxC</th>
				</tr>';

        while ($response = $query->unbuffered_row()) {

            echo '<tr>
            <td>' . $response->id_hora . '</td>
            <td>' . $response->mgo . '</td>
            <td>' . $response->cao . '</td>
            <td>' . $response->pxc . '</td>
            </tr>';
        }
        echo '</table>';

        return exit();
    }

    public function getInfoCalidadHorno2()
    {

        $query = $this->db->query("SELECT lh.hora as id_hora, lc.mgo, lc.cao, lc.pxc 
        FROM laboratorio_calhorno lc
        LEFT JOIN laboratorio_hora lh ON lc.id_hora = lh.id
        WHERE lc.fecha = CURDATE() AND lc.horno LIKE '%Horno 2%'
        ORDER BY lh.id DESC LIMIT 5;
        ");

        $response = $query->result_array();
        return $response;
    }

    public function getInfoCalidadHorno3()
    {

        $query = $this->db->query("SELECT lh.hora as id_hora, lc.mgo, lc.cao, lc.pxc 
        FROM laboratorio_calhorno lc
        LEFT JOIN laboratorio_hora lh ON lc.id_hora = lh.id
        WHERE lc.fecha = CURDATE() AND lc.horno LIKE '%Horno 3%'
        ORDER BY lh.id DESC LIMIT 5;
        ");

        $response = $query->result_array();
        return $response;
    }

    public function getInfoTableroHornos()
    {

        $query1 = $this->db->query("SELECT (SELECT IFNULL(SUM(skips_toneladas_prod),0) FROM hornos_bitacora_diaria WHERE horno_id = 1 AND fecha = CURDATE()) as 'total_cal_h1', 
        (SELECT IFNULL(SUM(skips_toneladas_prod),0) FROM hornos_bitacora_diaria WHERE horno_id = 2 AND fecha = CURDATE()) as 'total_cal_h2', 
        IFNULL((h3_produccion_tons_prod),0) as 'total_cal_h3' 
        FROM hornos_bitacora_diaria 
        WHERE horno_id = 3 AND fecha = CURDATE() AND hora = 24");

        //$query2 = $this->db->query("SELECT IFNULL(ROUND(SUM(cal_producida_final_h1 + cal_producida_final_h2 + cal_producida_final_h3),2),0) as total_cal_mensual FROM hornos_balance_tolvas WHERE MONTH(fecha) = MONTH(CURDATE())");

        $response = $query1->row_array();
        
        return $response;
    }

    public function getSumaTotalCalHoy(){

            $query = $this->db->query(
            "SELECT IFNULL(SUM(hbd.skips_toneladas_prod),0) + IFNULL((SELECT h3_produccion_tons_prod FROM hornos_bitacora_diaria WHERE horno_id = 3 AND fecha = CURDATE() AND hora = 24),0) as 'suma_total_cal_hoy'
            FROM hornos_bitacora_diaria hbd 
            WHERE hbd.horno_id IN(1,2) AND hbd.fecha = CURDATE();"
            );

            $response = $query->row_array();
            //var_dump($response);
            return $response;
    }


    public function getSumaTotalCalMes(){

        $query = $this->db->query(
            "SELECT (
            (SELECT SUM(skips_toneladas_prod) FROM hornos_bitacora_diaria WHERE horno_id = 1 AND MONTH(fecha) = MONTH(CURDATE())) + 
            (SELECT SUM(skips_toneladas_prod) FROM hornos_bitacora_diaria WHERE horno_id = 2 AND MONTH(fecha) = MONTH(CURDATE()))
            ) + SUM(h3_produccion_tons_prod) as 'suma_total_cal_mes'
            FROM hornos_bitacora_diaria 
            WHERE horno_id = 3 AND MONTH(fecha) = MONTH(CURDATE()) AND hora = 24");

        $response = $query->row_array();
        return $response;
    }

    public function getSumaTotalCalMesHorno1(){

        $query = $this->db->query("SELECT IFNULL(ROUND(SUM(skips_toneladas_prod),2),0) as 'total_mes_horno1'
        FROM hornos_bitacora_diaria
        WHERE horno_id = 1 AND MONTH(fecha) = MONTH(CURDATE())");

        $response = $query->row_array();

        return $response;

    }

    public function getSumaTotalCalMesHorno2(){

        $query = $this->db->query("SELECT IFNULL(ROUND(SUM(skips_toneladas_prod),2),0) as 'total_mes_horno2'
        FROM hornos_bitacora_diaria
        WHERE horno_id = 2 AND MONTH(fecha) = MONTH(CURDATE())");

        $response = $query->row_array();

        return $response;
    }

    public function getSumaTotalCalMesHorno3(){

        $query = $this->db->query("SELECT SUM(h3_produccion_tons_prod) as 'total_mes_horno3'
        FROM hornos_bitacora_diaria
        WHERE horno_id = 3 AND MONTH(fecha) = MONTH(CURDATE()) AND hora = 24");

        $response = $query->row_array();

        return $response;
    }

    public function getTotalCalHoyHorno1(){

        $query = $this->db->query(
        "SELECT IFNULL(ROUND(SUM(skips_toneladas_prod),2),0) as 'total_cal_hoy_h1' 
        FROM hornos_bitacora_diaria
        WHERE horno_id = 1 AND fecha = CURDATE()"
        );

        $response = $query->row_array();
        return $response;
    }

    public function getTotalCalHoyHorno2(){

        $query = $this->db->query(
        "SELECT IFNULL(ROUND(SUM(skips_toneladas_prod),2),0) as 'total_cal_hoy_h2' 
        FROM hornos_bitacora_diaria
        WHERE horno_id = 2 AND fecha = CURDATE()"
        );

        $response = $query->row_array();
        return $response;
    }

    public function getTotalCalHoyHorno3(){

        $query = $this->db->query(
        "SELECT IFNULL(ROUND(h3_produccion_tons_prod,2),0) as 'total_cal_hoy_h3'
        FROM hornos_bitacora_diaria 
        WHERE horno_id = 3 AND fecha = CURDATE()
        ORDER BY hora DESC LIMIT 1"
        );

        $response = $query->row_array();
        return $response;
    }


    public function getValuesForCalculoEnergiaGral($fecha)
    {

        $query = $this->db->query("SELECT gc.metros_cubicos as m3, gc.megacalorias, (gc.metros_cubicos - ho.consumo_gas) as 'consumo_hornos_m3', ho.consumo_gas as 'consumo_olivina', ROUND(((gc.megacalorias/gc.metros_cubicos) * (gc.metros_cubicos - ho.consumo_gas)),2) as 'mega_calorias_hornos', ROUND(gc.megacalorias -((gc.megacalorias/gc.metros_cubicos) * (gc.metros_cubicos - ho.consumo_gas)),2) as 'mega_calorias_olivina', ho.gigajoules as 'gj_olivina', gc.densidad, gc.masa
        FROM gas_consumo gc
        LEFT JOIN hornos_olivina ho ON ho.fecha = gc.fecha
        WHERE gc.fecha = '{$fecha}'");

        $response = $query->row_array();

        return $response;
    }

    public function getParosById($id){
        $this->db->select('*');
        $this->db->from($this->paros);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
        
    }

    
    public function edit_paros($data, $id){
        $this->db->where('id', $id);
        $this->db->update($this->paros, $data);
        echo $this->db->last_query();
        return true;
    }

    public function getTolvasById($id){
        $this->db->select('*');
        $this->db->from($this->tolvas);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result =$query->row_array();
        return $result;
    }
    

    public function edit_tolvas($data,$id){
        $this->db->where('id',$id);
        $this->db->update($this->tolvas, $data);
        echo $this->db->last_query();
        return true;
    }

    public function getBitacoraDiariaById($id){
        $this->db->select('*');
        $this->db->from($this->bitacora);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result =$query->row_array();
        return $result;
    }

    public function edit_bitacora_diaria($data,$id){
        $this->db->where('id',$id);
        $this->db->update($this->bitacora, $data);
        echo $this->db->last_query();
        return true;
    }
}
