<?php
class Trituracion_model extends CI_Model {

    public function __constuct(){
        parent::__construct();
    }

/* Listas de Bitacoras y Programacion */
public function get_all_trituracion_bitacora(){
    $this->db->select('tb.*, trp.descripcion, m1.nombre_del_material as material1, m2.nombre_del_material as material2 ,m3.nombre_del_material as material3, m4.nombre_del_material as material4, m5.nombre_del_material as material5, m6.nombre_del_material as material6,m7.nombre_del_material as material7, m8.nombre_del_material as material8');
    $this->db->from('trituracion_bitacora tb');
    $this->db->join('trituracion_razones_paro trp', 'tb.paro_id_razon = trp.id', 'left');
    $this->db->join('materiales m1', 'tb.id_material_bascula1 = m1.id', 'left');
    $this->db->join('materiales m2', 'tb.id_material_bascula2 = m2.id', 'left');
    $this->db->join('materiales m3', 'tb.id_material_bascula3 = m3.id', 'left');
    $this->db->join('materiales m4', 'tb.id_material_bascula4 = m4.id', 'left');
    $this->db->join('materiales m5', 'tb.id_material_bascula5 = m5.id', 'left');
    $this->db->join('materiales m6', 'tb.id_material_bascula6 = m6.id', 'left');
    $this->db->join('materiales m7', 'tb.id_material_bascula7 = m7.id', 'left');
    $this->db->join('materiales m8', 'tb.id_material_bascula8 = m8.id', 'left');
    $query = $this->db->get();
    return $query->result_array();
}

public function get_all_trituracion_programacion(){
    $this->db->select('tp.*, tc.descripcion');
    $this->db->from('trituracion_programacion tp');
    $this->db->join('trituracion_conceptos tc', 'tp.id_concepto = tc.id', 'left');
    $query = $this->db->get();
    return $query->result_array();
}

//Paros - Razones
public function get_all_razones_paro(){
    $this->db->order_by("id", "ASC");
    $query = $this->db->get('trituracion_razones_paro');
    return $result = $query->result_array();
}
// Conceptos de Trituracion Programacion
public function get_all_conceptos(){
    $this->db->order_by("id", "ASC");
    $query = $this->db->get('trituracion_conceptos');
    return $result = $query->result_array();
}


/** ADD DATA */
    public function bitacora_add($data){
        $this->db->insert('trituracion_bitacora', $data);
        return true;
    }

