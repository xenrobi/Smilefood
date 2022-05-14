<?php
	session_start();

	if(!in_array($_GET['id_produk'], $_SESSION['cart'])){
		array_push($_SESSION['cart'], $_GET['id_produk']);
		$_SESSION['message'] = 'PRODUK SUDAH DI TAMBAH KE KERANJANG';
		
		/**
		* Diambil dari parameter daftarCafe
		* @param daftarCafe
		**/
		header("Location: index.php?halaman=produk&id_cafe=".$_GET['daftarCafe']."#alertInfo");
	}
	else{
		$_SESSION['message'] = 'PRODUK SUDAH DI KERANJANG';
		/**
		* Diambil dari parameter daftarCafe
		* @param daftarCafe
		**/
		header("Location: index.php?halaman=produk&id_cafe=".$_GET['daftarCafe']."#alertInfo");
	}

	//header('location:index.php', true, 301);
?>

