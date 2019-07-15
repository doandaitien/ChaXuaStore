<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllProduct()
	{
		$this->db->select("*");
		$dulieu = $this->db->get('Product');
		$dulieu = $dulieu->result_array();

		return $dulieu;
	}

	public function getCategories()
	{
		$sql = "select distinct categories from Product";

		return $this->db->query($sql)->result_array();
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */