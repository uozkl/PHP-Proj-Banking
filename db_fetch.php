<?php
require('db_connect.php');
$user_id = $_COOKIE['this_id'];
$account_res = pg_fetch_all(pg_query($db_connection,"select * from account where user_id= $user_id"));
$name = '';
if($account_res[0]['user_gender']=='Male'){
    $name = "Mr. ". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
}elseif($account_res[0]['user_gender']=='Female'){
    $name = "Mrs. ". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
}else{
    $name = "". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
}
$card_res = pg_fetch_all(pg_query($db_connection,"select * from card_info as C, transaction_info as T where C.user_id = $user_id and T.card_id = C.card_id"));
$id_mapping = array();
for ($i=0; $i<sizeof($card_res); $i++)
{
    array_push($id_mapping,$card_res[$i]["card_id"]);
}
$id_mapping = array_unique($id_mapping);

$summary = array();
for ($i=0; $i<sizeof($id_mapping); $i++)
{
    for ($j=0; $j<sizeof($card_res); $j++){
        if($card_res[$j]['card_id'] == $id_mapping[$i]){
            $tmp = $card_res[$j];
            array_push($summary,array("type"=>$tmp['card_type'],"number"=>$tmp['card_number'],"balance"=>0,"id"=>$tmp['card_id']));
        }
    }
}

for ($j=0; $j<sizeof($card_res); $j++){
    $tmp = $card_res[$j];
    $index = array_search($tmp['card_id'],$id_mapping);
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
?>