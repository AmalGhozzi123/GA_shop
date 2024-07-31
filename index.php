<?php
require "config/constants.php";
session_start();
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="css/bootstrap.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<style>
		.dropdown-menu a {
  list-style: none;

}
button.btn.dropdown-toggle {
  position: absolute;
  top: 5px;
  right: 10px;
}
.dropdown-toggle{position: absolute;
  top: -3px;
  right:146px;}
.container-fluid{background-color:	#F5FFFA;}
footer {

  padding: 10px 0;
}

.footer {
  background-color: #f8f8f8;
  padding: 30px 0;
  color:white;
}

.footer h4 {
 
  font-size: 18px;
  margin-bottom: 20px;
}

.footer p {

  font-size: 14px;
  margin-bottom: 20px;
}

.footer-links li {
  display: inline-block;
  margin-right: 10px;
}

.footer-links li a {
  color: white;
  text-decoration: none;
}



hr {
  border-color: white;
}



	</style>
</head>

<body>


<div class="navbar navbar-inverse navbar-fixed-top" >
		<div class="container-fluid" style="background-color:#18022f">
			<div class="navbar-header">

				<a href="#" class="navbar-brand" style="font-family:Georgia,serif;color:#DCDCDC"><b><i>GA_shop</i></b></a>
			</div>
			
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">

				</ul>
				<form class="navbar-form navbar-left" style="position:absolute;left:850px">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Rechercher" id="search" style="width:300px;border-radius:7px">
					</div>
					<button type="submit" class="btn btn-primary" id="search_btn" style="border-radius:7px"><span class="glyphicon glyphicon-search"></span></button>
				</form>
				<ul class="nav navbar-nav navbar-right" >
					<li style="position:absolute;right:35px"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white"><span class="glyphicon glyphicon-shopping-cart" style="color:white"></span> Panier<span class="badge" style="color:white;position:absolute;top:10px"> 0  </span></a>
						
					<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">Numéro de série</div>
										<div class="col-md-3">Image de produit</div>
										<div class="col-md-3">Nom de produit</div>
										<div class="col-md-3">Prix du produit <?php echo "(DT)"; ?></div>
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
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#90EE90">
						<span class="glyphicon glyphicon-user"></span> <b>Se connecter</b>
					</button>
					<ul class="dropdown-menu" style="padding: 15px; width:300px;">
						<div class="panel panel-primary">

							<div class="panel-body">
								<form onsubmit="" id="login" action="profile.php">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Entrer Votre Email" id="email" required />
									<label for="password">Mot de passe</label>
									<input type="password" placeholder="Entrer Votre mot de passe"class="form-control" name="password" id="password" required />
									<br>

									<p><br /></p>
									<a href="#" class="forgot-password-link"  style="position:absolute;bottom:100px;left:100px">Mot de passe oublié</a>
									<button type="submit" class="btn btn-success pull-right" style="position:absolute;bottom:132px;left:100px">Se connecter</button>
								</form>
							</div>
							<div class="panel-footer" id="e_msg"></div>
						</div>
						<div class="text-center">
							<p>Vous n'avez pas de compte ?</p>
							<a href="customer_registration.php" class="btn btn-primary">S'inscrire</a>
						</div>
					</ul>


					</form>

			</div>
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
			<div class="col-md-2 col-xs-12">
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
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Produits</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>



	<footer style="background-color:#18022f;color:white;font-family:Georgia,serif" class="footer">  <div class="container">
    <div class="row">
      <div class="col-md-4" style="font-family:Georgia,serif">
        <h4>À propos de GA Shop</h4>
        <p>GA Shop est un site e-commerce proposant une large gamme de produits de qualité. Nous nous engageons à offrir la meilleure expérience d'achat en ligne à nos clients.</p>
      </div>
     
	  <div class="col-md-4">
  <h3>Réseaux sociaux</h3>
  <ul class="list-unstyled">
    <li><a href="lien_vers_profil_facebook"  style="color:white;font-family:Georgia,serif"><i class="fa fa-facebook" aria-hidden="true" style="color:white"></i>  Facebook</a></li>
    <li><a href="lien_vers_profil_twitter"  style="color:white;font-family:Georgia,serif"><i class="fa fa-twitter" aria-hidden="true" style="color:white"></i>  Twitter</a></li>
    <li><a href="lien_vers_profil_instagram"  style="color:white;font-family:Georgia,serif"><i class="fa fa-instagram" aria-hidden="true" style="color:white"></i>  Instagram</a></li>
	<p><i class="fa fa-phone" style="color:white"></i>  +(216) 96 874 567</p>
  </ul>
</div>
<div class="col-md-4">
        <h3>Newsletter</h3>
        <p>Inscrivez-vous à notre newsletter pour recevoir les dernières offres et mises à jour</p>
        <form>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Entrez votre email">
          </div>
          <button type="submit" class="btn btn-default" style="background-color:#FFEBCD;font-family:Georgia,serif">S'inscrire</button>
        </form>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <hr>
        <p class="text-center">&copy; 2023 GA Shop. Tous droits réservés.</p>
      </div>
    </div>
  </div>
</footer>


</body>

</html>

















