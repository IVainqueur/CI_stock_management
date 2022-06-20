<?php

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Product_Model");
        $this->load->model("Outgoing_Model");
        $this->load->model("Inventory_Model");
        $this->load->model("User_model");
        $this->load->helper("url");
        $this->load->library("form_validation");

        /**
         * CHECK IF THE USER IS AUTHENTICATED
         */
        if($this->session->userId === null){
            redirect(base_url('login'));
        }
    }
    public function index()
    {
        $productsInstance = new Product_Model;
        $products = $productsInstance->get_products();
        // $userModel = new User_model
        $userData = $this->User_model->get_user_by_id($this->session->userId);
        // var_dump($userData);
        // return;
        $this->load->view("sidebar.php", array("user"=>$userData));
        $this->load->view('products', array("products" => $products, "title" => "Products"));
    }

    public function inventory()
    {
        $productsInstance = new Inventory_Model;
        $products = $productsInstance->get_products();
        // $userModel = new User_model
        $userData = $this->User_model->get_user_by_id($this->session->userId);
        $this->load->view("sidebar.php", array("user"=>$userData));
        $this->load->view('inventory', array("products" => $products, "title" => "Inventory"));
    }

    public function add_inventory_page()
    {
        // $userModel = new User_model
        $userData = $this->User_model->get_user_by_id($this->session->userId);
        $this->load->view("sidebar.php", array("user"=>$userData));
        $this->load->view('add_inventory', array("title" => "Add To Inventory"));
    }

    public function add_to_inventory()
    {
        $this->form_validation->set_rules("productId", "Product ID", "required", "Please select a product");
        $this->form_validation->set_rules("quantity", "Quantity", "required|regex_match[/[0-9]/]");

        if ($this->form_validation->run() == FALSE) {

            $this->load->view("sidebar.php");
            $this->load->view('add_inventory', array("title" => "Add To Inventory"));
        } else {
            $product_inventory = new Inventory_Model;
            $success = $product_inventory->add_product();
            if ($success) {
                redirect(base_url() . "inventory");
            } else {
                redirect(base_url() . "inventory/add_inventory");
            }
        }
    }

    public function getforinventory($search)
    {
        $productsInstance = new Inventory_Model;
        $products = $productsInstance->get_products_for_inventory($search);

        if (empty($products)) {
            echo "#error";
            return;
        }
        $response = "";
        foreach ($products as $product) {
            $response = $response . "
            <div class='flex flex-row items-center'>
                <input type='radio' class='mr-2 h-3 w-3 appearance-none border-2 border-solid border-slate-400 p-2 checked:bg-slate-400  rounded' name='productId' value='" . $product->productId . "' ischecked='false' onclick=\"if(this.getAttribute('ischecked') == 'true'){this.checked = false; this.setAttribute('ischecked', 'false') }else{this.setAttribute('ischecked', 'true') }\"'>
                <span>" . $product->product_Name . "</span>
            </div>";
        }

        echo $response;
        return;
    }

    public function delete_from_inventory($id)
    {
        (new Inventory_Model)->delete_product($id);
        redirect(base_url() . "inventory");
    }

    public function outgoing()
    {
        $productsInstance = new Outgoing_Model;
        $products = $productsInstance->get_products();
        // $userModel = new User_model
        $userData = $this->User_model->get_user_by_id($this->session->userId);
        $this->load->view("sidebar.php", array("user"=>$userData));
        $this->load->view('outgoing', array("products" => $products, "title" => "outgoing"));
    }

    public function add_outgoing_page()
    {
        // $userModel = new User_model
        $userData = $this->User_model->get_user_by_id($this->session->userId);
        $this->load->view("sidebar.php", array("user"=>$userData));
        $this->load->view('add_outgoing', array("title" => "Add To outgoing"));
    }

    public function add_to_outgoing()
    {
        $product_outgoing = new Outgoing_Model;
        $success = $product_outgoing->add_product();
        if ($success) {
            redirect(base_url() . "outgoing");
        } else {
            redirect(base_url() . "outgoing/add_outgoing");
        }
    }

    public function getforoutgoing($search)
    {
        $productsInstance = new Outgoing_Model;
        $products = $productsInstance->get_products_for_outgoing($search);

        if (empty($products)) {
            echo "#error";
            return;
        }
        $response = "";
        foreach ($products as $product) {
            $response = $response . "
            <div class='flex flex-row items-center'>
                <input type='radio' class='mr-2 h-3 w-3 appearance-none border-2 border-solid border-slate-400 p-2 checked:bg-slate-400  rounded' name='productId' value='" . $product->productId . "' ischecked='false' onclick=\"if(this.getAttribute('ischecked') == 'true'){this.checked = false; this.setAttribute('ischecked', 'false') }else{this.setAttribute('ischecked', 'true') }\"'>
                <span>" . $product->product_Name . "</span>
            </div>";
        }

        echo $response;
        return;
    }

    public function delete_from_outgoing($id)
    {
        (new Outgoing_Model)->delete_product($id);
        redirect(base_url() . "outgoing");
    }

    public function add_page()
    {
        // $userModel = new User_model
        $userData = $this->User_model->get_user_by_id($this->session->userId);
        $this->load->view("sidebar.php", array("user"=>$userData));
        $this->load->view("add_product", array("title" => "Add Product"));
    }

    public function add_product()
    {
        $productsInstance = new Product_Model;
        $success = $productsInstance->add_product();

        if ($success) {
            redirect(base_url("products"));
        } else {
            echo "Failed to add product";
        }
    }

    public function edit_page($id)
    {
        $productsInstance = new Product_Model;
        $product = $productsInstance->get_product($id);
        if (empty($product)) {
            echo "No Such Product";
            return;
        }
        // $userModel = new User_model
        $userData = $this->User_model->get_user_by_id($this->session->userId);
        $this->load->view("sidebar.php", array("user"=>$userData));
        $this->load->view("edit_product", array("product" => $product[0], "title" => "Edit Product"));
    }

    public function edit_product()
    {
        $productsInstance = new Product_Model;
        $productsInstance->edit_product();
        redirect(base_url("products"));
    }

    public function delete_product($id)
    {
        $productsInstance = new Product_Model;
        $success = $productsInstance->delete_product($id);
        if ($success) {
            redirect(base_url() . "products");
        } else {
            redirect(base_url() . "products/new");
        }
    }
}
