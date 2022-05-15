<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');
    
    $inputJSON = file_get_contents('php://input');
    $response = json_decode($inputJSON, true);
    $file = @fopen('logs/callback_'.date('d_m_Y').'.txt', 'a');
    fwrite($file, $inputJSON ."\n");
    $status = $response['status'];
    $request_id = $response['request_id'];
    $list_card = $response['list_card'];
    
    $inforOrder = $ĐGB->get_row("SELECT * FROM `muathe` WHERE `magd`='" . $request_id . "'");
    if (!empty($inforOrder['magd'])) {
        if ($status == 200) {
                    $ĐGB->query("UPDATE `muathe` SET PinCode = '". $list_card[0]['card_code'] . "', Serial = '" . $list_card[0]['card_serial'] . "' WHERE id=".$inforOrder['id']."");
                    $getUser = $ĐGB->get_row("SELECT * FROM users WHERE username='".$inforOrder['username']."'");
                    $guitoi = $getUser['email'];   
                    $subject = 'Đơn hàng mua thẻ '.type_muathe($inforOrder["Telco"]).' ';
                    $bcc = $ĐGB->site('tenweb');
                    $hoten ='Client';
                    $noi_dung = '<h2>Thông tin chi tiết thẻ cào #'.type_muathe($inforOrder["Telco"]).'</h2>
                    <table>
                    <tbody>
                    <tr>
                    <td>Loại Thẻ:</td>
                    <td><b>'.type_muathe($inforOrder["Telco"]).'</b></td>
                    </tr>
                    <tr>
                    <td>Mệnh Giá:</td>
                    <td><b style="color:blue;">'.format_cash($inforOrder["Amount"]).'</b></td>
                    </tr>
                    <tr>
                    <td>SERI:</td>
                    <td><b>'.$inforOrder['Serial'].'</b></td>
                    </tr>
                    <tr>
                    <td>PIN</td>
                    <td><b>'.$inforOrder['PinCode'].'</b></td>
                    </tr>
                    <tr>
                    <td>Thời Gian Xử Lý</td>
                    <td><b style="color:red;">'.gettime().'</b></td>
                    </tr>
                    </tbody>
                    </table>
                    <i>Cảm ơn quý khách!</i>';
                    sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);
        }
        die(json_encode(array(
            'status' => 200,
            'message' => 'Callback success'
        )));
    } else {
        die(json_encode(array(
            'status' => 100,
            'message' => 'Order not found'
        )));
    }
