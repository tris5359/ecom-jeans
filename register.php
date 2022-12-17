<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site['sitename'] ?> - Register</title>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assets/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Register Account
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-50 ">
		<div class="container">
				<div class="  row" style="box-shadow: 1px 30px 20px 1px #ccc" >
				<div class="col-md-3 " ></div>
				<div class="col-md-6 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="proses/register.php" method="post" >					

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nama_depan" placeholder="Nama Depan" required>
							<img class="how-pos4 pointer-none" src="assets/images/icons/name.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nama_belakang" placeholder="Nama Belakang" required>
							<img class="how-pos4 pointer-none" src="assets/images/icons/name.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Username" required>
							<img class="how-pos4 pointer-none" src="assets/images/icons/id.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email" required>
							<img class="how-pos4 pointer-none" src="assets/images/icons/email.png" alt="ICON">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="Password" name="password" placeholder="Password" required>
							<img class="how-pos4 pointer-none" src="assets/images/icons/pass.png" alt="ICON">
						</div>
						<div class="bor8 m-b-50 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="Password" name="repassword" placeholder="Konfirmasi Password" required>
							<img class="how-pos4 pointer-none" src="assets/images/icons/pass.png" alt="ICON">
						</div>


						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="signup">
							REGISTER
						</button>
					</form>
				</div>
			</div>
		</div>
	</section>	
	
	


	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>