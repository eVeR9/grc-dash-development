<?php 
    defined('BASEPATH') or exit('No direct script access allowed');

        class Barrenacion extends MY_Controller {
            public function __construct() {
                parent::__construct();
                $this->load->library('datatables');
                $this->load->helper('url');
                $this->load->model('admin/barrenacion_model', 'barrenacion_model');
            }

            public function index(){
                $data['all_barrenacion'] = $this->barrenacion_model->get_all_barrenacion();
                //$data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                $data['view'] = 'admin/barrenacion/barrenacion_list';
                $this->load->view('admin/layout', $data);
            }

            //metas view
            public function metas_add() {
                if($this->input->post('submit')) {
                    $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
                    $this->form_validation->set_rules('concepto_id', 'concepto_id', 'trim|required');
                    $this->form_validation->set_rules('empleado_id', 'empleado_id', 'trim|required');
                    $this->form_validation->set_rules('metros_por_barrenar', 'metros_por_barrenar', 'trim|required');
                    $this->form_validation->set_rules('horas', 'horas', 'trim');
                    $this->form_validation->set_rules('observaciones', 'observaciones', 'trim');

                    if($this->form_validation->run() == FALSE){
                        //Valida si exite algo erroeno o alguna inconsistencia. Mantenme en la vista... 
                        $data['all_conceptos'] = $this->barrenacion_model->get_conceptos();
                        $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                        $data['view'] = 'admin/barrenacion/barrenacion_metas';
                        $this->load->view('admin/layout', $data);
                        //echo "<p>Completa los campos por favor<p>";

                    } else{
                        $data = array(
                            'fecha' => $this->input->post('fecha'),
                            'concepto_id' => $this->input->post('concepto_id'),
                            'empleado_id' => $this->input->post('empleado_id'),
                            'metros_por_barrenar' => $this->input->post('metros_por_barrenar'),
                            'horas' => $this->input->post('horas'),
                            'observaciones' => $this->input->post('observaciones'),
                            'created_at' => date('Y-m-d : h:m:s'),
                            'created_by' => $_SESSION['id_usuario']
                        );
                        //Insert Data
                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->add_metas($data);
                        if($result){
                            $this->session->set_flashdata('msg', 'Meta Guardada!');
                            redirect(base_url('admin/barrenacion/metas'));
                        }

                    }

                } else { 
                    /*Aun no se ha seteado la info de arriba y presentame los datos en la vista*/
                    //echo 'Metas Controller loading...';
                    $data['all_conceptos'] = $this->barrenacion_model->get_conceptos();
                    $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                    $data['view'] = 'admin/barrenacion/barrenacion_metas';
                    $this->load->view('admin/layout', $data);
                }
                
            }

            public function metas(){
                $data['metas_barrenacion'] = $this->barrenacion_model->get_metas_barrenacion();
                $data['view'] = 'admin/barrenacion/barrenacion_metas_list';
                $this->load->view('admin/layout', $data);
            }

            public function voladuras(){
                $this->form_validation->set_rules('date1','first date', 'trim|required');
                $this->form_validation->set_rules('date2','last date', 'trim|required');
                $this->input->post('search', 'Busqueda', 'trim');

                if($this->form_validation->run() == FALSE){
                    $date1 = "";
                    $date2 = "";
                    $key = "";
                    $zona = "";
                    $data['rangos'] = $this->barrenacion_model->get_rango_voladuras($date1, $date2, $key, $zona);
                    $data['view'] = 'admin/barrenacion/voladuras';
                    $this->load->view('admin/layout', $data);
                }else {
                    $date1 = $this->input->post('date1');
                    $date2 = $this->input->post('date2');
                    $key = $this->input->post('key');
                    $zona = $this->input->post('zona');
                    $data['rangos'] = $this->barrenacion_model->get_rango_voladuras($date1, $date2, $key, $zona);
                    $data['view'] = 'admin/barrenacion/voladuras';
                    $this->load->view('admin/layout', $data);
                    json_encode($data);
                }
                /*    
                $data['view'] = 'admin/barrenacion/voladuras';
                $this->load->view('admin/layout', $data);
                */
            }

            public function voladuras_add() {
                $this->form_validation->set_rules('date1','first date', 'trim|required');
                $this->form_validation->set_rules('date2','last date', 'trim|required');

                if($this->form_validation->run() == FALSE){
                    $data['view'] = 'admin/barrenacion/voladuras_add';
                    $this->load->view('admin/layout', $data);
                }else {
                    $date1 = $this->input->post('date1');
                    $date2 = $this->input->post('date2');
                    $data = $this->barrenacion_model->get_rango_voladuras($date1, $date2);
                    echo json_encode($data);
                }
                /*
                if($this->input->post('submit')){
                    $this->form_validation->set_rules('date1', 'fecha uno', 'trim|required');
                    $this->form_validation->set_rules('date2', 'fecha dos', 'trim|required');

                    if($this->form_validation->run() == FALSE){
                        $date1="";
                        $date2="";
                        $data['rango_voladuras'] = $this->barrenacion_model->get_rango_voladuras($date1, $date2);
                        var_dump($data['rango_voladuras']);
                        $data['view'] = 'admin/barrenacion/voladuras_add';
                        $this->load->view('admin/layout', $data);
                    } else {
                        $data = array(

                            $date1 => date("Y-m-d", strtotime($this->input->post('date1'))),
                            $date2 => date("Y-m-d", strtotime($this->input->post('date2')))
                        );
                        $data = $this->security->xss_clean($data);
                        redirect(base_url($_SERVER['PHP_SELF']));
                        //redirect(base_url('admin/barrenacion/voladuras'));

                        //echo $data;
                    }
                } else {
                    $date1="";
                    $date2="";
                    $data['rango_voladuras'] = $this->barrenacion_model->get_rango_voladuras($date1, $date2);
                    var_dump($data['rango_voladuras']);
                    $data['view'] = 'admin/barrenacion/voladuras_add';
                    $this->load->view('admin/layout', $data);
                }
                */
            }

            public function voladuras_edit(){
                $data['view'] = 'admin/barrenacion/voladuras_edit';
                $this->load->view('admin/layout', $data);
            }
         
            //add view
            public function add() {
                if($this->input->post('submit')){
                    $this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
                    $this->form_validation->set_rules('empleado_id', 'empleado_id', 'trim|required');
                    $this->form_validation->set_rules('maquina_id', 'maquina_id', 'trim|required');
                    $this->form_validation->set_rules('ayudante_id', 'ayudante_id', 'trim');
                    $this->form_validation->set_rules('plantilla', 'plantilla', 'trim|required');
                    $this->form_validation->set_rules('metros_perf', 'metros_perf', 'trim|required');
                    $this->form_validation->set_rules('bar_perf', 'bar_perf', 'trim|required');
                    $this->form_validation->set_rules('bar_por_volar', 'bar_por_volar', 'trim');
                    $this->form_validation->set_rules('tons_tumbe', 'tons_tumbe', 'trim');
                    $this->form_validation->set_rules('razon', 'razon de paro', 'trim');
                    $this->form_validation->set_rules('observaciones', 'observaciones', 'trim');
                    $this->form_validation->set_rules('zona', 'zona', 'trim');
                    
                    if($this->form_validation->run() == FALSE){
                        // Validacion con modelos y simultaneamente mantenme en la vista de add
                        $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                        $data['get_maquinas'] = $this->barrenacion_model->get_maquinas();
                        $data['get_ayudantes'] = $this->barrenacion_model->get_ayudantes_barrenacion();
                        $data['all_barrenacion'] = $this->barrenacion_model->get_all_barrenacion();
                        $data['view'] = 'admin/barrenacion/barrenacion_add';
                        $this->load->view('admin/layout', $data);
                    } else{
                        $data = array(
                            'fecha' => $this->input->post('fecha'),
                            'empleado_id' => $this->input->post('empleado_id'),
                            'maquina_id' => $this->input->post('maquina_id'),
                            'ayudante_id' => $this->input->post('ayudante_id'),
                            'plantilla' => $this->input->post('plantilla'),
                            'metros_perf' => $this->input->post('metros_perf'),
                            'bar_perf' => $this->input->post('bar_perf'),
                            'bar_por_volar' => $this->input->post('bar_por_volar'),
                            'tons_tumbe' => $this->input->post('tons_tumbe'),
                            'razon_id' => $this->input->post('razon_id'),
                            'paro' => $this->input->post('paro'),
                            'zona' => $this->input->post('zona'),
                            'linea' => $this->input->post('linea'),
                            'horas_paro' => $this->input->post('horas_paro'),
                            'observaciones' => $this->input->post('observaciones'),
                            'created_at' => date('Y-m-d : h:m:s'),
                            'created_by' => $_SESSION['id_usuario']
                        );
                        //Insert values
                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->add_barrenacion($data);
                        if($result){
                            $this->session->set_flashdata('msg', 'Programa Guardado!');
                            redirect(base_url('admin/barrenacion'));
                        }
                    }
                    
                } else { //Traerme datos del modelo mientras me fuerza a quedarme en la vista
                    //Mostrar la vista mientras desarrollo...
                //echo 'Add Controller loading...' ."<br>";
                $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                $data['get_maquinas'] = $this->barrenacion_model->get_maquinas();
                $data['get_ayudantes'] = $this->barrenacion_model->get_ayudantes_barrenacion();
                $data['all_barrenacion'] = $this->barrenacion_model->get_all_barrenacion();
                $data['razones'] = $this->barrenacion_model->get_razones();
                //print_r($data); //Validacion del array
                $data['view'] = 'admin/barrenacion/barrenacion_add';
                $this->load->view('admin/layout', $data);
                }
                
            }

            public function edit($id = 0) {
                if($this->input->post('submit')){
                    //$this->form_validation->set_rules('fecha', 'fecha', 'trim');
                    //$this->form_validation->set_rules('empleado_id', 'empleado_id', 'trim');
                    //$this->form_validation->set_rules('maquina_id', 'maquina_id', 'trim');
                    //$this->form_validation->set_rules('ayudante_id', 'ayudante_id', 'trim');
                    $this->form_validation->set_rules('plantilla', 'plantilla', 'trim');
                    //$this->form_validation->set_rules('metros_perf', 'metros_perf', 'trim');
                    //$this->form_validation->set_rules('bar_perf', 'bar_perf', 'trim');
                    //$this->form_validation->set_rules('bar_por_volar', 'bar_por_volar', 'trim');
                    //$this->form_validation->set_rules('tons_tumbe', 'tons_tumbe', 'trim');

                    //if run == FALSE
                    if($this->form_validation->run()==FALSE){
                        $data['razones'] = $this->barrenacion_model->get_razones();
                        $data['ayudantes_barrenacion'] = $this->barrenacion_model->get_ayudantes_barrenacion();
                        $data['all_barrenacion'] = $this->barrenacion_model->get_all_barrenacion();
                        $data['all_barrenacion_id'] = $this->barrenacion_model->get_all_barrenacion_id($id);
                        $data['view'] = 'admin/barrenacion/barrenacion_edit';
                        //echo 'FALSE';
                        $this->load->view('admin/layout', $data);
                    }

                    $data = array(
                        //'fecha' => $this->input->post('fecha'),
                        'empleado_id' => $this->input->post('empleado_id'),
                        'maquina_id' => $this->input->post('maquina_id'),
                        'ayudante_id' => $this->input->post('ayudante_id'),
                        'zona' => $this->input->post('zona'),
                        'linea' => $this->input->post('linea'),
                        'plantilla' => $this->input->post('plantilla'),
                        'metros_perf' => $this->input->post('metros_perf'),
                        'bar_perf' => $this->input->post('bar_perf'),
                        'bar_por_volar' => $this->input->post('bar_por_volar'),
                        'tons_tumbe' => $this->input->post('tons_tumbe'),
                        'paro' => $this->input->post('paro'),
                        'horas_paro' =>$this->input->post('horas_paro'),
                        'razon_id' => $this->input->post('razon_id'),
                        'observaciones' => $this->input->post('observaciones')
                    );

                    $data = $this->security->xss_clean($data);
                    $result = $this->barrenacion_model->edit_barrenacion($data, $id);
                    if($result){
                        $this->session->set_flashdata('msg', 'Registro Actualizado!');
                        redirect(base_url('admin/barrenacion'));
                    }

                } else {
                
                    //echo 'Main Edit Controller loading...';
                    //print_r($id);
                    $data['razones'] = $this->barrenacion_model->get_razones();
                    $data['ayudantes_barrenacion'] = $this->barrenacion_model->get_ayudantes_barrenacion();
                    $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                    $data['get_maquinas'] = $this->barrenacion_model->get_maquinas();
                    //$data['get_ayudantes'] = $this->barrenacion_model->get_ayudantes();
                    $data['all_barrenacion'] = $this->barrenacion_model->get_all_barrenacion();
                    $data['all_barrenacion_id'] = $this->barrenacion_model->get_all_barrenacion_id($id);
                    $data['view'] = 'admin/barrenacion/barrenacion_edit';
                    $this->load->view('admin/layout', $data);
                }
            }

            public function metas_edit($id = 0){
                if($this->input->post('submit')){

                    //$this->form_validation->set_rules('id', 'id', 'trim');
                    //$this->form_validation->set_rules('fecha', 'fecha', 'trim');
                    $this->form_validation->set_rules('concepto_id', 'concepto_id', 'trim');
                    $this->form_validation->set_rules('empleado_id', 'empleado_id', 'trim');
                    $this->form_validation->set_rules('metros_por_barrenar', 'metros_por_barrenar', 'trim');
                    $this->form_validation->set_rules('observaciones', 'observaciones', 'trim');

                    if($this->form_validation->run() == FALSE){
                        $data['all_conceptos'] = $this->barrenacion_model->get_conceptos();
                        $data['metas_barrenacion'] = $this->barrenacion_model->get_metas_barrenacion();
                        $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                        $data['metas_barrenacion_id'] = $this->barrenacion_model->get_metas_barrenacion_id($id);
                        $data['view'] = 'admin/barrenacion/barrenacion_metas_edit';
                        $this->load->view('admin/layout', $data);
                    }

                    $data = array(
                        'fecha' => $this->input->post('fecha'),
                        'concepto_id' => $this->input->post('concepto_id'),
                        'empleado_id' => $this->input->post('empleado_id'),
                        'metros_por_barrenar' => $this->input->post('metros_por_barrenar'),
                        'observaciones' => $this->input->post('observaciones')
                    );

                    //Update data
                    $data = $this->security->xss_clean($data);
                    $result = $this->barrenacion_model->edit_metas($data, $id);
                    if($result){
                        $this->session->set_flashdata('msg', 'Meta Actualizada!');
                        redirect(base_url('admin/barrenacion/metas'));
                    }

                } else {
                /*echo 'Edit Controller Loading...';
                print_r($id);*/
                $data['metas_barrenacion'] = $this->barrenacion_model->get_metas_barrenacion();
                $data['metas_barrenacion_id'] = $this->barrenacion_model->get_metas_barrenacion_id($id);
                $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                $data['all_conceptos'] = $this->barrenacion_model->get_conceptos();
                $data['view'] = 'admin/barrenacion/barrenacion_metas_edit';
                $this->load->view('admin/layout', $data);
                }   
            }

            public function maquina_edit($id=0){
                if($this->input->post('submit')){
                    $this->form_validation->set_rules('nombre', 'nombre de la maquina', 'trim|required');
                    $this->form_validation->set_rules('codigo_maquina', 'codigo de la maquina', 'trim');

                    if($this->form_validation->run() == FALSE){
                        $data['maquinas_id'] = $this->barrenacion_model->get_maquinas_id($id);
                        //var_dump($data);
                        $data['view'] = 'admin/barrenacion/maquina_edit';
                        $this->load->view('admin/layout', $data);
                        echo "Hello form!";

                    } else{
                        $data = array(
                            'nombre' => $this->input->post('nombre'),
                            'codigo_maquina' => $this->input->post('codigo_maquina')
                        );

                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->edit_maquinas($data, $id);
                        if($result){
                            $this->session->set_flashdata('msg', 'Registro editado');
                            //redirect(current_url());
                            redirect(base_url('admin/barrenacion/maquina_list'));
                        }
                    }

                } else{
                    $data['maquinas_id'] = $this->barrenacion_model->get_maquinas_id($id);
                    //  var_dump($data);
                    $data['view'] = 'admin/barrenacion/maquina_edit';
                    $this->load->view('admin/layout', $data);

                }
            }

     

            //View Only
            public function maquina_add() {
                //echo 'Hola soy maquina_add';
                if($this->input->post('submit')){
                    $this->form_validation->set_rules('nombre', 'nombre de maquina', 'required');
                    $this->form_validation->set_rules('codigo_maquina', 'codigo_maquina', 'trim');

                    if($this->form_validation->run() == FALSE){
                        //Valida si falta llenar un campo o hay algo mal en el formulario
                        $data['view'] = 'admin/barrenacion/maquina_add';
                        $this->load->view('admin/layout', $data);

                    } else { //Si no hay un dato erroneo en el form los datos se envian
                        $data = array(
                            'nombre' => $this->input->post('nombre'),
                            'codigo_maquina' => $this->input->post('codigo_maquina')
                        );
    
                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->add_maquinas($data);
                        if($result){
                            $this->session->set_flashdata('msg', 'Registro Guardado'); 
                            redirect(base_url('admin/barrenacion/maquina_list'));  
                        }
                    }

                } else {
                    $data['view'] = 'admin/barrenacion/maquina_add';
                    $this->load->view('admin/layout', $data); //19041982 pwd RC
                }

                
            }

            public function maquina_list(){
                $data['maquinas'] = $this->barrenacion_model->get_maquinas();
                $data['view'] = 'admin/barrenacion/maquina_list';
                $this->load->view('admin/layout', $data);
            }

            public function razones_add(){
                if($this->input->post('submit')){
                    $this->form_validation->set_rules('nombre', 'Razon', 'trim|required');
                    //$this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');
                    $this->form_validation->set_rules('descripcion', 'Descripcion', 'trim');

                    if($this->form_validation->run() == FALSE){
                        $data['view'] = 'admin/barrenacion/razones_add';
                        $this->load->view('admin/layout', $data);

                    } else {
                        $data = array(
                            'nombre' => $this->input->post('nombre'),
                            'descripcion' => $this->input->post('descripcion'),
                            //'fecha' => $this->input->post('fecha')
                        );

                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->add_razones($data);
                        if($result){
                            $this->session->set_flashdata('msg', 'Registro guardado');
                            redirect(base_url('admin/barrenacion/razones_list'));
                        }
                    }
                }

                $data['view'] = 'admin/barrenacion/razones_add';
                $this->load->view('admin/layout', $data);
            }

            public function razones_list(){
                $data['razones'] = $this->barrenacion_model->get_razones();
                $data['view'] = 'admin/barrenacion/razones_list';
                $this->load->view('admin/layout', $data);
            }

            public function conceptos_add(){
                if($this->input->post('submit')){
                    $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required');

                    if($this->form_validation->run() == FALSE) {
                        $data['view'] = 'admin/barrenacion/conceptos_add';
                        $this->load->view('admin/layout', $data);
                    } else {
                        $data = array(
                            'descripcion' => $this->input->post('descripcion')
                        );

                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->add_conceptos($data);
                        if($result) {
                            $this->session->set_flashdata('msg', 'Registro guardado');
                            redirect(base_url('admin/barrenacion/conceptos_list'));
                        }
                    }
                } else{
                    $data['view'] = 'admin/barrenacion/conceptos_add';
                    $this->load->view('admin/layout', $data);
                }

            }

            public function conceptos_list(){
                $data['conceptos'] = $this->barrenacion_model->get_conceptos();
                $data['view'] = 'admin/barrenacion/conceptos_list';
                $this->load->view('admin/layout', $data);

            }

            public function materiales_edgar() {
                $data['view'] = 'admin/barrenacion/ejemplo';
                $this->load->view('admin/layout', $data);
            }

            public function rangos_filtros (){
                //$data['ajax'] = $this->barrenacion_model->get_ajax();
                $data['view'] = 'admin/barrenacion/index_dp.php';
                $this->load->view('admin/layout', $data);
            }

            function json() {
                header('Content-Type: application/json');
                echo $this->barrenacion_model->json(); //SACA LOS DATOS PARA remision_list.php
            }

        }




?>