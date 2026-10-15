<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $kategori        = $_POST['kategori'];
    $kontak_sales    = $_POST['kontak_sales'];
    $wilayah         = $_POST['wilayah'];
    $alamat          = $_POST['alamat'];

    // Sesuaikan nama tabel 'penerbit' dan nama kolom dengan database-mu
    $query = "INSERT INTO penerbit (nama_perusahaan, kategori, kontak_sales, wilayah, alamat) VALUES ('$nama_perusahaan', '$kategori', '$kontak_sales', '$wilayah', '$alamat')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Penerbit Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Penerbit</h2>

    <form action="" method="POST">
        <div>
            <label>Nama Perusahaan:</label><br>
            <input type="text" name="nama_perusahaan" required>
        </div><br>

        <div>
            <label>Kategori:</label><br>
            <input type="text" name="kategori" required>
        </div><br>

        <div>
            <label>Kontak Sales:</label><br>
            <input type="text" name="kontak_sales" required>
        </div><br>

        <div>
            <label>Wilayah:</label><br>
            <input type="text" name="wilayah" required>
        </div><br>

        <div>
            <label>Alamat:</label><br>
            <textarea name="alamat" rows="4" required></textarea>
        </div><br>

        <button type="submit" name="submit">Simpan Data</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>