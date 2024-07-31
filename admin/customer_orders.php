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
                <h2 style="color:#191970"><center><b>Consulter commandes des clients</b></center></h2><bR><bR><br>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr style="color:#4169E1">
                        <th>#</th>
                        <th>Ordre </th>
                        <th>Nom,prénom client </th>
                        <th> Id du Produit</th>
                        <th>Nom du Produit</th>
                        <th>Quantité</th>
                        <th>Statut de Paiement</th>
                        <th>Status de commande </th>
						<th>Actions</th>
                    </tr>
                </thead>
                <tbody id="customer_order_list">
                    <tr id="order-1">
                        <td></td>
                        <td>1</td>
                        <td>Amal Ghozzi</td>
                        <td>4</td>
                        <td>Chaussures</td>
                        <td>4</td>
                        <td>payment effectué </td>
                        <td class="payment-status">en attente</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Statut de Paiement">
                                <button type="button" class="btn btn-primary btn-payment" data-order-id="1" data-payment-status="Expédiée">Expédiée</button>
                                <button type="button" class="btn btn-success btn-payment" data-order-id="1" data-payment-status="Effectué">Effectué</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Produit</h5>
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
                                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Nom de la marque</label>
                                <select class="form-control brand_list" name="brand_id">
                                    <option value="">Selectionner une marque
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>nom du catégorie
                                </label>
                                <select class="form-control category_list" name="category_id">
                                    <option value="">Selectionner une Categorie</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Description du produit</label>
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
                                <label>mot clé <small>(exemple: mayebelline iphone, mobile)</small></label>
                                <input type="text" name="product_keywords" class="form-control" placeholder="Enter Product Keywords">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Image du Produit <small></small></label>
                                <input type="file" name="product_image" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="add_product" value="1">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary add-product">Ajouter un Produit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-payment").click(function() {
            var orderId = $(this).attr("data-order-id");
            var paymentStatus = $(this).attr("data-payment-status");

            // Appeler une fonction AJAX pour mettre à jour le statut de paiement dans la base de données
            updatePaymentStatus(orderId, paymentStatus);
        });

        function updatePaymentStatus(orderId, paymentStatus) {
            // Effectuez une requête AJAX pour mettre à jour le statut de paiement dans la base de données
            // Vous pouvez utiliser la méthode $.ajax() ou d'autres bibliothèques AJAX telles que Axios
            // Après la mise à jour réussie, mettez à jour le contenu de la colonne "Statut de Paiement" dans le tableau
            $("#order-" + orderId + " .payment-status").text(paymentStatus);
        }
    });
</script>

</body>
</html>