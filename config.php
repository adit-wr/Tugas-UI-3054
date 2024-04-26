<?php
$host = 'pk.rdnet.id:22450';
$username = 'u222410103054';
$password = 'masihpemula';
$database = 'db_u222410103054';
$config = mysqli_connect($host, $username, $password, $database);

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Koneksi database gagal : '.$conn->connect_error);
}
?>