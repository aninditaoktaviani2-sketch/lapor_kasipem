<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "config/koneksi.php";

if (!isset($_GET['id']) || $_GET['id'] == "") {
    die("ID laporan tidak ditemukan");
}

$id = (int)$_GET['id'];

$query = mysqli_query($conn, "
    SELECT
        laporan.*,
        desa.nama_desa,
        kategori.nama_kategori
    FROM laporan
    LEFT JOIN desa ON laporan.desa_id = desa.id
    LEFT JOIN kategori ON laporan.kategori_id = kategori.id
    WHERE laporan.id = '$id'
");

if (!$query) {
    die(mysqli_error($conn));
}

if (mysqli_num_rows($query) == 0) {
    die("Data laporan tidak ditemukan");
}

$d = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 35px;
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            vertical-align: top;
        }
        hr {
            border: 2px solid #000;
            margin-top: 10px;
            margin-bottom: 25px;
        }
        .judul {
            text-align: center;
        }
        .judul h2,
        .judul h3,
        .judul p {
            margin: 0;
        }
        .foto {
            width: 450px;
            border: 2px solid #000;
            border-radius: 0;
        }
        .ttd {
            width: 300px;
            float: right;
            text-align: center;
            margin-top: 60px;
        }
        .btn-kembali {
            background: #198754;
            color: #fff;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
            font-weight: bold;
        }
        .btn-cetak {
            background: #0d6efd;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-kembali:hover {
            background: #157347;
            color: #fff;
        }
        .btn-cetak:hover {
            background: #0b5ed7;
        }
        @media print {
            .btn-kembali,
            .btn-cetak {
                display: none;
            }
        }
    </style>
</head>
<body>

<div style="margin-bottom:20px;">
    <a href="admin/laporan.php" class="btn-kembali">← Kembali ke Data Laporan</a>
    <button onclick="window.print()" class="btn-cetak">🖨 Cetak</button>
</div>

<table>
    <tr>
        <td width="110">
            <img src="assets/img/logo.png" width="90">
        </td>
        <td class="judul">
            <h2>PEMERINTAH KABUPATEN CIREBON</h2>
            <h2>KECAMATAN PANGURAGAN</h2>
            <h3>SISTEM INFORMASI PENGELOLAAN DATA LAPORAN KASI PEMERINTAHAN</h3>
            <p>Jl. Raya Panguragan - Kabupaten Cirebon</p>
        </td>
    </tr>
</table>

<hr>

<h2 align="center">LAPORAN KEGIATAN</h2>

<table border="1">
    <tr>
        <td width="220"><b>Kode Laporan</b></td>
        <td><?= $d['kode_laporan']; ?></td>
    </tr>
    <tr>
        <td><b>Tanggal</b></td>
        <td><?= date('d-m-Y', strtotime($d['tanggal'])); ?></td>
    </tr>
    <tr>
        <td><b>Desa</b></td>
        <td><?= $d['nama_desa']; ?></td>
    </tr>
    <tr>
        <td><b>Kategori</b></td>
        <td><?= $d['nama_kategori']; ?></td>
    </tr>
    <tr>
        <td><b>Judul</b></td>
        <td><?= $d['judul']; ?></td>
    </tr>
    <tr>
        <td><b>Isi Laporan</b></td>
        <td><?= nl2br($d['isi_laporan']); ?></td>
    </tr>
    <tr>
        <td><b>Status</b></td>
        <td><?= $d['status']; ?></td>
    </tr>
    <tr>
        <td><b>Foto</b></td>
        <td>
            <?php if (!empty($d['foto'])) { ?>
                <img src="assets/upload/<?= $d['foto']; ?>" class="foto">
            <?php } else { ?>
                <b>Foto tidak tersedia</b>
            <?php } ?>
        </td>
    </tr>
</table>

<div class="ttd">
    <p>Panguragan, <?= date('d-m-Y'); ?></p>
    <br><br><br><br>
    <b><u>KASI PEMERINTAHAN</u></b>
</div>

</body>
</html>