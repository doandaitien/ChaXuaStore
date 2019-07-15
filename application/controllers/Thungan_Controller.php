<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Thungan_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Product');
		$this->load->model('Topping');
		$this->load->model('Customer');
		$product = $this->Product->getAllProduct();
		$cate = $this->Product->getCategories();
		$topping = $this->Topping->getAllTopping();
		$customer = $this->Customer->getAllCustomer();
		$dulieu = array(
		    'product' => $product,
		    'categories' => $cate,
		    'topping' => $topping,
		    'customer' => $customer
		);
		$this->load->view('Thungan_view',$dulieu,false);

	}

	public function ThemDiemTichLuy()
	{
		$CID = $this->input->post('CID');
		$tichluythem = $this->input->post('tichluythem');

		$this->load->model('Customer');
		echo $this->Customer->addPoint($CID,$tichluythem);
	}

	public function TruDiemTichLuy()
	{
		$CID = $this->input->post('CID');
		$trudiemtichluy = $this->input->post('trudiemtichluy');

		$this->load->model('Customer');
		echo $this->Customer->minusPoint($CID,$trudiemtichluy);
	}
	

	public function ThemBill()
	{
		$CID = $this->input->post('CID');
		$AID = $this->input->post('AID');
		$total_price = $this->input->post('total_price');
		$dungdiemtichluy = $this->input->post('dungdiemtichluy');
		$typepay = $this->input->post('typepay');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$time=date("d-m-Y h:i:s",time());

		$this->load->model('Bill');
		echo $this->Bill->addBill($CID,$AID,$time,$total_price,$dungdiemtichluy,$typepay);
	}

	public function ThemProductBill()
	{
		$BID = $this->input->post('BID');
		$PID = $this->input->post('PID');
		$amount = $this->input->post('amount');
		$quantity = $this->input->post('quantity');

		$this->load->model('ProductBill');
		echo $this->ProductBill->addProductBill($BID,$PID,$amount,$quantity);

	}

	public function ThemToppingBill()
	{
		$PBID = $this->input->post('PBID');
		$TID = $this->input->post('TID');

		$this->load->model('ToppingBill');
		echo $this->ToppingBill->addToppingBill($PBID,$TID);
	}


	public function getAllCustomer()
	{
		$this->load->model('Customer');
		echo json_encode($this->Customer->getAllCustomer());
	}

	public function getName()
	{
		$userid = $this->input->post('userid');
		$this->load->model('Account');
		echo $this->Account->getName($userid);
	}

	public function getLastBill()
	{
		$this->load->model('Bill');
		echo $this->Bill->getLastBill();
	}

	public function getFullName()
	{
		$userid = $this->input->post('userid');
		$this->load->model('Account');
		echo $this->Account->getFullName($userid);
	}

	
}

/* End of file Thungan_Controller.php */
/* Location: ./application/controllers/Thungan_Controller.php */