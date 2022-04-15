<?php
$title = 'Thay Đổi Trạng Thái';
$trangay = 'Thay Đổi Trạng Thái,/account/change-status';
include 'head.php';
echo '<div class="phdr"><a href="/account" style="color:#131CF1;">Tài Khoản</a> ><a style="color:#71BBCE;">Thay Đổi Trạng Thái</a> </div>';
if (login){
if (isset($_POST['change'])){
if ($_POST['status'] == ''){
$erstt = 'Bạn chưa nhập trạng thái !';
$update = '0';
}
if (strlen($_POST['status']) > '50'){
$erstt = 'Trạng thái giới hạn 50 ký tự !';
$update = '0';
}
if ($update != '0'){
//mysqli_query($conn,'UPDATE dt_user SET status = "'.mysqli_real_escape_string(htmlspecialchars($_POST['status'])).'" WHERE id = "'.$_SESSION['idlogin'].'"');
mysqli_query($conn,'UPDATE dt_user SET status= "'.$_POST['status'].'" WHERE id = "'.$_SESSION['idlogin'].'"');
echo '<script>alert("Thay đổi thành công")</script>,<script>window.location.href="/trangcanhan.php";</script>';
}
}
$reqstt = mysqli_query($conn,'SELECT account,status FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if($resstt = mysqli_fetch_assoc($reqstt)){
$stt = $resstt['status'];
}
echo '
<div class="signup__container">
<div class="signup__form">
<div class="signup__form" style="max-width: 500px; margin-top: 48px;margin-bottom: 46px;text-align: center;flex-direction: column;align-items: center;justify-content: center;display: flex;">
<div class="list">Tên người dùng: '.$erstt.'<br>
<form action="" method="post">
<input type="text" name="status" value="'.$stt.'"><br><br>
<input type="submit" name="change" value="Thay Đổi" style="color:white; background-color: #71BBCE; border-radius: 8px;"></form>
</div>
</div>
</div>
</div>';
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';
?>