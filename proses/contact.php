<?php
	include '../includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['pesan'])){
		$subjek = $_POST['subjek'];
		$msg = $_POST['msg'];
			try{
				$stmt = $conn->prepare("INSERT INTO tb_content (kodecontent, judul, isicontent) VALUES (NULL, :subjek, :msg)");
				$stmt->execute(['subjek'=>$subjek, 'msg'=>$msg]);

				$_SESSION['success'] = 'Pesan anda Berhasil dikirim ke toko';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
	}
	else{
		$_SESSION['error'] = 'Isi form terlebih dahulu';
	}

	$pdo->close();

	header('location: ../index.php?View=contact');

?>