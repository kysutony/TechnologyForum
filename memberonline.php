<?php
$title = 'Thành Viên Trực Tuyến';
$trangay = 'Thành Viên Trực Tuyến,/member/member-online';
include 'head.php';
$ec3 =mysqli_fetch_assoc(mysql_query('SELECT COUNT(id) as uliii FROM dt_user WHERE lastonl > "'.(time()-180).'"'));
echo '<div class="phdr"><a href="/member" style="color:white;">Thành Viên </a> / Thành Viên Trực Tuyến</div>';
$hiendulieu =mysqli_query($conn,'SELECT * FROM dt_user WHERE lastonl > "'.(time()-180).'" ORDER BY id DESC');
if (mysqli_num_rows($hiendulieu)){
while($lay =mysqli_fetch_assoc($hiendulieu)){
$expl = explode(',',$lay['onlin']);
$huhi = '<a href="'.$expl['1'].'" style="color:;">'.$expl['0'].'</a>';
if ($huhi == '<a href="/member/member-online" style="color:;">Thành Viên Trực Tuyến</a>'){
$list = '<div class="list3"><table id="'.$value.'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$lay['avatar'].'?i='.rand(000,999).'" width="40" height="40"></td><td>'.account($lay['id']).'<br/>'.$lay['status'].'<br>Ở đây ,trong danh sách</td></tr></table></div>';
} else {
$list = '<div class="list"><table id="'.$value.'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$lay['avatar'].'?i='.rand(000,999).'" width="40" height="40"></td><td>'.account($lay['id']).'<br/>'.$lay['status'].'<br>'.$huhi.'</td></tr></table></div>';
}
echo $list;
}
} else {
echo '<div class="list2">Không có có thành viên nào trực tuyến !</div>';
}
if ($ec3['uliii'] != '0'){
echo '<div class="phdr">Tổng: '.$ec3['uliii'].'</div>';
}
include 'foot.php';
?>