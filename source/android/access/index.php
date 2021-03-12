<?php
@$ac=$_SGET['ac']?$_SGET['ac']:'index';

if (!@include_once(S_ROOT.'./data/data_category_4.php')) {  
   include_once(S_ROOT.'./data/data_category_4.php'); 
}


include_once(S_ROOT."./source/".$_SCLIENT['type']."/controller/".$ac.".php");
?>




