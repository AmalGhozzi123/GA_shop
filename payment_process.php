<?php
session_start();
include "db.php";

if (isset($_POST["uid"])) {
	$uid = $_POST["uid"];

	if (isset($_POST["livraison"])) {
		// Mise à jour du statut de la commande avec "Livré"
		$updateQuery = "UPDATE commandes SET status='Livré' WHERE client_id='$uid'";
		mysqli_query($con, $updateQuery);

		header("Location: confirmation.php");
		exit();
	} else if (isset($_POST["enligne"])) {
		// Mise à jour du statut de la commande avec "Paiement en Ligne"
		$updateQuery = "UPDATE commandes SET status='Paiement en Ligne' WHERE client_id='$uid'";
		mysqli_query($con, $updateQuery);

		header("Location: paiement_en_ligne.php");
		exit();
	}
}
?>
