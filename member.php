<?php
$title = 'Thành Viên';
$trangay = 'Thành Viên,/member';
include 'head.php';
$ipo =mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as totalmem FROM dt_user'));
$ipo1 =mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as totalad FROM dt_user WHERE position = "Admin" OR position = "SMod" OR position = "Mod"'));
$ipo2 =mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as totalol FROM dt_user WHERE lastonl > "'.(time()-180).'"'));
$ipo3 =mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as totalhi FROM dt_user WHERE lastonl < "'.(time()-180).'"'));
echo '
<div class="signup__container">
<div class="signup__form">
<div class="signup__form" style="max-width: 500px; margin-top: 48px;margin-bottom: 46px;text-align: center;flex-direction: column;align-items: center;justify-content: center;display: flex;">
<div class="phdr" style ="color:#131CF1 ">Thành Viên</div>';
echo '<div class="list">
<a href="/member/member-list" style="color:#71BBCE;">Danh Sách Thành Viên</a> ('.$ipo['totalmem'].')</div>
<div class="list"><a href="/member/member-admin-list" style="color:#71BBCE;">Danh Sách Thành Viên Quản Trị</a> ('.$ipo1['totalad'].')</div>
<div class="list"><a href="/member/member-online" style="color:#71BBCE;">Thành Viên Trực Tuyến</a> ('.$ipo2['totalol'].')</div>
<div class="list"><a href="/member/online-history" style="color:#71BBCE;">Lịch Sử Trực Tuyến</a> ('.$ipo3['totalhi'].')</div>
<div class="list"><a href="/member/search" style="color:#71BBCE;">Tìm Kiếm Thành Viên</a></div>
</div>
</div>
</div>';
include 'foot.php';
?>