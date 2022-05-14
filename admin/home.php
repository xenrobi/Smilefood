<?php

$tgl=date("Y-m-d");
$data_beli = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
pembelian_detail.id_pembelian = pembelian.id_pembelian where tanggal='$tgl' and status='proses';");
$jumlah_beli = mysqli_num_rows($data_beli);

$data_user = mysqli_query($koneksi,"SELECT * FROM siswa");
$jumlah_user = mysqli_num_rows($data_user);

$data_cafe = mysqli_query($koneksi,"SELECT * FROM cafe");
$jumlah_cafe = mysqli_num_rows($data_cafe);
?>



<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jumlah_beli; ?></h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
    
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah_user; ?></h3>

                <p>JUMLAH MEMBER</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="index.php?halaman=user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jumlah_cafe; ?></h3>

                <p>JUMLAH PARTNER</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="index.php?halaman=cafe" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
    
          <!-- ./col -->
          <div class="card">
              <div class="card-header">
              <label>PILIH TANGGAL</label>
                <div class="card-tools">
                <form method="get">
		
			<input type="date" name="tanggal" href="index.php?halaman=order&tanggal=<?php echo $row['tanggal']; ?>">
			<input type="submit"  value="PILIH" >
      <a  class="btn btn-info btn-sm" href="cetak2.php?tanggal=<?php echo $_GET['tanggal']; ?>" target="_blank">PRINT LAPORAN ORDERAN</a> 

		</form>
   
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <label>DAFTAR PESANAN  YANG MASUK</label>
              <table class="table table-head-fixed text-nowrap ">
                  <thead>
              <tr>
            
            <th>NO</th>
            <th>TGL</th>
            <th>KELAS</th>
            <th>NAMA PRODUK</th>
            <th>JENIS</th>
            <th>NAMA CAFE</th>
            <th>HARGA</th>
            <th>JUMLAH</th>
            <th>TOTAL</th>
            <th>STATUS</th>
	        <th>OPSI</th>
		</tr>
        </thead>
        <?php 
			$no = 1;
 
			if(isset($_GET['tanggal'])){
        $tgl = $_GET['tanggal'];
  
				$sql = mysqli_query($koneksi,"SELECT * FROM pembelian_detail INNER JOIN pembelian ON
        pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
        INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk WHERE tanggal='$tgl';");
			}else{
        $tgll=date("Y-m-d");
            $sql = mysqli_query($koneksi, "SELECT * FROM pembelian_detail INNER JOIN pembelian ON
            pembelian_detail.id_pembelian = pembelian.id_pembelian INNER JOIN siswa ON pembelian.id_kelas = siswa.id_kelas  
            INNER JOIN produk ON pembelian_detail.id_produk = produk.id_produk where tanggal='$tgll';");
			}
			
			while($row = mysqli_fetch_array($sql)){
			?>
                        <tr>
            <td><?php echo $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><?= $row['nama_produk']; ?></td> 
            <td><?= $row['jenis']; ?></td>
            <td><?= $row['nama_cafe']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['jumlah']*$row['harga']; ?></td>
            <td><?= $row['status'] ?></td>
            <td>
            <a class="btn btn-info btn-sm" href="index.php?halaman=detailpembelian&id_pembelianproduk=<?php echo $row['id_pembelianproduk']; ?>"><i class="fas fa-pencil-alt"> </i> DETAIL </a>
            </td>
         
			</tr>
			<?php 
			}
			?>
 </tr>
 



</table>
            
        </div>
