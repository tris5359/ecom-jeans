<?php
require_once("../includes/conn.php");;

	$id = $_GET["id"];
	try{
      $stmt = $conn->prepare("update tb_transfer set status=1 where nomortransfer ='$id'");
      $stmt->execute();  
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

	header("location:index.php?admin=viewtransfer");
?>