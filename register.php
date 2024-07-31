<?php
session_start();
include "db.php";
if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];

	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	if (
		empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
		empty($mobile) || empty($address1)
	) {

		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Merci de compléter tous les champs..!</b>
			</div>
		";
		exit();
	} else {
		if (!preg_match($name, $f_name)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Veuillez saisir un prénom valide pour $f_name !!!</b>
			</div>
		";
			exit();
		}
		if (!preg_match($name, $l_name)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Cette $l_name n'est pas valide!!!</b>
			</div>
		";
			exit();
		}
		if (!preg_match($emailValidation, $email)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Cette adresse e-mail $email n'est pas valide!!!</b>
			</div>
		";
			exit();
		}
		if (strlen($password) < 9) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le mot de passe est faible!!!</b>
			</div>
		";
			exit();
		}
		if (strlen($repassword) < 9) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le mot de passe est faible!!!</b>
			</div>
		";
			exit();
		}
		if ($password != $repassword) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Les mots de passe ne sont pas identiques!!!</b>
			</div>
		";
		}
		if (!preg_match($number, $mobile)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le numéro de téléphone mobile $mobile n'est pas valide!!!</b>
			</div>
		";
			exit();
		}
		if (!(strlen($mobile) == 8)) {
			echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le numéro de téléphone mobile doit être composé de 8 chiffres!!!</b>
			</div>
		";
			exit();
		}
		//existing email address in our database
		$sql = "SELECT client_id FROM client WHERE email = '$email' ";
		$check_query = mysqli_query($con, $sql);
		$count_email = mysqli_num_rows($check_query);
		if ($count_email > 0) {
			echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Désole,il semble que cette adresse e-mail soit déjà associée à un compte. Veuillez en utiliser une autre!!!</b>
			</div>
		";
			exit();
		} else {
			$password = md5($password);
			$sql = "INSERT INTO `client` 
		(`client_id`, `prenom`, `nom`, `email`, 
		`password`, `numero_tlp`, `adresse`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1')";
			$run_query = mysqli_query($con, $sql);
			$_SESSION["uid"] = mysqli_insert_id($con);
			$_SESSION["name"] = $f_name;
			$ip_add = getenv("REMOTE_ADDR");
			$sql = "UPDATE ligne_commande SET client_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND client_id = -1";
			if (mysqli_query($con, $sql)) {
			
				echo "  <div class='alert alert-success' role='alert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Félicitations, votre compte a été créé avec succès </b>
			</div>";
				exit();
			}
		}
	}
}
