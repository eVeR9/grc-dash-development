<?php
	class User_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('usuarios', $data);
			return true;
		}

		public function get_all_users(){
			$query = $this->db->get('usuarios');
			return $result = $query->result_array();
		}

		public function get_all_users_transp(){
			$this->db->where('transportista', '1');
			$query = $this->db->get('usuarios');
			$result = $query->result_array();
			return $result;
		}

		//Eliminar metodo
		public function get_all_users_clientes(){
			//$this->db->where('transportista', '1');
			$query = $this->db->get('usuarios_clientes');
			$result = $query->result_array();
			return $result;
		}

		public function get_user_by_id($id){
			$query = $this->db->get_where('usuarios', array('id' => $id));
			return $result = $query->row_array();
		}

		public function get_empleado_by_id_usuario($id){
			$query = $this->db->get_where('empleados', array('id_usuario' => $id));
			return $result = $query->row_array();
		}

		public function edit_user($data, $id){
			$this->db->where('id', $id);
			$this->db->update('usuarios', $data);
			return true;
		}

	}

?>