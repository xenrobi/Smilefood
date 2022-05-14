<?php 
	include ("koneksi.php");
 
	if (isset($_POST['edit'] ) ) {

        
        $id  = $_POST['id_pembelianproduk'];
		$sql = mysqli_query ($koneksi, "UPDATE status SET status = 'SUDAH DI TERIMA DI KANTIN' WHERE id_pembelianproduk = '$id' ")or die(mysqli_error($koneksi));
	
echo"<script>alert('PESANAN SUDAH DI KONFIRMASI');</script>";
echo"<script>location='index.php?halaman=order';</script>";
	}
 
 
 ?>