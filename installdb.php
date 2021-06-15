<?php
$koneksi= new mysqli ("localhost","root","");
$sql="create database tokobuku";
$q=$koneksi->query($sql);
 if ($q) {
	 echo "Database sudah dibuat !!!";
 } else {
	 echo "Database gagal dibuat !!!";
 }
 $sql2="CREATE TABLE tokobuku.`rakbuku` (
 `namabuku` varchar(20) NOT NULL,
  `jenisbuku` text(20) NOT NULL,
  `penerbit` varchar(25) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `tanggalpenerbit` date DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
  $q2=$koneksi->query($sql2);
 if ($q2) {
	 echo "Tabel Barang sudah dibuat !";
 } else {
	 echo "Tabel Barang  gagal dibuat !";
 {