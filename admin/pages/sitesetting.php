<?php 
	if (isset($_POST['updateSite'])) {
		$namasitus = $_POST['sitename'];
		$taggline = $_POST['tagline'];
		$mail = $_POST['email'];
		$notlp = $_POST['notlp'];
		$alamat = $_POST['alamat'];
		$tentangtoko = $_POST['tentangtoko'];

		$logo = $_FILES['fotologo']['name'];
		$foto = $_FILES['fototoko']['name'];

		$file = $sitedata['fotoToko'];
		$file2 = $sitedata['fotoLogo'];

		if(!empty($logo)){
		        move_uploaded_file($_FILES['fotologo']['tmp_name'], '../assets/images/toko/'.$logo);
		        $logo = $logo;  
				$path2 = "../assets/images/toko/".$file2;
				unlink($path2);
		      }
		      else{
		        $logo = $sitedata['fotoLogo'];
		      }
		      if(!empty($foto)){
		        move_uploaded_file($_FILES['fototoko']['tmp_name'], '../assets/images/toko/'.$foto);
		        $foto = $foto;  
		        $path = "../assets/images/toko/".$file;
				unlink($path);
		      }
		      else{
		        $foto = $sitedata['fotoToko'];
		      }
		    
	try{
	 	

      $stmt = $conn->prepare("UPDATE `site` SET sitename='$namasitus', tagline='$taggline', email='$mail', addressStore='$alamat', noTlp='$notlp', tentangToko='$tentangtoko', fotoToko='$foto', fotoLogo='$logo'");
      $stmt->execute(); 
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
		header('location: index.php?admin=sitesetting');

	}

 ?>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Site Setting</h3>
			</div>
			<div class="box-body">
				<form action="" method="POST" enctype='multipart/form-data'>
					<fieldset class="form-group">
						<label for="Sitename">Site Name</label>
						<input type="text" class="form-control" name="sitename" placeholder="Site Name" value="<?php echo $sitedata['sitename']; ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="Tagline">Tagline</label>
						<input type="text" class="form-control" name="tagline" placeholder="Tagline" value="<?php echo $sitedata['tagline']; ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $sitedata['email']; ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="email">Nomor Telpon</label>
						<input type="text" class="form-control" name="notlp" placeholder="Nomor Telpon" value="<?php echo $sitedata['noTlp']; ?>">
					</fieldset>
					<fieldset class="form-group">
						<label for="Deskripsi">Alamat</label>
						<textarea type="text" class="form-control" name="alamat" placeholder="Alamat"><?php echo $sitedata['addressStore']; ?></textarea>
					</fieldset>
					<fieldset class="form-group">
						<label for="Deskripsi">Tentang Toko</label>
						<textarea type="text" class="form-control" name="tentangtoko" placeholder="Deskripsi Toko"><?php echo $sitedata['tentangToko']; ?></textarea>
					</fieldset>
					<fieldset class="form-group">
						<label class="control-label">Logo</label>
						<input name="fotologo" type="file" class="file btn btn-warning">
					</fieldset>
					<fieldset class="form-group">
						<label class="control-label">Foto Toko</label>
						<input name="fototoko" type="file" class="file btn btn-warning">
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" value="Update" name="updateSite" class="btn btn-success">
					</fieldset>
					
				</form>
			</div>
		</div>
		
	</div>
</div>