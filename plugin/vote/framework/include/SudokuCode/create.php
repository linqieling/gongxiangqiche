<?php
//error_reporting(E_ALL);
//error_reporting(0);
require('cssspritehelp.php');
$codename = 'captcha_code';
if (isset($_GET['key']) && $_GET['key']) {
  $codename .= '_' . $_GET['key'];
}
$img=new CssSpriteHelp();
session_start();
$_SESSION[$codename] = $img->Key;
session_write_close();
// echo $_SESSION[$codename];
// die();
$img->DrawingWord();
// create the hash for the random number and put it in the session
?>