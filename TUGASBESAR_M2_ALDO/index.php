<?php
// Menghubungkan ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penerbit - Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Data Penerbit & Supplier</h1>
    <p>Pengelolaan Data Penerbit Buku - Modul Penerbit</p>

    <a href="tambah.php" class="btn btn-tambah">+ Tambah Penerbit Baru</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Kategori</th>
                <th>Kontak Sales</th>
                <th>Wilayah</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;

            $query = mysqli_query($koneksi, "SELECT * FROM penerbit ORDER BY id DESC");
            
            if (mysqli_num_rows($query) > 0) {
                while ($d = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($d['nama_perusahaan']); ?></td>
                        <td><?= htmlspecialchars($d['kategori']); ?></td>
                        <td><?= htmlspecialchars($d['kontak_sales']); ?></td>
                        <td><?= htmlspecialchars($d['wilayah']); ?></td>
                        <td><?= htmlspecialchars($d['alamat']); ?></td>
                        <td>
                            <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data penerbit.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

