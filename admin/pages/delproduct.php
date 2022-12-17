<?php
require_once("../includes/conn.php");;
	$id = $_GET["id"];

	try{
      $stmt = $conn->prepare("SELECT `foto` FROM `tb_barang` WHERE `kodebarang`='$id'");
      $stmt->execute(); 
      $gambar = $stmt->fetch();     

    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

	$file = $gambar['foto'];
	$path = "../assets/images/".$file;

	//chmod($path, 0777);
	unlink($path);
	try{
      $hasilz = $conn->prepare("DELETE FROM `tb_barang` WHERE `kodebarang`='$id'");
      $hasilz->execute(); 
      if ($hasilz) {
	?>
		<script type="text/javascript">
			alert('Deleted. ');
			window.location.href="index.php?admin=viewproducts";
		</script>
	<?php
	echo $path;
		
	}else{
	?>
		<script>
			alert('Cant delete. ');
			window.location.href="index.php?admin=viewproducts";
		</script>
	<?php
	}   

    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
	
	
	//header("location:menu2.php?menu=viewbarang2");
?>