<?php
		include("input_barang.php");
		try{
      $stmt = $conn->prepare("SELECT * FROM  tb_detilkategori");
      $stmt->execute(); 
    }
    catch(PDOException $e){
     echo $e->getMessage();
    }
?>


				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Input Products Form</h3>
							</div>
							<div class="box-body">
								<form action="" method="post" enctype="multipart/form-data">
									<fieldset class="form-group">
										<label for="NamaBarang">Nama Barang</label>
										<input type="text" class="form-control" name="NamaBarang" placeholder="Nama Barang">
									</fieldset>
									<fieldset class="form-group">
										<label for="haga">Harga</label>
										<input type="number" class="form-control" name="Harga" placeholder="Harga">
									</fieldset>
									<fieldset class="form-group">
										<label for="haga">Stok Barang</label>
										<input type="number" class="form-control" name="stok" placeholder="Stok Barang">
									</fieldset>
									<fieldset class="form-group">
										<label for="Deskripsi">Deskripsi Singkat</label>
										<textarea type="text" class="form-control" name="Deskripsi" placeholder="Deskripsi Singkat"></textarea>
									</fieldset>
									<fieldset class="form-group">
										<label for="Deskripsi">Deskripsi Detail</label>
										<textarea type="text" class="form-control" name="Deskripsi2" placeholder="Deskripsi Detail"></textarea>
									</fieldset>
									<fieldset class="form-group">
										<label for="Merk">Detil Kategori / Merk</label> <br />
										<?php
                						foreach($stmt as $row){									
										?>				
											<input id="radioStacked1" name="kodedetil" type="radio" value="<?php echo $row['kodedetil'];?>">
											<span class="c-indicator"></span><?php echo $row['namadetil']; ?> <br />
										<?php }
										?>
									</fieldset>
									<fieldset class="form-group">
										<label class="control-label">Pilih Foto</label>
										<input name="foto" type="file" class="file btn btn-warning">
									</fieldset>
									<fieldset class="form-group">
										<input type="submit" value="Submit" name="inputProduk" class="btn btn-success">
										<input type="reset" value="reset" class="btn btn-info">
									</fieldset>
								</form>
							</div>
						</div>
						
					</div>
				</div>