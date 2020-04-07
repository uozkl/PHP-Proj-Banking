<?php
require('db_fetch.php');
# Bool values for Options in the form
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
    <!-- The top UI component that displays a welcome message and the MY ACCOUNT link. -->
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
    <!-- Main body -->
    <div class="container">
        <br>
        <section>
            <h2>My Account</h2>
            <caption class="accessible">Personal information</caption>
        </section>
        <hr>
        <!-- General info edit -->
        <div class="default-form-area">
            <form id="contact-form" name="contact_form" class="default-form" method="post" action ="account_update.php" novalidate="novalidate">
                <div class="row clearfix">
                    <!-- First Name -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <h3>First Name</h3>
                            <input type="text" name="fname" class="form-control" value="<?php echo $account_res[0]['user_fname']?>"
                                placeholder="First name" required="" aria-required="true">
                        </div>
                    </div>
                    <!-- Last Name -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <h3>Last Name</h3>
                            <input type="text" name="lname" class="form-control" value="<?php echo $account_res[0]['user_lname']?>"
                                placeholder="Last name" required="" aria-required="true">
                        </div>
                    </div>
                    <!-- Gendder -->
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
                    <!-- Telephone -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <h3>Telephone</h3>
                            <input type="text" name="tel" class="form-control" value="<?php echo $account_res[0]['user_tel']?>">
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <H3>Address</H3>
                            <input type="text" name="addr" class="form-control" value="<?php echo $account_res[0]['user_address']?>"
                                placeholder="0.0">
                        </div>
                    </div>
                    <!-- Email -->
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
        <!-- Card info -->
        <section>
            <table>
                <tr>
                    <td><h2>My Cards</h2></td>
                    <td style="width:1000px;text-align:right">
                    <a href="Card_Edit.php?card=NEW" class="thm-btn">add</a></td>
                </tr>
            </table>
            <caption class="accessible">Card link to my account</caption>
        </section>
        <hr>
        <table class="table">
            <tbody>
                <tr class="accessible">
                    <th scope="col">Card Name</th>
                    <th scope="col">Balance</th>
                </tr>
                <tr>
                    <!-- Build a list to display all the cards -->
                    <?php
                                for ($i=0; $i<sizeof($summary); $i++)
                                {
                                    
                                        echo '                            
                                        <tr>
                                        <th scope="row">
                                            <a href="Detail.php?card='.$summary[$i]['id'] .'">
                                                '.$summary[$i]['name'].'</span></a>
                                            <br>
                                            <span> '. $summary[$i]['number'].' </span>
                                        </th>
                                        <td>
                                            <ul>
                                                <li> <span class=""> $'. $summary[$i]['balance']. ' </span> </li>
                                            </ul>
                                        </td>
                                    </tr>';
                                    
                                }
                            ?>
                </tr>
            </tbody>
        </table>

    </div>
    <!-- Footer, copyright, etc -->
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
</html>