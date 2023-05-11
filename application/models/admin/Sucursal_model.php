<?php
	class Sucursal_model extends CI_Model{

		public function add_sucursal($data){
			$this->db->insert('clientes_sucursal', $data);
			return true;
		}
		public function edit_sucursal($data, $id){
			$this->db->where('id', $id);
			$this->db->update('clientes_sucursal', $data);
			return true;
		}
	public function get_all_sucursales(){
		$this->db->select('s.id, s.sucursal, c.razon_social');
		$this->db->from('clientes_sucursal s');
		$this->db->join('clientes c','s.id_cliente = c.id','left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_sucursales_id($id){
		$this->db->select('s.id, s.sucursal, s.id_cliente, c.razon_social');
		$this->db->from('clientes_sucursal s');
		$this->db->join('clientes c', 's.id_cliente = c.id', 'left');
		$this->db->where('s.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
		public function get_all_clientes(){
			$this->db->order_by("razon_social", "ASC");
			$query = $this->db->get('clientes');
			return $result = $query->result_array();
		}
}
?>