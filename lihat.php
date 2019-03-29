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
<div class="jumbotron">
  <div class="container text-center">
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="barang_tampil.php">Product <span class="sr-only">(current)</span></a></li>
        <li><a href="about.html">About</a></li>
        </li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="log-in/login1.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br/><br/><br/>
  <div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"> Detail Barang</h3>
      </div>
      <div class="panel-body">
        <?php
        $id_barang=$_GET['id_barang'];
		
		 include "koneksi.php";
        $sql="select * from barang where id_barang='$id_barang'";
          $hasil=mysqli_query($kon, $sql);
          if(!$hasil) die ("Gagal query...");
          $data=mysqli_fetch_array($hasil);
        ?>
	
        <table class="table table-responsive table-striped table-hover">
          <tr>
            <td colspan="3">
              <img src="pict/<?php echo $data['image'];?>" alt="NO IMAGES" width="98%">
            </td>
          </tr>
          <tr>
            <td>ID Barang</td>
            <td>:</td>
            <td><?php echo $data['id_barang'];?></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><?php echo $data['nama_barang']; ?></td>
          </tr>
          <tr>
            <td>Stock</td>
            <td>:</td>
            <td><?php echo $data['stok']; ?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td>:</td>
            <td><?php 
                  $harga = number_format($data['harga'],2,",",".");
                  echo "Rp" .$harga; ?></td>
          </tr>
        </table>
		 <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Beli</button>
		 
     <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content">
			
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Form Pembelian <br> Kode : <?php echo $data['id_barang'];?> Nama Barang : <?php echo $data['nama_barang'];?></h4>
				</div>
				<div class="modal-body">
				  <form action="proses_beli.php" method="POST">
				  <input type="hidden" name="id_barang" value="<?php echo $data['id_barang'];?>"/>
					<div class="form-group">
					<label for="nama">Nama Pembeli:</label>
					<input type="nama" class="form-control" id="nama" placeholder="Masukkan Nama Anda" name="nama">
					</div>
					
					 <div class="form-group">
					 <label for="email">Email:</label>
					 <input type="email" class="form-control" id="email" placeholder="Masukkan Alamat Email" name="email">
					 </div>
					 
					<div class="form-group">
					<label for="link_trade">Link Trade Steam:</label>
					<input type="link_trade" class="form-control" id="link_trade" placeholder="Masukkan Link Trade" name="link_trade">
					</div>
				  
					<div class="form-group">
					<label for="no_id">No ID Steam:</label>
					<input type="no_id" class="form-control" id="no_id" placeholder="Masukkan No ID" name="no_id">
					</div>
				  
					<div class="form-group">
					<label for="nama_id">Nama ID Steam:</label>
					<input type="nama_id" class="form-control" id="nama_id" placeholder="Masukkan Nama ID" name="nama_id">
					</div>
					
				</div>
				<div class="modal-footer">
				 <button type="submit" class="btn btn-success" value="Simpan" name="proses">Beli</button>
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			  </div>
			</div>
		  </div>
      </div>
    </div>
    </div>
  </div>
  </div>




<footer class="container-fluid text-center">
  <p><font color=white>&copy Dota 2 Online Store</color></p>
</footer>
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('service-worker.js')
    .then(function(registration) {
      console.log('Registered:', registration);
    })
    .catch(function(error) {
      console.log('Registration failed: ', error);
    });
  }
  </script>
</body>
</html>