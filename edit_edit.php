<?php  
require('db_connect.php');
	
// Assigning POST values to variables.
$date = $_POST['trans_date'];
$transition = $_POST['transition'];
$inflow = $_POST['in_flow'];
$outflow = $_POST['out_flow'];

$query = "INSERT INTO transaction_info(transaction_date, transaction_type, transaction_outflow, transaction_inflow) VALUES ('$date', '$transition', '$outflow', '$inflow')";

if (pg_query($db_connection, $query)){
	echo "<script type='text/javascript'>alert('Changes Saved')</script>";
	echo "<script> window.location.href = 'Main.html' </script>";
} else{
	echo "ERROR: Could not able to execute $sql. " . pg_error($db_connection);
}


?>