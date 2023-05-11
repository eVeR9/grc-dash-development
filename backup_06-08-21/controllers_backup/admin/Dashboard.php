<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/remision_model', 'remisionModelo');

		}

		public function index(){
			$puesto = strtoupper($this->session->userdata('puesto'));
			$isBascula = $puesto == "BASCULA";
			$isTI = $puesto == "DESARROLLADOR";
			$isVigilancia = $puesto == "GUARDIA";
/*
			if($isBascula || $isVigilancia){
				$data['remisiones_espera'] = $this->remisionModelo->get_remisiones_espera();
				//$data['remisiones_espera_id'] = $this->remisionModelo->get_remisiones_espera_by_id($id);
				//var_dump($data);
				$data['view'] = 'admin/remisiones/remisiones_espera';
				$this->load->view('admin/layout', $data);
			} else {
				//$data['remisiones_espera_id'] = $this->dashboard_model->get_remisiones_espera_by_id($id);
				//var_dump($data);*/
				$data['view'] = 'admin/dashboard/index';
				$this->load->view('admin/layout', $data);
			//}
		}

		public function index_default(){
			$data['view'] = 'admin/dashboard/index2';
			$this->load->view('admin/layout', $data);
		}

		public function reportes_ventas(){
			$data['view'] = 'admin/dashboard/reportes_ventas';
			$this->load->view('admin/layout', $data);
		}

		public function reportes_gral() {
			$data['view'] = 'admin/dashboard/reportes_gral';
			$this->load->view('admin/layout', $data);
		}
	}
?>