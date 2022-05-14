<?php

include 'config/koneksi.php';
	session_start();

	if(isset($_POST['save'])){
		foreach($_POST['indexes'] as $key){
			$_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
		}

		$_SESSION['message'] = 'JUMLAH BERHASIL DI UPDATE';
		header('location: checkout.php');
	}


	if (isset($_POST["checkout"]))
	{
		date_default_timezone_set('Asia/Jakarta');
		$id_kelas=$_SESSION["id"];
		$tgl=date("Y-m-d H:i:s");
		$total = $_SESSION['total_price'];
		$ket=$_POST['ket'];
		$status="PROSES";
	
		$koneksi->query("INSERT INTO pembelian(id_kelas,tanggal,total,ket)
		VALUES ('$id_kelas','$tgl','$total','$ket')")or die(mysqli_error($koneksi));;
	 

		$id_pembelian=$koneksi->insert_id;
		foreach($_SESSION['cart'] as $id_produk=>$idp)
	  
		{
			$idx_qty = "qty_" . $idp;
			$jumlah = $_POST[$idx_qty];
		   $koneksi->query("INSERT INTO pembelian_detail (id_pembelian,id_produk,jumlah,status)
		   VALUES ('$id_pembelian',$idp,'$jumlah','$status') ")or die(mysqli_error($koneksi));
	   }
	unset($_SESSION['cart']);     
	echo"<script>alert('TERIMA KASIH SUDAH BELANJA');</script>";

	echo"<script>location='index.php';</script>";
	 
	}
?>
