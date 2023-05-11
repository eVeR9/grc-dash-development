<?php
class Metas_embarques_model extends CI_Model{

		public function get_all_me(){
			$query = $this->db->get('metas_embarques');
    		$this->db->select('me.*, c.razon_social, m.nombre_del_material, concat(u.nombre," ",u.apellidos) as nombre_vendedor,cs.sucursal');
			$this->db->from('metas_embarques me');
			$this->db->join('clientes c', 'me.id_cliente = c.id', 'left');
			$this->db->join('materiales m', 'me.id_material = m.id', 'left');
			$this->db->join('usuarios u', 'me.id_vendedor = u.id', 'left');
			$this->db->join('clientes_sucursal cs', 'me.id_sucursal = cs.id', 'left');
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		public function add($data){
			$this->db->insert('metas_embarques', $data);
			return true;
		}

		public function get_all_me_by_id($id){
			$query = $this->db->get('metas_embarques');
    		$this->db->select('me.*, c.razon_social, m.nombre_del_material, concat(u.nombre," ",u.apellidos) as nombre_vendedor,cs.sucursal');
			$this->db->from('metas_embarques me');
			$this->db->where('me.id', $id);
			$this->db->join('clientes c', 'me.id_cliente = c.id', 'left');
			$this->db->join('materiales m', 'me.id_material = m.id', 'left');
			$this->db->join('usuarios u', 'me.id_vendedor = u.id', 'left');
			$this->db->join('clientes_sucursal cs', 'me.id_sucursal = cs.id', 'left');
			$query = $this->db->get();
			return $result = $query->row_array();
		}

		public function edit_me($data, $id){
			$this->db->where('id', $id);
			$this->db->update('metas_embarques', $data);
			//print_r($this->db->last_query());
			//exit();
			return true;
		}

		public function get_all_clientes(){
			$this->db->order_by("razon_social", "ASC");
			$query = $this->db->get('clientes');
			return $result = $query->result_array();
		}
		
		public function get_all_materiales(){
			$this->db->order_by("nombre_del_material", "ASC");
			$query = $this->db->get('materiales');
			return $result = $query->result_array();
		}

		public function get_all_sucursales(){
			$this->db->order_by("sucursal", "ASC");
			$query = $this->db->get('clientes_sucursal');
			return $result = $query->result_array();
		}
		public function get_empleados_ventas(){
			$this->db->where('id_departamento', '1');
			$query = $this->db->get('usuarios');
			return $result = $query->result_array();
		}
  // Get Sucursales
  function getClienteSucursales($postData){
    $response = array();
 
    $this->db->select('*');
    $this->db->where('id_cliente', $postData['id_cliente']);
    $q = $this->db->get('clientes_sucursal');
    $response = $q->result_array();
    return $response;
  }

	}

?>