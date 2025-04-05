<?php
session_start();
if ($_SESSION["login"] == 1) {
  die("acess noun");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 2</title>
</head>
<body>
    <h1>Selamat datang di Halaman 2 : <?php echo $_SESSION['username']; ?></h1>
    <a href="../index.php">ke halaman index</a>
</body>
</html>