<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Nama-Nama Buku Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php $koneksi=new mysqli("localhost","root","","tokobuku");
if (isset($_GET['namabuku'])) {
 $namabukudicari=$_GET['namabuku'];	
 $sql="SELECT * FROM `rakbuku` WHERE `namabuku` = '".$namabukudicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Nama-Nama Buku yang dicari tidak ditemukan !</h2>";
	 exit();
 }
} 
?>
<div class="container">
  <h2>Koreksi Nama-Nama Buku Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="namabuku">Nama Buku:</label>
      <input type="text" class="form-control" id="namabuku" placeholder="Ketik Nama Buku" name="namabuku" value="<?php echo $r['namabuku'];?>" readonly>
    </div>
    <div class="form-group">
      <label for="jenisbuku">Jenis Buku:</label>
      <input type="text" class="form-control" id="jenisbuku" placeholder="Ketik Jenis Buku" name="jenisbuku" value="<?php echo $r['jenisbuku'];?>" readonly>
    </div>
    <div class="form-group">
      <label for="genre">Genre:</label>
      <input type="text" class="form-control" id="genre" placeholder="Ketik Genre" name="genre" value="<?php echo $r['genre'];?>" readonly>
    </div>
	<div class="form-group">
      <label for="tanggalpenerbit">Tanggal Penerbit:</label>
      <input type="date" class="form-control" id="tanggalpenerbit" title="Tentukan tanggal Penerbit" name="tanggalpenerbit" value="<?php echo date('Y-m-d',strtotime($r['tanggalpenerbit']));?>">
    </div>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
  </form>
</div>
</body>
</html>
<?php 
 if (isset($_POST['bsimpan'])) {
	$namabuku=$_POST['namabuku'];
	$jenisbuku=$_POST['jenisbuku'];
  $penerbit=$_POST['penerbit'];
  $genre=$_POST['genre'];
  $tanggalpenerbit=$_POST['tanggalpenerbit'];
	
	
    $sql="UPDATE `tokobuku` SET `namabuku``='".$namabuku."', `jenisbuku`='".$jenisbuku."', `penerbit`='".$penerbit."', `genre`='".$genre."',`tanggalpenerbit`='".$tanggalpenerbit."' where rakbuku='".$rakbuku."';";	
	$q=$koneksi->query($sql);
    if ($q) {
      echo "Nama-Nama Buku sudah tersimpan !";
    } else {
      echo "Nama-Nama Buku gagal tersimpan !";
    }	  
	echo "
	<script>window.location.href='caribuku.php';</script>";
 }
 
?>