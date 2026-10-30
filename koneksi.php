<?php
//ini adalah file yang melakukan koneksi dari php ke database
$host="localhost";
$user="root";
$password="";
$database="perpustakaan";

$koneksi=new mysqli($host,$user,$password,$database);

if($koneksi->connect_error){
     echo "Koneksi gagal";
}
?>