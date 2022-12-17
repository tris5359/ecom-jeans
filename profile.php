<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site['sitename'] ?> - Profile</title>
<body class="animsition" >
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>

	<!-- Title page -->
	


	<!-- Content page -->
	<section class="bg0 " >
		<div class="container" style="box-shadow: 1px 20px 30px 2px #ccc">
			<?php
			if(!isset($_SESSION['user'])){
			 	?>
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
			 	<?php
			 } else{
			?>
			<section class=" p-tb-72" style="background-color: #333 !important;">
		          <div class="row " style="margin-top: -20px">
		          	<div class="col-md-3" >
		          		<!-- item gallery sidebar -->
			            <div class="wrap-item-gallery " style="text-align: center;">
			              <a class=" bg-img1" href="assets/images/<?php echo (!empty($user['foto']))? $user['foto'] : 'profile.jpg'?>" data-lightbox="gallery" 
			              style="margin-left: 100%">
			                <img src="assets/images/<?php echo (!empty($user['foto']))? $user['foto'] : 'profile.jpg'?>" width="200" height="200" style="position: absolute;border-radius: 100px;margin-top: -30px;box-shadow: 1px 5px 20px 1px #333;border:2px solid #fff">
			              </a>
			            </div>  
		          	</div>
		          	<div class="col-md-7" style="color: #fff;">
		          		 <div > 
                               <table style="font-family:andalus;font-size:16px;color: #999;width: 100%">
                                   <tr>
                                    <td><p style="margin-top: 20px; font-size:28px;font-family:andalus;color:#fff;position: relative;"><?php echo $user['namadepan'].' '. $user['namabelakang']; ?>
                                     </p></td>
                                    </tr>
                                    <tr>
                                   <td style="width:60px" class="p-t-6"><i class="fa fa-phone" ></i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($user['nomorhp'])) ? $user['nomorhp'] : 'No Telepon belum di update'; ?></p ></td>
                                   </tr>
                                   <tr>
                                  <td style="width:60px" class="p-t-6"><i class="fa fa-envelope" ></i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($user['email'])) ? $user['email'] : ' Email belum di update '; ?></p ></td>
                                 </tr>
                                 <tr>
                                 <td style="width:60px" class="p-t-6"><i class="fa fa-map-marker" ></i> <p style="margin-top:-27px;margin-left:30px;"><?php echo (!empty($user['alamat'])) ? $user['alamat'] : 'Alamat belum di update'; ?></p ></td>
                                 </tr>
							</table>   
                         </div>
		          	</div>
		          </div>       
			</section>
			<div class="box box-solid p-lr-50 p-tb-72" style="font-family: andalus">
	        			<div class="box-header with-border m-b-10">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Daftar Transaksi</b></h4>
	        			</div>
	        			<div class="box-body" style="font-size: 16px">
	        				<table class="table table-bordered" id="example1">
	        					<thead>
	        						<th class="hidden"></th>
	        						<th>Tanggal</th>
	        						<th>Kode Transaksi</th>
	        						<th>Nominal</th>
	        						<th>Detail</th>
	        					</thead>
	        					<tbody>
	        					<?php
	        						$conn = $pdo->open();
	        						$i=1;

	        						try{
	        							$stmt = $conn->prepare("SELECT * FROM tb_pemesanan WHERE kodepelanggan=:user_id ORDER BY tglbeli DESC");
	        							$stmt->execute(['user_id'=>$user['kodepelanggan']]);
	        							foreach($stmt as $row){
	        								$stmt2 = $conn->prepare("SELECT * FROM vnota LEFT JOIN tb_barang ON tb_barang.kodebarang=vnota.kodebarang WHERE idpemesanan=:id");
	        								$stmt2->execute(['id'=>$row['idpemesanan']]);
	        								$total = 0;
	        								foreach($stmt2 as $row2){
	        									$subtotal = $row2['harga']*$row2['banyak'];
	        									$total += $subtotal;

	        								}?>
	        									<tr>
	        										<td class='hidden'><?php echo $i?></td>
	        										<td><?php echo date('d F Y', strtotime($row['tglbeli']))?></td>
	        										<td><?php echo $row['kodetransaksi']?></td>
	        										<td>Rp. <?php echo number_format($total,2,',','.')?></td>
	        										<td>
	        											<a href="#transaction<?php echo $row['idpemesanan']?>"  data-toggle="modal" data-target="#transaction<?php echo $row['idpemesanan']?>"  class="btn btn-sm btn-flat btn-primary transact"><i class='fa fa-search'></i>
														View
													</a>
	        										</td>
	        									</tr>


	        			<div class="modal fade" id="transaction<?php echo $row['idpemesanan']?>" tabindex="-1" role="dialog" >
						   <div class="modal-dialog m-t-80" >
					        <div class="modal-content" style="width: 700px;margin-left: -25%">
					            <div class="modal-header">
					              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                  <span aria-hidden="true">&times;</span></button>
					              <h4 class="modal-title"><b>Daftar Pembelanajaan</b></h4>
					            </div>
					            <div class="modal-body">
					              <p>
					                Tanggal: <span id="date"><?php echo date('d F Y', strtotime($row['tglbeli'])) ?> </span>
					                <span class="pull-right">Kode Transaksi: <span id="transid"> <?php echo $row['kodetransaksi']?></span></span> 
					              </p>
					              <div class="row m-lr-10 m-t-30">
					              	<div class="col-md-5 table-bordered p-t-6 p-b-6">Produk</div>
					              	<div class="col-md-2 table-bordered p-t-6 p-b-6">Harga</div>
					              	<div class="col-md-2 table-bordered p-t-6 p-b-6">Quantity</div>
					              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Subtotal</div>
					              </div>
					              <?php
					              $stmt3 = $conn->prepare("SELECT * FROM vnota LEFT JOIN tb_barang ON tb_barang.kodebarang=vnota.kodebarang WHERE idpemesanan=:id");
	        								$stmt3->execute(['id'=>$row['idpemesanan']]);
	        								$total = 0;
	        								foreach($stmt3 as $row3){
	        									$subtotal = $row3['harga']*$row3['banyak'];
	        									$total += $subtotal;
	        								echo '<div class="row m-lr-10">
										            <div class="col-md-5 table-bordered p-t-6 p-b-6">'.$row3['namabarang'].'</div>
										        	<div class="col-md-2 table-bordered p-t-6 p-b-6">'.number_format($row3['harga'],2,',','.').'</div>
										          	<div class="col-md-2 table-bordered p-t-6 p-b-6">x'.$row3['banyak'].'</div>
										            <div class="col-md-3 table-bordered p-t-6 p-b-6">'.number_format($subtotal,2,',','.').'</div>
										           </div>';	}?>
								              <div class="row m-lr-10 ">
								              	<div class="col-md-9 table-bordered p-t-6 p-b-6">Total</div>
								              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Rp. <?php echo number_format($total,2,',','.')?></div>
								              </div>
								            </div>
								            <div class="modal-footer">
								              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
								            </div>
								        </div>
								    </div>
									</div>
	        								

									<?php
	        								$i++;
	        							}

	        						}
        							catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}

	        						$pdo->close();
	        					?>
	        					</tbody>
	        				</table>
	        			</div>
	        		</div>
	        	<?php }?>
			
		</div>
	</section>	
	
	


	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>