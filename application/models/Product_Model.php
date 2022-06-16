<?php

Class Product_Model extends CI_Model {
    public function __construct(){
        $this->primary_key='productId';
        $this->table_name='products';
    }

    public function add_product(){
        $product_data = array(
            "product_Name" =>  $this->input->post("product_Name"),
            "brand" =>  $this->input->post("brand"),
            "supplier_phone" =>  $this->input->post("supplier_phone"),
            "supplier" =>  $this->input->post("supplier"),
        );

        $this->db->insert("products", $product_data);

        return TRUE;

    }

    public function get_products(){
        $search = "";
        if(null !== ($this->input->get("search"))){ // Just checking it is set or not
            $search = $this->input->get("search");
        }
        $products = $this->db->select("*")->like("product_Name", $search, "both")->get("products")
        ->result();

        return $products;
    }

    public function get_product($id){
        $product = $this->db->select("*")->where("productId", $id)->get("products")
        ->result();

        return $product;
    }

    public function edit_product(){
        $product_data = array(
            "product_Name" =>  $this->input->post("product_Name"),
            "brand" =>  $this->input->post("brand"),
            "supplier_phone" =>  $this->input->post("supplier_phone"),
            "supplier" =>  $this->input->post("supplier"),
        );
        return $this->db->where("productId", $this->input->post("productId"))->update('products', $product_data);
    }
}