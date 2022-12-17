<?php

        if(!empty($_GET['View'])){
 			$p = $_GET['View'];
            include($p.'.php');
        } else {
            echo '<h1>Halaman tidak ditemukan! :(</h1>';
        }
	
		
		
		
		
		
		
		
		
		
?>