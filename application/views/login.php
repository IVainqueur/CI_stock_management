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
</head>

<body>
    <form method="POST" action="<?php echo base_url('login/validate') ?>" class="flex flex-col gap-1 m-auto mt-5 bg-slate-100 p-4 rounded h-screen w-screen sm:p-10 sm:w-fit sm:h-fit">
        <h1 class="text-3xl font-bold">Login</h1>
        <div class="error">
            <?php
            if (isset($error)) {
                echo "[ERROR] $error <br>";
            }
            ?>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Username
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your username" id="userNameBox" autocomplete="false" name="username">
        </div>

        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="passwordBox">
                Password
            </label>
            <div class="PasswordContainer">
                <input type="password" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your password" id="passwordBox" name="password">
                <!-- <img src="./visibility.svg" alt="Eyecon"> -->
            </div>
        </div>
        <input id="SignUpBTN" type="submit" name="login" value="Login" class="w-20 px-20 py-2 flex items-center justify-center bg-blue-400 text-white rounded">
        <a href="<?= base_url("signup") ?>" class="text-blue-400 underline">Don't have an account? Sign up with us for free ($0)</a>
    </form>
</body>

</html>