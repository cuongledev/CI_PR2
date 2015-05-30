<?php
class News extends MainController{
    public function __construct(){
        parent::__construct();
        $this->load->helper("seourl");
    }
    public function index(){
        $this->_data['title'] ="Cuongle Blog";
        $this->_data['loadPage'] ="news/index_view";
        $this->load->model("Mnews");
        $this->_data['info'] = $this->Mnews->callNews();
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function detail($id){
        $this->_data['loadPage'] ="news/detail_view";
        $this->load->model("Mnews");
        $data=$this->Mnews->getNewsById($id);
        $this->_data['title'] =$data['news_title'];
        $this->_data['info']=$data;
        $this->_data['order'] = $this->Mnews->listOrderNews($id,$data['cate_id']);
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function viewcate($id){
        $this->_data['loadPage'] ="news/viewcate_view";
        $this->load->model("Mnews");
        $data = $this->Mnews->getNewsByCateId($id);
        if($data != false){
            $this->_data['title'] =$data[0]['cate_title'];
        }else{
            $this->_data['title'] ="Categorie Title Page";
        }
        $this->_data['info'] = $data;
        $this->load->view($this->_data['path'],$this->_data);
    }
}