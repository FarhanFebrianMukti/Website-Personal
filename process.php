<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "minimarket2");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Tambah item belanja
if (isset($_POST['add'])) {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $query = "INSERT INTO daftar_belanja (item, price) VALUES ('$item', '$price')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}

// Hapus item belanja
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM daftar_belanja WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>
