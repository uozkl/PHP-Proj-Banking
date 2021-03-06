<?php
// DB connection check.
require('db_connect.php');
// Gets the user_id so we know which user it is.
$user_id = $_COOKIE['this_id'];
// Gets datas from tables (account, card_info) in DB.
$account_res = pg_fetch_all(pg_query($db_connection, "select * from account where user_id= $user_id"));
$card_info_res = pg_fetch_all(pg_query($db_connection, "select * from card_info where user_id= $user_id"));
if ($card_info_res=="") {$card_info_res=array();}


$name = '';
// Determines which title to use base on gender.
if ($account_res[0]['user_gender']=='Male') {
    $name = "Mr. ". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
} elseif ($account_res[0]['user_gender']=='Female') {
    $name = "Mrs. ". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
} else {
    $name = "". $account_res[0]['user_fname'].' '. $account_res[0]['user_lname'];
}

// Cards.
$card_res = pg_fetch_all(pg_query($db_connection, "select * from card_info as C, transaction_info as T where C.user_id = $user_id and T.card_id = C.card_id"));
if ($card_res=="") {$card_res=array();}

$summary = array();
$mapping = array();

// Fills the array with card info.
for ($i=0; $i<sizeof($card_info_res); $i++) {
    array_push($summary, array("type"=>$card_info_res[$i]['card_type'],"number"=>$card_info_res[$i]['card_number'],"balance"=>0,"id"=>$card_info_res[$i]['card_id'],"name"=>$card_info_res[$i]['card_institution']));
    array_push($mapping, $card_info_res[$i]['card_id']);
}

// Calculates the current balance base on inflow and outlfow.
for ($j=0; $j<sizeof($card_res); $j++) {
    $tmp = $card_res[$j];
    $index = array_search($tmp['card_id'], $mapping);
    $summary[$index]["balance"] = $summary[$index]["balance"]+intval($tmp['transaction_inflow'])-intval($tmp['transaction_outflow']);
}

$credit_total = 0;
$savings_total = 0;
$cash_total = 0;
$loan_total = 0;

// Calculates the total balance for each type of cards (credit, savings, cash, loan).
for ($i=0; $i<sizeof($summary); $i++) {
    $amount = $summary[$i]['balance'];
    if ($summary[$i]['type']=='Credit') {
        $credit_total = $credit_total+$amount;
    }
    if ($summary[$i]['type']=='Savings') {
        $savings_total = $savings_total+$amount;
    }
    if ($summary[$i]['type']=='Cash') {
        $cash_total = $cash_total+$amount;
    }
    if ($summary[$i]['type']=='Loan') {
        $loan_total = $loan_total+$amount;
    }
}
