<?php
session_start();

class Products
{

	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getProducts()
	{
		$q = $this->con->query("SELECT p.produit_id, p.nom_produit, p.prix, p.quantite, p.description, p.image, c.cat_title, c.cat_id, m.marque_id, m.nom_marque FROM produits p JOIN categories c ON c.cat_id = p.produit_cat JOIN marques m ON m.marque_id = p.produit_marque");
		$products = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$products[] = $row;
			}
			$_DATA['products'] = $products;
		}

		$categories = [];
		$q = $this->con->query("SELECT * FROM categories");
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$categories[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['categories'] = $categories;
		}

		$brands = [];
		$q = $this->con->query("SELECT * FROM marques");
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$brands[] = $row;
			}
			//return ['status'=> 202, 'message'=> $ar];
			$_DATA['brands'] = $brands;
		}


		return ['status' => 202, 'message' => $_DATA];
	}

	public function addProduct(
		$product_name,
		$brand_id,
		$category_id,
		$product_desc,
		$product_qty,
		$product_price,
		$file
	) {


		$fileName = $file['name'];
		$fileNameAr = explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {



			if ($file['size'] > (1024 * 2)) {

				$uniqueImageName = time() . "_" . $file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/ecom/product_images/" . $uniqueImageName)) {

					$q = $this->con->query("INSERT INTO `produits`(`produit_cat`, `produit_marque`, `nom_produit`, `quantite`, `prix`, `description`, `image`) VALUES ('$category_id', '$brand_id', '$product_name', '$product_qty', '$product_price', '$product_desc', '$uniqueImageName')");

					if ($q) {
						return ['status' => 202, 'message' => 'Produit ajouté avec succés.'];
					} else {
						return ['status' => 303, 'message' => 'Ajout annulé!!!'];
					}
				}
			}
		}
	}


	public function editProductWithImage(
		$pid,
		$product_name,
		$brand_id,
		$category_id,
		$product_desc,
		$product_qty,
		$product_price,
		$file
	) {


		$fileName = $file['name'];
		$fileNameAr = explode(".", $fileName);
		$extension = end($fileNameAr);
		$ext = strtolower($extension);

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
			if ($file['size'] > (1024 * 2)) {
				$uniqueImageName = time() . "_" . $file['name'];
				if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/gaa/product_images/" . $uniqueImageName)) {

					$q = $this->con->query("UPDATE `produits` SET 
										`produit_cat` = '$category_id', 
										`produit_marque` = '$brand_id', 
										`nom_produit` = '$product_name', 
										`quantite` = '$product_qty', 
										`prix` = '$product_price', 
										`description` = '$product_desc', 
										`image` = '$uniqueImageName'
										WHERE produit_id = '$pid'");

					if ($q) {
						return ['status' => 202, 'message' => 'Produit Modifié avec succés.'];
					} else {
						return ['status' => 303, 'message' => 'Erreur de modification!!!'];
					}
				}
			}
		}
	}

	public function editProductWithoutImage(
		$pid,
		$product_name,
		$brand_id,
		$category_id,
		$product_desc,
		$product_qty,
		$product_price
	) {
	
		if ($pid != null) {
			$q = $this->con->query("UPDATE produits SET 
										produit_cat = '$category_id', 
										produit_marque = '$brand_id', 
										nom_produit = '$product_name',  // Correction ici : nom_produit au lieu de nom_marque
										quantite = '$product_qty', 
										prix = '$product_price', 
										description = '$product_desc'
										WHERE produit_id = '$pid'");
	
			if ($q) {
				return ['status' => 202, 'message' => 'Produit mis à jour avec succès'];
			} else {
				return ['status' => 303, 'message' => 'Erreur de modification!!!'];
			}
		} 
	}
	


	public function getBrands()
	{
		$q = $this->con->query("SELECT * FROM marques");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status' => 202, 'message' => $ar];
	}

	public function addCategory($name)
	{
		$q = $this->con->query("SELECT * FROM categories WHERE cat_title = '$name'");
		if ($q->num_rows > 0) {
			return ['status' => 303, 'message' => 'Categorie  existante !!'];
		} else {
			$q = $this->con->query("INSERT INTO categories (cat_title) VALUES ('$name')");
			if ($q) {
				return ['status' => 202, 'message' => 'Nouvelle categorie ajoutée avec succées !!!'];
			} else {
				return ['status' => 303, 'message' => 'Erreur d\'ajout !!!'];
			}
		}
	}

	public function getCategories()
	{
		$q = $this->con->query("SELECT * FROM categories");
		$ar = [];
		if ($q->num_rows > 0) {
			while ($row = $q->fetch_assoc()) {
				$ar[] = $row;
			}
		}
		return ['status' => 202, 'message' => $ar];
	}

	public function deleteProduct($pid = null)
	{
		if ($pid != null) {
			$q = $this->con->query("DELETE FROM produits WHERE produit_id = '$pid'");
			if ($q) {
				return ['status' => 202, 'message' => 'Produit supprimé avec succées  '];
			} else {
				return ['status' => 202, 'message' => 'Erreur de suppression!!!'];
			}
		}
	}

	public function deleteCategory($cid = null)
	{
		if ($cid != null) {
			$q = $this->con->query("DELETE FROM categories WHERE cat_id = '$cid'");
			if ($q) {
				return ['status' => 202, 'message' => 'Categorie supprimée avec succées '];
			} else {
				return ['status' => 202, 'message' => 'Erreur de suppression!!!'];
			}
		}
	}


	public function updateCategory($post = null)
	{
		extract($post);
		if (!empty($cat_id) && !empty($e_cat_title)) {
			$q = $this->con->query("UPDATE categories SET cat_title = '$e_cat_title' WHERE cat_id = '$cat_id'");
			if ($q) {
				return ['status' => 202, 'message' => 'Catégorie modifiée avec succès'];
			} else {
				return ['status' => 303, 'message' => 'Erreur de modification!!!'];
			}
		} else {
			return ['status' => 303, 'message' => 'Paramètres manquants pour la modification de la catégorie'];
		}
	}
	

	public function addBrand($name)
	{
		$q = $this->con->query("SELECT * FROM marques WHERE nom_marque = '$name' ");
		if ($q->num_rows > 0) {
			return ['status' => 303, 'message' => 'Marque déjà existe'];
		} else {
			$q = $this->con->query("INSERT INTO marques (nom_marque) VALUES ('$name')");
			if ($q) {
				return ['status' => 202, 'message' => 'Nouvelle marque ajoutée avec succées!!'];
			} else {
				return ['status' => 303, 'message' => 'Erreur d\'ajout'];
			}
		}
	}

	public function deleteBrand($bid = null)
	{
		if ($bid != null) {
			$q = $this->con->query("DELETE FROM marques WHERE marque_id = '$bid'");
			if ($q) {
				return ['status' => 202, 'message' => 'Marque supprimée avec succées '];
			} else {
				return ['status' => 202, 'message' => 'Erreur de suppression!!!'];
			}
		}
	}


	public function updateBrand($post = null)
{
    extract($post);
    if (!empty($brand_id) && !empty($e_brand_title)) {
        $q = $this->con->query("UPDATE marques SET nom_marque = '$e_brand_title' WHERE marque_id = '$brand_id'");
        if ($q) {
            return json_encode(['status' => 202, 'message' => 'Marque mise à jour avec succès']);
        } else {
            return json_encode(['status' => 303, 'message' => 'Échec de l\'exécution de la requête']);
        }
    }
}
}
if (isset($_POST['GET_PRODUCT'])) {
	if (isset($_SESSION['admin_id'])) {
		$p = new Products();
		echo json_encode($p->getProducts());
		exit();
	}
}


