<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header">Products</h1>
		       		<?php
		       			
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
							$stmt = $conn->prepare("SELECT *, products.id AS prodid FROM products LEFT JOIN users ON products.seller_id =users.id");
						    $stmt->execute();
						    foreach ($stmt as $row) {
								$score_total = ($row['ratings_five'] * 5) +  ($row['ratings_four'] * 4) +  ($row['ratings_three'] * 3) +  ($row['ratings_two'] * 2) +  ($row['ratings_one'] * 1);
								$reponse_total = $row['ratings_five'] + $row['ratings_four'] + $row['ratings_three'] + $row['ratings_two'] + $row['ratings_one'];
								if($score_total == 0) {
									$rate_total = 0;
								} else {
									$rate_total = $score_total / $reponse_total;
								}

						    	$image = (!empty($row['photos'])) ? 'images/'.$row['photos'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
								$star_rate = "";
								switch(round($rate_total)) {
									case 1:
										$star_rate .= "<label>
											<span class='icon'>★</span>
										</label>";
										break;
									case 2:
										$star_rate .= "<label>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
										</label>";
										break;
									case 3:
										$star_rate .= "<label>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
										</label>";
										break;
									case 4:
										$star_rate .= "<label>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
										</label>";
										break;
									case 5:
										$star_rate .= "<label>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
											<span class='icon'>★</span>
										</label>";
										break;
									default:
										$star_rate .= "<label>No Ratings Yet</label>";
										break;
								}
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b style='font-size: 12px'>&#8369; ".number_format($row['price'], 2)."/kg</b><br>
												<b style='font-size: 12px'>Rating: ".$star_rate."</b><br>
												<b style='font-size: 12px'>Seller Address: ".$row['address']."</b><br>
												<b style='font-size: 12px'>Stock: ".($row['stock'] <= 0 ? "Out of stock" : $row['stock'])."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-3" style="margin-top: 65px">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>