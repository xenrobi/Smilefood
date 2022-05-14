<?php 
include '../config/koneksi.php';

if(isset($_POST['up'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($koneksi,"UPDATE pembelian_detail SET status ='PESANAN SEDANG DIMASAK'  WHERE id_pembelianproduk='".$del_id."'");
	$message = "DATA BERHASIL DI UPDATE !";
}
}
if(isset($_POST['up1'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($koneksi,"UPDATE pembelian_detail SET status ='PESANAN SEDANG DIANTAR'  WHERE id_pembelianproduk='".$del_id."'");
	$message = "DATA BERHASIL DI UPDATE !";
}
}

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
                <form method="get">
			<label>PILIH TANGGAL</label>
			<input type="date" name="tanggal" href="index.php?halaman=order&tanggal=<?php echo $row['tanggal']; ?>">
			<input type="submit"  value="PILIH" >
		</form>
   
              
                  <div class="input-group input-group-sm" style="width: 150px;">
          
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 1000px;">
              <form method="post" action="">
              <table class="table table-head-fixed text-nowrap ">
              <div><?php if(isset($message)) { echo $message; } ?>
              <button type="submit" class="btn btn-warning" name="up">SEDANG DIMASAK</button>
              <button type="submit" class="btn btn-success" name="up">SUDAH DI ANTAR</button>
                  <thead>
              <tr>
            <th></th>
            <th>NO</th>
            <th>TGL</th>
            <th>KELAS</th>
		        <th>NAMA PRODUK</th>
            <th>HARGA</th>
            <th>JUMLAH</th>
            <th>TOTAL</th>
            <th>STATUS</th>
            <th>KETERANGAN</th>
	        <th>OPSI</th>
		</tr>
        </thead>
        <?php 
			$no = 1;
 
			if(isset($_GET['tanggal'])){
                $id=$_SESSION['name'];
				$tgl = $_GET['tanggal'];
				$sql = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
                pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
                INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk AND nama_cafe='$id' AND tanggal='$tgl'");
			}else{
            $id=$_SESSION['name'];
            $tgll=date("Y-m-d");
            $sql = mysqli_query($koneksi, "SELECT * FROM pembelian_detail INNER JOIN pembelian ON
            pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
            INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk and nama_cafe='$id' where tanggal='$tgll';");
			
			}
			
			while($row = mysqli_fetch_array($sql)){
			?>

        
                        <tr>
            <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id_pembelianproduk"]; ?>"></td>
            <td><?php echo $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['jumlah']*$row['harga']; ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['ket'] ?></td>
            <td>
            <a class="btn btn-info btn-sm" href="index.php?halaman=detailpembelian&id_pembelianproduk=<?php echo $row['id_pembelianproduk']; ?>"><i class="fas fa-pencil-alt"> </i> DETAIL </a>
            </td>
			</tr>
			<?php 
			}
			?>
 </tr>
 
</table>
</body>
</html>


