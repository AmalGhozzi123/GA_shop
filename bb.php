<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("db.php");

$id = $_SESSION["uid"];
$orders_list = "SELECT o.id, o.quantite, p.nom_produit, p.prix, p.image, o.quantite FROM ligne_commande o, produits p WHERE o.client_id='$id' AND o.p_id = p.produit_id";
$query = mysqli_query($con, $orders_list);

// Define the delivery charge
$deliveryRate = 7; // Example: 7 Dinar

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Détails de la commande client</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        body {
            background-color: #F5F5F5;
            font-family: Georgia, serif;
        }

        .navbar {
            background-color: #18022f;
            color: white;
        }

        .navbar-brand {
            font-size: 30px;
            color: #DCDCDC;
        }

        .nav li a {
            color: white;
            font-family: Georgia, serif;
        }

        .panel-heading,
        .panel-footer {
            background-color: #18022f;
            color: white;
            font-family: Georgia, serif;
        }

        .panel-heading h5 {
            margin-top: 0;
            padding: 2px;
            color: #191970;
            font-weight: bold;
            font-style: italic;
        }

        .row {
            margin-bottom: 30px;
        }

        .img-thumbnail {
            width: 100px;
            float: left;
            margin-left: 10px;
        }

        .table {
            font-family: Georgia, serif;
            position: absolute;
            top: 0px;
        }

        .container {
            margin-top: 33px;
            position: absolute;
            left: 880px;
            width: 1100px;
        }

        .order-details {
            display: none;
            justify-content: flex-end;
        }

        .order-details .product-info {
            flex: 1;
        }

        .order-details .product-image {
            margin-left: 20px;
        }

        .show-details-btn {
            background-color: #778899;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php" style="color:white"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5>Produits commandées</h5>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                                <div class="row order-details">
                                    <div class="col-md-6 product-info">
                                        <table class="table">
                                            <tr>
                                                <td>Nom du produit :</td>
                                                <td><b><?php echo $row["nom_produit"]; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Quantité :</td>
                                                <td><b><?php echo $row["quantite"]; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Prix Total :</td>
                                                <td><b><?php echo  $row["prix"]. " " .CURRENCY ; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Frais  de livraison :</td>
                                                <td><b><?php echo   $deliveryRate. " " .CURRENCY; ?></b></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6 product-image">
                                        <img src="product_images/<?php echo $row['image']; ?>" class="img-responsive img-thumbnail" />
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<center><b><p>Aucune commande trouvée !!!</p></b></center>";
                        }
                        ?>
                    </div>
               
                </div>
                <button style="background-color:#778899" class="show-details-btn" onclick="toggleOrderDetails()">Afficher Détails de votre commande</button>
                <script>
                    function toggleOrderDetails() {
                        var orderDetails = document.getElementsByClassName('order-details');
                        for (var i = 0; i < orderDetails.length; i++) {
                            orderDetails[i].style.display = (orderDetails[i].style.display === 'none') ? 'flex' : 'none';
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</body>

</html>
