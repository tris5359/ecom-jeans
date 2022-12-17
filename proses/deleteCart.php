<?php
	include '../includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);
	$id = $_GET['Act'];
	$product = $_GET['mod'];
	$rl = $_GET['rl'];

	$url = str_replace('/TokoKamping/', '', $rl);


	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("DELETE FROM tb_keranjang WHERE id=:id");
			$stmt->execute(['id'=>$id]);
			$_SESSION['success'] = 'Item '.$product.' dihapus dari Keranjang';

			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['produkid'] == $id){
				unset($_SESSION['cart'][$key]);
				$_SESSION['success'] = 'Item '.$product.' dihapus dari Keranjang';
				
			}
		}
	}

	$pdo->close();
	header('location: ../'.$url);
	

?>