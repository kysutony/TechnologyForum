<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost","root","","");
// hosst, user, pass, name

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
mysqli_set_charset($conn,"utf8mb4");

$u = $_SESSION["user"];
$r_user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$u'"));
