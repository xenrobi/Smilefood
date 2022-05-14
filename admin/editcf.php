<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAIL PROFIL CAFE</title>
</head>
<body>
<?php

$query = mysqli_query($koneksi, "SELECT * FROM cafe
  where id_cafe='$_GET[id_cafe]';");

foreach ($query as $row) :
 ?>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DATA CAFE</h3>

                <div class="card-tools">
               
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
              <table class="table table-head-fixed text-nowrap">
              <tr><td><b>Nama Cafe :</b></td><td><?= $row['nama_cafe']; ?></td></tr>
              <tr><td><b>Pemilik :</b></td><td><?= $row['pemilik']; ?></td></tr>
              <tr><td><b>Alamat :</b></td><td><?= $row['alamat']; ?></td></tr>
              <tr><td><b>NAMA CAFE :</b></td><td><?= $row['nama_cafe']; ?></td></tr>
              <tr><td><b>No Telp :</b></td><td><?= $row['notelp']; ?></td></tr>
              <tr><td><b>Email :</b></td><td><?= $row['email']; ?></td></tr>
                  <thead>
              <tr>
           
		</tr>
        </thead>
  
     

 
  <td>
 
  <?php
	include 'koneksi.php';
	$id = $_GET['id_cafe'];
	$data = mysqli_query($koneksi,"select * from cafe where id_cafe='$id'");
	while($d = mysqli_fetch_array($data)){
        ?>
        <div class="container">
  <form method="post">
  <label>Password:</label>
  <input type="password" name="password" class="form-control" placeholder="Masukan Password" />
  </td>
  
  <td><br><button class="btn btn-success" name="save"> UBAH PASSWORD</button></td>
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
    $id = $_GET['id_cafe'];
    $pass=$_POST["password"];
    $koneksi->query("UPDATE cafe set password='$pass' where id_cafe='$id'")or die(mysqli_error($koneksi));;

echo"<script>alert('PASSWORD BERHASIL DI GANTI');</script>";
echo"<script>location='index.php?halaman=cafe';</script>";
}
    ?>
     <?php endforeach; ?>
</body>
</html>