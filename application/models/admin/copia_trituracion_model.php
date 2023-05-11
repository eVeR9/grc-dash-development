<?php
class Trituracion_model extends CI_Model
{

    public function __constuct()
    {
        parent::__construct();
    }

    /* Listas de Bitacoras y Programacion */
    public function get_all_trituracion_bitacora()
    {
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

    public function get_all_trituracion_programacion()
    {
        $this->db->select('tp.*, tc.descripcion');
        $this->db->from('trituracion_programacion tp');
        $this->db->join('trituracion_conceptos tc', 'tp.id_concepto = tc.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Paros - Razones
    public function get_all_razones_paro()
    {
        $this->db->order_by("id", "ASC");
        $query = $this->db->get('trituracion_razones_paro');
        return $result = $query->result_array();
    }
    // Conceptos de Trituracion Programacion
    public function get_all_conceptos()
    {
        $this->db->order_by("id", "ASC");
        $query = $this->db->get('trituracion_conceptos');
        return $result = $query->result_array();
    }


    /** ADD DATA */
    public function bitacora_add($data)
    {
        $this->db->insert('trituracion_bitacora', $data);
        return true;
    }

    public function programacion_add($data)
    {
        $this->db->insert('trituracion_programacion', $data);
        return true;
    }


    /** EDIT DATA */
    public function get_all_trituracion_bitacora_id($id)
    {
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
    public function get_all_trituracion_programacion_id($id)
    {
        $this->db->select('tp.*, tc.descripcion');
        $this->db->from('trituracion_programacion tp');
        $this->db->where('tp.id', $id);
        $this->db->join('trituracion_conceptos tc', 'tp.id_concepto = tc.id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }


    public function bitacora_edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('trituracion_bitacora', $data);
        return true;
    }

    public function programacion_edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('trituracion_programacion', $data);
        return true;
    }

    /*CONCEPTOS */
    public function add_conceptos($data)
    {
        $result = $this->db->insert('trituracion_conceptos', $data);
        return $result;
    }
    public function get_conceptos()
    {
        $query = $this->db->get('trituracion_conceptos');
        $result = $query->result_array();
        return $result;
    }

    /*PAROS */
    public function add_bitacora_paros($data)
    {
        $result = $this->db->insert('trituracion_razones_paro', $data);
        return $result;
    }
    public function get_bitacora_paros_list()
    {
        $query = $this->db->get('trituracion_razones_paro');
        $result = $query->result_array();
        return $result;
    }

    public function getValuesBasculas($fecha)
    {
        /*
          params: $fecha

          Si selecciono fecha me traes el ultimo
          registro de la fecha que yo acabo de 
          seleccionar. Ej: 2020-09-23 = el ultimo valor de ayer

          posible query:
          SELECT * FROM `trit_b3_kp` where date_format(_TIMESTAMP, '%Y-%m-%d')='2020-09-23'

        */

        $db2 = $this->load->database('databaseTwo', TRUE);

        //First form using native sql

        //$q = $db2->query("SELECT id, _ACCDAILY, _TIMESTAMP FROM trit_b1_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '{$fecha}' UNION ALL SELECT id, _ACCDAILY, _TIMESTAMP FROM trit_b2_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '{$fecha}' ORDER BY id DESC LIMIT 2");
        //return $q->result_array();

        // #1 SubQueries no.1 -------------------------------------------

        $db2->select('_ACCDAILY, id');
        $db2->from('trit_b1_kp');
        $db2->where("DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '{$fecha}'");
        //$db2->order_by('id', 'DESC');
        //$db2->limit(1);
        //$db2->get();
        $query1 = $db2->get_compiled_select();


        // #2 SubQueries no.2 -------------------------------------------

        $db2->select('_ACCDAILY, id');
        $db2->from('trit_b2_kp');
        $db2->where("DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '{$fecha}'");
        //$db2->order_by('id', 'DESC');
        //$db2->limit(1);
        //$db2->get();
        $query2 = $db2->get_compiled_select();


        // #3 Union with Simple Manual Queries --------------------------

        //$this->db->query("select * from ($subQuery1 UNION $subQuery2) as unionTable");

        // #3 (alternative) Union with another Active Record ------------

        $query = $db2->query($query1 . ' UNION ' . $query2 . ' ORDER BY id DESC LIMIT 2');
        return $query->result_array();

        //echo $db2->last_query();
        //exit();
    }

    function getBasculaUno($fecha)
    {
        $db2 = $this->load->database('databaseTwo', TRUE);
        //$q = $db2->query("SELECT * FROM trit_b2_kp WHERE _ACCDAILY = 2022");
        //return $q->result_array();

        $db2->select('_ACCDAILY');
        $db2->from('trit_b1_kp');
        $db2->where("DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '{$fecha}'");
        $db2->order_by('id', 'DESC');
        $db2->limit(1);
        $q = $db2->get();

        if ($q->num_rows() == 1) {
            $result = $q->row_array();
        } else {
            $result = "fail b1";
        }
        return $result;
    }

    function getBasculaDos($fecha)
    {
        $db2 = $this->load->database('databaseTwo', TRUE);
        //$q = $db2->query("SELECT * FROM trit_b2_kp WHERE _ACCDAILY = 2022");
        //return $q->result_array();

        $db2->select('_ACCDAILY');
        $db2->from('trit_b2_kp');
        $db2->where("DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '{$fecha}'");
        $db2->order_by('id', 'DESC');
        $db2->limit(1);
        $q = $db2->get();
        if ($q->num_rows() == 1) {
            $result = $q->row_array();
        } else {
            $result = "fail b2";
        }
        return $result;
    }

    //data validation on view
    /*
    public function getBasculasSecond(){
        $db2 = $this->load->database('databaseTwo', TRUE);
        $q = $db2->query("SELECT _ACCDAILY FROM trit_b1_kp");
        return $q->result_array();
    }
    */
}
