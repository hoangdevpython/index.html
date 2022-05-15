<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');

    if($_POST['type'] == 'Login' )
    {
        $username = check_string($_POST['username']);
        $password = TypePassword(check_string($_POST['password']));
        if(empty($username))
        {
            msg_error2("Vui lòng nhập tên đăng nhập !");
        }
        if(!$ĐGB->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
        {
            msg_error2('Tên đăng nhập không tồn tại');
        }
        if(empty($password))
        {
            msg_error2("Vui lòng nhập mật khẩu !");
        }
        if(!$row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' "))
        {
            msg_error2('Mật khẩu đăng nhập không chính xác');
        }
        if($row['banned'] != 0)
        {
            msg_error2('Tài khoản này đã bị khóa bởi BQT lý do: '.$row['reason_banned']);
        }
        $ĐGB->update("users", [
            'otp' => NULL,
            'ip'  => myip()
        ], " `username` = '$username' ");
        $_SESSION['username'] = $username;
        msg_success('Đăng nhập thành công ', BASE_URL(''), 0);
    }

    if($_POST['type'] == 'Register' )
    {
        $username = check_string($_POST['username']);
        $password = check_string($_POST['password']);
        $email = check_string($_POST['email']);
        $pass2 = check_string($_POST['pass2']);
        $phone = check_string($_POST['phone']);
        if(empty($username))
        {
            msg_error2("Vui lòng nhập tên tài khoản !");
        }
        if(check_username($username) != True)
        {
            msg_error2('Vui lòng nhập định dạng tài khoản hợp lệ');
        }
        if(strlen($username) < 5 || strlen($username) > 64)
        {
            msg_error2('Tài khoản phải từ 5 đến 64 ký tự');
        }
        if($ĐGB->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
        {
            msg_error2('Tên đăng nhập đã tồn tại!');
        }
        if(empty($email))
        {
            msg_error2("Vui lòng nhập email !");
        }
        if(check_email($email) != True)
        {
            msg_error2("Định dạng Email không hợp lệ !");
        }
        if($ĐGB->get_row(" SELECT * FROM `users` WHERE `email` = '$email' "))
        {
            msg_error2('Email đã tồn tại trong hệ thống ');
        }
        if(empty($password))
        {
            msg_error2("Vui lòng nhập mật khẩu !");
        }
        if(strlen($password) < 5)
        {
            msg_error2('Vui lòng đặt mật khẩu trên 4 ký tự');
        }
         if(empty($pass2))
        {
            msg_error2("Vui lòng nhập mật khẩu cấp 2 !");
        }
         if(empty($phone))
        {
            msg_error2("Vui lòng nhập số điện thoại !");
        }
        if($ĐGB->num_rows(" SELECT * FROM `users` WHERE `ip` = '".myip()."' ") > 3)
        {
            msg_error2('Bạn đã đạt giới hạn tạo tài khoản');
        }
        $create = $ĐGB->insert("users", [
            'username'      => $username,
            'email'         => $email,
            'phone'         => $phone,
            'password'      => TypePassword($password),
            'pass2'         => $pass2,
            'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
            'money'         => 0,
            'used_money'    => 0,
            'total_money'   => 0,
            'banned'        => 0,
            'ref'           => $_SESSION['ref'],
            'ip'            => myip(),
            'time'          => time(),
            'createdate'    => gettime()
        ]);
        if ($create)
        {   
            $_SESSION['username'] = $username;
            msg_success('Tạo tài khoản thành công', BASE_URL(''), 1000);
        }
        else
        {
            msg_error2('Vui lòng kiểm tra cấu hình DATABASE');
        }
    }


    if($_POST['type'] == 'ForgotPassword' )
    {
        $email = check_string($_POST['email']);
        if(empty($email))
        {
            msg_error2("Vui lòng nhập địa chỉ email vào ô trống");
        }
        if(check_email($email) != True) 
        {
            msg_error2('Vui lòng nhập địa chỉ email hợp lệ');
        }
        $row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `email` = '$email' ");
        if(!$row)
        {
            msg_error2('Địa chỉ email không tồn tại trong hệ thống');
        }
        $otp = random('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPLA', '8');
        $ĐGB->update("users", array(
            'otp' => $otp
        ), " `id` = '".$row['id']."' " );
        $guitoi = $email;   
        $subject = 'GỬI OTP';
        $bcc = $ĐGB->site('tenweb');
        $hoten ='Client';
        $noi_dung = '<h3> Cảm ơn quý khách đã sử dụng dịch vụ của TheSieuVip.net . Mã OTP của quý khách là</h3>
        <table>
        <tbody>
        <tr>
        <td><b style="color:red;font-size:30px;">'.$otp.'</b></td>
        </tr>
        </tbody>
        </table>
        <h3>Quý khách có thắc mắc gì vui lòng liên hệ fanpage hoặc email : spthesieuvip.net@gmail.com</h3>
        </tr>
        </tbody>
        </table>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);   
        msg_success('Chúng tôi đã gửi mã xác minh vào địa chỉ Email của bạn !', BASE_URL('Auth/ChangePassword'), 4000);
    }

    if($_POST['type'] == 'ChangePassword')
    {
        $otp = check_string($_POST['otp']);
        $repassword = check_string($_POST['repassword']);
        $password = check_string($_POST['password']);
        if(empty($otp))
        {
            msg_error2("Bạn chưa nhập OTP");
        }
        if(empty($password))
        {
            msg_error2("Bạn chưa nhập mật khẩu mới");
        }
        if(empty($repassword))
        {
            msg_error2("Vui lòng xác minh lại mật khẩu");
        }
        $row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `otp` = '$otp' ");
        if(!$row)
        {
            msg_error2("OTP không tồn tại trong hệ thống");
        }
        if($password != $repassword)
        {
            msg_error2("Nhập lại mật khẩu không đúng");
        }
        if(strlen($password) < 5)
        {
            msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
        }
        $ĐGB->update("users", [
            'otp' => NULL,
            'password' => TypePassword($password)
        ], " `id` = '".$row['id']."' ");
    
        msg_success2("Mật khẩu của bạn đã được thay đổi thành công !");
    }

    if($_POST['type'] == 'DoiMatKhau')
    {
        if($ĐGB->site('status_demo') == 'ON')
        {
            msg_error2("Chức năng này không khả dụng trên trang web DEMO!");
        }
        $repassword = check_string($_POST['repassword']);
        $password = check_string($_POST['password']);
        if(empty($password))
        {
            msg_error2("Bạn chưa nhập mật khẩu mới");
        }
        if(empty($repassword))
        {
            msg_error2("Vui lòng xác minh lại mật khẩu");
        }
        if($password != $repassword)
        {
            msg_error2("Nhập lại mật khẩu không đúng");
        }
        if(strlen($password) < 5)
        {
            msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
        }
        $row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if(!$row)
        {
            msg_error("Vui lòng đăng nhập!", BASE_URL(''), 2000);
        }
        $ĐGB->update("users", [
            'otp' => NULL,
            'password' => TypePassword($password)
        ], " `id` = '".$row['id']."' ");
        msg_success("Mật khẩu của bạn đã được thay đổi thành công !", "", 1000);
    }