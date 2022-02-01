<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = '';

	if(isset($_SESSION['user'])){
		try{
			$total = 0;
			$stmt = $conn->prepare("SELECT *, wishlist.id AS wishlistId FROM wishlist LEFT JOIN products ON products.id=wishlist.product_id WHERE user_id=:user");
			$stmt->execute(['user'=>$user['id']]);
			foreach($stmt as $row){
				$image = (!empty($row['photos'])) ? 'images/'.$row['photos'] : 'images/noimage.jpg';
				$output .= "
					<tr>
						<td><button type='button' data-id='".$row['wishlistId']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
						<td><a href='product.php?product=".$row['slug']."'>View</a></td>
						<td><img src='".$image."' width='30px' height='30px'></td>
						<td>".$row['name']."</td>
						<td>&#8369; ".number_format($row['price'], 2)."</td>
					</tr>
				";
			}

		}
		catch(PDOException $e){
			$output .= $e->getMessage();
		}

	}
	else{
		if(count($_SESSION['wishlist']) != 0){
			$total = 0;
			foreach($_SESSION['wishlist'] as $row){
				$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photos'])) ? 'images/'.$product['photos'] : 'images/noimage.jpg';
				$subtotal = $product['price']*$row['quantity'];
				$total += $subtotal;
				$output .= "
					<tr>
						<td><button type='button' data-id='".$row['productid']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
						<td><a href='product.php?product=".$product['slug']."'>View</a></td>
						<td><img src='".$image."' width='30px' height='30px'></td>
						<td>".$product['name']."</td>
						<td>&#8369; ".number_format($product['price'], 2)."</td>
						<td class='input-group'>
							<span class='input-group-btn'>
            					<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['productid']."'><i class='fa fa-minus'></i></button>
            				</span>
				            <span class='input-group-btn'>
				                <button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['productid']."'><i class='fa fa-plus'></i>
				                </button>
				            </span>
						</td>
						<td>&#8369; ".number_format($subtotal, 2)."</td>
					</tr>
				";
				
			}

			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td><b>&#8369; ".number_format($total, 2)."</b></td>
				<tr>
			";
		}

		else{
			$output .= "
				<tr>
					<td colspan='6' align='center'>Wishlist  empty</td>
				<tr>
			";
		}
		
	}

	$pdo->close();
	echo json_encode($output);

?>

