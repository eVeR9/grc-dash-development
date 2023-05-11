<?php

class Inventario extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/inventario_model');
    }

    public function index(){

        $data['movimientos'] = $this->inventario_model->getMovimientos();
        $data['view'] = 'admin/inventario/movimientos';
        $this->load->view('admin/layout', $data);
    }

    public function entradas(){

        if($this->input->post('submit')){

            $this->form_validation->set_rules('producto_id', 'Producto', 'trim|required');
            $this->form_validation->set_rules('almacen_id', 'Almacen', 'trim|required');
            $this->form_validation->set_rules('unidades', 'Unidades', 'trim|required');
            //$this->form_validation->set_rules('trim|required');

            if($this->form_validation->run() == FALSE){

                //echo validation_errors();
                $data['almacenes'] = $this->inventario_model->getAlmacenes();
                $data['productos'] = $this->inventario_model->getProductos();
                $data['view'] = 'admin/inventario/entradas';
                $this->load->view('admin/layout', $data);

            } else{

                $data = array(
                    'producto_id' => $this->input->post('producto_id'),
                    'almacen_id' => $this->input->post('almacen_id'),
                    'unidades' => $this->input->post('unidades'),
                    'user_id' => $this->session->id_usuario
                );

                $data = $this->security->xss_clean($data);
                $result = $this->inventario_model->add($data);

                if($result){
                    $this->session->set_flashdata('msg', 'Se ha registrado una entrada');
                    redirect('admin/inventario/');

                }
            }

        } else{

            $data['almacenes'] = $this->inventario_model->getAlmacenes();
            $data['productos'] = $this->inventario_model->getProductos();
            $data['view'] = 'admin/inventario/entradas';
            $this->load->view('admin/layout', $data);

        }

    }

    public function salidas(){

        if($this->input->post('submit')){

            $this->form_validation->set_rules('producto_id', 'Producto', 'trim|required');
            $this->form_validation->set_rules('almacen_id', 'Almacen', 'trim|required');
            $this->form_validation->set_rules('unidades', 'Unidades', 'trim|required');

            if($this->form_validation->run() == FALSE){

                $data['almacenes'] = $this->inventario_model->getAlmacenes();
                $data['productos'] = $this->inventario_model->getProductos();
                $data['view'] = 'admin/inventario/salidas';
                $this->load->view('admin/layout', $data);

            } else{

                $data = array(

                    'producto_id' => $this->input->post('producto_id'),
                    'almacen_id' => $this->input->post('almacen_id'),
                    'unidades' => $this->input->post('unidades')*(-1),
                    'user_id' => $this->session->id_usuario
                );

                $data = $this->security->xss_clean($data);
                $result = $this->inventario_model->add($data);

                if($result){
                    $this->session->set_flashdata('msg', 'Se ha registrado una salida');
                    redirect('admin/inventario/');
                }

            }

        } else{

            $data['almacenes'] = $this->inventario_model->getAlmacenes();
            $data['productos'] = $this->inventario_model->getProductos();
            $data['view'] = 'admin/inventario/salidas';
            $this->load->view('admin/layout', $data);
        }
    }

    public function transferencias(){

        $almacenOrigen = $this->input->post('almacen_id');
        $almacenDestino = $this->input->post('almacen_id2');
        $unidades = $this->input->post('unidades');
        $producto = $this->input->post('producto_id');
        $lastId = $this->inventario_model->getMaxIdOfLastTransferencia();
        //print_r($lastId);

        if($this->input->post('submit')){

            $this->form_validation->set_rules('almacen_id', 'Almacen Origen', 'trim|required');
            $this->form_validation->set_rules('almacen_id2', 'Almacen Destino', 'trim|required');
            $this->form_validation->set_rules('unidades', 'Unidades', 'trim|required');
            $this->form_validation->set_rules('producto_id', 'Producto', 'trim|required');
            
            //print_r($_POST);
            //die();
            if($this->form_validation->run() == FALSE){

                $data['almacenes'] = $this->inventario_model->getAlmacenes();
                $data['productos'] = $this->inventario_model->getProductos();
                $data['view'] = 'admin/inventario/transferencias';
                $this->load->view('admin/layout', $data);

            } else{

                $data = array(

                    array(

                        'producto_id' => $producto,
                        'almacen_id' => $almacenOrigen,
                        'transferencia_id' => $lastId,
                        'unidades' => ($unidades) * -1,
                        'user_id' => $this->session->id_usuario,
                        'created_at' => date('Y-m-d : h:i:s')

                    ),
                    array(

                        'producto_id' => $producto,
                        'almacen_id' => $almacenDestino,
                        'transferencia_id' => $lastId,
                        'unidades' => $unidades,
                        'user_id' => $this->session->id_usuario,
                        'created_at' => date('Y-m-d : h:i:s')
                    )
                );


                $this->inventario_model->doTransferencia($almacenOrigen, $almacenDestino, $producto, $unidades);
                $this->inventario_model->addTransferencias($data);
                redirect('admin/inventario');
            }


        } else{

            $data['almacenes'] = $this->inventario_model->getAlmacenes();
            $data['productos'] = $this->inventario_model->getProductos();
            $data['view'] = 'admin/inventario/transferencias';
            $this->load->view('admin/layout', $data);

        }

    }
}