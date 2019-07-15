<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Order extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
        	$this->load->database();
		}

		public function getAllOrder()
		{
			$sql = "select * from orders where statement = 0 OR statement = 1 LIMIT 0,3";

			$result = $this->db->query($sql);
			$result = $result->result_array();

			return $result;
		}

		public function getOrder($OID) 
		{
			$this->db->select('*');
			$this->db->where('OID',$OID);

			$info = $this->db->get('orders');
			$info = $info->result_array();
			return $info;
		}

		public function soTrang($soSanPhamTrong1Trang)
		{
			$result = $this->db->count_all('orders');

			$sotrang = ceil($result/$soSanPhamTrong1Trang);
			return $sotrang;
		}

		public function loadHDTheoTrang($trang, $soSanPhamTrong1Trang)
		{
			$vitri = ($trang-1)*$soSanPhamTrong1Trang;

			$sql = "select * from orders where statement = '0' OR statement = '1' LIMIT " .$vitri.",".$soSanPhamTrong1Trang;

			$result = $this->db->query($sql);
			$result = $result->result_array();

			return $result;
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

		public function getProduct($OID)
		{
			$this->db->select('*');
			$this->db->where('OID', $OID);

			$order = $this->db->get('product_order');
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
				if($order[$i]['sugar'] != '' && $order[$i]['ice'] != '') {
					$order[$i]['proname'] = $info[0]['proname'] ."<br>(" .$order[$i]['sugar']."+".$order[$i]['ice'] .")";
				} else if($order[$i]['sugar'] == '' && $order[$i]['ice'] != '') {
					$order[$i]['proname'] = $info[0]['proname'] ."<br>(".$order[$i]['ice'] .")";
				} else if($order[$i]['sugar'] != '' && $order[$i]['ice'] == '') {
					$order[$i]['proname'] = $info[0]['proname'] ."<br>(".$order[$i]['sugar'] .")";
				} else {
					$order[$i]['proname'] = $info[0]['proname'];
				}

				$order[$i]['price'] = $info[0]['price'];

				$this->db->select('*');
				$this->db->where('POID', $order[$i]['POID']);

				$info = $this->db->get('topping_order');
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

		public function searchOrder($key)
		{
			$sql = "select * from orders where OID LIKE '%".$key."%'";

			$result = $this->db->query($sql);
			$result = $result->result_array();

			return $result;
		}

		public function browserOrder($dulieudondathang)
		{
			$dulieuhoadon = array();
			if($dulieudondathang[0]['code'] != '') {
				$sql = "select * from customer where phone = '" + $dulieudondathang[0]['code'] + "'";
				$result = $this->db->query($sql);
				$dulieuhoadon['CID'] = $result['CID'];
			}
			$dulieuhoadon['AID'] = 51;
			$dulieuhoadon['time'] = $dulieudondathang[0]['time'];
			$dulieuhoadon['addrcus'] = $dulieudondathang[0]['addrcus'];
			$dulieuhoadon['totalprice'] = $dulieudondathang[0]['totalprice'];
			$dulieuhoadon['tientichluy'] = $dulieudondathang[0]['totalprice'] -  $dulieudondathang[0]['totalpriceafter'];
			$dulieuhoadon['typepay'] = $dulieudondathang[0]['typepay'];
			$dulieuhoadon['phonecontact'] = $dulieudondathang[0]['phonecontact'];

			// $sql = "INSERT INTO bill (`CID`, `AID`, `time`, `addrcus`, `totalprice`) VALUES ( ".$dulieudondathang[0]['CID']. ",".$dulieudondathang[0]['AID']. ",`".$dulieudondathang[0]['time']. "`,`".$dulieudondathang[0]['addrcus']. "`,". $dulieudondathang[0]['totalprice']."); SELECT @@IDENTITY as LastID";

			if(!$this->db->insert('bill',$dulieuhoadon)) {
				return false;
			}
			

			$last_row = $this->db->order_by('BID',"desc")->limit(1)->get('bill')->row();

			$this->db->select('*');
			$this->db->where('OID',$dulieudondathang[0]['OID']);

			$order = $this->db->get('product_order');
			$order = $order->result_array();

			for($i = 0; $i < sizeof($order); $i++) {
				$sanpham = array();
				$sanpham['BID'] = $last_row->BID;
				$sanpham['PID'] = $order[$i]['PID'];
				$sanpham['amount'] = $order[$i]['totalpriceItem'];
				$sanpham['quantity'] = $order[$i]['amount'];
				// totalprice
				if(!$this->db->insert('product_bill',$sanpham)) {
					return false;
				}

				$last_row1 = $this->db->order_by('PBID',"desc")->limit(1)->get('product_bill')->row();

				$this->db->select('*');
				$this->db->where('POID',$order[$i]['POID']);

				$order1 = $this->db->get('topping_order');
				$order1 = $order1->result_array();
				for($j = 0; $j < sizeof($order1); $j++) {
					$topping = array();
					$topping['PBID'] = $last_row1->PBID;
					$topping['TID'] = $order1[$j]['TID'];
					if(!$this->db->insert('topping_bill',$topping)) {
						return false;
					}
				}
			}
			return true;
		}

		public function deleteOrder($OID)
		{
			$sql = "delete from orders where OID = ".$OID;
			$this->db->query($sql);
			$this->db->select('*');
			$this->db->where('OID',$OID);
			$order = $this->db->get('product_order');
			$order = $order->result_array();

			for($i = 0; $i < sizeof($order); $i++) {
				$sql = "delete product_order, topping_order from product_order, topping_order where product_order.POID = topping_order.POID AND product_order.POID = ". $order[$i]['POID'];
				$this->db->query($sql);
			}

			$sql = "delete from product_order where OID = ".$OID;
			
			return $this->db->query($sql);
		}

		public function test()
		{
			// $sql = "select DISTINCT OID from product_order";

			$sql = "insert into bill (`CID`, `AID`, `time`, `addrcus`, `totalprice`) values ( ".$dulieudondathang[0]['CID']. ",".$dulieudondathang[0]['AID']. ",".$dulieudondathang[0]['time']. ",".$dulieudondathang[0]['addrcus']. ",". $dulieudondathang[0]['totalprice']."); SELECT @@IDENTITY as LastID";
			
			echo $sql;
			die();
			$info = $this->db->query($sql);
			$info = $info->result_array();

			echo "<pre>";
	        print_r($info);
	        echo "</pre>";
			die();
		}

		public function totalPrice()
		{
			$sql = "select totalprice from orders";
			$result = $this->db->query($sql);
			$result = $result->result_array();

			return $result;
		}
	}
?>