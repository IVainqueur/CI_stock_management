<?php

class Signup extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("country_model");
        $this->load->model("user_model");
        $this->load->helper("url");
    }
    public function index(){
        $data["countries"] = $this->db->get("countries");
        $data["title"] = "Signup";
        $this->load->view("signup", $data);
    }

    public function create(){
        $user = new User_model;
        if($user->create_user()){
            redirect(base_url("login"));
        }
    }
}