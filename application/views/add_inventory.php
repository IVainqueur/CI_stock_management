<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Stock Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        form {
            margin: auto;
            width: fit-content;
        }
    </style>
    <!-- <link rel="stylesheet" href="./signup.css"> -->
</head>

<body>
    <form action="<?php echo base_url('products/add_product') ?>" method="post" class="flex flex-col gap-1 m-auto mt-5 bg-slate-100 p-10 rounded">
        <h1 class="text-3xl font-bold">Add to inventory</h1>
        <div class="Field justify-between flex flex-col gap-1 items-start ">
            <div class="flex flex-row gap-1 p-2 justify-between flex-grow">
                <label for="userNameBox">
                    Product :
                </label>
                <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Search" id="product_NameBox" autocomplete="false" name="product_Name" onkeyup="get_products(this, this)">
            </div>
            <div class="products">

            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Brand :
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your brand" id="brandBox" autocomplete="false" name="brand">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Supplier contact :
            </label>
            <input type="tel" class="px-5 py-2 bg-slate-200 rounded mx-2" pattern="[0-9]{10}" placeholder="Enter your supplier phone" id="supplier_phoneBox" autocomplete="false" name="supplier_phone">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Supplier :
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" pattern="[a-zA-Z0-9\s]{10}" placeholder="Enter your supplier" id="supplierBox" autocomplete="false" name="supplier">
        </div>
        <input id="SignUpBTN" type="submit" name="add" value="ADD PRODUCT" class="w-20 px-20 py-2 flex items-center justify-center bg-blue-400 text-white rounded">
    </form>
</body>
<script>
    document.querySelector('form').onsubmit = (e) => {
        if (!document.querySelector('.products input:checked')) {
            alert("Please select a product")
            return e.preventDefault()
        }
    }

    function get_products(element, {value}) {
        if (value == "") {
            document.querySelector('.products').innerHTML = "Please Enter a search"
            return
        }
        fetch(`<?php echo base_url("products/getforinventory/")?>${value}`)
            .then(res => res.text())
            .then(data => {
                if (data != "#error") {
                    document.querySelector('.products').innerHTML = data
                } else {
                    document.querySelector('.products').innerHTML = "None Found"
                }
            })
    }
</script>

</html>