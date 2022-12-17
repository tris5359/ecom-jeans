<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}

	try{
      $stmt = $conn->prepare("SELECT * from tb_content ORDER BY `tb_content`.`kodecontent` DESC");
      $stmt->execute(); 
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
?>

				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">View Category Table</h3>
							</div>
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<thead>
										<tr>
											<!--<th>Kode Kategori</th>-->
											<th>No</th>
											<th>Judul Content</th>
											<th>Isi Content</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=1;
                						foreach($stmt as $row){
												echo "<tr>";
												//echo "<td>$row[kodedetil]</td>";
												echo "<td>$i.</td>";
												echo "<td>$row[judul]</td>";
												echo "<td>$row[isicontent]</td>";
												/*echo "<td><a href='menu2.php?menu=editkategori&id=$row[kodedetil]'>
												<span class='glyphicon glyphicon-edit'></span> Edit</a> 
												<a href='menu2.php?menu=delkategori&id=$row[kodedetil]'><span class='glyphicon glyphicon-remove'></span> Delete</a></td>";*/
									?>
											<td>
												<a href="index.php?admin=delcontent&id=<?php echo $row['kodecontent']; ?>" class="btn btn-danger"><i class='fa fa-fw fa-trash-o'></i></a>
											</td>
									<?php
												echo "</tr>";
												$i++;
											}
									?>
									</tbody>
								</table>
							</div>
					</div>
						
					</div>
				</div>