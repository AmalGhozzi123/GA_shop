<?php
session_start();

$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if (isset($_POST["category"])) {
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#' style='position: absolute;
			left:-80px;width:180px'><h4>Categories</h4></a></li><br><br><br>
	";
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li ><a href='#' class='category' cid='$cid' >$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if (isset($_POST["brand"])) {
	$brand_query = "SELECT * FROM marques";
	$run_query = mysqli_query($con, $brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#' style='position: absolute;
			left:-80px;width:180px'><h4>marques</h4></a></li><br>
	";
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$bid = $row["marque_id"];
			$brand_name = $row["nom_marque"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid' >$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
if (isset($_POST["page"])) {
	$sql = "SELECT * FROM produits";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 9);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if (isset($_POST["getProduct"])) {
	$limit = 9;
	if (isset($_POST["setPage"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}
	$product_query = "SELECT * FROM produits LIMIT $start,$limit";
	$run_query = mysqli_query($con, $product_query);
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id    = $row['produit_id'];
			$pro_cat   = $row['produit_cat'];
			$pro_brand = $row['produit_marque'];
			$pro_title = $row['nom_produit'];
			$pro_price = $row['prix'];
			$pro_image = $row['image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'> $pro_price.00 DT

								<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Ajouter au panier</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}
if (isset($_POST["get_seleted_Category"])) {
	$id = $_POST["cat_id"];
	$sql = "SELECT * FROM produits WHERE produit_cat = '$id'";
	$run_query = mysqli_query($con, $sql);
	if (!$run_query) {
		die('Erreur : ' . mysqli_error($con));
	}

	while ($row = mysqli_fetch_array($run_query)) {
		$pro_id    = $row['produit_id'];
		$pro_cat   = $row['produit_cat'];
		$pro_brand = $row['produit_marque'];
		$pro_title = $row['nom_produit'];
		$pro_price = $row['prix'];
		$pro_image = $row['image'];

		echo "
		<div class='col-md-4'>
			<div class='panel panel-info'>
				<div class='panel-heading'>$pro_title</div>
				<div class='panel-body'>
					<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
				</div>
				<div class='panel-heading'>DT.$pro_price.00
					<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Ajouter au panier</button>
				</div>
			</div>
		</div>";
	}
}
if (isset($_POST["selectBrand"])) {
	$id = $_POST["brand_id"];
	$sql = "SELECT * FROM produits WHERE produit_marque = '$id'";
	$run_query = mysqli_query($con, $sql);
	if (!$run_query) {
		die('Erreur : ' . mysqli_error($con));
	}

	while ($row = mysqli_fetch_array($run_query)) {
		$pro_id    = $row['produit_id'];
		$pro_cat   = $row['produit_cat'];
		$pro_brand = $row['produit_marque'];
		$pro_title = $row['nom_produit'];
		$pro_price = $row['prix'];
		$pro_image = $row['image'];

		echo "
		<div class='col-md-4'>
			<div class='panel panel-info'>
				<div class='panel-heading'>$pro_title</div>
				<div class='panel-body'>
					<img src='product_images/$pro_image' style='width:160px; height:250px;'/>
				</div>
				<div class='panel-heading'>DT.$pro_price.00
					<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Ajouter au panier</button>
				</div>
			</div>
		</div>";
	}
}

if (isset($_POST["search"])) {
	$search = $_POST["keyword"];
	$sql = "SELECT * FROM produits WHERE nom_produit LIKE '%$search%'";
	$run_query = mysqli_query($con, $sql);

	if ($run_query) {
		if (mysqli_num_rows($run_query) > 0) {
			while ($row = mysqli_fetch_array($run_query)) {
				$pro_id    = $row['produit_id'];
				$pro_cat   = $row['produit_cat'];
				$pro_brand = $row['produit_marque'];
				$pro_title = $row['nom_produit'];
				$pro_price = $row['prix'];
				$pro_image = $row['image'];

				echo "
                    <div class='col-md-4'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'>$pro_title</div>
                            <div class='panel-body'>
                                <img src='product_images/$pro_image' style='width:160px; height:250px;'/>
                            </div>
                            <div class='panel-heading'>DT.$pro_price.00
                                <button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Ajouter au panier</button>
                            </div>
                        </div>
                    </div>";
			}
		} else {
			echo "<div>Aucun produit trouvé.</div>";
		}
	} else {
		echo "Erreur : " . mysqli_error($con);
	}
}








if (isset($_POST["addToCart"])) {
	$p_id = $_POST["proId"];

	if (isset($_SESSION["uid"])) {
		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM ligne_commande WHERE p_id = '$p_id' AND client_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);

		if ($count > 0) {
			echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Le produit est déjà ajouté au panier. Continuez vos achats !!!</b>
                </div>
            ";
		} else {
			$sql = "INSERT INTO `ligne_commande` (`p_id`, `ip_add`, `client_id`, `quantite`) VALUES ('$p_id','$ip_add','$user_id','1')";

			if (mysqli_query($con, $sql)) {
				echo "
                    <div class='alert alert-success'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <b>Le produit a été ajouté avec succès !!!</b>
                    </div>
                ";
			}
		}
	} else {
		$sql = "SELECT id FROM ligne_commande WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND client_id = -1";
		$query = mysqli_query($con, $sql);

		if (mysqli_num_rows($query) > 0) {
			echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Le produit est déjà ajouté au panier. Continuez vos achats !!!</b>
                </div>";
			exit();
		}

		$sql = "INSERT INTO `ligne_commande` (`p_id`, `ip_add`, `client_id`, `quantite`) VALUES ('$p_id','$ip_add','-1','1')";

		if (mysqli_query($con, $sql)) {
			echo "
                <div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Votre produit a été ajouté avec succès !!!</b>
                </div>
            ";
			exit();
		}
	}
}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM ligne_commande WHERE client_id = $_SESSION[uid]";
	} else {
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM ligne_commande WHERE ip_add = '$ip_add' AND client_id < 0";
	}

	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}



if (isset($_SESSION["uid"])) {
	$sql = "SELECT a.produit_id,a.nom_produit,a.prix,a.image,b.id,b.quantite FROM produits a,ligne_commande b WHERE a.produit_id=b.p_id AND b.client_id='$_SESSION[uid]'";
} else {
	$sql = "SELECT a.produit_id,a.nom_produit,a.prix,a.image,b.id,b.quantite FROM produits a,ligne_commande b WHERE a.produit_id=b.p_id AND b.ip_add='$ip_add' AND b.client_id < 0";
}
$query = mysqli_query($con, $sql);
if (isset($_POST["getCartItem"])) {
	if (mysqli_num_rows($query) > 0) {
		$n = 0;
		while ($row = mysqli_fetch_array($query)) {
			$n++;
			$product_id = $row["produit_id"];
			$product_title = $row["nom_produit"];
			$product_price = $row["prix"];
			$product_image = $row["image"];
			$cart_item_id = $row["id"];
			$qty = $row["quantite"];
			echo '
					<div class="row">
						<div class="col-md-3">' . $n . '</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/' . $product_image . '" /></div>
						<div class="col-md-3">' . $product_title . '</div>
						<div class="col-md-3">' . $product_price . ' ' . CURRENCY . '</div>
					</div>';
		}
?>
		<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
<?php
		exit();
	}
}
if (isset($_POST["checkOutDetails"])) {
	if (mysqli_num_rows($query) > 0) {
		echo "<form method='post' action='login_form.php'>";
		$n = 0;
		while ($row = mysqli_fetch_array($query)) {
			$n++;
			$product_id = $row["produit_id"];
			$product_title = $row["nom_produit"];
			$product_price = $row["prix"];
			$product_image = $row["image"];
			$cart_item_id = $row["id"];
			$qty = $row["quantite"];

			// Vérifier si la commande a été validée et le mode de paiement confirmé
			$commande_validee = false;
			$paiement_confirme = false;

			if ($commande_validee && $paiement_confirme) {
				continue;
			}

			echo '
                <div class="row">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a href="#" remove_id="' . $product_id . '" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
                            <a href="#" update_id="' . $product_id . '" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
                        </div>
                    </div>
                    <input type="hidden" name="product_id[]" value="' . $product_id . '"/>
                    <input type="hidden" name="" value="' . $cart_item_id . '"/>
                    <div class="col-md-2"><img class="img-responsive" src="product_images/' . $product_image . '"></div>
                    <div class="col-md-2">' . $product_title . '</div>
                    <div class="col-md-2"><input type="text" class="form-control qty" value="' . $qty . '" ></div>
                    <div class="col-md-2"><input type="text" class="form-control price" value="' . $product_price . '" readonly="readonly"></div>
                    <div class="col-md-2"><input type="text" class="form-control total" value="' . $product_price . '" readonly="readonly"></div>
                </div>';
		}

		echo '<div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <b class="net_total" style="font-size:20px;"> </b>
                </div>
            </div>
            <br><br><br><br><br><br>';

		if (!isset($_SESSION["uid"])) {
			echo '<input type="submit" style="float:right;background-color:#2F4F4F;position:absolute;left:800px;bottom:60px" name="login_user_with_product" class="btn btn-info btn-lg"  value="Valider la commande">
                </form>';
		} else {
			if (!$commande_validee && !$paiement_confirme) {
				echo '
                    </form>
                    <form method="post" action="paiement_en_ligne.php">
                        <button type="submit" class="btn btn-primary btn-lg" style="background-color:#191970;position:absolute;left:800px;bottom:50px">Paiement en ligne</button>
                    </form>
                    <form method="post" action="confirmation.php">
                        <button type="submit" class="btn btn-success btn-lg" style="background-color:#006400;position:absolute;left:570px;bottom:50px">Paiement à la livraison</button>
                    </form>';
			}
		}
	}
}



if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM ligne_commande WHERE p_id = '$remove_id' AND client_id = '$_SESSION[uid]'";
	} else {
		$sql = "DELETE FROM ligne_commande WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if (mysqli_query($con, $sql)) {
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Le produit sélectionné a été supprimé du panier avec succés</b>
				</div>";
		exit();
	}
}


if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE ligne_commande SET quantite='$qty' WHERE p_id = '$update_id' AND client_id = '$_SESSION[uid]'";
	} else {
		$sql = "UPDATE ligne_commande SET quantite='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if (mysqli_query($con, $sql)) {
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Le produit sélectionné  a été mis à jour avec succès</b>
				</div>";
		exit();
	}
}

echo "
</body>
</html>"

?>