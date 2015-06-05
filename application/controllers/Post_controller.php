<?php

class Post_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Post_model");
            $this->load->model("Topic_model");
            $this->load->model("User_model");
            $this->load->model("Coment_model");
            $this->load->helper(array('form', 'url'));
            $this->load->library('pagination');
            $this->load->library('session');
    }

   public function listAllPosts(){
        $config["base_url"] = base_url() . "Post_controller/listAllPosts";
        $config["total_rows"] = $this->Post_model->countPostRows(); 
        $config["per_page"] = 3;
        $config['use_page_numbers'] = TRUE;
        if($this->uri->segment(3)){
            $temp = ($this->uri->segment(3));
        }
        else{
            $temp = 0;
        }
        $page = 0;
        for($i = 1; $i < $temp; $i++){
            $page += $config["per_page"];
        }
        
        $data["post"] = $this->Post_model->listAllPosts($config["per_page"], $page);
        $data["topic"] = $this->Topic_model->listAllTopics();
        $data["title"] = "Blog" ;
        for($i = 0; $i < count($data["post"]); $i++){    
            $data["user"][$i] = $this->User_model->getUser($data["post"][$i]["fk_idUser"]);
            if($data["post"][$i]["lastComent"] != null){
                $data["lastComentUser"][$i] = $this->User_model->getUserByComent($data["post"][$i]["lastComent"], $data["post"][$i]["idPost"]);
            }
            else{
               $data["lastComentUser"][$i] = "No Comments so far."; 
            }
        }

        $this->pagination->initialize($config);
        $links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$links );

        $this->load->view("header", $data);
        $this->load->view("posts_view", $data);       
    }

    public function listAllPostsAdmin(){

    }

    public function listAllPostsByTopic($topicName = null){
    	if($topicName === null){
    		show_404();
    	}
    	else{
    		$data["topic"] = $this->Topic_model->getTopic($topicName);
    		$data["posts"] = $this->Post_model->getPosts($data["topic"]["idTopic"]);
            $data["title"] = "Posts for " ;
    		for($i = 0; $i < count($data["posts"]); $i++){
    			$data["user"][$i] = $this->User_model->getUser($data["posts"][$i]["fk_idUser"]);
                if($data["posts"][$i]["lastComent"] != null){
                   $data["lastComent"][$i] = $this->Coment_model->getComentInfo($data["posts"][$i]["idPost"], $data["posts"][$i]["lastComent"]); 
                }
                else{
                    $data["lastComent"][$i] = array("publicDate" => $data["posts"][$i]["publicDate"], "nickName" => $data["user"][$i]["nickName"]);
                }             
    		}
    		$this->load->view("header");
    		$this->load->view("posts_view", $data);
    	}
    }


    public function createPost(){
        $this->load->library('form_validation');
        $this->load->helper('date');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        $data['title'] = "Blog";
        $data['topic'] = $this->Topic_model->listAllTopics();

        if ($this->form_validation->run() == false)
        {
            $this->load->view('header', $data);
            $this->load->view('postCreation_view', $data);
        }
        else 
        {          
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $topicName = $this->input->post('topicName');

            $postId = $this->Post_model->getLastPostId();
            $lastId = $postId["lastId"];
            $topicId = $this->Topic_model->getIdTopic($topicName);
            $idTopic = $topicId["idTopic"];

            $datestring = '%Y-%m-%d %H:%i:%s';
            $time = time();
            $dateTime = mdate($datestring, $time);  
            $user = $this->session->idUser; 

            $result = $this->Post_model->createPost($lastId, $title, $content, $dateTime, $user, $idTopic);
            if($result){
                redirect(base_url() . "post/$lastId");
            }
            else{
                $this->load->view('header', $data);
                $this->load->view('postCreation_view', $data);
            }
        }
    }


public function editPost($idPost = null){
        if($idPost === null){
                show_404();
            }
        else{
            $data['title'] = "Blog";
            $data['post'] = $this->Post_model->getPostInfo($idPost);
            $data['topic'] = $this->Topic_model->listAllTopics();

            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');

            if ($this->form_validation->run() == false)
            {
                $this->load->view('header', $data);
                $this->load->view('postCreation_view', $data);
            }
            else 
            {          
                $title = $this->input->post('title');
                $content = $this->input->post('content');
                $topicName = $this->input->post('topicName');

                $topicId = $this->Topic_model->getIdTopic($topicName);
                $idTopic = $topicId["idTopic"];

                $result = $this->Post_model->editPost($idPost, $content, $idTopic);
                if($result){
                    redirect(base_url() . "post/$idPost");
                }
                else{
                    $this->load->view('header', $data);
                    $this->load->view('postCreation_view', $data);
                }
            }
        }

    }


    public function deletePost($idPost = null){
        if($idPost === null){
                show_404();
            }
        else{        
            $data = $this->Post_model->getByPostTopicInfo($idPost);
            $topicName = $data['name'];
            $topicId = $data['idTopic'];
            $topicName = strtolower($topicName);
            $result = $this->Post_model->deletePost($idPost);
            if($result){
                
                redirect(base_url("home"));
            }
            else{
               ///show message error. 
            }
        }

    }


    public function banPost($idPost = null, $banned = null){
        if($idPost === null || $banned === null){
                show_404();
            }
        else{        
            $data = $this->Post_model->getByPostTopicInfo($idPost);
            $topicName = $data['name'];
            $topicId = $data['idTopic'];
            $topicName = strtolower($topicName);
            $result = $this->Post_model->banPost($idPost, $banned);
            if($result){            
                redirect(base_url("post/$idPost"));
            }
            else{
               ///show message error. 
            }
        }

    }


}

?>