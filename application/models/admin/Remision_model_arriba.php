<?php
	class Remision_model extends CI_Model{
				
     public function __construct()
    {
        parent::__construct();
    }

    function json() {
        $this->datatables->select('r.id, r.id_pedido as id_pedido, r.id as id_remision, r.fecha_remision, r.id_cliente, c.razon_social, r.nombre_flete, r.orden_de_compra_cliente, r.salida_flete, r.tipo_flete, r.id_fase_de_remision, rf.fase_de_remision, r.id_vendedor, CASE r.id_vendedor WHEN 0 THEN "Sin Vendedor" ELSE concat(u.nombre," ",u.apellidos) END as nombre_vendedor, r.ticket_bascula, r.toneladas_embarcadas, r.nombre_operador_flete, r.monto_total_remision,  r.placas_flete, p.obra_cliente, r.id_material, m.nombre_del_material, r.toneladas_remision, r.id_registro_patronal, rp.razon_social as empresa_remisiona, r.created_by');
        $this->datatables->from('remisiones r');
      	$this->datatables->join('clientes c', 'r.id_cliente = c.id', 'left');
      	$this->datatables->join('usuarios u', 'r.id_vendedor = u.id', 'left');
      	$this->datatables->join('registro_patronal rp', 'r.id_registro_patronal = rp.id', 'left');
      	$this->datatables->join('materiales m', 'r.id_material = m.id', 'left');
      	$this->datatables->join('pedidos p', 'r.id_pedido = p.id', 'left');
      	$this->datatables->join('remisiones_fases rf', 'r.id_fase_de_remision = rf.id', 'left');
        //$this->datatables->order_by('r.id','desc');
		//$this->datatables->join('country', 'city.CountryCode = country.Code');

		$this->datatables->add_column('view', '<a href="remisiones/edit/$1">Editar</a> | <a href="remisiones/view/$1">Ver</a>', 'id');
		return $this->datatables->generate();
    }

	
    private function _get_datatables_query()
    {
         
        //add custom filter here
        if($this->input->post('razon_social'))
        {
            $this->db->where('razon_social', $this->input->post('razon_social'));
        }
        if($this->input->post('nombre_vendedor'))
        {
            $this->db->like('nombre_vendedor', $this->input->post('nombre_vendedor'));
        }
        if($this->input->post('nombre_del_material'))
        {
            $this->db->like('nombre_del_material', $this->input->post('nombre_del_material'));
        }
        if($this->input->post('fase_de_remision'))
        {
            $this->db->like('fase_de_remision', $this->input->post('fase_de_remision'));
        }
 
        $this->db->from($this->table);
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
		
		$table='remisiones r';
		$columnas = " r.id, r.fecha_remision, r.id_cliente, c.razon_social, r.nombre_flete, r.orden_de_compra_cliente, r.salida_flete, r.tipo_flete, r.id_fase_de_remision, rf.fase_de_remision, r.id_vendedor, concat(u.nombre,' ',u.apellidos) as nombre_vendedor, r.ticket_bascula, r.toneladas_embarcadas, r.nombre_operador_flete, r.monto_total_remision,  r.placas_flete, p.obra_cliente, r.id_material, m.nombre_del_material, r.toneladas_remision, r.created_by";

        $this->db->select('r.id, r.fecha_remision, r.id_cliente, c.razon_social, r.nombre_flete, r.orden_de_compra_cliente, r.salida_flete, r.tipo_flete, r.id_fase_de_remision, rf.fase_de_remision, r.id_vendedor, concat(u.nombre," ", u.apellidos) as nombre_vendedor, r.ticket_bascula, r.toneladas_embarcadas, r.nombre_operador_flete, r.monto_total_remision,  r.placas_flete, p.obra_cliente, r.id_material, m.nombre_del_material, r.toneladas_remision, r.created_by');
        $this->db->from('remisiones r');
      	$this->db->join('clientes c', 'r.id_cliente = c.id', 'left');
      	$this->db->join('usuarios u', 'r.id_vendedor = u.id', 'left');
      	$this->db->join('registro_patronal rp', 'r.id_registro_patronal = rp.id', 'left');
      	$this->db->join('materiales m', 'r.id_material = m.id', 'left');
      	$this->db->join('pedidos p', 'r.id_pedido = p.id', 'left');
      	$this->db->join('remisiones_fases rf', 'r.id_fase_de_remision = rf.id', 'left');
        $this->db->order_by('r.id','desc');
		
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_remisiones_join()
    {
		$table='remisiones r';
		$columnas = " r.id, r.fecha_remision, r.id_cliente, c.razon_social, r.nombre_flete, r.orden_de_compra_cliente, r.salida_flete, r.tipo_flete, r.id_fase_de_remision, rf.fase_de_remision, r.id_vendedor, concat(u.nombre,' ',u.apellidos) as nombre_vendedor, r.ticket_bascula, r.toneladas_embarcadas, r.nombre_operador_flete, r.monto_total_remision,  r.placas_flete, p.obra_cliente, r.id_material, m.nombre_del_material, r.toneladas_remision, r.created_by";

        $this->db->select($columnas);
        $this->db->from('remisiones r');
      	$this->db->join('clientes c', 'r.id_cliente = c.id', 'left');
      	$this->db->join('usuarios u', 'r.id_vendedor = u.id', 'left');
      	$this->db->join('registro_patronal rp', 'r.id_registro_patronal = rp.id', 'left');
      	$this->db->join('materiales m', 'r.id_material = m.id', 'left');
      	$this->db->join('pedidos p', 'r.id_pedido = p.id', 'left');
      	$this->db->join('remisiones_fases rf', 'r.id_fase_de_remision = rf.id', 'left');
        $this->db->order_by('r.id','desc');
        $query = $this->db->get();
        $result = $query->result();
 
        $remisiones = array();
        foreach ($result as $row) 
        {
            $remisiones[] = $row->id;
        }
        return $remisiones;
    }	
 
 
 /* TODAS LAS REMISIONES */
   function get_all_remisiones() {
	  $columnas = "r.id, r.fecha_remision, r.id_cliente, c.razon_social, r.nombre_flete, r.orden_de_compra_cliente, r.salida_flete, r.tipo_flete, r.id_fase_de_remision, rf.fase_de_remision, r.id_vendedor, concat(u.nombre,' ',u.apellidos) as nombre_vendedor, r.ticket_bascula, r.toneladas_embarcadas, r.nombre_operador_flete, r.monto_total_remision,  r.placas_flete, p.obra_cliente, r.id_material, m.nombre_del_material, r.toneladas_remision, r.created_by";
      $this->datatables->select($columnas);
      $this->datatables->from('remisiones r');
      $this->datatables->join('clientes c', 'r.id_cliente = c.id', 'left');
      $this->datatables->join('usuarios u', 'r.id_vendedor = u.id', 'left');
      $this->datatables->join('registro_patronal rp', 'r.id_registro_patronal = rp.id', 'left');
      $this->datatables->join('materiales m', 'r.id_material = m.id', 'left');
      $this->datatables->join('pedidos p', 'r.id_pedido = p.id', 'left');
      $this->datatables->join('remisiones_fases rf', 'r.id_fase_de_remision = rf.id', 'left');
      $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info" data-code="$1" data-name="$2" data-price="$3" data-category="$4">Editar</a> ','id');
      return $this->datatables->generate();
  } 
 		
	/* AGREGAR REMISION */
		public function add_remision($data){
			$this->db->insert('remisiones', $data);
			return true;
		}
	/* EDITAR REMISION */	
		public function edit_remision($data, $id){
			$this->db->where('id', $id);
			$this->db->update('remisiones', $data);
			return true;
		}
	/*SIGUIENTE ID de REMISION */
		public function next_id()
		{
		   $this->db->select_max('id', 'max');
		   $query = $this->db->get('remisiones');
		   if ($query->num_rows() == 0) {
			  return 1;
		   }
		   $max = $query->row()->max;
		   return $max == 0 ? 1 : $max + 1;
		}
		
	/*SIGUIENTE ID de REMISION SERIE A */
		public function next_id_a()
		{
		   $this->db->select_max('id', 'max');
		   $query = $this->db->get('remisiones_a');
		   if ($query->num_rows() == 0) {
			  return 1;
		   }
		   $max = $query->row()->max;
		   return $max == 0 ? 1 : $max + 1;
		}
		//Agregar siguiente ID en Serie A
		public function add_serie_a($data){
			$this->db->insert('remisiones_a', $data);
			return true;
		}
	/*SIGUIENTE ID de REMISION SERIE E - EFECTIVO */
		public function next_id_e()
		{
		   $this->db->select_max('id', 'max');
		   $query = $this->db->get('remisiones_e');
		   if ($query->num_rows() == 0) {
			  return 1;
		   }
		   $max = $query->row()->max;
		   return $max == 0 ? 1 : $max + 1;
		}
		//Agregar siguiente ID en Serie B
		public function add_serie_e($data){
			$this->db->insert('remisiones_e', $data);
			return true;
		}
	/*SIGUIENTE ID de REMISION SERIE G - ESPUELA */
		public function next_id_g()
		{
		   $this->db->select_max('id', 'max');
		   $query = $this->db->get('remisiones_g');
		   if ($query->num_rows() == 0) {
			  return 1;
		   }
		   $max = $query->row()->max;
		   return $max == 0 ? 1 : $max + 1;
		}
		//Agregar siguiente ID en Serie C
		public function add_serie_g($data){
			$this->db->insert('remisiones_g', $data);
			return true;
		}
	/* ULTIMO ID INSERTADO */
		/*SIGUIENTE ID de REMISION */
		public function max_id()
		{
		   $this->db->select_max('id', 'max');
		   $query = $this->db->get('remisiones');
		   if ($query->num_rows() == 0) {
			  return 1;
		   }
		   $max = $query->row()->max;
		   return $max;
		}

		public function max_id2(){
			$this->db->select_max('id');
			$query = $this->db->get('remisiones');
			return $result = $query->row_array();
		}

		public function get_all_remisiones1(){
			$this->db->order_by("id", "DES");
			$query = $this->db->get('remisiones');
			return $result = $query->result_array();
		}

		public function get_all_remisiones_complete(){
			$query = $this->db->query("r.id, r.id_pedido, r.fecha_remision, c.razon_social, r.nombre_flete, r.orden_de_compra_cliente, r.salida_flete, r.tipo_flete, r.id_fase_de_remision, rf.fase_de_remision, r.id_vendedor, concat(u.nombre,' ',u.apellidos) as nombre_vendedor, r.ticket_bascula, r.toneladas_embarcadas, r.nombre_operador_flete, r.monto_total_remision,  r.placas_flete, p.obra_cliente, r.id_material, m.nombre_del_material, r.toneladas_remision, r.created_by FROM remisiones r LEFT JOIN clientes c ON  r.id_cliente = c.id LEFT JOIN usuarios u ON r.id_vendedor = u.id LEFT JOIN registro_patronal rp ON r.id_registro_patronal = rp.id LEFT JOIN materiales m ON r.id_material = m.id LEFT JOIN pedidos p ON r.id_pedido = p.id LEFT JOIN remisiones_fases rf ON r.id_fase_de_remision = rf.id ORDER BY r.id DESC");
			return $result = $query->result_array();
		}

		public function get_all_remisiones_complete_id($id){
    		$this->db->select('r.id, r.id_pedido, r.id_cliente, r.fecha_remision, r.serie, r.id_serie, c.razon_social, r.nombre_flete, r.orden_de_compra_cliente, r.salida_flete, r.tipo_flete, r.destino_flete, r.cajas_flete, r.id_fase_de_remision, rf.fase_de_remision, r.id_vendedor, concat(u.nombre," ",u.apellidos) as nombre_vendedor, r.ticket_bascula, r.peso_inicial, r.peso_final, r.toneladas_embarcadas, r.nombre_operador_flete, r.monto_total_remision,  r.placas_flete, r.entrada_flete, p.obra_cliente, r.obra_cliente, r.id_material, m.nombre_del_material, r.toneladas_remision, r.id_sucursal, cs.sucursal, r.created_by, p.fecha_pedido, p.orden_de_compra, r.orden_de_compra_cliente, p.toneladas, p.toneladas_embarcadas, p.precio_tonelada, p.monto_total, re.razon_social as razon_social_re, p.id_registro_patronal, p.notas, r.notas_remision');
			$this->db->from('remisiones r');
			$this->db->where('r.id', $id);
			$this->db->join('clientes c', 'r.id_cliente = c.id', 'left');
			$this->db->join('materiales m', 'r.id_material = m.id', 'left');
			$this->db->join('usuarios u', 'r.id_vendedor = u.id', 'left');
			$this->db->join('pedidos p', 'r.id_pedido = p.id', 'left');
			$this->db->join('remisiones_fases rf', 'r.id_fase_de_remision = rf.id', 'left');
			$this->db->join('registro_patronal re', 'r.id_registro_patronal = re.id', 'left');
			$this->db->join('clientes_sucursal cs', 'r.id_sucursal = cs.id', 'left');
			$query = $this->db->get();
			return $query->row_array();
			//$query = $this->db->get('pedidos');
			//return $result = $query->row_array();
		}

		public function get_total_toneladas_embarcadas() {
			$query = $this->db->query("select id_pedido, sum(toneladas_embarcadas) as total_toneladas from remisiones group by id_pedido");
			return $result = $query->row_array();
		}

		public function get_all_pedidos_complete(){
			$query = $this->db->query("select p.fecha_pedido, p.id, pe.estatus_pedido, p.orden_de_compra, p.toneladas, p.toneladas_embarcadas, p.obra_cliente, c.razon_social, m.nombre_del_material, u.nombre, u.apellidos from pedidos p, clientes c, usuarios u, pedidos_estatus pe, registro_patronal rp, materiales m WHERE p.pedido_activo = 1 and p.id_vendedor = u.id and p.id_cliente = c.id and p.id_estatus_pedido = pe.id and p.id_registro_patronal = rp.id and p.id_material = m.id order by p.id DESC");
			//$query = $this->db->get('pedidos');
			return $result = $query->result_array();
		}

		public function get_all_pedidos_complete_id($id){
    		$this->db->select('p.fecha_pedido, p.id, p.id_vendedor, pe.id as id_estatus_pedido, pe.estatus_pedido as estatus_pedido, p.fecha_pedido, p.id_cliente as id_cliente, p.orden_de_compra, p.toneladas, p.toneladas_embarcadas, p.precio_tonelada, p.monto_total, p.obra_cliente, c.razon_social as razon_social_cliente, m.nombre_del_material, CONCAT(u.nombre, " ", u.apellidos) as vendedor, pe.estatus_pedido, re.razon_social as razon_social_re, p.id_registro_patronal, p.notas, p.id_material, p.id_sucursal, p.sucursal, sum(r.toneladas_remision) as toneladas_embarcadas, p.toneladas - sum(r.toneladas_remision) as toneladas_restantes');
			$this->db->from('pedidos p');
			$this->db->where('p.id', $id);
			$this->db->join('clientes c', 'p.id_cliente = c.id', 'left');
			$this->db->join('materiales m', 'p.id_material = m.id', 'left');
			$this->db->join('usuarios u', 'p.id_vendedor = u.id', 'left');
			$this->db->join('pedidos_estatus pe', 'p.id_estatus_pedido = pe.id', 'left');
			$this->db->join('registro_patronal re', 'p.id_registro_patronal = re.id', 'left');
			$this->db->join('remisiones r', 'p.id = r.id_pedido', 'left');
			$this->db->join('clientes_sucursal cs', 'p.id_sucursal = cs.id', 'left');
			$query = $this->db->get();
			return $result = $query->row_array();
		}

		public function get_empleados_ventas(){
			$this->db->where('id_departamento', '1');
			$query = $this->db->get('usuarios');
			return $result = $query->result_array();
		}

		public function get_all_remisiones_fases(){
			$query = $this->db->get('remisiones_fases');
			return $result = $query->result_array();
		}

		public function get_all_clientes(){
			//$this->db->select('id');
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

    function get_info_pedido($id){
        $query = $this->db->get_where('pedidos', array('id' => $id));
        return $result = $query->row_array();
    }
		
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