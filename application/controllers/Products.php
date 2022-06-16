<?php

Class Products extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Product_Model");
        $this->load->model("Inventory_Model");
        $this->load->helper("url");
    }
    public function index(){
        $productsInstance = new Product_Model;
        $products = $productsInstance->get_products();
        
        $this->load->view('products', array("products"=>$products, "title"=>"Products"));
    }

    public function inventory(){
        $productsInstance = new Inventory_Model;
        $products = $productsInstance->get_products();
        
        $this->load->view('inventory', array("products"=>$products, "title"=>"Inventory"));
    }
    
    public function add_inventory_page(){
        $this->load->view('add_inventory', array("title"=>"Add To Inventory"));

    }

    public function getforinventory($search){
        $productsInstance = new Inventory_Model;
        $products = $productsInstance->get_products_for_inventory($search);

        if(empty($products)){
            echo "#error";
            return;
        }
        $response = "";
        foreach($products as $product){
            $response = $response."
            <div class='flex flex-row items-center'>
                <input type='radio' class='mr-2 h-3 w-3 appearance-none border-2 border-solid border-slate-400 p-2 checked:bg-slate-400  rounded' name='productId' value='".$product->productId."' ischecked='false' onclick=\"if(this.getAttribute('ischecked') == 'true'){this.checked = false; this.setAttribute('ischecked', 'false') }else{this.setAttribute('ischecked', 'true') }\"'>
                <span>".$product->product_Name."</span>
            </div>";
        }

        echo $response;
        return;
    }

    public function add_page(){
        $this->load->view("add_product", array("title"=>"Add Product"));
    }

    

    public function add_product(){
        $productsInstance = new Product_Model;
        $success = $productsInstance->add_product();
        
        if($success){
            redirect(base_url("products"));
        }else{
            echo "Failed to add product";
        }
    }
    
    public function edit_page($id){
        $productsInstance = new Product_Model;
        $product = $productsInstance->get_product($id);
        if(empty($product)){
            echo "No Such Product";
            return;
        }
        $this->load->view("edit_product", array("product"=>$product[0], "title"=>"Edit Product"));
    }

    public function edit_product(){
        $productsInstance = new Product_Model;
        $productsInstance->edit_product();
        redirect(base_url("products"));
    }
}