<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
.b{background-color:#8B0000;
position:absolute;
right:10px;
top:3px;
border-radius:5px;}
  
	</style>
</head>
<body>
<nav style="background-color:#18022f;positon:absolute;top:0;left:0px;width:1527px;left:0px;height:50px">
 	<a class="navbar-brand col-sm-3 col-md-2 mr-0" style="font-family: Georgia-serif"><b style="color:white;font-family:Georgia,serif">GA_Shop</b></a>


 	<ul class="navbar-nav px-3">
 		<li class="nav-item text-nowrap">
 			<?php
				if (isset($_SESSION['admin_id'])) {
				?>
 				<button class="b"><a class="nav-link" href="../admin/admin-logout.php"><b style="font-family:Georgia-serif;color:white;positon:absolute;top:0;left:0px">se déconnecter</b></a></button>
 				<?php
				} else {
					$uriAr = explode("/", $_SERVER['REQUEST_URI']);
					$page = end($uriAr);
					if ($page === "login.php") {
					?>
 					<!--<a class="nav-link" href="../admin/register.php">Enregistrer</a>-->
 				<?php
					} else {
					?>
 					<a class="nav-link" href="../admin/index.php">Connexion</a>
 			<?php
					}
				}

				?>

 		</li>
 	</ul>
 </nav>
</body>
</html>