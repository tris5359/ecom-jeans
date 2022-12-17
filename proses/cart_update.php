<?php
	include '../includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$qty = $_POST['num-product1'];

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("UPDATE tb_keranjang SET banyak=:quantity WHERE id=:id");
			$stmt->execute(['quantity'=>$qty, 'id'=>$id]);
				$_SESSION['success'] = 'Jumlah Item di Update';
			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['produkid'] == $id){
				$_SESSION['cart'][$key]['banyak'] = $qty;
				$_SESSION['success'] = 'Jumlah Item di Update';

			}
		}
	}

	$pdo->close();
	header('location: ../index.php?View=shoping-cart');


?>