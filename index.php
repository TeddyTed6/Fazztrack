<!DOCTYPE html>
<html lang="en">
<head>
	<title>Website Fazztrack</title>
</head>
<style>

</style>

<?php 
include "koneksi.php";


$type = 'save';
$id="";
$nama_produk="";
$keterangan="";
$harga="";
$jumlah="";

if(isset($_GET['type'])){
  $type=$_GET['type'];
}

if(isset($_GET['id'])){
  $id=$_GET['id'];

	$query = mysqli_query($connection, "select * from produk where id=$id");
	$result = mysqli_fetch_array($query);

	$nama_produk=$result[1];
	$keterangan=$result[2];
	$harga=$result[3];
	$jumlah=$result[4];
}

?>
<body>
	<h1 style="font-family:Arial,sans-serif;text-align:center;"> Website Fazztrack CRUD</h1>
	<form method="POST" action="submit.php?type=<?php echo $type ?>">

		<input type="hidden" name="id" value="<?php echo $id ?>"><br>

	Nama Produk : <input type="text" name="nama_produk" value="<?php echo $nama_produk ?>"><br><br>

	Keterangan : <input type="text" name="keterangan" value="<?php echo $keterangan ?>"><br><br>

    Harga : <input type="text" name="harga" value="<?php echo $harga; ?>"><br><br>

    Jumlah : <input type="text" name="jumlah" value="<?php echo $jumlah?>"><br><br>


	<input type= "submit"><br><br>
</form>

	<table style="border:1px solid blue;" border="1" cellspacing="15">
		<tr>
			<td>Id</td>
			<td>Nama Produk</td>
			<td>Keterangan</td>
			<td>Harga</td>
			<td>Jumlah</td>
			<td>Action</td>
		</tr>

		<?php
		include "koneksi.php";

		$query = mysqli_query($connection, "select * from produk");

		while($result = mysqli_fetch_array($query)) {

			?>

			<tr>
				<td><?php echo $result[0]?></td>
				<td><?php echo $result[1]?></td>
				<td><?php echo $result[2]?></td>
				<td><?php echo $result[3]?></td>
				<td><?php echo $result[4]?></td>
			<td>
				<a href="index.php?type=update&id=<?=$result[0]?>">
                      <button>Update</button>
                  </a>

                  <a href="submit.php?type=delete&id=<?=$result[0]?>">
                      <button>delete</button>
				</a>
			</td>
		</tr>
		<?php
	}
	?>
</body>
</html>