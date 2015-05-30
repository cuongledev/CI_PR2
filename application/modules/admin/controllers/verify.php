<?php
class Verify extends AdminController{
    public function __construct(){
        parent::__construct();
    }
    public function login(){
        $this->_data['title'] ="Login page";
        $this->_data['loadPage'] ="verify/login_view";
        $this->_data['error'] ="";
        if($this->input->post("ok")){
            $u = $this->input->post("txtuser");
            $p = md5($this->input->post("txtpass"));
            $this->load->model("Muser");
            $data = $this->Muser->checkLogin($u,$p);
            if($data == FALSE){
                $this->_data['error'] = "Wrong username or password !";
            }else{
                $sess = array(
                    "username" => $data['username'],
                    "id" => $data['id'],
                    "level" => $data['level'],
                );
                $this->session->set_userdata($sess);
                $this->session->set_flashdata("flash_mess","Success");
                redirect(base_url()."admin/index/index");
            }
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function logout(){
        $this->session->sess_destroy();
        session_start();
        session_destroy();
        redirect(base_url()."admin/verify/login");
    }   
}
    
    