<?php
require "config/constants.php";
session_start();
if (isset($_SESSION["id"])) {
	header("location:profile.php");
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>GA_Shop</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.container-fluid {
			background-color: #F5FFFA;
		}

		.table-striped>tbody>tr:nth-of-type(odd) {
			background-color: #F8F8F8;
		}

		.table-striped>tbody>tr:nth-of-type(even) {
			background-color: #FFFFFF;
		}

		.panel-primary {
			border-color: #18022f;
		}
		.retour {
  display: inline-block;
  padding: 10px 10px;
  background-color:#18022f ;
  color: white;
  font-size: 12px;
  text-decoration: none;
  border-radius: 7px;
  transition: background-color 0.3s ease;
  position:absolute;
  top:80px;
  left:30px;
}

.retour i {
  margin-right: 10px;
}

.retour:hover {
  background-color:#e0ac1c ;
}
	</style>
</head>

<body style="font-family: Georgia, serif;background-color:#F5F5F5">

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
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<di>
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!-- Cart Message -->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row"><br><br>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><center><b style="font-family: Georgia, serif"><h4>Panier Commandé</h4></b></center></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Actions</b></div>
							<div class="col-md-2 col-xs-2"><b>Image du produit</b></div>
							<div class="col-md-2 col-xs-2"><b>Nom du produit</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantité</b></div>
							<div class="col-md-2 col-xs-2"><b>Prix du produit</b></div>	
							<div class="col-md-2 col-xs-2"><b>Prix Total</b></div>
						</div>
						<div id="cart_checkout"></div>
						
					</div>
				</div>
				
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>


	
</body>

</html>
