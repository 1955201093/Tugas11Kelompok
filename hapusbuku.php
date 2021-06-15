<?php $koneksi=new mysqli("localhost","root","","tokobuku");
if (isset($_GET['namabuku'])) {
 $namabukudicari=$_GET['namabuku'];	
 $sql="SELECT * FROM `rakbuku` WHERE `namabuku` = '".$namabukudicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Namabuku yang dicari tidak ditemukan !</h2>";
	 exit();
 }
 $sql2="delete from rakbuku WHERE `namabuku` = '".$namabukudicari."'";
 $q2=$koneksi->query($sql2);
 echo "
	<script>window.location.href='caribuku.php';</script>";
} 
?>