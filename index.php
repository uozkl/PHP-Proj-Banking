<?php
require('db_connect.php');

$query = "select * from account";
$result = pg_query($db_connection,$query);
print_r (pg_fetch_all($result)[0]);
setcookie('this_id','1');
?>