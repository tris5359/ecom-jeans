<?php 
$actual_link = $_SERVER['REQUEST_URI'];
$link2 = str_replace('/ryanjeans/', '', $actual_link);
//$link2 = str_replace('/.'$site['sitename'].'/', '', $actual_link);
$actual_link = $_SERVER['PHP_SELF'];
$link = str_replace('/ryanjeans/', '', $actual_link);
//$link2 = str_replace('/.'$site['sitename'].'/', '', $actual_link);
  $outputCART =0;

if(isset($_SESSION['user'])){
  try{
      $cek = $conn->prepare("SELECT count(*) as jumlah FROM tb_keranjang LEFT JOIN tb_barang ON tb_barang.kodebarang=tb_keranjang.kodebarang WHERE tb_keranjang.kodepelanggan=:kodepelanggan");
      $cek->execute(['kodepelanggan'=>$user['kodepelanggan']]);
      $cnt = $cek->fetch();

      $outputCART = $cnt['jumlah'];

     
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
}else if(isset($_SESSION['cart'])){
      $outputCART = count($_SESSION['cart']) ;
  }
?>
<header class="header-v2">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop p-l-45">
          
          <!-- Logo desktop -->   
          <a href="#" class="logo" style="color:#333;font-size: 30px;font-family: sail">
           <img src="assets/images/toko/<?php echo $site['fotoLogo'] ?>" style="box-shadow: 1px 1px 10px 1px #555" alt="IMG-LOGO">
          </a>
          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="<?php echo ($link2=="index.php?View=home" || $link2=="") ? "active-menu" : ''; ?>">
                <a href="index.php?View=home">Home</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=product" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=product">Product</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=Track-oder" || $link2=="lihatPemesanan.php") ? "active-menu" : ''; ?>" >
                <a href="index.php?View=Track-oder">Track Oder</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=payment" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=payment">Payment</a>
              </li>


              <li class="<?php echo ($link2=="index.php?View=about" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=about">About</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=contact" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=contact">Contact</a>
              </li>
            </ul>
          </div>  

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m h-full">
            <div class="flex-c-m h-full p-r-24">
              <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
              </div>
            </div>

              
            <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
              <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $outputCART ?>">
                <i class="zmdi zmdi-shopping-cart"></i>
              </div>
            </div>
              
            <div class="flex-c-m h-full p-lr-19">
              <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                <i class="zmdi zmdi-menu"></i>
              </div>
            </div>
          </div>
        </nav>
      </div>  
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->    
      <div class="logo-mobile" style="color:#333;font-size: 30px;font-family: sail">
           <img src="assets/images/toko/<?php echo $site['fotoLogo'] ?>" style="box-shadow: 1px 1px 10px 1px #555" alt="IMG-LOGO">
        <a href="index.php?View=home"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
        <div class="flex-c-m h-full p-r-10">
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
          </div>
        </div>

        <div class="flex-c-m h-full p-lr-10 bor5">
          <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $outputCART ?>">
            <i class="zmdi zmdi-shopping-cart"></i>
          </div>
        </div>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="main-menu-m">
        <li class="<?php echo ($link2=="index.php?View=home" || $link2=="") ? "active-menu" : ''; ?>">
                <a href="index.php?View=home">Home</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=product" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=product">Product</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=Track-oder" ) ? "active-menu" : ''; ?>" >
                <a href="index.php?View=Track-oder">Track Oder</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=payment" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=payment">Payment</a>
              </li>


              <li class="<?php echo ($link2=="index.php?View=about" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=about">About</a>
              </li>

              <li class="<?php echo ($link2=="index.php?View=contact" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=contact">Contact</a>
              </li>
              
              <li class="<?php echo ($link2=="index.php?View=profile" ) ? "active-menu" : ''; ?>">
                <a href="index.php?View=profile">My Account</a>
              </li>

            </ul>
      </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="assets/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15" action="search" method="post">
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
      </div>
    </div>
  </header>

    <link rel="stylesheet" href="assets/cssNotifikasi.css">

  <?php
      if(isset($_SESSION['error'])){
        echo '
          <div style="margin-top:70px;z-index:1"
           class="notify bar-top do-show" data-notification-status="error">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["error"].'</p> 
          </div>
        ';
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo '
          <div style="margin-top:70px;z-index:1"
          data-status="success" class="notify bar-top do-show" data-notification-status="success">
            <p style="margin-top:10px;font-size:18px;font-family:andalus">'.$_SESSION["success"].'</p> 
          </div>
        ';
        unset($_SESSION['success']);
      }
    ?>
    <script  src="assets/jsnotif.js"></script>
