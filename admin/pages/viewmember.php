<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}
	try{
      $stmt = $conn->prepare("SELECT * from tb_pelanggan order by namadepan");
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
								<h3 class="box-title">View Member Table</h3>
							</div>
							<div class="box-body table-responsive no-padding">
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nama Pelanggan</th>
											<th>Kota</th>
											<th>Email</th>
											<th>Username</th>
											<th>Telp / HP</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
										$i=1;
                						foreach($stmt as $row){
										
												echo "<tr>";
												echo "<td>$i.</td>";
												echo "<td>$row[namadepan]&nbsp;$row[namabelakang]</td>";
												echo "<td>$row[kota]</td>";
												echo "<td>$row[email]</td>";
												echo "<td>$row[username]</td>";
												echo "<td>$row[nomorhp]</td>";
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