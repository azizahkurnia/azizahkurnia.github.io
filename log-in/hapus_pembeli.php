<?php
$no_id = $_GET["no_id"];
include "koneksi.php";
$sql = "select * from pembeli where no_id = '$no_id'";
$hasil = mysqli_query($kon,$sql);
if (!$hasil) die ("Gagal query..");

$data = mysqli_fetch_array($hasil);
$no_id = $data["no_id"];
$id_barang = $data["id_barang"];
$nama_id = $data["nama_id"];
$link_trade = $data["link_trade"];
$nama = $data["nama"];
$email = $data["email"];


echo "<h2>Konfirmasi Hapus</h2>";
echo "No ID : ".$no_id."<br/>";
echo "Id Barang : ".$id_barang."<br/>";
echo "APAKAH DATA INI AKAN DI HAPUS? <br/>";
echo "<a href = 'hapus_pembeli.php?no_id=$no_id&hapus=1'> YA </a>";
echo "&nbsp;&nbsp;";
echo "<a href='index.php'> TIDAK </a> <br/><br/>";

if (isset($_GET['hapus'])){
$sql = "delete from pembeli where no_id = '$no_id'";
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