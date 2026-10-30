<?php
require 'koneksi.php';

$id = (int) ($_GET['id'] ?? 0);

// Ambil data anggota berdasarkan id (prepared statement)
$stmt = $koneksi->prepare("SELECT * FROM anggota WHERE id_anggota = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if (!$row) {
    redirect('anggota.php', 'danger', 'Data anggota tidak ditemukan.');
}

$judul_halaman = 'Edit Anggota';
$menu_aktif    = 'anggota';

require 'layout/header.php';
?>

<h1 class="mb-3">Edit Data Anggota</h1>

<!-- Ubah action di bawah ini ke file khusus proses edit -->
<form action="proses_anggota.php" method="post">
    <input type="hidden" name="id_anggota" value="<?= $row['id_anggota'] ?>">

    <div class="row mb-3">
        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nim" name="nim"  value="<?= htmlspecialchars($row['nim']) ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($row['email'] ?? '') ?>">
        </div>
    </div>

    <div class="row mb-3">
        <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="no_hp" name="no_hp" 
                   value="<?= htmlspecialchars($row['no_hp'] ?? '') ?>">
        </div>
    </div>

    <button type="submit" name="submit" class="btn text-white" style="background-color: #9575CD;">Simpan</button>
    <a href="anggota.php" class="btn text-white"style="background-color: #D98298;">Batal</a>
</form>

<?php require 'layout/footer.php'; ?>