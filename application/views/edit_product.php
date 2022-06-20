<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> | Stock Manager</title>
    <script defer src="https://cdn.tailwindcss.com"></script>
<style>
    *{margin: 0; padding: 0; box-sizing: border-box;}
    body{height: 100vh; padding-top: 20px !important;}
</style>
    <style>
        form{
            margin: auto;
            width: fit-content;
        }
    </style>
</head>

<body>
    <form action="<?php echo base_url('products/edit_product') ?>" method="post" class="flex flex-col gap-1 m-auto mt-5 bg-slate-100 p-10 rounded">
        <h1 class="text-3xl font-bold">Edit product</h1>
        <input type="hidden" value="<?=$product->productId?>" name="productId">
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Product Name :
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your product name" id="product_NameBox" autocomplete="false" name="product_Name" value="<?=$product->product_Name?>">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Brand :
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your brand" id="brandBox" autocomplete="false" name="brand" value="<?=$product->brand?>">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Supplier contact :
            </label>
            <input type="tel" class="px-5 py-2 bg-slate-200 rounded mx-2" pattern="[0-9]{10}" placeholder="Enter your supplier phone" id="supplier_phoneBox" autocomplete="false" name="supplier_phone" value="<?=$product->supplier_phone?>">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Supplier :
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2"  placeholder="Enter your supplier" id="supplierBox" autocomplete="false" name="supplier" value="<?=$product->supplier?>">
        </div>
        <input id="SignUpBTN" type="submit" name="add" value="ADD PRODUCT" class="w-20 px-20 py-2 flex items-center justify-center bg-blue-400 text-white rounded">
    </form>
</body>

</html>