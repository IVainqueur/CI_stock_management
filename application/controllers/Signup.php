<?php

class Signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("country_model");
        $this->load->model("user_model");
        $this->load->helper(array("url"));
        $this->load->library("form_validation");
    }
    public function index()
    {
        /**
         *  FORM VALIDATION 
         */
        $this->form_validation->set_rules("firstName", "First Name", "trim|required|regex_match[/.{3,}/]");
        $this->form_validation->set_rules("lastName", "Last Name", "trim|required|regex_match[/.{3,}/]");
        $this->form_validation->set_rules("telephone", "Phone number", "trim|required|regex_match[/[0-9+\s]{10,}/]", "Phone number must be at least 10 characters and contain only numbers, space or +");
        $this->form_validation->set_rules("gender", "Gender", "trim|required");
        $this->form_validation->set_rules("nationality", "Nationality", "trim|required");
        $this->form_validation->set_rules("username", "Username", "trim|required|regex_match[/.{3,}/]");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required|regex_match[/.{2,}/]");

        if ($this->form_validation->run() == FALSE) {
            $data["countries"] = $this->db->get("countries");
            $data["title"] = "Signup";
            $this->load->view("signup", $data);
        } else {
            $user = new User_model;
            if ($user->create_user()) {
                redirect(base_url("login"));
            }
            // redirect(base_url()."login");
        }
    }

    public function create()
    {
        $user = new User_model;
        if ($user->create_user()) {
            redirect(base_url("login"));
        }
    }
}
