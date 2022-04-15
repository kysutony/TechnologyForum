

    
<div class="footer js-dropdown">
<div class="container">
    <div class="footer__logo">
        <a href="index.php">
                <img src="/images/image1.png" alt="logo" style="max-width:70px" width="100%">
        </a>
        
    </div>
    <div class="footer__nav">
        <div class="footer__tline">
            <i class="icon-Support"></i>
            <ul class="footer__menu">
                <li><a href="#">Hỗ trợ</a></li>
                <li><a href="#">Thông tin</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
            
        </div>
        <div class="footer__bline">
            <i class="icon-Support"></i>&nbsp;
            <ul class="footer__menu">
                <li><a href="#">Support</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul class="footer__social">
                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-cloud" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
            </ul>
            <div class="footer__language-btn-m" data-dropdown-btn="language">Americas - English<i class="icon-Arrow_Below"></i></div>
        </div>
    </div>
</div>
</div>

<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/velocity/velocity.min.js"></script>
<script src="/js/app.js"></script>
<script src="/Ckeditor/Ckeditor.js"></script>
<script>
 
 CKEDITOR.replace( 'editor1' );

</script>    

</body>

</html>

<?php

/*

$ggbot = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as ggbot FROM bot WHERE uagen = "Google"'));
if ($_SERVER['HTTP_USER_AGENT'] == 'APIs-Google (+https://developers.google.com/webmasters/APIs-Google.html)' OR $_SERVER['HTTP_USER_AGENT'] == 'Mediapartners-Google' OR $_SERVER['HTTP_USER_AGENT'] == 'Mozilla/5.0 (Linux; Android 5.0; SM-G920A) AppleWebKit (KHTML, like Gecko) Chrome Mobile Safari (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)' OR $_SERVER['HTTP_USER_AGENT'] == 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1 (compatible; AdsBot-Google-Mobile; +http://www.google.com/mobile/adsbot.html)' OR $_SERVER['HTTP_USER_AGENT'] == 'AdsBot-Google (+http://www.google.com/adsbot.html)' OR $_SERVER['HTTP_USER_AGENT'] == 'Googlebot-Image/1.0' OR $_SERVER['HTTP_USER_AGENT'] == 'Googlebot-News' OR $_SERVER['HTTP_USER_AGENT'] == 'Googlebot-Video/1.0' OR $_SERVER['HTTP_USER_AGENT'] == 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' OR $_SERVER['HTTP_USER_AGENT'] == 'Googlebot/2.1 (+http://www.google.com/bot.html)' OR $_SERVER['HTTP_USER_AGENT'] == 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' OR $_SERVER['HTTP_USER_AGENT'] == '(compatible; Mediapartners-Google/2.1; +http://www.google.com/bot.html)' OR $_SERVER['HTTP_USER_AGENT'] == '(compatible; Mediapartners-Google/2.1; +http://www.google.com/bot.html)' OR $_SERVER['HTTP_USER_AGENT'] == 'AdsBot-Google-Mobile-Apps'){
$uname = 'Google';
mysqli_query($conn,'INSERT INTO bot SET uage = "'.$_SERVER['HTTP_USER_AGENT'].'",uaget = "'.time().'",uagen = "'.$uname.'"');
$gue = 'no';
}
if ($_SERVER['PHP_SELF'] == '/index.php'){
$membertong = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as tongmember FROM dt_user'));
$coutcmt = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as tongcmt FROM dt_forumcmt'));
$coutfile = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as tongfile FROM dt_forumfile'));
$coutthr = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as tongthr FROM dt_forum'));
$rmemmoi = mysqli_query($conn,'SELECT account,ncolor FROM dt_user ORDER BY id DESC');
if($memmoi = mysqli_fetch_assoc($rmemmoi)){
$memmoii = $memmoi['account'];
$memcolor = $memmoi['ncolor'];
}
echo '<div class="phdr">Thống Kê</div><div class="list">Có '.$coutcmt['tongcmt'].' bình luận và '.$coutfile['tongfile'].' tập tin trong '.$coutthr['tongthr'].' chủ đề</div><div class="list">Thành viên:
'.$membertong['tongmember'].' | T.v mới: <a href="/profile/'.$memmoii.'" style="color:'.$memcolor.';">'.$memmoii.'</a></div>';
}
if (login){
mysqli_query($conn,'UPDATE dt_user SET datee = "'.date('H:i:s d/m/Y').'" WHERE account = "'.$_SESSION['login'].'"');
}
$reid = session_id();
$reti = time();
$reit = time()-180;
if (login){
mysqli_query($conn,'UPDATE dt_user SET lastonl = "'.time().'" WHERE account = "'.$_SESSION['login'].'"');
} else {
if ($gue != 'no'){
$reqg = mysqli_query($conn,'SELECT * FROM guest WHERE id = "'.$reid.'"');
if($resg = mysqli_fetch_assoc($reqg)){
mysqli_query($conn,'UPDATE FROM guest SET lastonl = "'.$reti.'" WHERE id = "'.$reid.'"');
} else {
mysqli_query($conn,'INSERT INTO guest SET id = "'.$reid.'",lastonl = "'.$reti.'"');
}
}
}
mysqli_query($conn,'DELETE FROM guest WHERE lastonl < "'.$reit.'"');
$guestonline1 = mysqli_query($conn,'SELECT * FROM "guest"');
$guestonline = mysqli_num_rows($guestonline1);
$useronline1 = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as uonl FROM dt_user WHERE lastonl > "'.(time()-180).'"'));
$useronline = $useronline1['uonl'];
$sql3 = "SELECT * FROM guest";
$result3 = mysqli_query($sql3);
$guestonline = mysqli_num_rows($result3);
$totalonline = $useronline['uonl']+$guestonline+$ggbot['ggbot'];
$bottotal = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as ggbotto FROM bot'));
if ($_SERVER['PHP_SELF'] == '/index.php'){
?>
<div class="list">Có <?php echo $totalonline; ?> người trực tuyến ,<?php echo $useronline; ?> <a href="/member/member-online" style="color:;">thành viên</a> ,<?php echo $guestonline; ?> khách ,<?php echo $bottotal['ggbotto']; ?> robots</div>
<?php
if ($ggbot['ggbot'] != '0'){
$ggbots = ', <span style="font-family:Georgia,Verdana;"><span style="color:#1849b5">G</span><span style="color:#de3018">o</span><span style="color:#efbA00">o</span><span style="color:#1849b5">g</span><span style="color:#31b639">l</span><span style="color:#de3018">e</span></span>['.$ggbot['ggbot'].']';
}
echo '<div class="list">';
$online = mysqli_query($conn,'SELECT account,ncolor,lastonl,icond FROM dt_user WHERE lastonl > "'.(time()-180).'"');
if (mysqli_num_rows($online)){
while($resonl = mysqli_fetch_assoc($online)){
if ($resonl['icond']){
$icondp = '<img src="/image/default/icon/'.$resonl['icond'].'.png">';
} else {
$icondp = '';
}
$vh[] = $icondp.' <a href="/profile/'.$resonl['account'].'" style="color:'.$resonl['ncolor'].';">'.$resonl['account'].'</a>';
}
echo implode(', ',$vh).''.$ggbots.'';
}
}
echo '</div>';
?>
<?php
mysqli_query($conn,'DELETE FROM bot WHERE uaget < "'.(time()-180).'"');
?>
<div class="phdr" style="padding:3px;"></div><div class="list" style="text-align:center;">Copyright &copy; 2018</div></div>
</loadpg>
<?php
if ($loadjs){
echo '<script src="/otfi/js/load.js?v=3627626"></script>';
}
?>