<?php include 'includes/session.php'; ?>
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
        <h2>Bike Builder</h2>
	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-7">
                    <div class="row">
		            	<div class="col-sm-12" style="margin-top: 100px">
                            <img id="front-rim" src="./images/plain.png" style="width: 250px; position: absolute; top: 125px; right: 130px; z-index: 1" alt="">
                            <img id="back-rim" src="./images/plain.png" style="width: 250px; position: absolute; top: 130px; left: -104px; z-index: 1" alt="">
                            <img id="front-tyre" src="./images/plain.png" style="width: 250px; position: absolute; top: 125px; right: 130px; z-index: 1" alt="">
                            <img id="back-tyre" src="./images/plain.png" style="width: 250px; position: absolute; top: 130px; left: -104px; z-index: 1" alt="">
                            <img id="group-set" src="./images/plain.png" style="width: 270px; position: absolute; top: 170px; left: -15px; z-index: 1" alt="">
		            		<img id="frame" src="./images/plain.png" style="width: 400px; z-index: 1; position: absolute" alt="">
                            <img id="handle-bar" src="./images/plain.png" style="width: 120px; position: absolute; top: 5px; right: 247px; z-index: 1" alt="">
                            <img id="saddle" src="./images/plain.png" style="width: 120px; position: absolute; top: -33px; left: 45px; z-index: 1" alt="">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 420px">
                        <span style="font-size: 25px">Build Total: &#8369;<span id="build-total" style="font-size: 25px">0.00</span></span><br>
                        <button class="btn btn-danger btn_reset_build">Reset Build</button>
                    </div>
	        	</div>
	        	<div class="col-sm-5">
	        		<div class="row">
                        <div class="box" style="padding: 10px;">
                        <div class="container-slider" style="margin-top: -10px">
                            <h5 style="font-weight: bold">Frame Set</h5>
                            <div class="carousel carousel-main" data-flickity='{"pageDots": true }'>
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 18");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <a href='product.php?product=".$row['slug']."' class='carousel-cell' style='text-align: center'>
                                                <span style='font-weight: bold'>".$row['name']." (&#8369; ".$row['price'].")</span><br>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                            </a>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                            <div class="carousel carousel-nav"
                                data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'
                            >
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 18");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <div class='carousel-cell slider-button select_frame active' data-id='".$row['id']."'>
                                                <span class='slider-text' style='font-size: 9px'>".$row['name']."</span>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                                <span class='slider-text' style='font-size: 10px'>&#8369;".$row['price']."</span>
                                            </div>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                        </div><!-- /.container -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="box" style="padding: 10px;">
                        <div class="container-slider" style="margin-top: -10px">
                            <h5 style="font-weight: bold">Saddles</h5>
                            <div class="carousel carousel-main1" data-flickity='{"pageDots": true }'>
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 14");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <a href='product.php?product=".$row['slug']."' class='carousel-cell' style='text-align: center'>
                                                <span style='font-weight: bold'>".$row['name']." (&#8369; ".$row['price'].")</span><br>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                            </a>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                            <div class="carousel carousel-nav"
                                data-flickity='{ "asNavFor": ".carousel-main1", "contain": true, "pageDots": false }'
                            >
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 14");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <div class='carousel-cell slider-button select_saddle' data-id='".$row['id']."'>
                                                <span class='slider-text' style='font-size: 9px'>".$row['name']."</span>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                                <span class='slider-text' style='font-size: 10px'>&#8369;".$row['price']."</span>
                                            </div>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                        </div><!-- /.container -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="box" style="padding: 10px;">
                        <div class="container-slider" style="margin-top: -10px">
                            <h5 style="font-weight: bold">Handle Bars</h5>
                            <div class="carousel carousel-main2" data-flickity='{"pageDots": true }'>
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 16");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <a href='product.php?product=".$row['slug']."' class='carousel-cell' style='text-align: center'>
                                                <span style='font-weight: bold'>".$row['name']." (&#8369; ".$row['price'].")</span><br>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                            </a>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                            <div class="carousel carousel-nav"
                                data-flickity='{ "asNavFor": ".carousel-main2", "contain": true, "pageDots": false }'
                            >
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 16");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <div class='carousel-cell slider-button select_handlebar' data-id='".$row['id']."'>
                                                <span class='slider-text' style='font-size: 9px'>".$row['name']."</span>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                                <span class='slider-text' style='font-size: 10px'>&#8369;".$row['price']."</span> 
                                            </div>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                        </div><!-- /.container -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="box" style="padding: 10px;">
                        <div class="container-slider" style="margin-top: -10px">
                            <h5 style="font-weight: bold">Group Sets</h5>
                            <div class="carousel carousel-main3" data-flickity='{"pageDots": true }'>
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 17");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <a href='product.php?product=".$row['slug']."' class='carousel-cell' style='text-align: center'>
                                                <span style='font-weight: bold'>".$row['name']." (&#8369; ".$row['price'].")</span><br>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                            </a>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                            <div class="carousel carousel-nav"
                                data-flickity='{ "asNavFor": ".carousel-main3", "contain": true, "pageDots": false }'
                            >
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 17");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <div class='carousel-cell slider-button select_groupset' data-id='".$row['id']."'>
                                                <span class='slider-text' style='font-size: 9px'>".$row['name']."</span>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                                <span class='slider-text' style='font-size: 10px'>&#8369;".$row['price']."</span>
                                            </div>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                        </div><!-- /.container -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="box" style="padding: 10px;">
                            <div class="container-slider" style="margin-top: -10px">
                                <h5 style="font-weight: bold">Rims</h5>
                                <div class="carousel carousel-main4" data-flickity='{"pageDots": true }'>
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 15");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <a href='product.php?product=".$row['slug']."' class='carousel-cell' style='text-align: center'>
                                                <span style='font-weight: bold'>".$row['name']." (&#8369; ".$row['price'].")</span><br>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                            </a>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                                <div class="carousel carousel-nav"
                                    data-flickity='{ "asNavFor": ".carousel-main4", "contain": true, "pageDots": false }'
                                >
                                    <?php
                                
                                        $conn = $pdo->open();

                                        try{
                                            $inc = 3;	
                                            $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 15");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                                $inc = ($inc == 3) ? 1 : $inc + 1;
                                                echo "
                                                <div class='carousel-cell slider-button select_rim' data-id='".$row['id']."'>
                                                    <span class='slider-text' style='font-size: 9px'>".$row['name']."</span>
                                                    <img src='".$image."' style='width: 60px; height: 60px' />
                                                    <span class='slider-text' style='font-size: 10px'>&#8369;".$row['price']."</span>
                                                </div>
                                                ";
                                            }
                                        }
                                        catch(PDOException $e){
                                            echo "There is some problem in connection: " . $e->getMessage();
                                        }

                                        $pdo->close();

                                    ?>
                                </div>
                            </div><!-- /.container -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="box" style="padding: 10px;">
                            <div class="container-slider" style="margin-top: -10px">
                                <h5 style="font-weight: bold">Tyres</h5>
                                <div class="carousel carousel-main5" data-flickity='{"pageDots": true }'>
                                <?php
                            
                                    $conn = $pdo->open();

                                    try{
                                        $inc = 3;	
                                        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 13");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                            $inc = ($inc == 3) ? 1 : $inc + 1;
                                            echo "
                                            <a href='product.php?product=".$row['slug']."' class='carousel-cell' style='text-align: center'>
                                                <span style='font-weight: bold'>".$row['name']." (&#8369; ".$row['price'].")</span><br>
                                                <img src='".$image."' style='width: 60px; height: 60px' />
                                            </a>
                                            ";
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    $pdo->close();

                                ?>
                            </div>
                                <div class="carousel carousel-nav"
                                    data-flickity='{ "asNavFor": ".carousel-main5", "contain": true, "pageDots": false }'
                                >
                                    <?php
                                
                                        $conn = $pdo->open();

                                        try{
                                            $inc = 3;	
                                            $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = 13");
                                            $stmt->execute();
                                            foreach ($stmt as $row) {
                                                $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                                                $inc = ($inc == 3) ? 1 : $inc + 1;
                                                echo "
                                                <div class='carousel-cell slider-button select_tyres' data-id='".$row['id']."'>
                                                    <span class='slider-text' style='font-size: 9px'>".$row['name']."</span>
                                                    <img src='".$image."' style='width: 60px; height: 60px' />
                                                    <span class='slider-text' style='font-size: 10px'>&#8369;".$row['price']."</span>
                                                </div>
                                                ";
                                            }
                                        }
                                        catch(PDOException $e){
                                            echo "There is some problem in connection: " . $e->getMessage();
                                        }

                                        $pdo->close();

                                    ?>
                                </div>
                            </div><!-- /.container -->
                        </div>
                    </div>
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
$(function(){
    var frame_total = 0;
    var saddle = 0;
    var handle_bar = 0;
    var group_set = 0;
    var rim = 0;
    var tyre = 0;

    function getTotal() {
        let total = frame_total + saddle + handle_bar + group_set + rim + tyre;
        $("#build-total").html(`${total}.00`.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

    $(document).on('click', '.btn_reset_build', function(e){
        frame_total = 0;
        saddle = 0;
        handle_bar = 0;
        group_set = 0;
        rim = 0;
        tyre = 0;
        $("#frame").attr('src', `images/plain.png`);
        $("#front-tyre").attr('src', `images/plain.png`);
        $("#back-tyre").attr('src', `images/plain.png`);
        $("#front-rim").attr('src', `images/plain.png`);
        $("#back-rim").attr('src', `images/plain.png`);
        $("#group-set").attr('src', `images/plain.png`);
        $("#handle-bar").attr('src', `images/plain.png`);
        $("#saddle").attr('src', `images/plain.png`);
        getTotal();
	});

	$(document).on('click', '.select_frame', function(e){
        total = 0;
		e.preventDefault();
		var id = $(this).data('id');
        console.log(id)
		$.ajax({
			type: 'POST',
			url: 'select_frame.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
                    console.log(response.data.photo);
                    $("#frame").attr('src', `images/${response.data.photo}`);
                    frame_total = Number(response.data.price);
                    getTotal();
				}
			}
		});
	});
    $(document).on('click', '.select_tyres', function(e){
		e.preventDefault();
		var id = $(this).data('id');
        console.log(id)
		$.ajax({
			type: 'POST',
			url: 'select_tyres.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
                    console.log(response.data.photo);
                    $("#front-tyre").attr('src', `images/${response.data.photo}`);
                    $("#back-tyre").attr('src', `images/${response.data.photo}`);
                    tyre = Number(response.data.price);
                    getTotal();
				}
			}
		});
	});
    $(document).on('click', '.select_rim', function(e){
		e.preventDefault();
		var id = $(this).data('id');
        console.log(id)
		$.ajax({
			type: 'POST',
			url: 'select_rim.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
                    console.log(response.data.photo);
                    $("#front-rim").attr('src', `images/${response.data.photo}`);
                    $("#back-rim").attr('src', `images/${response.data.photo}`);
                    rim = Number(response.data.price);
                    getTotal();
				}
			}
		});
	});
    $(document).on('click', '.select_groupset', function(e){
		e.preventDefault();
		var id = $(this).data('id');
        console.log(id)
		$.ajax({
			type: 'POST',
			url: 'select_groupset.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
                    console.log(response.data.photo);
                    $("#group-set").attr('src', `images/${response.data.photo}`);
                    group_set = Number(response.data.price);
                    getTotal();
				}
			}
		});
	});
    $(document).on('click', '.select_handlebar', function(e){
		e.preventDefault();
		var id = $(this).data('id');
        console.log(id)
		$.ajax({
			type: 'POST',
			url: 'select_handlebar.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
                    console.log(response.data.photo);
                    $("#handle-bar").attr('src', `images/${response.data.photo}`);
                    handle_bar = Number(response.data.price);
                    getTotal();
				}
			}
		});
	});
    $(document).on('click', '.select_saddle', function(e){
		e.preventDefault();
		var id = $(this).data('id');
        console.log(id)
		$.ajax({
			type: 'POST',
			url: 'select_saddle.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
                    console.log(response.data.photo);
                    $("#saddle").attr('src', `images/${response.data.photo}`);
                    saddle = Number(response.data.price);
                    getTotal();
				}
			}
		});
	});

});
</script>
</body>
</html>