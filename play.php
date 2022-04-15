<?php
if (isset($_GET['g'])){
$g = $_GET['g'];
if ($g == 'ott'){
include 'otfi/game/ott.php';
}
}