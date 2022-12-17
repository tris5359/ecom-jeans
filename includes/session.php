<?php
	include 'conn.php';
	
	date_default_timezone_set('Asia/Jakarta');
	session_start();
	$conn = $pdo->open();

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}

		try{

			$stmt2 = $conn->prepare("SELECT * FROM site limit 1");
			$stmt2->execute();
			$site = $stmt2->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	if(isset($_SESSION['user'])){
		
		try{
			$stmt = $conn->prepare("SELECT * FROM tb_pelanggan WHERE kodepelanggan=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();

			$stmt2 = $conn->prepare("SELECT * FROM site limit 1");
			$stmt2->execute();
			$site = $stmt2->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>