<?php 
include '../config/koneksi.php';
$makanan = $_POST['pilih'];
$jumlah_dipilih = count($makanan);
 
for($x=0;$x<$jumlah_dipilih;$x++){
	mysql_query("DELETE FROM pembelian_detail WHERE id_pembelianproduk='$makanan[$x]'");
}
 
header("location:order.php");
?>