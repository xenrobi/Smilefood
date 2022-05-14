<?php
include "koneksi.php";

$nim=$_POST["nim"];
$username=$_POST["username"];
$email=$_POST["email"];
$no_hp=$_POST["no_hp"];
$password=$_POST["password"]; 



  $sql="insert into siswa (ni,kelas,password,notelp,email,level) values
		('$nim','$username','$password','$no_hp','$email','siswa')";

  $hasil=mysqli_query($koneksi,$sql);

  if ($hasil) {
    echo "Berhasil Daftar";
	header("location:index.php?halaman=user?alert=berhasil");
	exit;
  }
else {
    echo "Gagal Daftar";
	exit;
}  

?>