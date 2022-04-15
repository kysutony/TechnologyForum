<?php
if (login){
//mysqli_query($conn,'UPDATE dt_notification SET view = "view" WHERE cidacc = "'.$_SESSION['idlogin'].'" && content = "đã thích bình luận,/forum/thong-bao-dien-dan-'.htmlspecialchars($_GET['id']).'" && view = "none"');
if (isset($_POST['dan'])){
$nd = htmlspecialchars($_POST['cont']);
if ($nd == ''){
$ercon = 'Bạn chưa nhập nội dung !';
$er1 = 'err';
}
if ($er1 != 'err' && strlen($nd) < '2'){
$ercon = 'Độ dài nội dung ít nhất là 2 ký tự !';
$er2 = 'err';
}
if ($_SESSION['closecmt'] > time()-10 && $er1 != 'err' && $er2 != 'err' && $ercon == ''){
$ercon = 'Mỗi tin nhắn gửi phải cách nhau 10 giây !';
$er3 = 'err';
}

if ($er3 != 'err' && $er1 != 'err' && $er2 != 'err' && $ercon == ''){
//$idaccc = $_SESSION['idlogin'];
//$idbvv = htmlspecialchars($_GET['id'];
//$contentt = mysqli_real_escape_string($nd);
//$tpostt = date('H:i:s d/m/Y');
    mysqli_query($conn,'UPDATE dt_forum SET lasthd = "'.time().'" WHERE id = "'.$_GET['id'].'"');
mysqli_query($conn,'INSERT INTO dt_forumcmt SET idaccount = "'.$_SESSION['idlogin'].'",content = "'.($nd).'",idbv = "'.htmlspecialchars($_GET['id']).'",tpost = "'.date('H:i:s d/m/Y').'"');
//mysqli_query($conn,"INSERT INTO `dt_forumcmt` ( `idaccount `, `content`, `idbv` , `tpost`) VALUES ('$idaccc','$nd','$idbvv','$tpostt')");
$nf = mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idfr = "'.$_GET['id'].'"');
if (mysqli_num_rows($nf)){
while($kg = mysqli_fetch_assoc($nf)){
if ($_SESSION['idlogin'] != $kg['idaccount']){
$jka = mysqli_query($conn,'SELECT * FROM dt_notification WHERE idaccount = "'.$_SESSION['idlogin'].'" && cidacc = "'.$kg['idaccount'].'" && content = "đã bình luận về chủ đề,/forum/'.$_GET['na'].'-'.$_GET['id'].'" && goku = "forum"');
if (mysqli_num_rows($jka)){
mysqli_query($conn,'UPDATE dt_notification SET view = "none" WHERE idaccount = "'.$_SESSION['idlogin'].'" && cidacc = "'.$kg['idaccount'].'" && content = "đã bình luận về chủ đề,/forum/'.$_GET['na'].'-'.$_GET['id'].'" && goku = "forum" && view = "view"');
} else {
mysqli_query($conn,'INSERT INTO dt_notification SET idaccount = "'.$_SESSION['idlogin'].'",cidacc = "'.$kg['idaccount'].'",content = "đã bình luận về chủ đề,/forum/'.$_GET['na'].'-'.$_GET['id'].'",goku = "forum"');
}
}
$_SESSION['closecmt'] = time();
echo '<script>window.location.href="/forum/'.$_GET['na'].'-'.htmlspecialchars($_GET['id']).'?l='.rand(00,99).'";</script>';
}
}
$ft = mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idaccount = "'.$_SESSION['idlogin'].'" && idfr = "'.htmlspecialchars($_GET['id']).'"');
if ($tf = mysqli_fetch_assoc($ft)){
echo '';
} else {
    $idac = $_SESSION['idlogin'];
    $idfrr = htmlspecialchars($_GET['id']);
//mysqli_query($conn,'INSERT INTO dt_forumqt SET idaccount = "'.$_SESSION['idlogin'].'",idfr = "'.htmlspecialchars($_GET['id']).'"');
mysqli_query($conn,"INSERT INTO `dt_forumqt`( `idaccount`, `idfr`) VALUES('$idac','$idfrr')");
}
}
}
}
$laydulieu = mysqli_query($conn,'SELECT count(id) as tong FROM dt_forumcmt WHERE idbv = "'.htmlspecialchars($_GET['id']).'"');
$xuatdulieu = mysqli_fetch_assoc($laydulieu);
$tdulieu = $xuatdulieu['tong'];
$vtrang = !empty($xuatdulieu) ? $xuatdulieu['tong'] : '0';
if (!isset($_GET['page']) OR $_GET['page'] == '1'){
$ltrang = $vtrang-1;
} else {
$ltrang = $vtrang;
}
$dtrang = isset($_GET['page']) ? $_GET['page'] : '1';
if (!isset($_GET['page']) OR $_GET['page'] == '1'){
$gioihan = '9';
} else {
$gioihan = '10';
}
$laytrang = floor($gioihan/2);
$sotrang = '5';
$ttrang = ceil($tdulieu / $gioihan);
if ($dtrang > $ttrang){
$dtrang = $ttrang;
} else if ($dtrang < '1'){
$dtrang = '1';
}
if (!isset($_GET['page']) OR $_GET['page'] == '1'){
$batdau = ($dtrang-1) * $gioihan;
} else {
$batdau = ($dtrang-1) * $gioihan-1;
}
$hiendulieu = mysqli_query($conn,'SELECT * FROM dt_forumcmt WHERE idbv = "'.htmlspecialchars($_GET['id']).'" ORDER BY id ASC LIMIT '.($batdau.$tru).','.$gioihan.'');
$ib = '1';
if (mysqli_num_rows($hiendulieu)){
while($lay = mysqli_fetch_assoc($hiendulieu)){
if (login){
if ($likecmt){
$lcmt = mysqli_query($conn,'SELECT * FROM ulike WHERE idaccount = "'.$_SESSION['idlogin'].'" && clp = "'.$lay['id'].'" && fomb = "cmt" && blike = "'.htmlspecialchars($_GET['id']).'"');
if (!mysqli_fetch_assoc($lcmt) && $lay['idaccount'] != $_SESSION['idlogin']){
$plike = '<a class="vp" href="/action/forum/'.htmlspecialchars($_GET['na']).'/'.$lay['idaccount'].'/'.htmlspecialchars($_GET['id']).'/likecmt'.$lay['id'].'" style="color:;">Like</a>';
}
}
$coglimit = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) AS tong FROM ulike WHERE blike = "'.$_GET['id'].'" && fomb = "cmt" && clp = "'.$lay['id'].'"'));
$reqlikecmt = mysqli_query($conn,'SELECT * FROM ulike WHERE blike = "'.$_GET['id'].'" && fomb = "cmt" && clp = "'.$lay['id'].'" LIMIT '.$coglimit['tong'].'');
while($replike = mysqli_fetch_assoc($reqlikecmt)){
if (isset($_SESSION['login']) && $replike['idaccount'] == $_SESSION['idlogin']){
$cog = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) AS tong FROM ulike WHERE blike = "'.$_GET['id'].'" && fomb = "cmt" && clp = "'.$lay['id'].'"'));
if ($cog['tong'] == '1'){
$pn = 'Bạn';
} else {
$pn = 'Bạn, ';
}
} else {
$requli = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$replike['idaccount'].'"');
$ulike = mysqli_fetch_assoc($requli);
$use[] = '<a href="/profile/'.$ulike['account'].'" style="color:'.$ulike['ncolor'].';">'.$ulike['account'].'</a>';
}
}
$countlikecmt = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) AS tong FROM ulike WHERE blike = "'.$_GET['id'].'" && fomb = "cmt" && clp = "'.$lay['id'].'"'));
if ($countlikecmt['tong'] != '0'){
$dslike = '<div class="list">'.$pn.' '.implode(', ',$use).' đã thích bình luận này !</div>';
} else {
$dslike = '';
}
}
$ib++;
$upl = mysqli_query($conn,'SELECT * FROM dt_user where id = "'.$lay['idaccount'].'"');
 if (mysqli_num_rows($upl)){
 while($layupl = mysqli_fetch_assoc($upl)){
 if ($layupl['lastonl'] > (time()-180)){
 $vu = 'ON';
 } else {
 $vu = 'OFF';
 }
$countcmtuser = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as lip FROM dt_forumcmt WHERE idaccount = "'.$layupl['id'].'"'));
$d5 = ($ib+$batdau);
if (login){
if ($_SESSION['idlogin'] != $lay['idaccount']){
$qtt = '<div style="float:right;">'.$plike.'<a href="/forum/'.htmlspecialchars($_GET['na']).'-'.htmlspecialchars($_GET['id']).'/'.htmlspecialchars($_GET['id']).'/'.$lay['id'].'/comment" class="vp"><i class="icon-Reply_Fill"></i> &nbsp;Trả lời</a></div>';
} else {
$qtt = '';
}
}

/*echo '
<div class="phdr">
<table width="100%" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td width="auto" style="text-align: left;">'.fud($lay['tpost'],'upper').'</td>
<td width="auto" style="text-align: right;">#'.$d5.'</td>
</tr>
</tbody>
</table>
</div>
<div class="list1">
<table id="" cellpadding="0" cellspacing="1">
<tr>
<td width="auto">
<img src="'.$layupl['avatar'].'?i='.rand(000,999).'" width="40" height="40">
</td>
<td>'.account($lay['idaccount']).'<br/>'.$layupl['status'].'<br>
<img src="../image/default/bl.png" height="16px" width="16px">'.$countcmtuser['lip'].'
</td>
</tr>
</table>
</div>';*/
$ads = mysqli_query($conn,'SELECT * FROM dt_forumquote WHERE cmtid = "'.$lay['id'].'"');
if (mysqli_num_rows($ads)){
$anh = mysqli_fetch_assoc($ads);
if ($anh['idtopic'] != ''){
$hu = mysqli_query($conn,'SELECT id,idaccount,content FROM dt_forum WHERE id = "'.$anh['idtopic'].'"');
if (mysqli_num_rows($hu)){
$ad = mysqli_fetch_assoc($hu);
$po = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$ad['idaccount'].'"');
if (mysqli_num_rows($po)){
$u = mysqli_fetch_assoc($po);
$quote = '<div class="alert alert-warning" style=" padding: 2px; margin-bottom: 1px; border-radius: 0px; "><a href="/profile/'.$u['account'].'" style="color:'.$u['ncolor'].'";>@'.$u['account'].'</a> đã viết ↑</div><div class="alert alert-warning" style="border-radius: 0px; ">'.bbcode($ad['content']).'</div>';
}
}
} elseif ($anh['idcmt'] != ''){
$huu = mysqli_query($conn,'SELECT id,idaccount,content FROM dt_forumcmt WHERE id = "'.$anh['idcmt'].'"');
if (mysqli_num_rows($huu)){
$add = mysqli_fetch_assoc($huu);
$poo = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$add['idaccount'].'"');
if (mysqli_num_rows($poo)){
$us = mysqli_fetch_assoc($poo);
$quote = '<div class="alert alert-warning " style=" padding: 2px; margin-bottom: 1px; border-radius: 0px; "><a href="/profile/'.$us['account'].'" style="color:'.$us['ncolor'].'";>@'.$us['account'].'</a> đã viết ↑</div><div class="alert alert-warning" style="border-radius: 0px; ">'.bbcode($add['content']).'</div>';
}
}
}
} else {
$quote = '';
}
echo'
<div class="topic__head">
    <div class="topic__avatar">
        <a href="#" class="avatar">
        
        <img style=" border-radius: 250px;" src="/'.$layupl['avatar'].'" width="40" height="40">
        </a>
    </div>
    <div class="topic__caption">
        <div class="topic__name">
            <a href="#">
            '.$layupl['status'].'
            '.account($lay['idaccount']).'
            </a>
        </div>
        <div class="topic__date">
            <!---div class="topic__user topic__user--pos-r">
                <i class="icon-Reply_Fill"></i>
                <a href="#" class="avatar"><img src="fonts/icons/avatars/B.svg" alt="avatar"></a>
                <a href="#" class="topic__user-name">Benjamin Caesar</a>
            </div----->
            <i class="icon-Watch_Later"></i>'.fud($lay['tpost'],'upper').'
        </div>
    </div>
