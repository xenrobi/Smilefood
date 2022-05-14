<?php 
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi,"delete from produk where id_produk='$id'");

header("location:index.php");
 
?>