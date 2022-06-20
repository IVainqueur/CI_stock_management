<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Stock Manager</title>
    <link rel="stylesheet" type="text/css" href="<?php echo RESOURCE . 'signup.css' ?>">
    <script defer src="https://cdn.tailwindcss.com"></script>
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
    <form action="<?= base_url("signup") ?>" method="post" class="flex flex-col gap-1 m-auto mt-5 bg-slate-100 p-10 rounded">
        
        <h1 class="text-3xl font-bold">Sign Up</h1>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                First Name
            </label>
            <div class="Input relative">

                <input autocomplete="off" type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your first Name" id="firstNameBox" autocomplete="false" name="firstName">

                <?php
                if (form_error("firstName") !== "") {
                ?>
                    <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("firstName")?></div>
                <?php
                }
                ?>
            </div>

        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Last Name
            </label>
            <div class="Input relative">

                <input autocomplete="off" type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your last name" id="lastNameBox" autocomplete="false" name="lastName">

                <?php
                if (form_error("lastName") !== "") {
                ?>
                    <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("lastName")?></div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Phone Number
            </label>
            <div class="Input relative">

                <input autocomplete="off" type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your telephone" id="telephoneBox" autocomplete="false" name="telephone">

                <?php
                if (form_error("telephone") !== "") {
                ?>
                    <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("telephone")?></div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Gender
            </label>
            <div class="RadioChoice flex flex-row gap-3">
                <div>
                    <div class="Input relative">
                        <input autocomplete="off" type="radio" value="female" name="gender" class="mr-2"> Male

                        <input autocomplete="off" type="radio" value="female" name="gender" class="mr-2"> Female
                        <?php
                        if (form_error("gender") !== "") {
                        ?>
                            <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("gender")?></div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Nationality
            </label>
            <div class="Input relative">
                <select name="nationality" id="" class="px-5 py-2 bg-slate-200 rounded mx-2">
                    <?php
                    foreach ($countries->result() as $country) {
                    ?>
                        <option value="<?= $country->name ?>"><?= $country->name ?></option>
                    <?php } ?>
                </select>
                <?php
                if (form_error("nationality") !== "") {
                ?>
                    <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("nationality")?></div>
                <?php
                } ?>
            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="userNameBox">
                Username
            </label>
            <div class="Input relative">

                <input autocomplete="off" type="text" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your username" id="userNameBox" autocomplete="false" name="username">

                <?php
                if (form_error("username") !== "") {
                ?>
                    <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("username")?></div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="emailBox">
                Email Address
            </label>
            <div class="Input relative">

                <input autocomplete="off" type="email" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your email address" id="emailBox" name="email">

                <?php
                if (form_error("email") !== "") {
                ?>
                    <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("email")?></div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="Field justify-between flex flex-row gap-1 items-center p-2">
            <label for="passwordBox">
                Password
            </label>
            <div class="PasswordContainer">
                <div class="Input relative">

                    <input autocomplete="off" type="password" class="px-5 py-2 bg-slate-200 rounded mx-2" placeholder="Enter your password" id="passwordBox" name="password">

                    <?php
                    if (form_error("password") !== "") {
                    ?>
                        <div onclick="this.style.display = 'none'" class="error grid border-2 border-red-400 rounded place-content-center w-max min-w-full h-full absolute backdrop-blur text-red-500 text-center p-4 z-1 top-0 right-0"><?= form_error("password")?></div>
                    <?php
                    }
                    ?>
                </div>
                <!-- <img src="./visibility.svg" alt="Eyecon"> -->
            </div>
        </div>
        <div class="Input relative">
            <input autocomplete="off" id="SignUpBTN" type="submit" name="register" value="Signup" class="w-20 px-20 py-2 flex items-center justify-center bg-blue-400 text-white rounded">
        </div>
        <a href="<?= base_url("login") ?>" class="text-blue-400 underline">Already have an account with us? Login instead</a>
    </form>
</body>

</html>