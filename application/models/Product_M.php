<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_M extends CI_Model{
    public function getProductM($group){
        $this->db->select('*')->where('GID',$group);
        $product=$this->db->get('product');
        $product=$product->result_array();
        return $product;
    }
}