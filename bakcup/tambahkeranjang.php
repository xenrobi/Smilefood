<?php
	session_start();

	if(!in_array($_GET['id_produk'], $_SESSION['cart'])){
		array_push($_SESSION['cart'], $_GET['id_produk']);
		$_SESSION['message'] = 'PRODUK SUDAH DI TAMBAH KE KERANJANG';
	}
	else{
		$_SESSION['message'] = 'PRODUK SUDAH DI KERANJANG';
	}

	header('location: index.php');
?>

