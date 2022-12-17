<?php 
	if (isset($_POST['updateSite'])) {

		$text1b1 = $_POST['text1b1'];
		$text1b2 = $_POST['text1b2'];
		$text1b3 = $_POST['text1b3'];
		$text2b1 = $_POST['text2b1'];
		$text2b2 = $_POST['text2b2'];
		$text2b3 = $_POST['text2b3'];
		$idb1 = $_POST['idb1'];
		$idb2 = $_POST['idb2'];
		$idb3 = $_POST['idb3'];
		$oldb1 = $_POST['oldb1'];
		$oldb2 = $_POST['oldb2'];
		$oldb3 = $_POST['oldb3'];

		$foto = $_FILES['fotob1']['name'];
		$foto2 = $_FILES['fotob2']['name'];
		$foto3 = $_FILES['fotob3']['name'];

		if(!empty($foto)){
		    move_uploaded_file($_FILES['fotob1']['tmp_name'], '../assets/images/'.$foto);
		    $foto = $foto;  
		    $path = "../assets/images/".$oldb1;
			unlink($path);
		}
		else{
		    $foto = $oldb1;
		}
		if(!empty($foto2)){
		    move_uploaded_file($_FILES['fotob2']['tmp_name'], '../assets/images/'.$foto2);
		    $foto2 = $foto2;  
		    $path = "../assets/images/".$oldb2;
			unlink($path);
		}
		else{
		    $foto2 = $oldb2;
		}
		if(!empty($foto3)){
		    move_uploaded_file($_FILES['fotob3']['tmp_name'], '../assets/images/'.$foto3);
		    $foto3 = $foto3;  
		    $path = "../assets/images/".$oldb3;
			unlink($path);
		}
		else{
		    $foto3 = $oldb3;
		}
		    
	try{
	 	$stmt2x = $conn->prepare("UPDATE banner set img='$foto', text1='$text1b1', text2='$text2b1' WHERE idbanner='$idb1'");
		$stmt2x->execute();
		$stmt3x = $conn->prepare("UPDATE banner set img='$foto2', text1='$text1b2', text2='$text2b2' WHERE idbanner='$idb2'");
		$stmt3x->execute();
		$stmtx = $conn->prepare("UPDATE banner set img='$foto3', text1='$text1b3', text2='$text2b3' WHERE idbanner='$idb3'");
		$stmtx->execute();
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
		header('location: index.php?admin=Banner');

	}
	try{

		$stmt2 = $conn->prepare("SELECT * FROM `banner` WHERE `banner`.`idbanner` =1");
		$stmt2->execute();
		$b1 = $stmt2->fetch();
		$stmt3 = $conn->prepare("SELECT * FROM `banner` WHERE `banner`.`idbanner` =2");
		$stmt3->execute();
		$b2 = $stmt3->fetch();
		$stmt = $conn->prepare("SELECT * FROM `banner` WHERE `banner`.`idbanner` =3");
		$stmt->execute();
		$b3 = $stmt->fetch();
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
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
						<label class="control-label">Banner 1</label>
						<br><img id="blah1" src="../assets/images/<?php echo $b1['img']?>" style="width: 250px; height: 130px">

						<input name="fotob1" type="file" class="file btn btn-warning" onchange="readURL(this);">
					</fieldset>
					<fieldset class="form-group">
						<label for="text1">Text 1 Banner 1</label>
						<input type="text" class="form-control" name="text1b1" placeholder="Text 1 Banner 1" value="<?php echo $b1['text1']; ?>">
						<input type="hidden" class="form-control" name="idb1" value="<?php echo $b1['idbanner']; ?>">
						<input type="hidden" class="form-control" name="oldb1" value="<?php echo $b1['img']; ?>">

					</fieldset>
					<fieldset class="form-group">
						<label for="text2">Text 2 Banner 1</label>
						<input type="text" class="form-control" name="text2b1" placeholder="Text 2 Banner 1" value="<?php echo $b1['text2']; ?>">
					</fieldset>
					<fieldset class="form-group">
						<label class="control-label">Banner 2</label>
						<br><img id="blah2" src="../assets/images/<?php echo $b2['img']?>" style="width: 250px; height: 130px">

						<input name="fotob2" type="file" class="file btn btn-warning" onchange="readURL2(this);">
					</fieldset>
					<fieldset class="form-group">
						<label for="text1">Text 1 Banner 2</label>
						<input type="text" class="form-control" name="text1b2" placeholder="Text 1 Banner 1" value="<?php echo $b2['text1']; ?>">
						<input type="hidden" class="form-control" name="idb2" value="<?php echo $b2['idbanner']; ?>">
						<input type="hidden" class="form-control" name="oldb2" value="<?php echo $b2['img']; ?>">

					</fieldset>
					<fieldset class="form-group">
						<label for="text2">Text 2 Banner 2</label>
						<input type="text" class="form-control" name="text2b2" placeholder="Text 2 Banner 2" value="<?php echo $b2['text2']; ?>">
					</fieldset>
					<fieldset class="form-group">
						<label class="control-label">Banner 3</label>
						<br><img id="blah3" src="../assets/images/<?php echo $b3['img']?>" style="width: 250px; height: 130px">
						<input name="fotob3" type="file" class="file btn btn-warning" onchange="readURL3(this);">
					</fieldset>
					<fieldset class="form-group">
						<label for="text1">Text 1 Banner 3</label>
						<input type="text" class="form-control" name="text1b3" placeholder="Text 1 Banner 1" value="<?php echo $b3['text1']; ?>">
						<input type="hidden" class="form-control" name="idb3" value="<?php echo $b3['idbanner']; ?>">
						<input type="hidden" class="form-control" name="oldb3" value="<?php echo $b3['img']; ?>">


					</fieldset>
					<fieldset class="form-group">
						<label for="text2">Text 2 Banner 3</label>

						<input type="text" class="form-control" name="text2b3" placeholder="Text 2 Banner 3" value="<?php echo $b3['text2']; ?>">
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" value="Update" name="updateSite" class="btn btn-success">
					</fieldset>
					
				</form>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(230)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result)
                        .width(230)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah3')
                        .attr('src', e.target.result)
                        .width(230)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
</script>