<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');


    if($_POST['type'] == 'BuyCard')
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập để tiếp tục !", BASE_URL("Auth/Login"), 2000);
        }
        if($ĐGB->site('status_muathe') != 'ON')
        {
            msg_error2("Kho hết thẻ vui lòng liên hệ admin để mua thêm !");
        }
        if(empty($ĐGB->site('tk_banthe247')) || empty($ĐGB->site('mk_banthe247')))
        {
            msg_error2("Vui lòng điền tài khoản mật khẩu API!");
        }
        $pass2 = check_string($_POST['pass2']);
        $telco = check_string($_POST['telco']);
        $amount = check_string($_POST['amount']);
       
         if(empty($pass2))
        {
            msg_error2("Vui lòng nhập mật khẩu cấp 2!");
        }
        $row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `pass2` = '$pass2' ");
        if(!$row)
        {
            msg_error2('Mật khẩu cấp 2 không chính xác');
        }
        if(empty($telco))
        {
            msg_error2("Vui lòng chọn loại thẻ cần mua");
        }
        if(empty($amount))
        {
            msg_error2("Vui lòng chọn mệnh giá thẻ");
        }
        if($amount <= 0)
        {
            msg_error2("Mệnh giá không hợp lệ !");
        }
        if($amount > $getUser['money'])
        {
            msg_error2("Số dư không đủ vui lòng nạp thêm.");
        }
        $telcoCV = '';
        if($telco == 'VTT'){
            $telcoCV = 'VIETTEL';
        }
        else if($telco == 'VNP'){
            $telcoCV = 'VINAPHONE';
        }
        else if($telco == 'VNM'){
            $telcoCV = 'VIETNAMOBILE';
        }
        else if($telco == 'ZING'){
            $telcoCV = 'ZING';
        }
        else if($telco == 'FPT'){
            $telcoCV = 'GATE';
        }
        else if($telco == 'VTC'){
            $telcoCV = 'VCOIN';
        }
        else if($telco == 'GAR'){
            $telcoCV = 'GARENA';
        }
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://services.cardvip.vn/api/oauth/token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'username=xxxx%40gmail.com&password=xxxx&grant_type=password',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        $codeId = round(microtime(true) * 1000);
        
        $jsonDataToken = json_decode($response, true);
        if(!empty($jsonDataToken['access_token'])){
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://services.cardvip.vn/api/order/buycard',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => 'apikey=7c0b91b0-9dbe-467a-a5ac-25d681fcab58&telco='.$telcoCV.'&prices='.$amount.'&quantity=1&urlcallback=https%3A%2F%2Fthecaovip.net%2Fassets%2Fajaxs%2Fcallback_buycard.php&requestid='.$codeId,
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '. $jsonDataToken['access_token'],
                'Content-Type: application/x-www-form-urlencoded'
              ),
            ));
            
            $response2 = curl_exec($curl);
            
            curl_close($curl);
            $jsonDataToken2 = json_decode($response2, true);
            if($jsonDataToken2['status'] == 200){
                if($amount > $getUser['money'])
                {
                    // KHÓA TÀI KHOẢN HACKER
                    $ĐGB->update("users", array(
                        'banned' => 1
                    ), "username = '".$_SESSION['username']."' ");
                    
                    session_destroy();
                    
                    msg_error2("Tài khoản của bạn đã bị khóa vì sử dụng cố tình gian lận hệ thống.");
                }
                else{
                    $isTru = $ĐGB->tru("users", "money", $amount, " `username` = '".$getUser['username']."' ");
                    if($isTru)
                    {
                        // Dòng tiền
                        $ĐGB->insert("dongtien", array(
                            'sotientruoc'   => $getUser['money'],
                            'sotienthaydoi' => $amount,
                            'sotiensau'     => $getUser['money'] - $amount,
                            'thoigian'      => gettime(),
                            'noidung'       => 'Mua thẻ ('.$ĐGB->type_muathe($telco).' mệnh giá '.format_cash($amount).')',
                            'username'      => $getUser['username']
                        ));
                        $ĐGB->insert("muathe", [
                            'username'  => $getUser['username'],
                            'magd'      => $codeId,
                            'Telco'     => $telco,
                            'PinCode'   => '',
                            'Serial'    => '',
                            'Amount'    => $amount,
                            'Trace'     => '',
                            'gettime'   => gettime(),
                            'time'      => time()
                        ]);
                    }
                    msg_success("Mua thẻ thành công . Xin vui lòng đợi 1s xử lý !", "", 2000);
                }
            }
            else{
                msg_error2("Hệ thống bận vui lòng thử lại.");
            }
        }
        else{
            msg_error2("Hệ thống bận vui lòng thử lại.");
        }
    }
    
    
    
    
    
    