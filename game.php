<?php
$title = 'Mini Game';
$trangay = 'Mini Game,/mini-game';
include 'head.php';
echo '<div class="phdr">Mini Game</div>';
if (login){
echo '<div class="list"><a href="/mini-game/rock-paper-scissors" style="color:;">Oẳn Tù Tì</a></div>';
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';