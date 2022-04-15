<?php
$title = 'Tìm Kiếm Thành Viên';
$trangay = 'Tìm Kiếm Thành Viên,/member/search';
include 'head.php';
echo '<div class="phdr"><a href="/member" style="color:white;">Thành Viên</a> / Tìm Kiếm Thành Viên</div><div class="list"><form action="" method="post">Tài khoản cần tìm: (Ít nhất 3 ký tự ,nhiều nhất 15 ký tự)<br><input type="text" name="nick" value="'.htmlspecialchars($_POST['nick']).'"><br><input type="submit" name="tim" value="Tìm"></form></div>';
if (isset($_POST['tim'])){
echo '<div class="phdr" style="padding:3px;"></div>';
$nick = htmlspecialchars($_POST['nick']);
$ec3 =mysqli_fetch_assoc(mysql_query('SELECT COUNT(id) as ul FROM dt_user WHERE account LIKE "%'.$nick.'%"'));
if ($nick == ''){
echo '<div class="list2">Chưa nhập tài khoản cần tìm !</div>';
$iu = '0';
}
if ($iu != '0'){
if (strlen($nick) < '3'){
echo '<div class="list2">Tài khoản cần tìm phải trên 3 ký tự !</div>';
$incluu = '0';
}
}
if ($incluu != '0' && $iu != '0'){
if (strlen($nick) > '15'){
echo '<div class="list2">Tài khoản cần tìm giới hạn 15 ký tự !</div>';
$inclu = '0';
}
}
if ($inclu != '0' && $iu != '0' && $incluu != '0'){
$ec3 =mysqli_fetch_assoc(mysql_query('SELECT COUNT(id) as ul FROM dt_user WHERE account LIKE "%'.$nick.'%"'));
$laydulieu =mysqli_query($conn,'SELECT count(id) as tong FROM dt_user WHERE account LIKE "%'.$nick.'%"');
$xuatdulieu =mysqli_fetch_assoc($laydulieu);
$tdulieu = $xuatdulieu['tong'];
$vtrang = !empty($xuatdulieu) ? $xuatdulieu['tong'] : '0';
$dtrang = isset($_GET['page']) ? $_GET['page'] : '1';
$gioihan = '5';
$laytrang = floor($gioihan/2);
$sotrang = '5';
$ttrang = ceil($tdulieu / $gioihan);
if ($dtrang > $ttrang){
$dtrang = $ttrang;
} else if ($dtrang < '1'){
$dtrang = '1';
}
$batdau = ($dtrang-1) * $gioihan;
$hiendulieu =mysqli_query($conn,'SELECT * FROM dt_user WHERE account LIKE "%'.$nick.'%" ORDER BY id DESC LIMIT '.$batdau.','.$gioihan.'');
if (mysqli_num_rows($hiendulieu)){
while($lay =mysqli_fetch_assoc($hiendulieu)){
if ($lay['lastonl'] > (time()-180)){
$vuphu = '<img src="/image/default/on.png">';
} else {
$vuphu = '<img src="/image/default/off.png">';
}
echo '<div class="list"><table id="'.$value.'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$lay['avatar'].'?i='.rand(000,999).'" width="40" height="40"></td><td>'.account($lay['id']).'<br/>'.$lay['status'].'<br>'.$lay['coin'].'</td></tr></table></div>';
}
} else {
echo '<div class="list2">Không tìm thấy tài khoản !</div>';
}
if ($vtrang > $gioihan){
echo '<div class="paging">';
if ($dtrang > '1' && $ttrang > '1'){
echo '<a href="?page='.($dtrang-1).'">« </a>';
}
if ($dtrang >= $sotrang){
$trangbatdau = $dtrang-$laytrang;
if ($ttrang > $dtrang+$laytrang){
$trangketthuc = $dtrang+$laytrang;
}
elseif($dtrang <= $ttrang && $dtrang > $ttrang-($sotrang-1)){
$trangbatdau = $ttrang-($sotrang-1);
$trangketthuc = $ttrang;
} else {
$trangketthuc = $ttrang;
}
} else {
$trangbatdau = 1;
if ($ttrang > $sotrang)
$trangketthuc = $sotrang;
else
$trangketthuc = $ttrang;
}
for ($i = $trangbatdau; $i <= $trangketthuc; $i++){
if ($i == $dtrang){
echo '<span>'.$i.'</span>';
} else {
echo '<a href="?page='.$i.'">'.$i.'</a>';
}
}
if ($dtrang < $ttrang && $ttrang > '1'){
echo '<a href="?page='.($dtrang+1).'">»</a>';
}
echo '</div>';
}
}
echo '<div class="phdr">Tổng: '.$ec3['ul'].'</div>';
}
include 'foot.php';
?>