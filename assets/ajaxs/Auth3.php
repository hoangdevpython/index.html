<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');

    if($_POST['type'] == 'luu')
    {
        $phone = check_string($_POST['phone']);
        $name = check_string($_POST['name']);
        if(empty($name))
        {
            msg_error2("Bạn chưa nhập họ và tên");
        }
        if(empty($phone))
        {
            msg_error2("Bạn chưa nhập số điện thoại");
        }
        $row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if(!$row)
        {
            msg_error("Vui lòng đăng nhập!", BASE_URL(''), 2000);
        }
        $ĐGB->update("users", [
            'otp' => NULL,
            'phone' => $phone,
            'name' => $name,
        ], " `id` = '".$row['id']."' ");
        msg_success("Sửa thông tin thành công !", "", 1000);
    }
    
