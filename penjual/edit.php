<?php
	include '../config/koneksi.php';
	$id = $_GET['id_pembelianproduk'];
	$data = mysqli_query($koneksi,"select * from pembelian_detail where id_pembelianproduk='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
  <form method="post">
 <input type="hidden"  class="form-control"  name="status" value="SUDAH DI ANTAR"></option>   
  </td>
  
  <td><button class="btn btn-success" name="save"> KONFIMASI</button></td>
  </form>
 </tr>


</table>

<div>


</div>
<?php 
	}
	?>

    <?php
if(isset($_POST["save"]))
{
    $status=$_POST["status"];
    $koneksi->query("UPDATE pembelian_detail set status='$status' where id_pembelianproduk='$id'");

echo"<script>alert('PESANAN SUDAH DI KONFIRMASI');</script>";
echo"<script>location='index.php?halaman=order';</script>";
}
    ?>