<?php
class User extends AdminController{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->_data['title'] ="List User Admin - index";
        $this->_data['loadPage'] ="user/index_view";
        $this->load->model("Muser");
        // phân trang 
        $config['base_url'] = base_url()."admin/user/index";
        $config['total_rows'] = $this->Muser->countAll();
        $config['per_page'] = 3; 
        $config['uri_segment'] = 4;
        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['info'] = $this->Muser->listUser($config['per_page'],$start);
        $this->_data['mess'] = $this->session->flashdata("flash_mess");
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function add(){
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this;
        $this->_data['title'] = "Add user";
        $this->_data['loadPage']="user/add_view";
        $this->form_validation->set_rules("username","Tên đăng nhập","required|min_length[4]|callback_check_user");
        $this->form_validation->set_rules("password","Mật khẩu","required|matches[password2]|min_length[4]");
        $this->form_validation->set_rules("email","Email","required|valid_email|callback_check_email");
        
        if($this->form_validation->run() == TRUE){
            $data_insert = array(
                "username" =>$this->input->post("username"),
                "password" =>md5($this->input->post("password")),
                "email" =>$this->input->post("email"),
                "level" =>$this->input->post("level"),
            );
            $this->load->model("Muser");
            $this->Muser->insertData($data_insert);
            $this->session->set_flashdata("flash_mess","Thêm thành công !");
            
            redirect(base_url()."admin/user/index");
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function check_user($user){
        $this->load->model("Muser");
        $id= $this->uri->segment(4);
        if($this->Muser->checkUserName($user,$id) == FALSE){
            $this->form_validation->set_message("check_user","Your username has been registerted , please try again !");
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function check_email($email){
        $this->load->model("Muser");
        $id= $this->uri->segment(4);
        if($this->Muser->checkEmail($email,$id) == FALSE){
            $this->form_validation->set_message("check_email","Your Email has been registerted , please try again !");
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function del(){
        $id = $this->uri->segment(4);
        $this->load->model("Muser");
        $this->Muser->delUser($id);
        $this->session->set_flashdata("flash_mess","Xóa user $id thành công ! ");
        redirect(base_url()."admin/user/index");
    }
    public function edit(){
        $id = $this->uri->segment(4);
        $this->load->model("Muser");
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->CI =& $this;
        $this->_data['title'] = "Edit user";
        $this->_data['loadPage']="user/edit_view";
        $this->_data['info'] = $this->Muser->getUserById($id);
        $this->load->view($this->_data['path'],$this->_data);
        $this->form_validation->set_rules("username","Tên đăng nhập","required|min_length[4]|callback_check_user");
        $this->form_validation->set_rules("password","Mật khẩu","matches[password2]|min_length[4]");
        $this->form_validation->set_rules("email","Email","required|valid_email|callback_check_email");
        if($this->form_validation->run() == TRUE){
            $data_update = array(
                "username" => $this->input->post("username"),
                "level" => $this->input->post("level"),
                "email" => $this->input->post("email"),
            );
            if($this->input->post("password")){
                $data_update['password'] = md5($this->input->post("password"));
            }
            $this->session->set_flashdata("flash_mess","Cập nhập thành công user $id");
            $this->Muser->updateUser($data_update,$id);
            redirect(base_url()."admin/user/index");
        }
    }
}

























