<?php
	include 'includes/session.php';

	$id = $_POST['productId'];
    $rate = $_POST['rateValue'];
    $product = array('error'=>false);

    $conn = $pdo->open();

    try{
        $stmt1 = $conn->prepare("SELECT * FROM products");
		$stmt1->execute();
        $product = $stmt1->fetch();

        if($rate == 1) {
            $stmt = $conn->prepare("UPDATE products SET ratings_one=:ratings_one WHERE id=:id");
            $stmt->execute(['ratings_one'=> $product['ratings_one'] + 1, 'id'=>$id]);
        } else if($rate == 2) {
            $stmt = $conn->prepare("UPDATE products SET ratings_two=:ratings_two WHERE id=:id");
            $stmt->execute(['ratings_two'=>$product['ratings_two'] + 1, 'id'=>$id]);
        } else if($rate == 3) {
            $stmt = $conn->prepare("UPDATE products SET ratings_three=:ratings_three WHERE id=:id");
            $stmt->execute(['ratings_three'=>$product['ratings_three'] + 1, 'id'=>$id]);
        } else if($rate == 4) {
            $stmt = $conn->prepare("UPDATE products SET ratings_four=:ratings_four WHERE id=:id");
            $stmt->execute(['ratings_four'=>$product['ratings_four'] + 1, 'id'=>$id]);
        } else{
            $stmt = $conn->prepare("UPDATE products SET ratings_five=:ratings_five WHERE id=:id");
            $stmt->execute(['ratings_five'=>$product['ratings_five'] + 1, 'id'=>$id]);
        }
        $_SESSION['success'] = 'Category updated successfully';
        $output['message'] = 'Product rated!';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    
    $pdo->close();

    echo json_encode($output);

?>