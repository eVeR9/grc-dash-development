<?php
	class Material_model extends CI_Model{

		public function add_material($data){
			$this->db->insert('materiales', $data);
			return true;
		}

		public function add_material_prod($data){
			$this->db->insert('materiales_produccion', $data);
			return true;
		}

		public function add_material_comp($data){
			$this->db->insert('materiales_componentes', $data);
			return true;
		}
	
		public function get_all_materiales(){
			$query = $this->db->get('materiales');
			return $result = $query->result_array();
		}

		public function get_all_materiales_prod(){
			$query =$this->db->get('materiales_produccion');
			$materiales_prod = $query->result_array();
			return $materiales_prod;
		}

		public function get_all_materiales_comp($id){
			$this->db->select('m.id, m.nombre_del_material, mc.id_material, mp.nombre as id_material_produccion');
			$this->db->from('materiales_componentes mc');
			$this->db->join('materiales m', 'mc.id_material = m.id', 'left');
			$this->db->join('materiales_produccion mp', 'mc.id_material_produccion = mp.id', 'left');
			$this->db->where('m.id', $id);
			$query = $this->db->get();
			if($query->num_rows() > 1){
				$componente_material = $query->result_array();
			} else {
				$componente_material = false;
			}
			
			return $componente_material;
		}

		public function get_material_by_id($id){
			$query = $this->db->get_where('materiales', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_material($data, $id){
			$this->db->where('id', $id);
			$this->db->update('materiales', $data);
			return true;
		}

	}

?>