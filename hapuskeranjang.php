<?php
	session_start();

	//remove the id from our cart array
	$key = array_search($_GET['id_produk'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['qty_array'][$_GET['index']]);
	//rearrange array after unset
	$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);

	$_SESSION['message'] = "BERHASIL MENGHAPUS";
	header('location: cart.php');
?>