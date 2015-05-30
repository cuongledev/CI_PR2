<?php
class News extends AdminController{
    public function __construct(){
        parent::__construct();
        session_start();
        $user = $this->session->userdata("username");
        $_SESSION['KCFINDER']['disabled'] = false;
        $_SESSION['KCFINDER']['uploadURL'] =base_url()."uploads/$user";
    }
    public function index(){
        $this->_data['title'] ="List All News";
        $this->_data['loadPage'] ="news/index_view";
        $this->load->model("Mnews");
        // phân trang 
        $config['base_url'] = base_url()."admin/news/index";
        $config['total_rows'] = $this->Mnews->countAll();
        $config['per_page'] = 3; 
        $config['uri_segment'] = 4;
        $this->load->library('pagination',$config);
        $this->_data['page_link'] = $this->pagination->create_links();
        $start = $this->uri->segment(4);
        $this->_data['info'] = $this->Mnews->listAllNews($config['per_page'],$start);
        $this->_data['mess'] = $this->session->flashdata("flash_mess");
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function add(){
        $checkImage=TRUE;   
        $this->load->helper("menu");
        $this->load->model("Mcategorie");
        $this->_data['menu'] = $this->Mcategorie->listAllCate();
        $this->_data['title'] ="Add News";
        $this->_data['loadPage'] ="news/add_view";
        $this->load->library("form_validation");
        $this->form_validation->set_rules("txttitle","News title","required");
        $this->form_validation->set_rules("txtau","News Author","required");
        $this->form_validation->set_rules("txtinfo","News Info","required");
        $this->form_validation->set_rules("txtdetail","News Detail","required");
        if($this->form_validation->run() == TRUE){
            $config['upload_path'] = './uploads/news_main/';
    		$config['allowed_types'] = 'gif|jpg|png';
    		$config['max_size']	= '100';
    		$config['max_width']  = '1024';
    		$config['max_height']  = '768';
            $this->load->library("upload",$config);
            if($this->upload->do_upload("img")){
                $image =$this->upload->data();
                $dataInsert = array(
                    "news_title"=>$this->input->post("txttitle"),
                    "news_author"=>$this->input->post("txtau"),
                    "news_info"=>$this->input->post("txtinfo"),
                    "news_full"=>$this->input->post("txtdetail"),
                    "cate_id"=>$this->input->post("cate"),
                    "news_img"=>$image['file_name'],
                    "id"=>$this->session->userdata("id"),
                );
                if($_FILES['img']['name'] != ""){
				$config['upload_path'] = './uploads/news_main/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '600';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$this->load->library('upload', $config);
				if($this->upload->do_upload("img")){
					$image= $this->upload->data();
					$dataInsert['news_img']=$image['file_name'];
				}else{
					$this->_data['error']= $this->upload->display_errors();
					$checkImage=FALSE;
				}
    			}
    			if($checkImage == TRUE){
    					$this->load->model("Mnews");
                        $this->Mnews->insertNews($dataInsert);
                        $this->session->set_flashdata("flash_mess","Thêm Thành Công !");
                        redirect(base_url()."admin/news");			
    			}
            }else{
                $this->_data['error']= $this->upload->display_errors();
            }
        }
        $this->load->view($this->_data['path'],$this->_data);
    }
    public function del(){
        $id = $this->uri->segment(4);
        $this->load->model("Mnews");
        $this->Mnews->delNews($id);
        $this->session->set_flashdata("flash_mess","Xóa user $id thành công ! ");
        redirect(base_url()."admin/news/index");
    }
    public function edit(){
        $checkImage = TRUE;
        $id = $this->uri->segment(4);
        $this->load->model("Mnews");
        $this->load->model("Mcategorie");
        $this->load->helper("menu");
        $this->load->library("form_validation");
        $this->_data['menu'] = $this->Mcategorie->listAllCate();
        $this->_data['title'] ="Edit A News";
        $this->_data['loadPage'] ="news/edit_view";
        $this->_data['info'] = $this->Mnews->getNewsById($id);
        $this->form_validation->set_rules("txttitle","News title","required");
        $this->form_validation->set_rules("txtau","News Author","required");
        $this->form_validation->set_rules("txtinfo","News Info","required");
        $this->form_validation->set_rules("txtdetail","News Detail","required");
        if($this->input->post("ok")){
            if($this->form_validation->run() == TRUE){
                $config['upload_path'] = './uploads/news_main/';
        		$config['allowed_types'] = 'gif|jpg|png';
        		$config['max_size']	= '600';
        		$config['max_width']  = '1024';
        		$config['max_height']  = '768';
                $this->load->library("upload",$config);
                if($this->upload->do_upload("img")){
                    $image =$this->upload->data();
                    $dataUpdate = array(
                        "news_title"=>$this->input->post("txttitle"),
                        "news_author"=>$this->input->post("txtau"),
                        "news_info"=>$this->input->post("txtinfo"),
                        "news_full"=>$this->input->post("txtdetail"),
                        "cate_id"=>$this->input->post("cate"),
                        "news_img"=>$image['file_name'],
                    );
                    if($_FILES['img']['name'] != ""){
    				$config['upload_path'] = './uploads/news_main/';
    				$config['allowed_types'] = 'gif|jpg|png';
    				$config['max_size']	= '600';
    				$config['max_width']  = '1024';
    				$config['max_height']  = '768';
    				$this->load->library('upload', $config);
    				if($this->upload->do_upload("img")){
    					$image= $this->upload->data();
    					$dataInsert['news_img']=$image['file_name'];
    				}else{
    					$this->_data['error']= $this->upload->display_errors();
    					$checkImage=FALSE;
    				}
        			}
        			if($checkImage == TRUE){
        					$this->load->model("Mnews");
                            $this->Mnews->updateNews($dataUpdate,$id);
                            $this->session->set_flashdata("flash_mess","Sửa Thành Công !");
                            redirect(base_url()."admin/news");			
        			}
                }
            }
        }
        $this->load->view($this->_data['path'],$this->_data);
        }
    
    
    
    
}