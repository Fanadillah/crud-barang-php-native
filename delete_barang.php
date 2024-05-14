<?php 
include 'db_conn.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM barang WHERE id = '$id'";

    if($conn->query($query) == "TRUE"){
        session_start();
       $_SESSION['pesan'] = "Data Berhasil Dihapus";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
header("Location:homebarang.php");
exit();
}
?>