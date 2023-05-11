<?php
class Laboratorio_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_cal($data)
    {
        $this->db->insert('laboratorio_calhorno', $data);
        return true;
    }

    public function add_horno($data)
    {
        $this->db->insert('laboratorio_horno', $data);
        return true;
    }

    public function add_mina($data)
    {
        $this->db->insert('laboratorio_mina', $data);
        return true;
    }

    public function add_barreno($data)
    {
        $this->db->insert('laboratorio_barrenos', $data);
        return true;
    }

    public function get_material()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('materiales');
        return $query->result_array();
    }
    public function getmaterial()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('materiales');
        return $query->result();
    }


    public function get_maquina()
    {
        $this->db->order_by('id','ASC');
        $query =$this->db->get('barreno_maquina');
        return $query->result_array();
    }
    public function getmaquina()
    {
        $this->db->order_by('id','ASC');
        $query =$this->db->get('barreno_maquina');
        return $query->result();
    }


    public function get_estatus()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('laboratorio_estatus');
        return $query->result_array();
    }
    public function getestatus()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('laboratorio_estatus');
        return $query->result();
    }


    public function get_hora()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('laboratorio_hora');
        return $query->result_array();
    }
    public function gethora()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('laboratorio_hora');
        return $query->result();
    }

    //Obtener los datos de la tabla Laboratorio_calhornos para editar
    public function get_laboratorio_calhorno_by_id($id){ 
        $query = $this->db->get_where('laboratorio_calhorno', array('id' => $id));
        return $result = $query->row_array();
    }

    //Obtener los datos de la abla Laboratorio_dolohornos para editar
    public function get_laboratorio_dolohorno_by_id($id){
        $query = $this->db->get_where('laboratorio_horno', array('id' => $id));
        return $result = $query->row_array();
    }

    //Obtener los datos de la tabla Laboratorio_mina para editar
    public function get_laboratorio_dolomina_by_id($id){
        $query = $this->db->get_where('laboratorio_mina', array('id' => $id));
        return $result = $query->row_array();
    }
    //Obtener los datos de la tabla Barrenacion para editar
    public function get_barrenacion_by_id($id){
        $query = $this->db->get_where('barrenacion', array('id' => $id));
        return $result = $query->row_array();
    }

    //Obtener los datos de la tabla Laboratorio_barrenos para editar
    public function get_laboratorio_barrenos_by_id($id){
        $query = $this->db->get_where('laboratorio_barrenos', array('id' => $id));
        return $result = $query->row_array();
    }

    //Funcion para editar e insertar datos a la tabla Laboratorio_calhorno
    public function edit_calhorno($data, $id){
        $this->db->where('id', $id);
        $this->db->update('laboratorio_calhorno', $data);
        return true;
    }

    //Funcion oara editar e insertar datos a la tabla Laboratorio_horno
    public function edit_dolohornos($data, $id){
        $this->db->where('id', $id);
        $this->db->update('laboratorio_horno', $data);
        return true;
    }

    //Funcion para editar e insertar datos a la tabla Laboratorio_mina
    public function edit_dolomina($data, $id){
        $this->db->where('id', $id);
        $this->db->update('laboratorio_mina', $data);
        return true;
    }
    //Funcion para editar e insertar datos a la tabla Laboratorio_barrenos
    public function edit_barreno($data, $id){
        $this->db->where('id', $id);
        $this->db->insert('laboratorio_barrenos', $data);
        return true;
    }

    //
    public function edit_laboratorio_barrenos($data, $id){
        $this->db->where('id', $id);
        $this->db->update('laboratorio_barrenos', $data);
        return true;
    }
    
    //Obtener datos de tablas Laboratorio Cal Hornos



    public function get_all_calhorno()
    {
        $this->db->select('la.*, le.*, lh.*, la.id');
        $this->db->from('laboratorio_calhorno as la');
        $this->db->join('laboratorio_estatus as le', 'le.id = la.id_estatus');
        $this->db->join('laboratorio_hora as lh', 'lh.id = la.id_hora');
        $this->db->order_by('la.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }


    //Obtener datos de tablas Laboratorio Dolomita Hornos



    public function get_all_dolohornos()
    {
        $this->db->select('lh.*, lm.*,ls.*,lh.id');
        $this->db->from('laboratorio_horno as lh');
        $this->db->join('materiales as lm', 'lm.id = lh.id_material');
        $this->db->join('laboratorio_estatus as ls', 'ls.id = lh.id_estatus');
        $this->db->order_by('lh.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //Obtener datos de las tablas de Laboratorio Dolomitas Mina

    public function get_all_dolomina()
    {
        $this->db->select('lmina.*, lm.*, ls.*, lmina.id');
        $this->db->from('laboratorio_mina as lmina');
        $this->db->join('materiales as lm', 'lm.id = lmina.id_material');
        $this->db->join('laboratorio_estatus as ls', 'ls.id = lmina.id_estatus');
        $this->db->order_by('lmina.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //Obtener datos de la tabla Barrenacion

    public function get_all_barrenacion()
    {
        $this->db->select('b.id, b.fecha, maq.nombre as maquina_id, b.bar_perf, b.metros_perf, b.linea');
        $this->db->from('barrenacion as b');
        $this->db->join('barreno_maquina as maq', 'maq.id = b.maquina_id');
        $this->db->where('b.paro', 0);
        $this->db->order_by('b.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    

    //Obtener datos de la tabla Laboratorio_barrenos
    public function get_all_laboratorio_barrenos()
    {
        $this->db->select('lb.*, maq.*, le.*, lb.id');
        $this->db->from('laboratorio_barrenos as lb');
        $this->db->join('barreno_maquina as maq', 'maq.id = lb.id_maquina');
        //$this->db->join('barrenacion as b', 'b.id = lb.id_barreno');
        $this->db->join('laboratorio_estatus as le', 'le.id = lb.id_estatus');
        $this->db->order_by('lb.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    
}
