<?php
  session_start();
  $dbHost = 'localhost';
  $dbUsername = 'root';
  $dbPassword = '';
  $dbName = 'db_akuntansi';

  $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
