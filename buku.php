<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku | Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #567db7;">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="color: black; font-weight: bold;">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span style="font-weight: bold;">Buku</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="buku.php" style="color: black;">Home</a>
            </li>
            <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="buku.php" style="color: black;">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="buku.php" style="color: black;">Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="anggota.php" style="color: black;">Anggota</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-3">Data Buku</h1>
        <a class="btn text-black mb-3" style="background-color: #FFB6C1;" href="form_buku.php">Input Buku</a>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Sampul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      require "koneksi.php";
                      $sql = "SELECT * FROM buku";
                      $result = $koneksi->query($sql);
                      $no = 1;
                      
                      if ($result && $result->num_rows > 0) {
                          while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['kode_buku']) ?></td>
                        <td><?= htmlspecialchars($row['judul']) ?></td>
                        <td><?= htmlspecialchars($row['pengarang']) ?></td>
                        <td><?= htmlspecialchars($row['penerbit']) ?></td>
                        <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                        <td><?= htmlspecialchars($row['stok']) ?></td>
                        <td class="text-center">
                            <?php if(!empty($row['sampul'])): ?>
                                <img src="Sampul/<?= htmlspecialchars($row['sampul']) ?>" width="80px" alt="Sampul">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                           <a href="edit_buku.php?id=<?= $row['id_buku'] ?>" class="btn btn-sm text-white" style="background-color: #9575CD;">Edit</a>
                           <a href="hapus_buku.php?id=<?= $row['id_buku'] ?>" class="btn btn-sm text-white" style="background-color: #D98298;" onclick="return confirm('Yakin menghapus data buku ini?')">Hapus</a>
                    </tr>
                    <?php 
                          } 
                      } else {
                    ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">Belum ada data buku.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>