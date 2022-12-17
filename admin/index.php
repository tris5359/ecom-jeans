<?php 
  session_start();
  ob_start();
  require_once("../includes/conn.php");
  $conn = $pdo->open();
  
     try{
      $stmt = $conn->prepare("SELECT * FROM `site`");
      $stmt->execute();
      $sitedata = $stmt->fetch();     
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
    // Checking Session
    if (empty($_SESSION['username'])) {
        header('location: login.php');
    }else{

?>
<!DOCTYPE html>
<html>
<head>
  <?php include("part/head.php"); ?>
  
</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <?php include("part/top-header.php"); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include("part/sidebar.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol 
    </section>-->

    <!-- Main content -->
    <section class="content">
          <?php
                $pages_dir = 'pages';
                if(!empty($_GET['admin'])){
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);
 
                $p = $_GET['admin'];
                if(in_array($p.'.php', $pages)){
                include($pages_dir.'/'.$p.'.php');
                    } else {
                    echo '<h1>Halaman tidak ditemukan! :(</h1>';
                    }
                    } else {
                        include('part/main-page.php');
        }
            ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#"><?php echo $sitedata['sitename'] ?></a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="assets/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
</body>
</html>
<?php } ?>