<?php
$title = 'Oẳn Tù Tì';
include 'head.php';
echo '<div class="phdr"><a href="/mini-game" style="color:white;">Mini Game</a> / Oẳn Tù Tì</div>';
if (login){
$reqnot =mysqli_fetch_assoc(mysql_query('SELECT coin FROM dt_user WHERE id = "2"'));
$reqcoin =mysqli_fetch_assoc(mysql_query('SELECT coin FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
if ($reqnot['coin'] < '200'){
echo '<div class="list2"><a href="/profile/BOT" style="color:#666;">BOT</a> đã phá sản, hãy quay lại sau !</div>';
} elseif ($reqcoin['coin'] < '50'){
echo '<div class="list2">Bạn phải có số xu trên 50 để chơi trò này !</div>';
} else {
if (isset($_POST['play'])){
$po = $_POST['po'];
$au = rand(1,3);
if ($po == '1'){
$pd = 'Kéo';
} elseif ($po == '2'){
$pd = 'Búa';
} elseif ($po == '3'){
$pd = 'Bao';
}
if ($au == '1'){
$pdd = 'Kéo';
} elseif ($au == '2'){
$pdd = 'Búa';
} elseif ($au == '3'){
$pdd = 'Bao';
}
$win = '<div class="list3">Bạn chọn '.$pd.', <a href="/profile/BOT" style="color:#666;">BOT</a> chọn '.$pdd.'.Chúc mừng bạn đã dành chiến thắng và nhận 200 xu !</div>';
$los = '<div class="list2">Bạn chọn '.$pd.', <a href="/profile/BOT" style="color:#666;">BOT</a> chọn '.$pdd.'.Rất tiếc bạn đã thua và bị trừ 50 xu !</div>';
if ($po == '1' && $au == '3'){
mysql_query('UPDATE dt_user SET coin = coin+200 WHERE id = "'.$_SESSION['idlogin'].'"');
mysql_query('UPDATE dt_user SET coin = coin-200 WHERE id = "2"');
echo $win;
} elseif ($po == '2' && $au == '1'){
mysql_query('UPDATE dt_user SET coin = coin+200 WHERE id = "'.$_SESSION['idlogin'].'"');
mysql_query('UPDATE dt_user SET coin = coin-200 WHERE id = "2"');
echo $win;
} elseif ($po == '3' && $au == '2'){
mysql_query('UPDATE dt_user SET coin = coin+200 WHERE id = "'.$_SESSION['idlogin'].'"');
mysql_query('UPDATE dt_user SET coin = coin-200 WHERE id = "2"');
echo $win;
} elseif ($po == '1' && $au == '2'){
mysql_query('UPDATE dt_user SET coin = coin-50 WHERE id = "'.$_SESSION['idlogin'].'"');
mysql_query('UPDATE dt_user SET coin = coin+50 WHERE id = "2"');
echo $los;
} elseif ($po == '2' && $au == '3'){
mysql_query('UPDATE dt_user SET coin = coin-50 WHERE id = "'.$_SESSION['idlogin'].'"');
mysql_query('UPDATE dt_user SET coin = coin+50 WHERE id = "2"');
echo $los;
} elseif ($po == '3' && $au == '1'){
mysql_query('UPDATE dt_user SET coin = coin-50 WHERE id = "'.$_SESSION['idlogin'].'"');
mysql_query('UPDATE dt_user SET coin = coin+50 WHERE id = "2"');
echo $los;
} elseif ($po == $au){
echo '<div class="list3">Bạn chọn '.$pd.', <a href="/profile/BOT" style="color:#666;">BOT</a> chọn '.$pdd.'.Kết quả hòa !</div>';
}
if (isset($_POST['po'])){
echo '<div class="phdr" style="padding:3px;"></div>';
}
}
echo '<div class="list"><form method="post"><table width="100%" class="menu" border="0" cellpadding="0" cellspacing="0"><tr valign="middle"><td width="33%" align="center"><label for="s_1"><img src="/image/default/game/ott/keo.png" max-width="100%"/></label></td><td width="34%" align="center"><img src="/image/default/game/ott/bua.png" max-width="100%"/></td><td width="33%" align="center"><img src="/image/default/game/ott/bao.png" max-width="100%"/></td></tr><tr valign="middle"><td width="33%" align="center"><input type="radio" name="po" value="1"/></td><td width="34%" align="center"><input type="radio" name="po" value="2"/></td><td width="33%" align="center"><input type="radio" name="po" value="3"/></td></tr></table></div><div class="list"><center><input type="submit" name="play" value="Chơi"></center></div></form>';
}
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';