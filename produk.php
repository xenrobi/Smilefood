<div class="container-fluid">
<section class="featured spad">


                <div class="col-lg-12">
                    <div class="section-title">
                    <?php 
$row=$koneksi->query("SELECT * FROM PRODUK WHERE nama_cafe='$_GET[id_cafe]' ");
 $per=$row->fetch_assoc(); ?>
                        <h2>DAFTAR PRODUK <?php echo $per['nama_cafe']?></h2>
                      
                    </div>
                    
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*"><object data="./style/frontend/img/select-all.svg" width="35" height="35"></object></li>
                            <li data-filter=".makanan"><object data="./style/frontend/img/dinner.svg" width="35" height="35"></object>MAKANAN</li>
                            <li data-filter=".minuman"><object data="./style/frontend/img/Beverage.svg" width="35" height="35"></object>MINUMAN</li>
                            <li data-filter=".snack"><object data="./style/frontend/img/french-fries.svg" width="35" height="35"></object>SNACK</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
            <div class="row featured__filter">
            <?php 
$row=$koneksi->query("SELECT * FROM PRODUK WHERE nama_cafe='$_GET[id_cafe]' AND jenis='MINUMAN'"); ?>
<?php  while($per=$row->fetch_assoc()){ ?>
    
                <div class="col-lg-3 col-md-4 col-sm-6 mix minuman">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"  data-setbg="admin/gambar/<?php echo $per['foto']?> ">
                            <ul class="featured__item__pic__hover">
                            
                                <li>
                                    <a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>&daftarCafe=<?php echo $per['nama_cafe']; ?>"><i class="fa fa-shopping-cart" name="add_to_cart" id="add_to_cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>">
                                <?php echo $per['nama_produk']?></a></h6>
                            <h5>Rp.<?php echo $per['harga']?></h5>
                        <div class="rating text-warning">
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php 
$row=$koneksi->query("SELECT * FROM PRODUK WHERE nama_cafe='$_GET[id_cafe]' AND jenis='MAKANAN'"); ?>
<?php  while($per=$row->fetch_assoc()){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix makanan">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="admin/gambar/<?php echo $per['foto']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>&daftarCafe=<?php echo $per['nama_cafe']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>">
                                <?php echo $per['nama_produk']?></a></h6>
                            <h5>Rp.<?php echo $per['harga']?></h5>
                            <div class="rating text-warning">
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php 
$row=$koneksi->query("SELECT * FROM PRODUK WHERE nama_cafe='$_GET[id_cafe]' AND jenis='SNACK'"); ?>
<?php  while($per=$row->fetch_assoc()){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix snack">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="admin/gambar/<?php echo $per['foto']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>&daftarCafe=<?php echo $per['nama_cafe']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="tambahkeranjang.php?id_produk=<?php
                                echo $per['id_produk']?>">
                                <?php echo $per['nama_produk']?></a></h6>
                            <h5>Rp.<?php echo $per['harga']?></h5>
                            <div class="rating text-warning">
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                          <span><i class="fa fa-star"></i></span>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
       
    </section>
 </div>