<?php
$ac = empty($_SGET['ac'])?'':$_SGET['ac'];

if (!@include_once(S_ROOT.'./data/data_category_4.php')) {  
   include_once(S_ROOT.'./data/data_category_4.php'); 
}


include_once(S_ROOT."./source/".$_SCLIENT['type']."/controller/do_".$ac.".php");

?>