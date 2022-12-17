<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}

	try{
      $stmt = $conn->prepare("SELECT * from tb_detilkategori order by namadetil");
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
											<th>Foto</th>
											<th>Nama Kategori</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=1;
                						foreach($stmt as $row){
                       							$image = (!empty($row['fotoKategori'])) ? '../assets/images/'.$row['fotoKategori'] : '../assets/images/noimage.jpg';

												echo "<tr>";
												//echo "<td>$row[kodedetil]</td>";
												echo "<td>$i.</td>";
												echo "<td align='center'> <a href='$image'> <img src='".$image."' height='30px' width='30px'></a></td>";
												echo "<td>$row[namadetil]</td>";
												/*echo "<td><a href='menu2.php?menu=editkategori&id=$row[kodedetil]'>
												<span class='glyphicon glyphicon-edit'></span> Edit</a> 
												<a href='menu2.php?menu=delkategori&id=$row[kodedetil]'><span class='glyphicon glyphicon-remove'></span> Delete</a></td>";*/
									?>
											<td>
												<a href="index.php?admin=editkategori&id=<?php echo $row['kodedetil']; ?>" class="btn btn-info"><i class='fa fa-fw fa-edit'></i></a> 
												<a href="index.php?admin=delkategori&id=<?php echo $row['kodedetil']; ?>&img=<?php echo $row['fotoKategori']; ?>" class="btn btn-danger"><i class='fa fa-fw fa-trash-o'></i></a>
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