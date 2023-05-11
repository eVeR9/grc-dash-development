<?php

class Costo_mina_model extends CI_Model{

    public function add_costos_mina_fijo($data){
        $this->db->insert('costo_mina_fijo', $data);
        return true;
    }

    public function add_costo_mano_de_obra_mina($data){
        $this->db->insert('costo_mina_mano_de_obra', $data);
        return true;
    }

    public function add_costo_diario_mina($data){
        $this->db->insert('costo_mina_diario', $data);
        return true;
    }

    public function get_total_salario_neto($year, $month){
			
        $sql = "SELECT nomina_directa_diaria as Total, nomina_indirecta_diaria as Total_dos, 
                    (SELECT monto_arrendamiento_diario 
                        FROM costo_mina_fijo 
                            WHERE mes = '".$month."' AND año = '".$year."') as Diario_arrend,
                    (SELECT monto_cfe_diario 
                        FROM costo_mina_fijo 
                            WHERE mes = '".$month."' AND año = '".$year."') as Diario_cfe
                FROM costo_mina_mano_de_obra 
                    WHERE mes = '".$month."' AND año = '".$year."'";

        $query = $this->db->query($sql);
        //$result = $query->row_array();

        if($query->num_rows() === 1){

            $result = $query->row_array();

        } else{
            $result = "noData";
        }
        
        return $result;
    }

    public function get_total_basculas($fecha){

        $db2 = $this->load->database('databaseTwo', TRUE);

        $sql = "";
        $sql = $sql . "SELECT ";
        $sql = $sql . "fe.fecha, b1.id AS b1_id, b1._ACCDAILY/1000 AS b1_total, b1._TIMESTAMP AS b1_fecha, "; 
        $sql = $sql . "b2.id AS b2_id, b2._ACCDAILY/1000 AS b2_total, b2._TIMESTAMP AS b2_fecha, "; 
        $sql = $sql . "b3.id AS b3_id, b3._ACCDAILY/1000 AS b3_total, b3._TIMESTAMP as b3_fecha, (IFNULL(b1._ACCDAILY, 0)+IFNULL(b2._ACCDAILY, 0)+IFNULL(b3._ACCDAILY, 0))/1000 as b4_total "; 
        $sql = $sql . "FROM fechas fe ";
        $sql = $sql . "LEFT JOIN (SELECT * FROM trit_b1_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '" . $fecha . "' order by id desc limit 1) b1 ON DATE_FORMAT(fe.fecha, '%Y-%m-%d')=DATE_FORMAT(b1._TIMESTAMP, '%Y-%m-%d') ";
        $sql = $sql . "LEFT JOIN (SELECT * FROM trit_b2_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '" . $fecha . "' order by id desc limit 1) b2 ON DATE_FORMAT(fe.fecha, '%Y-%m-%d')=DATE_FORMAT(b2._TIMESTAMP, '%Y-%m-%d') ";
        $sql = $sql . "LEFT JOIN (SELECT * FROM trit_b3_kp WHERE DATE_FORMAT(_TIMESTAMP, '%Y-%m-%d') = '" . $fecha . "' order by id desc limit 1) b3 ON DATE_FORMAT(fe.fecha, '%Y-%m-%d')=DATE_FORMAT(b3._TIMESTAMP, '%Y-%m-%d') ";
        $sql = $sql . "WHERE DATE_FORMAT(fe.fecha, '%Y-%m-%d') = '" . $fecha . "' LIMIT 1";

        $query = $db2->query($sql);
        $result = $query->row_array();
        return $result;
    }
    
    public function get_costo_mina_fijo(){
        $this->db->select('cmf.*, gnm.*,cmf.id');
        $this->db->from('costo_mina_fijo as cmf');
        $this->db->join('gas_nombre_mes as gnm', 'gnm.id = cmf.mes');
        
        $this->db->order_by('cmf.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function get_gastos_fijos_by_id($id){
        $this->db->select('*');
        $this->db->from('costo_mina_fijo');
        $this->db->where('id', $id);

        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function get_mano_de_obra()
    {
        $this->db->select('cmmdo.*, gnm.*,cmmdo.id');
        $this->db->from('costo_mina_mano_de_obra as cmmdo');
        $this->db->join('gas_nombre_mes as gnm', 'gnm.id = cmmdo.mes');
        
        $this->db->order_by('cmmdo.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function get_mano_de_obra_by_id($id){
        $this->db->select('*');
        $this->db->from('costo_mina_mano_de_obra');
        $this->db->where('id', $id);    
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function getmes(){
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('gas_nombre_mes');
        return $query->result_array();
    }

    public function get_total_mina(){
        $query = $this->db->get('costo_mina_diario');
        $result = $query->result_array();
        return $result;
    }   

    public function updateGastosFijos($data, $id){
        $this->db->where('id', $id);
        $this->db->update('costo_mina_fijo', $data);
        
        return true;
    }

    public function updateManoDeObra($data, $id){
        $this->db->where('id', $id);
        $this->db->update('costo_mina_mano_de_obra', $data);
        return true;
    }

    public function CheckNominaFecha($fecha)
    {
        $this->db->select('fecha');
        $this->db->where('fecha', $fecha);
        $this->db->from('costo_mina_diario');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = "notok";
        } else {
            $result = "ok";
        }

        return $result;
    }
}

?>