
<?php
// require "config/constants.php";

session_start();
require_once "bb.php";
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['supprimer_commande'])) {
        // Supprimer la commande ici
        $message = "<b style='color:#8B0000'>Votre commande a été supprimée avec succès.</b><br>
		<a href='cart.php' style='color:black'>Retourner au panier</a>";
    } elseif (isset($_POST['confirmer_commande'])) {
        // Confirmer la commande ici
        $message = "<b style='color:green'>Votre commande a été confirmée et sera bientôt traitée. Nous vous contacterons pour vous informer de la date de livraison.</b>
		<br><a href='customer_order.php' style='color:black'> Consulter Votre commande</a>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de commande</title>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: Georgia, serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        .navbar {
            background-color: #18022f;
            color: #dcdcdc;
            padding: -5px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }

        .navbar-brand {
            font-family: Georgia, serif;
            font-size: 24px;
            color: #dcdcdc;
        }

        .cc {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position:absolute;
            left:500px;
            top:300px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 16px;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        button {
            margin-right: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }
        .retour {
  display: inline-block;
  padding: 10px 10px;
  background-color:#808080 ;
  color: white;
  font-size: 12px;
  text-decoration: none;
  border-radius: 7px;
  transition: background-color 0.3s ease;
  position:absolute;
  top:55px;
  left:-2px;
}

.retour i {
  margin-right: 10px;
}

.retour:hover {
  background-color:#18022f ;
}
    </style>
</head>
<body style="font-family:Georgia,serif">
<!--<a href="customer_order.php" class="retour"><i class="fa fa-chevron-left"></i> Retour</a> -->
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
    <br><bR><br><br><bR><bR><bR><bR><br><br><br><bR>
    <div class="cc">
        <h1 style="color:#2F4F4F">Validation du commande</h1><br>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php else: ?>
            <form method="post" style="font-family:Georgia,serif">
                <input type="hidden" name="uid" value="<?php echo $_SESSION["uid"]; ?>">
                <button type="submit" name="supprimer_commande" style="font-family:Georgia,serif;background-color:#8B0000;color:white">Supprimer la commande</button>
                <button type="submit" name="confirmer_commande" style="font-family:Georgia,serif;background-color:green;color:white">Confirmer la commande</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
