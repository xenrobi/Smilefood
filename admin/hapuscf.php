<?php 
include 'koneksi.php';
$id = $_GET['id_cafe'];
mysqli_query($koneksi,"delete from cafe where id_cafe='$id'");

echo"<script>alert('DATA BERHASIL DI HAPUS');</script>";
echo"<script>location='index.php?halaman=cafe';</script>";

 
?>