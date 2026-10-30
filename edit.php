<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="Perpustakaan">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Anggota</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <?php
    require 'koneksi.php';
    $id = $_GET['id']?? '';
    $query =$koneksi->query("SELECT * FROM buku WHERE id_buku='$id'");
    $row = $query->fetch_assoc();

    ?>
    <div class="container">
        <h1>Edit Data Buku</h1>
        <form action="proses.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_buku" value="<?= $row['id_buku']; ?>">
          <input type="hidden" name="sampul_lama" value="<?= $row['sampul']; ?>">
            <div class="row mb-3">
                <label for="kode_buku" class="col-sm-2 col-form-label">Kode Buku</label>
                <div class="col-sm-4">
                    <input type="text" value="<?= $row['kode_buku'] ?> " class="form-control" id="kode_buku" name="kode_buku" readonly required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="kode_buku" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-4">
                    <input type="text"  value="<?= $row['judul'] ?>"class="form-control" id="judul" name="judul">
                </div>
            </div>
            <div class="row mb-3">
                <label for="kode_buku" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-4">
                    <input type="text"  value="<?= $row['pengarang'] ?>"class="form-control" id="pengarang" name="pengarang">
                </div>
            </div>
            <div class="row mb-3">
                <label for="kode_buku" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-4">
                    <input type="text"  value="<?= $row['penerbit'] ?>"class="form-control" id="penerbit" name="penerbit">
                </div>
            </div>
            <div class="row mb-3">
                <label for="kode_buku" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-4">
                    <input type="number"  value="<?= $row['tahun_terbit'] ?>"class="form-control" id="tahun_terbit" name="tahun_terbit">
                </div>
            </div>
             <div class="row mb-3">
                <label for="kode_buku" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-4">
                    <input type="text"  value="<?= $row['stok'] ?>"class="form-control" id="stok" name="stok">
                </div>
            </div>
             
             <div class="row mb-3">
    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
    <div class="col-sm-4">
        <input type="file" class="form-control" id="sampul" name="sampul">
    </div>
</div>
            <input type="submit" value="Simpan" name="update" class="btn btn-primary">
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>