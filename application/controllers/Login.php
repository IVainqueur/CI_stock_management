<?php

require("Libraries/Mailgun/Mailgun.php");
use Mailgun\Mailgun;
use Mailgun\HttpClient\HttpClientConfigurator;

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("User_model");
        // session_write_close();
    }
    public function index()
    {
        $this->session->set_userdata("userId", null);
        $this->load->view('login', array("title" => "Login"));
    }

    public function validate()
    {
        $userInstance = new User_model;
        $user = $userInstance->get_user();

        // print_r($this->input->post("password"));
        // return;

        if (empty($user)) {
            $this->load->view('login', array("title" => "Login", "error" => "Unknown Username"));
            return;
        }

        if (!password_verify($this->input->post("password"), $user[0]->password)) {
            $this->load->view('login', array("title" => "Login", "error" => "Incorrect Password"));
        } else {
            // $this->session->userId = $user[0]->userId;
            $this->session->set_userdata("userId", $user[0]->userId);
            // var_dump($user[0]->userId);
            redirect(base_url() . "products");
        }
    }

    public function forgotPassword()
    {
        echo "Here";
        $configurator = new HttpClientConfigurator();
        $configurator->setEndpoint('http://bin.mailgun.net/07051324');

        $mgClient = Mailgun::create("22b265e83ab0af430635f081bf84812b-4f207195-c25839df");
        $domain = "localhost";
        $params = array(
            'from'    => 'Excited User <ishimvainqueur@gmail.com>',
            'to'      => 'ishimvainqueur@gmail.com',
            'subject' => 'Hello',
            'text'    => 'Something that google will no suspect at all!'
          );
        $mgClient->messages()->send($domain, $params);
        // https://api.testmail.app/api/json?apikey=4d0f4de2-4a6e-4cb3-ade4-dec21205719a&namespace=t4xcq&pretty=true

    }
}
