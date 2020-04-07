<?php
require('db_fetch.php');
?>
<html>
<!-- Main page -->
<head>
    <title>Main page</title>

    <!-- CSS stylesheet -->
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
                        <!-- Page redirection -->
                        <a href="Account.php" class="thm-btn">My account</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- The section that diplays the logo under the top bar. -->
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
    <!-- The container that contains the main content of the page. -->
    <div class="container">
        <br>
        <div>
            <!-- Page title -->
            <section>
                <h2>Budget overview</h2>
                <caption class="accessible">General view of all your accounts</caption>
            </section>
            <br>
            <br>
            <div>
                </section>
                <!-- Credit cards section; displays all cards. -->
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Credit Cards </h3>
                    </div>
                    <!-- Displays all credit cards in a table. -->
                    <table class="table">
                        <caption class="accessible">Your credit card accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
                            <!-- 
                                Fetch data from DB to display card info. 
                                Variables refer to db_fetch.php
                            -->
                            <?php
                                for ($i=0; $i<sizeof($summary); $i++)
                                {
                                    if($summary[$i]['type']=='Credit'){
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
                                }
                            ?>
                            <!-- The total balance for all the credit cards. -->
                            <tr class="totalRow">
                                <td>
                                </td>
                                <td><span class="total">Total:</span>
                                    <ul> <span>$<?php echo $credit_total ?></span> </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <!-- Saving accounts; displays all accounts. -->
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Savings </h3>
                    </div>
                    <!-- Displays all saving accounts in a table. -->
                    <table class="table">
                        <caption class="accessible">Your saving accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
                            <!-- 
                                Fetch data from DB to display card info. 
                                Variables refer to db_fetch.php
                            -->
                            <?php
                                for ($i=0; $i<sizeof($summary); $i++)
                                {
                                    if($summary[$i]['type']=='Savings'){
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
                                }
                            ?>
                            <!-- The total balance for all the saving accounts. -->
                            <tr class="totalRow">
                                <td>
                                </td>
                                <td><span class="total">Total:</span>
                                    <ul> <span>$<?php echo $savings_total ?></span> </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <!-- Cash; displays all accounts. -->
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Cash </h3>
                    </div>
                    <!-- Displays all cash accounts in a table. -->
                    <table class="table">
                        <caption class="accessible">Your cash accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
                            <!-- 
                                Fetch data from DB to display account info. 
                                Variables refer to db_fetch.php
                            -->
                            <?php
                                for ($i=0; $i<sizeof($summary); $i++)
                                {
                                    if($summary[$i]['type']=='Cash'){
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
                                }
                            ?>
                            <!-- The total balance for all the cash accounts. -->
                            <tr class="totalRow">
                                <td>
                                </td>
                                <td><span class="total">Total:</span>
                                    <ul> <span>$<?php echo $cash_total ?></span> </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <!-- Loan; displays all accounts. -->
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Loan </h3>
                    </div>
                    <!-- Displays all loan accounts in a table. -->
                    <table class="table">
                        <caption class="accessible">Your loan accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
                            <!-- 
                                Fetch data from DB to display account info. 
                                Variables refer to db_fetch.php
                            -->
                            <?php
                                for ($i=0; $i<sizeof($summary); $i++)
                                {
                                    if($summary[$i]['type']=='Loan'){
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
                                }
                            ?>
                            <!-- The total balance for all the loan accounts. -->
                            <tr class="totalRow">
                                <td>
                                </td>
                                <td><span class="total">Total:</span>
                                    <ul> <span>$<?php echo $loan_total ?></span> </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                
            </div>
        </div>
    </div>
    <!-- The bottom UI section that contains copyright and other info. -->
    <section class="footer-bottom">
        <div class="container">
            <!-- Left section -->
            <div class="pull-left copy-text">
                <!-- Copyright -->
                <p>Copyright © 20XX. Some Company name All rights reserved.</p>
            </div>
            <!-- Right section -->
            <div class="pull-right get-text">
                <!-- Support, privacy, terms -->
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