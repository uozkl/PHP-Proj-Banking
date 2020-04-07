<?php
require('db_connect.php');
$id = $_COOKIE['this_card_id'];
$query = "Delete from card_info where card_id=$id";
pg_query($db_connection, $query);
$query = "Delete from transaction_info where card_id=$id";
pg_query($db_connection, $query);
echo "<script type='text/javascript'>alert('Record Deleted')</script>";
echo "<script> window.location.href = 'Main.php' </script>";