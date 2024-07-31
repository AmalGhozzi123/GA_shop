<?php
session_start();

include_once("db.php");

$id = $_SESSION["uid"];
$orders_list = "SELECT o.id,o.quantite, p.nom_produit, p.prix, p.image ,o.quantite  FROM ligne_commande o, produits p WHERE o.client_id='$id' AND o.p_id = p.produit_id";
$query = mysqli_query($con, $orders_list);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Détails de la commande client</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<style>
		table tr td {
			padding: 10px;
			font-family: Georgia, serif;
		}

		.container-fluid {
			background-color: #F5FFFA;
			font-family: Georgia, serif;
		}
	</style>
</head>

<body style="background-color:#F5F5F5">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid" style="background-color:#18022f">
			<div class="navbar-header">
			<a href="#" class="navbar-brand" style="color:white;  font-family: Georgia, serif;"><b><i>GA_Shop</i></b></a>
			</div>
			<ul class="nav navbar-nav">
			<li><a href="index.php" style="color:white;  font-family: Georgia, serif;"><span class="glyphicon glyphicon-home"></span> Home</a></li>

				<!--<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Prod</a></li>-->
			</ul>
			<ul class="nav navbar-nav navbar-right">
					<li><a href="#" id="cart_container" class="dropdown-toggle" style="font-family:Georgia,serif;color:white" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart" style="color:white"></span> panier<span class="badge" style="color:white">1</span></a>
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
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>

	<div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<center>
							<h3 style="font-family:Georgia,serif;color:#191970"><b>Détails de votre commande</b></h3>
						</center>
						<hr />
						<?php
						if (mysqli_num_rows($query) > 0) {
							while ($row = mysqli_fetch_array($query)) {
						?>
								<div class="row">
									<div class="col-md-6">
										<img style="width:130px;position:absolute;left:20px" src="product_images/<?php echo $row['image']; ?>" class="img-responsive img-thumbnail" />

									</div>
									<div class="col-md-6">
										<table style="font-family:Georgia,serif">
											<tr>
												<td>Nom du produit :</td>
												<td><b><?php echo $row["nom_produit"]; ?></b></td>
												<hr>
											</tr>
											<tr>
												<td>Prix ​​du produit : </td>
												<td><b><?php echo CURRENCY . " " . $row["prix"]; ?></b></td>
											</tr>
											<tr>
												<td>Quantité : </td>
												<td><b><?php echo $row["quantite"]; ?></b></td>
											</tr>
										</table>
									</div>
								</div>
						<?php
							}
						} else {
							echo "<center><b><p style='font-family:Georgia,serif'>Aucune commande trouvée!!!</p></b></center>";
						}
						?>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>

</html>