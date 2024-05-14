<?php
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/edit">My CRUD</a>
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
      <div class="container mt-5" style="width: 33%;">
      <?php
      if(isset($_GET['id'])){
      $id_barang = $_GET['id'];

    //untuk mngambil data dari query database
      $query = "SELECT * FROM barang WHERE id = '$id_barang'";
      $result = mysqli_query($conn, $query);

      if($result->num_rows > 0){
        // Tampilkan formulir edit dengan data yang diambil dari database
        $row = $result->fetch_assoc();
        
      ?>
        <form class="mb-4" action="proses_update_barang.php" method="POST">
            <h1 class="text-center mb-4">Edit Product</h1>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $row['id']?>" name="id">
                <label for="">Product Name</label>
                <!-- menaruh data barang ke value inputan yang di ambil dari database -->
                <input value="<?php echo $row['nama']; ?>" type="text" class="form-control" name="product_name">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input value="<?php echo $row['hargabarang']; ?>" type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <input value="<?php echo $row['stok']; ?>" type="number" class="form-control" name="stock">
            </div>
            <button type="submit" id="btn-submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        <?php
        }else {
            echo "Data Barang Tidak DItemukan";
        }
      }else{
            echo "ID Barang Tidak Ditemukan";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>