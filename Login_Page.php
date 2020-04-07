<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html>
<!-- Login page -->
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

      span.rgs {
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
    <!-- Back ground image; Source is folder /Image -->
    <div class = "bgimg">
      <!-- The light blue container that contains the login form. -->
      <div class="container" style="background-color:#f5f9f7">
        <h2>LOGIN</h2>
        <!-- Login form -->
        <form method="post">
        <!-- Username label and input box. -->
        <label for="uName"><b>Username</b></label>
          <br>
          <input type="text" placeholder="Enter Username" name="uName" value = "" required>
        <br>
        <!-- Password label and input box. -->
          <label for="pWord"><b>Password</b></label>
          <br>
          <input type="password" placeholder="Enter Password" name="pWord" required>
        <br>
        <!-- Login button -->
        <input type="submit" value="Login">
        <!-- Register link -->
        <span class="rgs"> <a href="Register.php">Need an account?</a></span>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
    if (isset($_POST['uName']) and isset($_POST['pWord'])) {
    // Assigning POST values to variables.
        $username = $_POST['uName'];
        $password = $_POST['pWord'];
    
        // CHECK FOR THE RECORD FROM TABLE
        $query = "SELECT * FROM account WHERE user_name='$username' and user_passwd='$password'";
    
        $result = pg_query($db_connection, $query) or die(pg_error($db_connection));
        $count = pg_num_rows($result);
    
        // Verifies login credentials, if true:
        if ($count == 1) {
        
            // Shows login successful and sets cookies.
            echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
            setcookie('this_id', pg_fetch_all($result)[0]['user_id']);
        
            // Page redirection.
            echo "<script> window.location.href = 'Main.php' </script>";
        } else { // If false:
            // Displays login fail message.
            echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
            // Stay on this page.
            echo "<script> window.location.href = 'Login_Page.php' </script>";
        }
    }
    ?>
