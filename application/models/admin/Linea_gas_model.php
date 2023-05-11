<?php
class Linea_gas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Obtener datos de la tabla "Gas_consumo" para mostrar en bitacora
    public function get_all_gas_consumo()
    {
        $this->db->select('gc.*');
        //$this->db->select('gc.*, gpm.*, gc.id, gpm.id');
        //$this->db->select('gc.id, gc.fecha, gc.metros_cubicos, gc.masa, gc.megacalorias, gc.densidad, gc.gigajoules, gc.precio as id_precio_gas, gc.costo, gc.mes, gc.año, gc.precio');
        $this->db->from('gas_consumo as gc');
        // $this->db->join('gas_precio_mensual as gpm', 'gc.id_precio_gas = gpm.precio');
        $this->db->order_by('gc.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //Insertar datos a Tabla "Gas_consumo"
    public function gas_consumo_add($data)
    {
        $this->db->insert('gas_consumo', $data);
        return true;
    }

    //Traer los datos de la Tabla "Gas_consumo" por ID
    public function get_gas_consumo_by_id($id)
    {
        $query = $this->db->get_where('gas_consumo', array('id' => $id));
        return $result = $query->row_array();
    }

    //Actualizar los cambios de la Tabla "Gas_consumo"
    public function gas_consumo_edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('gas_consumo', $data);
        return true;
    }

    public function mes_gas_consumo()
    {
        $this->db->select('MONTH(fecha)');
        $this->db->from('gas_consumo');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function año_gas_consumo()
    {
        $this->db->SELECT('YEAR(fecha)');
        $this->db->from('gas_consumo');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //Gas_precio_mensual

    //Obtener datos de la tabla "Gas_precio_mensual" para mostrar en bitacora
    public function get_all_gas_precio_mensual()
    {
        $this->db->select('gpm.*, gnm.*, gpm.id');
        $this->db->from('gas_precio_mensual as gpm');
        $this->db->join('gas_nombre_mes as gnm','gnm.id = gpm.mes');
        $this->db->order_by('gpm.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //Insertar datos a Tabla "Gas_precio_mensual"
    public function gas_precio_mensual_add($data)
    {
        $this->db->insert('gas_precio_mensual', $data);
        return true;
    }

    //Traer los datos de la Tabla "Gas_precio_mensual" por ID
    public function get_gas_precio_mensual_by_id($id)
    {
        $query = $this->db->get_where('gas_precio_mensual', array('id' => $id));
        return $result = $query->row_array();
    }

    //Actualizar los cambios de la Tabla "Gas_precio_mensual"
    public function gas_precio_mensual_edit($data, $id)
    {
        $this->db->where('id', $id);

        $this->db->update('gas_precio_mensual gpm', $data);

        return true;
    }

    public function gas_precio_mensual_update_gas_consumo($mes, $año, $precio)
    {
        /*$this->db->where('mes', $mes);
        $this->db->where('año', $año);*/

        /*$this->db->where(month(fecha), $mes);
        $this->db->where(year(año), $año);

        $this->db->where('fecha', 'month($mes)');
        $this->db->where('fecha', 'year($año)');*/

        //Actualizar el precio del gas mensual
        $this->db->query("UPDATE gas_consumo SET precio = $precio   WHERE MONTH(fecha) = $mes AND YEAR(fecha) =$año");
        //echo $this->db->last_query(); 
        //exit();
        
        // Ya que acatualizamos el precio del gas actualizamos el costo (costo = gigajoules * precio)
        $this->db->query("UPDATE gas_consumo SET costo=(gigajoules*precio) WHERE MONTH(fecha)=$mes AND YEAR(fecha)=$año");
        //echo $this->db->last_query();
        //exit();
        return true;
    }

    /*public function gas_precio_mensual_edit($data, $id){
        $query = $this->db->query("
        update gas_precio_mensual gpm = '" . $data . "', gas_consumo gc = '" . $data . "' 
        SET gc.id_precio_gas = gpm.precio 
        WHERE gpm.id = '".$id."' = gc.id_precio_gas = '".$id."'");
        return $result = $query->result_array();
        
    }*/

    /*public function edit_todo($data, $id){
        $this->db->where('id',$id);
        $this->db->update('gas_consumo gc', $data);
        return true;
    }*/

    /*public function gas_precio_mensual_edit($data, $id)
{
    // Seteas los datos a actualizar del usuario
    $this->db->set('gpm.mes', $data['mes']);
    $this->db->set('gpm.año', $data['año']);
    $this->db->set('gpm.precio', $data['precio']);
    // Seteas los datos a actualizar de la empresa
    $this->db->set('gc.id_precio_gas', $data['id_precio_gas']);
    
    // Condicionas
    $this->db->where('gpm.id', $id);
    // Condicionas que el id de empresa sea igual en usuario y empresa
    $this->db->where('gpm.id = gc.id_precio_mensual');
    // Actualizas
    $this->db->update('gas_precio_mensual as gpm, gas_consumo as gc');
    return true;
}*/






    public function get_gas_precio_mensual() //Join entre las dos tablas
    {
        $this->db->select('gc.*, gpm.*, gc.id');
        $this->db->from('gas_consumo as gc');
        $this->db->join('gas_precio_mensual as gpm', 'gpm.id = gc.id_gas_precio_mensual');
        $this->db->order_by('gc.id', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function get_precio_gas($anio, $mes)
    {
        $this->db->select('precio');
        $this->db->where('año', $anio);
        $this->db->where('mes', $mes);
        $this->db->from('gas_precio_mensual');
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $result = $query->row_array();
        } else {
            $result = "nada";
        }

        return $result;
    }
}