</div>
'.$quote.''.bbcode($lay['content']).'<br>'.$qtt.'
    <div class="topic__footer">
        <!--<div class="topic__footer-likes">
            <div>
                <a href="#"><i class="icon-Upvote"></i></a>
                <span>137</span>
            </div>
            <div>
                <a href="#"><i class="icon-Downvote"></i></a>
                <span>02</span>
            </div>
            <div>
                <a href="#"><i class="icon-Favorite_Topic"></i></a>
                <span>46</span>
            </div>
        </div>-->
        <div class="topic__footer-share">
            <!--<div data-visible="desktop">
                <a href="#"><i class="icon-Share_Topic"></i></a>
                <a href="#"><i class="icon-Flag_Topic"></i></a>
                <a href="#"><i class="icon-Bookmark"></i></a>
            </div>-->
            <div data-visible="mobile">
                <a href="#"><i class="icon-More_Options"></i></a>
            </div>
            
        </div>
    </div>
';
echo ''.$dslike.'';
}
}
}
}
if (!isset($_GET['page'])){
$sbv = '9';
} else {
$sbv = '10';
}
if ($ltrang >= $gioihan){
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
if (login){
if ($resthr['colp'] != 'close'){
//echo '<form action="" method="post"><div class="phdr" style="padding:3px;"></div><div class="list">Nội dung: '.$ercon.'<br><textarea name="cont" rows="2"></textarea><br><input type="submit" name="dan" value="Bình Luận"></form></div>';

echo '<form action="" method="post"><div class="phdr" style="padding:3px;"></div><div class="list">'.$ercon.'<br><textarea name="cont" class="form-control" placeholder="Bình luận công khai" rows="5" cols="95"></textarea><br><br><input type="submit" class="btn btn-default" style="width:auto; background-color:#71BBCE;border-radius: 8px; color:white" name="dan" value="Bình Luận"></form></div></div>';

// echo '<div class="topic">
// <div class="topic__head">
//     <div class="topic__avatar">
//         <a href="#" class="avatar"><img src="fonts/icons/avatars/N.svg" alt="avatar"></a>
//     </div>
//     <div class="topic__caption">
//         <div class="topic__name">
//             <a href="#">Nicolas</a>
//         </div>
//         <div class="topic__date">
//             <div class="topic__user topic__user--pos-r">
//                 <i class="icon-Reply_Fill"></i>
//                 <a href="#" class="avatar"><img src="fonts/icons/avatars/B.svg" alt="avatar"></a>
//                 <a href="#" class="topic__user-name">Benjamin Caesar</a>
//             </div>
//             <i class="icon-Watch_Later"></i>06 May, 2017
//         </div>
//     </div>
// </div>
// <div class="topic__content">
//     <div class="topic__text">
//         <p>noi dung cmt</p>
//     </div>
//     <div class="topic__footer">
//         <div class="topic__footer-likes">
//             <div>
//                 <a href="#"><i class="icon-Upvote"></i></a>
//                 <span>137</span>
//             </div>
//             <div>
//                 <a href="#"><i class="icon-Downvote"></i></a>
//                 <span>02</span>
//             </div>
//             <div>
//                 <a href="#"><i class="icon-Favorite_Topic"></i></a>
//                 <span>46</span>
//             </div>
//         </div>
//         <div class="topic__footer-share">
//             <div data-visible="desktop">
//                 <a href="#"><i class="icon-Share_Topic"></i></a>
//                 <a href="#"><i class="icon-Flag_Topic"></i></a>
//           <a href="#"><i class="icon-Bookmark"></i></a>
//             </div>
//             <div data-visible="mobile">
//                 <a href="#"><i class="icon-More_Options"></i></a>
//             </div>
//             <a href="#"><i class="icon-Reply_Fill"></i></a>
//         </div>
//     </div>
// </div>
// </div>';
}
}
?>

 