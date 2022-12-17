<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Kategori
					</h4>

					<ul>
						<?php             	
	                $conn = $pdo->open();	                
	                try{
	                  $stmt = $conn->prepare("SELECT * FROM tb_detilkategori");
	                  $stmt->execute();
	                  foreach($stmt as $row){
	                  	$stmtt = $conn->prepare("SELECT COUNT(*) AS numrows FROM tb_detilkategori a Inner join  tb_barang b ON a.kodedetil=b.kodedetil where a.kodedetil=:idk");
	               		$stmtt->execute(['idk'=>$row['kodedetil']]);
	                	$prow =  $stmtt->fetch();
	                    echo '
	                    <li class="p-b-10">
							<a href="category?Kategori='.$row['namadetil'].'&Mod='.base64_encode($row['kodedetil']).'" class="stext-107 cl7 hov-cl1 trans-04">
								'.$row['namadetil'].'
							</a>
						</li>
	                    ';            
	                  }
	                }
	                catch(PDOException $e){
	                  echo "There is some problem in connection: " . $e->getMessage();
	                }
	                $pdo->close();
	              ?>						
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">					

					<div >
						<a href="#" class="fs-30 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-30 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-30 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-google"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contact Store
					</h4>
					<ul>
						<li class="p-b-10">
							<span class="stext-107 cl7 hov-cl1 trans-04"><i class="fa fa-user m-r-8" aria-hidden="true"></i></span>Email :<br> 
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								<?php echo $site['email'] ?>
							</a>
						</li>

						<li class="p-b-10">
							<span class="stext-107 cl7 hov-cl1 trans-04"><i class="fa fa-phone m-r-8" aria-hidden="true"></i></span>Hubungi Kami :<br> 
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								<?php echo $site['noTlp'] ?>
							</a>
						</li>

						<li class="p-b-10">
							<span class="stext-107 cl7 hov-cl1 trans-04"><i class="fa fa-map-marker m-r-8" aria-hidden="true"></i>  </span>Alamat Toko :<br>
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								<?php echo $site['addressStore'] ?>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<!--<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="assets/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="assets/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="assets/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="assets/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="assets/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>-->
				</div>
				<p class="stext-107 cl6 txt-center" style="margin-bottom: -25px;">
					Copyright&copy; 2020 - <?php echo date("Y");?> by <?php echo $site['sitename'] ?> | All rights reserved 

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	