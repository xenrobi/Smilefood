<?php
include "koneksi.php";


$username=$_POST["cafe"];
$pemilik=$_POST["pemilik"];
$alamat=$_POST["alamat"];
$email=$_POST["email"];
$no_hp=$_POST["no_hp"];
$password=$_POST["password"]; 



  $sql="insert into cafe (nama_cafe,password,pemilik,alamat,notelp,email,level) values
		('$username','$password','$pemilik','$alamat','$no_hp','$email','cafe')"or die(mysqli_error($koneksi));

  $hasil=mysqli_query($koneksi,$sql);

  if ($hasil) {
    echo "Berhasil Daftar";
	header("location:index.php?halaman=cafe?alert=berhasil");
	exit;
  }
else {
    echo "Gagal Daftar";
	exit;
}  

?>