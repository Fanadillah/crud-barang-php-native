<?php
include 'db_conn.php';

//Tangani data yang diterima di form
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_barang = $_POST['id'];
    $nama_barang = $_POST['product_name'];
    $harga_barang = $_POST['price'];
    $stok = $_POST['stock'];

    //Lakukan Perintah SQL UPDATE untuk memperbarui data di database
    $query = "UPDATE barang SET nama = '$nama_barang', hargabarang = '$harga_barang', stok = '$stok' WHERE id = '$id_barang'";
    if(mysqli_query($conn, $query) == TRUE){
        session_start();
        $_SESSION['update'] = "Data Berhasil Diperbarui";
    }else{
        echo "Error". $query."<br>".$conn->error;
    }
}
$conn->close();
header("Location: homebarang.php");
exit();
?>