<?php
require_once '../extensions/phpthumb/ThumbLib.inc.php';  
$thumb = PhpThumbFactory::create($_REQUEST[imagen]);

$thumb->adaptiveResize($_REQUEST['ancho'], $_REQUEST['alto']);
$thumb->show();
?>
 