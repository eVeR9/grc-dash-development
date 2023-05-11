<?php
class Sucursales_model extends CI_Model {
    public function add_sucursales($data){
        $this->db->insert('clientes_sucursal', $data);
            return true;
    }

    public function get_all() { //antes: get_all_sucursales
        $query = $this->db->get('clientes_sucursal');
        return $result = $query->result_array();
    }

    public function get_sucursales_by_id($id) {
        $query = $this->db->get_where('clientes_sucursal', array('id' => $id));
        return $result = $query->row_array();
    }

    public function get_all_sucursales() {  //get_all_sucursales_id
        $this->db->select('s.id, s.sucursal, c.razon_social');
        $this->db->from('clientes_sucursal s');
        $this->db->join('clientes c', 's.id_cliente = c.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_sucursales_id($id) {
        $this->db->select('s.id s.sucursal, c.razon_social');
        $this->db->from('clientes_sucursal s');
        $this->db->where('s.id', $id);
        $this->db->join('clientes c', 's.id_cliente = c.id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit_sucursales($id, $data) {
          $this->db->where('id', $id);
          $this->db->update('clientes_sucursal', $data);
            return true;
      }

    public function get_all_clientes(){
        $this->db->order_by("razon_social", "ASC");
        $query = $this->db->get('clientes');
        return $result = $query->result_array();
    }

}//parent class finish


?>