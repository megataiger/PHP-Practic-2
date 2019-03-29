<?php
session_start();
if(!isset($_SESSION['my_counter']))
{
$_SESSION['my_counter']=0;
}
?>
<meta charset='utf-8'>
<?php
print "Этот скрипт перезапущен {$_SESSION['my_counter']} раз";

$_SESSION['my_counter']++;
?>
