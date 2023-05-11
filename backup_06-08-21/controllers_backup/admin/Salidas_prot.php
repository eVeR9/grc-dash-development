<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Salidas_prot extends MY_Controller
{ 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/salidas_prot_model', 'salidas_prot_model');
    }

    public function index()
    {
        echo 'Hola Mundo!';
    }

    //Add gastos_fijos_add_proto

   



   



}