<?php
class User_controller extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model');
                $this->load->helper('url');
                session_start();
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


        public function login(){
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('userName', 'UserName', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                $nickName = $this->input->post('userName');
                $password = $this->input->post('password');
                $password = sha1($password);
                $validation = $this->User_model->validateUser($nickName, $password);
                if ($this->form_validation->run() == false)
                {
                        $this->load->view('login_view');
                }
                else if ($validation != false)
                {        
                        $_SESSION["nickName"] = $nickName;  
                        $_SESSION["idUser"] = $validation["idUser"];
                        $_SESSION["typeUser"] = $validation["typeUser"];         
                        redirect("http://localhost/codeigniter/index.php/home");
                }
        }

        public function logout(){
                session_unset();
                session_destroy();
                redirect("http://localhost/codeigniter/index.php/home");
        }        
}