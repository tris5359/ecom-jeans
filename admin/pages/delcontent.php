<?php
require_once("../includes/conn.php");
	$id = $_GET["id"];    
	try{
      $stmt = $conn->prepare("DELETE FROM tb_content where kodecontent='$id'");
      $stmt->execute();  
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
	header("location:index.php?admin=Viewcontact");
?>