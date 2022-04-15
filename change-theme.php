<?php
$title = 'Thay Đổi Giao Diện';
$trangay = 'Thay Đổi Giao Diện,/account/change-theme';
include 'head.php';
echo '<div class="phdr"><a href="/account" style="color:white;">Tài Khoản</a> / Thay Đổi Giao Diện</div>';
if (login){
if (isset($_POST['changethh'])){
$theme = mysqli_fetch_assoc(mysqli_query($conn,'SELECT theme FROM dt_user WHERE account = "'.$_SESSION['login'].'"'));
echo '<div class="list3">Thay đổi thành công !</div>';
}
$theme1 = mysqli_fetch_assoc(mysqli_query($conn,'SELECT theme FROM dt_user WHERE account = "'.$_SESSION['login'].'"'));
if ($theme1['theme'] == 'bopbt'){
$h = 'Style - Giao Diện Mobile';
$v = 'Style';
} else {
$h = 'Bopbt - Giao Diện Bopbt(test)';
$v = 'Bopbt';
}
echo '<div class="list"><form method="post">Chọn:<br>
<select name="select"><option value="'.$v.'">'.$h.'</option></select><br><input type="submit" name="changethh" value="Thay Đổi"></form></div>';
} else {
echo '<div class="list3">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';