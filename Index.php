<!DOCTYPE html>
<html>

<head>
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .bgIMG {
      background-image: url('Image/office_2.jpg');
      height: 100%;
      background-position: center;
      background-size: cover;
      position: relative;
      color: white;
      font-family: Cambay;
      font-size: 25px;
    }

    .topLeft {
      position: absolute;
      top: 0;
      left: 13px;
    }

    .bottomLeft {
      position: absolute;
      bottom: 0;
      left: 13px;
    }

    .middle {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    hr {
      width: 62%;
    }

    button {
      background-color: #35b6db;
      color: white;
      padding: 13px 21px;
      margin: 34px 0;
      border: none;
      border-radius: 34px;
      cursor: pointer;
      min-width: 135px;
      width: 15%;
      font-size: 21px;
    }

    button:hover {
      background-color: black;
      color: #48c7ec;
    }
  </style>
</head>

<body>
  <div class="bgIMG">
    <div class="middle">
      <div>
      <img src="image/logo3.PNG" style="width: 500px;">
      <hr>
      <button type="toLoginBTN" onclick="btn_login()">Login</button>
    </div>
    </div>
  </div>
</body>
<script>
  function btn_login() {
          window.location.href = "Login_Page.php";
  }
</script>
</html>