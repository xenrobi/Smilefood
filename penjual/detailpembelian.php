<?php include '../config/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAIL PEMBELIAN</title>
</head>
<body>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM pembelian_detail 
INNER JOIN pembelian ON pembelian_detail.id_pembelian = pembelian.id_pembelian 
INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas 
 INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk
  where pembelian_detail.id_pembelianproduk='$_GET[id_pembelianproduk]';");

foreach ($query as $row) :
 ?>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA PESANAN</h3>

                <div class="card-tools">
                <b><?= $row['tanggal']; ?></b>  
   
                    </div>
           
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
              <table class="table table-head-fixed text-nowrap">
              <tr><td><b>KELAS :</b></td><td><?= $row['kelas']; ?></td></tr>
              <tr><td><b>NAMA PRODUK :</b></td><td><?= $row['nama_produk']; ?></td></tr>
              <tr><td><b>NAMA CAFE :</b></td><td><?= $row['nama_cafe']; ?></td></tr>
              <tr><td><b>HARGA :</b></td><td><?= $row['harga']; ?></td></tr>
              <tr><td><b>JUMLAH :</b></td><td><?= $row['jumlah']; ?></td></tr>
              <tr><td><b>TOTAL :</b></td><td><?= $row['jumlah']*$row['harga']; ?></td></tr>
              <tr><td><b>KETERANGAN :</b></td><td><?= $row['ket']; ?></td></tr>
              <tr><td><b>STATUS :</b></td><td></td></tr>
                  <thead>
              <tr>
           
		</tr>
        </thead>
  
     <td>

 
 
  <?php
	include '../config/koneksi.php';
	$id = $_GET['id_pembelianproduk'];
	$data = mysqli_query($koneksi,"select * from pembelian_detail where id_pembelianproduk='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
  <form method="post">
 <input type="hidden"  class="form-control"  name="status" value="SUDAH DI ANTAR"></option>   
  </td>
  
  <td><button class="btn btn-success" name="save"> KONFIMASI BILA SUDAH DI ANTAR</button></td>
  </form>
 </tr>


</table>

<div>


</div>
<?php 
	}
	?>

    <?php
if(isset($_POST["save"]))
{
    $status=$_POST["status"];
    $koneksi->query("UPDATE pembelian_detail set status='$status' where id_pembelianproduk='$id'");

echo"<script>alert('PESANAN SUDAH DI KONFIRMASI');</script>";
echo"<script>location='index.php?halaman=order';</script>";
}
    ?>
     <?php endforeach; ?>

</body>
</html>