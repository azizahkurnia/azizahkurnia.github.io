<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$dbName ="paw";

$kon = mysqli_connect($host, $user, $pass);
if(!$kon)
die("Gagal Koneksi....");

$hasil = mysqli_select_db($kon, $dbName);
if (!$hasil){
$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
if(!$hasil)
die("Gagal Buat Database");
else
$hasil = mysqli_select_db($kon, $dbName);
if(!$hasil) die ("Gagal Konek Database");
}
$sqlTabelBarang="create table if not exists barang(
id_barang varchar(30) not null primary key,
nama_barang char(30) not null,
stok int(13) not null,
harga int(35) not null,
image longblob not null,
KEY(id_barang))";
mysqli_query ($kon, $sqlTabelBarang) or die("Gagal Buat tabel Barang");
?>