<?php
class leave_model extends CI_Model
{

    public function getAllbyID($emp_id)
    {
        $this->db->select('leaves.*,mas_leave_status.MAS_LEAVE_NAME,employees.EMP_FNAME,employees.EMP_LNAME');
        $this->db->from('leaves');
        $this->db->join("mas_leave_status", "mas_leave_status.mas_leave_id = leaves.leave_status");
        $this->db->join("employees", "employees.emp_id = leaves.emp_id");
        $this->db->where('leaves.emp_id', $emp_id);
        $query = $this->db->get();

        return $query->result();
    }
    public function getAll(){
        $this->db->select('leaves.*,mas_leave_status.MAS_LEAVE_NAME,employees.EMP_FNAME,employees.EMP_LNAME');
        $this->db->from('leaves');
        $this->db->join("mas_leave_status", "mas_leave_status.mas_leave_id = leaves.leave_status");
        $this->db->join("employees", "employees.emp_id = leaves.emp_id");
        // $this->db->where('leaves.leave_status', 1);
        $query = $this->db->get();

        return $query->result();
    }
    public function getbyID($id)
    {
        $this->db->where('leave_id', $id);
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
    public function updatestatus($params, $id){
        $this->db->where('leave_id', $id);
        $this->db->update('leaves', $params);
    }
    public function delete($leave_id)
    {
        $this->db->where('leave_id', $leave_id);
        $this->db->delete('leaves');

    }
}
