<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Topping extends CI_Model
	{
		
		// Hàm khởi tạo
	    function __construct() {
	        // Gọi đến hàm khởi tạo của cha
	        parent::__construct();
        	$this->load->database();
	    }

	    public function getAllTopping()
	    {
	    	$sql = "select * from topping order by TID DESC LIMIT 6";
	    	$info = $this->db->query($sql);
	    	$info = $info->result_array();

	    	return $info;
	    }

	    public function soTrang($soSanPhamTrong1Trang)
		{
			$result = $this->db->count_all('topping');

			$sotrang = ceil($result/$soSanPhamTrong1Trang);
			return $sotrang;
		}

		public function loadTTheoTrang($trang, $soSanPhamTrong1Trang)
		{
			$vitri = ($trang-1)*$soSanPhamTrong1Trang;
			$sql = "select * from topping order by TID DESC LIMIT ".$vitri.",".$soSanPhamTrong1Trang;;
			$ketqua = $this->db->query($sql);
			$ketqua = $ketqua->result_array();
			return $ketqua;
		}

		public function addTopping($dulieu)
		{
			return $this->db->insert('topping', $dulieu);
		}

		public function editTopping($TID, $name, $price, $url)
		{
			if(strlen($url) == 0) {
				$sql = "update topping set name = '".$name."', price = ".$price. " where TID = ".$TID;
				return $this->db->query($sql);
			} else {
				$sql = "update topping set name = '".$name."', price = ".$price.", URL_IMG = '".$url."' where TID = ".$TID;
				return $this->db->query($sql);
			}
			
		}

		public function deleteTopping($TID)
		{
			$sql = "delete from topping where TID = ".$TID;

			return $this->db->query($sql);
		}

		public function searchTopping($key)
		{
			$sql = "select * from topping where name LIKE N'%".$key."%'";
			$result = $this->db->query($sql);
			$result = $result->result_array();
			return $result;
		}
	}
?>