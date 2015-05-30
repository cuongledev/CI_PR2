<?php
class MainController extends MY_Controller{
    protected $_data;
    public function __construct(){
        parent::__construct();
        $mod = $this->router->fetch_module();
        $this->_data['module'] = $mod;
        $this->_data['path'] ="$mod/template";
        $this->load->model("Mcategorie");
        $this->_data['side_bar']=$this->Mcategorie->listCateParent();
        $config['baseurl'] = base_url()."default/news/viewcate";
        $this->load->library("Menu",$config);
        $this->menu->setMenu($this->Mcategorie->listAllCate());
        $this->_data['menu'] = $this->menu->callMenu();
    }
}