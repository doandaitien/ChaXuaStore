<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Account extends CI_Model
	{
		// Hàm khởi tạo
	    function __construct() {
	        // Gọi đến hàm khởi tạo của cha
	        parent::__construct();
        	$this->load->database();
	    }

		public function getList()
		{
			echo 'đã vào hàm getList của models';
		}
		public function countAll() {
			return $this->db->count_all("product");
		}


		public function checkAID($userid) 
		{
			$sql = "select * from account where userid = '".$userid."'";
			$sql = $this->db->query($sql);

			$sql = $sql->result_array();
			return $sql;
		}

		public function addCashier($dulieu) 
		{			
			return $this->db->insert('account',$dulieu);
		}
		public function getAllProduct() 
		{
			$product = $this->db->get('account', 6, 0);

			$product = $product->result_array();
			return $product;
		}

		public function soTrang($soSanPhamTrong1Trang)
		{
			$result = $this->db->count_all('account');

			$sotrang = ceil($result/$soSanPhamTrong1Trang);
			return $sotrang;
		}

		public function loadTNTheoTrang($trang, $soSanPhamTrong1Trang)
		{
			$vitri = ($trang-1)*$soSanPhamTrong1Trang;
			$ketqua = $this->db->get('account',$soSanPhamTrong1Trang, $vitri);
			$ketqua = $ketqua->result_array();
			return $ketqua;
		}

		public function getCashier($userid)
		{
			$this->db->select('*');
			$this->db->where('userid',$userid);

			$info = $this->db->get('account');
			$info = $info->result_array();
			return $info;
		}

		public function deleteCashier($userid)
		{
			$sql = "delete from account where userid = '".$userid."'";
			return $this->db->query($sql);
		}

		public function editInfo($userid,$tentn,$email,$mkmoi,$vitri)
		{
			if($mkmoi == "") {
				$sql = "update account set username = '".$tentn."', email = '".$email."', location = '".$vitri."' where userid = '".$userid."'";
			} else {
				$sql = "update account set username = '".$tentn."', email = '".$email."', password = '".$mkmoi."', location = '".$vitri."' where userid = '".$userid."'";
			}
			
			return $this->db->query($sql);
		}
	}