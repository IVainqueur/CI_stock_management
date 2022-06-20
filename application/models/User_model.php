<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        $this->primary_key = 'userId';
        $this->table_name = 'users';
    }

    public function get_user()
    {
        /**
         * To get only one user
         * ERROR HANDLING is not configured yet
         * 
         */
        if (!empty($this->input->post("username"))) {
            $user = $this->db->select("userId, password")
                ->where("username", $this->input->post("username"))
                ->get('users');
            return $user->result();
        }
    }

    public function get_user_by_id($id)
    {
        /**
         * To get only one user
         * ERROR HANDLING is not configured yet
         * 
         */
        $user = $this->db->select("userId, username, firstName, lastName")
            ->where("userId", $id)
            ->get('users');
        return ($user->result())[0];
    }

    public function create_user()
    {
        /**
         * To ADD a new user to the DB
         */
        $userdata = array(
            "firstName" => $this->input->post("firstName"),
            "lastName" => $this->input->post("lastName"),
            "telephone" => $this->input->post("telephone"),
            "gender" => $this->input->post("gender"),
            "nationality" => $this->input->post("nationality"),
            "username" => $this->input->post("username"),
            "email" => $this->input->post("email"),
            "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
        );
        $this->db->insert("users", $userdata);
        return TRUE;
    }
}
