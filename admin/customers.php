<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body  style="background-color:#F0F8FF">
<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
	<div class="row">
		<?php include "./templates/sidebar.php"; ?>
		<div class="row">
			<div class="col-10">
				<h2 style="font-family:Georgia, serif;color:#191970"><center><b>Consulter Clients</b></center></h2><br><br>
			</div>
		</div>
		<div class="table-responsive" style="font-family:Georgia, serif">
			<table class="table table-striped table-sm">
				<thead>
					<tr style="color:#4169E1">
						<th></th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
						<th>Téléphone</th>
						<th>Adresse</th>
					</tr>
					<tr>
						<th></th>
						<td>ghozzi</td>
						<td>amal</td>
						<td>amalghozzi@gmail.com</td>
						<td>26534789 </td>
						<td>Bardo</td></tr>
					<tr>
						<th></th>
						<td>Haj taieb</td>
						<td>Ghofrane </td>
						<td>ghofrane@gmail.com</td>
						<td>25898521</td>
						<td>Hafsiya</td></tr>
						
				</thead>
				<tbody id="customer_list">
				</tbody>
			</table>
		</div>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">ajouter Produit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="add-product-form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label>nom du produit</label>
								<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Nom du marque</label>
								<select class="form-control brand_list" name="brand_id">
									<option value="">Selectionner une marque</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>nom du Categorie</label>
								<select class="form-control category_list" name="category_id">
									<option value="">Selectionner une Categorie</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label> Description du Produit</label>
								<textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Prix</label>
								<input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
							</div>
						</div>

						<div class="col-12">
							<div class="form-group">
								<label> Image </label>
								<input type="file" name="product_image" class="form-control">
							</div>
						</div>
						<input type="hidden" name="add_product" value="1">
						<div class="col-12">
							<button type="button" class="btn btn-primary add-product">Ajouter Produit</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>




</body>
</html>