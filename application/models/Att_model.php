<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Att_model extends CI_Model
{
    private $table = 'tabsen';
    private $primary = 'id_absen';

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }
    public function getUsers($id = NULL)
    {
        $this->db->where('id_user', $id);
        return $this->db->get($this->table . " as A")->result_array();
    }
    public function selectAll()
    {
        $this->db->join('tuser B', 'A.id_user=B.id_user');
        $this->db->order_by('A.create_date', 'DESC');
        return $this->db->get($this->table . " as A")->result_array();
    }
    public function selectAtttoday($date)
    {
        $this->db->join('tuser B', 'A.id_user=B.id_user');
        $this->db->where('create_date LIKE', '%' . $date . '%');
        $this->db->order_by('A.create_date', 'DESC');
        return $this->db->get($this->table . " as A")->result_array();
    }
    public function selectUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->order_by('create_date', 'DESC');
        return $this->db->get($this->table)->result_array();
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
    public function sumAtt($date)
    {
        $this->db->select('DISTINCT(id_user)');
        $this->db->where('A.create_date LIKE', '%' . $date . '%');
        return $this->db->get($this->table . " as A")->num_rows();
    }
    public function sumAbsen($date)
    {
        // $this->db->select_sum('id_absen');
        $this->db->where('create_date LIKE', '%' . $date . '%');
        return $this->db->get($this->table)->num_rows();
    }
    public function getAttbyId($id)
    {
        $this->db->where('id_absen', $id);
        return $this->db->get($this->table)->row_array();
    }
}
