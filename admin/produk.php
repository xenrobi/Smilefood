<?php include 'koneksi.php'; ?>
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
                <h3 class="card-title">DAFTAR PRODUK</h3>

                <div class="card-tools">
             
                <a  class="btn btn-primary" href="index.php?halaman=tambahproduk">TAMBAH PRODUK</a>
              
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="type" name="table_search" class="form-control float-right" placeholder="Search">
                    
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 1000px;">
              <table class="table table-head-fixed text-nowrap">
                  <thead>
              <tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA PRODUK</th>
			<th>JENIS</th>
      <th>NAMA CAFE</th>
      <th>KETERANGAN</th>
      <th>HARGA</th>
			<th>OPSI</th>
		</tr>
        </thead>
        <?php
 
      $query = "SELECT * FROM produk ORDER BY nama_produk ASC";
      $result = mysqli_query($koneksi, $query);
    
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }
      $no = 1;
   
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
             <tbody>
			<tr>
				<td><?php echo $no++; ?></td>
        <td><img src="gambar/<?php echo $row['foto'] ?>" width="50" height="50"></td>
        <td><?php echo $row['nama_produk']; ?></td>
        <td><?php echo $row['jenis'];   ?></td>
        <td><?php echo $row['nama_cafe']; ?></td>
        <td><?php echo $row['keterangan']; ?></td>
        <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
      
				<td>
                <a class="btn btn-info btn-sm" href="index.php?halaman=editproduk&id_produk=<?php echo $row['id_produk']; ?>"><i class="fas fa-pencil-alt"> </i> EDIT </a>
                <a class="btn btn-danger btn-sm" href="aksi_hapusproduk.php?id=<?php echo $row['id_produk']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash-alt"> </i> HAPUS</a>
				</td>
			</tr>
            </tbody>
		

<?php 
		}
		?>
    </table>
</body>
</html>

        
