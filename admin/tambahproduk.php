<!DOCTYPE html>
<html>
<head>
<?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ekstensi'){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
					Ekstensi Tidak Diperbolehkan
				</div>								
				<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Ukuran File terlalu Besar
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> SUKSES</h4>
					Data Berhasil Disimpan
				</div> 								
				<?php
			}
		}
		?>
	<title>TAMBAH PRODUK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">Tambah Data Produk</h2>
		<form action="aksi_tambahproduk.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama PRODUK</label>
				<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_produk" required="required">
			</div>
			<div class="form-group">
				<label>Harga </label>
				<input type="number" class="form-control" placeholder="Masukkan Harga" name="harga" required="required">
			</div>
			
			<div class="form-group">
				<label>Nama Cafe </label>
				<select name="nama_cafe"  class="form-control" required="required">
				<?php 
				$row=$koneksi->query("SELECT * FROM cafe"); ?>
				<?php  while($per=$row->fetch_assoc()){ ?>
					<option value="<?php echo $per['nama_cafe']; ?>"><?php echo $per['nama_cafe'];?></option>
				<?php
				}
				?>
					</select>
			</div>
			<div class="form-group">
				<label>Jenis</label>

				<select name="jenis"  class="form-control" required="required">
       			<option >PILIH JENIS MAKANAN</option>
        		<option value="MAKANAN">MAKANAN</option>
        		<option value="MINUMAN">MINUMAN</option>
       			<option value="SNACK">SNACK</option>
        		<option value="LAIN-LAIN">LAIN-LAIN</option>
        		</select>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea type="text" class="form-control" placeholder="Masukkan Keterangan Produk" name="keterangan" required="required"></textarea>
			</div>
			<div class="form-group">
				<label>Foto :</label>
				<input type="file" name="foto" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>			
			<input type="submit" name="" value="Simpan" class="btn btn-primary">
		</form>
	</div>

</body>
</html>