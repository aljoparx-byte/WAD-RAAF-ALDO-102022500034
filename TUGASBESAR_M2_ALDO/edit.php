<?php
include 'koneksi.php';


$id = $_GET['id'];


$result = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id = '$id'");
$d = mysqli_fetch_array($result);


if (isset($_POST['update'])) {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $kategori        = $_POST['kategori'];
    $kontak_sales    = $_POST['kontak_sales'];
    $wilayah         = $_POST['wilayah'];
    $alamat          = $_POST['alamat'];


    $update = mysqli_query($koneksi, "UPDATE penerbit SET 
        nama_perusahaan = '$nama_perusahaan',
        kategori = '$kategori',
        kontak_sales = '$kontak_sales',
        wilayah = '$wilayah',
        alamat = '$alamat'
        WHERE id = '$id'");

    if ($update) {
        header("location: index.php");
        exit();
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Penerbit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Penerbit</h2>

    <form action="" method="POST">
        <div>
            <label>Nama Perusahaan:</label><br>
            <input type="text" name="nama_perusahaan" value="<?= htmlspecialchars($d['nama_perusahaan']); ?>" required>
        </div><br>

        <div>
            <label>Kategori:</label><br>
            <input type="text" name="kategori" value="<?= htmlspecialchars($d['kategori']); ?>" required>
        </div><br>

        <div>
            <label>Kontak Sales:</label><br>
            <input type="text" name="kontak_sales" value="<?= htmlspecialchars($d['kontak_sales']); ?>" required>
        </div><br>

        <div>
            <label>Wilayah:</label><br>
            <input type="text" name="wilayah" value="<?= htmlspecialchars($d['wilayah']); ?>" required>
        </div><br>

        <div>
            <label>Alamat:</label><br>
            <textarea name="alamat" rows="4" required><?= htmlspecialchars($d['alamat']); ?></textarea>
        </div><br>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>

