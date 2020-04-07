<?php
require('db_fetch.php');
$this_trans_id = $_GET['trans'];
if ($this_trans_id=="NEW") {
    $this_trans_id=0;
}
setcookie('this_tran_id', $this_trans_id);
$tran_info = pg_fetch_all(pg_query($db_connection, "select * from transaction_info where transaction_id= $this_trans_id"))[0];
//print_r($tran_info);
$format_date = substr($tran_info['transaction_date'], 0, 4).'-'.substr($tran_info['transaction_date'], 4, 2).'-'.substr($tran_info['transaction_date'], 6, 2);

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
                        <h3>Edit your transition record</h3>
                    </div>
                    <div class="default-form-area">
                        <form id="contact-form" name="contact_form" class="default-form" action="edit_edit.php" method="post"
                            novalidate="novalidate">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <div class="form-group">
                                        <h3>Transition Date</h3>
                                        <input type="date" name="trans_date" class="form-control" value="<?php echo $format_date?>"
                                            placeholder="Transition Date" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>Transition Name</h3>
                                        <input type="text" name="trans_name" class="form-control" value="<?php echo $tran_info['transaction_name']?>"
                                            placeholder="Name of transaction">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>Transition Type</h3>
                                        <input type="text" name="trans_type" class="form-control" value="<?php echo $tran_info['transaction_type']?>"
                                            placeholder="Type of transaction">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>Source/Destination</h3>
                                        <input type="text" name="source_des" class="form-control" value="<?php echo $tran_info['transaction_dest']?>"
                                            placeholder="To/From ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>In Flow</h3>
                                        <input type="number" name="in_flow" class="form-control" value="<?php echo $tran_info['transaction_inflow']?>"
                                            placeholder="0.0">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h3>Out Flow</h3>
                                        <input type="number" name="out_flow" class="form-control" value="<?php echo $tran_info['transaction_outflow']?>"
                                            placeholder="0.0">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
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
                                        <button class="thm-btn2" type="submit">Save</button>
                                        <button class="thm-btn2" onclick="btn_exit()">Cancel</button>
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
            window.location.href = "Detail.php";
        }
    }
    function btn_del() {
        var r = confirm("Do you really want to delete this record?")
        if (r == true) {
            window.event.returnValue = false;
            window.location.href = "edit_del.php";
        }
    }
</script>

</html>