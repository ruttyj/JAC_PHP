<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:35:31
         compiled from ".\templates\result.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12494531294e215f566-42638214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98cec5381eadba09f6bb40f821bafb8176dac287' => 
    array (
      0 => '.\\templates\\result.tpl',
      1 => 1393796124,
      2 => 'file',
    ),
    '86ae7559e833dd82a4a7f379860ccab633513075' => 
    array (
      0 => '.\\templates\\_layout.tpl',
      1 => 1393783281,
      2 => 'file',
    ),
    '78dfd564017866b2a07d32220e5f711a454b3ecb' => 
    array (
      0 => '.\\templates\\nav.tpl',
      1 => 1393795155,
      2 => 'file',
    ),
    'c0e3e6547554bf72dd58d219cd624a24947f1d0f' => 
    array (
      0 => '.\\templates\\head_leftbar.tpl',
      1 => 1393779314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12494531294e215f566-42638214',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_531294e2432099_61558970',
  'variables' => 
  array (
    'HELIOS' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531294e2432099_61558970')) {function content_531294e2432099_61558970($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('head_leftbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '12494531294e215f566-42638214');
content_5313a423c69bd9_81517124($_smarty_tpl);
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
                            <div class='carimage' style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['img'];?>
');"></div>
                        </header>
                        <strong>Look for this car: </strong>
                        <center>
                            <a href="http://search.ebay.com/ws/search/SaleSearch?satitle=<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['year'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['maker'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['model'];?>
" class="button">eBay</a>
                            <a href="https://www.google.ca/search?q=<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['year'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['maker'];?>
+<?php echo $_smarty_tpl->tpl_vars['res']->value[0]['model'];?>
" class="button">Google</a>
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
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:35:31
         compiled from ".\templates\head_leftbar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a423c69bd9_81517124')) {function content_5313a423c69bd9_81517124($_smarty_tpl) {?><body class="left-sidebar">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '12494531294e215f566-42638214');
content_5313a423c8ce58_48755823($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "nav.tpl" */?>

    </div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.16, created on 2014-03-02 22:35:31
         compiled from ".\templates\nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5313a423c8ce58_48755823')) {function content_5313a423c8ce58_48755823($_smarty_tpl) {?><!-- Nav -->
<nav id="nav">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
index.php">Find a Car</a></li>
        <li>
            <span>Preset Selections</span>
            <ul>
                <li>
                    <span>Fuel Efficiency &hellip;</span>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=annualfuel">Annual</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=citylpkw">City Driving</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=hwylpkw">Highway Driving</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
preset.php?by=emission">Least CO2 Emissions</a></li>
            </ul>
        </li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['JACPHP']->value;?>
tree.php">Browse Car Data</a></li>
    </ul>
</nav><?php }} ?>
