<?php include 'koneksi.php';
if(isset($_POST['up'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($koneksi,"UPDATE pembelian_detail SET status ='PESANAN SELESAI'  WHERE id_pembelianproduk='".$del_id."'");
	$message = "DATA BERHASIL DI UPDATE !";
}
}

if(isset($_POST['ln'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($koneksi,"UPDATE pembelian_detail SET status ='LUNAS/SELESAI'  WHERE id_pembelianproduk='".$del_id."'");
	$message = "DATA BERHASIL DI UPDATE !";
}
}

$sql = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUK</title>
</head>
<body>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DAFTAR PESANAN</h3>  
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 200px;">
                  <form method="get">
          <input type="date" name="tanggal"  class="form-control" href="index.php?halaman=order&tanggal=<?php echo $row['tanggal']; ?>">
          <button type="submit"  class="form-control" class="btn btn-default"><i class="fas fa-search"></i></button>
          <a  class="btn btn-info btn-sm" href="cetak.php" target="_blank">PRINT LAPORAN ORDERAN HARI INI</a>
		</form>
                    <div class="input-group-append">
   
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 1000px; ">
              <form method="post" action="">
              <table class="table table-head-fixed text-nowrap">
              <div><?php if(isset($message)) { echo $message; } ?>
              <thead>
              <tr>
              <th></th>
            <th>NO</th>
            <th>TGL</th>
            <th>KELAS</th>
            <th>NAMA PRODUK</th>
            <th>NAMA CAFE</th>
            <th>HARGA</th>
            <th>JUMLAH</th>
            <th>TOTAL</th>
            <th>KETERANGAN</th>
            <th>STATUS</th>
	        <th>OPSI</th>
		</tr>
     <button type="submit" class="btn btn-success" name="up">SELESAI</button>
     <button type="submit" class="btn btn-info" name="ln">LUNAS</button> 
        </thead>
        <?php
        $i=0;
			$no = 1;
			if(isset($_GET['tanggal'])){
				$tgl = $_GET['tanggal'];
				$sql = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
        pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
        INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk where tanggal='$tgl';");
			}else{
        $tgll=date("Y-m-d");
            $sql = mysqli_query($koneksi, "SELECT * FROM pembelian_detail INNER JOIN pembelian ON
            pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
            INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk where tanggal='$tgll';");
			
			}
     
			while($row = mysqli_fetch_array($sql)){
			?>
                  
                        <tr>
            <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id_pembelianproduk"]; ?>"></td>
            <td><?php echo $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['nama_cafe']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['jumlah']*$row['harga']; ?></td>
            <td><?= $row['ket'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
            <a class="btn btn-danger btn-sm" href="aksi_hapusorder.php?id_pembelian=<?php echo $row['id_pembelian']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash-alt"> </i> HAPUS</a>
            <a class="btn btn-info btn-sm" href="index.php?halaman=detailpembelian&id_pembelianproduk=<?php echo $row['id_pembelianproduk']; ?>"><i class="fas fa-pencil-alt"> </i> DETAIL </a>
            </td>
			</tr>
   
 </tr>
 </form>
   <?php
      $i++;
      }
      ?>


</table>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>


