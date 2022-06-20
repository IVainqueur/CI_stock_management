<?php

Class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("User_model");
        // session_write_close();
    }
    public function index(){
        $this->session->set_userdata("userId",null);
        $this->load->view('login', array("title"=>"Login"));
    }

    public function validate(){
        $userInstance = new User_model;
        $user = $userInstance->get_user();

        // print_r($this->input->post("password"));
        // return;
        
        if(empty($user)){
            $this->load->view('login', array("title"=>"Login", "error"=>"Unknown Username"));
            return;
        }

        if(!password_verify($this->input->post("password"), $user[0]->password)){
            $this->load->view('login', array("title"=>"Login", "error"=>"Incorrect Password"));
        }else{
            // $this->session->userId = $user[0]->userId;
            $this->session->set_userdata("userId", $user[0]->userId);
            // var_dump($user[0]->userId);
            redirect(base_url()."products");
        }
        
    }

    public function test(){
    }
}