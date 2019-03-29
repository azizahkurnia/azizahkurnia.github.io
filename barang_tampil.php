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
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="barang_tampil.php">Product <span class="sr-only">(current)</span></a></li>
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

<?php
 $nama_barang = "";
 if (isset($_POST["nama_barang"]))
  $nama_barang = $_POST["nama_barang"];
 include "koneksi.php";
 $sql = "select * from barang where nama_barang like '%".$nama_barang."%'
     order by id_barang desc";
 $hasil = mysqli_query($kon, $sql);
 if (!$hasil)
  die("Gagal query. .".mysqli_error($kon));
?>

<div class="container text-center">    
  <br>

  <div class="row">
    <?php
    $no = 0;
    while ($row = mysqli_fetch_assoc($hasil)) {?>
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading"><?php echo $row['nama_barang']; ?></div>
        <div class="panel-body">
          <img src=pict/<?php echo $row['image']; ?> cclass="img-responsive" style="width:100%; height: 50%;" alt="Image"/>
          <br>
          Rp.<?php echo $row['harga']; ?>
        </div>
         <div class="panel-footer">
           <a href="lihat.php?id_barang=<?php echo $row['id_barang'];?>" class="btn btn-primary">Lihat</a>
         </div>
      </div>
    </div>
    <?php
    }
    ?>
  </div>

</div><br>

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
