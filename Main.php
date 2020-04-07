<?php
require('db_fetch.php');
?>
<html>

<head>
    <title>Main page</title>

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
        <div>
            <section>
                <h2>Budget overview</h2>
                <caption class="accessible">General view of all your accounts</caption>
            </section>
            <br>
            <br>
            <div>
                </section>
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Credit Cards </h3>
                    </div>
                    <table class="table">
                        <caption class="accessible">Your credit card accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
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
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Savings </h3>
                    </div>
                    <table class="table">
                        <caption class="accessible">Your credit card accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
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
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Cash </h3>
                    </div>
                    <table class="table">
                        <caption class="accessible">Your credit card accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
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
                <section id="creditCards">
                    <div class="accTableHeader">
                        <h3> Loan </h3>
                    </div>
                    <table class="table">
                        <caption class="accessible">Your credit card accounts</caption>
                        <tbody>
                            <tr class="accessible">
                                <th scope="col">Account Name</th>
                                <th scope="col">Balance</th>
                            </tr>
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