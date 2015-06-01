<?php

class Coment_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model("Coment_model");
            $this->load->model("Post_model");
    }

    public function listAllComents($idPost = null){
    	if($idPost === null){
    		show_404();
    	}
    	else{
    		$data["coments"] = $this->Post_model->getAllInfo($idPost);
   		
    		$this->load->view("coments_view", $data);
    	}
    }
}

?>