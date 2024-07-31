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
      <h2 style="color:#191970"><center><b>Gérer les marques</b></center></h2><bR><br><bR>
      </div>
      <div class="col-2"><bR><bR>
        <a href="#" data-toggle="modal" data-target="#add_brand_modal" class="btn btn-primary btn-sm">Ajouter une marque</a>
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
        <tbody id="brand_list">
        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Georgia-serif">Ajouter une marque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-brand-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label style="font-family: Georgia-serif"> Nom de la marque</label>
                <input type="text" name="brand_title" class="form-control" placeholder="Enter Nom du marque" style="font-family: Georgia-serif">
              </div>
            </div>
            <input type="hidden" name="add_brand" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary add-brand" style="font-family: Georgia-serif">Ajouter marque</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Edit brand Modal -->
<div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Georgia-serif">Modifier une marque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-brand-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="brand_id">
              <div class="form-group">
                <label style="font-family: Georgia-serif">Nom de la marque</label>
                <input type="text" name="e_brand_title" class="form-control" placeholder="Enter Nom du marque" style="font-family: Georgia-serif">
              </div>
            </div>
            <input type="hidden" name="edit_brand" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-brand-btn" style="font-family: Georgia-serif">Modifier marque</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/brands.js"></script>
</body>
</html>