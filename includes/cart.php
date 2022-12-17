
	<?php
	$conn = $pdo->open();
	$output ='';
	$output2 ='';

	if(isset($_SESSION['user'])){
		if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $row){
				$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan=:kodepelanggan AND kodebarang=:kodebarang");
				$stmt->execute(['kodepelanggan'=>$user['kodepelanggan'], 'kodebarang'=>$row['produkid']]);
				$crow = $stmt->fetch();
				if($crow['numrows'] < 1){
					$stmt = $conn->prepare("INSERT INTO tb_keranjang (kodepelanggan, kodebarang, banyak) VALUES (:kodepelanggan, :kodebarang, :banyak)");
					$stmt->execute(['kodepelanggan'=>$user['kodepelanggan'], 'kodebarang'=>$row['produkid'], 'banyak'=>$row['banyak']]);
				}
				else{
					$stmt = $conn->prepare("UPDATE tb_keranjang SET banyak=:banyak WHERE kodepelanggan=:kodepelanggan AND kodebarang=:kodebarang");
					$stmt->execute(['banyak'=>$row['banyak'], 'kodepelanggan'=>$user['kodepelanggan'], 'kodebarang'=>$row['produkid']]);
				}
			}
			unset($_SESSION['cart']);
		}

		try{
			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM tb_keranjang WHERE kodepelanggan=:kodepelanggan ");
				$stmt->execute(['kodepelanggan'=>$user['kodepelanggan']]);
				$jumbarang = $stmt->fetch();
			if ($jumbarang['numrows'] != 0) {
			$total = 0;
			$stmt = $conn->prepare("SELECT *, tb_barang.harga as hargabarang, tb_keranjang.id as idcart FROM tb_keranjang LEFT JOIN tb_barang ON tb_barang.kodebarang=tb_keranjang.kodebarang WHERE tb_keranjang.kodepelanggan=:kodepelanggan");
			$stmt->execute(['kodepelanggan'=>$user['kodepelanggan']]);
			foreach($stmt as $row){
				$image = (!empty($row['foto'])) ? 'assets/images/'.$row['foto'] : 'assets/images/noimage.jpg';
				$subtotal = $row['hargabarang']*$row['banyak'];
				$total += $subtotal;
				$output .= '
					<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="proses/deleteCart.php?Act='.$row['idcart'].'&mod='.$row['namabarang'].'&rl='.$_SERVER['REQUEST_URI'].'" class="header-cart-item-img">
							<img src="'.$image.'" alt="IMG">
						</a>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								'.$row['namabarang'].'
							</a>

							<span class="header-cart-item-info">
								'.$row['banyak'].' x '.number_format($row['hargabarang'],2,',','.').'
							</span>
						</div>
					</li>
				</ul>

				';

			}
				$output2 .= "Total Belanja:  Rp. ".number_format($total,2,',','.');


		}else{
			$output .= "
				Keranjang Belanja Kosong
			";
		}

		}	
		catch(PDOException $e){
			$output .= $e->getMessage();
		}

	}
	else{
		if(isset($_SESSION['cart'])){
		if(count($_SESSION['cart']) != 0){
			$total = 0;
			foreach($_SESSION['cart'] as $row){
				$stmt = $conn->prepare("SELECT *, tb_barang.harga as hargabarang FROM tb_barang LEFT JOIN tb_detilkategori ON tb_detilkategori.kodedetil=tb_barang.kodedetil WHERE tb_barang.kodebarang=:id");
				$stmt->execute(['id'=>$row['produkid']]);
				$produk2 = $stmt->fetch();
				$image = (!empty($produk2['foto'])) ? 'assets/images/'.$produk2['foto'] : 'assets/images/noimage.jpg';
				$subtotal = $produk2['hargabarang']*$row['banyak'];
				$total += $subtotal;
				$output .= '
					<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="proses/deleteCart.php?Act='.$row['produkid'].'&mod='.$produk2['namabarang'].'&rl='.$_SERVER['REQUEST_URI'].'" class="header-cart-item-img">
						
							<img src="'.$image.'" alt="IMG">
						</a>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								'.$produk2['namabarang'].'
							</a>

							<span class="header-cart-item-info">
								'.$row['banyak'].' x '.number_format($produk2['hargabarang'],2,',','.').'
							</span>
						</div>
					</li>
				</ul>

				';
			}
			$output2 .= "Total Belanja:  Rp. ".number_format($total,2,',','.');
		}
		else{
			$output .= "
				Keranjang Belanja Kosong
			";
		}
	}
	else{
			$output .= "
				Keranjang Belanja Kosong
			";
		}


		
	}


?>


<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Keranjang
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<?php echo $output ?>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						<?php echo  $output2 ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="index.php?View=shoping-cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="index.php?View=payment" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

