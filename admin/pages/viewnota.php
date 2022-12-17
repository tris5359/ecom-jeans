<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}
	try{
      $stmt = $conn->prepare("SELECT *, tb_pemesanan.status as stat, tb_pemesanan.namadepan as depan, tb_pemesanan.namabelakang as belakang  from tb_pemesanan inner join tb_pelanggan on tb_pemesanan.kodepelanggan=tb_pelanggan.kodepelanggan ORDER BY tglbeli DESC");
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
											<th><p class='text-center'>Nama Pembeli</p></th>
											<th><p class='text-center'>No Telpon</p></th>
											<th><p class='text-center'>Tanggal Beli</p></th>
											<th><p class='text-center'>pembayaran</p></th>
											<th><p class='text-center'>status</p></th>
											<th><p class='text-center'>Produk</p></th>
											<!-- <th><p class='text-center'>Nama Pelanggan</p></th> -->
											<th><p class='text-center'>Kirim</p></th>
										</tr>
									</thead>
									<tbody>
									<?php
									$i=1;
                					foreach($stmt as $row){
                						$stmt2 = $conn->prepare("SELECT * FROM vnota LEFT JOIN tb_barang ON tb_barang.kodebarang=vnota.kodebarang WHERE idpemesanan=:id");
	        							$stmt2->execute(['id'=>$row['idpemesanan']]);
	        								$total = 0;
	        							foreach($stmt2 as $row2){
	        								$subtotal = $row2['harga']*$row2['banyak'];
	        								$total += $subtotal;
	        							}
										echo "<tr>";
										echo "<td><p class='text-center'>$i.</p></td>";
										echo "<td>".$row['namadepan'].' '.$row['namabelakang']."</td>
				                            <td>".$row['nomorhp']."</td>
				                            <td>".date('d F Y', strtotime($row['tglbeli']))."</td>
				                            <td>Rp. ".number_format($total,2,',','.')."</td>
				                            ";?>
				                            <?php
				                            if ($row['stat']=='Sukses') {
				                               echo "<td style='color:green;'><b>".$row['stat']."</b></td>"; 
				                              } else {
				                               echo "<td style='color:red;'><b>".$row['stat']."</b></td>"; 
				                              }
				                              echo "
				                            <td>";?>
				                            <a href="#transaction<?php echo $row['idpemesanan']?>"  data-toggle="modal" data-target="#transaction<?php echo $row['idpemesanan']?>"  class="btn btn-sm btn-flat btn-primary transact"><i class='fa fa-search'></i>
												View
											</a>

				                            </td>
				                            <td>
				                            	<a href="#kirim<?php echo $row['idpemesanan']?>"  data-toggle="modal" data-target="#kirim<?php echo $row['idpemesanan']?>"  class="btn btn-warning btn-sm btn-flat kirim"><i class='fa fa-envelope'></i>
												Kirim
											</a>
				                            </td>


				                            <div class="modal fade" id="transaction<?php echo $row['idpemesanan']?>" tabindex="-1" role="dialog" >
											   <div class="modal-dialog m-t-80" >
										        <div class="modal-content" style="width: 900px;margin-left: -25%">
										            <div class="modal-header">
										              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                  <span aria-hidden="true">&times;</span></button>
										              <h4 class="modal-title"><b>Daftar Pembelanajaan</b></h4>
										            </div>
										            <div class="modal-body">
										              <p>
										                Tanggal: <span id="date"><?php echo date('d F Y', strtotime($row['tglbeli'])) ?> </span>
										                <span class="pull-right">Kode Transaksi: <span id="transid"> <?php echo $row['kodetransaksi']?></span></span> 
										              </p>
										              <div class="row m-lr-10 m-t-30">
										              	<div class="col-md-5 table-bordered p-t-6 p-b-6">Produk</div>
										              	<div class="col-md-2 table-bordered p-t-6 p-b-6">Harga</div>
										              	<div class="col-md-2 table-bordered p-t-6 p-b-6">Quantity</div>
										              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Subtotal</div>
										              </div>
										              <?php
										              $stmt3 = $conn->prepare("SELECT * FROM vnota LEFT JOIN tb_barang ON tb_barang.kodebarang=vnota.kodebarang WHERE idpemesanan=:id");
						        								$stmt3->execute(['id'=>$row['idpemesanan']]);
						        								$total = 0;
						        								foreach($stmt3 as $row3){
						        									$subtotal = $row3['harga']*$row3['banyak'];
						        									$total += $subtotal;
						        								echo '<div class="row m-lr-10">
															            <div class="col-md-5 table-bordered p-t-6 p-b-6">'.$row3['namabarang'].'</div>
															        	<div class="col-md-2 table-bordered p-t-6 p-b-6">'.number_format($row3['harga'],2,',','.').'</div>
															          	<div class="col-md-2 table-bordered p-t-6 p-b-6">x'.$row3['banyak'].'</div>
															            <div class="col-md-3 table-bordered p-t-6 p-b-6">'.number_format($subtotal,2,',','.').'</div>
															           </div>';	}?>
													              <div class="row m-lr-10 ">
													              	<div class="col-md-9 table-bordered p-t-6 p-b-6">Total</div>
													              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Rp. <?php echo number_format($total,2,',','.')?></div>
													              </div>
													            </div>
													            <div class="modal-footer">
													              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
													            </div>
													        </div>
													    </div>
														</div>

											<div class="modal fade" id="kirim<?php echo $row['idpemesanan']?>" tabindex="-1" role="dialog" >
											   <div class="modal-dialog m-t-80" >
										        <div class="modal-content" style="width: 900px;margin-left: -25%">
										            <div class="modal-header">
										              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                  <span aria-hidden="true">&times;</span></button>
										              <h4 class="modal-title"><b>KIRIM PRODUK...</b></h4>
										            </div>
										            <div class="modal-body">
										              <div class="row m-lr-10 m-t-30">
										              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Nama Penerima</div>
										              	<div class="col-md-7 table-bordered p-t-6 p-b-6"><?php echo $row['depan'].' '.$row['belakang']?></div>
										              </div>
										              <div class="row m-lr-10 m-t-30">
										              	<div class="col-md-3 table-bordered p-t-6 p-b-6">No Telpon Penerima</div>
										              	<div class="col-md-7 table-bordered p-t-6 p-b-6"><?php echo $row['notlp']?></div>
										              </div>
										              <div class="row m-lr-10 m-t-30">
										              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Kode Pos</div>
										              	<div class="col-md-7 table-bordered p-t-6 p-b-6"><?php echo $row['kdpos']?></div>
										              </div>
										              <div class="row m-lr-10 m-t-30">
										              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Alamat</div>
										              	<div class="col-md-7 table-bordered p-t-6 p-b-6"><?php echo $row['alamatpenerima']?></div>
										              </div>
										              <div class="row m-lr-10 m-t-30">
										              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Daerah</div>
										              	<div class="col-md-7 table-bordered p-t-6 p-b-6"><?php echo $row['daerah']?></div>
										              </div>
										              <div class="row m-lr-10 m-t-30">
										              	<div class="col-md-3 table-bordered p-t-6 p-b-6">Tanggal Pemesanan</div>
										              	<div class="col-md-7 table-bordered p-t-6 p-b-6"><?php echo $row['tglbeli']?></div>
										              </div>
										              <div style="margin-top: 30px"></div>
										              <form class="form-horizontal" method="POST" action="pages/order_kirim.php">
										                <input type="hidden" class="id" name="id" value="<?php echo $row['idpemesanan']?>">
										                <div class="text-center">
										                    <p>KIRIM PRODUK KEPADA</p>
										                    <h2 class="bold nama"><?php echo $row['namadepan'].' '.$row['namabelakang']?></h2>
										                </div>
										            </div>
										            <div class="modal-footer">
										              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
										              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-envelope-open"></i> Kirim</button>
										              </form>
													  </div>
													</div>
												</div>
											</div>
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