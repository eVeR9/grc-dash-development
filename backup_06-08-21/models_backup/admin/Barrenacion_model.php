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

    public function add_voladuras($data){
        $this->db->insert('voladuras', $data);
        return true;
    }

    public function addExplosivosVoladura($data){
        $this->db->insert('explosivos_voladura', $data);
        return true;
    }


    /*
    public function cargarExplosivoVoladura() {

    }
    */

    public function add_zonas($data){
        $this->db->insert('zonas', $data);
        return true;
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
        $this->db->select('b.id, b.fecha, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, b.maquina_id, rhe.id_puesto, ayudante_id, b.plantilla, b.metros_perf, b.bar_perf, b.bar_por_volar, (b.metros_perf*b.plantilla)*2.7 as tons_tumbe, br.nombre as razon_id, horas_paro, bz.nombre as id_zona, linea');
        $this->db->from('barrenacion b');
        $this->db->join('rh_empleados rhe', 'b.empleado_id = rhe.id', 'left');
        $this->db->join('barreno_razones br', 'b.razon_id = br.id', 'left');
        $this->db->join('barreno_zonas bz', 'b.id_zona = bz.id', 'left');
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
       $this->db->select('b.id, b.fecha, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, bm.nombre as maquina_id, b.plantilla, b.metros_perf, b.bar_perf, b.bar_por_volar, (b.metros_perf*b.plantilla)*2.7 as tons_tumbe, b.empleado_id, b.maquina_id, rhe.id_puesto, b.ayudante_id, b.id_zona');
       $this->db->from('barrenacion b');
       $this->db->join('rh_empleados rhe', 'b.empleado_id = rhe.id', 'left');
       $this->db->join('barreno_maquina bm', 'b.maquina_id = bm.id');
       $this->db->join('barreno_zonas bz', 'b.id_zona = bz.id', 'left');
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
        
        $this->db->where('id_puesto', '75');
        $this->db->where('fecha_de_baja', 0);
        $query = $this->db->get('rh_empleados');
        return $result = $query->result_array();
        
        /*
        $qry = "SELECT * FROM rh_empleados WHERE id_puesto = 75 AND fecha_de_baja = '0000-00-00'";
        $result = $this->db->query($qry);
        return $result->result_array();
        */
    }

    public function get_ayudantes_barrenacion(){
        $this->db->where('id_puesto', '16');
        $query = $this->db->get('rh_empleados');
        $result = $query->result_array();
        return $result;
        //This change makes a blank space in the employee picker
    }

    /*Get Ayudantes*/
    public function get_ayudantes(){
        $this->db->where('id_puesto', '16');
        $query = $this->db->get('rh_empleados');
        $result = $query->result_array();
        return $result;
        //This change makes a blank space in the employee picker
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

    public function get_rango_voladuras($date1, $date2){
        //$this->db->query("SELECT * FROM barrenacion WHERE fecha BETWEEN '$date1' AND '$date2'");
        
        $this->db->select('b.*, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, bz.nombre as id_zona');
        $this->db->join('rh_empleados rhe', 'b.empleado_id = rhe.id', 'left');
        $this->db->join('barreno_zonas bz', 'b.id_zona = bz.id', 'left');

        if($date1 && $date2) {
            $this->db->where('fecha >=', $date1);
            $this->db->where('fecha <=', $date2);
            $this->db->where('check_voladura', 0);
            $this->db->like('concat(rhe.nombre, " ", rhe.apellidos)', $this->input->post('key') );
            $this->db->like('id_zona', $this->input->post('id_zona'));
            $this->db->from('barrenacion b');
            $this->db->group_by('id', 'desc');
            $query = $this->db->get();
            return $query->result_array();
        }
        else if($date1=" " && $date2=" "){ //If date is empty:
            $this->db->join('rh_empleados rhe2', 'b.empleado_id = rhe2.nombre', 'left');
            $this->db->where('check_voladura', 0);
            $this->db->like('concat(rhe.nombre, " ", rhe.apellidos)', $this->input->post('key'));
            $this->db->like('id_zona', $this->input->post('id_zona'));
            $this->db->from('barrenacion b');
            $this->db->group_by('id', 'desc');
            $query = $this->db->get();
            return $query->result_array();
        }   
    }

    public function get_sum_rango_voladuras($date1, $date2){
        //$this->db->select('b.*, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id, b.zona');
        $this->db->select_sum('b.tons_tumbe');
        $this->db->select_sum('b.metros_perf');
        $this->db->select_sum('barreno');
        $this->db->select('SUM(b.metros_perf)/SUM(b.barreno) as resultado');
        $this->db->join('rh_empleados rhe', 'b.empleado_id = rhe.id', 'left');

        if($date1 && $date2) {
            $this->db->where('check_voladura', 0);
            $this->db->where('fecha >=', $date1);
            $this->db->where('fecha <=', $date2);
            $this->db->like('concat(rhe.nombre, " ", rhe.apellidos)', $this->input->post('key'));
            $this->db->like('id_zona', $this->input->post('id_zona'));
            $this->db->from('barrenacion b');
            //$this->db->group_by('id', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
        else if($date1=" " && $date2=" "){
            //$this->db->select('b.*, concat(rhe.nombre, " ", rhe.apellidos) as empleado_id');
            $this->db->join('rh_empleados rhe2', 'b.empleado_id = rhe2.nombre', 'left');
            $this->db->where('check_voladura', 0);
            $this->db->like('concat(rhe.nombre, " ", rhe.apellidos)', $this->input->post('key'));
            $this->db->like('id_zona', $this->input->post('id_zona'));
            $this->db->from('barrenacion b');
            //$this->db->group_by('id', 'desc');
            $query = $this->db->get();
            return $query->result();
        }   
    }

    public function voladuraExplosivoByID($id){
        $this->db->where('id', $id);
        $q = $this->db->get('voladuras');
        $response = $q->row_array();
        return $response;
    }

    public function barrenoVoladuraById($id){
        //$query = "SELECT b.barreno as SUM(cant_total_barr), ";
        $query = "SELECT b.id, b.fecha, bz.nombre as id_zona, b.metros_perf, bar_perf, b.tons_tumbe, CONCAT(rhe.nombre, ' ', rhe.apellidos) as empleado_id
                    FROM barrenacion b 
                        LEFT JOIN voladuras v ON b.id_voladura = v.id #v.id = b.id_voladura#
                        LEFT JOIN rh_empleados rhe ON b.empleado_id = rhe.id
                        LEFT JOIN barreno_zonas bz ON b.id_zona = bz.id
                                    WHERE v.id = '{$id}'
                                        GROUP BY b.id";
                                    
        $q = $this->db->query($query);
        return $q->result_array();
    }

    public function sumBarrenosTotal($id){
        $this->db->select_sum('barreno');
        $this->db->select_sum('metros_perf');
        $this->db->from('barrenacion b');
        $this->db->join('voladuras v', 'b.id_voladura = v.id', 'left');
        $this->db->where('v.id', $id);
        $query = $this->db->get();
        $response = $query->row_array();
        return $response;
    }

    public function getExplosivosVoladura(){
        $query = $this->db->get('explosivos_voladura');
        $response = $query->result_array();
        return $response;
    }

    public function getVoladuras(){
        $this->db->where('cargada', 0);
        $q = $this->db->get('voladuras');
        return $q->result_array();
    }

    public function getVoladurasPrueba(){
        $q = $this->db->get('voladuras');
        return $q->result_array();
    }

    public function get_zonas(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('barreno_zonas');
        $result = $query->result_array();
        return $result;
    }

    public function getzona()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('barreno_zonas');
        return $query->result();
    }

    public function getZonaBarrenacion(){
        $q = $this->db->get('barrenacion_zona');
        $response = $q->result_array();
        return $response;
    }

    public function json(){
        $this->datatables->select('*');
        $this->datatables->from('barrenacion');
        return $this->datatables->generate();
    }

}
