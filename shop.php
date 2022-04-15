<?php
if (isset($_GET['sh'])){
$sh = $_GET['sh'];
if ($sh == 'icon'){
include 'otfi/shop/icon.php';
}
} else {
$title = 'Cửa Hàng';
$trangay = 'Cửa Hàng,/shop';
include 'head.php';
echo '<div class="phdr">Cửa Hàng</div>';
if (login){
echo '<div class="list"><a href="/shop/icon" style="color:;">Icon</a></div>';
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';
}