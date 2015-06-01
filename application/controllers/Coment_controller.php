<?php

class Coment_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Coment_model");
            $this->load->model("Post_model");
            $this->load->helper(array('form', 'url'));
    }

    public function listAllComents($idPost = null){
    	if($idPost === null){
    		show_404();
    	}
    	else{
    	   $data["coments"] = $this->Coment_model->getComents($idPost);
   		   $data["post"] = $this->Post_model->getPostInfo($idPost);
    	   $this->load->view("coments_view", $data);
    	}
    }

    public function createComent($topicName = null, $idPost = null){
        if($topicName === null || $idPost === null){
            show_404();
        }
        else{   
            $this->load->library('form_validation');
            $this->load->helper('date');
            

            $this->form_validation->set_rules('content', 'Content', 'required');
                   
            $data['topicName'] = $topicName; 
            $postData = $this->Post_model->getPostInfo($idPost);
            $data['postTitle'] = $postData['title'];
            $data['idPost'] = $idPost;

            $comentId = $this->Coment_model->getLastComentId($idPost);
            $lastId = $comentId["lastId"];
            if($lastId === null){
                $lastId = 0;
            }
            if ($this->form_validation->run() == false)
            {
                    $this->load->view('comentCreation_view', $data);
            }
            else 
            {          
                $content = $this->input->post('content');


                $datestring = '%Y-%m-%d %h:%i:%s';
                $time = time();
                $dateTime = mdate($datestring, $time);   

                session_start();
                $this->Coment_model->createComent($lastId, $idPost, $content, $dateTime, $_SESSION["idUser"]);
                redirect("http://localhost/codeigniter/index.php/$topicName/post/$idPost");
            }
        }
    }


    public function deleteComent($idPost = null, $idComent = null){
        if($idPost === null || $idComent === null){
            show_404();
        }
        else{
            $data = $this->Post_model->getByPostTopicInfo($idPost);
            $topicName = $data['name'];

            $result = $this->Coment_model->deleteComent($idPost, $idComent);
            if($result){
                
                redirect("http://localhost/codeigniter/index.php/$topicName/post/$idPost");
            }
            else{
               ///show message error. 
            }
        }

    }


}

?>