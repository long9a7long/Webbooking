<?php
class Hotels_model extends CI_Model
{
    public function getList()
    {
        $query=$this->db->get("hotels");
        return $query->result_array();
    }
}