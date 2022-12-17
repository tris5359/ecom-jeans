<?php
	include '../includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$banyak = $_POST['banyak'];
	$stok =$_POST['stok'];
	$nama =$_POST['nama'];

	if(isset($_SESSION['user'])){
		if ($banyak > $stok) {
			$_SESSION['error'] = true;
			$_SESSION['error'] = 'Stok Produk Tidak Cukup';
	}
	else{
			
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan=:kodepelanggan AND kodebarang=:kodebarang");
		$stmt->execute(['kodepelanggan'=>$user['kodepelanggan'], 'kodebarang'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				$stmt = $conn->prepare("INSERT INTO tb_keranjang (kodepelanggan, kodebarang, banyak) VALUES (:kodepelanggan, :kodebarang, :banyak)");
				$stmt->execute(['kodepelanggan'=>$user['kodepelanggan'], 'kodebarang'=>$id, 'banyak'=>$banyak]);
				$_SESSION['success'] = 'Item ditambahkan ke Keranjang';
				
			}
			catch(PDOException $e){
				$_SESSION['error'] = true;
				$_SESSION['error'] = $e->getMessage();
			}
		}
		else{
			$_SESSION['error'] = true;
			$_SESSION['error'] = 'Produk sudah di Keranjang';
		}
		}
}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['produkid']);
		}

		if(in_array($id, $exist)){
			$_SESSION['error'] = true;
			$_SESSION['error'] = 'Produk Sudah di Keranjang';
		}
		else{
			$data['produkid'] = $id;
			$data['banyak'] = $banyak;

			if(array_push($_SESSION['cart'], $data)){
				$_SESSION['success'] = 'Item di Tambahkan ke Keranjang';
			}
			else{
				$_SESSION['error'] = true;
				$_SESSION['error'] = 'Tidak Bisa Menambahkan Item ke Keranjang';
			}
		}

	}

	$pdo->close();
	header('location: ../product-detail.php?Product='.$nama.'&id='.$id);
	

?>
