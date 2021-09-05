<?php
class Product_filter_model extends CI_Model
{
	function fetch_filter_type($type)
	{
		$this->db->distinct();
		$this->db->select($type);
		$this->db->from('items');
		$this->db->where('status', 'Available');
		$this->db->order_by('item_id', 'DESC');
		return $this->db->get();
	}

	function make_query($minimum_price, $maximum_price, $category, $size)
	{
		$query = "
		SELECT * FROM items
		WHERE status = 'Available' 
		";
		
		if(isset($minimum_price, $maximum_price) && !empty($minimum_price) && !empty($maximum_price))
		{
			$query .= "
			 AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
			";
		}

		if(isset($category))
		{
			$category_filter = implode("','", $category);
			$query .= "
			 AND category IN('".$category_filter."')
			";
		}
		if(isset($size))
		{
			$size_filter = implode("','", $size);
			$query .= "
			 AND size IN('".$size_filter."')
			";
		}
		return $query;
	}

	function fetch_data($limit, $start, $minimum_price, $maximum_price, $category, $size)
	{
		$query = $this->make_query($minimum_price, $maximum_price, $category, $size);

		$query .= ' LIMIT '.$start.', ' . $limit;

		$data = $this->db->query($query);

		$output = '';
		if($data->num_rows() > 0)
		{
			foreach($data->result_array() as $row)
			{
				$output .= '
				<div class="col-sm-4 col-lg-3 col-md-3">
					<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;" id="item_'.$row["item_id"].'">
					<img src="'.base_url().'images/'. $row['image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><input type="checkbox" class="select_product" data-product_id="'.$row["item_id"].'" data-product_name="'.$row["item_name"].'" data-product_price="'.$row["price"] .'" value="">
					<a href="#">'. $row['item_name'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['price'] .'Kshs</h4>
					<p>
					Category : '. $row['category'] .' <br />
					Size : '. $row['size'] .'<br />
					Description: '.$row['description'].'<br/>
					</p>
					</div>
				</div>
				';
			}
		}
		else
		{
			$output = '<h3>No Data Found</h3>';
		}
		return $output;
	}

	function count_all($minimum_price, $maximum_price, $category, $size)
	{
		$query = $this->make_query($minimum_price, $maximum_price, $category, $size);
		$data = $this->db->query($query);
		return $data->num_rows();
	}

}
?>