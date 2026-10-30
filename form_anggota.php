<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    // Menggunakan ekstensi mysqli yang sesuai dengan koneksi.php kamu
    $sql = "INSERT INTO anggota (nim, nama, email, no_hp) VALUES ('$nim', '$nama', '$email', '$no_hp')";
    
    if ($koneksi->query($sql) === TRUE) {
        // Berhasil disimpan, langsung pindah otomatis ke anggota.php
        header("Location: anggota.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow col-md-6 mx-auto">
            <div class="card-header text-white" style="background-color: #9575CD;">
                <h4>Tambah Data Anggota</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn text-white" style="background-color: #9575CD;">Simpan</button>
                    <a href="anggota.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>