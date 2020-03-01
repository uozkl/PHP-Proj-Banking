<?php  
require('db_connect.php');
// Assigning POST values to variables.
$id = $_COOKIE['this_id'];
$date = $_POST['trans_date'];
$inflow = $_POST['in_flow'];
$outflow = $_POST['out_flow'];
$type = $_POST['trans_type'];

$query = "UPDATE transaction_info SET transaction_type='$type',transaction_outflow='$outflow',transaction_inflow='$inflow' where transaction_id=$id";

pg_query($db_connection, $query);
echo "<script type='text/javascript'>alert('Successful')</script>";
echo "<script> window.location.href = 'Main.php' </script>";
?>