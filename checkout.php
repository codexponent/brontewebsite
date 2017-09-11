<?php
    session_start();
        $username = 'bronte';
    	$password = 'bronte';
        $connection_string = 'localhost/xe';
        $connection = oci_connect($username, $password, $connection_string);
            if (!$connection){
                echo 'Connection failed';
            }

            $total = $_GET['total']
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Bronte Assortment</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- load MUI -->
        <link href="//cdn.muicss.com/mui-0.9.16/css/mui.min.css" rel="stylesheet" type="text/css" />
        <script src="//cdn.muicss.com/mui-0.9.16/js/mui.min.js"></script>
    </head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <style>
    .demo-layout-transparent {
        background: url('../assets/demos/transparent.jpg') center / cover;
        }
        .demo-layout-transparent .mdl-layout__header,
        .demo-layout-transparent .mdl-layout__drawer-button {
            /* This background is dark, so we set text to white. Use 87% black instead if
            your background is light. */
        color: white;
        background-color: black;
    }
    body {
    font-family: 'Sofia';font-size: 22px;
    background-color: Teal;
}
    </style>

    <body>
        <div>
            <div class="demo-layout-transparent mdl-layout mdl-js-layout">
                <header class="mdl-layout__header mdl-layout__header--transparent">
                    <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title"><img src="img/logo.png" height="55" width="125" /></span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation -->
                    <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="index.html">Home</a>
                        <a class="mdl-navigation__link" href="products.php">Products</a>
                        <a class="mdl-navigation__link" href="customer.php">Customer</a>
                        <a class="mdl-navigation__link" href="cart.php">Cart</a>
                        <a class="mdl-navigation__link" href="#">About Us</a>
                    </nav>
                    </div>
                </header>
                <div class="mdl-layout__drawer">
                    <span class="mdl-layout-title">Bronte Assortment</span>
                    <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="index.html">Home</a>
                        <a class="mdl-navigation__link" href="products.php">Products</a>
                        <a class="mdl-navigation__link" href="customer.php">Customer</a>
                        <a class="mdl-navigation__link" href="cart.php">Cart</a>
                        <a class="mdl-navigation__link" href="#">About Us</a>
                    </nav>
                </div>
            </div>
        <br /><br /><br /><br /><br />
        
        <h2 style="text-align: center; font-family: Sofia" >Checkout Through Our Various Portals</h2>



        <div style="text-align: center" >
                <br />
                <br />
                <br />
				
                <div class="mdl-card mdl-shadow--4dp" style="display: table; margin: 0 auto; text-align: center;" >
                    <div class="mdl-card__media"><img src="http://4.bp.blogspot.com/-Ne-ZjCGSBqk/Uk6hYhV8a7I/AAAAAAAAg7s/fy1z0Y3Ze2w/s1600/paypal_logo.jpg" width="310" height="157" border="0"
                        alt="" style="padding:10px;">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Pay with Paypal</p>
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                        <!-- Identify your business so that you can collect the payments. -->
                        <input type="hidden" name="business" value="bronte-facilitator-1@hotmail.com">

                        <!-- Specify a Buy Now button. -->
                        <input type="hidden" name="cmd" value="_xclick">

                        <!-- Specify details about the item that buyers will purchase. -->
                        <input type="hidden" name="item_name" value="Products">
                        <input type="hidden" name="amount" value="<?php echo $total; ?>">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type='hidden' name='cancel_return' value='http://localhost/bronte/receipt/receipt_failure.php'>
                        <input type='hidden' name='return' value='http://localhost/bronte/receipt/receipt_success.php'>

                        <!-- Display the payment button. -->

                        <button name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                            Button
                        </button>

                        <!--<input type="image" name="submit" border="0"
                        src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
                        alt="Buy Now">-->
                        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                    </form>

                    </div>
                </div>








            </div>


        



























<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br />



    <!--//Footer-->
        <footer class="mdl-mega-footer">
        <div class="mdl-mega-footer__middle-section">

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">Features</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Partners</a></li>
                <li><a href="#">Updates</a></li>
            </ul>
            </div>

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">Details</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">Specs</a></li>
                <li><a href="#">Tools</a></li>
                <li><a href="#">Resources</a></li>
            </ul>
            </div>

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">Technology</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">How it works</a></li>
                <li><a href="#">Patterns</a></li>
                <li><a href="#">Usage</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contracts</a></li>
            </ul>
            </div>

            <div class="mdl-mega-footer__drop-down-section">
            <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
            <h1 class="mdl-mega-footer__heading">FAQ</h1>
            <ul class="mdl-mega-footer__link-list">
                <li><a href="#">Questions</a></li>
                <li><a href="#">Answers</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            </div>

        </div>

        <div class="mdl-mega-footer__bottom-section">
            <div class="mdl-logo">Title</div>
            <ul class="mdl-mega-footer__link-list">
            <li><a href="#">Help</a></li>
            <li><a href="#">Privacy & Terms</a></li>
            </ul>
        </div>

        </footer>

    </div>
    </body>
</html>
