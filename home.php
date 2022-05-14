<?php 




include 'config/koneksi.php';

    
if (!isset($_GET['cari'])) {

    $row = mysqli_query($koneksi, "SELECT * FROM produk where nama_produk='-'");
  } else {
    $row = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%" . $_GET['cari'] . "%'");
  }


?>

<div class="container-fluid">
<section class="featured spad">
                <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>DAFTAR PRODUK</h2>
                      
                    </div>
                    
                  
                </div>
            </div>
            <div class="col-12">
            <div class="row featured__filter">
            <?php
          while ($per = $row->fetch_assoc()) :
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix minuman">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"  data-setbg="admin/gambar/<?php echo $per['foto']?> ">
                            <ul class="featured__item__pic__hover">
                                <li>
                                    <a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>"><?php echo $per['nama_produk']?></a></h6>
                            <h5>Rp.<?php echo $per['harga']?></h5>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
              
            </div>



           