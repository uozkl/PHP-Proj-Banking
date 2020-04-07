<?php
require('db_fetch.php');
// Gets the transaction ID so we know which transacton it is.
$this_trans_id = $_GET['trans'];
if ($this_trans_id=="NEW") {
    $this_trans_id=0;
}
// Sets cookie.
setcookie('this_tran_id', $this_trans_id);
// Gets data for this transaction from DB.
$tran_info = pg_fetch_all(pg_query($db_connection, "select * from transaction_info where transaction_id= $this_trans_id"))[0];

$format_date = substr($tran_info['transaction_date'], 0, 4).'-'.substr($tran_info['transaction_date'], 4, 2).'-'.substr($tran_info['transaction_date'], 6, 2);

?>
<html>
<!-- This is the page where you can edit each transaction. -->
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
    <section class="contact_us sec-padd-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <br>
                        <h3>Edit your transition record</h3>
                    </div>
                    <div class="default-form-area">
                        <!-- Form for submition. -->
                        <form id="contact-form" name="contact_form" class="default-form" action="edit_edit.php" method="post"
                            novalidate="novalidate">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <!-- Date of transaction. -->
                                    <div class="form-group">
                                        <h3>Transition Date</h3>
                                        <input type="date" name="trans_date" class="form-control" value="<?php echo $format_date?>"
                                            placeholder="Transition Date" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!-- Name of transaction. -->
                                    <div class="form-group">
                                        <h3>Transition Name</h3>
                                        <input type="text" name="trans_name" class="form-control" value="<?php echo $tran_info['transaction_name']?>"
                                            placeholder="Name of transaction">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!-- Type of transaction. -->
                                    <div class="form-group">
                                        <h3>Transition Type</h3>
                                        <input type="text" name="trans_type" class="form-control" value="<?php echo $tran_info['transaction_type']?>"
                                            placeholder="Type of transaction">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!-- Source or destination of transaction. -->
                                    <div class="form-group">
                                        <h3>Source/Destination</h3>
                                        <input type="text" name="source_des" class="form-control" value="<?php echo $tran_info['transaction_dest']?>"
                                            placeholder="To/From ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!-- In flow of transaction. -->
                                    <div class="form-group">
                                        <h3>In Flow</h3>
                                        <input type="number" name="in_flow" class="form-control" value="<?php echo $tran_info['transaction_inflow']?>"
                                            placeholder="0.0">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <!-- Out flow of transaction. -->
                                    <div class="form-group">
                                        <h3>Out Flow</h3>
                                        <input type="number" name="out_flow" class="form-control" value="<?php echo $tran_info['transaction_outflow']?>"
                                            placeholder="0.0">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- Note of transaction. -->
                                    <div class="form-group">
                                        <H3>Note</H3>
                                        <textarea name="form_message" class="form-control textarea required"
                                            placeholder="Your Message...." aria-required="true"><?php echo $tran_info['transaction_note']?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control"
                                            type="hidden" value="">
                                        <!-- Save button -->
                                        <button class="thm-btn2" type="submit">Save</button>
                                        <!-- Cancel button -->
                                        <button class="thm-btn2" onclick="btn_exit()">Cancel</button>
                                        <!-- Delete button -->
                                        <?php if ($this_trans_id!=0) {echo '<button class="thm-btndel" onclick="btn_del()">Delete</button>';}?>
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
                    <li><a href="#" onclick="alert('Work in progress')">Support | </a></li>
                    <li><a href="#" onclick="alert('Work in progress')">Privacy &amp; Policy |</a></li>
                    <li><a href="#" onclick="alert('Work in progress')"> Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    </section>
</body>
<script>
    // Function for cancel button.
    function btn_exit() {
        var r = confirm("Do you really want to cancel your changes?")
        if (r == true) {
            window.event.returnValue = false;
            window.location.href = "Detail.php";
        }
    }
    // Function for delete button.
    function btn_del() {
        var r = confirm("Do you really want to delete this record?")
        if (r == true) {
            window.event.returnValue = false;
            window.location.href = "edit_del.php";
        }
    }
</script>

</html>