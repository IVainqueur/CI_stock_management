<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Stock Manager</title>
    <link rel="stylesheet" type="text/css" href="<?php echo RESOURCE.'signup.css'?>">
    <script src="https://cdn.tailwindcss.com"></script>
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
    <form action="<?=base_url("signup/create")?>" method="post" class="flex flex-col gap-1 m-auto mt-5 bg-slate-100 p-10 rounded">
        <h1 class="text-3xl font-bold">Sign Up</h1>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                First Name
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your first Name" id="firstNameBox" autocomplete="false" name="firstName">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Last Name
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your last name" id="lastNameBox" autocomplete="false" name="lastName">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Phone Number
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your telephone" id="telephoneBox" autocomplete="false" name="telephone">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Gender
            </label>
            <div class="RadioChoice flex flex-row gap-3">
                <div><input type="radio" value="female" name="gender" class="mr-2"> Male</div>
                <div><input type="radio" value="female" name="gender" class="mr-2"> Female</div>
            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Nationality
            </label>
            <select name="nationality" id="" class="px-5 py-2 bg-slate-200 rounded mx-2">
                <?php
                foreach ($countries->result() as $country) {                
                ?>
                    <option value="<?= $country->name ?>"><?= $country->name ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Username
            </label>
            <input type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your username" id="userNameBox" autocomplete="false" name="username">
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="emailBox">
                Email Address
            </label>
            <input type="email" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your email address" id="emailBox" name="email">
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
        <input id="SignUpBTN" type="submit" name="register" value="Signup" class="w-20 px-20 py-2 flex items-center justify-center bg-blue-400 text-white rounded">
        <a href="<?=base_url("login")?>" class="text-blue-400 underline">Already have an account with us? Login instead</a>
    </form>
</body>

</html>