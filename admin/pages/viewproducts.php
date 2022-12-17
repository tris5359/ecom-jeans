<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}
		try{
      $stmt = $conn->prepare("SELECT tb_barang.*, .tb_detilkategori.namadetil from tb_barang JOIN tb_detilkategori ON tb_barang.kodedetil = tb_detilkategori.kodedetil order by kodebarang DESC");
      $stmt->execute(); 
      $stmtx = $conn->prepare("SELECT tb_barang.*, .tb_detilkategori.namadetil from tb_barang JOIN tb_detilkategori ON tb_barang.kodedetil = tb_detilkategori.kodedetil order by kodebarang DESC");
      $stmtx->execute(); 
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }

?>

<!-- <table width="100%">
	<tr><td>

<form class="pure-form pure-form-stacked">
    <fieldset>
<legend>Daftar Barang</legend>
</form> -->

				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">View Products Table</h3>
							</div>
							<?php 
                			foreach($stmtx as $q){
						      if($q['stok']<=3){  
						        ?>  
						        <script>
						          $(document).ready(function(){
						            $('#pesan_sedia').css("color","red");
						            $('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
						          });
						        </script>
						        <?php
						        echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['namabarang']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>"; 
						      }}
						    
						    ?>
							<div class="box-body table-responsive no-padding">
								<div class="col-lg-12">
									<table class="table table-hover" id="dataTables-example">
										
										<tr>
											<th>No</th>
											<th>Foto</th>
											<th>Nama Barang</th>
											<th>Kategori</th>
											<th>Harga</th>
											<th>Stok</th>
											<th>Control</th>
										</tr>
									

									<?php
									$i=1;
                						foreach($stmt as $row){
                        					$image = (!empty($row['foto'])) ? '../assets/images/'.$row['foto'] : '../assets/images/noimage.jpg';
												echo "<tr>";
												echo "<td align='center'>".$i."</td>";
												echo "<td align='center'> <a href='$image'> <img src='".$image."' height='30px' width='30px'></a></td>";
												echo "<td>$row[namabarang]</td>";
												echo "<td>$row[namadetil]</td>";
												echo "<td align='right'>Rp. ".number_format($row['harga'],2,',','.')."</td>";
												echo "<td >$row[stok]</td>";
												echo "<td style='text-align: center;'><a href='index.php?admin=editbarang&id=$row[kodebarang]' class='btn btn-info'><i class='fa fa-fw fa-edit'></i></a><a href='index.php?admin=delproduct&id=$row[kodebarang]' class='btn btn-danger'><i class='fa fa-fw fa-trash-o'></i></a></td>";
												echo "</tr>";
												$i++;
											}
									?>
									
									</table>
								</div>
							</div>	
						</div>
					</div>
				</div>