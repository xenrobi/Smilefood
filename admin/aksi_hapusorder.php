<?php 
include 'koneksi.php';
$id = $_GET['id_pembelian'];
mysqli_query($koneksi,"delete from pembelian where id_pembelian='$id'");

header("location:index.php?halaman=order");
 
?>