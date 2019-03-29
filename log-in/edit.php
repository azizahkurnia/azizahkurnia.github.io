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
?>

<h2>.:: EDIT DATA ITEM In-Game DotA 2 ::.</h2>
<form action="simpan.php" method="post" enctype="multipart/form-data">
<table border="1">
<tr>
	<td>ID Barang</td>
	<td><input type="text" name="id_barang" value="<?php echo $id_barang;?>"  /></td>
</tr>
<tr>okkkijks
	<td>Nama Barang</td>
	<td><input type="text" name="nama_barang" value="<?php echo $nama_barang;?>"  /></td>
</tr>
<tr>
<tr>
	<td>Stok</td>
	<td><input type="text" name="stok" value="<?php echo $stok;?>" /></td>
</tr>
<tr>
	<td>Harga</td>
	<td><input type="text" name="harga" value="<?php echo $harga;?>" /></td>
</tr>
<tr>
<td>Gambar [max=1.5MB]</td>
<td>
<input type="file" name="foto" />
<input type="hidden" name="foto_lama" value="<?php echo $image;?>" /> <br/>
<img src="<?php echo "../pict/".$image; ?>" width="100px" />
</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Simpan" name="proses" />
	<input type="submit" value="Reset" name="reset" />
	</td>
</tr>
</table>
</form>