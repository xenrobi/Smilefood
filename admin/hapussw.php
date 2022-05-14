<?php 
include 'koneksi.php';
$id = $_GET['id_kelas'];
mysqli_query($koneksi,"delete from SISWA where id_kelas='$id'");

echo"<script>alert('DATA BERHASIL DI HAPUS');</script>";
echo"<script>location='index.php?halaman=user';</script>";

 
?>