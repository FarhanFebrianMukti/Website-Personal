<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "minimarket2");

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Ambil data dari database
$query = "SELECT * FROM daftar_belanja";
$result = mysqli_query($koneksi, $query);

// Tampilkan data
?>

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
        <h2>Daftar Belanja:</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$row['item']}</td>";
                    echo "<td>Rp {$row['price']}</td>";
                    echo "<td>
                            <a href='edit.php?id={$row['id']}' class='edit-btn'>Edit</a>
                            <button class='delete-btn' onclick=\"window.location.href='process.php?delete={$row['id']}'\">Hapus</button>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Bebaskan memori
mysqli_free_result($result);

// Tutup koneksi
mysqli_close($koneksi);
?>
