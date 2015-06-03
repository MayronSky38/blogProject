<?php

class Post_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Post_model");
            $this->load->model("Topic_model");
            $this->load->model("User_model");
            $this->load->helper(array('form', 'url'));
    }

    public function listAllPosts($topicName = null){
    	if($topicName === null){
    		show_404();
    	}
    	else{
    		$data["topic"] = $this->Topic_model->getTopic($topicName);
    		$data["posts"] = $this->Post_model->getPosts($data["topic"]["idTopic"]);
    		for($i = 0; $i < count($data["posts"]); $i++){
    			$data["user"][$i] = $this->User_model->getUser($data["posts"][$i]["fk_idUser"]);
                $data["lastUser"][$i] = $this->User_model->getUser($data["posts"][$i]["user"]);
    		}
    		
    		$this->load->view("posts_view", $data);
    	}
    }


    public function createPost($topicName = null){
        if($topicName === null){
            show_404();
        }
        else{
            $this->load->library('form_validation');
            $this->load->helper('date');
            session_start();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
                   
            $data['topicName'] = $topicName;

            $topicId = $this->Topic_model->getIdTopic($topicName);
            $idTopic = $topicId["idTopic"];
            $data['idTopic'] = $idTopic;
            if ($this->form_validation->run() == false)
            {
                $this->load->view('postCreation_view', $data);
            }
            else 
            {          
                $title = $this->input->post('title');
                $content = $this->input->post('content');

                $postId = $this->Post_model->getLastPostId();
                $lastId = $postId["lastId"];

                $datestring = '%Y-%m-%d %h:%i:%s';
                $time = time();
                $dateTime = mdate($datestring, $time);   

                $result = $this->Post_model->createPost($lastId, $title, $content, $dateTime, $_SESSION["idUser"], $idTopic);
                if($result){
                    redirect("http://localhost/codeigniter/index.php/$topicName/post/$lastId");
                }
                else{
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
                
                redirect("http://localhost/codeigniter/index.php/$topicName");
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
                redirect("http://localhost/codeigniter/index.php/$topicName");
            }
            else{
               ///show message error. 
            }
        }

    }


    public function editPost($idPost = null){
        if($idPost === null){
                show_404();
            }
        else{
            $post = $this->Post_model->getPostInfo($idPost);

            $this->load->library('form_validation'); 
            $this->form_validation->set_rules('content', 'Content', 'required');

            $topicName = $post["name"];

            if ($this->form_validation->run() == false)
            {
                $this->load->view('postEdit_view', $post);
            }
            else 
            {          
                $content = $this->input->post('content');

                $result = $this->Post_model->editPost($idPost, $content);
                if($result){
                    redirect("http://localhost/codeigniter/index.php/$topicName/post/$idPost");
                }
                else{
                    $this->load->view('postEdit_view', $post);
                }

            }
        }
    }


}

?>