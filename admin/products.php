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
<div class="container-fluid" style="font-family:Georgia, serif">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2 style="color:#191970"><center><b>Gérer les produits</b></center></h2><bR><bR>
      	</div>
      	<div class="col-2"><br><bR>
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Ajouter Produit</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr style="color:#4169E1">
              <th>#</th>
              <th>Nom</th>
              <th>Image</th>
              <th>Prix</th>
              <th>Quantité</th>
              <th>Categorie</th>
              <th>Marque</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="product_list">
            <!-- <tr>
              <td>1</td>
              <td>ABC</td>
              <td>FDGR.JPG</td>
              <td>122</td>
              <td>eLECTRONCS</td>
              <td>aPPLE</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Add Product Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
style="font-family:Georgia, serif">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nom du produit</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Entrer Nom du produit">
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
		        		<label>Nom du catégorie</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="">Selectionner une Catégorie</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Description du produit</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Entrer description du produit"></textarea>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Quantité du produit</label>
                <input type="number" name="product_qty" class="form-control" placeholder="Entrer Quantité du produit">
              </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Prix du produit</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Entrer prix du produit">
		        	</div>
        		</div>
        		<div class="col-12">
        			
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Image du produit <small>(format: jpg, jpeg, png)</small></label>
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
<!-- Add Product Modal end -->

<!-- Edit Product Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
style="font-family:Georgia, serif">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Nom du produit</label>
                <input type="text" name="e_product_name" class="form-control" placeholder="Enter Product Name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Nom du marque</label>
                <select class="form-control brand_list" name="e_brand_id">
                  <option value="">Selectionner une marque</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Nom du catégorie</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Selectionner une catégorie</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Description du produit</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Enter product desc"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Quantité du produit</label>
                <input type="number" name="e_product_qty" class="form-control" placeholder="Enter Product Quantity">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Prix du produit</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Enter Product Price">
              </div>
            </div>
            <div class="col-12">
              
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Image du produit <small>(format: jpg, jpeg, png)</small></label>
                <input type="file" name="e_product_image" class="form-control">
                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Modifier Produit</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Product Modal end -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/products.js"></script>
</body>
</html>