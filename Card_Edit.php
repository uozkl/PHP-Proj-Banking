<?php
require('db_fetch.php');
$this_card_id = $_GET['card'];
if ($this_card_id=="NEW") {
    $this_card_id=0;
}
setcookie('this_card_id', $this_card_id);
$card_info = pg_fetch_all(pg_query($db_connection, "select * from card_info where card_id= $this_card_id"))[0];
$is_credit = $card_info['card_type']=="Credit";
$is_cash = $card_info['card_type']=="Cash";
$is_saving = $card_info['card_type']=="Savings";
$is_loan = $card_info['card_type']=="Loan";

?>
<html>
 <style>
    .thm-btndel {
    position: relative;
    background: transparent;
    font-size: 14px;
    line-height: 46px;
    font-weight: 600;
    color: #ff5858;
    border: 2px solid #f4f4f4;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif;
    display: inline-block;
    padding: 0 38px;
    transition: all .5s cubic-bezier(0.4, 0, 1, 1);
  }
  .thm-btndel:hover {
    background: #ff5858;
    border-color: #ff5858;
    color: #fff;
    transition: all .5s cubic-bezier(0.4, 0, 1, 1);
  }
  </style>
<head>
    <title>Edit item</title>
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
    <section class="contact_us sec-padd-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <br>
                        <h3>Edit your card details</h3>
                    </div>
                    <div class="default-form-area">
                        <form id="contact-form" name="contact_form" class="default-form" action="card_update.php" method="post"
                            novalidate="novalidate">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>Card Institution</h3>
                                        <input type="text" name="card_name" class="form-control" value="<?php echo $card_info['card_institution']?>"
                                            placeholder="Name of transaction" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>Card Number</h3>
                                        <input type="text" name="card_number" class="form-control" value="<?php echo $card_info['card_number']?>"
                                            placeholder="Type of transaction" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>Type of Card</h3>
                                        <select name="card_type" value = "Female">
                                            <option value="Credit" <?php if($is_credit){echo "selected";}?>>Credit</option>
                                            <option value="Cash" <?php if($is_cash){echo "selected";}?>>Cash</option>
                                            <option value="Savings" <?php if($is_saving){echo "selected";}?>>Savings</option>
                                            <option value="Loan" <?php if($is_loan){echo "selected";}?>>Loan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control"
                                            type="hidden" value="">
                                        <button class="thm-btn2" type="submit">Save</button>
                                        <button class="thm-btn2" type="button" onclick="btn_exit()">Cancel</button>
                                        <?php if ($this_card_id!=0) {echo '<button class="thm-btndel" type="button" onclick="btn_del()">Delete</button>';}?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="home-google-map">
                        <div class="google-map" id="contact-google-map" data-map-lat="40.938541"
                            data-map-lng="-73.904893" data-icon-path="images/logo/map-marker.png"
                            data-map-title="Chester" data-map-zoom="11">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-bottom">
        <div class="container">
            <div class="pull-left copy-text">
                <p>Copyright © 20XX. Some Company name All rights reserved.</p>
            </div>
            <div class="pull-right get-text">
                <ul>
                    <li><a href="#" onclick="alert('Work in progress')">Support | </a></li>
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
            window.location.href = "<?php if ($this_card_id==0) {echo 'Account.php';}else{echo 'Detail.php?card='.$this_card_id;}?>";
        }
    }
    function btn_del() {
        var r = confirm("Do you really want to delete this record? This will also delete all transactions under this card!")
        if (r == true) {
            window.event.returnValue = false;
            window.location.href = "card_del.php";
        }
    }
</script>

</html>