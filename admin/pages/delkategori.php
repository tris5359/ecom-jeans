<?php
require_once("../includes/conn.php");
	$id = $_GET["id"];
	$file = $_GET["img"];      
	try{
      $stmt = $conn->prepare("DELETE FROM tb_detilkategori where kodedetil='$id'");
      $stmt->execute();  
      $path = "../assets/images/".$file;
		unlink($path);
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
	header("location:index.php?admin=viewkategori");
?>