<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body, html {
        height: 100%;
        margin: 0;
        font-family: Cambay;
      }

      form {}

      .bgimg {
        background-image: url('Image/desk_2.jpg');
        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
      }

      h2 {
        color: #006b8a
      }

      ::placeholder {
        color: #006b8a
      }

      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 6px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
      }

      select {
        width: 100%;
        padding: 12px 20px;
        margin: 6px 0;
        display: inline-block;
        border: 2px solid #ccc;
        box-sizing: border-box;
      }

      input[type=submit] {
        background-color: #48c7ec;
        color: white;
        padding: 13px 21px;
        margin: 8px 0;
        border: none;
        border-radius: 34px;
        cursor: pointer;
        min-width: 150px;
        font-size: 18px;
      }

      input[type=submit]:hover {
        background-color: black;
        color: #48c7ec;
      }

      .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 55px;
        outline: 13px solid #0087ad;
      }

      span.psw {
        float: right;
        padding-top: 21px;
        padding-left: 21px;
      }

      a {
        color: #006b8a
      }
    </style>
  </head>

  <body>
    <div class = "bgimg">
      <div class="container" style="background-color:#f5f9f7">
        <h2>Register</h2>
        <form action="#" method="post">
          <label for="uName"><b>Username</b></label>
          <br>
          <input type="text" placeholder="Enter Username" name="uName" id="uName" required>
          <br>
          <label for="pWord"><b>Password</b></label>
          <br>
          <input type="password" placeholder="Enter Password" name="pWord" id="pWord" required>
          <br>
          <label for="fName"><b>First Name</b></label>
          <br>
          <input type="text" placeholder="Enter First Name" name="fName" id="fName" required>
          <br>
          <label for="lName"><b>Last Name</b></label>
          <br>
          <input type="text" placeholder="Enter Last Name" name="lName" id="lName" required>
          <br>
          <label for="gender"><b>Gender</b></label>
          <br>
          <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
          </select>
          <br>
          <label for="tlPhone"><b>Tele Phone</b></label>
          <br>
          <input type="text" placeholder="Enter Phone Number" name="tlPhone" id="tlPhone" required>
          <br>
          <label for="address"><b>Address</b></label>
          <br>
          <input type="text" placeholder="Enter Adress" name="address" id="address" required>
          <br>
          <label for="email"><b>Email</b></label>
          <br>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
          <br>
          <input type="submit" value="Register">
          <span class="psw"> <a href="Login_Page.php">Return to Login</a></span>
        </form>
      </div>
    </div>
  </body>
  <script>
    function btn_login() {
          window.location.href = "Main.php";
  }
  </script>
</html>

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

$pullQuery = "select * from account";
$result = pg_query($db_connection,$pullQuery);
$result += 1;
$query = "INSERT INTO account(user_id, user_name, user_passwd, user_fname, user_lname, user_gender, user_tel, user_address, user_email) VALUES ('$result', '$username', '$password', '$firstname', '$lastname', '$gender', '$telephone', '$address', '$email')";

if (pg_query($db_connection, $query)){
	echo "<script type='text/javascript'>alert('Successful')</script>";
	echo "<script> window.location.href = 'Login_Page.php' </script>";
} else{
	echo "ERROR: Could not able to execute $sql. " . pg_error($db_connection);
}


?>