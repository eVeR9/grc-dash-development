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

            public function voladura(){
                $this->form_validation->set_rules('date1','first date', 'trim|required');
                $this->form_validation->set_rules('date2','last date', 'trim|required');

                    if($this->form_validation->run() == FALSE){
                        $date1 = "";
                        $date2 = "";
                        $key = "";
                        $zona = "";
                        //$data['zonas'] = $this->barrenacion_model->getZonaBarrenacion();
                        $data['zona'] = $this->barrenacion_model->getzona();
                        $data['rangos'] = $this->barrenacion_model->get_rango_voladuras($date1, $date2, $key, $zona);
                        $data['maxrango'] = $this->barrenacion_model->get_sum_rango_voladuras($date1, $date2, $key, $zona);
                        $data['view'] = 'admin/barrenacion/voladura';
                        $this->load->view('admin/layout', $data);
                    }else {
                        $date1 = $this->input->post('date1');
                        $date2 = $this->input->post('date2');

                        //$data['zonas'] = $this->barrenacion_model->getZonaBarrenacion();
                        $data['zona'] = $this->barrenacion_model->getzona();
                        $data['rangos'] = $this->barrenacion_model->get_rango_voladuras($date1, $date2);
                        $data['maxrango'] = $this->barrenacion_model->get_sum_rango_voladuras($date1, $date2);
                        $data['view'] = 'admin/barrenacion/voladura';
                        $this->load->view('admin/layout', $data);
                    }

                $voladura = $this->input->post('voladura');
                //UPDATE barrenacion SET check_voladura = 1 WHERE fecha BETWEEN '{$date1}' AND '{$date2}'

                if($voladura) {
                    $data = array(
                        'total_metros_perf' => $this->input->post('total_metros_perf'),
                        'cantidad_barrenos' => $this->input->post('cantidad_barrenos'),
                        'total_toneladas_tumbe' => $this->input->post('total_toneladas_tumbe'),
                        'metros_entre_barrenos' => $this->input->post('metros_entre_barrenos'),
                        'fecha_inicial' => $this->input->post('fecha_inicial'),
                        'fecha_final' => $this->input->post('fecha_final'),
                        'fecha' => $this->input->post('fecha'),
                        'created_at' => date('Y-m-d h:i:s')
                    );

                    $date1 = $this->input->post('fecha_inicial');
                    $date2 = $this->input->post('fecha_final');

                    $data = $this->security->xss_clean($data);
                    $result = $this->barrenacion_model->add_voladuras($data);

                    if($result && $_POST['voladura']){
                    
                    $query = $this->db->query("UPDATE barrenacion 
                                        SET check_voladura = 1 
                                            WHERE fecha 
                                                BETWEEN '{$date1}' AND '{$date2}'");
                    
                        $this->session->set_flashdata('msg', 'Registro Agregado');
                        redirect('admin/barrenacion/asignacion_de_explosivo');
                    }
                }
            }

            function getDateInterval(){

                $begin = new DateTime( '2012-08-01' );
                $end = new DateTime( '2012-08-31' );
                //$end = $end->modify( '+1 day' );

                $interval = new DateInterval('P1D');
                $daterange = new DatePeriod($begin, $interval ,$end);

         
                $data['daterange'] = $daterange;
                $data['view'] = 'admin/barrenacion/interval';
                $this->load->view('admin/layout', $data);
            }

            public function bitacora_de_voladura(){
                $data['voladuras'] = $this->barrenacion_model->getVoladuras();
                $data['view'] = 'admin/barrenacion/bitacora_de_voladura';
                $this->load->view('admin/layout', $data);
            }

            public function asignacion_de_explosivo(){
                $data['voladuras'] = $this->barrenacion_model->getVoladuras();
                $data['view'] = 'admin/barrenacion/voladuras';
                $this->load->view('admin/layout', $data);
            }

            public function voladuras_explosivo($id = 0){
                $data['total_barrenos'] = $this->barrenacion_model->sumBarrenosTotal($id);
                $data['voladura_explosivo_by_id'] = $this->barrenacion_model->voladuraExplosivoByID($id);
                $data['barreno_voladura_by_id'] = $this->barrenacion_model->barrenoVoladuraById($id);
                $data['view'] = 'admin/barrenacion/voladuras_explosivo';
                $this->load->view('admin/layout', $data);
            }

            public function add_explosivos_voladura($id = 0){

                $submit = $this->input->post('submit');
                if($submit){
                    //$this->form_validation->set_rules('fecha', 'fecha', 'trim|required');
                    $this->form_validation->set_rules('agente_explosivo', 'Agente explosivo', 'trim|required');
                    $this->form_validation->set_rules('alto_explosivo', 'Alto explosivo', 'trim|required');
                    $this->form_validation->set_rules('conductor_mecha', 'Mecha', 'trim|required');
                    $this->form_validation->set_rules('cordon_detonante', 'Detonante', 'trim|required');
                    $this->form_validation->set_rules('fulminante', 'Fulminante', 'trim|required');
                    $this->form_validation->set_rules('nonel_1', 'Nonel 1', 'trim|required');
                    $this->form_validation->set_rules('nonel_2', 'Nonel 2', 'trim|required');
                    $this->form_validation->set_rules('nonel_3', 'Nonel 3', 'trim|required');
                    $this->form_validation->set_rules('retardador', 'Retardador', 'trim|required');
                    $this->form_validation->set_rules('lead_line', 'Lead line', 'trim|required');

                        $data = array(
                            'id_voladura' => $this->input->post('id_voladura'),
                            //'fecha' => $this->input->post('fecha'),
                            'agente_explosivo' => $this->input->post('agente_explosivo'),
                            'alto_explosivo' => $this->input->post('alto_explosivo'),
                            'conductor_mecha' => $this->input->post('conductor_mecha'),
                            'cordon_detonante' => $this->input->post('cordon_detonante'),
                            'fulminante' => $this->input->post('fulminante'),
                            'nonel_1' => $this->input->post('nonel_1'),
                            'nonel_2' => $this->input->post('nonel_2'),
                            'nonel_3' => $this->input->post('nonel_3'),
                            'retardador' => $this->input->post('retardador'),
                            'lead_line' => $this->input->post('lead_line')
                        );

                        //Cargar explosivo
                        $check = 1;
                        $data2 = $this->barrenacion_model->voladuraExplosivoByID($id);
                        $id = $data2['id'];
                        $cargada = array( 'cargada' => $check );
                    
                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->addExplosivosVoladura($data);

                        if($result){
                            $this->db->where('id', $id);
                            $this->db->update('voladuras', $cargada);

                            $this->session->set_flashdata('msg', 'Registro Agregado');
                            redirect(base_url('admin/barrenacion/list_explosivos_voladura'));
                        }
                }
            }


            public function list_explosivos_voladura(){
                $data['get_explosivos_voladura'] = $this->barrenacion_model->getExplosivosVoladura();
                $data['view'] = 'admin/barrenacion/list_explosivos_voladura';
                $this->load->view('admin/layout', $data);
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
                    $this->form_validation->set_rules('id_zona', 'zona', 'trim|required');
                    $this->form_validation->set_rules('id_voladura', 'ID de voladura', 'trim|required');
                    
                    if($this->form_validation->run() == FALSE){
                        // Validacion con modelos y simultaneamente mantenme en la vista de add
                        $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                        $data['get_maquinas'] = $this->barrenacion_model->get_maquinas();
                        $data['get_ayudantes'] = $this->barrenacion_model->get_ayudantes();
                        $data['zona'] = $this->barrenacion_model->getzona();
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
                            'id_zona' => $this->input->post('id_zona'),
                            'id_voladura' => $this->input->post('id_voladura'),
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
                $data['get_ayudantes'] = $this->barrenacion_model->get_ayudantes();
                $data['zona'] = $this->barrenacion_model->getzona();
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
                        $data['ayudantes_barrenacion'] = $this->barrenacion_model->get_ayudantes_barrenacion();
                        $data['all_barrenacion'] = $this->barrenacion_model->get_all_barrenacion();
                        $data['zonas'] = $this->barrenacion_model->get_zonas();
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
                        'plantilla' => $this->input->post('plantilla'),
                        'metros_perf' => $this->input->post('metros_perf'),
                        'bar_perf' => $this->input->post('bar_perf'),
                        'bar_por_volar' => $this->input->post('bar_por_volar'),
                        'tons_tumbe' => $this->input->post('tons_tumbe'),
                        'id_zona' => $this->input->post('id_zona')
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
                    $data['ayudantes_barrenacion'] = $this->barrenacion_model->get_ayudantes_barrenacion();
                    $data['empleados_barrenacion'] = $this->barrenacion_model->get_empleados_barrenacion();
                    $data['get_maquinas'] = $this->barrenacion_model->get_maquinas();
                    //$data['get_ayudantes'] = $this->barrenacion_model->get_ayudantes();
                    $data['zonas'] = $this->barrenacion_model->get_zonas();
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
                    $this->form_validation->set_rules('nombre', 'razon', 'trim|required');
                    $this->form_validation->set_rules('descripcion', 'descripcion', 'trim');

                    if($this->form_validation->run() == FALSE){
                        $data['view'] = 'admin/barrenacion/razones_add';
                        $this->load->view('admin/layout', $data);

                    } else {
                        $data = array(
                            'nombre' => $this->input->post('nombre'),
                            'descripcion' => $this->input->post('descripcion')
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

            public function add_zonas(){
                if ($this->input->post('submit')) {
                    $this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
        
                    if ($this->form_validation->run() == FALSE) {
                        $data['view'] = 'admin/barrenacion/add_zonas.php';
                        $this->load->view('admin/layout', $data);
                    } else {
                        $data = array(
                            'nombre' => $this->input->post('nombre')
                        );
                        $data = $this->security->xss_clean($data);
                        $result = $this->barrenacion_model->add_zonas($data);
                        if ($result) {
                            $this->session->set_flashdata('msg', 'Registro Agregado!');
                            redirect(base_url('admin/barrenacion/bitacora_zonas'));
                        }
                    }
                } else {
                    $data['all_zonas'] =  $this->barrenacion_model->get_zonas();
                    $data['view'] = 'admin/barrenacion/add_zonas.php';
                    $this->load->view('admin/layout', $data);
                }
            }

            public function bitacora_zonas(){
                $data['all_zonas'] =  $this->barrenacion_model->get_zonas();
                $data['view'] = 'admin/barrenacion/zonas_list';
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

        }
