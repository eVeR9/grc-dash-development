<?php

defined('BASEPATH') OR exit('No direct scripts allowed');

class Nomina_mina extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/nomina_mina_model', 'nomina_mina_model');
    }

    public function nomina_diaria_mina()
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('fecha', 'fecha', 'trim');
            $this->form_validation->set_rules('total', 'total', 'trim');
            $this->form_validation->set_rules('total_dos', 'total_dos', 'trim');
            $this->form_validation->set_rules('arrendamiento', 'arrendamiento', 'trim');
            $this->form_validation->set_rules('cfe', 'cfe', 'trim');
            $this->form_validation->set_rules('total_prod', 'total_prod', 'trim');

            if ($this->form_validation->run() == FALSE) {

                $data['view'] = 'admin/nomina_mina/nomina_diaria_mina';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    
                    'fecha' => $this->input->post('fecha'),
                    'total' => $this->input->post('total_hidden'),
                    'total_dos' => $this->input->post('total_dos_hidden'),
                    'arrendamiento' => $this->input->post('arrendamiento'),
					'cfe' => $this->input->post('cfe'),
					'total_prod' => $this->input->post('total_prod')
				);
				
                $data = $this->security->xss_clean($data);
                $result = $this->nomina_mina_model->add_nomina_diaria($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/nomina_mina/nomina_diaria_mina_list'));
                }
            }
        } else {
			//$data['secondDb'] = $this->empleado_model->get_total_basculas();
            $data['view'] = 'admin/nomina_mina/nomina_diaria_mina';
            $this->load->view('admin/layout', $data);
        }
    }
    
    public function nomina_diaria_mina_list(){
        $data['get_total_mina'] = $this->nomina_mina_model->get_total_mina();
        $data['view'] = 'admin/nomina_mina/nomina_diaria_mina_list';
        $this->load->view('admin/layout', $data);
    }
	
	public function getTotalNominaDiaria($id){

		$format = 'Y-m-d';
		$gasto_id = $id;

		$date = DateTime::createFromFormat($format, $gasto_id);

		$year = $date->format('Y');
        $month = $date->format('m');

		$data = $this->nomina_mina_model->get_total_salario_neto($year, $month);
		echo json_encode($data);
	}

	public function get_total_produccion($fecha){

		$data = $this->nomina_mina_model->get_total_basculas($fecha);
		echo json_encode($data);
    }
    
    public function gastos_fijos_add()
    {
        if ($this->input->post('submit')) {
            
            $this->form_validation->set_rules('mes', 'mes', 'trim|required');
            $this->form_validation->set_rules('año', 'año', 'trim|required');
            $this->form_validation->set_rules('dia_mes', 'dia_mes', 'trim|required');
            $this->form_validation->set_rules('monto_arrendamiento', 'monto_arrendamiento', 'trim|required');
            $this->form_validation->set_rules('monto_arrendamiento_diario', 'monto_arrendamiento_diario', 'trim|required');
            $this->form_validation->set_rules('monto_cfe', 'monto_cfe', 'trim|required');
            $this->form_validation->set_rules('monto_cfe_diario', 'monto_cfe_diario', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                

                $data['view'] = 'admin/nomina_mina/gastos_fijos_add.php';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    
                    'mes' => $this->input->post('mes'),
                    'año' => $this->input->post('año'),
                    'dia_mes' => $this->input->post('dia_mes'),
                    'monto_arrendamiento' => $this->input->post('monto_arrendamiento'),
                    'monto_arrendamiento_diario' => $this->input->post('monto_arrendamiento_diario'),
                    'monto_cfe' => $this->input->post('monto_cfe'),
                    'monto_cfe_diario' => $this->input->post('monto_cfe_diario')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->nomina_mina_model->add_gastos_fijos($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/nomina_mina/gastos_fijos_list'));
                }
            }
        } else {
            
            $data['getmes'] =  $this->nomina_mina_model->getmes();
            $data['gastos_fijos_list'] =  $this->nomina_mina_model->get_gastos_fijos();
            $data['view'] = 'admin/nomina_mina/gastos_fijos_add.php';
            $this->load->view('admin/layout', $data);
        }
    }

    public function gastos_fijos_edit($id = 0){

        if($this->input->post('submit')){

            //fields

            if($this->form_validation->run() === FALSE){
                echo 'Hola error';
                $data['meses'] = $this->nomina_mina_model->getmes();
                $data['gastosFijosById'] = $this->nomina_mina_model->get_gastos_fijos_by_id($id);
                $data['view'] = 'admin/nomina_mina/gastos_fijos_edit';
                $this->load->view('admin/layout', $data);

            } 

                $data = array(
                    'monto_arrendamiento_diario' => $this->input->post('monto_arrendamiento_diario'),
                    'monto_cfe_diario' => $this->input->post('monto_cfe_diario')
                );

                $data = $this->security->xss_clean($data);
                $result = $this->nomina_mina_model->updateGastosFijos($data, $id);

                if($result){
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/nomina_mina/gastos_fijos_list'));
                }
            

        } else{

            $data['meses'] = $this->nomina_mina_model->getmes();
            $data['gastosFijosById'] = $this->nomina_mina_model->get_gastos_fijos_by_id($id);
            $data['view'] = 'admin/nomina_mina/gastos_fijos_edit';
            $this->load->view('admin/layout', $data);
        }
    }

    public function gastos_fijos_list(){
        
        $data['gastos_fijos_list'] =  $this->nomina_mina_model->get_gastos_fijos();
        $data['view'] = 'admin/nomina_mina/gastos_fijos_list';
        $this->load->view('admin/layout', $data);
    }

    public function mano_de_obra_add()
    {
        if ($this->input->post('submit')) {
            
            $this->form_validation->set_rules('mes', 'mes', 'trim|required');
            $this->form_validation->set_rules('año', 'año', 'trim|required');
            $this->form_validation->set_rules('dia_mes', 'dia_mes', 'trim|required');
            $this->form_validation->set_rules('nomina_directa', 'nomina_directa', 'trim|required');
            $this->form_validation->set_rules('nomina_directa_diaria', 'nomina_directa_diaria', 'trim|required');
            $this->form_validation->set_rules('nomina_indirecta', 'nomina_indirecta', 'trim|required');
            $this->form_validation->set_rules('nomina_indirecta_diaria', 'nomina_indirecta_diaria', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                

                $data['view'] = 'admin/nomina_mina/mano_de_obra_add.php';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    
                    'mes' => $this->input->post('mes'),
                    'año' => $this->input->post('año'),
                    'dia_mes' => $this->input->post('dia_mes'),
                    'nomina_directa' => $this->input->post('nomina_directa'),
                    'nomina_directa_diaria' => $this->input->post('nomina_directa_diaria'),
                    'nomina_indirecta' => $this->input->post('nomina_indirecta'),
                    'nomina_indirecta_diaria' => $this->input->post('nomina_indirecta_diaria')
                );
                $data = $this->security->xss_clean($data);
                $result = $this->nomina_mina_model->add_mano_de_obra($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Registro Agregado!');
                    redirect(base_url('admin/nomina_mina/mano_de_obra_list'));
                }
            }
        } else {
            
            $data['getmes'] =  $this->nomina_mina_model->getmes();
            $data['gastos_fijos_list'] =  $this->nomina_mina_model->get_mano_de_obra();
            $data['view'] = 'admin/nomina_mina/mano_de_obra_add.php';
            $this->load->view('admin/layout', $data);
        }
    }

    public function mano_de_obra_edit($id = 0){

        if($this->input->post('submit')){

            if($this->form_validation->run() == FALSE){

                $data['meses'] =  $this->nomina_mina_model->getmes();
                $data['manoDeObraById'] = $this->nomina_mina_model->get_mano_de_obra_by_id($id);
                $data['view'] = 'admin/nomina_mina/mano_de_obra_edit';
                $this->load->view('admin/layout', $data);

            }
                $data = array(
                    'nomina_directa_diaria' => $this->input->post('nomina_directa_diaria'),
                    'nomina_indirecta_diaria' => $this->input->post('nomina_indirecta_diaria')
                );

                $data = $this->security->xss_clean($data);
                $result = $this->nomina_mina_model->updateManoDeObra($data, $id);

                if($result){
                    $this->session->set_flashdata('msg', 'Registro Actualizado!');
                    redirect(base_url('admin/nomina_mina/mano_de_obra_list'));
                }

        } else{

            $data['meses'] =  $this->nomina_mina_model->getmes();
            $data['manoDeObraById'] = $this->nomina_mina_model->get_mano_de_obra_by_id($id);
            $data['view'] = 'admin/nomina_mina/mano_de_obra_edit';
            $this->load->view('admin/layout', $data);
        }
    }

    public function mano_de_obra_list()
    {
        $data['gastos_comercial_list'] =  $this->nomina_mina_model->get_mano_de_obra();
        $data['view'] = 'admin/nomina_mina/mano_de_obra_list';
        $this->load->view('admin/layout', $data);
    }
}



?>