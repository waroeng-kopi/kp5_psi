<?php
session_start();
session_destroy();

//menuju ke halaman index.php
header("location: form.php");
?>