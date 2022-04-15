<?php
$title = 'Thay Đổi Mật Khẩu';
$trangay = 'Thay Đổi Mật Khẩu,/account/change-password';
include 'head.php';
echo '<div class="phdr"><a href="/account" style="color:#131CF1;">Tài Khoản</a> ><a style="color:#71BBCE;">Thay Đổi Mật Khẩu</a> </div>';
if (login){
if (isset($_POST['change'])){
$mkc = htmlspecialchars($_POST['mkc']);
$mkm = htmlspecialchars($_POST['mkm']);
$mkml = htmlspecialchars($_POST['mkml']);
if ($mkc == ''){
$ermkc = 'Bạn chưa nhập mật khẩu cũ !';
$erm = 'y';
}
if ($mkm == ''){
$ermkm = 'Bạn chưa nhập mật khẩu mới !';
$erm = 'y';
}
if ($mkml == ''){
$ermkml = 'Bạn chưa nhập nhập lại mật khẩu mới !';
$erm = 'y';
}
$ab = mysqli_fetch_assoc(mysqli_query($conn,'SELECT id,password FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
if ($erm != 'y'){
if (!preg_match('#^[a-zA-Z0-9-._]+$#i',$mkm,$dcm)){
$ermkm = 'Mật khẩu mới chỉ được chứa ký tự a-z,A-Z,0-9,-. ! _';
$xp = '0';
}
if (!preg_match('#^[a-zA-Z0-9-._]+$#i',$mkml,$dcm)){
$ermkml = 'Mật khẩu mới chỉ được chứa ký tự a-z,A-Z,0-9,-. ! _';
$xp = '0';
}
}
if ($xp != '0' && $erm != 'y'){
if (strlen($mkm) < '6'){
$ermkm = 'Mật khẩu mới ít nhất 6 ký tự !';
$fu = 'v';
}
if (strlen($mkml) < '6'){
$ermkml = 'Mật khẩu mới nhập lại ít nhất 6 ký tự !';
$fu = 'v';
}
}
if ($fu != 'v'){
if (strlen($mkm) > '20'){
$ermkm = 'Mật khẩu mới nhiều nhất 20 ký tự !';
$fuu = 'v';
}
if (strlen($mkml) > '20'){
$ermkml = 'Mật khẩu mới nhập lại nhiều nhất 20 ký tự !';
$fuu = 'v';
}
}
if ($xp != '0' && $erm != 'y' && $fu != 'v' && $fuu != 'v'){
$ab = mysqli_fetch_assoc(mysqli_query($conn,'SELECT id,password FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
if (md5($mkc) != $ab['password']){
$ermkc = 'Mật khẩu cũ không đúng !';
$cg = 'n';
}
}
if ($cg != 'n' && $erm != 'y' && $fu != 'v' && $fuu != 'v' && $xp != '0'){
if ($mkml != $mkm){
$ermkml = 'Mật khẩu mới nhập lại không trùng mật khẩu mới !';
$up = '0';
}
}
if ($cg != 'n' && $erm != 'y' && $fu != 'v' && $fuu != 'v' && $xp != '0' && $up != '0'){
mysqli_query($conn,'UPDATE dt_user SET password = "'.md5($mkm).'" WHERE id = "'.$_SESSION['idlogin'].'"');
echo '<div class="list2">Mật khẩu đã thay đổi thành công !</div>';
unset($_SESSION['login']);
unset($_SESSION['idlogin']);
$loca = 'ukm';
}
}
echo '
<div class="signup__container">
<div class="signup__form">
<div class="signup__form" style="max-width: 500px; margin-top: 48px;margin-bottom: 46px;text-align: center;flex-direction: column;align-items: center;justify-content: center;display: flex;">
<div class="list">Mật khẩu cũ: '.$ermkc.'<br>
<form action="" method="post">
<input type="password" name="mkc" value=""><br>Mật khẩu mới: '.$ermkm.'<br>
<input type="password" name="mkm" value=""><br>Nhập lại mật khẩu mới: '.$ermkml.'<br>
<input type="password" name="mkml" value=""><br><br>
<input type="submit" name="change" value="Thay Đổi" style="color:white; background-color: #71BBCE; border-radius: 8px;"></form></div>
</div>
</div>
</div>';
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';
if ($loca == 'ukm'){
echo '<script>window.location.href="/login";</script>';
}
?>