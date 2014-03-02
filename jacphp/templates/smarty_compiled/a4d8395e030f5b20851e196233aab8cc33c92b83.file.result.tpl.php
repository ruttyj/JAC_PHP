<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:24:41
         compiled from "./templates/result.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1495734587531355ebc62ef8-62472703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4d8395e030f5b20851e196233aab8cc33c92b83' => 
    array (
      0 => './templates/result.tpl',
      1 => 1393776202,
      2 => 'file',
    ),
    'a9a02e96b49934ea73f862acb747581689774fc9' => 
    array (
      0 => './templates/_layout.tpl',
      1 => 1393777425,
      2 => 'file',
    ),
    '8913f48352ffd7a7ba3cddb8c622ed2ffad6b0ab' => 
    array (
      0 => './templates/nav.tpl',
      1 => 1393776064,
      2 => 'file',
    ),
    'e885c08653c05474bb620f231ff7d0898c4176ff' => 
    array (
      0 => './templates/head_leftbar.tpl',
      1 => 1393725966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1495734587531355ebc62ef8-62472703',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_531355ebda3c32_93630078',
  'variables' => 
  array (
    'HELIOS' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531355ebda3c32_93630078')) {function content_531355ebda3c32_93630078($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Car Picker</title>
        
            <meta name="description" content="" />
            <meta name="keywords" content="" />
            <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
            <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/jquery.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/jquery.dropotron.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/skel.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/skel-panels.min.js"></script>
            <script src="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
js/init.js"></script>

            <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
images/jacphp.png" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/skel-noscript.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/style.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/style-desktop.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HELIOS']->value;?>
css/style-noscript.css" type="text/css" />

            <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
        
    </head>
    <?php /*  Call merged included template "head_leftbar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_leftbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1495734587531355ebc62ef8-62472703');
content_53135b4967e057_44683663($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "head_leftbar.tpl" */?>
    
    <!-- Main -->
    <div class="wrapper style1">

        <div class="container">
            <div class="row">
                <div class="4u" id="sidebar">
                    <hr class="first" />
                    <section>
                        <header>
                            <h3><a href="#">Picture</a></h3>
                        </header>
                        <strong>Look for this car: </strong>
                        <center>
                            <a href="http://search.ebay.com/ws/search/SaleSearch?satitle=<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['year'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['maker'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['model'];?>
" class="button">eBay</a>
                            <a href="http://search.ebay.com/ws/search/SaleSearch?satitle=<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['year'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['maker'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['model'];?>
" class="button">eBay</a>
                        </center>
                        <center style='margin-top: 4px;'>
                            <a href="http://search.ebay.com/ws/search/SaleSearch?satitle=<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['year'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['maker'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['model'];?>
" class="button">Google</a>
                            <a href="http://search.ebay.com/ws/search/SaleSearch?satitle=<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['year'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['maker'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['model'];?>
" class="button">Google Images</a>
                        </center>
                    </section>
                </div>
                <div class="8u skel-cell-important" id="content">
                    <article id="main">
                        <header>
                            <h2><a href="#"><?php echo $_smarty_tpl->tpl_vars['res']->value[0]['year'];?>
 <?php echo $_smarty_tpl->tpl_vars['res']->value[0]['maker'];?>
 <?php echo $_smarty_tpl->tpl_vars['res']->value[0]['model'];?>
</a></h2>
                        </header>

                        <section>
                            <table>
                                <?php  $_smarty_tpl->tpl_vars['car'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['car']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['res']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['car']->key => $_smarty_tpl->tpl_vars['car']->value) {
$_smarty_tpl->tpl_vars['car']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['car']->key;
?>
                                    <tr>
                                        <th colspan='2' style='text-align:left;'><strong>Configuration <?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
: </strong></th>
                                    </tr>
                                    <tr>
                                        <th>Engine</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['engine'];?>
</td>
                                    </tr>
                                    <tr>
                                        <th>Cylinders</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['cylinders'];?>
</td>
                                    </tr>
                                    <tr>
                                        <th>Transmission</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['transmission'];?>
</td>
                                    </tr>
                                    <tr>
                                        <th>Fuel Type</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['fueltype'];?>
</td>
                                    </tr>
                                    <tr>
                                        <th>City Consumption</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['citylpkw'];?>
 L/100km</td>
                                    </tr>
                                    <tr>
                                        <th>Highway Consumption</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['hwylpkw'];?>
 L/100km</td>
                                    </tr>
                                    <tr>
                                        <th>Annual Consumption</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['annualfuel'];?>
 L</td>
                                    </tr>
                                    <tr>
                                        <th>CO2 Emission</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['car']->value['emission'];?>
 g/km</td>
                                    </tr>
                                    <tr><td colspan='2'>&nbsp;</td></tr>
                                <?php } ?>
                            </table>
                    </article>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Contact -->
                        <section class="contact">
                            <header>
                                <h3>Designed for&nbsp;&nbsp;<a href="https://www.canadianopendataexperience.com/"><img src="<?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
images/code_white.png" height="32" width="40" style="margin-bottom: -6px;" /> CODE</a></h3>
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
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:24:41
         compiled from "./templates/head_leftbar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135b4967e057_44683663')) {function content_53135b4967e057_44683663($_smarty_tpl) {?><body class="left-sidebar">

    <!-- Header -->
    <div id="header">

        <!-- Inner -->
        <div class="inner">
            <header>
                <h1><a href="#" id="logo">Find a Car</a></h1>
            </header>
        </div>

        <?php /*  Call merged included template "nav.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1495734587531355ebc62ef8-62472703');
content_53135b496825f7_49556834($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 17:24:41
         compiled from "./templates/nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53135b496825f7_49556834')) {function content_53135b496825f7_49556834($_smarty_tpl) {?><!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
index.php">Home</a></li>
        <li>
            <span>Preset Selections</span>
            <ul>
                <li><a href="#">Most fuel efficent</a></li>
                <li><a href="#">Most highway milage</a></li>
                <li><a href="#">Most city milage</a></li>
                <li>
                    <span>And a submenu &hellip;</span>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Phasellus consequat</a></li>
                        <li><a href="#">Magna phasellus</a></li>
                        <li><a href="#">Etiam dolore nisl</a></li>
                    </ul>
                </li>
                <li><a href="#">Least CO2 emissions</a></li>
            </ul>
        </li>
        <li><a href="popular.html">Popular</a></li>
        <li><a href="browse.html"></a>Browse Car data</li>
    </ul>
</nav><?php }} ?>
