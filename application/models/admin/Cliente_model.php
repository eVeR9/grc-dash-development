<?php
	class Cliente_model extends CI_Model{

		public function add_cliente($data){
			$this->db->insert('clientes', $data);
			return true;
		}

		public function get_all_clientes(){
			$query = $this->db->get('clientes');
			return $result = $query->result_array();
		}

		public function get_cliente_by_id($id){
			$query = $this->db->get_where('clientes', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_cliente($data, $id){
			$this->db->where('id', $id);
			$this->db->update('clientes', $data);
			return true;
		}

	}

?>