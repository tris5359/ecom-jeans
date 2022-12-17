<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}
	try{
      $stmt = $conn->prepare("SELECT tb_detilnota.*, tb_barang.namabarang from tb_detilnota INNER JOIN tb_barang ON tb_detilnota.kodebarang = tb_barang.kodebarang where proses=0");
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
								<h3 class="box-title">View Orders Table</h3>
							</div>
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<thead>
										<tr>
											<th><p class='text-center'>No.</p></th>
											<th><p class='text-center'>Nomor Nota</p></th>
											<th><p class='text-center'>Tanggal Nota</p></th>
											<th><p class='text-center'>Nama Barang</p></th>
											<th><p class='text-center'>Banyak</p></th>
											<th><p class='text-center'>Harga</p></th>
											<!-- <th><p class='text-center'>Nama Pelanggan</p></th> -->
											<th><p class='text-center'>Action</p></th>
										</tr>
									</thead>
									<tbody>
									<?php
									$i=1;
                					foreach($stmt as $row){
										echo "<tr>";
										echo "<td><p class='text-center'>$i.</p></td>";
										echo "<td><p class='text-center'>$row[nomornota]</p></td>";
										echo "<td><p class='text-center'>$row[tglnota]</p></td>";
										echo "<td><p class='text-left'>$row[namabarang]</p></td>";
										echo "<td><p class='text-center'>$row[banyak]</p></td>";
										echo "<td width='15%'><p class='text-right'>Rp. ".rp($row["harga"])."</p></td>";
										// echo "<td width='10%'><p class='text-center'>$row[namadepan]</p></td>";
										echo "<td width='15%'><p class='text-center'><a href='index.php?admin=proses&id=$row[nomornota]' class='btn btn-info'>
												<i class='fa fa-fw fa-check'></i> Konfirmasi</a></p>";
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