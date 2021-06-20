<?php

include "koneksi.php";

$nama_produk = $_POST['nama_produk'];
$keterangan = $_POST['keterangan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

$type= $_GET['type'];

if($type == "save"){
	$query = "insert into produk(id, nama_produk, keterangan, harga, jumlah) values(NULL, '$nama_produk', '$keterangan', '$harga', '$jumlah')";

	if(mysqli_query($connection, $query)) {
		header("Location: index.php");
	}else {
		echo "Gagal Input";
	}

}else if($type == "update") {
	$id=$_POST['id'];
	$query = "Update produk set nama_produk='$nama_produk', keterangan='$keterangan', harga='$harga', jumlah='$jumlah' where id=$id ";
	if(mysqli_query($connection, $query)) {
		header("Location: index.php");
	}else {
		echo "Gagal Update";
	}

}else if($type == "delete") {
	$id=$_GET['id'];
	$query = "delete from produk where id=$id";

	if(mysqli_query($connection, $query)) {
		header("Location: index.php");
	}else {
		echo "Gagal Delete";
	}
}