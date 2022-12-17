<?php
	require_once("../../includes/conn.php");

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');
	$now = date('Y-m-d');
	$kirim = 'Sukses';
	try{
			$stmt = $conn->prepare("UPDATE tb_pemesanan SET status=:pengiriman, tglkirim=:tgl WHERE idpemesanan=:id");
			$stmt->execute(['pengiriman'=>$kirim, 'tgl'=>$now,  'id'=>$id]);
			$_SESSION['success'] = 'Produk Berhasil di Kirim';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
	$pdo->close();
	header("location:../index.php?admin=viewnota");
	
?>