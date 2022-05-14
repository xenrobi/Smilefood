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
                <h3 class="card-title">DAFTAR SISWA</h3>

                <div class="card-tools">
                    <div class="input-group-append">
                    <a class="btn btn-dark btn-sm" href="index.php?halaman=registersiswa"><i class="fas fa-plus-square"> </i> REGISTER USER </a>
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
          <th>NOMOR INDUK</th>
		      <th>USERNAME</th>
          <th>EMAIL</th>
		    	<th>NO TELEPON</th>
	        <th>OPSI</th>
		</tr>
        </thead>
  
<?php

$query = mysqli_query($koneksi, "SELECT * FROM siswa");

$no = 1;
foreach ($query as $row) :
 ?>

 <tr>
  <td><?= $no++; ?></td>
  <td><?= $row['ni']; ?></td>
  <td><?= $row['kelas']; ?></td>
  <td><?= $row['email']; ?></td> 
  <td><?= $row['notelp']; ?></td>
  <td>
  <a class="btn btn-danger btn-sm" href="hapussw.php?id_kelas=<?php echo $row['id_kelas']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash-alt"> </i> HAPUS</a>        
  <a class="btn btn-info btn-sm" href="index.php?halaman=editsw&id_kelas=<?php echo $row['id_kelas']; ?>"><i class="fas fa-pencil-alt"> </i> Edit </a>
  </td>
 </tr>

<?php endforeach; ?>
</table>
</body>
</html>


