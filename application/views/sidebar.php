<?php
if ($this->session->userId === null) {
    die("No UserID");
}
?>
<style>
    .SideBar {
        height: 100vh;
        width: 100px;
    }

    .main {
        padding-left: 11rem !important;
    }
</style>


<div class="SideBar fixed flex flex-col bg-slate-600 text-white top-0 w-40">
    <img src="<?= base_url() . "images/stockManager.svg" ?>" alt="" class="mb-10 mt-3 w-32 self-center">
    <div class="SideBarItem hover:py-4 flex flex-row gap-2 px-4 py-2 hover:bg-slate-700 items-center">
        <span><img src="<?= base_url() . "images/bxs-shopping-bag-alt.svg" ?>" alt="" class="h-4"></span>
        <a href="<?= base_url("products") ?>">Products</a>
    </div>
    <div class="SideBarItem hover:py-4 flex flex-row gap-2 px-4 py-2 hover:bg-slate-700 items-center">
        <span><img src="<?= base_url() . "images/bxs-time.svg" ?>" alt="" class="h-4"></span>
        <a href="<?= base_url("inventory") ?>">Inventory</a>
    </div>
    <div class="SideBarItem hover:py-4 flex flex-row gap-2 px-4 py-2 hover:bg-slate-700 items-center">
        <span><img src="<?= base_url() . "images/bx-chevrons-right.svg" ?>" alt="" class="h-4"></span>
        <a href="<?= base_url("outgoing") ?>">Outgoing</a>
    </div>
    <div class="SideBarItem flex flex-col gap-2 px-4 py-2 hover:bg-slate-700 items-start absolute bottom-0 left-0 w-full">
        <span class="font-bold">
            <?= $user->username ?>
        </span>
        <span class="flex flex-row items-center gap-2 hover:bg-slate-800 hover:rounded-full hover:py-2 hover:px-4">
            <img src="<?= base_url() . "images/bx-log-out.svg" ?>" alt="" class="h-4">
            <a href="<?= base_url("login") ?>" class="">Logout</a>
        </span>
    </div>


</div>