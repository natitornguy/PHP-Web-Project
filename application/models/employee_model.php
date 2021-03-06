<?php
class employee_model extends CI_Model
{
    public function __construct()
    {
    }
    public function getAll($keyword = "")
    {
        $this->db->select("employees.*, departments.DEP_NAME");
        $this->db->from("employees");
        $this->db->join("departments", "departments.DEP_ID = employees.DEP_ID");
        if (strlen($keyword) > 0) {
            $this->db->like("EMP_FNAME", $keyword, "both");
        }

        $this->db->order_by('EMP_ID', "ASC");
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
        $insert_id = $this->db->insert_id();       

        return  $insert_id;
    }
    public function update($id, $params)
    {
        $this->db->where('EMP_ID', $id);
        $this->db->update('employees', $params);
    }

    public function delete($emp_id)
    {
        $this->db->where('EMP_ID', $emp_id);
        $this->db->delete('users');
        $this->db->where('emp_id', $emp_id);
        $this->db->delete('employees');
    }

    public function getAllDepartment()
    {
        $this->db->select("*");
        $this->db->from("departments");
        $this->db->order_by('DEP_ID', "ASC");

        $query = $this->db->get();

        return $query->result();
    }
    public function generateUserPassword($params)
    {
        $this->db->insert('users', $params);
    }
}
