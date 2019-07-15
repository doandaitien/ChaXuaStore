<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_C extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		#Tải thư viện  và helper của Form trên CodeIgniter
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','session'));
		
		#Tải model
		$this->load->model('Customer_M');
		$this->load->model('Product_M');
		$this->load->model('Order_M');
		$this->load->model('News_M');

	}
	
	public function index()
	{
		$group1=$this->Product_M->getProductM("tstt");
		$group2=$this->Product_M->getProductM("tsvhq");
		$group3=$this->Product_M->getProductM("dx");
		$group4=$this->Product_M->getProductM("tdl");
		$group5=$this->Product_M->getProductM("thq");
		$group6=$this->Product_M->getProductM("hqt");
		$news=$this->News_M->getNewsM();
		$product=array('key1'=>$group1,
						'key2'=>$group2,
						'key3'=>$group3,
						'key4'=>$group4,
						'key5'=>$group5,
						'key6'=>$group6,
						'news'=>$news,
					);


		$this->load->view('Home_V',$product);
	}

	//load view hóa đơn tạm thời trường hợp thanh toán khi nhận hàng
	public function billV($OID){
		//set mới
		// $OID=strval($OID);
		// setcookie("OID",$OID,time() +86400, "/"); 
		$data = array('OID' => $OID);
		$this->load->view('Bill_V',$data);
	}

	//load view đăng ký thành viên
	public function registerV(){
		$this->load->view('Register_V');
	}

	//load view giỏ hàng
	public function cartV(){
		$this->load->view('Cart_V');
	}	
	
	//load view tin tức
	public function newsV(){
		$this->load->view('News_V');
	}

	// xử lý đăng ký thành viên
	public function registerC(){
		$phone =$this->input->post('phone');
		$name =$this->input->post('name');
		$check=$this->Customer_M->checkInfoM($phone);
		if(!$check){
			$this->Customer_M->registerM($phone,$name);
			$this->load->view('Success_V');
		}else{
			$this->load->view('Error_V');
		}
	}

	public function addToCartC(){
		//$key luôn tăng trong một cookie, dùng để phân biệt các sản phẩm trong giỏ hàng
		if(isset($_COOKIE["key"])&&isset($_COOKIE["cart"])) {
			//xử lý với những sản phẩm thêm tiếp sau
			$PID = $this->input->post('PID');
			$stringkey=$_COOKIE["key"];
			$key=(int)$stringkey;
			$key+=1;
			$stringkey=strval($key);
			setcookie("key",$stringkey,time() + (86400 * 30), "/");// set cookie cho toàn bộ trang web, 30 days

			$cart=json_decode($_COOKIE['cart'], true);
			$cart[$stringkey]=$PID;
			setcookie('cart', json_encode($cart), time() + (86400 * 30),"/");
		}else{
			//Khởi đầu khi thêm sản phẩm đầu tiên vào giỏ
			$PID = $this->input->post('PID');
			$key=1;
			$stringkey=strval($key);
			setcookie("key",$stringkey,time() + (86400 * 30), "/");

			$cart[$stringkey]=$PID;
			setcookie('cart', json_encode($cart), time() + (86400 * 30),"/");
		}
	}

	//xóa sản phẩm khỏi giỏ hàng
	public function removeFromCartC($intkey){
		if(isset($_COOKIE["key"])&&isset($_COOKIE["cart"])) {
			$cart=json_decode($_COOKIE['cart'], true);
			$stringkey=strval($intkey);
			unset($cart[$stringkey]);
			setcookie('cart', json_encode($cart), time() + (86400 * 30),"/");
			redirect(base_url('index.php/Home_C/cartV'));
		}
	}

	//xác thực customer key
	public function validateCodeC(){
		$sdt=$this->input->post('sdt');
		$point=$this->Customer_M->getPoint($sdt);
		if($point!=null){
			echo $point;
		}else{
			echo "1000";
		} 
	}

	//thêm hóa đơn
	public function addOrderC(){
		$addrcus = $this->input->post('addrcus');
		$phonecontact = $this->input->post('phonecontact');
		$note = $this->input->post('note');
		$code = $this->input->post('code');
		$typepay = $this->input->post('typepay');
		$totalprice = $this->input->post('totalprice');
		$km	 = $this->input->post('km');
		$statement=$this->input->post('statement');// 1=> order, 2=>delivery, 3=> success, 4 =>fail
		$totalpriceafter = $this->input->post('totalpriceafter');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$time=date("d-m-Y h:i:sa",time());
		$OID=$this->Order_M->addOrderM($time,$statement,$typepay,$addrcus,$phonecontact,$code,$km,$totalprice,$totalpriceafter,$note);
		echo $OID;
	}
	
	//liên kết 1 sản phẩm trong 1 hóa đơn
	public function addProductOrderC(){
		$PID = $this->input->post('PID');
		$OID = $this->input->post('OID');
		$sugar = $this->input->post('sugar');
		$ice = $this->input->post('ice');
		$amount = $this->input->post('amount');
		$totalpriceItem=$this->input->post('totalpriceItem');
		$POID=$this->Order_M->addProductOrderM($PID,$OID,$sugar,$ice,$amount,$totalpriceItem);
		echo $POID;
	}

	//liên kết topping của sản phẩm trong 1 hóa đơn 
	public function addToppingProductOrderC(){
		$POID = $this->input->post('POID');
		$TID = $this->input->post('TID');
		$this->Order_M->addToppingProductOrderM($POID,$TID);
	}

	//load view kết quả trả về thanh toán trực tuyến
	public function drV(){
		$this->load->view('dr');
	}

	//load do.php, do.php sẽ tự động chuyển sang trang thanh toán chọn ngân hàng
	public function doV(){
		$this->load->view('do');
	}

	//chuyển sang view thanh toán onepay
	public function onepayV($OID){
		$data = array('OID' => $OID);
		$this->load->view('OnePay_V',$data);
	}

	public function Login()
	{
		$this->session->unset_userdata('admin_username');
		$this->session->unset_userdata('admin_password');
		$this->session->unset_userdata('user_username');
		$this->session->unset_userdata('user_password');
		$this->load->view('Login');
	}

	public function SignIn()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user_info['user_username'] = $this->input->post('username');
		$user_info['user_password'] = $this->input->post('password');

		$admin_info['admin_username'] = $this->input->post('username');
		$admin_info['admin_password'] = $this->input->post('password');

		$this->load->model('Account');
		$info =  $this->Account->SignIn($username,$password);
		
		if($info == 'thu ngân')
		{
			$this->session->unset_userdata('admin_username');
			$this->session->unset_userdata('admin_password');
			$this->session->set_userdata($user_info);
			echo 'TN';

		}
		else if($info == 'admin')
		{
			$this->session->unset_userdata('user_username');
			$this->session->unset_userdata('user_password');
			$this->session->set_userdata($admin_info);
			echo 'ADMIN';
		}
		else{
			echo 'thatbai';
		}
	}

	


}