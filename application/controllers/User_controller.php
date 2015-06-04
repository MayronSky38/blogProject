<?php
class User_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model');
                $this->load->helper('url');
                $this->load->library('session');
        }

        public function index()
        {
                $data['user'] = $this->User_model->getUser();
                $data['title'] = 'Users Archive';

                $this->load->view('users/showUsers', $data);
        }

        public function view($idUser = NULL)
        {
                $data['user_item'] = $this->User_model->getUser($idUser);

                if (empty($data['user_item']))
                {
                        show_404();
                }

                $data['title'] = "User Info";

                $this->load->view('users/showUser', $data);
        }


        public function login($topicName = null, $idPost = null){
                $this->load->helper('form');

                $this->load->library('form_validation');

                $this->form_validation->set_rules('userName', 'UserName', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                $nickName = $this->input->post('userName');
                $password = $this->input->post('password');
                $password = sha1($password);
                $validation = $this->User_model->validateUser($nickName, $password);

                if ($this->form_validation->run() == false)
                {
                        $data["title"] = "Login";
                        $this->load->view('header', $data);
                        $this->load->view('login_view');
                }
                else if ($validation != false)
                {        $session_data = array(
                                "nickName" => $nickName,
                                "idUser" =>  $validation["idUser"],
                                "typeUser" => $validation["typeUser"]
                                );
                        $this->session->set_userdata($session_data);
                        
                        if($topicName === null && $idPost === null){
                                //Login from topic list.
                                redirect(base_url() . "home");
                        }
                        else if ($idPost === null && $topicName != null){
                                ///Login from post list.
                                redirect("http://localhost/codeigniter/index.php/$topicName");
                        }
                        else if($idPost != null && $topicName != null){
                                //Login from coments list.
                                redirect("http://localhost/codeigniter/index.php/$topicName/post/$idPost");
                        }
                        else{
                                //At any case, return to home.
                                redirect(base_url() . "home");
                        }        
                        
                }
        }

        public function logout($topicName = null, $idPost = null){
                session_unset();
                session_destroy();
                if($topicName === null && $idPost === null){
                        //Login from topic list.
                        redirect("http://localhost/codeigniter/index.php/home");
                }
                else if ($idPost === null && $topicName != null){
                        ///Login from post list.
                        redirect("http://localhost/codeigniter/index.php/$topicName");
                }
                else if($idPost != null && $topicName != null){
                        //Login from coments list.
                        redirect("http://localhost/codeigniter/index.php/$topicName/post/$idPost");
                }
                else{
                        //At any case, return to home.
                        redirect("http://localhost/codeigniter/index.php/home");
                } 
        }  


}