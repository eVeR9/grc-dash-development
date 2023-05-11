<?php
class Olivina_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();   
    }

    public function add_olivina($data)
    {
        $this->db->insert('hornos_olivina', $data);
        return true;
    }

    public function get_hornos_olivina_by_id($id)
    {
        $query = $this->db->get_where('hornos_olivina', array('id' => $id));
        return $result = $query->row_array();
    }

    public function edit_olivina($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('hornos_olivina', $data);
        return true;
    }

    public function get_all_olivina()
    {
        $this->db->select('ho.*,ho.id');
        $this->db->from('hornos_olivina as ho');
        $this->db->order_by('ho.id','desc');
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}
?>