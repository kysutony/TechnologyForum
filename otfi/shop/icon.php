<?php
$title = 'Icon';
$trangay = 'Icon,/shop/icon';
include 'head.php';
include 'func.php';
echo '<div class="phdr"><a href="/shop" style="color:white;">Cửa Hàng</a> / Icon</div>';
if (login){
if (isset($_POST['pus'])){
$reqxup =mysqli_fetch_assoc(mysql_query('SELECT coin FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
if ($reqxup['coin'] >= $_POST['stt']){
mysql_query('UPDATE dt_user SET icond = "'.$_POST['name'].'", coin = coin-'.$_POST['stt'].' WHERE account = "'.$_SESSION['login'].'"');
echo '<div class="list3">Mua icon thành công !</div>';
} else {
echo '<div class="list2">Bạn không đủ tiền !</div>';
}
echo '<div class="phdr"></div>';
}
if (isset($_POST['mua'])){
$reqxu =mysqli_fetch_assoc(mysql_query('SELECT coin FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
$stx = explode(',',$_POST['stp']);
if ($reqxu['coin'] < $stx['0']){
echo '<div class="list2">Bạn không đủ '.$stx['0'].' xu để mua icon này, bạn chỉ có '.$reqxu['coin'].' xu !</div>';
} else {
echo '<div class="list">Bạn có muốn mua icon này với giá '.$stx['0'].' xu không ?<form method="post"><input type="hidden" name="stt" value="'.$stx['0'].'"><input type="hidden" name="name" value="'.$stx['1'].'"><input type="submit" name="pus" value="Có"> <input type="submit" name="no" value="Không"></form></div>';
}
echo '<div class="phdr" style="padding:3px;"></div>';
}
echo '<form method="post">';
$opd = opendir('image/default/icon');
while($icon = readdir($opd)){
if (end(explode('.',$icon)) == 'png'){
$tp = explode('.',$icon);
$dp = file_get_contents('image/default/icon/data/'.$tp['0']);
$td = explode('-',$dp);
$gui =mysqli_fetch_assoc(mysql_query('SELECT icond FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
$iconu = $gui['icond'];
if ($tp['0'] != $iconu){
echo '<div class="list"><input type="radio" name="stp" value="'.$td['1'].','.$tp['0'].'"><img src="/image/default/icon/'.$icon.'"> '.$td['0'].' - '.$td['1'].' xu</div>';
}
}
}
echo '<div class="list"><input type="submit" name="mua" value="Mua"></form></div>';
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';