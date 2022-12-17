<?php
  include '../includes/session.php';

  if(isset($_POST['bayar'])){
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $alamatp = $_POST['alamatp'];
    $daerah = $_POST['daerah'];
    $pos = $_POST['pos'];
    $email = $_POST['email'];
    $no_tlp = $_POST['no_tlp'];
    $catatan = $_POST['catatan'];
    $date = date('Y-m-d');

   $conn = $pdo->open();

   //generate code
        $set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code='RJ'.substr(str_shuffle($set), 0, 15);
        $status='Proses';


    try{
      
      $stmt = $conn->prepare("INSERT INTO tb_pemesanan ( kodepelanggan, kodetransaksi, namadepan, namabelakang, notlp, alamatpenerima, daerah, kdpos, tglbeli, status) VALUES ( :id_user, :kd_bayar,  :nama_dpn_penerima, :nama_blk_penerima, :no_tlp, :alamat_penerima, :daerah, :kd_pos, :tgl_beli, :status) ");
      $stmt->execute(['id_user'=>$user['kodepelanggan'], 'nama_dpn_penerima'=>$nama_depan, 'nama_blk_penerima'=>$nama_belakang, 'no_tlp'=>$no_tlp, 'daerah'=>$daerah, 'kd_pos'=>$pos, 'alamat_penerima'=>$alamatp, 'tgl_beli'=>$date, 'kd_bayar'=>$code, 'status'=>$status]);
      $salesid = $conn->lastInsertId();
      
      try{
        $stmt = $conn->prepare("SELECT *, tb_keranjang.banyak as quantity FROM tb_keranjang LEFT JOIN tb_barang ON tb_barang.kodebarang =tb_keranjang.kodebarang  WHERE kodepelanggan =:id_user");
        $stmt->execute(['id_user'=>$user['kodepelanggan']]);

        foreach($stmt as $row){
          $stmt = $conn->prepare("INSERT INTO vnota (tglnota, idpemesanan, kodebarang, banyak) VALUES (:tgl, :id_jual, :id_produk, :jumlah)");
          $stmt->execute(['tgl'=>$date, 'id_jual'=>$salesid, 'id_produk'=>$row['kodebarang'], 'jumlah'=>$row['quantity']]);
        }
        
        $stmt = $conn->prepare("DELETE FROM tb_keranjang WHERE kodepelanggan =:id_user");
        $stmt->execute(['id_user'=>$user['kodepelanggan']]);

        $_SESSION['success'] = 'Transaksi berhasil. Terima kasih.';
         header('location: ../thanks?code='.$code);
          exit();

      }
      catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
      }

    }
    catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();
  }
  
  header('location: ../index.php?View=payment');
?>