<?php
class Register_model extends CI_Model {
    protected $table = 'customer_details';
    
    public function __construct() {
        parent::__construct();
    }
	
	public function insert($data) {
        return $this->db->insert($this->table, $data);
    }
}