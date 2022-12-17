<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>
  <title><?php echo $site['sitename'] ?> - Payment Success</title>
<body class="animsition">
  <!-- navigasi bar -->
  <?php include 'includes/navbar.php'; ?>
  <!-- Sidebar -->
  <?php include 'includes/sidebar.php'; ?>
  <!-- Cart -->
  <?php include 'includes/cart.php'; ?>

<div style="width: 96%;margin-left: 2%;box-shadow: 0px 10px 10px 1px #333;font-family: andalus">
        <div class="row" style="margin-top: 60px; margin-bottom: 30px">
          <div class="col-md-12 text-center">
            <span style="font-size: 100px; "><i class="fa fa-check-circle" aria-hidden="true" style="color:green"></i></span>
            <h2 class="display-3 text-black" style="font-size: 45px;color: #000">Thank you!</h2>
            <p class="lead mb-5" style="font-size: 18px">Pemesanan Produk berhasil.</p>
            <p class="lead mb-5 m-t-10" style="font-size: 18px;">Kode Transaksi Anda<br><b style="color: red"><?php echo $_GET['code'] ?></b></p>
            
            <a href='index.php?View=home' type='button' class='flex-c-m stext-101 cl0 size-119 bg3 m-lr-auto bor14 hov-btn3 p-lr-15 trans-04 pointer' style='width:170px;'>Kembali Belanja</a>
          </div>
    </div><br>
</div>
<!-- Footer -->
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/scripts.php'; ?>
</body>
</html>