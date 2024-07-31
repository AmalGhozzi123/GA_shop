<?php
include "aa.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Paiement en Ligne</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        form {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="text"] {
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 300px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #45a049;
            border: none;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            width: 250px;
        }

        input[type="submit"]:hover {
            background-color: #8FBC8F;
        }

        .alert {
            margin-top: 20px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: 0.5;
            cursor: pointer;
        }

        .close:hover {
            opacity: 1;
        }

        .retour {
            display: inline-block;
            padding: 10px 10px;
            background-color: #808080;
            color: white;
            font-size: 12px;
            text-decoration: none;
            border-radius: 7px;
            transition: background-color 0.3s ease;
            position: absolute;
            top: 80px;
            left: 30px;
        }

        .retour i {
            margin-right: 10px;
        }

        .retour:hover {
            background-color: #18022f;
        }
        body {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        #id {
            text-align: center;
        }
    </style>
</head>

<body style="font-family: Georgia, serif;background-color:#F5F5F5;text-align:center">
    <!--<a href="cart.php" class="retour"><i class="fa fa-chevron-left"></i> Retour</a>-->

    <div class="navbar navbar-inverse navbar-fixed-top" style="text-align:center" id="id">
        <div class="container-fluid" style="background-color:#18022f">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand" style="color:white;font-family:Georgia,serif;font-size:15px">GA_shop</a>
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
    <br><br><br><br><br>
    <center>
        <h1 style="color:#008080"><b><i>Paiement en Ligne</i><b></h1>
    </center><br><bR><bR>
    <p>Veuillez sélectionner une méthode de paiement :</p>

    <?php
    $message = "";
    $alertClass = "";

    if (isset($_POST["uid"])) {
        $uid = $_POST["uid"];

        // Vérification de la méthode de paiement sélectionnée
        if (isset($_POST["methode_paiement"]) && ($_POST["methode_paiement"] === "e_dnar" || $_POST["methode_paiement"] === "carte_bancaire" || $_POST["methode_paiement"] === "autre")) {
            // Récupération du numéro de validation
            $numero_validation = $_POST["numero_validation"];

            // Vérification du numéro de validation
            if (strlen($numero_validation) === 16 && ctype_digit($numero_validation)) {
                // Traitement du paiement et mise à jour de la commande

                // Message de confirmation
                $message = "Votre paiement a été traité avec succès,Nous vous contacterons pour vous informer de la date de livraison. <br><a href='index.php' style='color:gray'><u><b>Retourner à la page d'accueil</b></u></a>";
                $alertClass = "alert-success";

                // Suppression des produits du panier
                unset($_SESSION["panier"]);
            } else {
                // Message d'erreur si le numéro de validation est incorrect
                $message = "Le numéro de Carte est invalide!!!";
                $alertClass = "alert-danger";
            }
        } else {
            // Message d'erreur si aucune méthode de paiement valide n'est sélectionnée
            $message = "Veuillez sélectionner une méthode de paiement valide!!!";
            $alertClass = "alert-danger";
        }
    }
    ?>

    <?php if (!empty($message)) : ?>
        <div class="alert <?php echo $alertClass; ?>" role="alert" id="alertMessage">
            <button type="button" class="close" aria-label="Close" onclick="hideAlert()">
                <span aria-hidden="true">&times;</span>
            </button>
            <p><?php echo $message; ?></p>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="uid" value="<?php echo htmlspecialchars($uid); ?>">

        <label>
            <input type="radio" name="methode_paiement" value="e_dnar" onclick="showCardNumberInput()">
            Paiement par Carte e_dinar
        </label><br>

        <label>
            <input type="radio" name="methode_paiement" value="carte_bancaire" onclick="showCardNumberInput()">
            Paiement par Carte Bancaire
        </label><br>

        <div id="cardNumberInput" style="display: none;">
            <label for="numero_validation">Numéro de La carte (16 chiffres) :</label>
            <input type="text" name="numero_validation" id="numero_validation" maxlength="16" required><br><br>
        </div>

        <input type="submit" name="paiement_submit" value="Payer Maintenant">
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelector(".close").addEventListener("click", function(event) {
            event.stopPropagation();
            document.getElementById("alertMessage").style.display = "none";
        });

        function hideAlert() {
            document.getElementById("alertMessage").style.display = "none";
        }

        function showCardNumberInput() {
            var cardNumberInput = document.getElementById("cardNumberInput");
            var selectedPaymentMethod = document.querySelector("input[name='methode_paiement']:checked").value;

            if (selectedPaymentMethod === "e_dnar" || selectedPaymentMethod === "carte_bancaire") {
                cardNumberInput.style.display = "block";
            } else {
                cardNumberInput.style.display = "none";
            }
        }
    </script>
</body>

</html>
