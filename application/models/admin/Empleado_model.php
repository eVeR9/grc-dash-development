<?php
	class Empleado_model extends CI_Model{

		public function add_empleado($data){
			$this->db->insert('rh_empleados', $data);
			return true;
		}

		public function add_empleados_documentos($data){
			$this->db->insert('rh_empleados_documentos', $data);
			return true;
		}

		public function add_empleados_equipos($data){
			$this->db->insert('rh_empleados_equipos', $data);
			return true;
		}


		public function get_all_empleados(){
    		$this->db->select('rhe.*, rhd.nombre_del_departamento, rhp.nombre_del_puesto, rha.nombre_del_area, rhes.empleado_estatus, rhrp.registro_patronal, rhtc.tipo_contrato, rhb.nombre_del_banco, rhnfp.forma_pago, rhnfrec.frecuencia_pago');
			$this->db->from('rh_empleados rhe');
			//$query = $this->db->where('email',$data['email']);
			//$query = $this->db->where('activo',1);
			$this->db->join('rh_departamentos rhd', 'rhe.id_departamento = rhd.id', 'left');
			$this->db->join('rh_areas rha', 'rhe.id_area = rha.id', 'left');
			$this->db->join('rh_puestos rhp', 'rhe.id_puesto = rhp.id', 'left');
			$this->db->join('rh_empleados_estatus rhes', 'rhe.id_empleado_estatus = rhes.id', 'left');
			$this->db->join('rh_registro_patronal rhrp', 'rhe.id_registro_patronal = rhrp.id', 'left');
			$this->db->join('rh_tipo_contrato rhtc', 'rhe.id_tipo_contrato = rhtc.id', 'left');
			$this->db->join('rh_bancos rhb', 'rhe.id_banco = rhb.id', 'left');
			$this->db->join('rh_nomina_forma_pago rhnfp', 'rhe.id_forma_pago = rhnfp.id', 'left');
			$this->db->join('rh_nomina_frecuencia_pago rhnfrec', 'rhe.id_frecuencia_pago = rhnfrec.id', 'left');
			$this->db->order_by('rhe.id_empleado_estatus', 'ASC');
			$this->db->order_by('rhe.apellidos', 'ASC');
			//$query = $this->db->get('rh_empleados');
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		public function get_all_empleados_id($id){
    		$this->db->select('rhe.*, rhd.nombre_del_departamento, rhp.nombre_del_puesto, rha.nombre_del_area, rhes.empleado_estatus, rhrp.registro_patronal, rhtc.tipo_contrato, rhb.nombre_del_banco, rhnfp.forma_pago, rhnfrec.frecuencia_pago');
			$this->db->from('rh_empleados rhe');
			$this->db->where('rhe.id', $id);
			$this->db->join('rh_departamentos rhd', 'rhe.id_departamento = rhd.id', 'left');
			$this->db->join('rh_areas rha', 'rhe.id_area = rha.id', 'left');
			$this->db->join('rh_puestos rhp', 'rhe.id_puesto = rhp.id', 'left');
			$this->db->join('rh_empleados_estatus rhes', 'rhe.id_empleado_estatus = rhes.id', 'left');
			$this->db->join('rh_registro_patronal rhrp', 'rhe.id_registro_patronal = rhrp.id', 'left');
			$this->db->join('rh_tipo_contrato rhtc', 'rhe.id_tipo_contrato = rhtc.id', 'left');
			$this->db->join('rh_bancos rhb', 'rhe.id_banco = rhb.id', 'left');
			$this->db->join('rh_nomina_forma_pago rhnfp', 'rhe.id_forma_pago = rhnfp.id', 'left');
			$this->db->join('rh_nomina_frecuencia_pago rhnfrec', 'rhe.id_frecuencia_pago = rhnfrec.id', 'left');
			$query = $this->db->get();
			return $query->row_array();
		}

		public function get_all_empleados_documentos($id){
			$query = $this->db->get_where('rh_empleados_documentos', array('id_rh_empleados' => $id));
			return $result = $query->result_array();
		}

		public function get_all_empleados_equipos($id){
			$query = $this->db->get_where('rh_empleados_equipos', array('id_rh_empleados' => $id));
			return $result = $query->result_array();
		}

		public function get_all_departamentos(){
			$query = $this->db->get('rh_departamentos');
			return $result = $query->result_array();
		}

		public function get_all_tipo_sangre(){
			$query = $this->db->get('rh_tipo_sangre');
			return $result = $query->result_array();
		}


		public function get_all_puestos(){
			$query = $this->db->get('rh_puestos');
			return $result = $query->result_array();
		}

		public function get_all_registro_patronal(){
			$this->db->select('rp.id, rp.registro_patronal, eg.razon_social');
			$this->db->from('rh_registro_patronal rp');
			$this->db->join('rh_empresas_general eg', 'rp.id_empresa_general = eg.id', 'left');
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		public function get_all_areas(){
			$query = $this->db->get('rh_areas');
			return $result = $query->result_array();
		}

		public function get_all_empleados_estatus(){
			$query = $this->db->get('rh_empleados_estatus');
			return $result = $query->result_array();
		}

		public function get_all_tipo_contrato(){
			$query = $this->db->get('rh_tipo_contrato');
			return $result = $query->result_array();
		}

		public function get_all_bancos(){
			$query = $this->db->get('rh_bancos');
			return $result = $query->result_array();
		}

		public function get_all_nomina_forma_pago(){
			$query = $this->db->get('rh_nomina_forma_pago');
			return $result = $query->result_array();
		}

		public function get_all_nomina_frecuencia_pago(){
			$query = $this->db->get('rh_nomina_frecuencia_pago');
			return $result = $query->result_array();
		}

		
		
		public function get_empleado_by_id($id){
			$query = $this->db->get_where('rh_empleados', array('id' => $id));
			return $result = $query->row_array();
		}

		public function get_empleado_by_id_usuario($id){
			$query = $this->db->get_where('rh_empleados', array('id_usuario' => $id));
			return $result = $query->row_array();
		}


		public function edit_empleado($data, $id){
			$this->db->where('id', $id);
			$this->db->update('rh_empleados', $data);
			return true;
		}
		
		public function add_upload_empleado($data){
			$this->db->insert('rh_empleados_upload', $data);
			return true;
		}

		public function fetch_departamentos()
		 {
		  $this->db->order_by("nombre_del_departamento", "ASC");
		  $query = $this->db->get("rh_departamentos");
		  return $result = $query->result_array();
		 }


		public function fetch_puestos($id_departamento)
		 {
		  $this->db->where('id_departamento', $id_departamento);
		  $this->db->order_by('nombre_del_puesto', 'ASC');
		  $query = $this->db->get('rh_puestos');
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
    $q = $this->db->get('rh_departamentos');
    $response = $q->result_array();

    return $response;
  }		
		
  // Get Puestos
  function getDepartamentoPuestos($id_registro_patronal){
    $response = array();
 
    $this->db->select('*');
    $this->db->where('id_departamento', $id_registro_patronal);
    $q = $this->db->get('rh_puestos');
    $response = $q->result_array();
    return $response;
  }

  public function delete_empleados_documentos($id){
	$this->db->where('id', $id);
    $this ->db->delete('rh_empleados_documentos');
	return true;
}

public function delete_empleados_equipos($id){
	$this->db->where('id', $id);
    $this ->db->delete('rh_empleados_equipos');
	return true;
}


	public function max_id($table_name){
		return $this->db->select_max('id')->get($table_name)->row()->id;
	}

	public function getNextEmpNumber()
	{
	   $this->db->select_max('numero_empleado', 'max');
	   //$this->db->where('id_registro_patronal', $id_registro_patronal);
	   $query = $this->db->get('rh_empleados');
	   if ($query->num_rows() == 0) {
		  return 1;
	   }
	   $max = $query->row()->max;
	   return $max == 0 ? 1 : $max + 1;
	}

	

}

?>