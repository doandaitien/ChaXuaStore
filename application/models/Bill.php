<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bill extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addBill($CID,$AID,$time,$total_price,$dungdiemtichluy,$typepay)
	{
		$data = array(
			'CID' => $CID,
			'AID' => $AID,
			'time' => $time,
			'totalprice' => $total_price,
			'tientichluy' => $dungdiemtichluy,
			'typepay' => $typepay
		);

		$query = $this->db->insert('Bill', $data);
		$last_row = $this->db->order_by('BID',"desc")
            ->limit(1)
            ->get('Bill')
            ->row();
        echo $last_row->BID;
		
	}

	public function getLastBill()
	{
		$last_row = $this->db->order_by('BID',"desc")
            ->limit(1)
            ->get('Bill')
            ->row();
        echo $last_row->BID;
	}

}

/* End of file Bill.php */
/* Location: ./application/models/Bill.php */