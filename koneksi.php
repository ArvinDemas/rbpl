<?php 
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'db_klp10';

$connect = new mysqli($hostname, $username, $password, $db);
if ($connect->connect_error) {
    die(''. $connect->connect_error);
}