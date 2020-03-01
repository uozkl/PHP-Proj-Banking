<?php  
require('db_connect.php');
	
// Assigning POST values to variables.
$id = $GET['trans'];
$date = $_POST['trans_date'];
$transition = $_POST['transition'];
$inflow = $_POST['in_flow'];
$outflow = $_POST['out_flow'];

$query = "INSERT INTO transaction_info(transaction_id, transaction_date, transaction_type, transaction_outflow, transaction_inflow) VALUES ($id, '$date', '$transition', '$outflow', '$inflow')";

pg_query($db_connection, $query);

?>