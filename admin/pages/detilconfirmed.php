<?php
function rp($number) {  
    $rt = number_format($number);  
    return $rt;  
}
		$nota = $_GET['nota'];
		try{
	      $stmt = $conn->prepare("SELECT tb_detilnota.*, tb_barang.namabarang, tb_pelanggan.namadepan, tb_pelanggan.namabelakang, tb_pelanggan.alamat from tb_detilnota INNER JOIN tb_barang ON tb_detilnota.kodebarang = tb_barang.kodebarang INNER JOIN tb_pelanggan ON tb_detilnota.username = tb_pelanggan.username where nomornota='$nota'");
	      $stmt->execute();  
     	  $data = $stmt->fetch();     

	    }
	    catch(PDOException $e){
	     echo $e->getMessage();
	    }
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Admin Page <small><i class="fa fa-angle-right fa-fw"></i> Orders Completed</small></h1>
	</div>
</div>
<div class="row">

	<div class="col-lg-8 col-md-offset-2">
	<a href="admin.php?admin=viewconfirmed" class="btn btn-warning col-md-offset-8"><i class="fa fa-fw fa-arrow-left"></i> Back to Orders Confirmed</a>
		<div class="row">
			<div class="form-control">
				<div class="col-md-4">
					<label for="nomornota">No Nota</label>
				</div>
				<div class="col-md-5">
					<?php echo $data[0]; ?>
				</div>
			</div>
			<div class="form-control">
				<div class="col-md-4">
					<label for="tglnota">Tanggal Nota</label>
				</div>
				<div class="col-md-5">
					<?php echo $data[1]; ?>
				</div>
			</div>
			<div class="form-control">
				<div class="col-md-4">
					<label for="namabarang">Nama Barang</label>
				</div>
				<div class="col-md-5">
					<?php echo $data['namabarang']; ?>
				</div>
			</div>
			<div class="form-control">
				<div class="col-md-4">
					<label for="barang">Banyak</label>
				</div>
				<div class="col-md-5">
					<?php echo $data['banyak']; ?> buah
				</div>
			</div>
			<div class="form-control">
				<div class="col-md-4">
					<label for="harga">Harga</label>
				</div>
				<div class="col-md-5">
					Rp <?php echo rp($data['harga']); ?>
				</div>
			</div>
			<div class="form-control">
				<div class="col-md-4">
					<label for="nomornota">Nama Pelanggan</label>
				</div>
				<div class="col-md-5">
					<?php echo $data['namadepan']." ".$data['namabelakang']; ?>
				</div>
			</div>
			<div class="form-control">
				<div class="col-md-4">
					<label for="nomornota">Alamat Pelanggan</label>
				</div>
				<div class="col-md-5">
					<?php echo $data['alamat']; ?>
				</div>
			</div>
		</div>
	</div>
</div>