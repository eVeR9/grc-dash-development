<?php
defined('BASEPATH') OR exit('No direct scripts access allowed');

class Basculas extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/basculas_model', 'basculas');
    }

    function index(){
        $data['get_data'] = $this->basculas->getData();
        $data['view'] = 'admin/basculas/list';
        $this->load->view('admin/layout', $data);
    }
}





?>