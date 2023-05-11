<?php
	class Departamento_model extends CI_Model{

		public function add_departamento($data){
			$this->db->insert('departamentos', $data);
			return true;
		}

		public function get_all_departamentos(){
			$query = $this->db->get('departamentos');
			return $result = $query->result_array();
		}

		public function get_departamento_by_id($id){
			$query = $this->db->get_where('departamentos', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_departamento($data, $id){
			$this->db->where('id', $id);
			$this->db->update('departamentos', $data);
			return true;
		}

	}

?>