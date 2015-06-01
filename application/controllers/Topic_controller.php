<?php


class Topic_controller extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Topic_model');
    }


    public function listAllTopics(){
    	$data["topic"] = $this->Topic_model->getTopics();
    	$data["title"] = "Welcome to the Blog!";
    	$this->load->view("topic_view", $data);
    }

}

?>