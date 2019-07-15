<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer_M extends CI_Model{

    public function checkInfoM($phone){
        $check=$this->db->select()->where('phone',$phone)->get('customer')->row_array();
        if($check>0){
            return true;
        }else{
            return false;
        }
    }

    public function registerM($phone,$name){
        $sql="insert into customer values (null,'".$phone."',0,'".$name."')";
        $this->db->query($sql);
    }

    public function getPoint($sdt){
       $row=$this->db->where('phone',$sdt)->get('customer')->row();
       return $row->point;
    }

}