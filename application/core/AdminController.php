<?php
class AdminController extends MY_Controller{
    protected $_data;
    public function __construct(){
        parent::__construct();
        $mod = $this->uri->segment(1);
        $this->_data['module'] = $mod;
        $this->_data['path'] ="$mod/template";
        if($this->session->userdata("level") != 1 && $this->uri->segment(2) != "verify"){
            redirect(base_url()."admin/verify/login");
        }
    }
}