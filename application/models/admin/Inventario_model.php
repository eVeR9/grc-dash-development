<?php

class Inventario_model extends CI_Model{

    private $movimientosInventario = 'inventario_movimientos_almacen';
    private $almacenes = 'inventario_almacen';
    private $productos = 'inventario_productos';
    private $transferencias = 'inventario_transferencias_almacen';

    public function __construct()
    {
        parent::__construct();
    }

    public function add($data){

        $this->db->insert($this->movimientosInventario, $data);
        return true;
    }

    public function addTransferencias($data){

        $this->db->insert_batch($this->transferencias, $data);
        return true;

    }

    public function doTransferencia($almacenOrigen, $almacenDestino, $producto, $unidades){

        /*
        $this->db->set("unidades = unidades -" ."'".$unidades."'");
        $this->db->where("producto_id = '".$producto."' AND almacen_id = '".$almacenOrigen."' ");
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $this->db->update($this->movimientosInventario);

        $this->db->set("unidades = unidades +" ."'".$unidades."'");
        $this->db->where("producto_id = '".$producto."' AND almacen_id = '".$almacenDestino."' ");
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $this->db->update($this->movimientosInventario);
        */

        $this->db->query("UPDATE $this->movimientosInventario
        SET unidades = unidades - '".$unidades."'
        WHERE producto_id = '".$producto."' AND almacen_id = '".$almacenOrigen."'
        ORDER BY created_at DESC LIMIT 1");
    
        $this->db->query("UPDATE $this->movimientosInventario
        SET unidades = unidades + '".$unidades."'
        WHERE producto_id = '".$producto."' AND almacen_id = '".$almacenDestino."'
        ORDER BY created_at DESC LIMIT 1");
        
        //echo $this->db->last_query();
        
        return true;
    }

    public function getAlmacenes(){

        $this->db->select('*');
        $this->db->from($this->almacenes);
        $this->db->order_by('nombre', 'ASC');
        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }

    public function getMaxIdOfLastTransferencia(){

        $this->db->select_max('id', 'maxID');
        $this->db->select_max('transferencia_id');
        $query = $this->db->get($this->transferencias);

        if($query->num_rows() <= 0){

            return 1;
        }

        $data = $query->row_array();

        if($data['maxID'] == 0){

            return 1;

        }else{

            return $data['transferencia_id'] + 1;
        }



    }

    public function getMovimientos(){

        /* 
        SELECT ip.nombre_prod as producto_id, ia.nombre as almacen_id, SUM(ima.unidades)
        FROM inventario_movimientos_almacen ima
        LEFT JOIN inventario_productos ip ON ima.producto_id = ip.id
        LEFT JOIN inventario_almacen ia ON ima.almacen_id = ia.id
        GROUP BY ip.id, ia.nombre
        */

        $this->db->select('ip.nombre_prod as producto_id, ia.nombre as almacen_id, SUM(ima.unidades) as inventario');
        $this->db->from($this->movimientosInventario .' ima');
        $this->db->join($this->productos .' ip', 'ima.producto_id = ip.id', 'left');
        $this->db->join($this->almacenes .' ia', 'ima.almacen_id = ia.id');
        $this->db->group_by('ip.id');
        $this->db->group_by('ia.nombre');
        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }

    public function getProductos(){

        $this->db->select('*');
        $this->db->from($this->productos);
        $this->db->order_by('nombre_prod', 'ASC');
        $query = $this->db->get();

        $result = $query->result_array();
        return $result;

    }

    /*transferencias alamcen:
    UPDATE inventario_movimientos_almacen 
    SET unidades = unidades - 3
    WHERE producto_id = 4 AND almacen_id = 2
    ORDER BY created_at DESC LIMIT 1;

    UPDATE inventario_movimientos_almacen 
    SET unidades = unidades + 3
    WHERE producto_id = 4 AND almacen_id = 1
    ORDER BY created_at DESC LIMIT 1;
    */


}