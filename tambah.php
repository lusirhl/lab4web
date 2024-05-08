<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;
    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;;
        }
    }
    $sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli,
stok, gambar) ';
    $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}',
'{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <title>Tambah Barang</title>
</head>

<h2 class="text-center text-warning">Data Barang</h2>
<nav class="d-flex flex-column align-items-center bg-warning-subtle ">
    <a href="home.php" class="nav-link active">Home</a>
    <a href="tambah.php">Tambah Barang</a>
</nav>

<body>
    <div>
        <h1 class="text-center">Tambah Barang</h1>
        <div class="d-flex justify-content-center">
            <form method="post" action="tambah.php" enctype="multipart/formdata" class="d-flex flex-column gap-3 bg-secondary-subtle py-5 px-5" style="width: 600px;">
                <div class="d-flex">
                    <label style="width: 200px;">Nama Barang</label>
                    <input type="text" name="nama" />
                </div>
                <div class="d-flex">
                    <label style="width: 200px;">Kategori</label>
                    <select name="kategori">
                        <option value="Komputer">Komputer</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <div class="d-flex">
                    <label style="width: 200px;">Harga Jual</label>
                    <input type="text" name="harga_jual" />
                </div>
                <div class="d-flex">
                    <label style="width: 200px;">Harga Beli</label>
                    <input type="text" name="harga_beli" />
                </div>
                <div class="d-flex">
                    <label style="width: 200px;">Stok</label>
                    <input type="text" name="stok" />
                </div>
                <div class="d-flex">
                    <label style="width: 200px;">File Gambar</label>
                    <input type="file" name="file_gambar" />
                </div>
                <div class="d-flex">
                    <label style="width: 200px;"></label>
                    <input class="btn btn-primary" type="submit" name="submit" value="Simpan" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>