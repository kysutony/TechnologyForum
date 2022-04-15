<?php
$conn = mysqli_connect("localhost","root","","data_wap");
$title = 'Đăng Xuất';
$trangay = 'Đăng Xuất,/logout';
include 'head.php';
echo '<div class="phdr" style="color: #131CF1;">Đăng Xuất</div>';
if (login){
if (isset($_POST['okout'])){
unset($_SESSION['login']);
unset($_SESSION['idlogin']);
echo '<div class="list3">Đăng xuất thành công ,nhấn <a href="/" style="color:;">vào đây</a> để về Trang Chủ  !</div>';
$suc = 'ok';
}
echo '<div class="signup__form"><div style="text-align: center;">
<a style="color: #131CF1;">Bạn có muốn đăng xuất ?</a> 
<br><br>
<div style="text-align: center;">
<form method="post">
<input type="submit" name="okout" class="create__btn-create btn btn--type-02" value="Có" style="text-align: center; width:auto; height:auto;font-size:12px;background-color: #71BBCE; border-radius: 8px;" >
<input type="submit" name="noout" class="create__btn-create btn btn--type-02" value="Huỷ" style="text-align: center; width:auto; height:auto;font-size:12px; background-color: #71BBCE; border-radius: 8px;" >
</form></div>
</div></div>';
include 'foot.php';
if (isset($_POST['noout'])){
echo '<script>window.location.href="/";</script>';
}
if ($suc == 'ok'){
echo '<script>window.location.href="/";</script>';
}
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
include 'foot.php';
}
?>