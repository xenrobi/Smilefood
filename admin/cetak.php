<html>
<head>
	<title>Print Laporan</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN PENJUALAN</h2>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th width="10%">Tanggal</th>
            <th width="10%">Nama</th>
			<th width="10%">Nama Barang</th>
			<th width="10%">Nama Cafe</th>
            <th width="10%">Harga</th>
			<th width="5%">Jumlah</th>
            <th width="10%">Sub Total</th>
		</tr>
		<?php 
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date("Y-m-d");
		$no = 1;
        $total=0;
        $jumlah=0;
		$sql = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
        pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
        INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk where tanggal='$tgl' ORDER BY nama_cafe desc");
		while($data = mysqli_fetch_array($sql)){

            $jumlah += $data['jumlah'];
            $total += $data['jumlah']*$data['harga']; ;
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['tanggal']; ?></td>
            <td><?php echo $data['kelas']; ?></td>
			<td><?php echo $data['nama_produk']; ?></td>
            <td><?php echo $data['nama_cafe']; ?></td>
            <td><?php echo $data['harga']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
			<td><?php echo $data['jumlah']*$data['harga']; ?></td>
		</tr>
        <?php 
		}
		?>
        <tfoot>
                <th colspan="3">QTY SEMUA ORDERAN</th>
                <th><?php echo number_format($jumlah) ?> Orderan</th>
                <th colspan="3">TOTAL PENDAPATAN</th>
                <th>Rp. <?php echo number_format($total) ?></th>
            </tfoot>
	
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>