    public function programacion_add($data) {
        $this->db->insert('trituracion_programacion', $data);
        return true;
    }


/** EDIT DATA */
public function get_all_trituracion_bitacora_id($id){
    $this->db->select('tb.*, trp.descripcion, m1.nombre_del_material as material1, m2.nombre_del_material as material2 ,m3.nombre_del_material as material3, m4.nombre_del_material as material4, m5.nombre_del_material as material5, m6.nombre_del_material as material6,m7.nombre_del_material as material7, m8.nombre_del_material as material8');
    $this->db->from('trituracion_bitacora tb');
    $this->db->where('tb.id', $id);
    $this->db->join('trituracion_razones_paro trp', 'tb.paro_id_razon = trp.id', 'left');
    $this->db->join('materiales m1', 'tb.id_material_bascula1 = m1.id', 'left');
    $this->db->join('materiales m2', 'tb.id_material_bascula2 = m2.id', 'left');
    $this->db->join('materiales m3', 'tb.id_material_bascula3 = m3.id', 'left');
    $this->db->join('materiales m4', 'tb.id_material_bascula4 = m4.id', 'left');
    $this->db->join('materiales m5', 'tb.id_material_bascula5 = m5.id', 'left');
    $this->db->join('materiales m6', 'tb.id_material_bascula6 = m6.id', 'left');
    $this->db->join('materiales m7', 'tb.id_material_bascula7 = m7.id', 'left');
    $this->db->join('materiales m8', 'tb.id_material_bascula8 = m8.id', 'left');
    $query = $this->db->get();
    return $query->row_array();
}
public function get_all_trituracion_programacion_id($id){
    $this->db->select('tp.*, tc.descripcion');
    $this->db->from('trituracion_programacion tp');
    $this->db->where('tp.id', $id);
    $this->db->join('trituracion_conceptos tc', 'tp.id_concepto = tc.id', 'left');
    $query = $this->db->get();
    return $query->row_array();
}


public function bitacora_edit($data, $id){
    $this->db->where('id', $id);
    $this->db->update('trituracion_bitacora', $data);
    return true;
}

public function programacion_edit($data, $id) {
    $this->db->where('id', $id);
    $this->db->update('trituracion_programacion', $data);
    return true;
}

/*CONCEPTOS */
public function add_conceptos($data){
    $result = $this->db->insert('trituracion_conceptos', $data);
    return $result;
}
public function get_conceptos(){
    $query = $this->db->get('trituracion_conceptos');
    $result = $query->result_array();
    return $result;
}

/*PAROS */
public function add_bitacora_paros($data){
    $result = $this->db->insert('trituracion_razones_paro', $data);
    return $result;
}
public function get_bitacora_paros_list(){
    $query = $this->db->get('trituracion_razones_paro');
    $result = $query->result_array();
    return $result;
}

/* Tiempo Real */
public function get_bascula1(){
    $db2 = $this->load->database('databaseTwo', TRUE);
    $sql = "";
    $sql = $sql . "SELECT ";
    $sql = $sql . "b1._ACCDAILY AS total "; 
    $sql = $sql . "FROM trit_b1_kp b1 "; 
    $sql = $sql . "WHERE DATE(b1._TIMESTAMP) = CURDATE() "; 
    $sql = $sql . "ORDER BY b1.id desc LIMIT 1 "; 
    $result_query = $db2->query($sql);
    if ($result_query->num_rows() == 1) {
        $result = $result_query->row_array();
    } else { //Si no hay datos
        $result = "0";
    }
    return $result;
}

public function get_bascula2(){
    $db2 = $this->load->database('databaseTwo', TRUE);
    $sql = "";
    $sql = $sql . "SELECT ";
    $sql = $sql . "b1._ACCDAILY AS total "; 
    $sql = $sql . "FROM trit_b2_kp b1 "; 
    $sql = $sql . "WHERE DATE(b1._TIMESTAMP) = CURDATE() "; 
    $sql = $sql . "ORDER BY b1.id desc LIMIT 1 "; 
    $result_query = $db2->query($sql);
    if ($result_query->num_rows() == 1) {
        $result = $result_query->row_array();
    } else { //Si no hay datos
        $result = "0";
    }
    return $result;
}

public function get_bascula3(){
    $db2 = $this->load->database('databaseTwo', TRUE);
    $sql = "";
    $sql = $sql . "SELECT ";
    $sql = $sql . "b1._ACCDAILY AS total "; 
    $sql = $sql . "FROM trit_b3_kp b1 "; 
    $sql = $sql . "WHERE DATE(b1._TIMESTAMP) = CURDATE() "; 
    $sql = $sql . "ORDER BY b1.id desc LIMIT 1 "; 
    $result_query = $db2->query($sql);
    if ($result_query->num_rows() == 1) {
        $result = $result_query->row_array();
    } else { //Si no hay datos
        $result = "0";
    }
    return $result;
}



public function get_basculas_tiempo_real(){
    $db2 = $this->load->database('databaseTwo', TRUE);
    $hoy = date("Y-m-d");
    $sql="";
    $sql = $sql . "SELECT ";
    $sql = $sql . "fe.fecha, b1.id AS b1_id, b1._ACCDAILY AS b1_total, b1._TIMESTAMP AS b1_fecha, "; 
    $sql = $sql . "b2.id AS b2_id, b2._ACCDAILY AS b2_total, b2._TIMESTAMP AS b2_fecha, "; 
    $sql = $sql . "b3.id AS b3_id, b3._ACCDAILY AS b3_total, b3._TIMESTAMP as b3_fecha "; 
    $sql = $sql . "FROM fechas fe ";
    $sql = $sql . "LEFT JOIN (SELECT * FROM trit_b1_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '" . $hoy . "' order by id desc limit 1) b1 ON DATE_FORMAT(fe.fecha, '%Y-%m-%d')=DATE_FORMAT(b1._TIMESTAMP, '%Y-%m-%d') ";
    $sql = $sql . "LEFT JOIN (SELECT * FROM trit_b2_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '" . $hoy . "' order by id desc limit 1) b2 ON DATE_FORMAT(fe.fecha, '%Y-%m-%d')=DATE_FORMAT(b2._TIMESTAMP, '%Y-%m-%d') ";
    $sql = $sql . "LEFT JOIN (SELECT * FROM trit_b3_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '" . $hoy . "' order by id desc limit 1) b3 ON DATE_FORMAT(fe.fecha, '%Y-%m-%d')=DATE_FORMAT(b3._TIMESTAMP, '%Y-%m-%d') ";
    $sql = $sql . "WHERE DATE_FORMAT(fe.fecha, '%Y-%m-%d') = '" . $hoy . "' LIMIT 1";

    $sql = "";
    $sql = $sql . "SELECT";
    $sql = $sql . " h.hora*1 as hora,";
    $sql = $sql . " ROUND((b1._ACCDAILY)/1000,2) as bascula1,";
    $sql = $sql . " ROUND((b2._ACCDAILY)/1000,2) as bascula2,";
    $sql = $sql . " ROUND((b3._ACCDAILY)/1000,2) as bascula3"; 
    $sql = $sql . " FROM horas h";
    $sql = $sql . " left join trit_b1_kp b1 on  hour(b1._timestamp)=h.hora";
    $sql = $sql . " left join trit_b2_kp b2 on  hour(b2._timestamp)=h.hora";
    $sql = $sql . " left join trit_b3_kp b3 on  hour(b3._timestamp)=h.hora";
    $sql = $sql . " WHERE DATE(b1._TIMESTAMP) = CURDATE()";
    $sql = $sql . " AND DATE(b2._TIMESTAMP) = CURDATE()"; 
    $sql = $sql . " AND DATE(b3._TIMESTAMP) = CURDATE()";
    $sql = $sql . " ORDER BY hora";

    $result_query = $db2->query($sql);
    return $result_query;
    /*if ($result_query->num_rows() > 1) {
        $result = $result_query->result_array();
    } else { //Si no hay datos
        $result = "nada";
    }*/
    echo $this->db2->last_query();
    exit();
    //echo json_encode($result);
    //exit();
    
}


}
?>