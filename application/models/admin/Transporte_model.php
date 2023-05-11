<?php 

    class Transporte_model extends CI_Model{

        private $citas = 'transporte_citas';
        private $operadores = 'transporte_operadores';
        private $transportistas = 'transporte_transportistas';
        private $unidades = 'transporte_unidades';
        private $estatus = 'transporte_citas_estatus';

        public function getNextFolio(){

            $this->db->select_max('id', 'max');
            $this->db->from($this->citas);
            
            $query = $this->db->get();

            if($query->num_rows() < 1){

                return 1;
                
            } 

            $row = $query->row();
            $max = $row->max;
            return $max + 1;
            
        }

        function insert_citas($data){

            $this->db->insert($this->citas, $data);
            return true;

        }

        function list_citas($id){

            $this->db->select('c.*, o.nombre as id_operador, u.modelo as id_unidad, e.estatus as id_estatus');
            $this->db->from($this->citas . ' c');
            $this->db->join($this->operadores . ' o', 'c.id_operador = o.id');
            $this->db->join($this->unidades . ' u', 'c.id_unidad = u.id');
            $this->db->join($this->estatus . ' e', 'c.id_estatus = e.id', 'left');

            if($id != ''){

                $this->db->where('c.id_transportista', $id);
                $query = $this->db->get();
                $result = $query->result_array();

            } else {

                $query = $this->db->get();
                $result = $query->result_array();
            }

            return $result;
        }

        function list_citas_monitoreo($id){

            $this->db->select('c.*, o.nombre as id_operador, u.modelo as id_unidad, e.estatus as id_estatus');
            $this->db->from($this->citas . ' c');
            $this->db->join($this->operadores . ' o', 'c.id_operador = o.id');
            $this->db->join($this->unidades . ' u', 'c.id_unidad = u.id');
            $this->db->join($this->estatus . ' e', 'c.id_estatus = e.id', 'left');

            if($id != ''){

                $this->db->where('c.id_estatus', 3);
                $this->db->where('c.id_transportista', $id);
                $query = $this->db->get();
                $result = $query->result_array();

            } else {

                $this->db->where('c.id_estatus', 3);
                $query = $this->db->get();
                $result = $query->result_array();
            }

            return $result;
        }

        function insert_operadores($data){

            $this->db->insert($this->operadores, $data);
            return true;

        }

        function list_operadores($id){

            $this->db->select('*');
            $this->db->from($this->operadores);

            if($id != ''){

                $this->db->where('id_transportista', $id);
                $query = $this->db->get();
                $result = $query->result_array();

            } else{

                $query = $this->db->get();
                $result = $query->result_array();
            }

            return $result;

        }

        function generateEntrada($estatus, $id){

            $this->db->where('id', $id);
            $this->db->update($this->citas, $estatus);
            return true;

        }

        
        function get_transportistas(){

            $this->db->select('id, codigo_transportista, razon_social');
            $this->db->from($this->transportistas);
            $query = $this->db->get();
            $result = $query->result_array();
            return $result;
        }
        

        function get_transportistas_by_id($id){

            $this->db->select('*');
            $this->db->from($this->transportistas);
            $this->db->where('id', $id);

            $query = $this->db->get();
            $result = $query->row_array();
            return $result;
        }

        function insert_transportistas($data){

            $this->db->insert($this->transportistas, $data);
            return true;
        }

        function list_transportistas(){

            $this->db->select('*');
            $this->db->from($this->transportistas);

            $query = $this->db->get();
            $result = $query->result_array();

            return $result;

        }

        function insert_unidades($data){

            $this->db->insert($this->unidades, $data);
            return true;

        }

        function list_unidades($id){

            $this->db->select('*');
            $this->db->from($this->unidades);

            if($id != ''){

                $this->db->where('id_transportista', $id);
                $query = $this->db->get();
                $result = $query->result_array();

            } else {

                $query = $this->db->get();
                $result = $query->result_array();
            }

            return $result;

        }





    }