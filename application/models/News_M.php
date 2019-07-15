<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_M extends CI_Model{

    public function getNewsM(){
        $this->db->select('*');
        $news=$this->db->get('news');
        $news=$news->result_array();
        return $news;
    }

}