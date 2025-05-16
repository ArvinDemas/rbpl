<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_klp10';

//membuat koneks
	$konek = mysqli_connect($hostname, $username, $password, $database);

	//cek koneksi
	if(!$konek){
		die("koneksi gagal".mysqli_connect_error());
	} else {
		echo "";
	}
?>