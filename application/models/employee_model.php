<?php
class employee_model extends CI_Model
{
    public function getAll(/*$start = 0, $perpage = 0*/)
    {
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->order_by('emp_fname');
        // $this->db->limit($perpage, $start);
        $query = $this->db->get();

        return $query->result();
    }
    public function getbyID($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('employees');

        return $query->row(0);
    }
    public function insert($params)
    {
        $this->db->insert('employees', $params);
    }
    public function update($params, $id)
    {
        $this->db->where('emp_id', $id);
        $this->db->update('employees', $params);
    }

    public function delete($emp_id)
    {
        $this->db->where('emp_id', $emp_id);
        $this->db->delete('employees');
        
    }
}
