<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>

<style>
	.container {
		font-family: Georgia, serif;
	}

	.row {
		margin: 100px 0;
	}

	.col-md-4 {
		background-color: #ffffff;
		padding: 20px;
		border-radius: 5px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}

	h4 {
		text-align: center;
		margin-bottom: 20px;
		color: #333333;
	}

	.form-group label {
		font-weight: bold;
		color: #333333;
	}

	.form-control {
		border-radius: 3px;
		padding: 10px;
		border: 1px solid #dddddd;
	}

	.login-btn {
		width: 100%;
		margin-top: 20px;
		padding: 10px;
		background-color: #337ab7;
		color: #ffffff;
		border: none;
		border-radius: 3px;
		cursor: pointer;
	}

	.login-btn:hover {
		background-color: #286090;
	}

	.message {
		text-align: center;
		margin-top: 10px;
		color: #ff0000;
	}
	#login{
  background-color: #f1f1f1;
  padding: 30px;
  height: 360px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  position:absolute;
  top:150px;
  left:610px;
  width:400px;}
 h2 {
    color:#696969;
    text-align: center;
  margin-bottom: 20px;}
 span {
    color: #008000;}
header{text-align:center;
    font-family:Georgia, serif;}
</style>
<body style="background-color:#F5F5F5">
<div class="container" >
	<div class="row justify-content-center" >
		<div class="col-md-4" id="login">
			<h2><b>Conn<span>exion</span></b></h2>
			<p class="message"></p>
			<form id="admin-login-form">
				<div class="form-group">
					<label for="email">Adresse email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Entrer votre email"
					style="width:350px;height:45px">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Entrer votre mot de passe"
					style="width:350px;height:45px">
				</div>
				<input type="hidden" name="admin_login" value="1">
				<button type="button" class="btn btn-primary login-btn" style="background-color:#008000">Se connecter</button>
			</form>
		</div>
	</div>
</div>
</body>
<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
