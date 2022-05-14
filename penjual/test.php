
        <?php 
        session_start();
		include '../config/koneksi.php';
		?>
 
		<br/><br/><br/>
 
		<form method="get">
			<label>PILIH TANGGAL</label>
			<input type="date" name="tanggal">
			<input type="submit" value="SELECT">
		</form>
 
		<br/> <br/>
 
		<table border="1">
			<tr>
			<th>No</th>
			<th>TGL</th>
            <th>KELAS</th>
		    <th>NAMA PRODUK</th>
			<th>JENIS</th>
            <th>NAMA CAFE</th>
            <th>HARGA</th>
            <th>JUMLAH</th>
            <th>TOTAL</th>
            <th>STATUS</th>
	        <th>OPSI</th>
			</tr>
			<?php 
			$no = 1;
 
			if(isset($_GET['tanggal'])){
                $id=$_SESSION['name'];
				$tgl = $_GET['tanggal'];
				$sql = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
                pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
                INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk AND nama_cafe='$id' AND tanggal='$tgl'");
			}else{
            $id=$_SESSION['name'];
            $sql = mysqli_query($koneksi, "SELECT * FROM pembelian_detail INNER JOIN pembelian ON
            pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
            INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk and nama_cafe='$id';");
			
			}
			
			while($row = mysqli_fetch_array($sql)){
			?>
                        <tr>
            <td><?php echo $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['nama_produk']; ?></td> 
            <td><?= $row['jenis']; ?></td>
            <td><?= $row['nama_cafe']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['jumlah']*$row['harga']; ?></td>
            <td><?= $row['status'] ?></td>
            <td>
            <a class="btn btn-info btn-sm" href="index.php?halaman=detailpembelian&id_pembelianproduk=<?php echo $row['id_pembelianproduk']; ?>"><i class="fas fa-pencil-alt"> </i> DETAIL </a>
            </td>
			</tr>
			<?php 
			}
			?>
		</table>
 
	</center>
</body>
</html>

SELECT * FROM pembelian_detail INNER JOIN pembelian ON
 pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
 INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk;"