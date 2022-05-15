<?php
session_start();

if(!isset($_SESSION['siswa']))
{
  echo"<script>alert('ANDA HARUS LOGIN DULU');</script>";
  echo"<script>location='login.php';</script>";
  header('location:login.php');
  exit();

}

	//initialize cart if not set or is unset
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

	//unset qunatity
unset($_SESSION['qty_array']);
include 'config/koneksi.php';



if (!isset($_GET['cari'])) {
    $row = mysqli_query($koneksi, "SELECT * FROM produk");
  } else {
    $row = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%" . $_GET['cari'] . "%'");
  }


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="xen">
    <meta name="keywords" content="xen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>

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
	<style>
	html {
	  scroll-behavior: smooth;
	}
	</style>
</head>

<body>
    <!-- Page Preloder -->
  


    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="style/frontend/img/logo.png" alt="LOGO"></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <span><?php echo count($_SESSION['cart']); ?></span></a></li>
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
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="#">HALAMAN</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                    </ul>
                </li>
                
                <li><a href="pesanan.php">Liat Pesanan</a></li>
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

            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="header__logo">
                        <a href="index.php"><img src="style/frontend/img/logo.png" alt="" widht="72px" height="100px"></a>
                        <span>SMILEFOOD</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="#">HALAMAN</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="cart.php">Shoping Cart</a></li>
                                    <li><a href="checkout.php">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="pesanan.php">Lihat Pesanan</a></li>
                            <li><a href="#">Contact Us</a></li>
                        
          
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
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
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>OUR PARTNER</span>
                        </div>
                        <ul>
                        <?php

                        $query = mysqli_query($koneksi, "SELECT * FROM cafe");
                        foreach ($query as $row) :
                            ?>
                            <li><a href="index.php?halaman=produk&id_cafe=<?php echo $row['nama_cafe']; ?>"><?php echo $row['nama_cafe']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                     

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                      <div class="hero__search__form">
                            <form action="index.php?halaman=cari" method="GET">
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
                                <span>HANYA MAKAN SIANG</span>
                            </div>
                        </div>
                    </div>

            <!-- COLAPSE IKLAN NANTI-->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <span class="promo"><i class="fa fa-certificate">HOT OFFER</i></span>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="style/frontend/img/b1.jpg" alt="First slide" height=347px>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="style/frontend/img/iklan2.png" alt="Second slide" height=347px>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="style/frontend/img/iklan3.png" alt="Third slide" height=347px>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="style/frontend/img/iklan4.png" alt="Third slide" height=347px>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="style/frontend/img/iklan5.png" alt="Third slide" height=347px>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="style/frontend/img/iklan7.png" alt="Third slide" height=347px>
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                    
                  <!-- COLAPSE IKLAN NANTI-->
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
        <div class="row">
        <div class="col-8">
        <span class="span-quote">"Animals are not products. Life doesn’t have a price.</span>
        </div>
        <div class="col-4-q1">
        <span class="span-quote1">“Anonymous</span>
        </div>
        </div>
            <div class="row">
            <div class="col-4">

    </div>
  

        
 <?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center" id="alertInfo">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
 <?php
              if (isset($_GET['halaman']))
            {
                    if ($_GET['halaman']=="produk")
                    {
                        include 'produk.php';
                    }
                    if ($_GET['halaman']=="cari")
                    {
                        include 'cari.php';
                    }
                    if ($_GET['halaman']=="produk2")
                    {
                        include 'produk1.php';
                    }
              

            }
            else
            {
                include 'home.php';
            }

              ?>
    </section>
    <!-- Categories Section End -->
 <!-- KONTEN -->
    <!-- KONTEN -->
    <div class="container">
    <div class="row">
    <div class="col-12">
        <h1>TERSEDIA</h1>
        </div>  
    
    </div>
          
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="style/frontend/img/drink.png">
                            <h5><a href="#">MINUMAN</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="style/frontend/img/wan.svg">
                            <h5><a href="#">MAKANAN</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="style/frontend/img/snack.png">
                            <h5><a href="#">SNACK</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="style/frontend/img/ice.png">
                            <h5><a href="#">LAIN-LAIN</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="style/frontend/img/categories/catl2.png">
                            <h5><a href="#">LAIN-LAIN</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Banner Begin -->

    <!-- Banner End -->

    <div class="col-12">

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
         </div>
    </footer>
    <!-- Footer Section End -->
    </div>
    <!-- Js Plugins -->
    <script src="style/frontend/js/jquery-3.3.1.min.js"></script>
    <script src="style/frontend/js/bootstrap.min.js"></script>
    <script src="style/frontend/js/jquery.nice-select.min.js"></script>
    <script src="style/frontend/js/jquery-ui.min.js"></script>
    <script src="style/frontend/js/jquery.slicknav.js"></script>
    <script src="style/frontend/js/mixitup.min.js"></script>
    <script src="style/frontend/js/owl.carousel.min.js"></script>
    <script src="style/frontend/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>