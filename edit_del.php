<?php
// Transaction deletion.

require('db_connect.php');
$id = $_COOKIE['this_tran_id'];

// Prepares the query.
$query = "Delete from transaction_info where transaction_id=$id";
// Query execution.
pg_query($db_connection, $query);
echo "<script type='text/javascript'>alert('Record Deleted')</script>";
$this_card_id = $_COOKIE['this_card_id'];
echo "<script> window.location.href = 'Detail.php?card=".strval($this_card_id)."' </script>";