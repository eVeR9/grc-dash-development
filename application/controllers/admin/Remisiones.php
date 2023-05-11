<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Remisiones extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->library('datatables'); //load library ignited-dataTabl
			$this->load->model('admin/remision_model', 'remision_model');

		}

		public function index(){
				$depto = strtoupper($this->session->userdata('departamento'));
				$puest = strtoupper($this->session->userdata('puesto'));
				$email = strtoupper($this->session->userdata('email'));
				if($depto == "MINA" && $puest == "ESPUELA") {
					$data['view'] = 'admin/remisiones/remision_list_espuela';
					$this->load->view('admin/layout', $data);
				/*
				} elseif($email == "JCORONA@REGIOCAL.COM") {
					$data['view'] = 'admin/remisiones/remision_list2';
					$this->load->view('admin/layout', $data);
				
				} elseif($depto == "MINA" && $puest == "JEFE-BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_jefebas';
					$this->load->view('admin/layout', $data);
				*/

				} else {
					$data['view'] = 'admin/remisiones/remision_list';
					$this->load->view('admin/layout', $data);
				}
			
			
		}

	function json_new() {
			header('Content-Type: application/json');
			echo $this->remision_model->json_new(); //SACA LOS DATOS PARA remision_list.php
		}

		function json_espuela_new() {
			header('Content-Type: application/json');
			echo $this->remision_model->json_espuela_new(); //SACA LOS DATOS PARA remision_list.php
		}

		function json_bascula_new() {
			header('Content-Type: application/json');
			echo $this->remision_model->json_bascula_new(); //SACA LOS DATOS PARA remision_list.php
		}

		function json_jefe_bascula_new() {
			header('Content-Type: application/json');
			echo $this->remision_model->json_jefe_bascula_new(); //SACA LOS DATOS PARA remision_list.php
		}


		function json() {
        header('Content-Type: application/json');
        echo $this->remision_model->json(); //SACA LOS DATOS PARA remision_list.php
    }

    function json_espuela() {
        header('Content-Type: application/json');
        echo $this->remision_model->json_espuela(); //SACA LOS DATOS PARA remision_list.php
    }

    function json_bascula() {
        header('Content-Type: application/json');
        echo $this->remision_model->json_bascula(); //SACA LOS DATOS PARA remision_list.php
    }

    function json_jefe_bascula() {
        header('Content-Type: application/json');
        echo $this->remision_model->json_jefe_bascula(); //SACA LOS DATOS PARA remision_list.php
    }



