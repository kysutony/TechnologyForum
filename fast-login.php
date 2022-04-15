<?php
$title = 'Đăng Nhập Nhanh';
$trangay = 'Đăng Nhập Nhanh,/fast-login';
include 'head.php';
echo '<div class="phdr">Đăng Nhập Nhanh</div>';
if (login){
$getauto = mysqli_query($conn,'SELECT id,account,fastcode FROM dt_user WHERE account = "'.$_SESSION['login'].'"');
if($resauto = mysqli_fetch_assoc($getauto)){
$auto = $resauto['fastcode'];
}
echo '<div class="list">Đăng Nhập Nhanh cho phép bạn đăng nhập nhanh vào trang web !<br>Truy cập địa chỉ bên dưới nếu bạn muốn đăng nhập nhanh:<br><input type="text" value="http://mbkvn.tk/fast-login/'.$auto.'"><br>Lưu ý: Không chia sẻ địa chỉ này cho bất kỳ ai ,ngoại trừ các thành viên ban quản trị (bao gồm <font color="red">Admin</font>, <font color="#3b5998">SMod</font>, <font color="blue">Mod</font>) !</div>';
} else {
if (isset($_GET['link'])){
$getautolog = mysqli_query($conn,'SELECT id,account,password FROM dt_user WHERE fastcode = "'.$_GET['link'].'"');
if($resautolog = mysqli_fetch_assoc($getautolog)){
$_SESSION['login'] = $resautolog['account'];
$_SESSION['idlogin'] = $resautolog['id'];
echo '<div class="list3">Đăng nhập thành công !</div>';
$loc = 'yes';
} else {
echo '<div class="list2">Không tìm thấy tài khoản !</div>';
}
} else {
echo '<div class="list2">Không tìm thấy link fast login !</div>';
}
}
include 'foot.php';
if ($loc == 'yes'){
echo '<script>window.location.href="/";</script>';
}
?>
