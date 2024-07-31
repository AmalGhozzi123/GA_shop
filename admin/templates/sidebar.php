<nav class="col-md-2 d-none d-md-block bg-blue sidebar">
<div class="sidebar-sticky">
        <div class="sidebar-header">
            <img src="../product_images/bbb.jpg" style="width:60px; position:absolute; top:10px; left:100px; transform: translateX(-50%);">
        </div><br><bR><br><br><bR>
        <ul class="nav flex-column" style="font-family:Georgia,serif">
            <?php
            $uri = $_SERVER['REQUEST_URI'];
            $uriAr = explode("/", $uri);
            $page = end($uriAr);
            ?>
            <li class="nav-item">
                <a class="nav-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
                    <span data-feather="home" style="color:#191970"></span>
                    <b>Dashboard</b> <span class="sr-only">(current)</span>
                </a><br>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="customer_orders.php">
                    <span data-feather="file" style="color:#191970"></span>
                    <b>Ordre</b>
                </a><bR>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="products.php">
                    <span data-feather="package" style="color:#191970"></span>
                    <b>Produits</b>
                </a><bR>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($page == 'brands.php') ? 'active' : ''; ?>" href="brands.php">
                    <span data-feather="award" style="color:#191970"></span>
                    <b>Marques</b>
                </a><bR>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="categories.php">
                    <span data-feather="list" style="color:#191970"></span>
                    <b>Catégories</b>
                </a><bR>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($page == 'customers.php') ? 'active' : ''; ?>" href="customers.php">
                    <span data-feather="users" style="color:#191970"></span>
                    <b>Clients</b>
                </a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6 class="h4" style="font-family: Georgia, serif;color:#2F4F4F"><b>Bienvenue <?php echo $_SESSION["admin_name"];  ?></b></h6>
    </div>
