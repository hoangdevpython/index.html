<?php
    require_once("../config/config.php");
    require_once("../config/function.php");
    
    $txtBody = file_get_contents('php://input');
    $jsonBody = json_decode($txtBody); //convert JSON into array
    if (!$txtBody || !$jsonBody)
    {
        echo "WEBSITE ĐƯỢC VẬN HÀNH BỞI BENTAN CODER FB : FB.COM/100068553914709 | ZALO : 0906287237 ";
        die();
    }
    if ($jsonBody->error != 0)
    {
        echo "Có lỗi xay ra ở phía Casso";
        die();
    }
    $headers = getHeader();
    if ( $headers['Secure-Token'] != $ĐGB->site('api_bank') )
    {
        echo("Thiếu Secure Token hoặc secure token không khớp");
        die(); 
    }
    if ($ĐGB->site('api_bank') == NULL)
    {
        echo("Chức năng không khả dụng!");
        die(); 
    }
    foreach ($jsonBody->data as $key => $transaction)
    {
        $des = $transaction->description;
        $amount = $transaction->amount;
        $id = parse_order_id($des);
        $file = @fopen('LogBank.txt', 'w');
        if ($file)
        {
            $data = "tid => $transaction->tid description => $des ($id) amount => $transaction->amount wen => $transaction->wen bank_sub_acc_id => $transaction->bank_sub_acc_id cusum_balance => $transaction->cusum_balance".PHP_EOL;
            fwrite($file, $data);
        }
        if ($id)
        {
            $row = $ĐGB->get_row(" SELECT * FROM `users` WHERE `id` = '$id' ");
            if($row['username'])
            {
                if($ĐGB->num_rows(" SELECT * FROM `bank_auto` WHERE `tid` = '$transaction->tid' ") == 0)
                {
                    /* GHI LOG BANK AUTO */
                    $create = $ĐGB->insert("bank_auto", array(
                        'tid' => $transaction->tid,
                        'description' => $des,
                        'amount' => $amount,
                        'time' => gettime(),
                        'bank_sub_acc_id' => $transaction->subAccId,
                        'username' => $row['username'],
                        'cusum_balance' => $transaction->cusum_balance
                        ));
                    if ($create)
                    {
                        $isCheckMoney = $ĐGB->cong("users", "money", $amount, " `username` = '".$row['username']."' ");
                        if($isCheckMoney)
                        {
                            $ĐGB->cong("users", "total_money", $amount, " `username` = '".$row['username']."' ");
                            /* GHI LOG DÒNG TIỀN */
                            $ĐGB->insert("dongtien", array(
                                'sotientruoc' => $row['money'],
                                'sotienthaydoi' => $amount,
                                'sotiensau' => $row['money'] + $amount,
                                'thoigian' => gettime(),
                                'noidung' => 'Nạp tiền tự động ngân hàng ('.$transaction->tid.')',
                                'username' => $row['username']
                            ));
                        }
                    }
                }
            }
        } 
    }
    echo "<div>Xử lý hoàn tất</div>";
    die();