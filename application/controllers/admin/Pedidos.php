<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pedidos extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/pedido_model', 'pedido_model');
			$this->load->model('admin/transporte_model', 'transporte');

		}

		public function index(){
			$data['all_pedidos'] =  $this->pedido_model->get_all_pedidos();
			$data['next_id'] = $this->pedido_model->next_id();
			$data['all_empleados_ventas'] = $this->pedido_model->get_empleados_ventas();
			$data['all_estatus_pedidos'] = $this->pedido_model->get_all_estatus_pedidos();
			$data['all_clientes'] =  $this->pedido_model->get_all_clientes();
			$data['all_registro_patronal'] =  $this->pedido_model->get_all_registro_patronal();
			$data['all_materiales'] = $this->pedido_model->get_all_materiales();
			$data['all_pedidos_complete'] =  $this->pedido_model->get_all_pedidos_complete();
			$data['view'] = 'admin/pedidos/pedido_list';
			$this->load->view('admin/layout', $data);
		}

		public function view($id = 0){
			$data['all_pedidos'] =  $this->pedido_model->get_all_pedidos();
			$data['all_pedidos_complete'] =  $this->pedido_model->get_all_pedidos_complete();
			$data['all_pedidos_complete_id'] =  $this->pedido_model->get_all_pedidos_complete_id($id);
			$data['all_remisiones_pedido'] =  $this->pedido_model->get_all_remisiones_pedido($id);
			$data['next_id'] = $this->pedido_model->next_id();
			$data['all_empleados_ventas'] = $this->pedido_model->get_empleados_ventas();
			$data['all_estatus_pedidos'] = $this->pedido_model->get_all_estatus_pedidos();
			$data['all_clientes'] =  $this->pedido_model->get_all_clientes();
			$data['all_registro_patronal'] =  $this->pedido_model->get_all_registro_patronal();
			$data['all_materiales'] = $this->pedido_model->get_all_materiales();
			$data['all_sucursales'] =  $this->pedido_model->get_all_sucursales();
			$data['view'] = 'admin/pedidos/pedido_view';
			$this->load->view('admin/layout', $data);
		}

		
		public function add(){
			if($this->input->post('submit')){

				$next_id = $this->pedido_model->next_id();

				$this->form_validation->set_rules('id_transportista', 'Transportista');
				$this->form_validation->set_rules('id_vendedor', 'id_vendedor', 'trim|required');
				//$this->form_validation->set_rules('id_pedido', 'id_pedido', 'trim|required'); // Esta columna es AutoIncrement
				$this->form_validation->set_rules('id_estatus_pedido', 'id_estatus_pedido', 'trim|required');
				$this->form_validation->set_rules('fecha_pedido', 'fecha_pedido', 'trim|required');
				$this->form_validation->set_rules('orden_de_compra', 'orden_de_compra', 'trim|required');
				$this->form_validation->set_rules('id_cliente', 'id_cliente', 'trim|required');
				$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				$this->form_validation->set_rules('notas', 'notas', 'trim|required');
				$this->form_validation->set_rules('id_material', 'id_material', 'trim|required');
				$this->form_validation->set_rules('toneladas', 'toneladas', 'trim|required');
				$this->form_validation->set_rules('precio_tonelada', 'precio_tonelada', 'trim|required');
				$this->form_validation->set_rules('monto_total', 'monto_total', 'trim|required');
				$this->form_validation->set_rules('f_de_pago', 'forma de pago', 'trim|required');
				//$this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
				//$this->form_validation->set_rules('created_by', 'created_by', 'trim|required');
				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|required');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/pedidos/pedido_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'id_transportista' => $this->input->post('id_transportista'),
						'id_vendedor' => $this->input->post('id_vendedor'),
						'id_estatus_pedido' => $this->input->post('id_estatus_pedido'),
						'fecha_pedido' => $this->input->post('fecha_pedido'),
						'orden_de_compra' => $this->input->post('orden_de_compra'),
						'id_cliente' => $this->input->post('id_cliente'),
						'id_sucursal' => $this->input->post('id_sucursal'),
						'obra_cliente' => $this->input->post('obra_cliente'),
						'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						'notas' => $this->input->post('notas'),
						'id_material' => $this->input->post('id_material'),
						'toneladas' => $this->input->post('toneladas'),
						'precio_tonelada' => $this->input->post('precio_tonelada'),
						'monto_total' => $this->input->post('monto_total'),
						'f_de_pago' => $this->input->post('f_de_pago'),
						'serie' => $this->input->post('serie'),
						'created_at' => date('Y-m-d : h:m:s'),
						'created_by' => $_SESSION["id_usuario"],
					);
					$data = $this->security->xss_clean($data);
					$result = $this->pedido_model->add_pedido($data);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Agregado!');
						redirect(base_url('admin/pedidos/edit/'.$next_id));
					}
				}
			}
			else{

				$data['next_id'] = $this->pedido_model->next_id();
				$data['all_empleados_ventas'] = $this->pedido_model->get_empleados_ventas();
				$data['all_estatus_pedidos'] = $this->pedido_model->get_all_estatus_pedidos();
				$data['all_clientes'] =  $this->pedido_model->get_all_clientes();
				$data['all_sucursales'] =  $this->pedido_model->get_all_sucursales();
				$data['all_registro_patronal'] =  $this->pedido_model->get_all_registro_patronal();
				$data['all_materiales'] = $this->pedido_model->get_all_materiales();
				$data['view'] = 'admin/pedidos/pedido_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function add_transp($id){

			$data = array(

				'id_pedido' => $id,
				'id_transportista' => $this->input->post('id_transportista')
			);

			if(!$this->input->post('id_transportista')){

				redirect(base_url('admin/pedidos/edit/'.$id));

			} else{

				$this->pedido_model->add_pedido_tp($data);
				redirect(base_url('admin/pedidos/edit/'.$id));
			}
		}

		public function edit($id = 0){

			//$id_pedido = $this->input->post('id_pedido');
			$id_tp = $this->input->post('id_transportista');
			

			if($this->input->post('submit')){
				$this->form_validation->set_rules('id_vendedor', 'id_vendedor', 'trim|required');
				//$this->form_validation->set_rules('id_pedido', 'id_pedido', 'trim|required'); // Esta columna es AutoIncrement
				$this->form_validation->set_rules('id_estatus_pedido', 'id_estatus_pedido', 'trim|required');
				$this->form_validation->set_rules('fecha_pedido', 'fecha_pedido', 'trim|required');
				$this->form_validation->set_rules('orden_de_compra', 'orden_de_compra', 'trim|required');
				$this->form_validation->set_rules('id_cliente', 'id_cliente', 'trim|required');
				$this->form_validation->set_rules('id_registro_patronal', 'id_registro_patronal', 'trim|required');
				$this->form_validation->set_rules('notas', 'notas', 'trim|required');
				$this->form_validation->set_rules('id_material', 'id_material', 'trim|required');
				$this->form_validation->set_rules('toneladas', 'toneladas', 'trim|required');
				//$this->form_validation->set_rules('precio_tonelada', 'precio_tonelada', 'trim|required');
				//$this->form_validation->set_rules('monto_total', 'monto_total', 'trim|required');
				//$this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
				//$this->form_validation->set_rules('created_by', 'created_by', 'trim|required');
				//$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|required');
				//$this->form_validation->set_rules('updated_by', 'updated_by', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['transp_by_pedido_id'] = $this->pedido_model->get_transportistas_by_pedidoId($id);
					$data['all_empleados_ventas'] = $this->pedido_model->get_empleados_ventas();
					$data['all_pedidos_complete'] =  $this->pedido_model->get_all_pedidos_complete();
					$data['all_pedidos_complete_id'] =  $this->pedido_model->get_all_pedidos_complete_id($id);
					$data['all_estatus_pedidos'] = $this->pedido_model->get_all_estatus_pedidos();
					$data['all_clientes'] =  $this->pedido_model->get_all_clientes();
					$data['all_sucursales'] =  $this->pedido_model->get_all_sucursales();
					$data['all_registro_patronal'] =  $this->pedido_model->get_all_registro_patronal();
					$data['all_materiales'] = $this->pedido_model->get_all_materiales();
					$data['view'] = 'admin/pedidos/pedido_edit';
					$this->load->view('admin/layout', $data);

				} else {

					$data = array(

						'id_vendedor' => $this->input->post('id_vendedor'),
						'id_estatus_pedido' => $this->input->post('id_estatus_pedido'),
						'fecha_pedido' => $this->input->post('fecha_pedido'),
						'orden_de_compra' => $this->input->post('orden_de_compra'),
						'id_cliente' => $this->input->post('id_cliente'),
						'id_sucursal' => $this->input->post('id_sucursal'),
						'obra_cliente' => $this->input->post('obra_cliente'),
						'id_registro_patronal' => $this->input->post('id_registro_patronal'),
						'notas' => $this->input->post('notas'),
						'id_material' => $this->input->post('id_material'),
						'toneladas' => $this->input->post('toneladas'),
						'precio_tonelada' => $this->input->post('precio_tonelada'),
						'monto_total' => $this->input->post('monto_total'),
						'f_de_pago' => $this->input->post('f_de_pago'),
						'serie' => $this->input->post('serie'),
						'updated_at' => date('Y-m-d : h:m:s'),
						'updated_by' => $_SESSION["id_usuario"],
					);

					$data = $this->security->xss_clean($data);
					$result = $this->pedido_model->edit_pedido($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Registro Actualizado!');
						redirect(base_url('admin/pedidos/'));
					}
				}
			}
			else{

				if($this->input->post('id_tp')){$this->add_transp($id, $id_tp);} 

				//$data['next_id'] = $this->pedido_model->next_id();
				$data['transp_by_pedido_id'] = $this->pedido_model->get_transportistas_by_pedidoId($id);
				$data['transportistas'] = $this->transporte->get_transportistas();
				$data['all_empleados_ventas'] = $this->pedido_model->get_empleados_ventas();
				$data['all_pedidos_complete'] =  $this->pedido_model->get_all_pedidos_complete();
				$data['all_pedidos_complete_id'] =  $this->pedido_model->get_all_pedidos_complete_id($id);
				$data['all_estatus_pedidos'] = $this->pedido_model->get_all_estatus_pedidos();
				$data['all_clientes'] =  $this->pedido_model->get_all_clientes();
				$data['all_sucursales'] =  $this->pedido_model->get_all_sucursales();
				$data['all_registro_patronal'] =  $this->pedido_model->get_all_registro_patronal();
				$data['all_materiales'] = $this->pedido_model->get_all_materiales();
				$data['view'] = 'admin/pedidos/pedido_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del_nousar($id = 0){
			$this->db->delete('empleados', array('id' => $id));
			$this->session->set_flashdata('msg', 'Registro Eliminado!');
			redirect(base_url('admin/empleados'));
		}

		public function disableTransportistaController($id){

			$inactivo = array('activo_inactivo' => '0');
			$data = $this->pedido_model->disableTransportista($inactivo, $id);
			echo json_encode($data);
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


          public function getMaterialPedidoController($id){
            
            $data = $this->pedido_model->getMaterialPedido($id);
            echo json_encode($data);
        }
		
	}
?>