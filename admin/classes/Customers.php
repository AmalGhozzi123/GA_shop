<?php
session_start();
include_once("Database.php");
/**
 * 
 */
class Customers
{

	private $con;

	function __construct()
	{

		$db = new Database();
		$this->con = $db->connect();
	}

	public function getCustomers()
	{
		$query = $this->con->query("SELECT `client_id`, `prenom`, `nom`, `email`, `numero_tlp`, `adresse` FROM `client`");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status' => 202, 'message' => $ar];
		}
		return ['status' => 303, 'message' => 'client introuvable !!'];
	}


	public function getCustomersOrder()
	{
		$query = $this->con->query("SELECT c.commande_id, c.produit_id, c.quantite, c.trx_id, c.status, p.nom_produit, p.image FROM commande c JOIN produits p ON c.produit_id = p.produit_id");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status' => 202, 'message' => $ar];
		}
		return ['status' => 303, 'message' => 'pas ordre encore !!!!'];
	}
}

if (isset($_POST["GET_CUSTOMERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
	}
}

if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomersOrder());
		exit();
	}
}
