<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'u524227222_db_klp10';

//membuat koneks
	$konek = mysqli_connect($hostname, $username, $password, $database);

	//cek koneksi
	if(!$konek){
		die("koneksi gagal".mysqli_connect_error());
	} else {
		echo "";
	}
?>