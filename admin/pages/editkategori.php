<?php 
	$id = $_GET['id'];
	try{
      $stmt = $conn->prepare("SELECT * FROM `tb_detilkategori` WHERE kodedetil = '$id'");
      $stmt->execute();
      $res = $stmt->fetch();     
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

	if (isset($_POST['edit'])) 
	{
		$nama = $_POST['nama'];
		//$kodekat = $_POST['kodekat'];
		$foto = $_FILES['foto']['name'];
		$file = $res['fotoKategori'];

		      if(!empty($foto)){
		        move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/'.$foto);
		        $foto2 = $foto;  
		        $path = "../assets/images/".$file;
				unlink($path);
		      }
		      else{
		        $foto2 = $res['fotoKategori'];
		      }

		try{
	      $stmt = $conn->prepare("UPDATE `tb_detilkategori` SET `namadetil`='$nama', fotoKategori='$foto2' WHERE `kodedetil`='$id'");
	      $stmt->execute();
	      if ($stmt) {
		?>
			<script>
				alert('Success updated.');
				window.location.href="index.php?admin=viewkategori";
			</script>
		<?php
		} else {
		?>
			<script>
				alert('Failed update.');
				window.history.go(-1);
			</script>
		<?php
		}   
	    }
	    catch(PDOException $e){
	     echo $e->getMessage();
	    }
	}
 ?>
 					<div class="row">
						<div class="col-lg-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">Edit Category Form</h3>
								</div>
								<div class="box-body">
									<form action="" method="POST" enctype="multipart/form-data">
								 		<fieldset class="form-group">
											<label for="NamaBarang">Kategori/Merk</label>
											<input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?php echo $res['namadetil']; ?>">
										</fieldset>
										<fieldset class="form-group">
											<label class="control-label">Pilih Foto Kategori</label>
											<input name="foto" type="file" class="file btn btn-warning">
										</fieldset>
										<fieldset class="form-group">
											<input type="submit" value="Edit" name="edit" class="btn btn-success">
											<input type="reset" value="reset" class="btn btn-info">
										</fieldset>
								 	</form>
								</div>
							</div>
						 	
	 					</div>
 					</div>