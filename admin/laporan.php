<?php
$all=array();
$tglm="-";
$tgls="-";
if(isset($_POST["kirim"]))
{
    
    $tglm=$_POST["tglm"];
    $tgls=$_POST['tgls'];
    $ambil=$koneksi->query("SELECT * FROM pembelian pm INNER JOIN siswa sw ON pm.id_kelas=sw.id_kelas 
    INNER JOIN pembelian_detail ON pembelian_detail.id_pembelian=pm.id_pembelian
    WHERE tanggal BETWEEN '$tglm' and '$tgls' ");
    while($d=$ambil->fetch_assoc())
    {
        $all[]=$d;
    }
       // echo"<pre>";
       // print_r($all);
        //echo"</pre>";
}

?>

<h2>LAPORAN PEMBELIAN DARI <?php echo $tglm ?> HINGGA <?php echo $tgls ?></h2>
<hr>
<form method="post">
    <div class="row">
        <div class="col-md-5">
    <div class="form-group">
    <label>TANGGAL MULAI</label>
    <input type="date" class="form-control" name="tglm" value="<?php echo $tglm?>">
    </div>
        </div>
        <div class="col-md-5">
        <label>TANGGAL SELESAI</label>
        <input type="date" class="form-control" name="tgls" value="<?php echo $tgls?>">
        </div>
        <div class="col-md-2">
        <label>&nbsp;</label><br>
        <button class="btn btn-primary" name="kirim">LIHAT</button>
        </div>
    </div>
</form>
<div class="card-body table-responsive p-0" style="height: 1000px;">
              <table class="table table-head-fixed text-nowrap">
              <thead>
              <tr>
            <th>NO</th>
            <th>TGL</th>
            <th>KELAS</th>
            <th>JUMLAH</th>
            <th>STATUS</th>
            <th>QUANTITY</th>
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
                <td><?php echo $value["kelas"] ?></td>
                <td>Rp. <?php echo number_format($value["total"])  ?></td>
                <td><?php echo $value["status"] ?></td>
                <th><?php echo $value['jumlah'] ?> Orderan</th>
            </tr>
            <?php endforeach ?>
            </tbody>
            <tfoot>
                <th colspan="1">QTY SEMUA ORDERAN</th>
                <th><?php echo number_format($qty) ?> Orderan</th>
                <th><br></th>
                <th colspan="2">TOTAL PENDAPATAN</th>
                <th>Rp. <?php echo number_format($total) ?></th>
            </tfoot>
            