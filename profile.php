<?php
require "config/constants.php";
session_start();
if (!isset($_SESSION["uid"])) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<style>
		@media screen and (max-width:480px) {
			#search {
				width: 80%;
			}

			#search_btn {
				width: 30%;
				float: right;
				margin-top: -32px;
				margin-right: 10px;
			}
		}

		.dropdown-menu li:not(.active) a:hover {
			color: #FFFFFF;
			background-color: #191970;
		}
	</style>
</head>

<body style="background-color:#F5F5F5">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid" style="background-color:#18022f">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">

					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand" style="color:white;font-family:Georgia,serif">GA_shop</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php" style="color:white;font-family:Georgia,serif"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<form class="navbar-form navbar-left" id="search_form" style="position:absolute;left:850px">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Rechercher" name="keyword" style="width:300px;border-radius:7px;font-family:Georgia,serif">
						</div>
						<button type="submit" class="btn btn-primary" id="search_btn" style="border-radius:7px"><span class="glyphicon glyphicon-search"></span></button>
					</form>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" id="cart_container" class="dropdown-toggle" style="font-family:Georgia,serif;color:white" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart" style="color:white"></span> panier<span class="badge" style="color:white">0</span></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row" style="font-family:Georgia,serif">
										<div class="col-md-3 col-xs-3">Numéro de série</div>
										<div class="col-md-3 col-xs-3">Image de produit</div>
										<div class="col-md-3 col-xs-3">Nom de produit</div>
										<div class="col-md-3 col-xs-3">prix de produit <?php echo CURRENCY; ?></div>
									</div>
								</div>
								<div class="panel-body">
									<div id="cart_product">
										<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
									</div>
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;font-family:Georgia,serif"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["name"]; ?></a>
						<ul class="dropdown-menu" style="background-color:#191970;color:white">
							<li><a href="customer_order.php" style="text-decoration:none;color:white;font-family:Georgia,serif">Commande <i class="fa fa-th-list" aria-hidden="true"></i></a></li>
							<li class="divider"></li>
							<li><a href="logout.php" style="text-decoration:none;color:white;font-family:Georgia,serif">Se déconnecter <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
						</ul>

					</li>

				</ul>
			</div>
		</div>
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info" id="scroll">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>

					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
					</ul>
				</center>
			</div>
		</div>
	</div>
</body>

</html>