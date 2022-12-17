<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}
	try{
      $stmt = $conn->prepare("SELECT tb_detilnota.*, tb_barang.namabarang from tb_detilnota INNER JOIN tb_barang ON tb_detilnota.kodebarang = tb_barang.kodebarang where proses=1");
      $stmt->execute(); 
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

?>
				<div class="row">
					
					<div class="col-lg-12">
						<div class="box box-warning">
							<div class="box-header">
								<h3 class="box-title">View Order Completed Table</h3>
							</div>
							<div class="box-body table-responsive no-padding">
								<table class="table table-hover">
									<thead>
										<tr>
											<th><p class='text-center'>No.</p></th>
											<th><p class='text-center'>Nomor Nota</p></th>
											<th><p class='text-center'>Tanggal Nota</p></th>
											<th><p class='text-center'>Nama Barang</p></th>
											<th><p class='text-center'>Harga</p></th>
											<th><p class='text-center'>Status</p></th>
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
										
										echo "<td width='15%'><p class='text-right'>Rp. ".rp($row["harga"])."</p></td>";
										echo "<td><h5 class='text-center'><span class='label label-success'>Confirmed</span></h5></td>";
										// echo "<td width='10%'><p class='text-center'>$row[namadepan]</p></td>";
										echo "<td width='15%'><p class='text-center'><a href='admin.php?admin=detilconfirmed&nota=$row[nomornota]' class='btn btn-info'>
												<i class='fa fa-fw fa-info-circle'></i> Lihat</a>
												<a href='admin.php?admin=cancel&id=".$row['nomornota']."' class='btn btn-danger'><i class='fa fa-fw fa-minus-circle'></i> Batalkan</a></p>";
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