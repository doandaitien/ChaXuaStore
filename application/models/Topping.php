<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topping extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllTopping()
	{
		$this->db->select("*");
		$dulieu = $this->db->get('Topping');
		$dulieu = $dulieu->result_array();

		return $dulieu;
	}
}

/* End of file Topping.php */
/* Location: ./application/models/Topping.php */