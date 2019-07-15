<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		//Phần sản phẩm
		public function quanLySP()
		{

			$this->load->model('Admin/Product');
			$this->load->model('Admin/Account');
			$dulieuadmin = $this->Account->getAllProduct();

			$category = $this->Product->getAllTab();

			$dulieusanpham = $this->Product->getAllProduct();

			$dulieu = array( 
				'category' => $category,
				'dulieusanpham' => $dulieusanpham,
				'dulieuadmin' => $dulieuadmin
			);

			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();
			$this->load->view('Admin_qlysp',$dulieu,False);
		}

		public function themSanPham()
		{
			$dulieu = array();

			$dulieu['proname'] = $_POST['tensp'];
			$dulieu['price'] = $_POST['gt'];
			$dulieu['URL_IMG'] = $_POST['avt'];
			$dulieu['categories'] = $_POST['cate'];

			

			$dulieu['URL_IMG'] = base_url()."vendor/image/".$dulieu['URL_IMG'];

			$this->load->model('Admin/Product'); 
			$this->Product->addProduct($dulieu);

			$category = $this->Product->getAllTab();

			$dulieusanpham = $this->Product->getAllProduct();

			$dulieu = array( 
				'category' => $category,
				'dulieusanpham' => $dulieusanpham
			);
			echo json_encode($dulieu);
		}

		
		public function kiemTraProname()
		{
			if(isset($_POST['proname'])) {
				$this->load->model('Admin/Product');
				$check = $this->Product->checkProname($_POST['proname']);
				if($check == true) {
					echo true;
				} else {
					echo false;
				}
			}
		}

		public function chinhSuaSP($PID)
		{
			$dulieusanpham = array();
			$namep = $_POST['tensp'];
			$price = $_POST['gt'];
			$categories = $_POST['category'];
			$URL_IMG = $_POST['avt'];

			$this->load->model('Admin/Product');

			if(strlen($URL_IMG) == 0 ) {
				$this->Product->editProduct($PID,$namep,$price,$categories,$URL_IMG);
				$category = $this->Product->getAllTab();

				$dulieusanpham = $this->Product->getAllProduct();

				$dulieu = array( 
					'category' => $category,
					'dulieusanpham' => $dulieusanpham
				);
				echo json_encode($dulieu);
			} else {
				$URL_IMG = base_url()."vendor/image/topping/".$URL_IMG;
				$this->Product->editProduct($PID,$namep,$price,$categories,$URL_IMG);
				$category = $this->Product->getAllTab();

				$dulieusanpham = $this->Product->getAllProduct();

				$dulieu = array( 
					'category' => $category,
					'dulieusanpham' => $dulieusanpham
				);
				echo json_encode($dulieu);
			}
		}

		public function xoaSP($PID)
		{
			$this->load->model('Admin/Product');
			$this->Product->deleteProduct($PID);

			$category = $this->Product->getAllTab();

			$dulieusanpham = $this->Product->getAllProduct();

			$dulieu = array( 
				'category' => $category,
				'dulieusanpham' => $dulieusanpham
			);
			echo json_encode($dulieu);

		}
		// end phần sản phẩm

		// phần topping
		public function quanLyTopping() 
		{
			$this->load->model('Admin/Topping');
			$this->load->model('Admin/Account');
			$dulieuadmin = $this->Account->getAllProduct();

			$dulieutopping = $this->Topping->getAllTopping();
			$sotrang = $this->Topping->soTrang(6);

			$dulieu = array(
				'dulieutopping' => $dulieutopping,
				'sotrang' => $sotrang,
				'dulieuadmin' => $dulieuadmin
			);

			$this->load->view('Admin_Topping',$dulieu,False);
		}

		public function pageTopping($trang)
		{
			$this->load->model('Admin/Topping');

			$dulieutopping = $this->Topping->loadTTheoTrang($trang, 6);
			$sotrang = $this->Topping->soTrang(6);

			$dulieu = array(
				'dulieutopping' => $dulieutopping,
				'sotrang' => $sotrang
			);

			echo json_encode($dulieu);
		}

		public function themTopping()
		{
			$topping = array();
			//var_dump($_POST['tensp']);
			$topping['name'] = $_POST['tensp'];
			$topping['price'] = $_POST['gt'];
			$topping['URL_IMG'] = $_POST['avt'];
			$topping['URL_IMG'] = base_url()."vendor/image/topping/".$topping['URL_IMG'];

			// Để phần chỉnh sửa html dưới dssp dùng đc $this->input->post(); why????

			$this->load->model('Admin/Topping'); 
			$this->Topping->addTopping($topping);

			$dulieutopping = $this->Topping->getAllTopping();
			$sotrang = $this->Topping->soTrang(6);

			$dulieu = array(
				'dulieutopping' => $dulieutopping,
				'sotrang' => $sotrang
			);

			echo json_encode($dulieu);
		}

		public function chinhSuaTopping($TID)
		{
			$name = $_POST['namet'];
			$price = $_POST['price'];
			$URL_IMG = $_POST['avt'];

			$this->load->model('Admin/Topping');

			if(strlen($URL_IMG) == 0) {
				$this->Topping->editTopping($TID, $name, $price,$URL_IMG);
				$dulieutopping = $this->Topping->getAllTopping();
				$sotrang = $this->Topping->soTrang(6);

				$dulieu = array(
					'dulieutopping' => $dulieutopping,
					'sotrang' => $sotrang
				);

				echo json_encode($dulieu);
			} else {
				$URL_IMG = base_url()."vendor/image/topping/".$URL_IMG;
				$this->Topping->editTopping($TID, $name, $price,$URL_IMG);
				$dulieutopping = $this->Topping->getAllTopping();
				$sotrang = $this->Topping->soTrang(6);

				$dulieu = array(
					'dulieutopping' => $dulieutopping,
					'sotrang' => $sotrang
				);

				echo json_encode($dulieu);
			}		
		}

		public function xoaTopping($TID)
		{
			$this->load->model('Admin/Topping');

			$this->Topping->deleteTopping($TID);
			$dulieutopping = $this->Topping->getAllTopping();
			$sotrang = $this->Topping->soTrang(6);

			$dulieu = array(
				'dulieutopping' => $dulieutopping,
				'sotrang' => $sotrang
			);

			echo json_encode($dulieu);
		}

		public function timKiemTopping($key)
		{
			$this->load->model('Admin/Topping');
			$dulieutopping = $this->Topping->searchTopping($key);
			// var_dump($dulieutopping);
			// die();

			$dulieu = array(
				'dulieutopping' => $dulieutopping
			);
			echo json_encode($dulieu);
		}
		// end phần topping

		//Phần đơn hàng
		public function quanLyDonDatHang() 
		{
			$this->load->model('Admin/Order');
			$this->load->model('Admin/Account');
			$dulieuadmin = $this->Account->getAllProduct();
			$tongtien = $this->Order->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'];
			}

			$dulieudondathang = $this->Order->getAllOrder();

			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();

			$dulieusanpham = array();

			for($i = 0; $i < sizeof($dulieudondathang); $i++) {

				$dulieusanpham[$i] = $this->Order->getProduct($dulieudondathang[$i]['OID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['amount'];
				}
				
				$dulieudondathang[$i]['sumAmount'] = $sum;
				if($dulieudondathang[$i]['code'] == '' || $dulieudondathang[$i]['code'] == null){
					$dulieudondathang[$i]['code'] = "Khách lẻ";
				}
			}

			$sotrang = $this->Order->soTrang(3);

			
			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieudondathang' => $dulieudondathang,
				'dulieusanpham' => $dulieusanpham,
				'sotrang' => $sotrang,
				'dulieuadmin' => $dulieuadmin
			);

			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();

			$this->load->view('Admin_DonDatHang.php',$dulieu,False);		
		}

		public function pageDonHang($trang)
		{
			$this->load->model('Admin/Order');

			$sotrang = $this->Order->soTrang(3);

			$dulieudondathang = $this->Order->loadHDTheoTrang($trang,3);

			$tongtien = $this->Order->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'];
			}

			// echo "<pre>";
	  //       print_r($dulieudondathang);
	  //       echo "</pre>";
			// die();
			$dulieusanpham = array();

			for($i = 0; $i < sizeof($dulieudondathang); $i++) {

				$dulieusanpham[$i] = $this->Order->getProduct($dulieudondathang[$i]['OID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['amount'];
				}
				
				$dulieudondathang[$i]['sumAmount'] = $sum;
				if($dulieudondathang[$i]['code'] == '' || $dulieudondathang[$i]['code'] == null){
					$dulieudondathang[$i]['code'] = "Khách lẻ";
				}
			}

			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieudondathang' => $dulieudondathang,
				'dulieusanpham' => $dulieusanpham,
				'sotrang' => $sotrang
			);

			// echo "<pre>";
	  //       print_r($dulieusanpham);
	  //       echo "</pre>";
			// die();

			echo json_encode($dulieu);
		}

		public function timKiemDH($key)
		{
			$this->load->model('Admin/Order');

			$dulieudondathang = $this->Order->searchOrder($key);

			$tongtien = $this->Order->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'];
			}

			// echo "<pre>";
	  //       print_r($dulieudondathang);
	  //       echo "</pre>";
			// die();
			$dulieusanpham = array();

			for($i = 0; $i < sizeof($dulieudondathang); $i++) {

				$dulieusanpham[$i] = $this->Order->getProduct($dulieudondathang[$i]['OID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['amount'];
				}
				
				$dulieudondathang[$i]['sumAmount'] = $sum;
				if($dulieudondathang[$i]['code'] == '' || $dulieudondathang[$i]['code'] == null){
					$dulieudondathang[$i]['code'] = "Khách lẻ";
				}
			}

			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieudondathang' => $dulieudondathang,
				'dulieusanpham' => $dulieusanpham
			);

			// echo "<pre>";
	  //       print_r($dulieusanpham);
	  //       echo "</pre>";
			// die();

			echo json_encode($dulieu);
		}

		public function duyetDonHang($OID)
		{
			$dulieu = array();
			$this->load->model('Admin/Order');

			$dulieudondathang = $this->Order->getOrder($OID);
			$this->Order->browserOrder($dulieudondathang);
			if($this->Order->deleteOrder($OID)){

				$tongtien = $this->Order->totalPrice();
				$tongtienhang = 0;
				for($i = 0; $i < sizeof($tongtien); $i++){
					$tongtienhang += $tongtien[$i]['totalprice'];
				}
				

				$dulieusanpham = array();
				$dulieudondathang = $this->Order->getAllOrder();

				for($i = 0; $i < sizeof($dulieudondathang); $i++) {

					$dulieusanpham[$i] = $this->Order->getProduct($dulieudondathang[$i]['OID']);

					$sum = 0;
					$sumprice = 0;

					foreach ($dulieusanpham[$i] as $key => $value) {
						# code...
						$sum = $sum + $dulieusanpham[$i][$key]['amount'];
					}
					
					$dulieudondathang[$i]['sumAmount'] = $sum;
					if($dulieudondathang[$i]['code'] == '' || $dulieudondathang[$i]['code'] == null){
						$dulieudondathang[$i]['code'] = "Khách lẻ";
					}
				}

				$sotrang = $this->Order->soTrang(3);

				
				$dulieu = array(
					'tongtienhang' => $tongtienhang,
					'dulieudondathang' => $dulieudondathang,
					'dulieusanpham' => $dulieusanpham,
					'sotrang' => $sotrang
				);

				echo json_encode($dulieu);
			}
			
		}

		public function xoaDonHang($OID)
		{
			$this->load->model('Admin/Order');
			$this->Order->deleteOrder($OID);

			$dulieudondathang = $this->Order->getAllOrder();

			$tongtien = $this->Order->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'];
			}
			

			$dulieusanpham = array();

			for($i = 0; $i < sizeof($dulieudondathang); $i++) {

				$dulieusanpham[$i] = $this->Order->getProduct($dulieudondathang[$i]['OID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['amount'];
				}
				
				$dulieudondathang[$i]['sumAmount'] = $sum;
				if($dulieudondathang[$i]['code'] == '' || $dulieudondathang[$i]['code'] == null){
					$dulieudondathang[$i]['code'] = "Khách lẻ";
				}
			}

			$sotrang = $this->Order->soTrang(3);

			
			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieudondathang' => $dulieudondathang,
				'dulieusanpham' => $dulieusanpham,
				'sotrang' => $sotrang
			);

			echo json_encode($dulieu);

		}
		// end phần đơn hàng

		// phần hóa đơn
		public function quanLyHoaDon()
		{
			$this->load->model('Admin/Bill');
			$this->load->model('Admin/Account');
			$dulieuadmin = $this->Account->getAllProduct();
			$tongtien = $this->Bill->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'] + $tongtien[$i]['tientichluy'];
			}

			$dulieuhoadon = $this->Bill->getAllBill();
			
			$dulieusanpham = array();
	
			for($i = 0; $i < sizeof($dulieuhoadon); $i++) {
				$dulieuthungan = $this->Bill->getCashier($dulieuhoadon[$i]['AID']);

				$dulieuhoadon[$i]['userid'] = $dulieuthungan[0]['userid'];
				$dulieuhoadon[$i]['username'] = $dulieuthungan[0]['username'];
				$dulieuhoadon[$i]['location'] = $dulieuthungan[0]['location'];

				if($dulieuhoadon[$i]['CID'] != 0){
					$dulieunguoidung = $this->Bill->getCustomer($dulieuhoadon[$i]['CID']);

					$dulieuhoadon[$i]['phone'] = $dulieunguoidung[0]['phone'];
				} else {
					$dulieuhoadon[$i]['phone'] = "Khách lẻ";
					
				}
				$dulieuhoadon[$i]['cuskey'] = "";

				$dulieusanpham[$i] = $this->Bill->getProduct($dulieuhoadon[$i]['BID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['quantity'];
				}
				
				$dulieuhoadon[$i]['sumQuantity'] = $sum;
				$dulieuhoadon[$i]['sumPrice'] = $dulieuhoadon[$i]['totalprice'] + $dulieuhoadon[$i]['tientichluy'];
			}
			$sotrang = $this->Bill->soTrang(3);

			
			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieuhoadon' => $dulieuhoadon,
				'dulieusanpham' => $dulieusanpham,
				'sotrang' => $sotrang,
				'dulieuadmin' => $dulieuadmin
			);

			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();

			$this->load->view('Admin_HoaDon.php',$dulieu,False);


		}

		public function pageHoaDon($trang)
		{
			$this->load->model('Admin/Bill');
			$tongtien = $this->Bill->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'] + $tongtien[$i]['tientichluy'];
			}
			$sotrang = $this->Bill->soTrang(3);

			$dulieuhoadon = $this->Bill->loadHDTheoTrang($trang,3);
			
			$dulieusanpham = array();

			for($i = 0; $i < sizeof($dulieuhoadon); $i++) {
				$dulieuthungan = $this->Bill->getCashier($dulieuhoadon[$i]['AID']);

				$dulieuhoadon[$i]['userid'] = $dulieuthungan[0]['userid'];
				$dulieuhoadon[$i]['username'] = $dulieuthungan[0]['username'];
				$dulieuhoadon[$i]['location'] = $dulieuthungan[0]['location'];

				if($dulieuhoadon[$i]['CID'] != 0){
					$dulieunguoidung = $this->Bill->getCustomer($dulieuhoadon[$i]['CID']);

					$dulieuhoadon[$i]['phone'] = $dulieunguoidung[0]['phone'];
				} else {
					$dulieuhoadon[$i]['phone'] = "Khách lẻ";
					
				}
				$dulieuhoadon[$i]['cuskey'] = "";
				
				$dulieusanpham[$i] = $this->Bill->getProduct($dulieuhoadon[$i]['BID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['quantity'];
				}
				
				$dulieuhoadon[$i]['sumQuantity'] = $sum;
			}

			$sotrang = $this->Bill->soTrang(3);

			
			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieuhoadon' => $dulieuhoadon,
				'dulieusanpham' => $dulieusanpham,
				'sotrang' => $sotrang
			);

			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();

			echo json_encode($dulieu);
		}

		public function timKiemHD()
		{
			$key = $_POST["key"];
			$this->load->model('Admin/Bill');
			$dulieuhoadon = $this->Bill->searchBill($key);


			$tongtien = $this->Bill->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'] + $tongtien[$i]['tientichluy'];
			}

			$dulieusanpham = array();

			for($i = 0; $i < sizeof($dulieuhoadon); $i++) {
				$dulieuthungan = $this->Bill->getCashier($dulieuhoadon[$i]['AID']);

				$dulieuhoadon[$i]['userid'] = $dulieuthungan[0]['userid'];
				$dulieuhoadon[$i]['username'] = $dulieuthungan[0]['username'];
				$dulieuhoadon[$i]['location'] = $dulieuthungan[0]['location'];

				if($dulieuhoadon[$i]['CID'] != 0){
					$dulieunguoidung = $this->Bill->getCustomer($dulieuhoadon[$i]['CID']);

					$dulieuhoadon[$i]['phone'] = $dulieunguoidung[0]['phone'];
				} else {
					$dulieuhoadon[$i]['phone'] = "Khách lẻ";
					
				}
				$dulieuhoadon[$i]['cuskey'] = "";

				$dulieusanpham[$i] = $this->Bill->getProduct($dulieuhoadon[$i]['BID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['quantity'];
				}
				
				$dulieuhoadon[$i]['sumQuantity'] = $sum;
			}

			$sotrang = $this->Bill->soTrang(3);

			
			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieuhoadon' => $dulieuhoadon,
				'dulieusanpham' => $dulieusanpham,
				'sotrang' => $sotrang
			);

			echo json_encode($dulieu);
		}

		public function xoaHoaDon($BID)
		{
			$this->load->model('Admin/Bill');
			$this->Bill->deleteBill($BID);

			$tongtien = $this->Bill->totalPrice();
			$tongtienhang = 0;
			for($i = 0; $i < sizeof($tongtien); $i++){
				$tongtienhang += $tongtien[$i]['totalprice'] + $tongtien[$i]['tientichluy'];
			}

			$dulieuhoadon = $this->Bill->getAllBill();
			
			$dulieusanpham = array();
	
			for($i = 0; $i < sizeof($dulieuhoadon); $i++) {
				$dulieuthungan = $this->Bill->getCashier($dulieuhoadon[$i]['AID']);

				$dulieuhoadon[$i]['userid'] = $dulieuthungan[0]['userid'];
				$dulieuhoadon[$i]['username'] = $dulieuthungan[0]['username'];
				$dulieuhoadon[$i]['location'] = $dulieuthungan[0]['location'];

				if($dulieuhoadon[$i]['CID'] != 0){
					$dulieunguoidung = $this->Bill->getCustomer($dulieuhoadon[$i]['CID']);

					$dulieuhoadon[$i]['phone'] = $dulieunguoidung[0]['phone'];
				} else {
					$dulieuhoadon[$i]['phone'] = "Khách lẻ";
					
				}
				$dulieuhoadon[$i]['cuskey'] = "";

				$dulieusanpham[$i] = $this->Bill->getProduct($dulieuhoadon[$i]['BID']);

				$sum = 0;
				$sumprice = 0;

				foreach ($dulieusanpham[$i] as $key => $value) {
					# code...
					$sum = $sum + $dulieusanpham[$i][$key]['quantity'];
				}
				
				$dulieuhoadon[$i]['sumQuantity'] = $sum;
				$dulieuhoadon[$i]['sumPrice'] = $dulieuhoadon[$i]['totalprice'] + $dulieuhoadon[$i]['tientichluy'];
			}
			$sotrang = $this->Bill->soTrang(3);

			
			$dulieu = array(
				'tongtienhang' => $tongtienhang,
				'dulieuhoadon' => $dulieuhoadon,
				'dulieusanpham' => $dulieusanpham,
				'sotrang' => $sotrang
			);

			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();

			echo json_encode($dulieu);
		}
		// end phần hóa đơn

		// phần thu ngân
		public function quanLyThuNgan()
	  	{
	  		$this->load->model('Admin/Account');
	  		$dulieusanpham = $this->Account->getAllProduct();
	  		$sotrang = $this->Account->soTrang(6);
	  		
	  		$dulieu = array(
	  			'dulieusanpham'=> $dulieusanpham,
	  			'sotrang' => $sotrang
	  		);
	  		$this->load->view('Admin_Cashier1', $dulieu, FALSE);
	  	}

	  	public function page($trang) 
	  	{
	  		$this->load->model('Admin/Account');
	  		$dulieu = $this->Account->loadTNTheoTrang($trang, 6);
	  		$sotrang = $this->Account->soTrang(6);
	  		$dulieu = array(
	  			'dulieusanpham' => $dulieu,
	  			'sotrang' => $sotrang
	  		);

	  		echo json_encode($dulieu);
	  	}

	  	public function checkTenDN($userid) {
	  		$this->load->model('Admin/Account');

	  		$found = FALSE;

	  		if($this->Account->checkAID($userid)) {
	  			$found = TRUE;
				echo $found;
			} else {
				echo $found;
			}
	  	}

	  	public function themThuNgan()
	  	{
	  		$dulieu = array();
			$dulieu['userid'] = $this->input->post('tendn');
			$dulieu['username'] = $this->input->post('tentn');
			$dulieu['password'] = $this->input->post('mk');
			$dulieu['email'] = $this->input->post('email');
			$dulieu['location'] = $this->input->post('location');
			$dulieu['role'] = "thu ngân";
			$dulieu['password'] = md5($dulieu['password']);
			$this->load->model('Admin/Account');
			$this->Account->addCashier($dulieu);

			$dulieusanpham = $this->Account->getAllProduct();
	  		$sotrang = $this->Account->soTrang(6);
	  		
	  		$dulieu = array(
	  			'dulieusanpham'=> $dulieusanpham,
	  			'sotrang' => $sotrang
	  		);

			echo json_encode($dulieu);


			// echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();
			
			// $this->load->model('Admin/Account');

			// if($this->Account->checkAID($dulieu['userid'])) {
			// 	$this->load->view('SaiMatKhau');
			// } else {
			// 	$dulieu['password'] = md5($dulieu['password']);

		 //  		if($this->Account->addCashier($dulieu)) {
		 //  			$this->load->view('Thanhcong');
		 //  		} else {
		 //  			return $sql;
		 //  		}
			// }			
	  	}

	  	public function xoaThuNgan($userid)
	  	{
	  		$this->load->model('Admin/Account');

	  		$this->Account->deleteCashier($userid);

			$dulieusanpham = $this->Account->getAllProduct();
	  		$sotrang = $this->Account->soTrang(6);
	  		
	  		$dulieu = array(
	  			'dulieusanpham'=> $dulieusanpham,
	  			'sotrang' => $sotrang
	  		);

	  		echo json_encode($dulieu);
	  	}

	  	public function chinhSuaThongTin()
	  	{
	  		$userid = $this->input->post('userid');
	  		$tentn = $this->input->post('username');
	  		$email = $this->input->post('email');
	  		$mkcu = $this->input->post('oldpassword');
	  		$mkmoi = $this->input->post('newpassword');
	  		$vitri = $this->input->post('vitri');

	  		$flag = true;
	  		$this->load->model('Admin/Account');
	  		if($mkcu === ""){
	  			$this->Account->editInfo($userid,$tentn,$email,$mkmoi,$vitri);

				$dulieusanpham = $this->Account->getAllProduct();
		  		$sotrang = $this->Account->soTrang(6);
		  		
		  		$dulieu = array(
		  			'dulieusanpham'=> $dulieusanpham,
		  			'sotrang' => $sotrang
		  		);

		  		echo json_encode($dulieu);
	  		} else {
	  			$mkcu = md5($mkcu);
	  			
		  		$dulieu = $this->Account->getCashier($userid);

		  		if($mkcu == $dulieu[0]["password"]) {
		  			$mkmoi = md5($mkmoi);
					$this->Account->editInfo($userid,$tentn,$email,$mkmoi,$vitri);

					$dulieusanpham = $this->Account->getAllProduct();
			  		$sotrang = $this->Account->soTrang(6);
			  		
			  		$dulieu = array(
			  			'dulieusanpham'=> $dulieusanpham,
			  			'sotrang' => $sotrang
			  		);

			  		echo json_encode($dulieu);
		  		} else {
		  			$flag = false;
					echo json_encode($flag);
		  		}
	  		}
	  	}
		// end phần thu ngân

		// phần thống kê
		public function thongKe()
		{
			$this->load->model('Admin/Account');
			$dulieuadmin = $this->Account->getAllProduct();
			$date = getdate();
			
	        $dulieu7ngay = array();
	        $this->load->model('Admin/Statistical');
	        for($i = 0; $i < 7;$i++) {
	        	$currentDate = ($date['mday'] - 7 + $i) . '-0'. $date['mon'];
	        	
	        	$dulieu7ngay[$i]['day'] = $currentDate;
	        	
	        	if($this->Statistical->getInfo($currentDate)) {
	        		$day = $this->Statistical->getInfo($currentDate);
	        		$dulieu7ngay[$i]['totalprice'] = $day[0]['totalprice'];
	        		$dulieu7ngay[$i]['tientichluy'] = $day[0]['tientichluy'];
	        	} else {
	        		$dulieu7ngay[$i]['totalprice'] = 0;
	        		$dulieu7ngay[$i]['tientichluy'] = 0;
	        	}
	        }

	        $month = $this->Statistical->getMonthCurrent($date['mon']);

	        $monCurrent = array();
	        $monCurrent['totalprice'] = 0;
	        $monCurrent['tientichluy'] = 0;
	        for($i = 0; $i < sizeof($month); $i++) {
	        	$monCurrent['totalprice'] += $month[$i]['totalprice'];
	        	$monCurrent['tientichluy'] += $month[$i]['tientichluy'];
	        }

	        $dulieutungthang = array();
	        for($i = 1; $i <= 12; $i++){
	        	$dulieutungthang[$i]['totalprice'] = 0;
	        	$dulieutungthang[$i]['tientichluy'] = 0;
	        	if($this->Statistical->getMonthCurrent($i)) {
	        		$dulieu1thang = $this->Statistical->getMonthCurrent($i);
	        		for($j = 0; $j < sizeof($dulieu1thang); $j++) {
			        	$dulieutungthang[$i]['totalprice'] += $dulieu1thang[$j]['totalprice'];
			        	$dulieutungthang[$i]['tientichluy'] += $dulieu1thang[$j]['tientichluy'];
			        }
	        	}
	        }

	        $dulieucanam = array();
	        $dulieucanam['totalprice'] = 0;
	        $dulieucanam['tientichluy'] = 0;
	        for($i = 1; $i < sizeof($dulieutungthang); $i++) {
	        	$dulieucanam['totalprice'] += $dulieutungthang[$i]['totalprice'];
	        	$dulieucanam['tientichluy'] += $dulieutungthang[$i]['tientichluy'];
	        }

	        $dulieu = array(
	        	'dulieutungthang' => $dulieutungthang,
	        	'dulieu7ngay' => $dulieu7ngay,
	        	'monCurrent' => $monCurrent,
	        	'dulieucanam' => $dulieucanam,
	        	'dulieuadmin' => $dulieuadmin
	        );

	  //       echo "<pre>";
	  //       print_r($dulieu);
	  //       echo "</pre>";
			// die();
			$this->load->view('Admin_ThongKe.php',$dulieu,false);
		}
		// end phần thống kê
	}	
?>