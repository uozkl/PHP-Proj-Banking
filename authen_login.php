<?php  
require('db_connect.php');

if (isset($_POST['uName']) and isset($_POST['pWord'])){
	
// Assigning POST values to variables.
$username = $_POST['uName'];
$password = $_POST['pWord'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM account WHERE user_name='$username' and user_passwd='$password'";
 
$result = pg_query($db_connection, $query) or die(pg_error($db_connection));
$count = pg_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
setcookie('this_id', pg_fetch_all($result)['user_id']);

echo "<script> window.location.href = 'Main.php' </script>";


}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
echo "<script> window.location.href = 'Login Page.html' </script>";
//echo "Invalid Login Credentials";
}
}
?>