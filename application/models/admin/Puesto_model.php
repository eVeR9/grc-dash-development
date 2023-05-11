<?php
	class Puesto_model extends CI_Model{

		public function add_puesto($data){
			$this->db->insert('puestos', $data);
			return true;
		}

		public function get_all_puestos(){
			$this->db->select('*');
			$this->db->from('puestos as p');
			$this->db->join('departamentos as d', 'd.id = p.id_departamento');
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		public function get_all_departamentos(){
			$query = $this->db->get('departamentos');
			return $result = $query->result_array();
		}


		public function get_puesto_by_id($id){
			$query = $this->db->get_where('puestos', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_puesto($data, $id){
			$this->db->where('id', $id);
			$this->db->update('puestos', $data);
			return true;
		}

	}

?>