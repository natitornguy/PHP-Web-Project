<?php
class user_model extends CI_Model
{
    public function __construct()
    {
    }
    public function getAll($start = 0, $perpage = 0)
    {
        $this->db->select('*');
        $this->db->from('users');

        $this->db->limit($perpage, $start);
        $query = $this->db->get();

        return $query->result();
    }
    public function getuser($username)
    {   
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get();

        return $query->row(0);
    }
    public function getpassword($password)
    {   
        $this->db->select('username');
        $this->db->from('users');
        $this->db->where('username', $password);
        $query = $this->db->get();

        return $query->row(0);
    }

    public function insert($params)
    {
        $this->db->insert('users', $params);
    }
    public function update($params, $id)
    {
        $this->db->where('user_id', $id);
        $this->db->update('users', $params);
    }

    public function delete($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users');

    }
}
