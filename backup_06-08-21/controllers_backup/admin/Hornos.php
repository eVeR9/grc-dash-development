<?php

class Hornos extends MY_Controller
{

    public function __construct(){

        parent::__construct();
        $this->load->model('admin/hornos_model', 'hornos_model');
    }

    public function add_balance_tolvas()
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('material_id','Material','required');
            $this->form_validation->set_rules('cantidad_sacos','Cantidad Sacos','required');


            if ($this->form_validation->run() == FALSE) {

                $data['empleados'] = $this->hornos_model->getEmpleados();
                $data['view'] = 'admin/hornos/add_balance_tolvas';
                $this->load->view('admin/layout', $data);

                
            } else {
                $data = array(

                    'fecha' => $this->input->post('fecha'),
                    'material_id' => $this->input->post('material_id'),
                    'cantidad_sacos' => $this->input->post('cantidad_sacos'),

                );
                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->add_balance_tolvas($data);

                if($result){
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/hornos/add_balance_tolvas'));
                }
            }
        }else{

            $data['empleados'] = $this->hornos_model->getEmpleados();
            $data['view'] = 'admin/hornos/add_balance_tolvas';
            $this->load->view('admin/layout', $data);

        }
    }

    public function add_bitacora_diaria(){

        if($this->input->post('submit')){


            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('hora', 'Hora', 'required');
            $this->form_validation->set_rules('horno_id', 'Horno', 'required');
            $this->form_validation->set_rules('material_id', 'Material', 'required');
            $this->form_validation->set_rules('hornero_en_turno', 'Hornero', 'required');
            $this->form_validation->set_rules('skips_toneladas_piedra', 'trim');
            $this->form_validation->set_rules('h3_produccion_tons_piedra', 'trim');

            if($this->form_validation->run() == FALSE){

                
                $data['empleados'] = $this->hornos_model->getEmpleados();
                $data['horas'] = $this->hornos_model->getHoras();
                $data['hornos'] = $this->hornos_model->getHornos();
                $data['materiales'] = $this->hornos_model->getMateriales();
                $data['view'] = 'admin/hornos/add_bitacora_diaria';
                $this->load->view('admin/layout', $data);

            } else{

                if(!empty($this->input->post('skips_toneladas_piedra'))){

                    $dataInv = array(
    
                    'fecha' => $this->input->post('fecha'),
                    'horno_id' => $this->input->post('horno_id'),
                    'material_id' => $this->input->post('material_id'),
                    'toneladas' => ($this->input->post('skips_toneladas_piedra'))*-1,
                    'user_id' => $this->session->id_usuario
                );
    
                $this->hornos_model->addEntradas($dataInv);
            
            } else if(!empty($this->input->post('h3_produccion_tons_piedra'))){
    
                $dataInv = array(
                    'fecha' => $this->input->post('fecha'),
                    'horno_id' => $this->input->post('horno_id'),
                    'material_id' => $this->input->post('material_id'),
                    'toneladas' => $this->input->post('h3_produccion_tons_piedra')*-1,
                    'user_id' => $this->session->id_usuario
                );
    
                $this->hornos_model->addEntradas($dataInv);
    
                } else{

                    $this->session->set_flashdata('msg', 'Faltan campos por llenar!');
                    redirect('admin/hornos/add_bitacora_diaria');

                }
    
                $data = array(
    
                    'fecha' => $this->input->post('fecha'),
                    'hora' => $this->input->post('hora'),
                    'material_id' => $this->input->post('material_id'),
                    'horno_id' => $this->input->post('horno_id'),
                    'hornero_en_turno' => $this->input->post('hornero_en_turno'),
                    'h3_produccion_tons_piedra' => $this->input->post('h3_produccion_tons_piedra'),
                    'skips_toneladas_piedra' => $this->input->post('skips_toneladas_piedra'),
                    'combustible_inferior' => $this->input->post('combustible_inferior'),
                    'combustible_superior' => $this->input->post('combustible_superior'),
                    'aire_periferia' => $this->input->post('aire_periferia'),
                    'aire_inferior' => $this->input->post('aire_inferior'),
                    'aire_superior' => $this->input->post('aire_superior'),
                    'relaciones_inferior' => $this->input->post('relaciones_inferior'),
                    'relaciones_superior' => $this->input->post('relaciones_superior'),
                    'relaciones_global' => $this->input->post('relaciones_global'),
                    'temperatura_gases' => $this->input->post('temperatura_gases'),
                    'temperatura_descarga' => $this->input->post('temperatura_descarga'),
                    'temperatura_cal' => $this->input->post('temperatura_cal'),
                    'temperatura_ambiente' => $this->input->post('temperatura_ambiente'),
                    'temperatura_norte' => $this->input->post('temperatura_norte'),
                    'temperatura_sur' => $this->input->post('temperatura_sur'),
                    'temperatura_promedio' => $this->input->post('temperatura_promedio'),
                    'temperatura_diferencia' => $this->input->post('temperatura_diferencia'),
                    'temperatura_mesa' => $this->input->post('temperatura_mesa'),
                    'presion_mesa' => $this->input->post('presion_mesa'),
                    'presion_inferior' => $this->input->post('presion_inferior'),
                    'presion_superior' => $this->input->post('presion_superior'),
                    'skips_cantidad' => $this->input->post('skips_cantidad'),
                    'skips_cantidad_h2' => $this->input->post('skips_cantidad_h2'),
                    'skips_toneladas_piedra' => $this->input->post('skips_toneladas_piedra'),
                    'skips_toneladas_prod' => $this->input->post('skips_toneladas_prod'),
                    'h3_produccion_tons_piedra' => $this->input->post('h3_produccion_tons_piedra'),
                    'h3_produccion_tons_prod' => $this->input->post('h3_produccion_tons_prod'),
                    'h3_ciclos_por_dia' => $this->input->post('h3_ciclos_por_dia'),
                    'h3_ciclos_calor_especifico_ent' => $this->input->post('h3_ciclos_calor_especifico_ent'),
                    'h3_ciclos_calor_especifico_bajo' => $this->input->post('h3_ciclos_calor_especifico_bajo'),
                    'h3_ciclos_contador_de_gas' => $this->input->post('h3_ciclos_contador_de_gas'),
                    'h3_ciclos_flujo_total_de_gas' => $this->input->post('h3_ciclos_flujo_total_de_gas'),
                    'h3_combustible_quemador_1' => $this->input->post('h3_combustible_quemador_1'),
                    'h3_combustible_quemador_2' => $this->input->post('h3_combustible_quemador_2'),
                    'h3_combustible_quemador_3' => $this->input->post('h3_combustible_quemador_3'),
                    'h3_factor_exceso_aire_quemador_1' => $this->input->post('h3_factor_exceso_aire_quemador_1'),
                    'h3_factor_exceso_aire_quemador_2' => $this->input->post('h3_factor_exceso_aire_quemador_2'),
                    'h3_factor_exceso_aire_quemador_3' => $this->input->post('h3_factor_exceso_aire_quemador_3'),
                    'h3_aires_factor_aire_enfriamiento' => $this->input->post('h3_aires_factor_aire_enfriamiento'),
                    'h3_aires_factor_aire_enfriamiento_centro' => $this->input->post('h3_aires_factor_aire_enfriamiento_centro'),
                    'h3_aires_exceso_aire_factor_total' => $this->input->post('h3_aires_exceso_aire_factor_total'),
                    'h3_aires_factor_enfriamiento_exceso' => $this->input->post('h3_aires_factor_enfriamiento_exceso'),
                    'h3_gas_temperatura_horno_arriba' => $this->input->post('h3_gas_temperatura_horno_arriba'),
                    'h3_gas_presion_horno_arriba' => $this->input->post('h3_gas_presion_horno_arriba'),
                    'h3_agua_enf_temp_agua_enf' => $this->input->post('h3_agua_enf_temp_agua_enf'),
                    'h3_agua_enf_num_enfriadores' => $this->input->post('h3_agua_enf_num_enfriadores'),
                    'h3_temp_cal_1' => $this->input->post('h3_temp_cal_1'),
                    'h3_temp_cal_2' => $this->input->post('h3_temp_cal_2'),
                    'h3_temp_cal_3' => $this->input->post('h3_temp_cal_3'),
                    'h3_temp_horno_1' => $this->input->post('h3_temp_horno_1'),
                    'h3_temp_horno_2' => $this->input->post('h3_temp_horno_2'),
                    'h3_temp_horno_3' => $this->input->post('h3_temp_horno_3'),
                    'h3_temp_horno_4' => $this->input->post('h3_temp_horno_4'),
                    'h3_temp_horno_5' => $this->input->post('h3_temp_horno_5'),
                    'h3_temp_horno_6' => $this->input->post('h3_temp_horno_6'),
                    'h3_aire_comprimido' => $this->input->post('h3_aire_comprimido'),
                    
                );
                
                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->addBitacoraDiaria($data);

                if($result){

                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect('admin/hornos/inventario');

                }

            }
            
        } else{

            $data['empleados'] = $this->hornos_model->getEmpleados();
            $data['horas'] = $this->hornos_model->getHoras();
            $data['hornos'] = $this->hornos_model->getHornos();
            $data['materiales'] = $this->hornos_model->getMateriales();
            $data['view'] = 'admin/hornos/add_bitacora_diaria';
            $this->load->view('admin/layout', $data);
        }

    }

    public function add_bitacora_diaria2(){

        $data['view'] = 'admin/hornos/add_bitacora_diaria_edgar';
        $this->load->view('admin/layout', $data);

    }

    public function add_equipos_paros(){

        if($this->input->post('guardar')){

            $this->form_validation->set_rules('equipo', 'Equipo', 'trim|required');

            if($this->form_validation->run() == FALSE){

                validation_errors();
                $data['view'] = 'admin/hornos/add_equipos_paros';
                $this->load->view('admin/layout', $data);

            } else {

                $data = array(

                    'equipo' => $this->input->post('equipo'),
                    'user_id' => $this->session->id_usuario
                );

            }

            $data = $this->security->xss_clean($data);
            $result = $this->hornos_model->addEquiposParos($data);

            if($result){

                $this->session->set_flashdata('msg', 'Registro Agregado!');
                redirect('admin/hornos/equipos_list');
            }

        } else {

            $data['view'] = 'admin/hornos/add_equipos_paros';
            $this->load->view('admin/layout', $data);
        }
    }

    public function add_inventario_tolvas()
    {

        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('hora', 'Hora', 'required');
            //$this->form_validation->set_rules('horno_id', 'Horno', 'required');
            $this->form_validation->set_rules('material_id', 'Material', 'required');
            $this->form_validation->set_rules('hornero_en_turno', 'Hornero', 'required');
            $this->form_validation->set_rules('tolva_uno', 'trim');
            $this->form_validation->set_rules('tolva_dos', 'trim');
            $this->form_validation->set_rules('tolva_tres', 'trim');
            $this->form_validation->set_rules('tolva_uno_a', 'trim');
            $this->form_validation->set_rules('tolva_uno_b', 'trim');
            $this->form_validation->set_rules('tolva_uno_c', 'trim');
            $this->form_validation->set_rules('tolva_dos_a', 'trim');
            $this->form_validation->set_rules('tolva_dos_b', 'trim');
            $this->form_validation->set_rules('tolva_dos_c', 'trim');
            $this->form_validation->set_rules('tolva_tres_a', 'trim');
            $this->form_validation->set_rules('tolva_tres_b', 'trim');
            $this->form_validation->set_rules('tolva_tres_c', 'trim');

            if ($this->form_validation->run() == FALSE) {

                $data['empleados'] = $this->hornos_model->getEmpleados();
                $data['horas'] = $this->hornos_model->getHoras();
                $data['hornos'] = $this->hornos_model->getHornos();
                $data['materiales'] = $this->hornos_model->getMateriales();
                $data['view'] = 'admin/hornos/add_inventario_tolvas';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'fecha' => $this->input->post('fecha'),
                    'hora' => $this->input->post('hora'),
                    'material_id' => $this->input->post('material_id'),
                    'horno_id' => $this->input->post('horno_id'),
                    'hornero_en_turno' => $this->input->post('hornero_en_turno'),
                    'tolva_uno' => $this->input->post('tolva_uno'),
                    'tolva_dos' => $this->input->post('tolva_dos'),
                    'tolva_tres' => $this->input->post('tolva_tres'),
                    'tolva_uno_a' => $this->input->post('tolva_uno_a'),
                    'tolva_uno_b' => $this->input->post('tolva_uno_b'),
                    'tolva_uno_c' => $this->input->post('tolva_uno_c'),
                    'tolva_dos_a' => $this->input->post('tolva_dos_a'),
                    'tolva_dos_b' => $this->input->post('tolva_dos_b'),
                    'tolva_dos_c' => $this->input->post('tolva_dos_c'),
                    'tolva_tres_a' => $this->input->post('tolva_tres_a'),
                    'tolva_tres_b' => $this->input->post('tolva_tres_b'),
                    'tolva_tres_c' => $this->input->post('tolva_tres_c'),
                    'user_id' => $this->session->id_usuario
                );
                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->add_inventario_tolvas($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro agregado!');
                    redirect(base_url('admin/hornos/add_inventario_tolvas'));
                }
            }
        } else {


            $data['empleados'] = $this->hornos_model->getEmpleados();
            $data['horas'] = $this->hornos_model->getHoras();
            $data['hornos'] = $this->hornos_model->getHornos();
            $data['materiales'] = $this->hornos_model->getMateriales();
            $data['view'] = 'admin/hornos/add_inventario_tolvas';
            $this->load->view('admin/layout', $data);
        }
    }

    public function add_motivos_paros(){

        if($this->input->post('guardar')){

            $this->form_validation->set_rules('motivo', 'Motivo', 'trim|required');

            if($this->form_validation->run() == FALSE){

                $data['view'] = 'admin/hornos/add_motivos_paros';
                $this->load->view('admin/layout', $data);

            } else {

                $data = array(

                    'motivo' => $this->input->post('motivo'),
                    'user_id' => $this->session->id_usuario
                );

                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->addMotivosParos($data);

                if($result){

                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect('admin/hornos/motivos_list');
                }
            }

        } else {

            $data['view'] = 'admin/hornos/add_motivos_paros';
            $this->load->view('admin/layout', $data);
        }
    }

    public function add_paros(){

        if($this->input->post('submit')){

            $this->form_validation->set_rules('horno_id', 'Horno', 'required');
            $this->form_validation->set_rules('motivo_paro_id', 'Motivo', 'required');
            $this->form_validation->set_rules('equipo_paro_id', 'Equipo', 'required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');

            $this->form_validation->set_rules('tiempo', 'Tiempo', 'trim|required');
            $this->form_validation->set_rules('hora_inicio', 'Hora Inicio', 'trim|required');
            $this->form_validation->set_rules('hora_final', 'Hora Final', 'trim|required');
            $this->form_validation->set_rules('comentarios', 'Comentarios', 'trim');
            $this->form_validation->set_rules('atribuido_a', 'Atribuido', 'trim');

            if($this->form_validation->run() == FALSE){

                $data['equipos'] = $this->hornos_model->getEquipos();
                $data['motivos'] = $this->hornos_model->getMotivos();
                $data['view'] = 'admin/hornos/add_paros';
                $this->load->view('admin/layout', $data);

            } else{

                $data = array(
                    'horno_id' => $this->input->post('horno_id'),
                    'motivo_paro_id' => $this->input->post('motivo_paro_id'),
                    'equipo_paro_id' => $this->input->post('equipo_paro_id'),
                    'fecha' => $this->input->post('fecha'),
                    'tiempo' => $this->input->post('tiempo'),
                    'hora_inicio' => $this->input->post('hora_inicio'),
                    'hora_final' => $this->input->post('hora_final'),
                    'comentarios' => $this->input->post('comentarios'),
                    'atribuido_a' => $this->input->post('atribuido_a'),
                    'user_id' => $this->session->id_usuario,
                );

                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->addParos($data);
                redirect('admin/hornos/paros_list');

                if($result){

                    $this->session->set_flashdata('msg', 'Registro Agregado');
                    redirect('admin/hornos/');
                }   
            }

        } else {

            $data['equipos'] = $this->hornos_model->getEquipos();
            $data['motivos'] = $this->hornos_model->getMotivos();
            $data['view'] = 'admin/hornos/add_paros';
            $this->load->view('admin/layout', $data);

        }
    }

    public function add_programacion_hornos(){

        if($this->input->post('guardar')){

            $this->form_validation->set_rules('año', 'Año', 'trim|required');
            $this->form_validation->set_rules('mes', 'Mes', 'required');
            $this->form_validation->set_rules('dia', 'Dia', 'trim|required');
            $this->form_validation->set_rules('horno_id', 'Horno', 'required');
            $this->form_validation->set_rules('tons_cal_diaria', 'Toneladas', 'trim|required');
            $this->form_validation->set_rules('tons_cal_mensual', 'Toneladas Mensuales', 'required');

            if($this->form_validation->run() == FALSE){

                //echo validation_errors();
                $data['meses'] = $this->hornos_model->getMes();
                $data['view'] = 'admin/hornos/add_programacion_hornos';
                $this->load->view('admin/layout', $data);

            } else {

                $data = array(

                    'año' => $this->input->post('año'),
                    'mes' => $this->input->post('mes'),
                    'dia' => $this->input->post('dia'),
                    'horno_id' => $this->input->post('horno_id'),
                    'tons_cal_diaria' => $this->input->post('tons_cal_diaria'),
                    'tons_cal_mensual' => $this->input->post('tons_cal_mensual'),
                    'user_id' => $this->session->id_usuario

                );

                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->addProgramacion($data);

                if($result){

                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect('admin/hornos/programacion_list');
                }
            }


        } else{

            $data['meses'] = $this->hornos_model->getMes();
            $data['view'] = 'admin/hornos/add_programacion_hornos';
            $this->load->view('admin/layout', $data);
        }

    }

    public function add_sacos()
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('material_id','Material','required');
            $this->form_validation->set_rules('cantidad_sacos','Cantidad Sacos','required');


            if ($this->form_validation->run() == FALSE) {

                $data['materiales'] = $this->hornos_model->getMateriales();
                $data['view'] = 'admin/hornos/add_sacos';
                $this->load->view('admin/layout', $data);

                
            } else {
                $data = array(

                    'fecha' => $this->input->post('fecha'),
                    'material_id' => $this->input->post('material_id'),
                    'cantidad_sacos' => $this->input->post('cantidad_sacos'),

                );
                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->add_sacos($data);

                if($result){
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/hornos/add_sacos'));
                }
            }
        }else{

            $data['materiales'] = $this->hornos_model->getMateriales();
            $data['view'] = 'admin/hornos/add_sacos';
            $this->load->view('admin/layout', $data);

        }
    }

    public function ajuste_inventario(){

        if ($this->input->post('submit')) {

            //$this->form_validation->set_rules('horno_id', 'Horno', 'required');
            $this->form_validation->set_rules('material_id', 'Material', 'required');
            $this->form_validation->set_rules('toneladas', 'Toneladas', 'trim|required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');


            if($this->form_validation->run() == FALSE){

                    echo validation_errors();
                    $data['materiales'] = $this->hornos_model->getMateriales();
                    //$data['hornos'] = $this->hornos_model->getHornos();
                    $data['view'] = 'admin/hornos/ajuste';
                    $this->load->view('admin/layout', $data);

            } else{

                $data = array(

                    //'horno_id' => $this->input->post('horno_id'),
                    'material_id' => $this->input->post('material_id'),
                    'toneladas' => $this->input->post('toneladas'),
                    'fecha' => $this->input->post('fecha'),
                    'user_id' => $this->session->id_usuario
                );


                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->addEntradas($data);

                if($result){

                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect('admin/hornos/inventario');
                }
            }

        } 


        $data['materiales'] = $this->hornos_model->getMateriales();
        //$data['hornos'] = $this->hornos_model->getHornos();
        $data['view'] = 'admin/hornos/ajuste';
        $this->load->view('admin/layout', $data);
    }

    public function bitacora_diaria_h1(){

        $data['horno_uno'] = $this->hornos_model->getHorno1();
        $data['view'] = 'admin/hornos/bitacora_diaria_h1';
        $this->load->view('admin/layout', $data);
    }

    public function bitacora_diaria_h2(){

        $data['horno_dos'] = $this->hornos_model->getHorno2();
        $data['view'] = 'admin/hornos/bitacora_diaria_h2';
        $this->load->view('admin/layout', $data);
    }

    public function bitacora_diaria_h3(){

        $data['horno_tres'] = $this->hornos_model->getHorno3();
        $data['view'] = 'admin/hornos/bitacora_diaria_h3';
        $this->load->view('admin/layout', $data);
    }

    public function entradas_inventario()
    {

        if ($this->input->post('submit')) {

            //$this->form_validation->set_rules('horno_id', 'Horno', 'trim|required');
            $this->form_validation->set_rules('material_id', 'Material', 'trim|required');
            $this->form_validation->set_rules('toneladas', 'Toneladas', 'trim|required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $data['materiales'] = $this->hornos_model->getMateriales();
                //$data['hornos'] = $this->hornos_model->getHornos();
                $data['view'] = 'admin/hornos/entradas';
                $this->load->view('admin/layout', $data);
            } else {

                $data = array(

                    //'horno_id' => $this->input->post('horno_id'),
                    'material_id' => $this->input->post('material_id'),
                    'toneladas' => $this->input->post('toneladas'),
                    'fecha' => $this->input->post('fecha'),
                    //'created_at' => ,
                    'user_id' => $this->session->id_usuario
                );

                $data = $this->security->xss_clean($data);
                $result = $this->hornos_model->addEntradas($data);

                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect('admin/hornos/inventario');
                }
            }
        } else {

            $data['materiales'] = $this->hornos_model->getMateriales();
            //$data['hornos'] = $this->hornos_model->getHornos();
            $data['view'] = 'admin/hornos/entradas';
            $this->load->view('admin/layout', $data);
        }
    }

    public function equipos_list(){

        $data['view'] = 'admin/hornos/list_equipos_paros';
        $this->load->view('admin/layout', $data);
    }

    public function getValuesForBalanceTolvasController($fecha=null){

        $data = $this->hornos_model->getValuesForBalanceTolvas($fecha);
        echo json_encode($data);

    }

    public function inventario(){

        $data['inventario'] = $this->hornos_model->getInventario();
        $data['view'] = 'admin/hornos/entradas_ajuste_list';
        $this->load->view('admin/layout', $data);
        
    }

    public function motivos_list(){

        $data['view'] = 'admin/hornos/list_motivos_paros';
        $this->load->view('admin/layout', $data);
    }

    public function paros_list(){

        $data['view'] = 'admin/hornos/list_paros';
        $this->load->view('admin/layout', $data);
    }

    public function programacion_list(){

        $data['view'] = 'admin/hornos/list_programacion';
        $this->load->view('admin/layout', $data);
    }

}
