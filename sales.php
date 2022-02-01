<?php
	include 'includes/session.php';

	if(isset($_GET['pay'])){
		$payid = $_GET['pay'];
		$date = date('Y-m-d');

		$conn = $pdo->open();

		try{
			try{
				$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);
				$salesid = 0;
				$selers_id = array();
				$products = array();
				foreach($stmt as $row){
					if (in_array($row['seller_id'], $selers_id))
					{
						echo "found";
					}
					else
					{
						$stmt = $conn->prepare("INSERT INTO sales (user_id, pay_id, sales_date, seller_id) VALUES (:user_id, :pay_id, :sales_date, :seller_id)");
						$stmt->execute(['user_id'=>$user['id'], 'pay_id'=>$payid, 'sales_date'=>$date, 'seller_id'=>$row['seller_id']]);
						$salesid = $conn->lastInsertId();
					}

					$stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity, seller_id) VALUES (:sales_id, :product_id, :quantity, :seller_id)");
					$stmt->execute(['sales_id'=>$salesid, 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity'], 'seller_id'=>$row['seller_id']]);

					array_push($selers_id, $row['seller_id']);
					$products[] = (object) ['prod_id' => $row['product_id'], 'qty' => $row['quantity']];
				}

				$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				foreach($products as $product) {
					$stmt = $conn->prepare("UPDATE products SET stock = stock - :qty WHERE id = :id");
					$stmt->execute(['qty'=>$product->qty, 'id'=>$product->prod_id]);
				}
				

				$_SESSION['success'] = 'Transaction successful. Thank you.';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	
	header('location: profile.php');
	
?>