<?php
	if(isset($_POST['proses']))
	{
	$idbarang = $_POST['id_barang']; 
	$nama_barang	= $_POST['nama_barang'];
	$harga	= $_POST['harga'];
	$stok	= $_POST['stok'];
	// $image	= $_FILES['foto']['name'];
	// $tmpName= $_FILES['foto']['tmp_name'];
	// $size	= $_FILES['foto']['size'];
	// $type	= $_FILES['foto']['type'];
	$maxsize= 1500000;
	$typeYgBoleh=array("image/jpeg","image/png","image/gif", "image/bmp");
	
	// $dirFoto="pict";
	// if(!is_dir($dirFoto))
	// 	mkdir($dirFoto);
	// $fileTujuanFoto = $dirFoto."/".$image;
	
	// $dirThumb = "thumb";
	// if(!is_dir($dirThumb))
	// 	mkdir($dirThumb);
	// $fileTujuanThumb = $dirThumb."/t_".$image;
	$dataValid="YA";
	// if($size>0)
	// {
	// 	if($size > $maxsize)
	// 	{
	// 		echo "Ukuran File Terlalu BESAR <br/>";
	// 		$dataValid="TIDAK";
	// 	}
	// 	if(!in_array($type, $typeYgBoleh))
	// 	{
	// 			echo "Type File Tidak Dikenal <br/>";
	// 			$dataValid="TIDAK";
	// 	}
	// }
	
	if(strlen(trim($nama_barang))==0)
	{
		echo "nama_barang Barang Harus diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if(strlen(trim($harga))==0)
	{
		echo "Harga Harus diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if(strlen(trim($stok))==0)
	{
		echo "Stok Harus diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if($dataValid=="TIDAK")
	{
		echo "Masih ada kesalahan, silahkan perbaiki! <br/>";
		echo "<input type='button' value='Kembali' onClick='self.history.back()'>";
		exit;
	}
	
	include "koneksi.php";
	
			$sql="update barang set 
					nama_barang='$nama_barang',
					harga=$harga,
					stok=$stok
					where id_barang='$idbarang'";

	}
	$hasil=mysqli_query($kon, $sql);
	
	if(!$hasil)
	{
		echo "Gagal Simpan, silahkan diulangi!<br/>";
		echo mysqli_error($kon);
		echo "<br/> <input type='button value='Kembali' onClick='self.history.back()'>";
		exit;
	}
	else
	{
		echo "Simpan data Berhasil";
	}

// if($size > 0)
// {
// 	if(!move_uploaded_file($tmpName, $fileTujuanFoto))
// 	{
// 		echo "Gagal Upload Gambar.. <br/>";
// 		echo "<a href='barang_tampil.php'> Daftar Barang</a>";
// 		exit;
// 	}
// 	else
// 	{
// 		buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
// 	}
// }

echo "<br/>File sudah di Upload.<br/>";
function buat_thumbnail($file_src, $file_dst){
	//hapus jika thumbnail sebelumya sudah ada
	list($w_src, $h_src, $type)=getImageSize($file_src);
	
	switch($type){
		case 1: //gif ->jpg
			$img_src=imagecreatefromgif($file_src);
			break;
		case 2:
			$img_src=imagecreatefromjpeg($file_src);
			break;
		case 3:
			$img_src=imagecreatefrompng($file_src);
			break;
		case 4:
			$img_src=imagecreatefromwbmp($file_src);
			break;
	}
	$thumb=100;
	if($w_src > $h_src)
	{
			$w_dst=$thumb;
			$h_dst=round($thumb / $w_src * $h_src);
		}
		else
		{
			$w_dst=round($thumb / $h_src * $w_src);
			$h_dst=$thumb;
		}
		
		$img_dst=imagecreatetruecolor($w_dst, $h_dst);
		imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $w_dst, $h_dst, $w_src, $h_src);
		imagejpeg($img_dst, $file_dst);
		
		imagedestroy($img_src);
		imagedestroy($img_dst);
}
?>
<hr/>
<a href="index.php" /> DAFTAR BARANG</a>