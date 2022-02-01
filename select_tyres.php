<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	$id = $_POST['id'];

	$stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $output['data'] = $stmt->fetch();

	$pdo->close();
	echo json_encode($output);

?>