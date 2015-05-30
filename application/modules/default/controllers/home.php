<?php
class Home extends MainController{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] ="Cuongle Blog";
        $this->_data['loadPage'] ="home/index_view";
        $this->load->view($this->_data['path'],$this->_data);
    }
}