<?php include 'db_conn.php'; ?>

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
              <a class="nav-link" href="/">Create Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homebarang.php">View Products</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container mt-5" style="width: 33%;">
    <!-- fungsi php untuk mengatasi xss -->
        <form class="mb-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <h1 class="text-center mb-4">Create Product</h1>
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="product_name">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <input type="number" class="form-control" name="stock">
            </div>
            <button type="submit" id="btn-submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</body>
</html>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

$nama_barang = $_POST['product_name'];
$harga_barang = $_POST['price'];
$stok = $_POST['stock'];

$query = "INSERT INTO barang (nama, hargabarang, stok) VALUES ('$nama_barang', '$kode_name', '$harga_barang', '$stok')";
if($conn->query($query) === TRUE){
    echo "Data berhasil ditambahkan";
}else{
    echo "Data gagal ditambahkan".$query."<br>".$conn->error;
}
$conn->close();
}
?>