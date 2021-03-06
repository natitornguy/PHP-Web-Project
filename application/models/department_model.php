<?php
class department_model extends CI_Model{
    public function getAll()
        {
            $this->db->select('*');
            $this->db->from('departments');

            $query = $this->db->get();
    
            return $query->result();
        }
}
?>