<?php
	class Pedido_model extends CI_Model{

		public function add_pedido($data){
			$this->db->insert('pedidos', $data);
			return true;
		}

		public function add_pedido_tp($data){

			$this->db->insert('pedidos_transportista', $data);
			return true;
		}

		function disableTransportista($inactivo, $id){

			$this->db->where('id', $id);
			$this->db->update('pedidos_transportista', $inactivo);
			return true;
		}
		
		public function get_transportistas_by_pedidoId($id=null){

			$this->db->select('pt.*, tt.razon_social as id_transportista');
			$this->db->from('pedidos_transportista pt');
			$this->db->join('transporte_transportistas tt', 'pt.id_transportista = tt.id');
			$this->db->where('pt.id_pedido', $id);
			$this->db->where('pt.activo_inactivo', '1');
			//$this->db->order_by('pt.id', 'DESC');
			$query = $this->db->get();

			$result = $query->result_array();
			return $result;
		}

		public function edit_pedido($data, $id){
			$this->db->where('id', $id);
			$this->db->update('pedidos', $data);
			return true;
		}

		public function next_id()
		{
		   $this->db->select_max('id', 'max');
		   $query = $this->db->get('pedidos');
		   if ($query->num_rows() == 0) {
			  return 1;
		   }
		   $max = $query->row()->max;
		   return $max == 0 ? 1 : $max + 1;
		}

		public function max_id(){
			$this->db->select_max('id');
			$query = $this->db->get('pedidos');
			return $result = $query->row_array();
		}

		public function get_all_pedidos(){
			$this->db->order_by("id", "DES");
			$query = $this->db->get('pedidos');
			return $result = $query->result_array();
		}

		public function get_all_pedidos_id(){
			$this->db->from('pedidos p');
			$this->db->where('p.id', $id);
			return $result = $query->row_array();
		}


		public function get_all_pedidos_complete(){
			//$query = $this->db->query("select p.fecha_pedido, p.id, pe.estatus_pedido, p.orden_de_compra, p.toneladas, p.toneladas_embarcadas, p.obra_cliente, c.razon_social, m.nombre_del_material, u.nombre, u.apellidos from pedidos p, clientes c, usuarios u, pedidos_estatus pe, registro_patronal rp, materiales m WHERE p.id_vendedor = u.id and p.id_cliente = c.id and p.id_estatus_pedido = pe.id and p.id_registro_patronal = rp.id and p.id_material = m.id order by p.id DESC");
			//$query = $this->db->get('pedidos');
    		$this->db->select('p.fecha_pedido, p.id, p.id_vendedor, pe.id as id_estatus_pedido, pe.estatus_pedido as estatus_pedido, p.fecha_pedido, p.id_cliente as id_cliente, p.orden_de_compra, p.toneladas, p.toneladas_embarcadas, p.precio_tonelada, p.monto_total, p.obra_cliente, c.razon_social, m.nombre_del_material, u.nombre, u.apellidos, pe.estatus_pedido, re.razon_social as razon_social_re, p.id_registro_patronal, p.notas, p.id_material, p.id_sucursal, cs.sucursal');
			$this->db->from('pedidos p');
			$this->db->join('clientes c', 'p.id_cliente = c.id', 'left');
			$this->db->join('materiales m', 'p.id_material = m.id', 'left');
			$this->db->join('usuarios u', 'p.id_vendedor = u.id', 'left');
			$this->db->join('pedidos_estatus pe', 'p.id_estatus_pedido = pe.id', 'left');
			$this->db->join('registro_patronal re', 'p.id_registro_patronal = re.id', 'left');
			$this->db->join('clientes_sucursal cs', 'p.id_sucursal = cs.id', 'left');
			$this->db->order_by('p.id', "DESC");
			$query = $this->db->get();
			return $result = $query->result_array();
		}

		public function get_all_pedidos_complete_id($id){
    		$this->db->select('p.fecha_pedido, p.id, p.id_vendedor, pe.id as id_estatus_pedido, pe.estatus_pedido as estatus_pedido, p.fecha_pedido, p.id_cliente as id_cliente, p.orden_de_compra, p.toneladas, p.toneladas_embarcadas, p.precio_tonelada, p.monto_total, p.obra_cliente, c.razon_social as razon_social_cliente, m.nombre_del_material, u.nombre, u.apellidos, pe.estatus_pedido, re.razon_social as razon_social_re, p.id_registro_patronal, p.notas, p.id_material, p.id_sucursal, cs.sucursal, f_de_pago, serie');
			$this->db->from('pedidos p');
			$this->db->where('p.id', $id);
			$this->db->join('clientes c', 'p.id_cliente = c.id', 'left');
			$this->db->join('materiales m', 'p.id_material = m.id', 'left');
			$this->db->join('usuarios u', 'p.id_vendedor = u.id', 'left');
			$this->db->join('pedidos_estatus pe', 'p.id_estatus_pedido = pe.id', 'left');
			$this->db->join('registro_patronal re', 'p.id_registro_patronal = re.id', 'left');
			$this->db->join('clientes_sucursal cs', 'p.id_sucursal = cs.id', 'left');
			$query = $this->db->get();
			return $query->row_array();
			//$query = $this->db->get('pedidos');
			//return $result = $query->row_array();
		}

		public function get_all_pedidos_complete_id_transp($id){

			$this->db->select('pt.id_pedido, c.razon_social as id_cliente');
			$this->db->from('pedidos_transportista pt');
			$this->db->join('pedidos p', 'pt.id_pedido = p.id');
			$this->db->join('clientes c', 'p.id_cliente = c.id', 'left');
			$this->db->where('pt.id_transportista', $id);
			$this->db->where('pt.activo_inactivo', '1');
			$this->db->group_by('pt.id_pedido');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function get_all_remisiones_pedido($id){
			$this->db->select('r.*, rf.fase_de_remision');
			$this->db->from('remisiones r');
			$this->db->where('r.id_pedido', $id);
			$this->db->where('r.id_fase_de_remision', 2);
			$this->db->join('remisiones_fases rf', 'r.id_fase_de_remision = rf.id', 'left');
			$query = $this->db->get();
			return $result = $query->result_array();
			//$query = $this->db->get('pedidos');
			//return $result = $query->row_array();
		}



		public function get_empleados_ventas(){
			$this->db->where('id_departamento', '1');
			$query = $this->db->get('usuarios');
			return $result = $query->result_array();
		}

		public function get_all_estatus_pedidos(){
			$query = $this->db->get('pedidos_estatus');
			return $result = $query->result_array();
		}

		public function get_all_clientes(){
			$this->db->order_by("razon_social", "ASC");
			$query = $this->db->get('clientes');
			return $result = $query->result_array();
		}

		public function get_all_sucursales(){
			$this->db->order_by("sucursal", "ASC");
			$query = $this->db->get('clientes_sucursal');
			return $result = $query->result_array();
		}


		public function get_all_materiales(){
			$this->db->order_by("nombre_del_material", "ASC");
			$query = $this->db->get('materiales');
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

		function getMaterialPedido($id){

            $this->db->select('m.nombre_del_material as id_material');
            $this->db->from('pedidos p');
			$this->db->join('materiales m', 'p.id_material = m.id', 'left');
			$this->db->where('p.id', $id);

			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
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