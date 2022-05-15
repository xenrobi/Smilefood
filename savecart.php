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
		$id_pembelian_array = array();

		foreach($_SESSION['cart'] as $id_produk=>$idp) {

		date_default_timezone_set('Asia/Jakarta');
			$id_kelas=$_SESSION["id"];
			$tgl=date("Y-m-d H:i:s");
			$total = $_POST['harga_satuan'. $idp]  * $_POST["qty_" . $idp];
			$ket=$_POST['ket'. $idp];

			$koneksi->query("INSERT INTO pembelian(id_kelas,tanggal,total,ket)
			VALUES ('$id_kelas','$tgl','$total','$ket')")or die(mysqli_error($koneksi));

			$id_pembelian=$koneksi->insert_id;
			array_push($id_pembelian_array, $id_pembelian);
		}
			$index = 0;

			foreach($_SESSION['cart'] as $id_produk=>$idp)
			{
				$id_pembelian = $id_pembelian_array[$index];
				$index++;
				$idx_qty = "qty_" . $idp;
				$jumlah = $_POST[$idx_qty];
				$status="PROSES";
			$koneksi->query("INSERT INTO pembelian_detail (id_pembelian,id_produk,jumlah,status)
			VALUES ('$id_pembelian',$idp,'$jumlah','$status') ")or die(mysqli_error($koneksi));
			}

	unset($_SESSION['cart']);
	echo"<script>alert('TERIMA KASIH SUDAH BELANJA');</script>";

	echo"<script>location='index.php';</script>";

	}
?>
