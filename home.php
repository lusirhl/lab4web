<?php require('header.php'); ?>


<h2 class="text-center text-warning">Data Barang</h2>
<nav class="d-flex flex-column align-items-center bg-warning-subtle ">
    <a href="home.php" class="nav-link active">Home</a>
    <a href="tambah.php">Tambah Barang</a>
</nav>

<div class="content border border-secondary">
    <div class="main">
        <table class="table table-bordered">
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Katagori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result) : ?>
                <?php while ($row = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td class="d-flex justify-content-center"><img width="200" src="<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['kategori']; ?></td>
                        <td><?= $row['harga_jual']; ?></td>
                        <td><?= $row['harga_beli']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                            <a href="hapus.php?id=<?= $row['id_barang']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile;
            else : ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<?php require('footer.php'); ?>