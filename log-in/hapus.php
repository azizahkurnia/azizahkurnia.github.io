<?php
$id_barang = $_GET["id_barang"];
include "koneksi.php";
$sql = "select * from barang where id_barang = '$id_barang'";
$hasil = mysqli_query($kon,$sql);
if (!$hasil) die ("Gagal query..");

$data = mysqli_fetch_array($hasil);
$id_barang = $data["id_barang"];
$nama_barang = $data["nama_barang"];
$stok = $data["stok"];
$harga = $data["harga"];
$image = $data["image"];

echo "<h2>Konfirmasi Hapus</h2>";
echo "ID Barang : ".$id_barang."<br/>";
echo "Nama Barang : ".$nama_barang."<br/>";
echo "Foto : <img src='thumb/t_".$image."' /><br/><br/>";
echo "APAKAH DATA INI AKAN DI HAPUS? <br/>";
echo "<a href = 'hapus.php?id_barang=$id_barang&hapus=1'> YA </a>";
echo "&nbsp;&nbsp;";
echo "<a href='index.php'> TIDAK </a> <br/><br/>";

if (isset($_GET['hapus'])){
$sql = "delete from barang where id_barang = '$id_barang'";
$hasil = mysqli_query($kon,$sql);
if(!$hasil){
echo "Gagal Hapus Supplier : $nama ..<br/>";
echo "<a href ='index.php'>Kembali ke Daftar Barang</a>";
} else {
$gbr = "pict/$foto";
if (file_exists($gbr)) unlink($gbr);
$gbr = "thumb/t_$foto";
if (file_exists($gbr)) unlink($gbr);
header('location:index.php');
}
}
?>