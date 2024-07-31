$(document).ready(function () {

	var productList;

	function getProducts() {
		$.ajax({
			url: '../admin/classes/Products.php',
			method: 'POST',
			data: { GET_PRODUCT: 1 },
			success: function (response) {
				//console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var productHTML = '';

					productList = resp.message.products;

					if (productList) {
						$.each(resp.message.products, function (index, value) {

							productHTML += '<tr>' +
								'<td>' + '' + '</td>' +
								'<td>' + value.nom_produit + '</td>' +
								'<td><img width="60" height="60" src="../product_images/' + value.image + '"></td>' +
								'<td>' + value.prix + '</td>' +
								'<td>' + value.quantite + '</td>' +
								'<td>' + value.cat_title + '</td>' +
								'<td>' + value.nom_produit + '</td>' +
								'<td><a class="btn btn-sm btn-info edit-product" style="color:#fff;"><span style="display:none;">' + JSON.stringify(value) + '</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="' + value.produit_id + '" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>' +
								'</tr>';

						});

						$("#product_list").html(productHTML);
					}




					var catSelectHTML = '<option value="">Select Category</option>';
					$.each(resp.message.categories, function (index, value) {

						catSelectHTML += '<option value="' + value.cat_id + '">' + value.cat_title + '</option>';

					});

					$(".category_list").html(catSelectHTML);

					var brandSelectHTML = '<option value="">Select Brand</option>';
					$.each(resp.message.brands, function (index, value) {

						brandSelectHTML += '<option value="' + value.marque_id + '">' + value.nom_marque + '</option>';

					});

					$(".brand_list").html(brandSelectHTML);

				}
			}

		});
	}

	getProducts();

	$(".add-product").on("click", function () {
		$.ajax({
			url: '../admin/classes/products.php',
			method: 'POST',
			data: new FormData($("#add-product-form")[0]),
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				console.log(response);
				var resp = JSON.parse(response);
				if (resp.status == 202) {
					$("#add-product-form").trigger("reset");
					$("#add_product_modal").modal('hide');
					getProducts();
				} else if (resp.status == 303) {
					alert(resp.message);
				}
			}
		});
	});



	$(document.body).on('click', '.edit-product', function () {

		console.log($(this).find('span').text());

		var product = $.parseJSON($.trim($(this).find('span').text()));

		console.log(product);

		$("input[name='e_product_name']").val(product.nom_produit);
		$("select[name='e_brand_id']").val(product.marque_id);
		$("select[name='e_category_id']").val(product.cat_id);
		$("textarea[name='e_product_desc']").val(product.description);
		$("input[name='e_product_qty']").val(product.quantite);
		$("input[name='e_product_price']").val(product.prix);
		$("input[name='e_product_keywords']").val(product.produit_motcle);
		$("input[name='e_product_image']").siblings("img").attr("src", "../product_images/" + product.image);
		$("input[name='pid']").val(product.produit_id);
		$("#edit_product_modal").modal('show');

	});

	$(".submit-edit-product").on('click', function () {

		$.ajax({

			url: '../admin/classes/Products.php',
			method: 'POST',
			data: new FormData($("#edit-product-form")[0]),
			contentType: false,
			cache: false,
			processData: false,
			success: function (response) {
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-product-form").trigger("reset");
					$("#edit_product_modal").modal('hide');
					getProducts();
					alert(resp.message);
				} else if (resp.status == 303) {
					alert(resp.message);
				}
			}

		});


	});

	$(document.body).on('click', '.delete-product', function () {

		var pid = $(this).attr('pid');
		if (confirm("voulez-vous supprimer ce produit ? ")) {
			$.ajax({

				url: '../admin/classes/Products.php',
				method: 'POST',
				data: { DELETE_PRODUCT: 1, pid: pid },
				success: function (response) {
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getProducts();
					} else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		} else {
			alert('annulation !');
		}


	});

});