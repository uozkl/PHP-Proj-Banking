<?php
require('db_fetch.php');
// Gets the card ID so we know which card it is.
$this_card_id = !empty($_GET['card']) ? $_GET['card'] : $_COOKIE['this_card_id'];;
setcookie('this_card_id', $this_card_id);
// Variable initialization.
$this_trans = array();
$total_in = 0;
$total_out = 0;
// Loops over all transactions of the card and calculates total inflow/outlfow.
for ($i=0; $i<sizeof($card_res); $i++)
{
    if($card_res[$i]["card_id"]==$this_card_id){
        array_push($this_trans,$card_res[$i]);
        $total_in=$total_in+$card_res[$i]['transaction_inflow'];
        $total_out=$total_out+$card_res[$i]['transaction_outflow'];
    }
}
$card_index = array_search($this_card_id,$mapping);
$card_number = $summary[$card_index]['number'];
$card_name = $summary[$card_index]['name'];
?>
<html>
<!-- Card detail -->
<head>
    <title>Detailed list</title>
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
        <section>
        <table>
                <tr>
                    <td><h2><?php echo $card_name?></h2></td>
                    <td style="width:800px;text-align:right">
                    <a href="Card_Edit.php?card= <?php echo $this_card_id ?>" class="thm-btn">edit</a></td>
                </tr>
            </table>
            <caption class="accessible"><?php echo $card_number?></caption>
        </section>
        <hr>
        <div>
            <!-- Page title -->
            </section>
            <h3>Current Balance</h3>
            <h4>$<?php echo $total_in-$total_out?></h4>
            </section>
            <br>
            <!-- List of all the transactions for this card. -->
            <section id="transactionList">
                <div class="accTableHeader">
                    <h3> Transactions </h3>
                </div>
                <table class="table">
                    <caption class="accessible">Your transaction history</caption>
                    <tbody>
                        <tr class="accessible">
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">In Flow</th>
                            <th scope="col">Out Flow</th>

                        </tr>
                            <!-- 
                                Fetch data from DB to display card info. 
                                Variables refer to db_fetch.php
                            -->
                            <?php
                                for ($i=0; $i<sizeof($this_trans); $i++)
                                {
                                    $tran = $this_trans[$i];
                                    echo '                            
                                        <tr>
                                        <th scope="row">
                                            <span><a href="Edit.php?trans='.$tran['transaction_id'] .'"> '.$tran['transaction_name'].' </a></span>
                                        </th>
                                        <td>
                                            <ul><li> <span class=""> '.substr($tran['transaction_date'],0,4).'/'.substr($tran['transaction_date'],4,2).'/'.substr($tran['transaction_date'],6,2).' </span> </li></ul>
                                        </td>
                                        <td>
                                            <ul><li> <span class=""> ';
                                    $out_msg = '$0';
                                    $in_msg = '$0';
                                    if($tran['transaction_outflow']>0){
                                        $out_msg = '$'.$tran['transaction_outflow'];
                                    }
                                    if($tran['transaction_inflow']>0){
                                        $in_msg = '$'.$tran['transaction_inflow'];
                                    }
                                    
                                    echo $in_msg.' </span> </li></ul>
                                        </td>
                                        <td>
                                            <ul><li> <span class=""> '.$out_msg.' </span> </li></ul>
                                        </td>
                                        </tr>';
                                }
                            ?>

                        <!-- The total balance for all the transactions. -->          
                        <tr class="totalRow">
                            <td><a href="Edit.php?trans=NEW" class="thm-btn">add</a></td>
                            <td></td>
                            <!-- Total inflow -->
                            <td><span class="total">Total:</span>
                                <ul> <span>$<?php echo $total_in?></span> </ul>
                            </td>
                            <!-- Total outflow -->
                            <td><span class="total">Total:</span>
                                <ul> <span>$<?php echo $total_out?></span> </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
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