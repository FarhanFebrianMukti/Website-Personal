<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "minimarket2");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Ambil ID item dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data item berdasarkan ID
$query = "SELECT * FROM daftar_belanja WHERE id=$id";
$result = mysqli_query($koneksi, $query);

// Mendapatkan data item
$item = mysqli_fetch_assoc($result);

// Jika tombol update ditekan
if (isset($_POST['update'])) {
    $newItem = $_POST['item'];
    $newPrice = $_POST['price'];
    $query = "UPDATE daftar_belanja SET item='$newItem', price='$newPrice' WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}

// Tutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item Belanja</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Item Belanja</h1>
        <form action="edit.php?id=<?php echo $item['id']; ?>" method="POST">
            <input type="text" name="item" value="<?php echo $item['item']; ?>" required>
            <input type="number" name="price" value="<?php echo $item['price']; ?>" required>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
