<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ToppingBill extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addToppingBill($PBID,$TID)
	{
		$data = array(
			'PBID' => $PBID,
			'TID' => $TID
		);

		$this->db->insert('topping_bill', $data);
		if($this->db->affected_rows() > 0){
			echo 'thanhcong';
		}
		else{
			echo 'thatbai';
		}
	}

}

/* End of file ToppingBill.php */
/* Location: ./application/models/ToppingBill.php */


