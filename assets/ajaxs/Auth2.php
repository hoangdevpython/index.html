<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');
    
if($_POST['type'] == 'thecaovip')
    {
        if($ĐGB->site('status_demo') == 'ON')
        {
            msg_error2("Chức năng này không khả dụng trên trang web DEMO!");
        }
        $pass2 = check_string($_POST['pass2']);
        if(empty($pass2))
        {
            msg_error2("Bạn chưa nhập mật khẩu cấp 2 mới");
        }
        $row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if(!$row)
        {
            msg_error("Vui lòng đăng nhập!", BASE_URL(''), 2000);
        }
        $ĐGB->update("users", [
            'otp' => NULL,
            'pass2' => $pass2
        ], " `id` = '".$row['id']."' ");
        msg_success("Mật khẩu cấp 2 của bạn đã được thay đổi thành công !", "", 1000);
    }
    
     
    
 if($_POST['type'] == 'bentancoder' )
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
        $pass2 = random('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPLA', '8');
        $ĐGB->update("users", array(
            'pass2' => $pass2
        ), " `id` = '".$row['id']."' " );
        $guitoi = $email;   
        $subject = 'THECAOVIP.NET | QUÊN MẬT KHẨU CẤP 2';
        $bcc = $ĐGB->site('tenweb');
        $hoten ='Client';
       $noi_dung = ' 
        <div style="Margin:0 auto;max-width:600px;min-width:320px;width:320px;width:calc(28000% - 167400px)" id="m_-6317035852136942713m_6204971364936316490emb-email-header-container">
<div style="font-size:26px;line-height:32px;Margin-top:6px;Margin-bottom:20px;color:#c3ced9;font-family:Roboto,Tahoma,sans-serif;Margin-left:20px;Margin-right:20px" align="center">
<div align="center"><a style="text-decoration:none;color:#c3ced9" href="https://thecaovip.net/"><img style="display:block;height:auto;width:100%;border:0;max-width:396px" src="https://upanh.site/shuup7.png" alt="" width="396" class="CToWUd"></a></div>
</div>
</div>
</div>
<div>
        <h2 style="Margin-top:0;Margin-bottom:0;font-style:normal;font-weight:normal;color:#44a8c7;font-size:20px;line-height:28px;text-align:center"><strong>ĐẶT LẠI MẬT KHẨU CẤP 2 TÀI KHOẢN</strong></h2>
        <div> Chào '.$getUser['email'].' </div>
        </a></p><p style="Margin-top:20px;Margin-bottom:0">Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cấp 2 cho tài khoản của bạn.</p><p style="Margin-top:20px;Margin-bottom:20px">Mật khẩu cấp 2 mới của quý khách:</p>
</div>
</div>
        <div style="Margin-left:20px;Margin-right:20px">
<div style="Margin-bottom:20px;text-align:center">
<a style="border-radius:4px;display:inline-block;font-size:14px;font-weight:bold;line-height:24px;padding:12px 24px;text-align:center;text-decoration:none!important;color:#f5f7fa!important;border:1px solid rgba(0,0,0,0.25);background-color:#CC0000;font-family:Open Sans,sans-serif">'.$pass2.'</a>
</div>
</div>
</div>
</div>
<p style="Margin-top:0;Margin-bottom:0">Đây là mk cấp 2 chúng tôi cấp cho tài khoản của bạn, bạn có thể đổi thông tin mật khẩu cấp 2 trong phần bảo mật <a href="http://thecaovip.net">TheCaoVip.Net</a>.</p><p style="Margin-top:20px;Margin-bottom:0"></p><p style="Margin-top:20px;Margin-bottom:0"><strong>Nếu bạn không yêu cầu email này thì hãy <a style="text-decoration:underline;color:#5c91ad" href="https://www.facebook.com/Thesieuvip.net"><em>liên hệ ngay với chúng tôi</em></a></strong></p><p style="Margin-top:20px;Margin-bottom:0"> </p><p style="Margin-top:20px;Margin-bottom:0">Trân trọng cảm ơn!</p>
</div>
</div>
</div>
</div>
</div>
        </tr>
        </tbody>
        </table>
        <div style="font-size:12px;line-height:19px;Margin-top:20px">
<div>Hệ Thống TheCaoVip.Net</div>
</div>
<div style="font-size:12px;line-height:19px;Margin-top:18px">
<div>Hotline: <br>
Email: <a href="mailto:spthesieuvip.net@gmail.com">spthesieuvip.net@gmail.com</a><br>
Website: <a href="https://thecaovip.net">https://thecaovip.net</a></div>
</div>
</div>
</div>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);   
        msg_success('Gửi pass2 thành công !', BASE_URL('pass2'), 4000);
    }

    
   