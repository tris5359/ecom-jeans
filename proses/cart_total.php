<?php
	include 'includes/session.php';

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN tb_produk on tb_produk.id=cart.id_produk WHERE id_user=:id_user");
		$stmt->execute(['id_user'=>$user['id']]);

		$total = 0;
		foreach($stmt as $row){
			$subtotal = $row['harga'] * $row['quantity'];
			$total += $subtotal;
		}

		$pdo->close();

		echo json_encode($total);
	}
?>