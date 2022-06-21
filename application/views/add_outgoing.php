<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Stock Manager</title>
    <script defer src="<?=base_url().'resources/tailwindcss.js'?>"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            padding-top: 20px !important;
        }
    </style>
    <style>
        form {
            margin: auto;
            width: fit-content;
        }
    </style>
    <!-- <link rel="stylesheet" href="./signup.css"> -->
</head>

<body>
    <form action="<?php echo base_url('outgoing/new') ?>" method="post" class="flex flex-col gap-1 m-auto mt-5 bg-slate-100 p-10 rounded">
        <h1 class="text-3xl font-bold">Add to outgoing</h1>
        <div class="Field justify-between flex flex-col gap-1 items-start ">
            <div class="flex flex-row gap-1 p-2 justify-between flex-grow items-center">
                <label for="userNameBox">
                    Product :
                </label>
                <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2 flex-grow" placeholder="Search" id="product_NameBox" autocomplete="false" onkeyup="get_products(this, this)">
            </div>
            <div class="products">

            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Quantity :
            </label>
            <div class="Input relative">
                <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="How many?" id="brandBox" autocomplete="false" name="quantity">
                <?php
                if (form_error("quantity") !== "") {
                ?>
                    <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("quantity") ?></div>
                <?php
                }
                ?>
            </div>i
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

    function get_products(element, {
        value
    }) {
        if (value == "") {
            document.querySelector('.products').innerHTML = "Please Enter a search"
            return
        }
        fetch(`<?php echo base_url("products/getforoutgoing/") ?>${value}`)
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