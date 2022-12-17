<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site['sitename'] ?> - Product Detail</title>

<?php
	$conn = $pdo->open();

	$slug = $_GET['Product'];
	$id = $_GET['id'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT * FROM tb_barang INNER JOIN tb_detilkategori ON tb_detilkategori.kodedetil=tb_barang.kodedetil WHERE tb_barang.namabarang = :slug and tb_barang.kodebarang=:id");
	    $stmt->execute(['slug' => $slug, 'id'=>$id]);
	    $produk = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$images = (!empty($produk['foto']))? $produk['foto'] : 'noimage.jpg';


	//page view
	$now = date('Y-m-d');
	if($produk['view'] == $now){
		$stmt = $conn->prepare("UPDATE tb_barang SET counter=counter+1 WHERE kodebarang=:id");
		$stmt->execute(['id'=>$id]);
	}
	else{
		$stmt = $conn->prepare("UPDATE tb_barang SET counter=1, view=:now WHERE kodebarang=:id");
		$stmt->execute(['id'=>$id, 'now'=>$now]);
	}

?>

<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php?View=home" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="category.php?Kategori=<?php echo $produk['namadetil']?>&Mod=<?php echo base64_encode($produk['kodedetil']) ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo $produk['namadetil']?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $produk['namabarang']?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="assets/images/<?php echo $images?>">
									<div class="wrap-pic-w pos-relative">
										<img src="assets/images/<?php echo $images?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="assets/images/<?php echo $images?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $produk['namabarang']?>
						</h4>

						<span class="mtext-106 cl2">
							<?php echo 'Rp. '.number_format($produk['harga'],2,',','.')?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $produk['deskripsiSingkat']?>
						</p>
						
						<!--  -->
						<div class="p-t-10">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Stok
								</div>

								<div class="size-204 respon6-next">
										<?php echo $produk['stok']?>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
		            				<form class="form-inline" action="proses/addKeranjang.php" method="post">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input  class="mtext-104 cl3 txt-center num-product" type="number" name="banyak" id="quantity" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
											<input type="hidden" value="<?php echo $produk['kodebarang']; ?>" name="id">
							           		<input type="hidden" value="<?php echo $slug; ?>" name="nama">
											<input type="hidden" value="<?php echo $produk['stok']; ?>" name="stok">
							           		
										</div>
										<?php echo ($produk['stok']==0)? '<a disabled onclick="habis()" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" style="color:#fff">Add to cart</a>' : '<button type="submit"  class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">Add to cart</button>'?> 
										
									
									</form>

									
								</div>
							</div>	
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
							<?php echo ($produk['deskripsi']!='<p>-</p>')?  $produk['deskripsi']: 'Tidak Ada Deskripsi Pada Produk Ini';?>
									
								</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

			<span class="stext-107 cl6 p-lr-25">
				
				Categories: <?php echo $produk['namadetil']?>
			</span>
		</div>
	</section>
	
	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>

	<script>
function habis() {
   swal({
  title: "Stok Kosong!",
  text: "Tidak dapat menambahkan ke keranjang!!",
  icon: "error",
        confirmButtonColor: "#2196F3",
        confirmButtonText: "Ganti!",
        closeOnConfirm: false
});                                            
   }
</script>