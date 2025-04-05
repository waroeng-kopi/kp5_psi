<?php
session_start();

include '../model/config.php';

// $result = $connection->query("SELECT * FROM user WHERE userId=$getUserId");
$result = mysqli_query($connection,'SELECT * FROM user');
$jumlah =  mysqli_num_rows($result);

echo $jumlah+1;

$row = $result->fetch_assoc()
?>

