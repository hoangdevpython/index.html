<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
?>

<?php

if(!empty($_GET['nguoinhan']))
{
    $nguoinhan = check_string($_GET['nguoinhan']);
    $getOi2 = $ĐGB->get_row("SELECT * FROM `users` WHERE `phone` = '$nguoinhan'");
    if(strlen($nguoinhan) == 10)
        {
        echo $getOi2['username'];
         die();
        }    
}
else
{
    die('Không tìm thấy');
}
