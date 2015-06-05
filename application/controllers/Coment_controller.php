<?php

class Coment_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Coment_model");
            $this->load->model("Post_model");
            $this->load->helper(array('form', 'url'));
            $this->load->library('pagination');
            $this->load->library('session');    
    }

    public function listAllComents($idPost = null){
    	if($idPost === null){
    		show_404();
    	}
    	else{
            $data["test"] = "value";
    	    $data["coments"] = $this->Coment_model->getComents($idPost);
   		    $data["post"] = $this->Post_model->getPostInfo($idPost);     
            $data["title"] = "Blog";
            $this->load->view("header", $data);
    	    $this->load->view("coments_view", $data);
    	}
    }

    public function createComent($idPost = null){
        if($idPost === null){
            show_404();
        }
        else{   
            $this->load->library('form_validation');
            $this->load->helper('date');
            

            $this->form_validation->set_rules('content', 'Content', 'required');
            
            $data["test"] = "value";
            $data["coments"] = $this->Coment_model->getComents($idPost);
            $data["post"] = $this->Post_model->getPostInfo($idPost);

            if ($this->form_validation->run() == false)
            {
                $data["title"] = "Blog";
                $this->load->view("header", $data);
                $this->load->view('comentCreation_view', $data);
            }
            else 
            {          
                $content = $this->input->post('content');

                $comentId = $this->Coment_model->getLastComentId($idPost);
                $lastId = $comentId["lastId"];
                if($lastId === null){
                    $lastId = 0;
                }

                $datestring = '%Y-%m-%d %H:%i:%s';
                $time = time();
                $dateTime = mdate($datestring, $time);   

                $user = $this->session->idUser;
                $this->Coment_model->createComent($lastId, $idPost, $content, $dateTime, $user);
                redirect(base_url("post/$idPost"));
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
                
                redirect(base_url("post/$idPost"));
            }
            else{
               ///show message error. 
            }
        }

    }

    public function banComent($idPost = null, $idComent = null, $banned = null){
        if($idPost === null || $idComent === null || $banned === null){
            show_404();
        }
        else{
            $data = $this->Post_model->getByPostTopicInfo($idPost);
            $topicName = $data['name'];

            $result = $this->Coment_model->banComent($idPost, $idComent, $banned);
            if($result){
                
                redirect(base_url("post/$idPost"));
            }
            else{
               ///show message error. 
            }
        }
    }


    public function editComent($idPost = null, $idComent = null){
        if($idPost === null || $idComent === null){
            show_404();
        }
        else{   
            $this->load->library('form_validation');
            $this->load->helper('date');
            

            $this->form_validation->set_rules('content', 'Content', 'required');
                   
            $data["coments"] = $this->Coment_model->getComents($idPost);
            $data["post"] = $this->Post_model->getPostInfo($idPost);
            $data["comentToEdit"] = $this->Coment_model->getComentInfo($idPost, $idComent);

            if ($this->form_validation->run() == false)
            {
                $data["title"] = "Blog";
                $this->load->view("header", $data);
                $this->load->view('comentCreation_view', $data);
            }
            else 
            {          
                $content = $this->input->post('content');  

                $this->Coment_model->editComent($idPost, $idComent, $content);
                redirect(base_url("post/$idPost"));
            }
        }
    }


}

?>