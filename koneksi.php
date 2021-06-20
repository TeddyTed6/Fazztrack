<?php

$connection = mysqli_connect("localhost", "root", "", "fazztrack");

if(mysqli_connect_errno()){
	die("Koneksi Tidak Terjangkau");
}