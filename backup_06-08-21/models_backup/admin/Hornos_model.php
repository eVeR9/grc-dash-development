<?php

class Hornos_model extends CI_Model{

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

    public function __construct(){
        parent::__construct();
    }

    public function addBitacoraDiaria($toneladasPiedraH1H2){

        $this->db->insert($this->bitacora, $toneladasPiedraH1H2);
        return true;
    }

    public function addEntradas($data){
        $this->db->insert($this->inventario, $data);
        return true;
    }

    public function addEquiposParos($data){
        $this->db->insert($this->equipo_paros, $data);
        return true;
    }

    public function add_inventario_tolvas($data){
        $this->db->insert($this->tolvas, $data);
        return true;
    }

    public function addMotivosParos($data){
        $this->db->insert($this->motivos_paros, $data);
        return true;
    }

    public function addParos($data){
        $this->db->insert($this->paros, $data);
        return true;
    }

    public function addProgramacion($data){

        $this->db->insert($this->programacion, $data);
        return true;
    }

    public function add_sacos($data){
        $this->db->insert($this->sacos, $data);
        return true;
    }

    public function getValuesForBalanceTolvas($fecha){

        /* old
        SELECT hbt.fecha, SUM(hbd.skips_cantidad) as 'total_skips_h1', SUM(hbd.skips_cantidad_h2) as 'total_skips_h2', hbt.existencia_teorica_final, 
        (SELECT SUM(r.toneladas_remision) as 'total_toneladas' 
        FROM remisiones r 
        WHERE r.id_material IN(5,6,7) AND r.chk_crg = 1 AND r.fecha_remision = '2021-05-10') as 'cal_embarcada', 
        (SELECT (hit.tolva_uno_a + hit.tolva_uno_b + hit.tolva_uno_c + hit.tolva_dos_a + hit.tolva_dos_b + hit.tolva_dos_c + hit.tolva_tres_a + hit.tolva_tres_b + hit.tolva_tres_c ) 
        FROM hornos_inventario_tolvas hit WHERE hit.fecha = DATE_ADD('2021-05-10', INTERVAL 1 DAY) AND hit.hora = 24) as 'inventario_tolvas' 
        FROM hornos_balance_tolvas hbt
        LEFT JOIN hornos_bitacora_diaria hbd ON hbt.fecha = hbd.fecha 
        WHERE hbt.fecha = '2021-05-10' GROUP BY hbt.existencia_teorica_final
        */

         $sql = "";
         
         $sql .= "SELECT hbt.fecha, SUM(hbd.skips_cantidad) as 'total_skips_h1', 
                  SUM(hbd.skips_cantidad_h2) as 'total_skips_h2', hbt.existencia_teorica_final, 
                  (SELECT SUM(r.toneladas_remision) as 'total_toneladas' 
                  FROM remisiones r WHERE r.id_material IN(5,6,7) AND r.chk_crg = 1 AND r.fecha_remision = '{$fecha}') as 'cal_embarcada', 
                  (SELECT (hit.tolva_uno_a + hit.tolva_uno_b + hit.tolva_uno_c + hit.tolva_dos_a + hit.tolva_dos_b + hit.tolva_dos_c + hit.tolva_tres_a + hit.tolva_tres_b + hit.tolva_tres_c) 
                  FROM hornos_inventario_tolvas hit 
                  WHERE hit.fecha = DATE_ADD('{$fecha}', INTERVAL 1 DAY) AND hit.hora = 24) as 'inventario_tolvas' 
                  FROM hornos_balance_tolvas hbt 
                  LEFT JOIN hornos_bitacora_diaria hbd ON hbt.fecha = hbd.fecha WHERE hbt.fecha = '{$fecha}' 
                  GROUP BY hbt.existencia_teorica_final";


         $query = $this->db->query($sql);

         if($query->num_rows() < 1){

            $data = "No hay filas por mostrar";
            //print_r($data);
            return $data;

         } else {

            $data = $query->row_array();
            //print_r($data);
            return $data;
         }

    }

    public function getEmpleados(){

        $this->db->select('id, CONCAT(nombre, " ", apellidos) as nombreCompleto');
        $this->db->from($this->empleados);
        //$this->db->where('id_puesto', 15);
        //$this->db->or_where('id_puesto', 57);
        $this->db->where('id_puesto', 70);
        //$this->db->or_where('id_puesto', 86);
        $this->db->order_by('nombre', 'ASC');

        $query = $this->db->get();

        return $result = $query->result_array();
    }

