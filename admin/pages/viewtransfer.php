<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}
	try{
      $stmt = $conn->prepare("SELECT * from tb_transfer");
      $stmt->execute(); 
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

?>
				<div class="row">
					
					<div class="col-lg-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">View Payments Table</h3>
							</div>
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover" width='80%'>
									<thead>
										<tr class="text-center">
											<th align='center'>No.</th>
											<th align='center'>Nomor Nota</th>
											<th align='center'>Tanggal Transfer</th>
											<th align='center'>Nama Bank</th>
											<th align='center'>Pemilik Rekening</th>
											<th align='center'>Jumlah</th>
											<th align="center">Status</th>
											<th align='center'>Action</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
									$i=1;
                					foreach($stmt as $row){									
											echo "<tr>";
											echo "<td align='center'>$i</td>";
											echo "<td align='center'>$row[nomornota]</td>";
											echo "<td align='center'>$row[tgltransfer]</td>";
											echo "<td align='center'>$row[namabank]</td>";
											echo "<td align='left'>$row[pemilikrekening]</td>";
											echo "<td align='right'>Rp.".rp($row["jumlahuang"])."</td>";
											if ($row['status'] == 0) {
												echo "<td align='center'><span class='label label-danger'>Not Confirmed</span></td>";
											}else{
												echo "<td align='center'><span class='label label-success'> Confirmed</span></td>";
											}
											echo "<td align='center'><a href='index.php?admin=proses1&id=$row[nomortransfer]' class='btn btn-info'>
												<i class='fa fa-fw fa-check-square-o'></i> Konfirmasi</a></td>";
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