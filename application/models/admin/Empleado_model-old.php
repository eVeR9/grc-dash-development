<?php
	class Empleado_model extends CI_Model{

		public function add_empleado($data){
			$this->db->insert('usuarios', $data);
			return true;
		}

		public function get_all_empleados(){
			$query = $this->db->get('usuarios');
			return $result = $query->result_array();
		}

		public function get_all_departamentos(){
			$query = $this->db->get('departamentos');
			return $result = $query->result_array();
		}

		public function get_all_puestos(){
			$query = $this->db->get('puestos');
			return $result = $query->result_array();
		}

		public function get_all_registro_patronal(){
			$query = $this->db->get('registro_patronal');
			return $result = $query->result_array();
		}


		public function get_empleado_by_id($id){
			$query = $this->db->get_where('usuarios', array('id' => $id));
			return $result = $query->row_array();
		}

		public function get_empleado_by_id_usuario($id){
			$query = $this->db->get_where('usuarios', array('id_usuario' => $id));
			return $result = $query->row_array();
		}


		public function edit_empleado($data, $id){
			$this->db->where('id', $id);
			$this->db->update('usuarios', $data);
			return true;
		}
		
		public function fetch_departamentos()
		 {
		  $this->db->order_by("nombre_del_departamento", "ASC");
		  $query = $this->db->get("departamentos");
		  return $result = $query->result_array();
		 }


		public function fetch_puestos($id_departamento)
		 {
		  $this->db->where('id_departamento', $id_departamento);
		  $this->db->order_by('nombre_del_puesto', 'ASC');
		  $query = $this->db->get('puestos');
		  $output = '<option value="">Seleccionar Puesto</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->id_puesto.'">'.$row->nombre_del_puesto.'</option>';
		  }
		  return $output;
		 }


		
  function getDepartamentos(){

    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('departamentos');
    $response = $q->result_array();

    return $response;
  }		
		
  // Get Puestos
  function getDepartamentoPuestos($postData){
    $response = array();
 
    $this->db->select('*');
    $this->db->where('id_departamento', $postData['id_departamento']);
    $q = $this->db->get('puestos');
    $response = $q->result_array();
    return $response;
  }
		
	}

?>