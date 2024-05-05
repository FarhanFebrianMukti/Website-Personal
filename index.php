<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Belanja Minimarket</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Belanja Minimarket</h1>
        <form action="process.php" method="POST">
            <input type="text" name="item" placeholder="Nama Item" required>
            <input type="number" name="price" placeholder="Harga Item" required>
            <button type="submit" name="add">Tambah Item</button>
        </form>
        <h2>Daftar Belanja:</h2>
        <ul>
            <?php include 'read.php'; ?>
        </ul>
    </div>
</body>
</html>
