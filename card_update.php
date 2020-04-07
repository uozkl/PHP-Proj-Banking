<?php
require('db_connect.php');
# Get variables
$this_card_id = $_COOKIE['this_card_id'];
$this_user_id = $_COOKIE['this_id'];
$name = $_POST['card_name'];
$number = $_POST['card_number'];
$type = $_POST['card_type'];
# Check if a new record need to be created
$id = $_COOKIE['this_tran_id'];
if ($this_card_id=="0") {
    $max_id = pg_fetch_all(pg_query($db_connection, "SELECT MAX(card_id) FROM card_info"))[0]['max'];
    $this_card_id = (string)((int)$max_id+1);
    pg_query($db_connection, "INSERT INTO card_info VALUES ('$this_card_id')");
}
# Generate query sentence
$query = "UPDATE card_info SET user_id=$this_user_id,card_institution='$name',card_type ='$type' ,card_number ='$number'where card_id=$this_card_id";
# Send query command
pg_query($db_connection, $query);
# Success info
echo "<script type='text/javascript'>alert('Record Saved')</script>";
echo "<script> window.location.href = 'Detail.php?card=".strval($this_card_id)."' </script>";