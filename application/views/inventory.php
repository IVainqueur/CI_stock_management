<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Stock Manager</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
<style>
    *{margin: 0; padding: 0; box-sizing: border-box;}
    body{height: 100vh; padding-top: 20px !important;}
</style>
    <style>
        * {
            transition: .5s ease;
        }

        .Table {
            width: 100%;
            /* padding: 0 4em; */
        }

        .Table table {
            width: 100%;

        }

        .Table table th,
        .Table table td {
            text-align: start;
        }
    </style>
    <style type="text/tailwindcss">
        .Table table tr:nth-child(even){
            @apply bg-slate-200;
        }
    </style>
</head>

<body>
    <div class="main px-[4em]">
        <div class="titleDIV flex flex-row items-center justify-around gap-1 m-auto mt-5 bg-slate-100 p-2 rounded">
            <h3 class="text-xl font-bold">Coming Soon</h3>
            <div class="filters flex flex-row items-center">
                <a href="<?php echo base_url('inventory') . "?sort=ASC" ?>" style="text-decoration: none;">
                    <div class="Filter px-5 py-2 bg-blue-300 text-white mx-2 rounded flex flex-row items-center justify-center" style="justify-content: center;">
                        <i class='bx bx-sort-up text-2xl font-bold'></i>
                        <span>Sort</span>
                    </div>
                </a>
                <a href="<?php echo base_url('inventory/add_inventory') ?>" style="text-decoration: none;">
                    <div class="Filter px-5 py-2 bg-blue-300 text-white mx-2 rounded flex flex-row items-center justify-center" style="justify-content: center;"><i class='bx bx-plus text-2xl font-bold'></i> <span>ADD</span></div>
                </a>
            </div>
        </div>
        <form action="<?php echo base_url('inventory') ?>" method="get">
            <input type="search" placeholder="Search" name="search" class="px-10 py-3 bg-slate-200 rounded my-2" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        </form>
        <div class="Table m-auto">
            <table>
                <thead class="bg-slate-600 text-white">
                    <th class="p-2 pt-4 pb-4 w-12 pl-4"><input type="checkbox" class="h-5 w-5 appearance-none border-2 border-solid border-slate-400 p-2 checked:bg-slate-400  rounded" id=""></th>
                    <th class="p-2 pt-4 pb-4">Product</th>
                    <th class="p-2 pt-4 pb-4">Quantity</th>
                    <th class="p-2 pt-4 pb-4">Added Date</th>
                    <th class="p-2 pt-4 pb-4">Action</th>


                </thead>
                <tbody>
                    <?php
                    foreach ($products as $product) {
                    ?>
                        <tr>
                            <td class="p-2 w-12 pl-4"><input type="checkbox" class="h-5 w-5 appearance-none border-2 border-solid border-slate-400 p-2 rounded checked:bg-slate-400 "></td>
                            <td class="p-2"><?= $product->product_Name ?></td>
                            <td class="p-2"><?= $product->quantity ?></td>
                            <td class="p-2"><?php $date = date("dS M Y", strtotime($product->added_date)); echo $date; ?></td>
                            <td class="p-2">
                                <a href="<?php echo base_url('inventory/delete')."/".$product->productId ?>"><i class='bx bx-trash-alt text-red-400 text-2xl mr-1 p-1 h-10 w-10 flex justify-center items-center rounded-3xl hover:bg-slate-200'></i></a>
                                <a href="<?php echo base_url('inventory/edit')."/".$product->productId ?>"><i class='bx bx-pencil text-blue-400 text-2xl p-1 h-10 w-10 flex justify-center items-center rounded-3xl hover:bg-slate-200'></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>