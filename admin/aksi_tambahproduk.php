<?php 
include 'koneksi.php';
$nama = $_POST['nama_produk'];
$jenis = $_POST['jenis'];
$keterangan = $_POST['keterangan'];
$cafe = $_POST['nama_cafe'];
$harga = $_POST['harga'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO produk VALUES(NULL,'$nama','$harga','$cafe','$jenis','$keterangan','$xx')");
		header("location:index.php?halaman=tambahproduk?alert=berhasil");
	}else{
		header("location:index.php?alert=gagal_ukuran");
	}
}