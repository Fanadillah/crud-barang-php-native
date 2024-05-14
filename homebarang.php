<?php  
session_start();
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/edit">MuscleGym</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="create_barang.php">Create Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homebarang.php">View Products</a>
            </li>
          </ul>
        </div>
      </nav>
    <h1 class="ms-5 mt-3">DAFTAR BARANG</h1>
    <?php
    // Cek apakah ada pesan sukses di session
    if(isset($_SESSION['update'])){
      echo "<script> alert('" . $_SESSION['update']."');</script>";
      unset($_SESSION['update']);
    }
    if(isset($_SESSION['pesan'])){
        echo "<script> alert('" . $_SESSION['pesan']."');</script>";
        unset($_SESSION['pesan']); // Hapus pesan dari session setelah ditampilkan
    }
    ?>
<div class="container text-center border">
    <table class="table">
        <thead border="1">
            <tr border="1">
                <th>#</th>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = "SELECT * FROM barang";
            $result = mysqli_query($conn, $sql);
            $num = 1;

            if($result->num_rows > 0) {
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>". $num. "</td>";
                    echo "<td>". $row['id']. "</td>";
                    echo "<td>". $row['nama']. "</td>";
                    echo "<td>". $row['hargabarang']. "</td>";
                    echo "<td>". $row['stok']. "</td>";
                    echo "<td><a href='editbarang.php?id=". $row['id']. "'>Edit</a> | <a href='delete_barang.php?id=". $row['id']. "'>Delete</a></td>";
                    echo "</tr>";
                    $num++;
                }
            } else{
                echo "<tr><td colspan='3'>Tidak ada data barang.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>