<?php
	include '../includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tb_pelanggan WHERE username = :username");
			$stmt->execute(['username'=>$username]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
					if($password==$row['password']){
						if($row['status']==1){
							$_SESSION['user'] = $row['kodepelanggan'];
						}
						else{
							$_SESSION['error'] = 'Akun Belum di Aktivasi';
						}
					}
					else{
						$_SESSION['error'] = 'Password Salah';
					}
				
			}
			else{
				$_SESSION['error'] = 'Username Tidak Ditemukan';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Harap Masukan username dan password terlebih dahulu';
	}

	$pdo->close();

	header('location: ../home');

?>