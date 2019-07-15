<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllCustomer()
	{
		$this->db->select('*');
		$customer = $this->db->get('Customer')->result_array();

		return $customer;
	}

	public function addPoint($CID,$tichluythem)
	{
		$tichluythem = (float)$tichluythem;
		$sql = "select point from Customer where CID ='". $CID ."'";
		$point = $this->db->query($sql)->result_array();

		$diemhientai = (float)$point[0]['point'];

		$point_add = $tichluythem + $diemhientai;

		$sql1 = "update Customer set point = '".$point_add."' where CID ='". $CID ."'";
		$this->db->query($sql1);
		if($this->db->affected_rows() > 0){
			echo 'congthanhcong';
		}
		else{
			echo 'congthatbai';
		}
	}

	public function minusPoint($CID,$trudiemtichluy)
	{
		$trudiemtichluy = (int)$trudiemtichluy;
		$sql = "select point from Customer where CID ='". $CID ."'";
		$point = $this->db->query($sql)->result_array();

		$diemhientai = (float)$point[0]['point'];

		$point_minus = $diemhientai - $trudiemtichluy;
		$sql1 = "update Customer set point = '".$point_minus."' where CID ='". $CID ."'";
		$this->db->query($sql1);
		if($this->db->affected_rows() > 0){
			echo 'truthanhcong';
		}
		else{
			echo 'truthatbat';
		}
	}

}

/* End of file Customer.php */
/* Location: ./application/models/Customer.php */