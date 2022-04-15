<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost","root","","data_wap");
// hosst, user, pass, name

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
mysqli_set_charset($conn,"utf8mb4");
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'funcu.php';
include 'otfi/dnac/ipfd.php';
if ($titleforum){
$reqthrp = mysqli_query($conn,'SELECT id,title FROM dt_forum WHERE id = "'.htmlspecialchars($_GET['id']).'"');
if ($resthrp = mysqli_fetch_assoc($reqthrp)){
$title = $resthrp['title'];
} else {
$title = 'Lỗi';
}
}
if ($cmn){
$cmn = mysqli_query($conn,'SELECT id,nlink,name FROM dt_forumcmp WHERE nlink = "'.htmlspecialchars($_GET['cate1']).'"');
if ($cmnp = mysqli_fetch_assoc($cmn)){
$title = $cmnp['name'];
} else {
$title = 'Lỗi';
}
}
if (login){
$bdt = explode(',',$trangay);
if ($bdt['0'] == ''){
$them = $title;
}
mysqli_query($conn,'UPDATE dt_user SET onlin = "'.$them.''.$trangay.'" WHERE account = "'.$_SESSION['login'].'"');
}
if (login){
$reqh = mysqli_query($conn,'SELECT account,lastonl FROM dt_user WHERE account = "'.$_SESSION['login'].'" && id = "'.$_SESSION['idlogin'].'"');
if($resh = mysqli_fetch_assoc($reqh)){
if ($resh['lastonl'] < (time()-180)){
mysqli_query($conn,'UPDATE dt_user SET lastonl = "'.time().'" WHERE account = "'.$_SESSION['login'].'"');
}
} else {
unset($_SESSION['login']);
unset($_SESSION['idlogin']);
}
}
if (isset($_POST['changethh'])){
mysqli_query($conn,'UPDATE dt_user SET theme = "'.strtolower($_POST['select']).'" WHERE id = "'.$_SESSION['idlogin'].'"');
}

$u = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * FROM dt_user WHERE account = "'.$_SESSION['login'].'"'));