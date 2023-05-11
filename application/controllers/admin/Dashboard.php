<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();

		}

		public function index(){
			$data['view'] = 'admin/dashboard/index';
			$this->load->view('admin/layout', $data);
		}

		public function index2(){
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