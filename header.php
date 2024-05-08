<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Latihan Modularisasi</title>
    <link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container">