<?php
	$no_id=$_POST['no_id'];
	$nama_id=$_POST['nama_id'];
	$link_trade=$_POST['link_trade'];
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$id_barang=$_POST['id_barang'];
	
	$dataValid="YA";

	

	if (strlen(trim($no_id))==0) {
		echo "No ID barang harus diisi<br/>";
		$dataValid="TIDAK";
	}

	if (strlen(trim($nama_id))==0) {
		echo "Nama ID Harus Diisi!<br/>";
		$dataValid="TIDAK";
	}

	if (strlen(trim($link_trade))==0) {
		echo "Link Trade Harus Diisi!<br/>";
		$dataValid="TIDAK";
	}

	if (strlen(trim($nama))==0) {
		echo "Nama Pembeli harus Diisi!<br/>";
		$dataValid="TIDAK";
	}
	
	if (strlen(trim($email))==0) {
		echo "Alamat Email harus Diisi!<br/>";
		$dataValid="TIDAK";
	}

	if ($dataValid=="TIDAK") {
		echo "Masih Ada kesalahan, silahkan perbaiki!<br/>";
		echo "<input type='button' value='kembali' onClick='self.history.back()'>";
		exit;
	}

	include "koneksi.php";

	$sql="insert into pembeli (no_id, id_barang, nama_id, link_trade, nama, email)
			values
			($no_id,'$id_barang','$nama_id','$link_trade','$nama','$email')";
	$hasil=mysqli_query($kon, $sql);

	if (!$hasil) {
		echo "Gagal Simpan, silahkan diulangi!<br/>";
		echo mysqli_error($kon);
		echo "<br/><input type='button' value='kembali'
				onClick='self.history.back()'>";
		exit;
	} else{
		echo "Simpan Data Berhasil <br/>";
		echo "<input type='button' value='kembali' onClick='self.history.back()'>";
	}


	
	
?>