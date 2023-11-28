<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'tuser';
    private $primary = 'id_user';

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
    public function getUserbyId($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get($this->table)->row_array();
    }
    public function selectAll()
    {
        $this->db->where('A.id_role !=', 1);
        $this->db->order_by('id_user', 'ASC');

        return $this->db->get($this->table . " as A")->result_array();
    }
    public function update($data)
    {
        $this->db->where($this->primary, $data[$this->primary]);
        return $this->db->update($this->table, $data);
    }
    public function delete($id)
    {
        $this->db->delete($this->table, [$this->primary => $id]);
        return $this->db->affected_rows();
        // $this->db->where($this->primary, $id);
        // return $this->db->delete($this->table);
    }
    public function sumUser()
    {
        $this->db->select('id_user');
        $this->db->where('id_role', 2);
        return $this->db->get($this->table)->num_rows();
    }
}
