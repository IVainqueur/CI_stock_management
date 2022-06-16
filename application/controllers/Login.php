<?php

Class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("User_model");
    }
    public function index(){
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
            echo "Welcome in!";
        }
        
    }

    public function test(){
    }
}