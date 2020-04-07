<?php
require('db_connect.php');
// Assigning POST values to variables.
$this_card_id = $_COOKIE['this_card_id'];

$date = date('Ymd', strtotime($_POST['trans_date']));
$name = $_POST['trans_name'];
$query = "UPDATE transaction_info SET transaction_date='$date',transaction_name='$name'";

$id = $_COOKIE['this_tran_id'];
if ($id=="0") {
    $max_id = pg_fetch_all(pg_query($db_connection, "SELECT MAX(transaction_id) FROM transaction_info"))[0]['max'];
    $id = (string)((int)$max_id+1);
    pg_query($db_connection, "INSERT INTO transaction_info VALUES ('$id')");
    $query = $query.",card_id='$this_card_id'";
}

$inflow = $_POST['in_flow'];
if ($inflow!="") {
    $query = $query.",transaction_inflow='$inflow'";
}
$outflow = $_POST['out_flow'];
if ($outflow!="") {
    $query = $query.",transaction_outflow='$outflow'";
}
$type = $_POST['trans_type'];
if ($type!="") {
    $query = $query.",transaction_type='$type'";
}
$dest = $_POST['source_des'];
if ($outflow!="") {
    $query = $query.",transaction_dest='$dest'";
}
$query = $query." where transaction_id=$id";
//print_r($query);
//$query = "UPDATE transaction_info SET transaction_type='$type',transaction_outflow='$outflow',transaction_inflow='$inflow' where transaction_id=$id";

pg_query($db_connection, $query);
echo "<script type='text/javascript'>alert('Record Saved')</script>";
echo "<script> window.location.href = 'Detail.php?card=".strval($this_card_id)."' </script>";
