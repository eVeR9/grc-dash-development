<?php
	class Registro_patronal_model extends CI_Model{

		public function add_registro_patronal($data){
			$this->db->insert('registro_patronal', $data);
			return true;
		}

		public function get_all_registro_patronal(){
			$query = $this->db->get('registro_patronal');
			return $result = $query->result_array();
		}

		public function get_registro_patronal_by_id($id){
			$query = $this->db->get_where('registro_patronal', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_registro_patronal($data, $id){
			$this->db->where('id', $id);
			$this->db->update('registro_patronal', $data);
			return true;
		}

	}

?>