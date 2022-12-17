<?php 
	#require_once('../content/dbconfig.php');
	if (isset($_POST['inputProduk'])) {
		$namaBarang = $_POST['NamaBarang'];
		$hargaBarang = $_POST['Harga'];
		$stok = $_POST['stok'];
		$deskripsi = $_POST['Deskripsi'];
		$deskripsi2 = $_POST['Deskripsi2'];
		$kodeDetil = $_POST['kodedetil'];
		$image = $_FILES['foto']['name'];
		$tmp_img = $_FILES['foto']['tmp_name'];

		if (empty($image)) {
			?>
			<script type="text/javascript">
				alert('Please fill the blank. ');
				window.history.go(-1);
			</script>
			<?php
		}else{
			if (file_exists($image)) {
				try{
			      $stmt = $conn->prepare("INSERT INTO `tb_barang`(`kodedetil`, `namabarang`, `harga`, stok, deskripsiSingkat, `deskripsi`, `foto`) VALUES ('$kodeDetil','$namaBarang','$hargaBarang', '$stok', '$deskripsi', '".$deskripsi2."','$image') ");
			      $stmt->execute(); 
			      if ($stmt) {
				?>
					<script>
						alert('Success inputed.');
						window.location="index.php?admin=viewproducts";
					</script>
				<?php
				} else {
				?>
					<script>
						alert('Failed input.');
						window.history.go(-1);
					</script>
				<?php
				}

			    }
			    catch(PDOException $e){
			     echo $e->getMessage();
			    }
				
				
			} else {
				try{
			      $stmt = $conn->prepare("INSERT INTO `tb_barang`(`kodedetil`, `namabarang`, `harga`, stok, deskripsiSingkat, `deskripsi`, `foto`) VALUES ('$kodeDetil','$namaBarang','$hargaBarang', '$stok', '$deskripsi', '".$deskripsi2."','$image') ");
			      $stmt->execute();   
			      move_uploaded_file($tmp_img, "../assets/images/".$image);
				if ($stmt) {
				?>
					<script>
						alert('Success inputed.');
						window.location="index.php?admin=viewproducts";
					</script>
				<?php
				} else {
				?>
					<script>
						alert('Failed input.');
						window.history.back();
					</script>
				<?php
				}

			    }
			    catch(PDOException $e){
			     echo $e->getMessage();
			    }
				
			}
			
		}
	}

 ?>