<?php
class Product_model extends CI_Model {
    protected $table = 'items';
    protected $table1 = 'category';
    
    public function __construct() {
        parent::__construct();
    }
	
	public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_all() {
        $query = $this->db->get($this->table1);
        return $query->result();
    }

    public function getAll() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getTotal(){
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function get_where($where) {
        return $this->db->where($where)
                        ->get($this->table)
                        ->result();
    }
}