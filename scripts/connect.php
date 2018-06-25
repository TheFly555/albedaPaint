<?php
  error_reporting(E_ERROR);

  $servername = "localhost";
  $username   = "deb43619_thijs";
  $password   = "";
  $dbname     = "deb43619_thijs";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
      $servername = "localhost";
      $username   = "root";
      $password   = "";
      $dbname     = "albedaPaint";

      $conn = mysqli_connect($servername, $username, $password, $dbname);
  }
?>
