<?php
/* Attempt to connect to database */
$db_connection = pg_connect("host=192.168.0.120 dbname=web_proj user=user password=user");
 
// Check connection
if($db_connection === false){
    die("ERROR: Could not connect. " . pg_error());
}
?>