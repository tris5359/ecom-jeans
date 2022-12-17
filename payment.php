<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
	<title><?php echo $site['sitename'] ?> - Payment</title>
<body class="animsition">
	<!-- navigasi bar -->
	<?php include 'includes/navbar.php'; ?>
	<!-- Sidebar -->
	<?php include 'includes/sidebar.php'; ?>
	<!-- Cart -->
	<?php include 'includes/cart.php'; ?>

  <?php
  $conn = $pdo->open();
  $output ='';
  $output2 ='';   
  $i = 1;

if(isset($_SESSION['user'])){
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
        <tr >
                  <td >
                  <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t ">
                    
                    <a href="proses/deleteCart.php?Act='.$row['idcart'].'&mod='.$row['namabarang'].'&rl='.$_SERVER['REQUEST_URI'].'" class="header-cart-item-img">

                      <img src="'.$image.'" alt="IMG">
                    </a>
                    </li>
                    </ul>
                  </td>
                  <td class="column-2">'.$row['namabarang'].'</td>
                  <td >Rp. '.number_format($row['hargabarang'],2,',','.').' x <input class="mtext-104 cl3 txt-center num-product" type="number" id="idqty'.$i.'" name="num-product1" value="'.$row['banyak'].'" readonly></td>
                 
                  <td class="">
                  <input type="text" style="width:80px !important" id="idtotal'.$i.'" value="'.number_format($subtotal, 2,',','.').'">
                  </td>                </tr>

        ';

        $i++;

      }
        $output2 .= '<tr class="table_row" ><td colspan="3" align="right">Total Belanja:  Rp.</td><td>'.number_format($total,2,',','.').'</td></tr> ';


    }else{
      $output .= '
        <tr class="table_row" ><td colspan="4" align="center">Keranjang Belanja Kosong</td></tr>
      ';
    }

    } 
    catch(PDOException $e){
      $output .= $e->getMessage();
    }}

?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('assets/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Payment
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-50 " >
		<div class="container" >
			<?php
                if(isset($_SESSION['user'])){
                	?>
                	<div class="site-section" >
                    <div class="container" ><br>
                      
                      <div class="row m-b-100" style="padding: 0px;">
                        <div class="callout" id="callout" style="display:none">
                              <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                              <span class="message"></span>
                            </div>
                        <div class="col-md-6 mb-5 mb-md-0" style="padding: 0px">
                          <h2 class="h3 mb-3 text-black" style="border-left: 5px solid #61A8DC; padding-left: 5px; font-family: Poppins-Bold;">Pembayaran</h2><br>
                          <div class="p-r-20">
                            <form class="form-horizontal" method="POST" action="proses/pembayaran.php" enctype="multipart/form-data">
                            <div class="form-group row">
                              <div class="col-md-6">
                                <div class="bor8  how-pos4-parent">
          					              <input class="stext-111 cl2 plh3 size-116 p-l-10"  type="text" id="nama_depan" name="nama_depan" placeholder="Nama Depan" required>
          					            </div>
                              </div>
                              <div class="col-md-6">
                                <div class="bor8  how-pos4-parent">
          					              <input class="stext-111 cl2 plh3 size-116 p-l-10" type="text" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" required>
          					            </div>
                              </div>
                            </div>


                            <div class="form-group row">
                              <div class="col-md-12">
                                <div class="bor8  how-pos4-parent">
          					              <input class="stext-111 cl2 plh3 size-116 p-l-10" type="text" id="alamatp" name="alamatp" placeholder="Alamat Penerima" required>
          					            </div>
                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-md-6">
                              <div class="bor8  how-pos4-parent">
        					              <input class="stext-111 cl2 plh3 size-116 p-l-10" type="text"  id="daerah" name="daerah" placeholder="Daerah/Provinsi penerima" required>
        					            </div>

                              </div>
                              <div class="col-md-6">
                                <div class="bor8  how-pos4-parent">
          					              <input class="stext-111 cl2 plh3 size-116 p-l-10" onkeypress="return hanyaAngka(event)" type="text" id="pos" name="pos" placeholder="Kode Pos" required>
          					            </div>
                                  <span id="pesan_no" style="text-transform: capitalize;color: red;font-size:12px"></span>
                                
                              </div >
                            </div>

                            <div class="form-group row mb-5">
                              <div class="col-md-6">
                              <div class="bor8  how-pos4-parent">
        					              <input class="stext-111 cl2 plh3 size-116 p-l-10" type="email" id="email" name="email" placeholder="Email" required>
        					            </div>
                              </div>
                              <div class="col-md-6">
                               <div class="bor8  how-pos4-parent">
        					              <input class="stext-111 cl2 plh3 size-116 p-l-10" onkeypress="return hanyaAngka2(event)" type="text" id="no_tlp" name="no_tlp" placeholder="No Telepon" required>
        					            </div>
                                <span id="pesan_no2" style="text-transform: capitalize;color: red;font-size:12px"></span>

                              </div>
                            </div>
                            <div class="form-group">
                              <div class="bor8  how-pos4-parent">
        					              <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="catatan" id="catatan"  placeholder="Tulis catatan Anda di sini ..." required></textarea>
        					            </div>
                            </div>

                          </div>
                        </div>
                        <div class="col-md-6">
                          
                              <h2 class="h3 mb-3 text-black" style="border-left: 5px solid #61A8DC; padding-left: 5px;font-family: Poppins-Bold;" >Keranjang</h2><br>
                              <div class="m-b-50">
                                 <table class="table table-bordered">
                                  <thead  >
                                  <th>Gambar</th>
                                  <th>Produk</th>
                                  <th>Harga</th>
                                  <th>Subtotal</th>
                                </thead>

                                  <?php echo $output ?>
                                  <?php echo $output2 ?>

                                  
                                </table>
                                  <button class="flex-c-m stext-101 cl0 size-121 bg3 m-t-60 bor1 hov-btn3 p-lr-15 trans-04 pointer" id="bayar" name="bayar">
                          Bayar
                        </button>
                                </div>
                               

                                
                             </div>
                           </form>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>



                   
                     

                	<?php

                }
                  else{?>
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
		<?php }?>
		</div>
	</section>	
	
	


	<!-- Footer -->
	<?php include 'includes/footer.php'; ?>
	<?php include 'includes/scripts.php'; ?>

  <script type="text/javascript">
     function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no").html("Hanya diperbolekan angka pada kode pos").show().delay(2000).fadeOut("slow");
                return false;}};
                function hanyaAngka2(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
          {
                $("#pesan_no2").html("Hanya diperbolekan angka pada nomor telepon").show().delay(2000).fadeOut("slow");
                return false;}}
  </script>