<style>
    .SideBar{
        height: 100vh;
        width: 100px;
    }
    .main{
        padding-left: 110px !important;
    }
</style>

<div class="SideBar fixed p-4 flex flex-col gap-3 bg-slate-500 text-white top-0">
    <div class="SideBarItem">
        <span>&copy;</span>
        <a href="<?=base_url("products")?>">Products</a>
    </div>
    <div class="SideBarItem">
        <span>&copy;</span>
        <a href="<?=base_url("inventory")?>">Inventory</a>
    </div>
    <div class="SideBarItem">
        <span>&copy;</span>
        <a href="<?=base_url("login")?>">Logout</a>
    </div>
    
    
</div>