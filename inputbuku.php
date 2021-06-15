<!DOCTYPE html>
<html lang="en">
<head>
  <title>Input Buku Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Input Buku Baru</h2>
  <form method="post">
    <div class="form-group">
    <label for="namabuku">Nama Buku:</label>
      <input type="text" class="form-control" id="namabuku" placeholder="Ketik Nama Buku" name="namabuku">
    </div>
    <label for="jenisbuku">Jenis Buku:</label>
    <input type="text" class="form-control" id="jenisbuku" placeholder="Ketik Jenis Buku" name="jenisbuku">
    </div>
    <label for="penerbit">Penerbit:</label>
      <input type="text" class="form-control" id="penerbit" placeholder="Ketik Penerbit" name="penerbit">
    </div>
    <label for="genre">Genre:</label>
      <input type="text" class="form-control" id="genre" placeholder="Ketik Genre" name="genre">
    </div>
    <label for="tanggalpenerbit">Tanggal Penerbit:</label>
      <input type="date" class="form-control" id="tanggalpenerbit" placeholder="" name="tanggalpenerbit">
    </div>
    <tr>
    </tr>
    <button type="submit" class="btn btn-primary" name="bsimpan">SIMPAN BUKU</button>
	<button class="btn btn-success" name="bcari">CARI BUKU</button>
  </form>
</div>
</body>
</html>
<?php 
if (isset($_POST['bcari'])) {
  echo "<script>window.location.href='caribuku.php';</script>";
  exit();
}
if (isset($_POST['bsimpan'])) {
  $namabuku=$_POST['namabuku'];
  $jenisbuku=$_POST['jenisbuku'];
  $penerbit=$_POST['penerbit'];
  $genre=$_POST['genre'];
  $tanggalpenerbit=$_POST['tanggalpenerbit'];
  if (empty($namabuku)) {
    echo "Nama Buku harus diisi !";
    exit();
  }
  
  $koneksi=new mysqli("localhost","root","","tokobuku");
    $sql="INSERT INTO `rakbuku` (`namabuku`, `jenisbuku`, `penerbit`, `genre`,`tanggalpenerbit`) VALUES ('$namabuku', 
    '$jenisbuku', '$penerbit','$genre', '$tanggalpenerbit')";
  $q=$koneksi->query($sql);
    if ($q) {
      echo "Rekord Nama-Nama Buku sudah tersimpan !";
    } else {
      echo "Rekord Nama-Nama Buku tersimpan !";
    }   
 }
?>