<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>{block name="title"}{/block}</title>
        {block name="head"}
            <meta name="description" content="" />
            <meta name="keywords" content="" />
            <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
            <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
            <script src="{$HELIOS}js/jquery.min.js"></script>
            <script src="{$HELIOS}js/jquery.dropotron.min.js"></script>
            <script src="{$HELIOS}js/skel.min.js"></script>
            <script src="{$HELIOS}js/skel-panels.min.js"></script>
            <script src="{$HELIOS}js/init.js"></script>

            <link rel="shortcut icon" href="{$CONTENT}images/jacphp.png" />
            <link rel="stylesheet" href="{$HELIOS}css/skel-noscript.css" type="text/css" />
            <link rel="stylesheet" href="{$HELIOS}css/style.css" type="text/css" />
            <link rel="stylesheet" href="{$HELIOS}css/style-desktop.css" type="text/css" />
            <link rel="stylesheet" href="{$HELIOS}css/style-noscript.css" type="text/css" />

            <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
        {/block}
    </head>
    {block name="header"}{/block}
    {block name="body"}{/block}
    <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Contact -->
                        <section class="contact">
                            <header>
                                <h3><a class="red" href="https://www.canadianopendataexperience.com/">Designed for <span class="codeicon" href="https://www.canadianopendataexperience.com/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> CODE</a></h3>
                            </header>
                            <p>Developped by Tyler Lauzon, Marek Philibert, and Jordan Rutty.</p>
                            <ul class="icons">
                                <li><a href="https://twitter.com/FindaCarWebsite" class="fa fa-twitter solo"><span>Twitter</span></a></li>
                                <li><a href="https://facebook.com/FindaCarWebsite" class="fa fa-facebook solo"><span>Facebook</span></a></li>
                                <!--<li><a href="#" class="fa fa-google-plus solo"><span>Google+</span></a></li>
                                <li><a href="#" class="fa fa-pinterest solo"><span>Pinterest</span></a></li>
                                <li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
                                <li><a href="#" class="fa fa-linkedin solo"><span>Linkedin</span></a></li>-->
                            </ul>
                        </section>

                        <!-- Copyright -->
                        <div class="copyright">
                            <ul class="menu">
                                <li>&copy; JAC PHP. All rights reserved.</li>
                                <li>Design: <a href="http://html5up.net/">HTML5 UP</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </body>
</html>