function Lists()
{

	// Filters
	$aFilters = array();
	$nombre_vendedor = $this->input->post(‘nombre_vendedor’);
	$razon_social = $this->input->post(‘razon_social’);
	
	if(null !== $nombre_vendedor && ” !== $nombre_vendedor) {
		array_push($aFilters,
		array(
		‘fColumn’ => ‘nombre_vendedor’,
		‘fValue’ => strtolower($nombre_vendedor),
		‘fType’ => ‘where’,
		‘fEscape’ => TRUE,
		)
		);
	}
	
	if(null !== $razon_social && ” !== $razon_social) {
		array_push($aFilters,
		array(
		‘fColumn’ => ‘razon_social’,
		‘fValue’ => strtolower($razon_social),
		‘fType’ => ‘where’,
		‘fEscape’ => TRUE,
		)
		);
	}
	
	$aTable = $this->remision_model->json();
	$aColumns = array('DT_RowId','r.id', 'r.fecha_remision', 'r.id_cliente', 'c.razon_social', 'r.nombre_flete', 'r.orden_de_compra_cliente', 'r.salida_flete', 'r.tipo_flete', 'r.id_fase_de_remision', 'rf.fase_de_remision', 'r.id_vendedor', 'nombre_vendedor', 'r.ticket_bascula', 'r.toneladas_embarcadas', 'r.nombre_operador_flete', 'r.monto_total_remision',  'r.placas_flete', 'p.obra_cliente', 'r.id_material', 'm.nombre_del_material', 'r.toneladas_remision', 'r.created_by');
	$json = $this->datatables->get_json($aTable, $aColumns, $aFilters);
	echo $json;
}



    public function ajax_list()
    {
        $list = $this->remision_model->get_datatables();       
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $remisiones) {
		$no++;
		$row = array();
		$row[] = $no;
		$row[] = $remisiones->id;
		$row[] = $remisiones->fecha_remision;
		$row[] = $remisiones->razon_social;
		$row[] = $remisiones->nombre_flete;
		$row[] = $remisiones->orden_de_compra_cliente;
		$row[] = $remisiones->salida_flete;
		$row[] = $remisiones->tipo_flete;
		$row[] = $remisiones->id_fase_de_remision;
		$row[] = $remisiones->fase_de_remision;
		$row[] = $remisiones->nombre_vendedor;
		$row[] = $remisiones->ticket_bascula;
		$row[] = $remisiones->toneladas_embarcadas;
		$row[] = $remisiones->nombre_operador_flete;
		$row[] = $remisiones->monto_total_remision;
		$row[] = $remisiones->placas_flete;
		$row[] = $remisiones->obra_cliente;
		$row[] = $remisiones->nombre_del_material;
		$row[] = $remisiones->toneladas_remision;
		$row[] = $remisiones->created_by; 
		$data[] = $row;
 
        //$_POST['draw']='';
        }
 
        $output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->remision_model->count_all(),
			"recordsFiltered" => $this->remision_model->count_filtered(),
			"data" => $data,
		);
        //output to json format
       echo json_encode($output);
    }
	
	
	
		public function view($id = 0){
			//$data['all_remisiones'] =  $this->remision_model->get_all_remisiones();
			//$data['all_remisiones_complete'] =  $this->remision_model->get_all_remisiones_complete();
			$data['all_remisiones_complete_id'] =  $this->remision_model->get_all_remisiones_complete_id($id);
			//$data['next_id'] = $this->remision_model->next_id();
			//$data['empleados_ventas'] = $this->remision_model->get_empleados_ventas();
			//$data['all_estatus_remisiones'] = $this->remision_model->get_all_estatus_remisiones();
			//$data['all_clientes'] =  $this->remision_model->get_all_clientes();
			//$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
			//$data['all_materiales'] = $this->remision_model->get_all_materiales();*/
			$data['view'] = 'admin/remisiones/remision_view';
			$this->load->view('admin/layout', $data);
		}

		public function imprimir($id = 0){
			//$data['all_remisiones'] =  $this->remision_model->get_all_remisiones();
			//$data['all_remisiones_complete'] =  $this->remision_model->get_all_remisiones_complete();
			$data['all_remisiones_complete_id'] =  $this->remision_model->get_all_remisiones_complete_id($id);
			//$data['next_id'] = $this->remision_model->next_id();
			//$data['empleados_ventas'] = $this->remision_model->get_empleados_ventas();
			//$data['all_estatus_remisiones'] = $this->remision_model->get_all_estatus_remisiones();
			//$data['all_clientes'] =  $this->remision_model->get_all_clientes();
			//$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
			//$data['all_materiales'] = $this->remision_model->get_all_materiales();*/
			$data['view'] = 'admin/remisiones/remision_imprimir';
			$this->load->view('admin/layout', $data);
		}

		public function add(){
			if($this->input->post('submit')){

				//$this->form_validation->set_rules('fecha_remision', 'fecha_remision', 'trim|required');
				//$this->form_validation->set_rules('id_pedido', 'id_pedido', 'trim|required'); // Esta columna es AutoIncrement
				//$this->form_validation->set_rules('id_vendedor', 'id_vendedor', 'trim');
				//$this->form_validation->set_rules('id_cliente', 'id_cliente', 'trim');
				//$this->form_validation->set_rules('obra_cliente', 'obra_cliente', 'trim');
				//$this->form_validation->set_rules('id_fase_de_remision', 'id_fase_de_remision', 'trim|required');
				//$this->form_validation->set_rules('serie', 'serie', 'trim|required');
				$this->form_validation->set_rules('id_serie', 'id_serie', 'trim|required');
				//$this->form_validation->set_rules('nombre_flete', 'nombre_flete', 'trim|required');
				//$this->form_validation->set_rules('nombre_operador_flete', 'nombre_operador_flete', 'trim|required');
				//$this->form_validation->set_rules('placas_flete', 'placas_flete', 'trim|required');
				//$this->form_validation->set_rules('ticket_bascula', 'ticket_bascula', 'trim|required');
				//$this->form_validation->set_rules('entrada_flete', 'entrada_flete', 'trim|required');
				//$this->form_validation->set_rules('salida_flete', 'salida_flete', 'trim');
				//$this->form_validation->set_rules('destino_flete', 'destino_flete', 'trim|required');
				//$this->form_validation->set_rules('cajas_flete', 'cajas_flete', 'trim|required');
				//$this->form_validation->set_rules('tipo_flete', 'tipo_flete', 'trim|required');
				//$this->form_validation->set_rules('numero_guia_flete', 'numero_guia_flete', 'trim|required');
				//$this->form_validation->set_rules('monto_guia_flete', 'monto_guia_flete', 'trim|required');

				$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				//$this->form_validation->set_rules('notas', 'notas', 'trim|required');
				$this->form_validation->set_rules('id_material', 'Seleccione Material', 'trim|required');
				//$this->form_validation->set_rules('toneladas_remision', 'toneladas_remision', 'trim|required');
				//$this->form_validation->set_rules('peso_inicial', 'peso_inicial', 'trim|required');
				//$this->form_validation->set_rules('precio_tonelada', 'precio_tonelada', 'trim');
				//$this->form_validation->set_rules('monto_total_remision', 'monto_total_remision', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['next_id'] = $this->remision_model->next_id();
					$data['next_id_a'] = $this->remision_model->next_id_a();
					$data['next_id_e'] = $this->remision_model->next_id_e();
					$data['next_id_g'] = $this->remision_model->next_id_g();
					$data['all_empleados_ventas'] = $this->remision_model->get_empleados_ventas();
					$data['remisiones_fases'] = $this->remision_model->get_all_remisiones_fases();
					$data['all_clientes'] =  $this->remision_model->get_all_clientes();
					$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
					$data['materiales'] = $this->remision_model->get_all_materiales();
					$data['all_pedidos_complete'] =  $this->remision_model->get_all_pedidos_complete();
					$data['all_sucursales'] =  $this->remision_model->get_all_sucursales();					
					$data['view'] = 'admin/remisiones/remision_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$serie = $this->input->post('serie');
					$id_pedido = $this->input->post('id_pedido');
					$id_pedido = $this->input->post('id_pedido'); //hidden
					$precio_tonelada = $this->input->post('precio_tonelada'); //hidden para bascula
					$serie = $this->input->post('serie'); //hidden
					$toneladas_remision = $this->input->post('toneladas_remision');

					if($serie=='E') {
						$peso_final = $this->input->post('peso_final');
						$toneladas_remision = $peso_final;
						$chk_crg = 1;
						$id_fase_de_remision = 2;
						$monto_total_remision = $precio_tonelada * $peso_final;
					} else {
						$peso_final = 0;
						$toneladas_remision = 0;
						$monto_total_remision = 0;
						$chk_crg=0;
						$id_fase_de_remision = $this->input->post('id_fase_de_remision');
					}
					$data = array(
						'serie' => $this->input->post('serie'),
						'id_serie' => $this->input->post('id_serie'),
						'fecha_remision' => $this->input->post('fecha_remision'),
						'id_pedido' => $this->input->post('id_pedido'),
						'id_fase_de_remision' => $id_fase_de_remision,
						'ticket_bascula' => $this->input->post('ticket_bascula'),
						'nombre_flete' => $this->input->post('nombre_flete'),
						'nombre_operador_flete' => $this->input->post('nombre_operador_flete'),
						'placas_flete' => $this->input->post('placas_flete'),
						'entrada_flete' => $this->input->post('entrada_flete'),
						'salida_flete' => $this->input->post('salida_flete'),
						'destino_flete' => $this->input->post('destino_flete'),
						'cajas_flete' => $this->input->post('cajas_flete'),
						'tipo_flete' => $this->input->post('tipo_flete'),
						'numero_guia_flete' => $this->input->post('numero_guia_flete'),
						'monto_guia_flete' => $this->input->post('monto_guia_flete'),
						'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						'id_vendedor' => $this->input->post('id_vendedor'),
						'id_cliente' => $this->input->post('id_cliente'),
						'obra_cliente' => $this->input->post('obra_cliente'),
						'orden_de_compra' => $this->input->post('orden_de_compra'),
						'id_sucursal' => $this->input->post('id_sucursal'),
						'txt_sucursal' => $this->input->post('txt_sucursal'),
						'toneladas_remision' => $toneladas_remision,
						'chk_crg' => $chk_crg,
						'peso_inicial' => $this->input->post('peso_inicial'),
						'id_material' => $this->input->post('id_material'),
						'precio_tonelada' => $precio_tonelada,
						'peso_final' =>$peso_final,
						'monto_total_remision' => $monto_total_remision, // No capturar en el ADD
						'notas_remision' => $this->input->post('notas_remision'),
						'created_at' => date('Y-m-d : h:m:s'),
						'created_by' => $_SESSION["id_usuario"],
					);
					// PARA VER LOS DATOS QUE TRAE EL POST
					//echo "<pre>"; print_r($_POST) ;  echo "</pre>";
					//exit();
					$data = $this->security->xss_clean($data);
					$result = $this->remision_model->add_remision($data);
					$serie = 'add_serie_'.strtolower($this->input->post('serie'));
					$max_id = $this->remision_model->max_id();
					$data_serie = array(
						'id_remision' => $max_id,
						'id_pedido' => $this->input->post('id_pedido'),
					);
					$result_serie = $this->remision_model->$serie($data_serie);
					if($id_pedido > 0){
						$result2 = $this->remision_model->update_pedido_toneladas($id_pedido);
					}
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/remisiones'));
					}
				}
			}
			else{
				$data['next_id'] = $this->remision_model->next_id();
				$data['next_id_a'] = $this->remision_model->next_id_a();
				$data['next_id_e'] = $this->remision_model->next_id_e();
				$data['next_id_g'] = $this->remision_model->next_id_g();
				$data['all_empleados_ventas'] = $this->remision_model->get_empleados_ventas();
				$data['remisiones_fases'] = $this->remision_model->get_all_remisiones_fases();
				$data['all_clientes'] =  $this->remision_model->get_all_clientes();
				$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
				$data['materiales'] = $this->remision_model->get_all_materiales();
				$data['all_pedidos_complete'] =  $this->remision_model->get_all_pedidos_complete();
				$data['all_sucursales'] =  $this->remision_model->get_all_sucursales();					
			$data['view'] = 'admin/remisiones/remision_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				//$this->form_validation->set_rules('id_vendedor', 'id_vendedor', 'trim|required');
				//$this->form_validation->set_rules('id_remision', 'id_remision', 'trim|required'); // Esta columna es AutoIncrement
				//$this->form_validation->set_rules('id_fase_de_remision', 'id_fase_de_remision', 'trim');
				$this->form_validation->set_rules('fecha_remision', 'fecha_remision', 'trim');
				//$this->form_validation->set_rules('orden_de_compra_cliente', 'orden_de_compra_cliente', 'trim');
				//$this->form_validation->set_rules('razon_social', 'razon_social', 'trim');
				//$this->form_validation->set_rules('obra_cliente', 'obra_cliente', 'trim');
				//$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				//$this->form_validation->set_rules('notas', 'notas', 'trim|required');
				//$this->form_validation->set_rules('id_material', 'id_material', 'trim|required');
				$this->form_validation->set_rules('toneladas_remision', 'toneladas_remision', 'trim');
				//$this->form_validation->set_rules('precio_tonelada', 'precio_tonelada', 'trim');
				//$this->form_validation->set_rules('monto_total', 'monto_total', 'trim|required');
				//$this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
				//$this->form_validation->set_rules('created_by', 'created_by', 'trim|required');
				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim');

				if ($this->form_validation->run() == FALSE) {
					$data['empleados_ventas'] = $this->remision_model->get_empleados_ventas();
					//$data['all_remisiones_complete'] =  $this->remision_model->get_all_remisiones_complete();
					$data['all_remisiones_complete_id'] =  $this->remision_model->get_all_remisiones_complete_id($id);
					$data['remisiones_fases'] = $this->remision_model->get_all_remisiones_fases();
					$data['all_clientes'] =  $this->remision_model->get_all_clientes();
					$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
					$data['all_sucursales'] =  $this->remision_model->get_all_sucursales();	
					$data['materiales'] = $this->remision_model->get_all_materiales();


				$depto = strtoupper($this->session->userdata('departamento'));
				$puest = strtoupper($this->session->userdata('puesto'));

				if($depto == "MINA" && $puest == "BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_bascula';
					$this->load->view('admin/layout', $data);
	
				} elseif($depto == "MINA" && $puest == "ESPUELA") {
					$data['view'] = 'admin/remisiones/remision_edit_espuela';
					$this->load->view('admin/layout', $data);

				} elseif($depto == "MINA" && $puest == "JEFE-BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_jefebas';
					$this->load->view('admin/layout', $data);

				} else {
					$data['view'] = 'admin/remisiones/remision_edit';
					$this->load->view('admin/layout', $data);
				}
					 
				}

				else{
					$chk_crg=1;
					$id_pedido = $this->input->post('id_pedido'); //hidden
					$precio_tonelada = $this->input->post('precio_tonelada'); //hidden para bascula
					$serie = $this->input->post('serie'); //hidden
					$toneladas_remision = $this->input->post('toneladas_remision');
					if ($serie == 'G' || $serie == 'E' || $id_pedido = 0 ) 
						{ 
							$monto_total_remision = $this->input->post('monto_total_remision'); // CAPTURADO A MANO
						} else {
							$monto_total_remision = $precio_tonelada * $toneladas_remision; // TIENE PEDIDO O SERIE E
						}
						
					$data = array(
						'peso_final' => $this->input->post('peso_final'), //EDIT
						'salida_flete' => $this->input->post('salida_flete'), //EDIT
						'monto_total_remision' => $monto_total_remision, //EDIT
						'toneladas_remision' => $this->input->post('toneladas_remision'), // EDIT
						'tipo_flete' => $this->input->post('tipo_flete'), //EDIT
						'id_fase_de_remision' => $this->input->post('id_fase_de_remision'), //EDIT
						'chk_crg' => $chk_crg,
						'precio_tonelada' => $precio_tonelada,
						//TODOS ESTOS CAMPOS VIENEN YA CAPTURADOS EN EL ADD
						//'serie' => $this->input->post('serie'), 
						//'id_serie' => $this->input->post('id_serie'),
						'fecha_remision' => $this->input->post('fecha_remision'),
						'id_pedido' => $this->input->post('id_pedido'),
						'ticket_bascula' => $this->input->post('ticket_bascula'),
						'nombre_flete' => $this->input->post('nombre_flete'),
						'nombre_operador_flete' => $this->input->post('nombre_operador_flete'),
						'placas_flete' => $this->input->post('placas_flete'),
						'entrada_flete' => $this->input->post('entrada_flete'),
						'salida_flete' => $this->input->post('salida_flete'),
						'destino_flete' => $this->input->post('destino_flete'),
						'cajas_flete' => $this->input->post('cajas_flete'),
						'tipo_flete' => $this->input->post('tipo_flete'),
						'cargado_externo' => $this->input->post('cargado_externo'),
						//'numero_guia_flete' => $this->input->post('numero_guia_flete'),
						//'monto_guia_flete' => $this->input->post('monto_guia_flete'),
						//'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						//'id_vendedor' => $this->input->post('id_vendedor'),
						'id_cliente' => $this->input->post('id_cliente'), //hidden
						//'obra_cliente' => $this->input->post('obra_cliente'),
						//'orden_de_compra' => $this->input->post('orden_de_compra'),
						//'id_sucursal' => $this->input->post('id_sucursal'),
						//'txt_sucursal' => $this->input->post('txt_sucursal'),
						'peso_inicial' => $this->input->post('peso_inicial'),
						//'id_material' => $this->input->post('id_material'),
						//'precio_tonelada' => $this->input->post('precio_tonelada'),
						'notas_remision' => $this->input->post('notas_remision'),
						
						'updated_at' => date('Y-m-d : h:m:s'),
						'updated_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->remision_model->edit_remision($data, $id);
					$toneladas_remision = $this->input->post('toneladas_remision');
					$result2 = $this->remision_model->update_pedido_toneladas();
					if($result2){
						//echo "base: " . base_url();
						//exit();
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/remisiones'));
					}
				}
			}
			else{
				//$data['next_id'] = $this->remision_model->next_id();
				$data['empleados_ventas'] = $this->remision_model->get_empleados_ventas();
				//$data['all_remisiones_complete'] =  $this->remision_model->get_all_remisiones_complete();
				$data['all_remisiones_complete_id'] =  $this->remision_model->get_all_remisiones_complete_id($id);
				$data['remisiones_fases'] = $this->remision_model->get_all_remisiones_fases();
				$data['all_clientes'] =  $this->remision_model->get_all_clientes();
				$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
				$data['materiales'] = $this->remision_model->get_all_materiales();
				$data['all_sucursales'] =  $this->remision_model->get_all_sucursales();

				//Si es depto MINA y si es puesto BASCULA mandame a la vista de BASCULA
				$depto = strtoupper($this->session->userdata('departamento'));
				$puest = strtoupper($this->session->userdata('puesto'));

				if($depto == "MINA" && $puest == "BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_bascula';
					$this->load->view('admin/layout', $data);
	
				} elseif($depto == "MINA" && $puest == "ESPUELA") {
					$data['view'] = 'admin/remisiones/remision_edit_espuela';
					$this->load->view('admin/layout', $data);

				} elseif($depto == "MINA" && $puest == "JEFE-BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_jefebas';
					$this->load->view('admin/layout', $data);

				} else {
					$data['view'] = 'admin/remisiones/remision_edit';
					$this->load->view('admin/layout', $data);
				}
			}
		}

		public function edit2($id = 0){
			if($this->input->post('submit')){
				//$this->form_validation->set_rules('id_vendedor', 'id_vendedor', 'trim|required');
				//$this->form_validation->set_rules('id_remision', 'id_remision', 'trim|required'); // Esta columna es AutoIncrement
				//$this->form_validation->set_rules('id_fase_de_remision', 'id_fase_de_remision', 'trim');
				$this->form_validation->set_rules('fecha_remision', 'fecha_remision', 'trim');
				//$this->form_validation->set_rules('orden_de_compra_cliente', 'orden_de_compra_cliente', 'trim');
				//$this->form_validation->set_rules('razon_social', 'razon_social', 'trim');
				//$this->form_validation->set_rules('obra_cliente', 'obra_cliente', 'trim');
				//$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				//$this->form_validation->set_rules('notas', 'notas', 'trim|required');
				//$this->form_validation->set_rules('id_material', 'id_material', 'trim|required');
				$this->form_validation->set_rules('toneladas_remision', 'toneladas_remision', 'trim');
				//$this->form_validation->set_rules('precio_tonelada', 'precio_tonelada', 'trim');
				//$this->form_validation->set_rules('monto_total', 'monto_total', 'trim|required');
				//$this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
				//$this->form_validation->set_rules('created_by', 'created_by', 'trim|required');
				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim');

				if ($this->form_validation->run() == FALSE) {
					$data['empleados_ventas'] = $this->remision_model->get_empleados_ventas();
					//$data['all_remisiones_complete'] =  $this->remision_model->get_all_remisiones_complete();
					$data['all_remisiones_complete_id'] =  $this->remision_model->get_all_remisiones_complete_id($id);
					$data['remisiones_fases'] = $this->remision_model->get_all_remisiones_fases();
					$data['all_clientes'] =  $this->remision_model->get_all_clientes();
					$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
					$data['all_sucursales'] =  $this->remision_model->get_all_sucursales();	
					$data['materiales'] = $this->remision_model->get_all_materiales();


				$depto = strtoupper($this->session->userdata('departamento'));
				$puest = strtoupper($this->session->userdata('puesto'));

				if($depto == "MINA" && $puest == "BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_bascula';
					$this->load->view('admin/layout', $data);
	
				} elseif($depto == "MINA" && $puest == "ESPUELA") {
					$data['view'] = 'admin/remisiones/remision_edit_espuela';
					$this->load->view('admin/layout', $data);

				} elseif($depto == "MINA" && $puest == "JEFE-BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_jefebas';
					$this->load->view('admin/layout', $data);

				} else {
					$data['view'] = 'admin/remisiones/remision_edit2';
					$this->load->view('admin/layout', $data);
				}
					 
				}

				else{
					$chk_crg=1;
					$id_pedido = $this->input->post('id_pedido'); //hidden
					$precio_tonelada = $this->input->post('precio_tonelada'); //hidden para bascula
					$serie = $this->input->post('serie'); //hidden
					$toneladas_remision = $this->input->post('toneladas_remision');
					if ($serie == 'G' || $serie == 'E' || $id_pedido = 0 ) 
						{ 
							$monto_total_remision = $this->input->post('monto_total_remision'); // CAPTURADO A MANO
						} else {
							$monto_total_remision = $precio_tonelada * $toneladas_remision; // TIENE PEDIDO O SERIE E
						}
						
					$data = array(
						'peso_final' => $this->input->post('peso_final'), //EDIT
						'salida_flete' => $this->input->post('salida_flete'), //EDIT
						'monto_total_remision' => $monto_total_remision, //EDIT
						'toneladas_remision' => $this->input->post('toneladas_remision'), // EDIT
						'tipo_flete' => $this->input->post('tipo_flete'), //EDIT
						'id_fase_de_remision' => $this->input->post('id_fase_de_remision'), //EDIT
						'chk_crg' => $chk_crg,
						'precio_tonelada' => $precio_tonelada,
						//TODOS ESTOS CAMPOS VIENEN YA CAPTURADOS EN EL ADD
						//'serie' => $this->input->post('serie'), 
						//'id_serie' => $this->input->post('id_serie'),
						'fecha_remision' => $this->input->post('fecha_remision'),
						'id_pedido' => $this->input->post('id_pedido'),
						'ticket_bascula' => $this->input->post('ticket_bascula'),
						'nombre_flete' => $this->input->post('nombre_flete'),
						'nombre_operador_flete' => $this->input->post('nombre_operador_flete'),
						'placas_flete' => $this->input->post('placas_flete'),
						'entrada_flete' => $this->input->post('entrada_flete'),
						'salida_flete' => $this->input->post('salida_flete'),
						'destino_flete' => $this->input->post('destino_flete'),
						'cajas_flete' => $this->input->post('cajas_flete'),
						'tipo_flete' => $this->input->post('tipo_flete'),
						'cargado_externo' => $this->input->post('cargado_externo'),
						//'numero_guia_flete' => $this->input->post('numero_guia_flete'),
						//'monto_guia_flete' => $this->input->post('monto_guia_flete'),
						//'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						//'id_vendedor' => $this->input->post('id_vendedor'),
						'id_cliente' => $this->input->post('id_cliente'), //hidden
						//'obra_cliente' => $this->input->post('obra_cliente'),
						//'orden_de_compra' => $this->input->post('orden_de_compra'),
						//'id_sucursal' => $this->input->post('id_sucursal'),
						//'txt_sucursal' => $this->input->post('txt_sucursal'),
						'peso_inicial' => $this->input->post('peso_inicial'),
						//'id_material' => $this->input->post('id_material'),
						//'precio_tonelada' => $this->input->post('precio_tonelada'),
						'notas_remision' => $this->input->post('notas_remision'),
						
						'updated_at' => date('Y-m-d : h:m:s'),
						'updated_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->remision_model->edit_remision($data, $id);
					$toneladas_remision = $this->input->post('toneladas_remision');
					$result2 = $this->remision_model->update_pedido_toneladas($id_pedido);
					if($result){
						//echo "base: " . base_url();
						//exit();
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/remisiones'));
					}
				}
			}
			else{
				//$data['next_id'] = $this->remision_model->next_id();
				$data['empleados_ventas'] = $this->remision_model->get_empleados_ventas();
				$data['all_pedidos_complete'] =  $this->remision_model->get_all_pedidos_complete();
				$data['all_remisiones_complete_id'] =  $this->remision_model->get_all_remisiones_complete_id($id);
				$data['remisiones_fases'] = $this->remision_model->get_all_remisiones_fases();
				$data['all_clientes'] =  $this->remision_model->get_all_clientes();
				$data['all_registro_patronal'] =  $this->remision_model->get_all_registro_patronal();
				$data['materiales'] = $this->remision_model->get_all_materiales();
				$data['all_sucursales'] =  $this->remision_model->get_all_sucursales();

				//Si es depto MINA y si es puesto BASCULA mandame a la vista de BASCULA
				$depto = strtoupper($this->session->userdata('departamento'));
				$puest = strtoupper($this->session->userdata('puesto'));

				if($depto == "MINA" && $puest == "BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_bascula';
					$this->load->view('admin/layout', $data);
	
				} elseif($depto == "MINA" && $puest == "ESPUELA") {
					$data['view'] = 'admin/remisiones/remision_edit_espuela';
					$this->load->view('admin/layout', $data);

				} elseif($depto == "MINA" && $puest == "JEFE-BASCULA") {
					$data['view'] = 'admin/remisiones/remision_edit_jefebas';
					$this->load->view('admin/layout', $data);

				} else {
					$data['view'] = 'admin/remisiones/remision_edit2';
					$this->load->view('admin/layout', $data);
				}
			}
		}

		public function del_nousar($id = 0){
			$this->db->delete('empleados', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/empleados'));
		}

    public function get_values($id = 0)
    {
		$data =  $this->remision_model->get_all_remisiones_complete_id($id);
		if(empty($data['pedido_info_id'])) 
    echo "Given Array is empty"; 
	echo $data['pedido_info_id'];
        //$duration=$this->db->get_where ("tbl_subscriptions",array("sub_id"=>$sub_id));
        foreach ($data['pedido_info_id'] as $row)
        {
            $arr = array('id' => $row['id'], 'razon_social' => $row['razon_social_cliente']);
            //header('Content-Type: application/json');
            echo json_encode($arr);
        }
    }

    function get_pedido($id){
        $data = $this->remision_model->get_all_pedidos_complete_id($id);
        echo json_encode($data);
		$this->db->last_query();
    }

    function get_remision($id){
        $data = $this->remision_model->get_all_remisiones_complete_id($id);
        echo json_encode($data);
		$this->db->last_query();
    }

  public function getClienteSucursales(){
    // POST data 
    $postData = $this->input->post();
    // load model 
    $this->load->model('admin/pedido_model', 'pedido_model');
    // get data 
    $data = $this->pedido_model->getClienteSucursales($postData);
    echo json_encode($data); 
  }


	}


?>