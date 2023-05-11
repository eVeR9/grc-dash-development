<?php
	class Auth_model extends CI_Model{

		public function login2($data){
    		$this->db->select('u.*, d.nombre_del_departamento, p.nombre_del_puesto, rp.razon_social');
			$this->db->from('usuarios u');
			$query = $this->db->where('email',$data['email']);
			$query = $this->db->where('activo',1);
			$this->db->join('departamentos d', 'u.id_departamento = d.id', 'left');
			$this->db->join('puestos p', 'u.id_puesto = p.id', 'left');
			$this->db->join('registro_patronal rp', 'u.id_registro_patronal = rp.id', 'left');
			$query = $this->db->get();
			return $query->row_array();
			//$query = $this->db->get('pedidos');
			//return $result = $query->row_array();
		}



		public function login($data){
			//$query = $this->db->where('email',$data['email']);
			//$query = $this->db->where('activo',1);
			//$query = $this->db->get('usuarios');
    		$this->db->select('u.*, d.nombre_del_departamento, p.nombre_del_puesto, rp.razon_social, u.id_transportista as id_transp');
			$this->db->from('usuarios u');
			$query = $this->db->where('email',$data['email']);
			$query = $this->db->where('u.activo',1);
			$this->db->join('departamentos d', 'u.id_departamento = d.id', 'left');
			$this->db->join('puestos p', 'u.id_puesto = p.id', 'left');
			$this->db->join('registro_patronal rp', 'u.id_registro_patronal = rp.id', 'left');
			$query = $this->db->get();
			$result = $query->row_array();
			//return $query->row_array(); descomentar esto si queremos logearnos sin pass
	
			if ($query->num_rows() == 0){
				return false;
			}
			else{
				//Comparar el password con el que esta almacenado.
				//$result = $query->row_array(); descomentar esto si queremos logearnos sin pass
			    $validPassword = password_verify($data['password'], $result['password']);
			    if($validPassword){
			        return $result = $query->row_array();
			    }
				
			}
		}

		public function change_pwd($data, $id){
			$this->db->where('id', $id);
			$this->db->update('usuarios', $data);
			return true;
		}

	}

?>