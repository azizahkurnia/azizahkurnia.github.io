<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="img/logo.png"/>
  <title>Dota 2 Online Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
  	<h1>Form Isi Barang</h1>
  <form action="barang_simpan.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="id_barang">Id Barang :</label>
      <input type="text" class="form-control" name="id_barang" />
    </div>

    <div class="form-group">
      <label for="nama_barang">Nama Barang :</label>
      <input type="text" class="form-control" name="nama_barang" />
    </div>

    <div class="form-group">
      <label for="stok">Stock :</label>
      <input type="text" class="form-control" name="stok">
    </div>

    <div class="form-group">
      <label for="harga">Harga :</label>
      <input type="text" class="form-control" name="harga" />
    </div>

    <div class="form-group">
      <label for="foto">Image :</label>
      <input type="file" class="form-control" name="foto">
    </div>

    <button type="submit" class="btn btn-success" value="Simpan" name="proses">Simpan</button>
	<button type="reset" class="btn btn-info" value="Reset" name="reset">Reset</button>
  </form>
</div>

</body>
</html>