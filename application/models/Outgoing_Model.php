<?php

class Outgoing_Model extends CI_Model
{
    public function __construct()
    {
        $this->primary_key = 'outgoingId';
        $this->table_name = 'outgoing';
    }

    public function add_product()
    {
        $product_data = array(
            "productId" =>  $this->input->post("productId"),
            "quantity" =>  $this->input->post("quantity"),
        );

        $this->db->insert("outgoing", $product_data);

        return TRUE;
    }

    public function get_products()
    {
        $search = "";
        if (null !== ($this->input->get("search"))) { // Just checking it is set or not
            $search = $this->input->get("search");
        }
        $products = $this->db->select("p.productId, p.product_Name, i.quantity, i.added_date")
            ->like("product_Name", $search, "both")
            ->from("outgoing i")
            ->join("products p", "p.productId = i.productId")
            ->get()
            ->result();

        return $products;
    }

    public function get_products_for_outgoing($search = "")
    {
        if (null !== ($this->input->get("search"))) { // Just checking it is set or not
            $search = $this->input->get("search");
        }
        $products = $this->db->select("productId, product_Name")
            ->like("product_Name", $search, "both")
            ->get("products")
            ->result();

        return $products;
    }

    public function get_product($id)
    {
        $product = $this->db->select("*")->where("productId", $id)->get("outgoing")
            ->result();

        return $product;
    }

    // public function edit_product()
    // {
    //     $product_data = array(
    //         "product_Name" =>  $this->input->post("product_Name"),
    //         "brand" =>  $this->input->post("brand"),
    //         "supplier_phone" =>  $this->input->post("supplier_phone"),
    //         "supplier" =>  $this->input->post("supplier"),
    //     );
    //     return $this->db->where("outgoingId", $this->input->post("outgoingId"))->update('outgoing', $product_data);
    // }

    public function delete_product($id){
        $this->db->where("productId", $id);
        $this->db->delete("outgoing");
    }
}
