<?php 

class Barrenacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*Data entry*/ 
    public function add_barrenacion($data) {
        $this->db->insert('barrenacion', $data);
        return true;
    }

    public function add_metas($data){
        $this->db->insert('barreno_metas', $data);
        return true;
    }

    public function add_maquinas($data){
        $this->db->insert('barreno_maquina', $data);
        return true;
    }

    public function add_razones($data){
        $this->db->insert('barreno_razones', $data);
        return true;
    }

    public function add_conceptos($data){
        $result = $this->db->insert('barreno_concepto', $data);
        return $result;
    }

    /*Edit Data */
    public function edit_barrenacion($data, $id){
        $this->db->where('id', $id);
        $this->db->update('barrenacion', $data);
        return true;
    }

    public function edit_metas($data, $id){
        $this->db->where('id', $id);
        $this->db->update('barreno_metas', $data);
        return true;
    }

    public function edit_maquinas($data, $id){
        $this->db->where('id', $id);
        $this->db->update('barreno_maquina', $data);
        return true;
    }

    /*Get barrenacion data*/
    public function get_all_barrenacion() {
        $this->db->select('b.id, b.fecha, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, b.maquina_id, rhe.id_puesto, ayudante_id, b.plantilla, b.metros_perf, b.bar_perf, b.bar_por_volar, (b.metros_perf*b.plantilla)*2.7 as tons_tumbe, br.nombre as razon_id, horas_paro, zona, linea');
        $this->db->from('barrenacion b');
        $this->db->join('rh_empleados rhe', 'b.empleado_id = rhe.id', 'left');
        $this->db->join('barreno_razones br', 'b.razon_id = br.id', 'left');
        $this->db->group_by('b.id');
        $this->db->select('concat(rhe2.nombre, " ", rhe2.apellidos) as ayudante_id');
        //$this->db->select('u2.id, concat(u2.nombre, " ", u2.apellidos) as ayudante_id');
        $this->db->join('rh_empleados rhe2', 'b.ayudante_id = rhe2.id', 'left');
        $this->db->where('rhe2.id_puesto = 75 OR 16');
        //$this->db->order_by('b.id', "DESC");
        $query = $this->db->get();
        return $query->result_array();

        /*I changed the rh_empleados table by the following: rh_empleados on line 37 and line 41 */
    }

    public function get_all_barrenacion_id($id){
       $this->db->select('b.id, b.fecha, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, bm.nombre as maquina_id, b.plantilla, b.metros_perf, b.bar_perf, b.bar_por_volar, (b.metros_perf*b.plantilla)*2.7 as tons_tumbe, b.empleado_id, b.maquina_id, rhe.id_puesto, b.ayudante_id, b.zona, b.linea, observaciones, paro, razon_id, horas_paro');
       $this->db->from('barrenacion b');
       $this->db->join('rh_empleados rhe', 'b.empleado_id = rhe.id', 'left');
       $this->db->join('barreno_maquina bm', 'b.maquina_id = bm.id');
       $this->db->where('b.id', $id);
       $query = $this->db->get();
       return $query->row_array();
       //This change makes a blank space in the employee picker
    }

    /*Get metas barrenacion */
    public function get_metas_barrenacion() {
        $this->db->select('bm.id, bm.fecha, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, bc.descripcion, rhe.nombre, bm.metros_por_barrenar, bm.observaciones, horas');
        $this->db->from('barreno_metas bm');
        $this->db->join('rh_empleados rhe', 'bm.empleado_id = rhe.id', 'left');
        $this->db->join('barreno_concepto bc', 'bm.concepto_id = bc.id', 'left');
        $this->db->order_by('bm.id', "DESC");
        $query = $this->db->get();
        return $query->result_array();
        //I just modify the select and join on line 65
    }

    /*Get id metas barrenacion */
    public function get_metas_barrenacion_id($id) {
        $this->db->select('bm.id, bm.fecha, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, bc.descripcion, rhe.nombre, bm.metros_por_barrenar, bm.observaciones, bm.concepto_id, bm.empleado_id');
        $this->db->from('barreno_metas bm');
        $this->db->where('bm.id', $id);
        $this->db->join('rh_empleados rhe', 'bm.empleado_id = rhe.id', 'left');
        $this->db->join('barreno_concepto bc', 'bm.concepto_id = bc.id', 'left');
        $this->db->order_by('bm.id', "DESC");
        $query = $this->db->get();
        return $query->row_array();
        //This change makes a blank space in the employee picker
    }
    

    /*Get Operaodres*/
    public function get_empleados_barrenacion(){

        $qry = "SELECT * FROM rh_empleados WHERE id_puesto = 75 OR id_puesto = 76 AND fecha_de_baja = '0000-00-00'";
        $result = $this->db->query($qry);
        return $result->result_array();
    }

    /*Get Operaodres
    public function get_empleados_barrenacion(){

        This method include only 3 code lines
        $qry = "SELECT * FROM rh_empleados WHERE id_puesto = 75 AND fecha_de_baja is null";
        $result = $this->db->query($qry);
        return $result->result_array();

        //Only works on local
        //This change makes a blank space in the employee picker
    }
*/

    public function get_ayudantes_barrenacion(){

        $ayudantes = 16;
        $moneo = 76;

        $this->db->select('*');
        $this->db->from('rh_empleados');
        $this->db->where('id_puesto', $ayudantes);
        $this->db->or_where('id_puesto', $moneo);

        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    /*Get Maquinas */
    public function get_maquinas(){
        $this->db->order_by('bm.id', 'DESC');
        $query = $this->db->get('barreno_maquina bm');
        $result = $query->result_array();
        return $result;
    }

    public function get_maquinas_id($id){
        $this->db->select('id, nombre, codigo_maquina');
        $this->db->from('barreno_maquina');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    /*Get Conceptos */
    public function get_conceptos(){
        $query = $this->db->get('barreno_concepto');
        $result = $query->result_array();
        return $result;
    }

    public function get_razones(){
        $this->db->order_by('br.id', 'DESC');
        $query = $this->db->get('barreno_razones br');
        $result = $query->result_array();
        return $result;
    }

    public function get_rango_voladuras($date1, $date2, $key, $zona){
        //$query = $this->db->query("SELECT * FROM barrenacion WHERE fecha BETWEEN '$date1' AND '$date2'");
        //$this->db->where('b.fecha BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        //$this->db->where("fecha BETWEEN DATE_FORMAT('$date1','%d/%m/%Y') AND DATE_FORMAT('$date2','%d/%m/%Y')");
        //$this->db->query("SELECT * FROM barrenacion WHERE fecha BETWEEN '$date1' AND '$date2'");
        
        $this->db->select('b.*, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, b.zona');
        $this->db->join('rh_empleados rhe', 'b.empleado_id = rhe.id', 'left');

        /*$this->db->from('barrenacion b');
        $this->db->group_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();*/

        if($date1 && $date2) {
            $this->db->where('fecha >=', $date1);
            $this->db->where('fecha <=', $date2);
            $this->db->from('barrenacion b');
            $this->db->group_by('id', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
        else if($date1=" " && $date2=" "){
            //$this->db->select('b.*, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id');
            $this->db->join('rh_empleados rhe2', 'b.empleado_id = rhe2.nombre', 'left');
            $this->db->like('concat(rhe.nombre, " ", rhe.apellidos)', $this->input->post('key'));
            $this->db->like('zona', $this->input->post('zona'));
            $this->db->from('barrenacion b');
            $this->db->group_by('id', 'desc');
            $query = $this->db->get();
            return $query->result();
        }   

            /*
        } else if($date2){
            $this->db->or_like('empleado_id', $this->input->post('key'));
            $this->db->from('barrenacion b');
            $this->db->group_by('id', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
        */
        /*
        if(isset($key) && $date1="" && $date2=""){
            $query = $this->db->query("SELECT concat(rhe.nombre, ' ', rhe.apellidos) as empleado_id FROM barrenacion WHERE empleado_id", $key);
        }
        */

        //$this->db->where('empleado_id', $key);
        //$this->db->like('empleado_id', $key, $this->input->post('key'));
        /*if($date1 = "" && $date2 = ""){
            $this->db->group_start();
            $this->db->or_like('empleado_id', $key);
            $this->db->or_like('zona', $key);
            $this->db->group_end();
        }*/
    }

    public function json(){
        $this->datatables->select('*');
        $this->datatables->from('datepicker');
        return $this->datatables->generate();
    }

}
