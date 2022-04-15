<?php
function login(){
return isset($_SESSION['login']);
}
define('login',login());
function account($id){
$pl =mysqli_fetch_assoc(mysqli_query($conn, "SELECT account,ncolor,position,lastonl,icond FROM dt_user WHERE id = '$id'"));
if ($pl['lastonl'] > (time()-180)){
$od = '<span style=" padding: 0 5px; font-size: 10px;  top: 50%; right: 0; border-radius: 20px; background-color: #71BBCE; color: #ffffff; align-items: center;">OFF</span>">
';
} else {
$od = '<span style=" padding: 0 5px; font-size: 10px;  top: 50%; right: 0; border-radius: 20px; background-color: #ff6f00; color: #ffffff; align-items: center;">OFF</span>';
}
if ($pl['icond']){
$icond = '<img src="image/default/icon/'.$pl['icond'].'.png">';
}
return ''.$icond.' <b><a href="profile/'.$pl['account'].'" style="color:'.$pl['ncolor'].';">'.$pl['account'].'</a></b> <span style="color:'.$pl['ncolor'].'">'.$pl['position'].'</span> '.$od.'';
}