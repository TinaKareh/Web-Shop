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

    function get_latest_items($current_date){
        $this->db->select('items.*');
        $this->db->from('items'); 
        $this->db->where('date_added',$current_date);
        
        $query = $this->db->get();
        
        return($query->result_array());
    }
}