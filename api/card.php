<?php 
    require_once("../config/config.php");
    require_once("../config/function.php");

    if (isset($_GET['type']) && isset($_GET['menhgia']) && isset($_GET['seri']) && isset($_GET['pin']) && isset($_GET['APIKey']) && isset($_GET['callback']) )
    {
        $type = check_string($_GET['type']);
        $loaithe = $type;
        $menhgia = check_string($_GET['menhgia']);
        $seri = check_string($_GET['seri']);
        $pin = check_string($_GET['pin']);
        $APIKey = check_string($_GET['APIKey']);
        $content = check_string($_GET['content']);
        $callback = trim($_GET['callback']);
        $code = random('qwertyuiopasdfghklzxcvbnm1234567890',12);


        if($block_callback = $ĐGB->get_row("SELECT * FROM `block_callback` WHERE `url` = '$callback' "))
        {   
            $data['data'] = [
                "status"    =>  'error',
                "msg"       =>  'Website này bị cấm sử dụng dịch vụ '.$ĐGB->site('tenweb')
                ];
            die(json_encode($data, JSON_PRETTY_PRINT));
        }
        if($ĐGB->num_rows("SELECT * FROM `card_auto` WHERE `trangthai` = 'xuly' ") >= 20)
        {
            $ĐGB->insert('block_callback', [
                'url'       => $callback,
                'reason'    => '[ANTI-SPAM] Spam thẻ vào hệ thống',
                'createdate'=> gettime()
            ]);
        }
        $getUser = $ĐGB->get_row("SELECT * FROM `users` WHERE `token` = '$APIKey' ");
        if(!$getUser)
        {
            $data['data'] = [
                "status"    =>  'error',
                "msg"       =>  'API Key nạp thẻ không hợp lệ, vui lòng báo Admin !'
                ];
                die(json_encode($data, JSON_PRETTY_PRINT));
        }
        /* TƯƠNG THÍCH CARD24H */
        if($loaithe == 'Viettel')
        {
            $loaithe = 'VIETTEL';
        }
        else if($loaithe == 'Vinaphone')
        {
            $loaithe = 'VINAPHONE';
        }
        else if($loaithe == 'Mobifone')
        {
            $loaithe = 'MOBIFONE';
        }
        else if($loaithe == 'Vietnamobile')
        {
            $loaithe = 'VNMOBI';
        }
        else if($loaithe == 'Zing')
        {
            $loaithe = 'ZING';
        }
         else if($loaithe == 'VCOIN')
        {
            $loaithe = 'VCOIN';
        }
         else if($loaithe == 'GATE')
        {
            $loaithe = 'GATE';
        }

        if(!$getUser)
        {
            $data['data'] = [
                "status"    =>  'error',
                "msg"       =>  'APIKey không tồn tại trong hệ thống !'
                ];
                die(json_encode($data, JSON_PRETTY_PRINT));
        }
        $ck = $ĐGB->get_row("SELECT * FROM `loaithe` WHERE `type` = '$loaithe' ")['ck'];
        if ($menhgia <= '30000')
        {
            $ck = $ck + $ĐGB->site('ck_con');
        }
        if ($menhgia >= '500000')
        {
            $ck = $ck + $ĐGB->site('ck_500');
        }
        $thucnhan = $menhgia - $menhgia * $ck / 100;
        $result = trumthe($loaithe, $pin, $seri, $menhgia, $code);
        if($result['status'] == 100)
        {
            $data['data'] = [
                "status"    =>  'error',
                "msg"       =>  $result['message']
                ];
                die(json_encode($data, JSON_PRETTY_PRINT));
        }
        if($result['status'] == 1)
        {
            $ĐGB->cong("users", "money", $thucnhan, " `token` = '$token' ");
            /* CẬP NHẬT DÒNG TIỀN */
            $ĐGB->insert("dongtien", array(
                'sotientruoc'   => $getUser['money'],
                'sotienthaydoi' => $sotien,
                'sotiensau'     => $getUser['money'] + $thucnhan,
                'thoigian'      => gettime(),
                'noidung'       => 'Đổi thẻ seri ('.$seri.')',
                'username'      => $getUser['username']
            ));
            $ĐGB->insert("card_auto", [
                'code'      => $code,
                'seri'      => $seri,
                'pin'       => $pin,
                'loaithe'   => $loaithe,
                'menhgia'   => $menhgia,
                'thucnhan'  => $thucnhan,
                'request_id' => $content,
                'username'  => $getUser['username'],
                'trangthai' => 'hoantat',
                'ghichu'    => '',
                'thoigian'  => gettime(),
                'callback'  => $callback,
                'server'    => 'gachthe1s'
            ]);
            $data['data'] = [
            "status"    =>  'success',
            "msg"       =>  'Nạp thẻ thành công'
            ];
            die(json_encode($data, JSON_PRETTY_PRINT));
        }
        if($result['status'] == 2)
        {
            $ĐGB->insert("card_auto", [
                'code'      => $code,
                'seri'      => $seri,
                'pin'       => $pin,
                'loaithe'   => $loaithe,
                'menhgia'   => $menhgia,
                'request_id' => $content,
                'thucnhan'  => '0',
                'username'  => $getUser['username'],
                'trangthai' => 'thatbai',
                'ghichu'    => 'Sai mệnh giá',
                'thoigian'  => gettime(),
                'callback'  => $callback,
                'server'    => 'gachthe1s'
            ]);
            $data['data'] = [
            "status"    =>  'error',
            "msg"       =>  'Sai mệnh giá'
            ];
            die(json_encode($data, JSON_PRETTY_PRINT));
        }
        if($result['status'] == 3)
        {
            $data['data'] = [
                "status"    =>  'error',
                "msg"       =>  'Vui lòng kiểm tra lại thẻ, nạp thẻ thất bại!'
                ];
            die(json_encode($data, JSON_PRETTY_PRINT));
        }
        if($result['status'] == 4)
        {
            $data['data'] = [
                "status"    =>  'error',
                "msg"       =>  'Chức năng này đang bảo trì, vui lòng quay lại sau'
                ];
            die(json_encode($data, JSON_PRETTY_PRINT));
        }
        if($result['status'] == 99)
        {
            $isInsert = $ĐGB->insert("card_auto", [
                'code'      => $code,
                'seri'      => $seri,
                'pin'       => $pin,
                'loaithe'   => $loaithe,
                'menhgia'   => $menhgia,
                'thucnhan'  => $thucnhan,
                'request_id' => $content,
                'username'  => $getUser['username'],
                'trangthai' => 'xuly',
                'ghichu'    => '',
                'thoigian'  => gettime(),
                'callback'  => $callback,
                'server'    => 'gachthe1s'
            ]);
            $data['data'] = [
                "status"    =>  'success',
                "msg"       =>  'Gửi thẻ thành công, vui lòng đợi duyệt!'
                ];
            die(json_encode($data, JSON_PRETTY_PRINT));
        }

    }