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

    public function listAllPosts($idTopic = null){
    	if($idTopic === null){
    		show_404();
    	}
    	else{
    		$data["topic"] = $this->Topic_model->getTopic($idTopic);
    		$data["posts"] = $this->Post_model->getPosts($idTopic);
    		for($i = 0; $i < count($data["posts"]); $i++){
    			$data["user"][$i] = $this->User_model->getUser($data["posts"][$i]["fk_idUser"]);
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

            $result = $this->Post_model->deletePost($idPost);
            if($result){
                
                redirect("http://localhost/codeigniter/index.php/$topicName/$topicId");
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

            $result = $this->Post_model->banPost($idPost, $banned);
            if($result){            
                redirect("http://localhost/codeigniter/index.php/$topicName/$topicId");
            }
            else{
               ///show message error. 
            }
        }

    }


}

?>