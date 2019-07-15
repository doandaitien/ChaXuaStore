<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * 
	 */
	class Statistical extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->database();
		}

		public function getInfo($date)
		{
			$sql = "select * from bill where time LIKE '".$date."%'";

			$result = $this->db->query($sql);
			$result = $result->result_array();
			return $result;
		}

		public function getMonthCurrent($mon)
		{
			$sql = "select * from bill where time LIKE '%-0".$mon."-%'";
			$result = $this->db->query($sql);
			$result = $result->result_array();
			return $result;
		}
	}

?>