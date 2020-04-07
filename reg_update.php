<?php  
require('db_connect.php');
	
// Assigning POST values to variables.
$username = $_POST['uName'];
$password = $_POST['pWord'];
$firstname = $_POST['fName'];
$lastname = $_POST['lName'];
$gender = $_POST['gender'];
$telephone = $_POST['tlPhone'];
$address = $_POST['address'];
$email = $_POST['email'];

$max_id = pg_fetch_all(pg_query($db_connection, "SELECT MAX(user_id) FROM account"))[0]['max'];
$result = (string)((int)$max_id+1);

$query = "INSERT INTO account(user_id, user_name, user_passwd, user_fname, user_lname, user_gender, user_tel, user_address, user_email) VALUES ('$result', '$username', '$password', '$firstname', '$lastname', '$gender', '$telephone', '$address', '$email')";

if (pg_query($db_connection, $query)){
	echo "<script type='text/javascript'>alert('Successful')</script>";
	echo "<script> window.location.href = 'Login_Page.php' </script>";
} else{
	echo "ERROR: Could not able to execute $sql. " . pg_error($db_connection);
}


?>