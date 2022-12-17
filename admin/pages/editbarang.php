<?php
		$id = $_GET["id"];
	try{
      $stmt = $conn->prepare("SELECT * FROM  tb_detilkategori");
      $stmt->execute(); 
      $hasil = $stmt->fetch();    
      $stmtt = $conn->prepare("SELECT * FROM tb_barang where kodebarang='$id'");
      $stmtt->execute(); 
      $baris = $stmtt->fetch();   

    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
		$namabarang = $baris['namabarang'];
		$harga = $baris['harga'];
		$deskripsi = $baris['deskripsi'];

		if (isset($_POST['edit'])){
			$namabarang1 = $_POST['NamaBarang'];
			$harga1 = $_POST['harga1'];
			$deskripsi1 = $_POST['Deskripsi'];
			$stok = $_POST['stok'];
			$deskripsi2 = $_POST['Deskripsi2'];
			
			$foto = $_FILES['foto']['name'];
			$file = $baris['foto'];

		      if(!empty($foto)){
		        move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/'.$foto);
		        $foto2 = $foto;  
		        $path = "../assets/images/".$file;
				unlink($path);
		      }
		      else{
		        $foto2 = $baris['foto'];
		      }

			try{
			      $stmt = $conn->prepare("UPDATE tb_barang 
						set namabarang='$namabarang1',harga='$harga1', stok='$stok', deskripsiSingkat='$deskripsi1', deskripsi='".$deskripsi2."', foto='$foto2' where kodebarang='$id'");
			      $stmt->execute(); 
			      $hasil = $stmt->fetch();    

			    }
			    catch(PDOException $e){
			     echo $e->getMessage();
			    }
			if ($hasil){
	?>
				<script language="JavaScript">alert("Data Berhasil Diupdate");
				window.location="index.php?admin=viewproducts";	
				</script>
	<?php	
			}else{
	?>
				<script language="JavaScript">alert("Data Gagal Diupdate");
				window.location="index.php?admin=viewproducts";	
				</script>
	<?php
			}
		}
	?>

				<div class="row">
					<div class="col-lg-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Edit Products Form</h3>
							</div>
							<div class="box-body">
								<form method="post" enctype="multipart/form-data">
									<fieldset class="form-group">
										<label for="NamaBarang">Nama Barang</label>
										<input type="text" class="form-control" name="NamaBarang" placeholder="Nama Barang" value="<?php echo $namabarang; ?>">
									</fieldset> 
									<fieldset class="form-group">
										<label for="haga">Harga</label>
										<input type="text" class="form-control" name="harga1" placeholder="Harga" value="<?php echo $harga; ?>">
									</fieldset>
									<fieldset class="form-group">
										<label for="haga">Stok Barang</label>
										<input type="number" class="form-control" name="stok" placeholder="Stok Barang" value="<?php echo $baris['stok'];?>">
									</fieldset>
									<fieldset class="form-group">
										<label for="Deskripsi">Deskripsi Singkat</label>
										<textarea type="text" class="form-control" name="Deskripsi" placeholder="Deskripsi Singkat"><?php echo $baris['deskripsiSingkat'];?></textarea>
									</fieldset>
									<fieldset class="form-group">
										<label for="Deskripsi">Deskripsi Detail</label>
										<textarea type="text" class="form-control" name="Deskripsi2" placeholder="Deskripsi Detail"><?php echo $deskripsi;?></textarea>
									</fieldset>
									<fieldset class="form-group">
										<label class="control-label">Pilih Foto</label>
										<input name="foto" type="file" class="file btn btn-warning">
									</fieldset>
									<fieldset class="form-group">
										<input type="submit" value="submit" name="edit" class="btn btn-success">
										<input type="reset" value="reset" class="btn btn-info">
									</fieldset>
								</form>
							</div>
						</div>
						
					</div>
				</div>