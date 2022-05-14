<?php
session_start();

if(empty($_SESSION['cart'])  OR  !isset($_SESSION['cart']))
{

    echo"<script>alert('KERANJANG KOSONG SILAHKAN BELANJA DULU');</script>";

    echo"<script>location='index.php';</script>";
}


?>
<?php
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
                <li><a href="#">Contact Us</a></li>
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
                <li><?php print_r($_SESSION['kls'])?> </li>
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
    <section class="breadcrumb-section set-bg" data-setbg="style/frontend/img/iklan5.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End --> 

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
        <div class="row">
        <div class="col-lg-12">
        <div class="shoping__cart__table">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<table class="table table-bordered table-striped">
				<thead>
					<th></th>
                    <th>GAMBAR</th>
					<th>NAMA</th>
					<th>HARGA</th>
					<th>JUMLAH</th>
					<th>SUBTOTAL</th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'kantin');
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sql = "SELECT * FROM produk WHERE id_produk IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									<td>
                                    <a href="hapuskeranjang.php?id=<?php echo $row['id_produk']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-xs" >HAPUS</a>
									</td>
                                    <td><img src="admin/gambar/<?php echo $row['foto']; ?>" alt="" widht='120px' height='100px'></td>
									<td><?php echo $row['nama_produk']; ?></td>
									<td><?php echo number_format($row['harga']); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><?php echo $_SESSION['qty_array'][$index]; ?></td>
									<td><?php echo number_format($_SESSION['qty_array'][$index]*$row['harga']); ?></td>
									<?php $total += $_SESSION['qty_array'][$index]*$row['harga']; ?>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="5" align="right"><b>Total</b></td>
						<td><b><?php echo number_format($total); ?></b></td>
             
					</tr>
				</tbody>
			</table>
			<a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
			</form>
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