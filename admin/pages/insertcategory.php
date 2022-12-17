<?php include("insertkat.php"); ?>
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Input Category Form</h3>
							</div>
							<div class="box-body">
								<form action="" method="POST" enctype="multipart/form-data">
									<fieldset class="form-group">
										<label for="NamaKategori">Nama Kategori</label>
										<input type="text" class="form-control" name="kategori" placeholder="Nama Kategori">
									</fieldset>
									<fieldset class="form-group">
										<label class="control-label">Pilih Foto Kategori</label>
										<input name="foto" type="file" class="file btn btn-warning">
									</fieldset>
									<fieldset class="form-group">
										<input type="submit" value="Submit" name="simpanKat" class="btn btn-success">
										<input type="reset" value="reset" class="btn btn-info">
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>