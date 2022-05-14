<?php
session_start();
if(!isset($_SESSION['siswa']))
{
  echo"<script>alert('ANDA HARUS LOGIN DULU');</script>";
  echo"<script>location='login.php';</script>";
  header('location:login.php');
  exit();

}
include 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
   
    <title>CART</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="style/frontend/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style/frontend/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="style/frontend/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="style/frontend/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="style/frontend/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="style/frontend/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="style/frontend/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="style/frontend/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-shopping-cart"></i> <span><?php echo count($_SESSION['cart']); ?></span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
             
            <div class="header__top__right__auth">
            <?php if  (isset($_SESSION["siswa"])) :?>
                               <a href="logout.php"><i class="fa fa-user"></i> Logout</a>
                            <?php else: ?>
                               <a href="login.php"><i class="fa fa-user"></i> Login</a>
                            <?php  endif ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="pesanan.php">List Pesanan</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> Hello</li>
                <li><?php print_r($_SESSION['kls'])?></li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>HAI <?php print_r($_SESSION['kls'])?> </li>
                                <li>SELAMAT BELANJA</li>
                            </ul>
                        </div>
                    </div>
                   
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="style/frontend/img/" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="pesanan.php">List Pesanan</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                        <div class="header__top__right__auth">
                        <?php if  (isset($_SESSION["siswa"])) :?>
                               <a href="logout.php"><i class="fa fa-user"></i> Logout</a>
                            <?php else: ?>
                               <a href="login.php"><i class="fa fa-user"></i> Login</a>
                            <?php  endif ?>
                            </div>
                            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <span><?php echo count($_SESSION['cart']); ?></span></a></li>
                        </ul>
              
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>DAFTAR CAFE</span>
                        </div>
                        <ul>
                     <?php

                    $query = mysqli_query($koneksi, "SELECT * FROM cafe");
                    foreach ($query as $row) :
                        ?>
                        <li><a href="index.php?halaman=produk&id_cafe=<?php echo $row['nama_cafe']; ?>"><?php echo $row['nama_cafe']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                        <form action="index.php?halaman=cari&cari<?php echo $_GET[cari]; ?>" method="GET">
                               
                               <input type="text" placeholder="Masukkan Nama Makanan" name="cari">
                               <button type="submit" class="site-btn">Cari</button>
                           </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+628</h5>
                                <span>MELAYANI MAKAN SIANG</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="style/frontend/img/iklan2.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>List Pesanan</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>List Pesanan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<?php

$all=array();
$kls="-";
$tglm="-";
if(isset($_POST["kirim"]))
{
    $tglm=$_POST['tglm'];
    $kelas=$_POST['kelas'];
    $ambil=$koneksi->query("SELECT * FROM pembelian_detail INNER JOIN pembelian ON
    pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
    INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk where kelas='$kelas' AND tanggal='$tglm'; ")or die(mysqli_error($koneksi));
    while($d=$ambil->fetch_assoc())
    {
        $all[]=$d;
    }
       // echo"<pre>";
       // print_r($all);
        //echo"</pre>";
}

?>

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
      
    <div class="row">
    <div class="col-lg-12">
    <div class="shoping__cart__table">
			<table class="table table-bordered table-striped">
            <form method="post">
    <div class="row">
        <div class="col-md-5">
    <div class="form-group">
    <h2>LIHAT LIST ORDERAN <?php echo $_SESSION['kls']; ?> TANGGAL <?php echo $tglm ?> </h2>
    <label>TANGGAL PESAN</label>
    <input type="hidden" class="form-control" name="kelas" value="<?php echo $_SESSION['kls']; ?> ">
    <input type="date" class="form-control" name="tglm" value="<?php echo $tglm?>">
    </div>
        </div>
       
        <div class="col-md-2">
        <label>&nbsp;</label><br>
        <button class="btn btn-primary" name="kirim">LIHAT</button>
        </div>
    </div>
    </form>
              <thead>
              <tr>
            <th>NO</th>
            <th>TGL</th>
            <th>PRODUK</th>
            <th>HARGA</th>
            <th>TOTAL</th>
            <th>JUMLAH</th>
            <th>STATUS</th>
            </tr>
            </thead>
            <tbody>
            <?php $total=0; ?>
            <?php $qty=0; ?>
            <?php foreach($all as $key =>$value): ?>
            <?php $qty+=$value['jumlah'] ?>
            <?php $total+=$value['total'] ?>
                <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value["tanggal"] ?></td>
                <td><?php echo $value["nama_produk"] ?></td>
                <td><?php echo $value["harga"] ?></td>
                <td>Rp. <?php echo number_format($value["total"])  ?></td>
                <th><?php echo $value['jumlah'] ?> Orderan</th>
                     <td><?php echo $value["status"] ?></td>
            </tr>
            <?php endforeach ?>
            </tbody>
            <tfoot>
            <th colspan="1">QTY SEMUA ORDERAN</th>
                <th><?php echo number_format($qty) ?> Orderan</th>
                <th><br></th>
                <th colspan="2">TOTAL BAYAR</th>
                <th>Rp. <?php echo number_format($total) ?></th>
            </tfoot>
			</table>
		</div>
	</div>
     

    </section>

    <!-- Shoping Cart Section End -->
  <!-- Footer Section Begin -->
  <footer class="footer spad">
     
     <div class="row">
         <div class="col-lg-12">
       
                 <div class="footer__copyright__text"><p>
                 Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                  </i> By UVERS STUDIO
</p></div>
               
             </div>
         </div>
     </div>

</footer>

    <!-- Js Plugins -->
    <script src="style/frontend/js/jquery-3.3.1.min.js"></script>
    <script src="style/frontend/js/bootstrap.min.js"></script>
    <script src="style/frontend/js/jquery.nice-select.min.js"></script>
    <script src="style/frontend/js/jquery-ui.min.js"></script>
    <script src="style/frontend/js/jquery.slicknav.js"></script>
    <script src="style/frontend/js/mixitup.min.js"></script>
    <script src="style/frontend/js/owl.carousel.min.js"></script>
    <script src="style/frontend/js/main.js"></script>


</body>


</html>