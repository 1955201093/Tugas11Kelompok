<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cari Nama-Nama Buku</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cari Nama-Nama Buku Baru</h2>
  <p>Ketik kata kunci nama Buku yang dicari:</p>
  <form method="post">
    <div class="form-group">
      <label for="namabukudicari">Nama BUKU atau Kata kunci namanya:</label>
      <input type="text" class="form-control" id="namabukudicari" name="namabukudicari">
    </div>
    <button type="submit" class="btn btn-primary" name="bcari">Cari Nama Buku</button>
	<button class="btn btn-primary" name="binput">Input Nama Buku</button>
  </form>
</div>
<?php 
if (isset($_POST['binput'])) {
	echo "<script>window.location.href='inputbuku.php';</script>";
	exit();
}
$koneksi=new mysqli("localhost","root","","tokobuku");
if (isset($_POST['bcari'])) {
 $namabukudicari=$_POST['namabukudicari'];	
 $sql="SELECT * FROM `rakbuku` WHERE `namabuku` LIKE '%".$namabukudicari."%'";
} else {
 $sql="SELECT * FROM `rakbuku`";
} 
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Daftar Nama Buku-Buku yang dicari tidak ditemukan !</h2>";
	 exit();
 }
?>
<div class="container">
  <h2>Tabel Nama-Nama Buku</h2>
  <p>Daftar Nama-Nama Buku yang tersimpan di database adalah :</p>            
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Nama Buku</th>
        <th>Jenisbuku</th>
        <th>Penerbit</th>
		<th>Genre</th>
		<th>Tanggal Penerbit<th>
      </tr>
    </thead>
    <tbody>
	<?php do { 
	?>
      <tr>
        <td><?php echo $r['namabuku'];?></td>
		<td><?php echo $r['jenisbuku'];?></td>
		<td><?php echo $r['penerbit'];?></td>
		<td><?php echo $r['genre'];?></td>
    <td><?php echo $r['tanggalpenerbit'];?></td>
		<td><a href="koreksibuku.php?nomor_id=<?php echo $r['namabuku'];?>" class="btn btn-primary">Refresh</a></td>
		<td><a href="hapusbuku.php?namabuku=<?php echo $r['namabuku'];?>" class="btn btn-danger" onclick="return confirm('Apakah yakin akan menghapus Buku Tersebut?<?php echo $r['namabuku'];?> ?')">Delete</a></td>
      </tr>
	<?php } while ($r=$q->fetch_array());
	?>
    </tbody>
  </table>
</div>
</body>
</html>