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


        public function login($idPost = null){
                $this->load->helper('form');

                $this->load->library('form_validation');

                $this->form_validation->set_rules('userName', 'UserName', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                $nickName = $this->input->post('userName');
                $password = $this->input->post('password');
                $password = sha1($password);
                $validation = $this->User_model->validateUser($nickName, $password);
                
                if ($validation != false)
                {        $session_data = array(
                                "nickName" => $nickName,
                                "idUser" =>  $validation["idUser"],
                                "typeUser" => $validation["typeUser"]
                                );
                        $this->session->set_userdata($session_data);

                        if($validation["typeUser"] === "Admin"){
                                if($idPost != null){
                                        //Login from a post with an admin account.
                                        redirect(base_url() . "admin/post/" . $idPost);               
                                }
                                else {
                                        //Login from home with an admin account.
                                        redirect(base_url() . "admin");
                                        
                                } 
                        }
                        else{
                                if($idPost != null){
                                        //Login from a post.
                                        redirect(base_url() . "post/" . $idPost);               
                                }
                                else {
                                        //Login from home.
                                        redirect(base_url() . "home");
                                        
                                } 
                        }                           
                }
                else{
                        $data["title"] = "Login";
                        $data["idPost"] = $idPost;
                        $this->load->view('header', $data);
                        $this->load->view('login_view', $data);     
                }
                
        }


        public function logout($idPost){
                $data = array('nickName', 'idUser', 'typeUser');
                $this->session->unset_userdata($data);

                $this->session->sess_destroy();
                if($idPost != null){
                        //Logout from post.
                        redirect(base_url() . "post/" . $idPost);                    
                }
                else{
                        //Logout from home or post/coment creation/edit.
                        redirect(base_url() . "home");    
                }
        }


}