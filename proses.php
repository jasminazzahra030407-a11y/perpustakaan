<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];
    
    $nama_sampul = $_FILES['sampul']['name'];
    $tmp_name = $_FILES['sampul']['tmp_name'];

    if (!is_dir('sampul')) {
        mkdir('sampul', 0777, true);
    }

    move_uploaded_file($tmp_name, 'sampul/' . $nama_sampul);

    $sql = "INSERT INTO buku(kode_buku, judul, pengarang, penerbit, tahun_terbit, stok, sampul) 
            VALUES ('$kode_buku', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$stok', '$nama_sampul')";
            
    $query = $koneksi->query($sql);

    if ($query) {
        header('location:buku.php');
        exit;
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
}

if(isset($_POST['update'])){
    $id_buku      = $_POST['id_buku'];
    $kode_buku    = $_POST['kode_buku'];
    $judul        = $_POST['judul'];
    $pengarang    = $_POST['pengarang'];
    $penerbit     = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok         = $_POST['stok'];
    $sampul_lama  = $_POST['sampul_lama'];

    if($_FILES['sampul']['error'] === 4){
        $nama_sampul = $sampul_lama;
    } else {
        $nama_sampul = $_FILES['sampul']['name'];
        $tmp_name    = $_FILES['sampul']['tmp_name'];
        move_uploaded_file($tmp_name, 'sampul/' . $nama_sampul);
        if(!empty($sampul_lama) && file_exists('sampul/' . $sampul_lama)){
            unlink('sampul/' . $sampul_lama);
        }
    }

    $sql = "UPDATE buku SET 
                judul = '$judul',
                pengarang = '$pengarang',
                penerbit = '$penerbit',
                tahun_terbit = '$tahun_terbit',
                stok = '$stok',
                sampul = '$nama_sampul'
            WHERE id_buku = '$id_buku'";

    $query = $koneksi->query($sql);

    if($query){
        header('location:buku.php');
        exit;
    } else {
        echo "Gagal memperbarui data: " . $koneksi->error;
    }
}
?>