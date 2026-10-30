<?php
require 'koneksi.php';

// Ambil id dari URL
$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    // Jalankan perintah DELETE berdasarkan id_anggota
    $stmt = $koneksi->prepare("DELETE FROM anggota WHERE id_anggota = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: anggota.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $koneksi->error;
    }
} else {
    header("Location: anggota.php");
    exit();
}
?>