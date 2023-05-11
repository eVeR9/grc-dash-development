<?php 

    defined('BASEPATH') OR exit('No direct scripts allowed'); 

    class Transporte extends MY_Controller{

        public function __construct(){

            parent::__construct();
            $this->load->model('admin/transporte_model', 'transporte');
            $this->load->model('admin/pedido_model', 'pedidos');
            $this->load->model('admin/user_model', 'usuarios');

        }

        public function add_citas(){

            $id = $this->session->userdata('id_tp');

            if($this->input->post('action')){

                $this->form_validation->set_rules('folio', 'Folio');
                $this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');
                $this->form_validation->set_rules('hora', 'Hora', 'trim|required');
                $this->form_validation->set_rules('id_pedido', 'Pedido', 'required');
                $this->form_validation->set_rules('tipo_flete', 'Flete', 'required');
                $this->form_validation->set_rules('id_unidad', 'Unidad', 'required');
                $this->form_validation->set_rules('id_operador', 'Operador', 'required');
                $this->form_validation->set_rules('comentarios', 'Comentarios', 'trim');

                if($this->form_validation->run() == FALSE) {

                    echo validation_errors();
                    $data['folio'] = $this->transporte->getNextFolio();
                    $data['all_pedidos_complete'] =  $this->pedidos->get_all_pedidos_complete_id_transp($id);
                    $data['unidades'] = $this->transporte->list_unidades($id);
                    $data['operadores'] = $this->transporte->list_operadores($id);
                    $data['view'] = 'admin/transporte/add_citas';
                    $this->load->view('admin/layout', $data);

                } else {

                    $data = array(

                        'folio' => $this->input->post('folio'),
                        'fecha' => $this->input->post('fecha'),
                        'hora' => $this->input->post('hora'),
                        'id_pedido' => $this->input->post('id_pedido'),
                        'tipo_flete' => $this->input->post('tipo_flete'),
                        'id_unidad' => $this->input->post('id_unidad'),
                        'id_operador' => $this->input->post('id_operador'),
                        'id_estatus' => 1,
                        'comentarios' => $this->input->post('comentarios'),
                        'id_transportista' => $this->session->userdata('id_tp'),
                        'created_by' => $this->session->userdata('id_usuario')
                    );

                    $data = $this->security->xss_clean($data);
                    $result = $this->transporte->insert_citas($data);

                    if($result){

                        $this->session->set_flashdata('msg', 'Registro Agregado');
                        redirect('admin/transporte/add_citas');
                    }
                }

            } else {

                $data['folio'] = $this->transporte->getNextFolio();
                $data['all_pedidos_complete'] =  $this->pedidos->get_all_pedidos_complete_id_transp($id);
                $data['unidades'] = $this->transporte->list_unidades($id);
                $data['operadores'] = $this->transporte->list_operadores($id);
                $data['view'] = 'admin/transporte/add_citas';
                $this->load->view('admin/layout', $data);
            }

        }

        public function list_citas(){

            $id = $this->session->userdata('id_tp');

            $data['citas'] = $this->transporte->list_citas($id);
            $data['view'] = 'admin/transporte/list_citas';
            $this->load->view('admin/layout', $data);
        }

        public function list_citas_seguimiento(){

            $id = $this->session->userdata('id_tp');

            $data['citas'] = $this->transporte->list_citas_monitoreo($id);
            $data['view'] = 'admin/transporte/list_citas_seguimiento';
            $this->load->view('admin/layout', $data);
        }

        public function list_citas_monitoreo(){

            $id = $this->session->userdata('id_tp');

            $data['citas'] = $this->transporte->list_citas_monitoreo($id);
            $data['view'] = 'admin/transporte/list_citas_monitoreo';
            $this->load->view('admin/layout', $data);
        }

        public function add_operadores(){

            if($this->input->post('action')){

                //$this->form_validation->set_rules('id_transportista','Transportista','trim|required');
                $this->form_validation->set_rules('codigo_operador','Codigo de Operador','trim|required');
                $this->form_validation->set_rules('nombre','Nombre','trim|required');
                $this->form_validation->set_rules('apellidos','Apellidos','trim|required');
                $this->form_validation->set_rules('sexo','Sexo');
                //$this->form_validation->set_rules('id_estatus','Estatus de Colaborador','required');
                $this->form_validation->set_rules('domicilio','Domicilio','trim|required');
                $this->form_validation->set_rules('tel','Tel','trim|required');

                if($this->form_validation->run() == FALSE){

                    validation_errors();
                    $data['view'] = 'admin/transporte/add_operadores'; 
                    $this->load->view('admin/layout', $data);

                } else{

                    $data = array(
                        
                        'id_transportista' => $this->session->id_tp,
                        //'id_transportista' => $this->input->post('id_usuario'),
                        'codigo_operador' => $this->input->post('codigo_operador'),
                        'nombre' => $this->input->post('nombre'),
                        'apellidos' => $this->input->post('apellidos'),
                        'sexo' => $this->input->post('sexo'),
                        //'id_estatus' => $this->input->post('id_estatus'),
                        'domicilio' => $this->input->post('domicilio'),
                        'tel' => $this->input->post('tel'),
                        'created_by' => $this->session->id_usuario

                    );

                    $data = $this->security->xss_clean($data);
                    $result = $this->transporte->insert_operadores($data);

                    if($result){

                        $this->session->set_flashdata('msg', 'Registro Agregado!');
                        redirect('admin/transporte/add_operadores');
                    }

                }

            } else{

                $data['view'] = 'admin/transporte/add_operadores'; 
                $this->load->view('admin/layout', $data);
            }

        }

        public function list_operadores(){

            $id = $this->session->userdata('id_tp');

            $data['operadores'] = $this->transporte->list_operadores($id);
            $data['view'] = 'admin/transporte/list_operadores';
            $this->load->view('admin/layout', $data);
        }

        public function add_transportistas(){

            if($this->input->post('action')){

                $this->form_validation->set_rules('razon_social','Razon Social','trim|required');
                $this->form_validation->set_rules('codigo_transportista','Codigo Transportista','trim|required');
                $this->form_validation->set_rules('rfc','RFC','trim|required');
                $this->form_validation->set_rules('calle','Calle','trim');
                $this->form_validation->set_rules('num_exterior','Numero exterior');
                $this->form_validation->set_rules('colonia','Colonia','trim');
                $this->form_validation->set_rules('codigo_postal','Codigo Postal');
                $this->form_validation->set_rules('municipio','Municipio','trim');
                $this->form_validation->set_rules('ciudad','Ciudad','trim');
                $this->form_validation->set_rules('estado','Estado','trim');
                $this->form_validation->set_rules('pais','Pais','trim');
                $this->form_validation->set_rules('nombre_contacto','Contacto','trim|required');
                $this->form_validation->set_rules('tel_contacto','Tel Contacto');
                $this->form_validation->set_rules('email_contacto', 'Email', 'trim|required');

                if($this->form_validation->run() == FALSE){

                    validation_errors('Hello, Im a error');
                    $data['view'] = 'admin/transporte/add_transportistas';
                    $this->load->view('admin/layout', $data);

                } else{

                    $data = array(

                        'razon_social' => $this->input->post('razon_social'),
                        'codigo_transportista' => $this->input->post('codigo_transportista'),
                        'rfc' => $this->input->post('rfc'),
                        'calle' => $this->input->post('calle'),
                        'num_exterior' => $this->input->post('num_exterior'),
                        'colonia' => $this->input->post('colonia'),
                        'codigo_postal' => $this->input->post('codigo_postal'),
                        'municipio' => $this->input->post('municipio'),
                        'ciudad' => $this->input->post('ciudad'),
                        'estado' => $this->input->post('estado'),
                        'pais' => $this->input->post('pais'),
                        'nombre_contacto' => $this->input->post('nombre_contacto'),
                        'tel_contacto' => $this->input->post('tel_contacto'),
                        'email_contacto' => $this->input->post('email_contacto'),
                        'created_by' => $this->session->id_usuario
                    );

                    $data = $this->security->xss_clean($data);
                    $result = $this->transporte->insert_transportistas($data);

                    if($result){

                        $this->session->set_flashdata('msg', 'Registro Agregado');
                        redirect('admin/transporte/add_transportistas');
                    }
                }

            } else{

                $data['view'] = 'admin/transporte/add_transportistas';
                $this->load->view('admin/layout', $data);
            }
        }

        public function list_transportistas(){

            $data['transportistas'] = $this->transporte->list_transportistas();
            $data['view'] = 'admin/transporte/list_transportistas';
            $this->load->view('admin/layout', $data);
        }

        public function add_unidades(){

            if($this->input->post('action')){

                //$this->form_validation->set_rules('id_transportista','Transportista','trim|required');
                $this->form_validation->set_rules('numero_unidad','Unidad','trim|required');
                $this->form_validation->set_rules('placas','Placas','trim|required');
                $this->form_validation->set_rules('marca','Marca','trim');
                $this->form_validation->set_rules('modelo','Modelo','trim');
                $this->form_validation->set_rules('año','Año','trim');
                $this->form_validation->set_rules('color','Color','trim');

                if($this->form_validation->run() == FALSE){

                    validation_errors();
                    $data['view'] = 'admin/transporte/add_unidades'; 
                    $this->load->view('admin/layout', $data);

                } else{

                    $data = array(

                        'id_transportista' => $this->session->userdata('id_tp'),
                        'numero_unidad' => $this->input->post('numero_unidad'),
                        'placas' => $this->input->post('placas'),
                        'marca' => $this->input->post('marca'),
                        'modelo' => $this->input->post('modelo'),
                        'año' => $this->input->post('año'),
                        'color' => $this->input->post('color'),
                        'created_by' => $this->session->id_usuario
                    );

                    $data = $this->security->xss_clean($data);
                    $result = $this->transporte->insert_unidades($data);

                    if($result){

                        $this->session->set_flashdata('msg', 'Registro Agregado!');
                        redirect('admin/transporte/add_unidades');
                    }
                }

            } else{

                $data['view'] = 'admin/transporte/add_unidades'; 
                $this->load->view('admin/layout', $data);
            }
            
        }

        public function list_unidades(){

            $id = $this->session->userdata('id_tp');

            $data['unidades'] = $this->transporte->list_unidades($id);
            $data['view'] = 'admin/transporte/list_unidades';
            $this->load->view('admin/layout', $data);
        }

        public function generateEntradaController($id){

            $estatus = array('id_estatus' => 2);

            $data = $this->transporte->generateEntrada($estatus, $id);
            echo json_encode($data);
        }

        public function getTransportistaByIdController($id){

            $data = $this->transporte->get_transportistas_by_id($id);
            echo json_encode($data);
        }
        
    }