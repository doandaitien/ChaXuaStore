<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductBill extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addProductBill($BID,$PID,$amount,$quantity)
	{
		$data = array(
			'BID' => $BID,
			'PID' => $PID,
			'amount' => $amount,
			'quantity' => $quantity,
		);

		$this->db->insert('product_bill', $data);
		$last_row = $this->db->order_by('PBID',"desc")->where('BID',$BID)
            ->limit(1)
            ->get('product_bill')
            ->row();
        echo $last_row->PBID;
	}

}

/* End of file ProductBill.php */
/* Location: ./application/models/ProductBill.php */