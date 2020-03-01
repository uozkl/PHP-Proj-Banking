<?php
   $host        = "host=192.168.0.120";
   $port        = "port=5432";
   $dbname      = "dbname=web_proj";
   $credentials = "user=user password=user";
   $db_connection = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db_connection){
      echo "Error : Unable to open database\n";
   }
?>