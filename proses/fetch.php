<?php
if(isset($_POST["limit"], $_POST["start"])){
	$inc = 4;	
 $connect = mysqli_connect("localhost", "root", "", "dbkamping");
 $query = "SELECT * FROM tb_barang  LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result)){
			                  	$images = (!empty($row['foto']))? $row['foto'] : 'noimage.jpg';
			                  	 $inc = ($inc == 4) ? 1 : $inc + 1;
                    if($inc == 1) echo '<div class="row isotope-grid">';

  echo '
   						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$row['kodedetil'].'">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="assets/images/'.$images.'" alt="IMG-PRODUCT">

									<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
										Quick View
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											'.$row['namabarang'].'
										</a>

										<span class="stext-105 cl3">
											Rp. '.number_format($row['harga'],2,',','.').'
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
  ';
  if($inc == 4) echo "</div> ";
 }
}
?>