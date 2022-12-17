<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site['sitename'] ?> - Login</title>
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
			LOGIN
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-50 ">
		<div class="container">
				<div class="  row" style="box-shadow: 1px 30px 20px 1px #ccc" >
				<div class="col-md-3 " ></div>
				<div class="col-md-6 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="proses/validasi" method="POST" style="width: 350px;margin-left: 20px;">
            
            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Your Username" required>
              <img class="how-pos4 pointer-none" src="assets/images/icons/icon-email.png" alt="ICON">
            </div>

             <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="Password" name="password" placeholder="Your Password" required>
              <img class="how-pos4 pointer-none" src="assets/images/icons/key.png" alt="ICON">
            </div>
            <ul class="sidebar-link w-full m-b-15">
            <li class="p-b-13">
              <a href="index.php?View=register" class="stext-102 cl2 hov-cl1 trans-04">
                Belum Memiliki Akun
              </a>
            </li>
          </ul>
            

            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="login">
              Submit
            </button>
          </form>
				</div>
			</div>
		</div>
	</section>	
	
	


	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>