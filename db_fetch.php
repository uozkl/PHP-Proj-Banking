<?php
require('db_connect.php');
$user_id = $_COOKIE['this_id'];
$account_res = pg_fetch_all(pg_query($db_connection,"select * from account where user_id= $user_id"));
$card_info_res = pg_fetch_all(pg_query($db_connection,"select * from card_info where user_id= $user_id"));
$name = '';
if($account_res[0]['user_gender']=='Male'){
    $name = "Mr. ". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
}elseif($account_res[0]['user_gender']=='Female'){
    $name = "Mrs. ". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
}else{
    $name = "". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
}
$card_res = pg_fetch_all(pg_query($db_connection,"select * from card_info as C, transaction_info as T where C.user_id = $user_id and T.card_id = C.card_id"));


$summary = array();
$mapping = array();

for ($i=0; $i<sizeof($card_info_res); $i++){
    array_push($summary,array("type"=>$card_info_res[$i]['card_type'],"number"=>$card_info_res[$i]['card_number'],"balance"=>0,"id"=>$card_info_res[$i]['card_id']));
    array_push($mapping,$card_info_res[$i]['card_id']);
}


for ($j=0; $j<sizeof($card_res); $j++){
    $tmp = $card_res[$j];
    $index = array_search($tmp['card_id'],$mapping);
    $summary[$index]["balance"] = $summary[$index]["balance"]+intval($tmp['transaction_inflow'])-intval($tmp['transaction_outflow']);
}

$credit_total = 0;
$savings_total = 0;
$cash_total = 0;
$loan_total = 0;

for ($i=0; $i<sizeof($summary); $i++){
    $amount = $summary[$i]['balance'];
    if($summary[$i]['type']=='Credit'){
        $credit_total = $credit_total+$amount;
    }
    if($summary[$i]['type']=='Savings'){
        $savings_total = $savings_total+$amount;
    }
    if($summary[$i]['type']=='Cash'){
        $cash_total = $cash_total+$amount;
    }
    if($summary[$i]['type']=='Loan'){
        $loan_total = $loan_total+$amount;
    }
}
//echo '<pre>'; print_r($card_res); echo '</pre>';
?>