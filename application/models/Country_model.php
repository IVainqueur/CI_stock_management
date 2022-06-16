<?php

class Country_model extends CI_Model{
    public function __construct()
    {
        $this->primary_key = "id";
        $this->table_name = "countries";
    }
}