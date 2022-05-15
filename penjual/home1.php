<?php 
include '../config/koneksi.php'; 

$id=$_SESSION['name'];


$tgl=date("Y-m-d");
$data_beli = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk 
where tanggal='$tgl' and nama_cafe='$id' AND  status='Proses' ");
$jumlah_beli = mysqli_num_rows($data_beli);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU TAMBAHAN</title>
</head>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">TOTAL PENDAPATAN BULANAN</h3>
<?php
  $tgl=date("Y-m-d");
  $id=$_SESSION['name'];
    
$ambil=$koneksi->query("SELECT * FROM pembelian_detail INNER JOIN pembelian ON
pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk AND nama_cafe='$id' WHERE MONTH(tanggal) = MONTH(CURRENT_DATE) AND YEAR(tanggal) = YEAR(CURRENT_DATE)");
$all = [];
  while($d=$ambil->fetch_assoc())
  {
      $all[]=$d;
  }

    ?>
    
            <?php $total=0;?>
            <?php $qty=0; ?>
            <?php foreach($all as $key =>$value): ?>
            <?php $qty+=$value['jumlah'] ?>
            <?php $total+=$value['total'] ?>
            <?php endforeach ?>
                <div class="card-tools">
                <div class="row top_tiles" style="margin: 10px 0;">
                
                      <div class="col-md-3 tile">
            
                          <span>Total Pendapatan Bulan  <?php echo date("m");?></span>
                          <h2>Rp.<?php echo number_format($total) ?>
                      </h2>
                          <span class="sparkline_two" style="height: 160px;"><canvas width="196" height="40" style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></span>
                      </div>
                    
                      <div class="col-md-3 tile">
                        <span>Total Orderan</span>
                        <h2> <?php echo number_format($qty) ?> Orderan</h2>
                        <span class="sparkline_two" style="height: 160px;"><canvas width="196" height="40" style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></span>
                      </div>
                      <div class="col-md-3 tile">
                        <span>Orderan</span>
                        <h2> <?php echo $jumlah_beli; ?> Orderan Baru</h2>
                        <span class="sparkline_two" style="height: 160px;"><canvas width="196" height="40" style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></span>
                      </div>
                     
                    </div>
              </div>
  
      </body>
</html>