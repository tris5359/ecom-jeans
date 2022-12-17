<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site['sitename'] ?> - Home</title>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>
	<!-- Slider -->
	<?php include 'includes/slider.php'; ?>
	<!-- Banner -->
	

	<!-- Product -->
	<section class="sec-product  p-b-50" style="background-color: #f5f5f5">
	<?php include 'includes/banner.php'; ?>

		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Store Overview
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Produk Terlaris</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Produk Favorit</a>
					</li>

					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Pencarian Populer</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-50">
					<!-- - -->
					<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">


								<?php             	
					                $conn = $pdo->open();	
					  			$now = date('Y-m-d');

					                try{
					                  $stmt = $conn->prepare("SELECT *, SUM(banyak) AS total_qty FROM vnota LEFT JOIN tb_barang ON vnota.kodebarang=tb_barang.kodebarang LEFT JOIN tb_pemesanan ON tb_pemesanan.idpemesanan=vnota.idpemesanan  GROUP BY vnota.kodebarang ORDER BY total_qty DESC LIMIT 10");
					               		$stmt->execute();
					                  foreach($stmt as $row){
										$image = (!empty($row['foto'])) ? 'assets/images/'.$row['foto'] : 'assets/images/noimage.jpg';

					                  	?>
					                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
													<!-- Block2 -->
													<div class="block2">
														<div class="block2-pic hov-img0">
															<img src="<?php echo $image ?>" style="height: 320px" alt="IMG-PRODUCT">

															<a href="product-detail.php?Product=<?php echo $row['namabarang'] ?>&id=<?php echo $row['kodebarang']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " >
																View Product
															</a>
														</div>

														<div class="block2-txt flex-w flex-t p-t-14">
															<div class="block2-txt-child1 flex-col-l ">
																<a href="product-detail.php?Product=<?php echo $row['namabarang'] ?>&id=<?php echo $row['kodebarang']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
																	<?php echo $row['namabarang'];?>
																</a>

																<span class="stext-105 cl3">
																	Rp. <?php echo number_format($row['harga'],2,',','.')?>
																</span>
															</div>

															<div class="block2-txt-child2 flex-r p-t-3">
																<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
																	<img class="icon-heart1 dis-block trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
																	<img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/images/icons/icon-heart-02.png" alt="ICON">
																</a>
															</div>
														</div>
													</div>
												</div>

					                    <?php          
					                  }
					                }
					                catch(PDOException $e){
					                  echo "There is some problem in connection: " . $e->getMessage();
					                }
					                $pdo->close();
					              ?>

							
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="featured" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								<?php             	
					                $conn = $pdo->open();	
					  			$now = date('Y-m-d');

					                try{
					                  $stmt = $conn->prepare("SELECT *, SUM(banyak) AS total_qty FROM tb_keranjang LEFT JOIN tb_barang ON tb_keranjang.kodebarang=tb_barang.kodebarang  GROUP BY tb_keranjang.kodebarang ORDER BY total_qty DESC LIMIT 10");
					               		$stmt->execute();
					                  foreach($stmt as $row){
										$image = (!empty($row['foto'])) ? 'assets/images/'.$row['foto'] : 'assets/images/noimage.jpg';

					                  	?>
					                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
													<!-- Block2 -->
													<div class="block2">
														<div class="block2-pic hov-img0">
															<img src="<?php echo $image ?>" style="height: 320px" alt="IMG-PRODUCT">

															<a href="product-detail.php?Product=<?php echo $row['namabarang'] ?>&id=<?php echo $row['kodebarang']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " >
																View Product
															</a>
														</div>

														<div class="block2-txt flex-w flex-t p-t-14">
															<div class="block2-txt-child1 flex-col-l ">
																<a href="product-detail.php?Product=<?php echo $row['namabarang'] ?>&id=<?php echo $row['kodebarang']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
																	<?php echo $row['namabarang'];?>
																</a>

																<span class="stext-105 cl3">
																	Rp. <?php echo number_format($row['harga'],2,',','.')?>
																</span>
															</div>

															<div class="block2-txt-child2 flex-r p-t-3">
																<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
																	<img class="icon-heart1 dis-block trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
																	<img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/images/icons/icon-heart-02.png" alt="ICON">
																</a>
															</div>
														</div>
													</div>
												</div>

					                    <?php          
					                  }
					                }
					                catch(PDOException $e){
					                  echo "There is some problem in connection: " . $e->getMessage();
					                }
					                $pdo->close();
					              ?>

			
							</div>
						</div>
					</div>

					<!-- - -->
					<div class="tab-pane fade" id="sale" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								<?php             	
				                $conn = $pdo->open();	
				  			$now = date('Y-m-d');

				                try{
				                  $stmt = $conn->prepare("SELECT * FROM tb_barang ORDER BY counter DESC LIMIT 10");
				               		$stmt->execute();
				                  foreach($stmt as $row){
									$image = (!empty($row['foto'])) ? 'assets/images/'.$row['foto'] : 'assets/images/noimage.jpg';

				                  	?>
				                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
												<!-- Block2 -->
												<div class="block2">
													<div class="block2-pic hov-img0">
														<img src="<?php echo $image ?>" style="height: 320px" alt="IMG-PRODUCT">

														<a href="product-detail.php?Product=<?php echo $row['namabarang'] ?>&id=<?php echo $row['kodebarang']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " >
															View Product
														</a>
													</div>

													<div class="block2-txt flex-w flex-t p-t-14">
														<div class="block2-txt-child1 flex-col-l ">
															<a href="product-detail.php?Product=<?php echo $row['namabarang'] ?>&id=<?php echo $row['kodebarang']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
																<?php echo $row['namabarang'];?>
															</a>

															<span class="stext-105 cl3">
																Rp. <?php echo number_format($row['harga'],2,',','.')?>
															</span>
														</div>

														<div class="block2-txt-child2 flex-r p-t-3">
															<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
																<img class="icon-heart1 dis-block trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
																<img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/images/icons/icon-heart-02.png" alt="ICON">
															</a>
														</div>
													</div>
												</div>
											</div>

				                    <?php          
				                  }
				                }
				                catch(PDOException $e){
				                  echo "There is some problem in connection: " . $e->getMessage();
				                }
				                $pdo->close();
				              ?>
							</div>
						</div>
					</div>

					<div class="m-b-90"></div>


					<?php
		       			$conn = $pdo->open();

		       			try{
						    $stmt = $conn->prepare("SELECT * FROM tb_detilkategori LIMIT 5");
						    $stmt->execute();
						    foreach ($stmt as $row) {	
		       		?> 
					<div class="wrap-slick2 m-t-40 m-b-10" style="background-color: #fff;">
						<div class="">
							<h3 class="ltext-105 cl5  respon1 p-t-30 p-l-20" style="font-size: 30px;font-family: Poppins-Bold">
								<?php echo $row['namadetil'];?>
								<a href="category.php?Kategori=<?php echo $row['namadetil'].'&Mod='.base64_encode($row['kodedetil']) ?>" class="flex-c-m stext-101 cl0 p-t-7 p-b-7 m-t-5 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer m-r-20" style="width: 15%;float: right;">Lihat Semua</a>
							</h3>
							<hr >
						</div>
						<div class="slick2">
							<!--product-->
							<?php

				       			try{
								    $stmt = $conn->prepare("SELECT * FROM tb_barang WHERE kodedetil = :KD ORDER BY tb_barang.kodebarang DESC LIMIT 8");
								    $stmt->execute(['KD'=>$row['kodedetil']]);
								    foreach ($stmt as $row2) {
								    	$image = (!empty($row2['foto'])) ? 'assets/images/'.$row2['foto'] : 'assets/images/noimage.jpg';
				       		?> 
								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img src="<?php echo $image ?>" style="height: 320px" alt="IMG-PRODUCT">

											<a href="product-detail.php?Product=<?php echo $row2['namabarang'] ?>&id=<?php echo $row2['kodebarang']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 " >
												View Product
											</a>
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="product-detail.php?Product=<?php echo $row2['namabarang'] ?>&id=<?php echo $row2['kodebarang']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
													<?php echo $row2['namabarang'];?>
												</a>

												<span class="stext-105 cl3">
													Rp. <?php echo number_format($row2['harga'],2,',','.')?>
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="assets/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="assets/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								    
								}
								catch(PDOException $e){
									echo "There is some problem in connection: " . $e->getMessage();
								}
								?>

							</div>
						</div>
					<?php }
						    
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();
		       		?> 


				</div>
			</div>
		</div>

	<div class="m-b-100"></div>
	</section>



	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>

	