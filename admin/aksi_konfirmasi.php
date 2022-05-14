
    <?php
if(isset($_POST["save"]))
{
    $status=$_POST["status"];
    $koneksi->query("UPDATE pembelian set status='$status' where id_pembelian='$id'");

echo"<script>alert('PESANAN SUDAH DI KONFIRMASI');</script>";
echo"<script>location='index.php?halaman=order';</script>";
}
    ?>
     <?php
	include 'koneksi.php';
	$id = $_GET['id_pembelian'];
	$data = mysqli_query($koneksi,"select * from pembelian where id_pembelian='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
        
 <?php 
	}
	?>