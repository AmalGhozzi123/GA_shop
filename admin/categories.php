<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-color:#F0F8FF">
<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid" style="font-family:Georgia, serif">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>


    <div class="row">
      <div class="col-10">
      <h2 style="color:#191970"><center><b>Gérer les catégories</b></center></h2><br><bR><bR>
      </div>
      <div class="col-2"><bR><bR>
        <a href="#" data-toggle="modal" data-target="#add_category_modal" class="btn btn-primary btn-sm" style="font-family: Georgia-serif">Ajouter une catégorie</a>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr style="color:#4169E1"> 
            <th>#</th>
            <th>Nom</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="category_list">

        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Georgia-serif">Ajouter une catégorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-category-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label style="font-family: Georgia-serif">Nom du catégorie</label>
                <input type="text" name="cat_title" class="form-control" placeholder="Entrer Nom du marque" style="font-family: Georgia-serif">
              </div>
            </div>
            <input type="hidden" name="add_category" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary add-category" style="font-family: Georgia-serif">Ajouter une catégorie</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!--Edit category Modal -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Georgia-serif">Modifier catégorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-category-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="cat_id">
              <div class="form-group">
                <label style="font-family: Georgia-serif">Nom du catégorie</label>
                <input type="text" name="e_cat_title" class="form-control" placeholder="Entrez le nom de la marque" style="font-family: Georgia-serif">
              </div>
            </div>
            <input type="hidden" name="edit_category" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-category-btn" style="font-family: Georgia-serif">Modifier la catégorie</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/categories.js"></script>
</body>
</html>