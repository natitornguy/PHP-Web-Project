<?php
class leave_model extends CI_Model
{
    public function __construct()
    {
    }
    public function getAll($start = 0, $perpage = 0)
    {
        $this->db->select('*');
        $this->db->from('leaves');

        $this->db->limit($perpage, $start);
        $query = $this->db->get();

        return $query->result();
    }
    public function getbyID($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('leaves');

        return $query->row(0);
    }
    public function insert($params)
    {
        $this->db->insert('leaves', $params);
    }
    public function update($params, $id)
    {
        $this->db->where('leave_id', $id);
        $this->db->update('leaves', $params);
    }

    public function delete($leave_id)
    {
        $this->db->where('leave_id', $leave_id);
        $this->db->delete('leaves');

    }
}
