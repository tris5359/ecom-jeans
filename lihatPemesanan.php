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
	      <!-- Main content -->
	      <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assets/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Track Oder
		</h2>
	</section>	
	      <div style="width: 96%;margin-left: 2%;box-shadow: 0px 30px 10px 1px #333">
	      <section class="content m-t-50" >
	      	

	           <?php
	       			
	       			$conn = $pdo->open();

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM tb_pemesanan WHERE kodetransaksi LIKE :keyword");
	       			$stmt->execute(['keyword' => $_POST['keyword']]);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '
	       				
	       				<div class="  row"  >
				<div class="col-md-3 " ></div>
				<div class="col-md-6 p-lr-30 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<h1 style="margin-left:25px;font-size:18px;margin-bottom:30px">Kode pemesanan anda tidak valid!</h1>
					<form action="lihatPemesanan" method="POST" style="width: 500px;margin-left: 20px;">
            
            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-15 p-r-30" type="text" id="kd_bayar" name="keyword" placeholder="Masukan Kode Transaksi" required>
            </div>
           
            

            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="lihat">
              Lihat
            </button>
          </form>
				</div>
			</div>
	       				';
	       			}
	       			else{
		       			try{
						    $stmt = $conn->prepare("SELECT *, tb_barang.harga as hargabarang, vnota.banyak as banyakbarang  FROM vnota LEFT JOIN tb_barang ON vnota.kodebarang=tb_barang.kodebarang LEFT JOIN tb_pemesanan ON tb_pemesanan.idpemesanan=vnota.idpemesanan WHERE tb_pemesanan.kodetransaksi LIKE :keyword");
						    $stmt->execute(['keyword' => $_POST['keyword']]);
						    $row = $stmt->fetch();
						    $tglkirim = ($row['tglkirim']!='0000-00-00')? date('d F Y', strtotime($row['tglkirim'])) : 'Belum di kirim';
					 		echo "<div style='margin-left: 100px;'>
                          	kode pemesanan <b style='font-size:20px'>".$row['kodetransaksi']."</b> pada tanggal <b style='font-size:20px'>".date('d F Y', strtotime($row['tglbeli']))."</b> sudah <b style='font-size:20px'>di ".$row['status']."</b></div><br><br><br>
                          	<p style='text-align:center; font-size:18px; '> Informasi Penerima </p>
                          	<table  class='table table-bordered' style='width:80%; margin-left:10%'>
			                <thead style='background-color: #E5E5E5'>
			                  <th class='hidden'></th>
			                  <th>Nama Penerima</th>
			                  <th>No Telpon</th>
			                  <th>Kode Pos</th>
			                  <th>Alamat</th>
			                  <th>Daerah</th>
			                  <th>Tanggal Beli</th>
			                  <th>Tanggal Kirim</th>
			                </thead>
			                <tbody style='background-color: rgba(0,0,0,0.05);'>
			                <tr>
                            <td class='hidden'></td>
                            
                            <td>".$row['namadepan'].' '.$row['namabelakang']."</td>
                            <td>".$row['notlp']."</td>
                            <td>".$row['kdpos']."</td>
                            <td>".$row['alamatpenerima']."</td>
                            <td>".$row['daerah']."</td>
                            <td>".date('d F Y', strtotime($row['tglbeli']))."</td>
                            <td>".$tglkirim."</td>
                          </tr>
                          </tbody>
             			 </table>";
             			 echo "<br><br><p style='text-align:center; font-size:18px; '> Informasi Produk </p>
             			 		<table class='table table-bordered' style='width:80%; margin-left:10%'>
				                <thead style='background-color: #E5E5E5'>
				                  <th>Produk</th>
				                  <th>Harga</th>
				                  <th>Jumlah</th>
				                  <th>Subtotal</th>
				                </thead>
				                <tbody style='background-color: rgba(0,0,0,0.05);'>";
             			 $total = 0;
             			 $stmtx = $conn->prepare("SELECT *, tb_barang.harga as hargabarang, vnota.banyak as banyakbarang  FROM vnota LEFT JOIN tb_barang ON vnota.kodebarang=tb_barang.kodebarang LEFT JOIN tb_pemesanan ON tb_pemesanan.idpemesanan=vnota.idpemesanan WHERE tb_pemesanan.kodetransaksi LIKE :keyword");
						    $stmtx->execute(['keyword' => $_POST['keyword']]);
						foreach($stmtx as $row2){
							$transaction = $row2['kodetransaksi'];
							$datebeli = date('d F Y', strtotime($row2['tglbeli']));
							$subtotal = $row2['hargabarang']*$row2['banyakbarang'];
							$total += $subtotal;
							echo "
								<tr class='prepend_items'>
									<td>".$row2['namabarang']."</td>
									<td>Rp. ".number_format($row2['hargabarang'],2,',','.')."</td>
									<td>".$row2['banyakbarang']."</td>
									<td>Rp. ".number_format($subtotal,2,',','.')."</td>
								</tr>
							";
						}
						echo "<tr>
			                    <td colspan='3' align='right'><b>Total</b></td>
			                    <td>Rp. ".number_format($total,2,',','.')."</td>
			                  </tr>
			                </tbody>
			              </table><br><br>";
						    }
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}
					}

					$pdo->close();

	       		?>
	    	</div>
			
		</div>
	</section>	
	
	


	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>