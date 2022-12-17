<?php
session_start();
require_once("../includes/conn.php");;

  $conn = $pdo->open();

if (isset($_POST['login'])) {
	$username     =$_POST['username'];
	$md5_password =md5($_POST['password']);

	try{
      $stmt = $conn->prepare("SELECT *, count(*) as cekuser FROM tb_users WHERE username='".$username."' and password='".$md5_password."'");
      $stmt->execute();
      $result = $stmt->fetch();
  
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

	if($result['cekuser'] > 0){
		$_SESSION['username']     = $username;
		$_SESSION['md5_password'] = $md5_password;
		header("location:index.php");
		}
	else{
  		?>
			<script>
				alert("Login Gagal");
				history.back();
			</script>
		<?php
	}
}
	try{
      $stmt = $conn->prepare("SELECT * FROM site");
      $stmt->execute();
      $title = $stmt->fetch();     
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

 
  
     try{
      $stmt = $conn->prepare("SELECT * FROM `site`");
      $stmt->execute();
      $sitedata = $stmt->fetch();     
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
   

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="icon" type="image/png" href="../assets/images/toko/<?php echo $title['fotoLogo'] ?>"/>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/responsive.css" />
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">
	<style>
		body{
			background-color: #EDBA00;
		}
		.box-rounded {
			margin-top: 14em;
			background-color: #FFF;
			border-radius: 10px;
			border:1px solid #DAAC05;
			padding-top: 10px;
			padding-bottom: 10px;

		}
		.title h2 {
			font-family: 'Reem Kufi', sans-serif;
			color: #333;
			font-weight: 300;
		}
		.form input[type=submit] {
			background-color: #FFF;
			color: #DAAC05;
			border-color: #DAAC05;
			font-size: 15px
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="col-sm-4 col-sm-offset-4 box-rounded">
			<div class="row">

				<div class="col-sm-12 text-center title">
					<h2><?php echo $title['sitename']; ?></h2>
				</div>
				<hr />
				<div class="col-sm-10 col-sm-offset-1 form">
					<form action="" method="POST" role="form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Username" name="username" autofocus="">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="submit" name="login" class="btn btn-block" value="Login" >
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
