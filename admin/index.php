<?php
session_start();


if(!isset($_SESSION['username']))
{
  echo"<script>alert('ANDA HARUS LOGIN DULU');</script>";
  echo"<script>location='login.php';</script>";
  header('location:login.php');
  exit();

}
?>
<?php
include 'koneksi.php';
?>

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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/adm2.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ADMINSTRATOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/adm.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["username"] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link"><i class="nav-icon fas fa-home"></i><p>HOME</p></a>
        </li>
        <li class="nav-item has-treeview">
            <a href="index.php?halaman=produk" class="nav-link"><i class="nav-icon fas fa-cube"></i><p>PRODUK</p></a>
        </li>
        
        <li class="nav-item has-treeview">
        <a href="index.php?halaman=order" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i><p>ORDERAN</p></a>
        </li>
        <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                LAPORAN PENJUALAN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=laporanpercafe" class="nav-link">
                  <i class="far fa-file  nav-icon"></i>
                  <p>PER CAFE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=laporan" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>SEMUA</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                MEMBER
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?halaman=cafe" class="nav-link ">
                  <i class="far fa-file  nav-icon"></i>
                  <p>CAFE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?halaman=user" class="nav-link">
                  <i class="far fa-file nav-icon"></i>
                  <p>SISWA</p>
                </a>
              </li>
            </ul>
          </li>
             
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DASHBOARD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logout.php">LOGOUT</a></li> 
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">MENU</h3>

              </div>
              <div class="card-body">
              <?php
              if (isset($_GET['halaman']))
            {
                    if ($_GET['halaman']=="produk")
                    {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk")
                    {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="editproduk")
                    {
                        include 'editproduk.php';
                    }
                    elseif ($_GET['halaman']=="editproduk")
                    {
                        include 'editproduk.php';
                    }
                    elseif ($_GET['halaman']=="order")
                    {
                        include 'order.php';
                    }
                    elseif ($_GET['halaman']=="cafe")
                    {
                        include 'cafe.php';
                    }
                    elseif ($_GET['halaman']=="user")
                    {
                        include 'user.php';
                    }
                    elseif ($_GET['halaman']=="detailpembelian")
                    {
                        include 'detailpembelian.php';
                    }
                    elseif ($_GET['halaman']=="laporan")
                    {
                        include 'laporan.php';
                    }
                    elseif ($_GET['halaman']=="laporanpercafe")
                    {
                        include 'percafe.php';
                    }
                    elseif ($_GET['halaman']=="registercafe")
                    {
                        include 'registercf.php';
                    }
                    elseif ($_GET['halaman']=="registersiswa")
                    {
                        include 'registersw.php';
                    }
                    elseif ($_GET['halaman']=="editcf")
                    {
                        include 'editcf.php';
                    }
                    elseif ($_GET['halaman']=="editsw")
                    {
                        include 'editsw.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk?alert=berhasil")
                    {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="user?alert=berhasil")
                    {
                        include 'user.php';
                    }
                    elseif ($_GET['halaman']=="cafe?alert=berhasil")
                    {
                        include 'cafe.php';
                    }
            }
            else
            {
                include 'home.php';
            }

              ?>
              </div>
              <!-- /.card-body -->
            
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>WEB DEVELOPER</b> 
    </div>
    <strong>Copyright &copy; 2020 <a href="#">UVERS STUDIO</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
