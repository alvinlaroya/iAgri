<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	<?php 
	 /* GET THE SESSION ID

	 
	 if(isset($_SESSION['user'])){
		 echo $user['id'];
	 } */
	 ?>
	  <div class="content-wrapper">
	    <div class="container-fluid">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<section class="home">

						<div class="slide active" style="background: url(https://myleapmagazine.ca/wp-content/uploads/2018/04/Leap-Veggies-Thinkstock.gif) no-repeat;">
							<div class="content" style="margin-left: -30px">
								<span style="color: white">Good Quality and Design</span>
								<h3 style="color: white">upto 50% off</h3>
								<a href="products.php" class="btn-existing" style="color: white">Buy Now</a>
							</div>
						</div>

						<div class="slide" style="background: url(images/home-bg-2.png) no-repeat;">
							<div class="content" style="margin-left: -30px">
								<span>Good Quality and Design</span>
								<h3>upto 50% off</h3>
								<a href="#" class="btn">shop now</a>
							</div>
						</div>

						<div class="slide" style="background: url(images/home-bg-3.png) no-repeat;">
							<div class="content" style="margin-left: -30px">
								<span>Good Quality and Design</span>
								<h3>upto 50% off</h3>
								<a href="#" class="btn">shop now</a>
							</div>
						</div>

						<div id="next-slide" onclick="next()" class="fas fa-angle-right"></div>
						<div id="prev-slide" onclick="prev()" class="fas fa-angle-left"></div>

					</section>
	        	</div>
	        	<!-- <div class="col-sm-3">
	        		include 'includes/sidebar.php'; ?>
	        	</div> -->
	        </div>
	      </section>
	     
	    </div>
		<section class="banner">

			<div class="box">
				<img src="https://preferredbynature.org/sites/default/files/inline-images/Indonesia%20Rice%20project.jpg" alt="">
				<div class="content">
					<span style="color: white">special offer</span>
					<h3 style="color: white">upto 50% off</h3>
					<a href="products.php" class="btn" style="color: white">shop now</a>
				</div>
			</div>

			<div class="box">
				<img src="https://images.hindustantimes.com/rf/image_size_960x540/HT/p2/2020/12/19/Pictures/_c890ad0e-417b-11eb-a3f2-c7d95fc89ddb.jpg" alt="">
				<div class="content">
					<span style="color: white">special offer</span>
					<h3 style="color: white">upto 50% off</h3>
					<a href="products.php" class="btn" style="color: white">shop now</a>
				</div>
			</div>

			<div class="box">
				<img src="https://techcrunch.com/wp-content/uploads/2021/03/maizemanphone.jpg" alt="">
				<div class="content">
					<span style="color: white">special offer</span>
					<h3 style="color: white">upto 50% off</h3>
					<a href="products.php" class="btn" style="color: white">shop now</a>
				</div>
			</div>

		</section>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>