<?php
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    // Cek apakah ada kiriman 'id_anggota' (artinya ini proses Edit)
    if (isset($_POST['id_anggota']) && !empty($_POST['id_anggota'])) {
        $id_anggota = (int) $_POST['id_anggota'];

        // Proses UPDATE data lama
        $stmt = $koneksi->prepare("UPDATE anggota SET nim = ?, nama = ?, email = ?, no_hp = ? WHERE id_anggota = ?");
        $stmt->bind_param("ssssi", $nim, $nama, $email, $no_hp, $id_anggota);
        
        if ($stmt->execute()) {
            header("Location: anggota.php");
            exit();
        } else {
            echo "Gagal memperbarui data: " . $koneksi->error;
        }

    } else {
        // Proses INSERT data baru (jika tidak ada id_anggota)
        $stmt = $koneksi->prepare("INSERT INTO anggota (nim, nama, email, no_hp) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nim, $nama, $email, $no_hp);

        if ($stmt->execute()) {
            header("Location: anggota.php");
            exit();
        } else {
            echo "Gagal menambah data: " . $koneksi->error;
        }
    }
}
?>