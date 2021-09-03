<?php
class Product_filter_model extends CI_Model {

    function fetch_filter_type($type){
     $this->db->distinct();
     $this->db->select($type);
     $this->db->from('items');
     return $this->db->get();
    }

     function make_query($minimum_price,$maximum_price,$category,$size) {
        $query .= "
           SELECT * FROM items
        ";

        if(isset($minimum_price,$maximum_price) && !empty($minimum_price) && !empty($maximum_price))
        {
            $query .="
            WHERE price BETWEEN'".$_POST["minimum_price"]."'AND '".$_POST["maximum_price"]."'
            ";
        }

        if(isset($category)){
            $category_filter = implode('","', $category);
            $query .="
            AND category IN('".$category_filter."')
            ";
        }

        if(isset($size)){
            $size_filter = implode('","', $size);
            $query .="
            AND size IN('".$size_filter."')
            ";
        }
        return $query;
    }
    function count_all($minimum_price,$maximum_price,$category,$size) {

        $query = $this->make_query($minimum_price,$maximum_price,$category,$size);
        $data = $this->db->query($query);
        return $data->num_rows();
    }
}
?>