<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="logo.png"/>
  <title>Dota 2 Online Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Admin</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="../form_isi.php">Input Barang</a></li>
        <li><a href="logout.php">Keluar</a></li>
      </ul><br>
    </div>

<div class="col-sm-9 col-lg-9">  
<h2>List Barang</h2>
<table class="table" border="2">
    <tr><th>NO</th><th>ID</th><th>NAMA</th><th>STOK</th><th>HARGA</th><th>Aksi</th></tr>
    <?php
    include 'koneksi.php';
    $barang = mysqli_query($kon, "SELECT * from barang");
    $no=1;
    foreach ($barang as $row){
        echo "<tr>
            <td>$no</td>
            <td>".$row['id_barang']."</td>
            <td>".$row['nama_barang']."</td>
            <td>".$row['stok']."</td>
            <td>".$row['harga']."</td>
             <td><a href=edit.php?id_barang=".$row['id_barang'].">Edit</a>|<a href=hapus.php?id_barang=".$row['id_barang'].">hapus</a></td> 
              </tr>";
        $no++;
    }
    ?>
</table>
</div>
<br/><br/>

<div class="col-sm-4 col-lg-9">  
<h2>List Pembeli</h2>
<table class="table" border="2">
    <tr><th>NO</th><th> ID</th><th>ID BARANG</th><th>NAMA ID</th><th>LINK TRADE</th><th>NAMA</th><th>EMAIL</th><th>Aksi</th></tr>
    <?php
    include 'koneksi.php';
    $barang = mysqli_query($kon, "SELECT * from pembeli");
    $no=1;
    foreach ($barang as $row){
        echo "<tr>
            <td>$no</td>
            <td>".$row['no_id']."</td>
            <td>".$row['id_barang']."</td>
            <td>".$row['nama_id']."</td>
            <td>".$row['link_trade']."</td>
            <td>".$row['nama']."</td>
            <td>".$row['email']."</td>
            <td><a href=hapus_pembeli.php?no_id=".$row['no_id'].">hapus</a></td> 
              </tr>";
        $no++;
    }
    ?>
</table>
</div>
</body>
</head>
</html>