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
                <h3 class="card-title">DAFTAR CAFE</h3>

                <div class="card-tools">
             
   
              
                  <div class="input-group input-group-sm" style="width: 150px;">
                    
                    <div class="input-group-append">
                    <a class="btn btn-dark btn-sm" href="index.php?halaman=registercafe"><i class="fas fa-plus-square"> </i> REGISTER CAFE </a>
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
      <th>NAMA CAFE</th>
      <th>PEMILIK</th>
		  <th>ALAMAT</th>
			<th>NO TELEPON</th>
      <th>EMAIL</th>
	    <th>OPSI</th>
		</tr>
        </thead>
  
<?php

$query = mysqli_query($koneksi, "SELECT * FROM cafe");

$no = 1;
foreach ($query as $row) :
 ?>

 <tr>
  <td><?= $no++; ?></td>
  <td><?= $row['nama_cafe']; ?></td>
  <td><?= $row['pemilik']; ?></td>
  <td><?= $row['alamat']; ?></td> 
  <td><?= $row['notelp']; ?></td>
  <td><?= $row['email']; ?></td>
  <td>
  <a class="btn btn-danger btn-sm" href="hapuscf.php?id_cafe=<?php echo $row['id_cafe']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash-alt"> </i> HAPUS</a>
  <a class="btn btn-info btn-sm" href="index.php?halaman=editcf&id_cafe=<?php echo $row['id_cafe']; ?>"><i class="fas fa-pencil-alt"> </i> EDIT </a>
  </td>
 </tr>

<?php endforeach; ?>
</table>
</body>
</html>


