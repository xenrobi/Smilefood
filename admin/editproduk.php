<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_produk'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id_produk"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM produk WHERE id_produk='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>EDIT Produk</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #0246d7;
      }
    button {
          background-color: #090960;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Produk Data <?php echo $data['nama_produk']; ?></h1>
      <center>
      <form method="POST" action="aksi_editproduk.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_produk" value="<?php echo $data['id_produk']; ?>"  hidden />
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus="" required="" /></input>
        </div>
        <div>
          <label>Jenis</label>
         <select name="jenis"  class="form-control"  value="<?php echo $data['jenis']; ?>"  required="required">
       			<option ><?php echo $data['jenis']; ?></option>
        		<option value="MAKANAN">MAKANAN</option>
        		<option value="MINUMAN">MINUMAN</option>
       			<option value="SNACK">SNACK</option>
        		<option value="LAIN-LAIN">LAIN-LAIN</option>
        		</select>
        </div>
        <div>
        <label>Nama Cafe</label>
        <input type="text" name="nama_cafe" value="<?php echo $data['nama_cafe']; ?>" readonly/></input>
        </div>
        <label>Keterangan</label>
         <input type="text" name="keterangan" value="<?php echo $data['keterangan']; ?>" /></input>
        <div>
          <label>Harga</label>
         <input type="number" name="harga" required=""value="<?php echo $data['harga']; ?>" /></input>
        </div>
        <div>
          <label>Gambar Produk</label>
          <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
          <i style="font-weight: bold; float: left;font-size: 13px;color: red">Abaikan jika tidak merubah gambar produk</i></input>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>