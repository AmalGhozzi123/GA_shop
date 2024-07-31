<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>GA_shop</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="background-color:#F5F5F5">
	<div class="wait overlay" style="font-family:Georgia, serif">
		<div class="loader"></div>
	</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid" style="background-color:#18022f">

			<div class="navbar-header">
				<a href="#" class="navbar-brand"><i><b>GA_Shop<b></i></a>
			</div>
			<ul class="nav navbar-nav">
				<li style="color:white"><a href="index.php" style="color:white"><span class="glyphicon glyphicon-home" style="color:white"></span> Home</a></li>

			</ul>
		</div>
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading" style="background-color:#18022f;font-family:Georgia,serif;height:40px">
						<center>
							<h5><b>Formulaire d'inscription</b></h5>
						</center>
					</div>

					<div class="panel-body">

						<form id="signup_form">
							<div class="row">
								<div class="col-md-6">
									<label for="f_name">Prénom*</label>
									<input type="text" id="f_name" name="f_name" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="f_name">Nom*</label>
									<input type="text" id="l_name" name="l_name" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="email">Email*</label>
									<input type="text" id="email" name="email" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="password">Mot de passe*</label>
									<input type="password" id="password" name="password" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="repassword">Entrez à nouveau le mot de passe*</label>
									<input type="password" id="repassword" name="repassword" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="mobile">Numéro de Télephone*</label>
									<input type="text" id="mobile" name="mobile" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address1">Addresse*</label>
									<input type="text" id="address1" name="address1" class="form-control">
								</div>
							</div>
							<div class="row">

							</div>
							<p><br /></p>
							<div class="row">
								<div class="col-md-12">
									<input style="width:100%;" value="S'inscrire" type="submit" name="signup_button" class="btn btn-success btn-lg">
								</div>
							</div>

					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>

</html>
<?php




?>