<?php require_once("./includes/header.php"); ?>
<?php
use TechStore\Classes\Models\Product;
if ($request->getHas('id')) {
	$id = $request->get('id');
} else {
	$id = 1;
}
$pr = new Product;
$prod = $pr->selectID($id);
?>
<!-- Single Product -->
<?php if (!empty($prod)) : ?>
	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Selected Image -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="image_selected"><img class="img-fluid" src="<?= URL . "uploads/" . $prod['img'] ?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-6 order-3">
					<div class="product_description">
						<div class="product_category">Laptops</div>
						<div class="product_name"><?= $prod['name'] ?></div>
						<div class="product_text">
							<p><?= $prod['desc'] ?></p>
						</div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<div class="product_price">$ <?= $prod['price'] ?></div>

								</div>

								<div class="button_container">
									<button type="button" class="button cart_button">Add to Cart</button>
								</div>

							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php else : ?>
	<div style="height: 325px; font-size: 3rem;" class="single_product text-center font-weight-bold">
		No Data Available!
	</div>
<?php endif ?>

<?php require_once("./includes/footer.php"); ?>