<?php
require('db_fetch.php');
// query example UPDATE account SET user_tel='10086' where user_id=1
$user_id = $_COOKIE['this_id'];
$gender = $_POST['gender'];
$query = "UPDATE account SET user_gender='$gender'";
$id = $_COOKIE['this_tran_id'];

$fname = $_POST['fname'];
if ($fname!="") {
    $query = $query.",user_fname ='$fname'";
}
$lname = $_POST['lname'];
if ($lname!="") {
    $query = $query.",user_lname ='$lname'";
}
$tel = $_POST['tel'];
if ($tel!="") {
    $query = $query.",user_tel ='$tel'";
}
$addr = $_POST['addr'];
if ($addr!="") {
    $query = $query.",user_address ='$addr'";
}
$email = $_POST['email'];
if ($email!="") {
    $query = $query.",user_email ='$email'";
}
$query = $query." where user_id=$user_id";
//print_r($query);
//$query = "UPDATE transaction_info SET transaction_type='$type',transaction_outflow='$outflow',transaction_inflow='$inflow' where transaction_id=$id";

pg_query($db_connection, $query);
echo "<script type='text/javascript'>alert('Data Saved')</script>";
echo "<script> window.location.href = 'Account.php' </script>";
