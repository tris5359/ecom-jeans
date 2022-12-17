<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include '../includes/session.php';

	
		$nama_depan = $_POST['nama_depan'];
		$nama_belakang = $_POST['nama_belakang'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$konpass = $_POST['repassword'];

		$_SESSION['nama_depan'] = $nama_depan;
		$_SESSION['nama_belakang'] = $nama_belakang;
		$_SESSION['email'] = $email;

		

		if($pass != $konpass){
			$_SESSION['error'] = 'konfirmasi Kata sandi tidak sesuai';
			header('location: ../register.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM  tb_pelanggan WHERE username=:username");
			$stmt->execute(['username'=>$username]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Username Sudah Digunakan';
				header('location: ../register.php');
			}
			else{
				$now = date('Y-m-d');
				$pass2 = md5($pass);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 15);
				$type = 5;
				$status = 3;
				try{
					$stmt = $conn->prepare("INSERT INTO  tb_pelanggan (username, namadepan, namabelakang, email, password, status, codeAktivasiAkun) VALUES (:npm, :namadepan, :namabelakang, :email, :password, '0', :code)");
					$stmt->execute(['npm'=>$username, 'namadepan'=>$nama_depan, 'namabelakang'=>$nama_belakang, 'email'=>$email, 'password'=>$pass2,   'code'=>$code]);
					
					$userid = $conn->lastInsertId();

					$message = '
					<div  style="margin-left: 5%;width: 80%;box-shadow: 0px 20px 20px 5px #555;padding: 50px">
					  <div style=" font-family: andalus;">
					      <h2 style="text-align: center;pad">Aktivasi Akun</h2>
					      <div style="margin-left: 5%;margin-top: 50px">
					        <h2>Terima kasih telah mendaftar.</h2>
							<p>ID Pengguna: '.$username.'</p>
							<p>Password: '.$pass.'</p>
							<p>Silakan klik tautan di bawah ini untuk mengaktifkan akun Anda.</p>
					      </div>
					      <div style="text-align: center;margin-top: 80px">
					        <a href="http://localhost/TokoKamping/aktivasiAkun?code='.$code.'&k='.base64_encode($userid).'" style="padding: 10px 50px;text-transform: uppercase;background-color: #2196F3;color: #fff;border-radius: 20px;border:2px solid #00BCD4;text-decoration:none ">Aktivasi Akun</a>
					      </div>
					  </div></div>
					</div>

					';

					//Load phpmailer
	    			require '../assets/vendor/autoload.php';
		    		

		    		$mail = new PHPMailer(true);                             
				    try {
				        //Server settings            
				        $mail->isSMTP();                                     
				        $mail->Host = 'smtp.gmail.com';                      
				        $mail->SMTPAuth = true;                               
				        $mail->Username = 'Onlineshop127111@gmail.com';     
				        $mail->Password = 'dcba5359';                    
				        $mail->SMTPOptions = array(
			            'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			            )
			        );                        
				        $mail->SMTPSecure = 'ssl';                           
				        $mail->Port = 465;                                   

				        $mail->setFrom('Onlineshop127111@gmail.com');
				        
				        //Recipients
				        $mail->addAddress($email);              
				        $mail->addReplyTo('Onlineshop127111@gmail.com');
				       
				        //Content
				        $mail->isHTML(true);                                  
				        $mail->Subject = 'TokoKamping Register Akun';
				        $mail->Body    = $message;
				        $mail->send();

				        unset($_SESSION['nama']);
				        unset($_SESSION['npm']);
				        unset($_SESSION['email']);

				        $_SESSION['success'] = 'Akun telah dibuat. Periksa email Anda untuk mengaktifkan akun anda.';
				        header('location: ../register.php');

				    } 
				    catch (Exception $e) {
				        $_SESSION['error'] = 'Pesan Gagal terkirim, silakan coba lagi!';
				        header('location: ../register.php');
				    }


				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: ../register.php');
				}

				$pdo->close();

			}

		}

	

?>