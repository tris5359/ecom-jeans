<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site['sitename'] ?> - Track Oder</title>
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
			Track Oder
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-50 ">
		<div class="container">

			<div class="  row" style="box-shadow: 1px 30px 20px 1px #ccc" >
				<div class="col-md-3 " ></div>
				<div class="col-md-6 p-lr-30 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="lihatPemesanan" method="POST" >
            
            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-15 p-r-30" type="text" id="kd_bayar" name="keyword" placeholder="Masukan Kode Transaksi" required>
            </div>
           
            

            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="lihat">
              Lihat
            </button>
          </form>
				</div>
			</div>
			
		</div>
	</section>	
	
	


	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>