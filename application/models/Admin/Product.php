<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	 * 
	 */
	class Product extends CI_Model
	{
		
		// Hàm khởi tạo
	    function __construct() {
	        // Gọi đến hàm khởi tạo của cha
	        parent::__construct();
        	$this->load->database();
	    }

	    public function addProduct($dulieu)
	    {
	    	return $this->db->insert('product',$dulieu);
	    }

	    public function checkProname($proname)
	    {
	    	$sql = "select * from product where proname LIKE N'%".$proname."%'";

	    	$result = $this->db->query($sql);
	    	if($result->num_rows == 0) {
	    		return true;
	    	} else {
	    		return false;
	    	}
	    }

	    public function getAllTab()
	    {
	    	$sql = "select DISTINCT categories from product";

	    	$sql = $this->db->query($sql);
	    	$sql = $sql->result_array();

	    	return $sql;
	    }

	    public function getAllProduct()
	    {
	    	$sql = "select * from product order by PID DESC";

	    	$sql = $this->db->query($sql);
	    	$sql = $sql->result_array();

	    	return $sql;
	    }

	    public function editProduct($PID,$namep,$price,$categories,$URL_IMG)
	    {
	    	if(strlen($URL_IMG) == 0) {
				$sql = "update product set proname = '".$namep."', price = ".$price.", categories = '".$categories. "' where PID = ".$PID;
				return $this->db->query($sql);
			} else {
				$sql = "update product set proname = '".$namep."', price = ".$price.", categories = '".$categories."', URL_IMG = '".$URL_IMG. "' where PID = ".$PID;
				return $this->db->query($sql);
			}
	    }

	    public function deleteProduct($PID) 
	    {
	    	$sql = "delete from product where PID = ".$PID;

	    	return $this->db->query($sql);
	    }
	}
?>