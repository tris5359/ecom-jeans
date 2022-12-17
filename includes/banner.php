<div class="sec-banner bg0" style="margin: 5%;background-color: #fff;">
	<div class="">
		<h3 class="ltext-105 cl5  respon1 p-t-30 p-l-20 p-b-20" style="font-size: 30px;font-family: Poppins-Bold">
		   	Kategori				
		</h3>
	</div>
		<div class="flex-w flex-c-m p-b-50" >
				<?php             	
	                $conn = $pdo->open();	                
	                try{
	                  $stmt = $conn->prepare("SELECT * FROM tb_detilkategori");
	                  $stmt->execute();
	                  foreach($stmt as $row){
	                	?>
	                      <div class="size-202 ">
							<!-- Block1 -->
							<div class="block1 wrap-pic-w" style="padding: 5px">
								<img src="assets/images/<?php echo $row['fotoKategori'] ?>" alt="IMG-BANNER" style="height: 180px;">
								<a href="category?Kategori=<?php echo $row['namadetil'].'&Mod='.base64_encode($row['kodedetil'])?>" class="block1-txt ab-t-l s-full flex-col-l-sb trans-03 ">
										<span class="block1-info stext-102 trans-04" style="position: absolute;background-color: #f1f1f1;width: 100%;bottom: 0px;padding: 5px;text-align: center;">
											<?php echo $row['namadetil']?>
										</span>

									
								</a>
							</div>
						</div>  
	                 <?php }
	                }
	                catch(PDOException $e){
	                  echo "There is some problem in connection: " . $e->getMessage();
	                }
	                $pdo->close();
	              ?>
			
			
		</div>
	</div>