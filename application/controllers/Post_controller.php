<?php

class Post_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Post_model");
            $this->load->model("Topic_model");
            $this->load->model("User_model");
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
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $postId = $this->Post_model->getLastPostId();

            $data['topicName'] = $topicName;
            $lastId = $postId["lastId"];

            $this->Post_model->createPost($topicName, $lastId, $title, $content, $_SESSION["idUser"]);
            if ($this->form_validation->run() == false)
            {
                    $this->load->view('postCreation_view', $data);
            }
            else if ($validation == true)
            {                   
                    redirect("http://localhost/codeigniter/index.php/$topicName/post/$lastId");
            }
        }
    }
}

?>