<?php

class Basculas_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function getData(){
        $db2 = $this->load->database('databaseTwo', TRUE);

        $db2->select('*');
        $query = $db2->get('trit_b1_kp');
        $result = $query->result_array();

        return $result;
    }


}





?>