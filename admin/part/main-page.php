<h1>
        Dashboard
      </h1>
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>
            <?php
              try{
                $stmt = $conn->prepare("SELECT *,count(*) as notif_order FROM tb_detilnota WHERE proses = 0 ");
                $stmt->execute();
                $count = $stmt->fetch();     
              }
              catch(PDOException $e){
               echo $e->getMessage();
              }
            ?>
            <div class="info-box-content">
              <span class="info-box-text">Orders</span>
              <span class="info-box-number"><?php echo $count['notif_order']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-archive"></i></span>
            <?php
              try{
                $stmt = $conn->prepare("SELECT *,count(*) as notif_product FROM tb_barang");
                $stmt->execute();
                $count_product = $stmt->fetch();     
              }
              catch(PDOException $e){
               echo $e->getMessage();
              }
            ?>
            <div class="info-box-content">
              <span class="info-box-text">Products</span>
              <span class="info-box-number"><?php echo $count_product['notif_product']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
            <?php
              try{
                $stmt = $conn->prepare("SELECT *,count(*) as notif_user FROM tb_pelanggan");
                $stmt->execute();
                $count_user = $stmt->fetch();     
              }
              catch(PDOException $e){
               echo $e->getMessage();
              }
            ?>
            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number"><?php echo $count_user['notif_user']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <!-- Main row -->
      <div class="row">
        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
              <?php
              try{
                $stmtz = $conn->prepare("SELECT tb_barang.*, tb_detilkategori.namadetil FROM 
              tb_barang JOIN tb_detilkategori ON tb_barang.kodedetil = tb_detilkategori.kodedetil ORDER BY tb_barang.kodebarang DESC limit 5");
                $stmtz->execute();
              }
              catch(PDOException $e){
               echo $e->getMessage();
              }
            ?>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php 
                foreach($stmtz as $rowquick){
              ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../assets/images/<?php echo (!empty($rowquick['foto']))? $rowquick['foto'] : 'noimage.jpg'; ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo $rowquick['namadetil'] ?>
                      <span class="label label-warning pull-right">Rp <?php echo $rowquick['harga'] ?></span></a>
                        <span class="product-description">
                          <?php echo $rowquick['namabarang'] ?>
                        </span>
                  </div>
                </li>
                <?php } ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="index.php?admin=viewproducts" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- Left col -->
        <div class="col-md-8">

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">

                <?php

                 try{
                $stmtv = $conn->prepare("SELECT tb_detilnota.*, tb_barang.namabarang, count(*) AS notahasil from tb_detilnota INNER JOIN tb_barang ON tb_detilnota.kodebarang = tb_barang.kodebarang where proses=0");
                $stmtv->execute();
                $countnota = $stmtv->fetch();     

              }
              catch(PDOException $e){
               echo $e->getMessage();
              }
                  if ($countnota['notahasil'] == 0) {
                ?>
                  <h4 class="text-center">There is no new order</h4>
                <?php
                  }else{
                ?>
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Orders ID</th>
                    <th>Item</th>
                    <th>Date</th>
                    <th>Qty</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                foreach($stmtv as $notarow){
                  ?>
                  <tr>
                    <td><?php echo $notarow['nomornota'] ?></td>
                    <td><?php echo $notarow['namabarang'] ?></td>
                    <td><?php echo $notarow['tglnota'] ?></td>
                    <td>
                      <?php echo $notarow['banyak'] ?>
                    </td>
                  </tr>
                  <?php 
                      }
                    } 
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="index.php?admin=viewnota" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->