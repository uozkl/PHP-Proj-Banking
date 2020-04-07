<?php
require('db_fetch.php');
$is_male = $account_res[0]['user_gender']=="Male";
$is_female = $account_res[0]['user_gender']=="Female";
$is_others = $account_res[0]['user_gender']=="Others";
?>
<html>

<head>
    <title>My account</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <header class="top-bar">
        <div class="container">
            <div class="clearfix">
                <div class="col-left float_left">
                    <ul class="top-bar-info">
                        <li>
                            <h3>Good morning </h3>
                        </li>
                        <li><?php echo $name?></li>
                    </ul>
                </div>
                <div class="col-right float_right">
                    <div class="link">
                        <a href="Account.php" class="thm-btn">My account</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="theme_menu stricky slideIn animated">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="main-logo">
                        <a href="Main.php"><img src="image/logo_small.PNG" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <br>
        <section>
            <h2>My Account</h2>
            <caption class="accessible">Personal information</caption>
        </section>
        <hr>
        <div class="default-form-area">
            <form id="contact-form" name="contact_form" class="default-form" method="post" action ="account_update.php" novalidate="novalidate">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group">
                            <h3>First Name</h3>
                            <input type="text" name="fname" class="form-control" value="<?php echo $account_res[0]['user_fname']?>"
                                placeholder="First name" required="" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <h3>Last Name</h3>
                            <input type="text" name="lname" class="form-control" value="<?php echo $account_res[0]['user_lname']?>"
                                placeholder="Last name" required="" aria-required="true">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <h3>Gender</h3>
                            <select name="gender" value = "Female">
                                <option value="Male" <?php if($is_male){echo "selected";}?>>Male</option>
                                <option value="Female" <?php if($is_female){echo "selected";}?>>Female</option>
                                <option value="Others" <?php if($is_others){echo "selected";}?>>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <h3>Telephone</h3>
                            <input type="text" name="tel" class="form-control" value="<?php echo $account_res[0]['user_tel']?>">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <H3>Address</H3>
                            <input type="text" name="addr" class="form-control" value="<?php echo $account_res[0]['user_address']?>"
                                placeholder="0.0">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <h3>Email</h3>
                            <input type="email" name="email" class="form-control" value="<?php echo $account_res[0]['user_email']?>"
                                placeholder="Email Address">
                        </div>
                    </div>

                </div>
                <button class="thm-btn2" type="submit">Save</button>
            </form>
        </div>
        <section>
            <h2>My Cards</h2>
            <caption class="accessible">Card link to my account</caption>
        </section>
        <hr>
        <table class="table">
            <tbody>
                <tr class="accessible">
                    <th scope="col">Account Name</th>
                    <th scope="col">Institution</th>
                </tr>
                <tr>
                    <th scope="row">
                        <a href="Detail.php">
                            Credit card 1</span></a>
                        <br>
                        <span> Visa 4444******** 9999 </span>
                    </th>
                    <td>
                        <ul>
                            <li> <span class=""> Bank of XXXX </span> </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <a href="Detail.php">
                            Credit card 2</span></a>
                        <br>
                        <span> Visa 4444******** 9999 </span>
                    </th>
                    <td>
                        <ul>
                            <li> <span class=""> XXX Bank </span> </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <a href="Detail.php">
                            Credit card 3</span></a>
                        <br>
                        <span> Visa 4444******** 9999 </span>
                    </th>
                    <td>
                        <ul>
                            <li> <span class=""> YYY Bank </span> </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <a href="Detail.php">
                            Credit card 4</span></a>
                        <br>
                        <span> Visa 4444******** 9999 </span>
                    </th>
                    <td>
                        <ul>
                            <li> <span class=""> Bank of YYY </span> </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                <a href="Main.php" onclick="alert('Change Saved')" class="thm-btn2">Save</a>
                <button class="thm-btn2" onclick="btn_exit()">Cancel</button>
            </div>
        </div>
    </div>
    <section class="footer-bottom">
        <div class="container">
            <div class="pull-left copy-text">
                <p>Copyright © 20XX. Some Company name All rights reserved.</p>
            </div>
            <div class="pull-right get-text">
                <ul>
                    <li><a href="#" onclick="alert('Work in progress')">Support |  </a></li>
                    <li><a href="#" onclick="alert('Work in progress')">Privacy &amp; Policy |</a></li>
                    <li><a href="#" onclick="alert('Work in progress')"> Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    </section>
</body>
<script>
    function btn_exit() {
        var r = confirm("Do you really want to cancel your changes?")
        if (r == true) {
            window.event.returnValue = false;
            window.location.href = "Detail.php";
        }
    }
</script>
</html>