<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_M extends CI_Model{
    public function addOrderM($time,$statement,$typepay,$addrcus,$phonecontact,$code,$km,$totalprice,$totalpriceafter,$note){
        $dulieu['time']=$time;
        $dulieu['statement']=$statement;
        $dulieu['typepay']=$typepay;
        $dulieu['addrcus']=$addrcus; 
        $dulieu['phonecontact']=$phonecontact; 
        $dulieu['code']=$code; 
        $dulieu['km']=$km; 
        $dulieu['totalprice']=$totalprice; 
        $dulieu['totalpriceafter']=$totalpriceafter; 
        $dulieu['note']=$note;  
        $this->db->insert('Orders', $dulieu);

        $last_row = $this->db->order_by('OID',"desc")
            ->limit(1)
            ->get('orders')
            ->row();
        return $last_row->OID;
    }

    public function addProductOrderM($PID,$OID,$sugar,$ice,$amount,$totalpriceItem){
        $dulieu['PID']=$PID;
        $dulieu['OID']=$OID;
        $dulieu['sugar']=$sugar;
        $dulieu['ice']=$ice;
        $dulieu['amount']=$amount;
        $dulieu['totalpriceItem']=$totalpriceItem;  
        $this->db->insert('product_order', $dulieu);
        
        $last_row = $this->db->order_by('POID',"desc")->where('OID',$OID)
            ->limit(1)
            ->get('product_order')
            ->row();
        return $last_row->POID;
    }

    public function addToppingProductOrderM($POID,$TID){
        $dulieu['POID']=$POID;
        $dulieu['TID']=$TID;
        $this->db->insert('topping_product_order', $dulieu);
    }
}