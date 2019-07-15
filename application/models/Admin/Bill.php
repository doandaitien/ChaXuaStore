<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * 
	 */
	class Bill extends CI_Model
	{
		
		// Hàm khởi tạo
	    function __construct() {
	        // Gọi đến hàm khởi tạo của cha
	        parent::__construct();
        	$this->load->database();
	    }

	    public function getAllBill()
	    {
	    	$info = $this->db->order_by('BID',"desc")->get('bill',3,0);
	    	$info = $info->result_array();

	    	return $info;
	    }

	    public function getOrder($BID) 
		{
			$this->db->select('*');
			$this->db->where('BID',$OID);

			$info = $this->db->get('bill');
			$info = $info->result_array();
			return $info;
		}

		public function soTrang($soSanPhamTrong1Trang)
		{
			$result = $this->db->count_all('bill');

			$sotrang = ceil($result/$soSanPhamTrong1Trang);
			return $sotrang;
		}

		public function loadHDTheoTrang($trang, $soSanPhamTrong1Trang)
		{
			$vitri = ($trang-1)*$soSanPhamTrong1Trang;
			$ketqua = $this->db->order_by('BID',"desc")->get('bill',$soSanPhamTrong1Trang, $vitri);
			$ketqua = $ketqua->result_array();
			return $ketqua;
		}

		public function getCashier($AID) 
		{
			$this->db->select('*');
			$this->db->where('AID',$AID);

			$info = $this->db->get('account');
			$info = $info->result_array();

			return $info;
		}

		public function getCustomer($CID) 
		{
			$this->db->select('*');
			$this->db->where('CID',$CID);

			$info = $this->db->get('customer');
			$info = $info->result_array();

			return $info;
		}

		public function getProduct($BID)
		{
			$this->db->select('*');
			$this->db->where('BID', $BID);

			$order = $this->db->get('product_bill');
			$order = $order->result_array();

			// echo "<pre>";
	  //       print_r($order);
	  //       echo "</pre>";
			// die();

			for($i = 0; $i < sizeof($order); $i++) {
				$this->db->select('*');
				$this->db->where('PID', $order[$i]['PID']);

				$info = $this->db->get('product');
				$info = $info->result_array();

				// $order[$i]['PID'] = $info[0]['PID'];
				$order[$i]['proname'] = $info[0]['proname'];
				$order[$i]['price'] = $info[0]['price'];

				$this->db->select('*');
				$this->db->where('PBID', $order[$i]['PBID']);

				$info = $this->db->get('topping_bill');
				$info = $info->result_array();

				$order[$i]['namet'] = "";

				for ($j = 0; $j < sizeof($info) ; $j++) { 
					$this->db->select('*');
					$this->db->where('TID',$info[$j]['TID']);

					$infot = $this->db->get('topping');
					$infot = $infot->result_array();

					$order[$i]['namet'] = $order[$i]['namet']."".$infot[0]['name'];

					if($j < sizeof($info) - 1) {
						$order[$i]['namet'] = $order[$i]['namet']."<br>";
					}
				}

				
				// $order[$i]['namet'] = $info[0]['name'];
			}


			// echo "<pre>";
	  //       print_r($order);
	  //       echo "</pre>";
			// die();
		
			return $order;
		}

		public function searchBill($key)
		{
			$sql = "select * from bill where BID LIKE '%".$key."%'";

			$result = $this->db->query($sql);
			$result = $result->result_array();

			return $result;
		}

		public function totalPrice()
		{
			$sql = "select totalprice, tientichluy from bill";
			$result = $this->db->query($sql);
			$result = $result->result_array();

			return $result;
		}

		public function deleteBill($BID)
		{
			$this->db->select('*');
			$this->db->where('BID',$BID);
			$order = $this->db->get('product_bill');
			$order = $order->result_array();

			for($i = 0; $i < sizeof($order); $i++) {
				$sql = "delete product_bill, topping_bill from product_bill, topping_bill where product_bill.PBID = topping_bill.PBID AND product_bill.PBID = ". $order[$i]['PBID'];
				$this->db->query($sql);
			}

			$sql = "delete from product_bill where BID = ".$BID;
			$this->db->query($sql);

			$sql = "delete from bill where BID = ".$BID;
			
			return $this->db->query($sql);
		}
	}
?>