if (isset($_POST['add_product'])) {

	extract($_POST);
	if (
		!empty($product_name)
		&& !empty($brand_id)
		&& !empty($category_id)
		&& !empty($product_desc)
		&& !empty($product_qty)
		&& !empty($product_price)
		&& !empty($_FILES['image']['name'])
	) {


		$p = new Products();
		$result = $p->addProduct(
			$product_name,
			$brand_id,
			$category_id,
			$product_desc,
			$product_qty,
			$product_price,
			$_FILES['image']
		);

		header("Content-type: application/json");
		echo json_encode($result);
		http_response_code($result['status']);
		exit();
	} else {
		echo json_encode(['status' => 303, 'message' => 'Erreur !!']);
		exit();
	}
}


if (isset($_POST['edit_product'])) {

	extract($_POST);
	if (
		!empty($pid)
		&& !empty($e_product_name)
		&& !empty($e_brand_id)
		&& !empty($e_category_id)
		&& !empty($e_product_desc)
		&& !empty($e_product_qty)
		&& !empty($e_product_price)

	) {

		$p = new Products();

		if (
			isset($_FILES['e_product_image']['name'])
			&& !empty($_FILES['e_product_image']['name'])
		) {
			$result = $p->editProductWithImage(
				$pid,
				$e_product_name,
				$e_brand_id,
				$e_category_id,
				$e_product_desc,
				$e_product_qty,
				$e_product_price,
				$_FILES['e_product_image']
			);
		}

		echo json_encode($result);
		exit();
	} else {
		echo json_encode(['status' => 303, 'message' => 'Erreur!!']);
		exit();
	}
}

if (isset($_POST['GET_BRAND'])) {
	$p = new Products();
	echo json_encode($p->getBrands());
	exit();
}

if (isset($_POST['add_category'])) {
	if (isset($_SESSION['admin_id'])) {
		$cat_title = $_POST['cat_title'];
		if (!empty($cat_title)) {
			$p = new Products();
			echo json_encode($p->addCategory($cat_title));
		} else {
			echo json_encode(['status' => 303, 'message' => 'Erreur!!']);
		}
	}
}

if (isset($_POST['GET_CATEGORIES'])) {
	$p = new Products();
	echo json_encode($p->getCategories());
	exit();
}

if (isset($_POST['DELETE_PRODUCT'])) {
	$p = new Products();
	if (isset($_SESSION['admin_id'])) {
		if (!empty($_POST['pid'])) {
			$pid = $_POST['pid'];
			echo json_encode($p->deleteProduct($pid));
			exit();
		}
	}
}



if (isset($_POST['DELETE_CATEGORY'])) {
	if (!empty($_POST['cid'])) {
		$p = new Products();
		echo json_encode($p->deleteCategory($_POST['cid']));
		exit();
	}
}

if (isset($_POST['edit_category'])) {
	if (!empty($_POST['cat_id'])) {
		$p = new Products();
		echo json_encode($p->updateCategory($_POST));
		exit();
	}
}

if (isset($_POST['add_brand'])) {
	if (isset($_SESSION['admin_id'])) {
		$brand_title = $_POST['brand_title'];
		if (!empty($brand_title)) {
			$p = new Products();
			echo json_encode($p->addBrand($brand_title));
		}
	}
}

if (isset($_POST['DELETE_BRAND'])) {
	if (!empty($_POST['bid'])) {
		$p = new Products();
		echo json_encode($p->deleteBrand($_POST['bid']));
		exit();
	}
}

if (isset($_POST['edit_brand'])) {
	if (!empty($_POST['brand_id'])) {
		$p = new Products();
		echo json_encode($p->updateBrand($_POST));
		exit();
	}
}
