<?php
class Categorie extends AdminController{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->helper("menu");
        $this->load->model("Mcategorie");
        $this->_data['title'] ="List Categorie";
        $this->_data['loadPage'] ="cate/index_view";
        $this->_data['info'] = $this->Mcategorie->listAllCate();
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function del(){
        $id =$this->uri->segment(4);
        $this->load->model("Mcategorie");
        $this->Mcategorie->deleteId($id);
        $this->session->set_flashdata("flash_mess","Deleted");
        redirect(base_url()."admin/categorie/index");
    }
    public function add(){
        $name = $this->input->post("name");
        $pa = $this->input->post("cate");
        if($name != ""){
        $data = array(
            "cate_title" => $name,
            "cate_parent" => $pa,
        );
        $this->load->model("Mcategorie");
        $this->Mcategorie->insertCate($data);
        echo "Success !";
        }else{
            echo "1"
            ;
        }
    }
    public function reload(){
        $this->load->model("Mcategorie");
        $this->_data['info'] = $this->Mcategorie->listAllCate();
        $this->load->view("cate/reload_view",$this->_data);
    }
    public function edit(){
        $this->load->helper("menu");
        $this->load->library("form_validation");
        $this->_data['title'] ="Edit A Categorie";
        $id=$this->uri->segment(4);
        $this->load->model("Mcategorie");
        $this->_data['loadPage'] ="cate/edit_view";
        $this->form_validation->set_rules("txtcate","Categorie dang b? tr?ng !","required");
        if($this->form_validation->run() == TRUE){
            $data = array(
                "cate_title" => $this->input->post("txtcate"),
                "cate_parent" =>$this->input->post("cate"),
            );
            $this->Mcategorie->updateCate($data,$id);
            $this->_data['mess' ]= $this->session->set_flashdata("flash_mess","Updated");
            redirect(base_url()."admin/categorie/index");
        }
        $this->_data['info']=$this->Mcategorie->editCategorie($id);
        $this->_data['menu'] =$this->Mcategorie->listAllCate();
        $this->load->view($this->_data['path'],$this->_data);
    }
}

























