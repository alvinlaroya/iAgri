<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?php echo (!empty($product['photos'])) ? 'images/'.$product['photos'] : 'images/noimage.jpg'; ?>" width="100%" class="zoom" data-magnify-src="images/large-<?php echo $product['photos']; ?>">
		            		<br><br>
		            		<form class="form-inline" id="productForm">
		            			<div class="form-group">
			            			<div class="input-group col-sm-6">
			            				
			            				<span class="input-group-btn">
			            					<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
			            				</span>
							          	<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
							            <span class="input-group-btn">
							                <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
							                </button>
							            </span>
										<span class="input-group-btn">
							                <button type="button" id="wishlist" class="btn btn-default btn-flat btn-lg"><i class="fa fa-heart" style="color: red"></i>
							                </button>
							            </span>
							            <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id" id="prodId">
							            <input type="hidden" value="<?php echo $product['stock']; ?>" id="stock">
							            <input type="hidden" value="<?php echo $product['seller_id']; ?>" id="seller_id" name="seller_id">
							        </div>
									<?php 
										if($product['stock'] <= 0) {
											echo '<button type="submit" class="btn btn-primary btn-lg btn-flat" disabled><i class="fa fa-shopping-cart"></i> Add to Cart</button>';
										} else {
											echo '<button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>';
										}
									
									?>
			            		</div>
		            		</form>
		            	</div>
		            	<div class="col-sm-6">
		            		<span style="font-weight: bold; font-size: 30px" class="page-header"><?php echo $product['prodname']; ?></span>
		            		<h3><b>&#8369; <?php echo number_format($product['price'], 2); ?></b></h3>
		            		<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a></p>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
		            		<p><b>Rating:</b>
								&nbsp;
								<?php 
									$score_total = ($product['ratings_five'] * 5) +  ($product['ratings_four'] * 4) +  ($product['ratings_three'] * 3) +  ($product['ratings_two'] * 2) +  ($product['ratings_one'] * 1);
									$reponse_total = $product['ratings_five'] + $product['ratings_four'] + $product['ratings_three'] + $product['ratings_two'] + $product['ratings_one'];
									if($score_total == 0) {
										echo 0;
									} else {
										echo round($score_total / $reponse_total);
									}
								?>
							</p>
							
							<p><b>Stock:</b>&nbsp;<?php echo $product['stock'] <= 0 ? 'Out of stock' : $product['stock']?></p>
							<form class="rating">
							<label>
								<input type="radio" name="stars" value="1" />
								<span class="icon">★</span>
							</label>
							<label>
								<input type="radio" name="stars" value="2" />
								<span class="icon">★</span>
								<span class="icon">★</span>
							</label>
							<label>
								<input type="radio" name="stars" value="3" />
								<span class="icon">★</span>
								<span class="icon">★</span>
								<span class="icon">★</span>   
							</label>
							<label>
								<input type="radio" name="stars" value="4" />
								<span class="icon">★</span>
								<span class="icon">★</span>
								<span class="icon">★</span>
								<span class="icon">★</span>
							</label>
							<label>
								<input type="radio" name="stars" value="5" />
								<span class="icon">★</span>
								<span class="icon">★</span>
								<span class="icon">★</span>
								<span class="icon">★</span>
								<span class="icon">★</span>
							</label>
							</form>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
	$(':radio').change(function() {
		var productId = $('#prodId').val();
		$.ajax({
			type: 'POST',
			url: 'product_rate.php',
			data: {
				productId: productId,
				rateValue: this.value
			},
			dataType: 'json',
			success: function(response){
				$('#callout').show();
				$('.message').html(response.message);
				if(response.error){
					$('#callout').removeClass('callout-success').addClass('callout-danger');
				}
				else{
					$('#callout').removeClass('callout-danger').addClass('callout-success');
					getCart();
				}
			}
		});
	});
</script>
<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		var stock = $('#stock').val();
		var sellerID = $('#seller_id').val();

		if(stock == 0) {
			alert("This product is out of stock")
		}
		else if(quantity < stock) {
			quantity++;
			$('#quantity').val(quantity);
		} else {
			alert("The number of product exceeded")
		}
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});
	$('#wishlist').click(function(e){
		e.preventDefault();
		var productId = $('#prodId').val();
		$.ajax({
			type: 'POST',
			url: 'wishlist_add.php',
			data: {
				productId: productId
			},
			dataType: 'json',
			success: function(response){
				$('#callout').show();
				$('.message').html(response.message);
				if(response.error){
					$('#callout').removeClass('callout-success').addClass('callout-danger');
				}
				else{
					$('#callout').removeClass('callout-danger').addClass('callout-success');
					getCart();
				}
			}
		});
	});

});
</script>
</body>
</html>