    public function getEquipos(){

        $this->db->order_by('equipo', 'ASC');
        $query = $this->db->get($this->equipo_paros);

        return $result = $query->result_array();

    }

    public function getHoras(){

        $query = $this->db->get($this->horas);

        return $result = $query->result_array();
        
    }

    public function getHorno1(){
        
        $this->db->select('b.fecha, h.hora as hora, m.nombre_del_material as material_id, hornos.horno as horno_id, CONCAT(e.nombre, " ", e.apellidos) as hornero_en_turno, combustible_inferior, combustible_superior, aire_periferia, aire_inferior, aire_superior, relaciones_inferior, relaciones_superior, relaciones_global, temperatura_gases, temperatura_descarga, temperatura_cal, temperatura_ambiente, presion_mesa, presion_inferior, presion_superior, skips_cantidad, skips_toneladas_piedra, skips_toneladas_prod');
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

    public function getHorno2(){
        
        $this->db->select('b.fecha, h.hora as hora, m.nombre_del_material as material_id, hornos.horno as horno_id, CONCAT(e.nombre, " ", e.apellidos) as hornero_en_turno, combustible_inferior, combustible_superior, aire_periferia, aire_inferior, aire_superior, relaciones_inferior, relaciones_superior, relaciones_global, temperatura_norte, temperatura_sur, temperatura_promedio, temperatura_diferencia, temperatura_mesa,  presion_mesa, presion_inferior, presion_superior, skips_cantidad_h2, skips_toneladas_piedra, skips_toneladas_prod');
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

    public function getHorno3(){
        
        $this->db->select('b.fecha, h.hora as hora, m.nombre_del_material as material_id, hornos.horno as horno_id, CONCAT(e.nombre, " ", e.apellidos) as hornero_en_turno, h3_produccion_tons_piedra, h3_produccion_tons_prod, h3_ciclos_por_dia, h3_ciclos_calor_especifico_ent, h3_ciclos_calor_especifico_bajo, h3_ciclos_contador_de_gas, h3_ciclos_flujo_total_de_gas, h3_combustible_quemador_1, h3_combustible_quemador_2, h3_combustible_quemador_3, h3_factor_exceso_aire_quemador_1, h3_factor_exceso_aire_quemador_2, h3_factor_exceso_aire_quemador_3, h3_aires_factor_aire_enfriamiento, h3_aires_factor_aire_enfriamiento_centro, h3_aires_exceso_aire_factor_total, h3_aires_factor_enfriamiento_exceso, h3_gas_temperatura_horno_arriba, h3_gas_presion_horno_arriba, h3_agua_enf_temp_agua_enf, h3_agua_enf_num_enfriadores, h3_temp_cal_1, h3_temp_cal_2, h3_temp_cal_3, h3_temp_horno_1, h3_temp_horno_2, h3_temp_horno_3, h3_temp_horno_4, h3_temp_horno_5, h3_temp_horno_6, h3_aire_comprimido');
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

    public function getHornos(){

        $this->db->order_by('id', 'ASC');
        $query = $this->db->get($this->hornos);

        return $result = $query->result_array();
    
    }

    public function getInventario(){

        $this->db->select('m.nombre_del_material as material_id, SUM(i.toneladas) as toneladas_por_horno');
        $this->db->from($this->inventario. ' as i');
        //$this->db->join($this->hornos. ' as h', 'i.horno_id = h.id', 'left');
        $this->db->join($this->materiales. ' as m', 'i.material_id = m.id', 'left');
        //$this->db->group_by('h.horno');
        $this->db->group_by('i.material_id');
        

        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getMateriales(){

        $this->db->order_by('nombre_del_material', 'ASC');
        $this->db->where('horno_check',1);
        $query = $this->db->get($this->materiales);

        return $result = $query->result_array();

    }

    public function getMes(){

         $query = $this->db->get($this->meses);

        return $query->result_array();
    }

    public function getMotivos(){

        $this->db->order_by('motivo', 'ASC');
        $query = $this->db->get($this->motivos_paros);

        return $result = $query->result_array();

    }
}