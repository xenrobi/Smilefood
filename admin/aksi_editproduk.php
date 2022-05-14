<?php

include 'koneksi.php';

  $id = $_POST['id_produk'];
  $nama_produk   = $_POST['nama_produk'];
  $harga     = $_POST['harga'];
  $jenis    = $_POST['jenis'];
  $cafe    = $_POST['nama_cafe'];
  $keterangan    = $_POST['keterangan'];
  $gambar_produk = $_FILES['foto']['name'];


  if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg','gif'); 
    $x = explode('.', $gambar_produk);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
                      
               
                   $query  = "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', nama_cafe = '$cafe', 
                   jenis = '$jenis',keterangan = '$keterangan',foto = '$nama_gambar_baru'";
                    $query .= "WHERE id_produk = '$id'";
                    $result = mysqli_query($koneksi, $query);
                 
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                   
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php?halaman=produk';</script>";
                    }
              } else {     
         
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='index.php?halaman=tambahproduk';</script>";
              }
    } else {

      $query  = "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', nama_cafe = '$cafe', 
      jenis = '$jenis',keterangan = '$keterangan'";
       $query .= "WHERE id_produk = '$id'";
      $result = mysqli_query($koneksi, $query);
    
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
     
          echo "<script>alert('Data berhasil diubah.');window.location='index.php?halaman=produk';</script>";
      }
    }