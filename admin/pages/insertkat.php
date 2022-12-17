<?php
 
// Escape user inputs for security

	if (isset($_POST['simpanKat'])) {
		$nama = $_POST['kategori'];
		$foto = $_FILES['foto']['name'];

 
		// attempt insert query execution
		$sql = "";

	try{
	  move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/'.$foto);

      $stmt = $conn->prepare("INSERT INTO `tb_detilkategori`(`namadetil`, fotoKategori) VALUES ('$nama', '$foto')");
      $stmt->execute(); 
	      if($stmt){
			    echo "Records added successfully.";
				header("location:index.php?admin=viewkategori");
			} else{
			    echo "ERROR: Could not able to execute $sql.";
			}
	    }
	    catch(PDOException $e){
	     echo $e->getMessage();
	    }
		

	}

?>