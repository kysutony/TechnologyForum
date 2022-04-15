<?php
$title = 'Danh Sách Thành Viên';
$trangay = 'Danh Sách Thành Viên,/member/member-list';
include 'head.php';
$ec3 =mysqli_fetch_assoc(mysql_query('SELECT COUNT(id) as uliii FROM dt_user'));
echo '<div class="phdr"><a href="/member" style="color:white;">Thành Viên </a> / Danh Sách Thành Viên</div>';
$laydulieu =mysqli_query($conn,'SELECT count(id) as tong FROM dt_user');
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
$hiendulieu =mysqli_query($conn,'SELECT * FROM dt_user ORDER BY id DESC LIMIT '.$batdau.','.$gioihan.'');
if (mysqli_num_rows($hiendulieu)){
while($lay =mysqli_fetch_assoc($hiendulieu)){
echo '<div class="list"><table id="'.$value.'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$lay['avatar'].'?i='.rand(000,999).'" width="40" height="40"></td><td>'.account($lay['id']).'<br/>'.$lay['status'].'<br>'.$lay['coin'].'</td></tr></table></div>';
}
} else {
echo '<div class="list2">Chưa có thành viên nào trên danh sách !</div>';
}
if ($vtrang > $gioihan){
echo '<div class="paging">';
if ($dtrang > '1' && $ttrang > '1'){
echo '<a href="?page='.($dtrang-1).'">«</a>';
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
if ($ec3['uliii'] != '0'){
echo '<div class="phdr">Tổng: '.$ec3['uliii'].'</div>';
}
include 'foot.php';
?>